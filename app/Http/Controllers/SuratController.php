<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        $jenis = $request->get('jenis', 'masuk');
        $search = $request->get('search');
        
        $query = Surat::where('jenis', $jenis);
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nomor_surat', 'like', "%{$search}%")
                  ->orWhere('perihal', 'like', "%{$search}%")
                  ->orWhere('pengirim', 'like', "%{$search}%")
                  ->orWhere('nomor_agenda', 'like', "%{$search}%");
            });
        }
        
        $surats = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('surat.index', compact('surats', 'jenis'));
    }

    public function create()
    {
        return view('surat.create');
    }

    public function store(Request $request)
    {
        Log::info('Store method called', ['has_file' => $request->hasFile('file'), 'all_data' => $request->all()]);
        
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'nomor_agenda' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'bagian' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'jenis' => 'required|in:masuk,keluar',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240'
        ]);

        $data = $request->all();
        Log::info('Data after validation', $data);
        
        if ($request->hasFile('file')) {
            Log::info('File detected, processing upload');
            try {
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                Log::info('Attempting to store file', ['filename' => $fileName]);
                $filePath = $file->storeAs('surat', $fileName, 'public');
                Log::info('File store result', ['filepath' => $filePath]);
                if (!$filePath) {
                    Log::error('File store returned false');
                    return back()->withInput()->with('error', 'Gagal menyimpan file. Coba lagi atau pilih file lain.');
                }
                $data['file_path'] = $filePath;
                Log::info('File path added to data', ['file_path' => $filePath]);
            } catch (\Throwable $e) {
                Log::error('Upload gagal (store): '.$e->getMessage());
                return back()->withInput()->with('error', 'Upload gagal: ' . $e->getMessage());
            }
        } else {
            Log::info('No file uploaded');
            if ($request->input('file') !== null) {
                // Form mengirim field file namun tidak terdeteksi sebagai file (umumnya karena ukuran > post_max_size)
                Log::warning('Form field file ada tapi tidak terdeteksi sebagai file saat store. Content-Length: '.($request->header('Content-Length') ?? 'unknown'));
                return back()->withInput()->with('error', 'File tidak terdeteksi. Coba file lebih kecil atau periksa koneksi.');
            }
        }

        Log::info('Creating surat with data', $data);
        $surat = Surat::create($data);
        Log::info('Surat created', ['id' => $surat->id, 'file_path' => $surat->file_path]);

        return redirect()->route('surat.index', ['jenis' => $request->jenis])
                        ->with('success', 'Surat berhasil ditambahkan');
    }

    public function show(Surat $surat)
    {
        return view('surat.show', compact('surat'));
    }

    public function edit(Surat $surat)
    {
        return view('surat.edit', compact('surat'));
    }

    public function update(Request $request, Surat $surat)
    {
        Log::info('Update method called', ['surat_id' => $surat->id, 'has_file' => $request->hasFile('file'), 'all_data' => $request->all()]);
        
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'nomor_agenda' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'bagian' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'jenis' => 'required|in:masuk,keluar',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240'
        ]);

        $data = $request->all();
        Log::info('Data after validation', $data);
        
        if ($request->hasFile('file')) {
            Log::info('File detected, processing upload for update');
            try {
                // Delete old file if exists
                if ($surat->file_path) {
                    Log::info('Deleting old file', ['old_file_path' => $surat->file_path]);
                    Storage::disk('public')->delete($surat->file_path);
                }
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                Log::info('Attempting to store new file', ['filename' => $fileName]);
                $filePath = $file->storeAs('surat', $fileName, 'public');
                Log::info('File store result', ['filepath' => $filePath]);
                if (!$filePath) {
                    Log::error('File store returned false during update');
                    return back()->withInput()->with('error', 'Gagal menyimpan file baru.');
                }
                $data['file_path'] = $filePath;
                Log::info('File path added to data', ['file_path' => $filePath]);
            } catch (\Throwable $e) {
                Log::error('Upload gagal (update): '.$e->getMessage());
                return back()->withInput()->with('error', 'Upload gagal: ' . $e->getMessage());
            }
        } else {
            Log::info('No file uploaded during update');
            if ($request->input('file') !== null) {
                Log::warning('Form field file ada tapi tidak terdeteksi sebagai file saat update. Content-Length: '.($request->header('Content-Length') ?? 'unknown'));
                return back()->withInput()->with('error', 'File tidak terdeteksi. Coba file lebih kecil atau periksa koneksi.');
            }
        }

        Log::info('Updating surat with data', $data);
        $surat->update($data);
        Log::info('Surat updated', ['id' => $surat->id, 'file_path' => $surat->file_path]);

        return redirect()->route('surat.index', ['jenis' => $request->jenis])
                        ->with('success', 'Surat berhasil diperbarui');
    }

    public function destroy(Surat $surat)
    {
        // Simpan jenis surat sebelum dihapus
        $jenis = $surat->jenis;
        
        if ($surat->file_path) {
            Storage::disk('public')->delete($surat->file_path);
        }
        
        $surat->delete();

        return redirect()->route('surat.index', ['jenis' => $jenis])
                        ->with('success', 'Surat berhasil dihapus');
    }

    public function download(Surat $surat)
    {
        if (!$surat->file_path) {
            return redirect()->back()->with('error', 'File tidak ditemukan');
        }

        return Storage::disk('public')->download($surat->file_path);
    }
}
