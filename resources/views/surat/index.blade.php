@extends('layouts.app')

@section('title', 'Daftar Surat - Arsip Surat Ngodingyuk')

@section('header', 'Daftar Surat ' . ($jenis == 'masuk' ? 'Masuk' : 'Keluar'))

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="flex items-center space-x-3">
                @if($jenis == 'masuk')
                    <a href="{{ route('surat.index', ['jenis' => 'masuk']) }}" 
                       class="px-6 py-3 rounded-xl bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold shadow-lg hover:shadow-xl transition-all duration-200 transform hover:scale-105 flex items-center">
                        <i class="fas fa-inbox mr-2"></i>Surat Masuk
                    </a>
                    <a href="{{ route('surat.index', ['jenis' => 'keluar']) }}" 
                       class="px-6 py-3 rounded-xl bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200 transition-all duration-200 flex items-center">
                        <i class="fas fa-paper-plane mr-2"></i>Surat Keluar
                    </a>
                @else
                    <a href="{{ route('surat.index', ['jenis' => 'masuk']) }}" 
                       class="px-6 py-3 rounded-xl bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200 transition-all duration-200 flex items-center">
                        <i class="fas fa-inbox mr-2"></i>Surat Masuk
                    </a>
                    <a href="{{ route('surat.index', ['jenis' => 'keluar']) }}" 
                       class="px-6 py-3 rounded-xl bg-gradient-to-r from-orange-600 to-amber-600 text-white font-semibold shadow-lg hover:shadow-xl transition-all duration-200 transform hover:scale-105 flex items-center">
                        <i class="fas fa-paper-plane mr-2"></i>Surat Keluar
                    </a>
                @endif
            </div>
            
            <a href="{{ route('surat.create') }}" class="px-6 py-3 rounded-xl bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 text-white font-semibold shadow-lg hover:shadow-xl transition-all duration-200 transform hover:scale-105 flex items-center">
                <i class="fas fa-plus mr-2"></i>Tambah Surat
            </a>
        </div>
    </div>

    <!-- Search and Filter -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
        <form method="GET" action="{{ route('surat.index') }}" class="flex flex-col sm:flex-row gap-4">
            <input type="hidden" name="jenis" value="{{ $jenis }}">
            
            <div class="flex-1">
                <label for="search" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-search mr-2 text-indigo-600"></i>Cari Surat
                </label>
                <div class="relative">
                    <input type="text" 
                           id="search" 
                           name="search" 
                           value="{{ request('search') }}"
                           placeholder="Cari berdasarkan nomor surat, perihal, atau pengirim..."
                           class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200">
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
            
            <div class="flex items-end">
                <button type="submit" class="px-8 py-3 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold shadow-lg hover:shadow-xl transition-all duration-200 transform hover:scale-105 flex items-center">
                    <i class="fas fa-search mr-2"></i>Cari
                </button>
            </div>
        </form>
    </div>

    <!-- Results Count -->
    <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-4 border border-indigo-100">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <i class="fas fa-list text-indigo-600"></i>
                <p class="text-gray-700 font-medium">
                    Menampilkan <span class="font-bold text-indigo-600">{{ $surats->firstItem() ?? 0 }}</span> - 
                    <span class="font-bold text-indigo-600">{{ $surats->lastItem() ?? 0 }}</span> dari 
                    <span class="font-bold text-indigo-600">{{ $surats->total() }}</span> surat
                </p>
            </div>
            @if($jenis == 'masuk')
                <span class="px-4 py-2 bg-green-100 text-green-700 rounded-lg font-semibold text-sm">
                    <i class="fas fa-inbox mr-1"></i>Surat Masuk
                </span>
            @else
                <span class="px-4 py-2 bg-orange-100 text-orange-700 rounded-lg font-semibold text-sm">
                    <i class="fas fa-paper-plane mr-1"></i>Surat Keluar
                </span>
            @endif
        </div>
    </div>

    <!-- Surat Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-indigo-600 to-purple-600">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">No</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">No Surat</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">No Agenda</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Perihal</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Pengirim</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Bagian</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">File</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($surats as $index => $surat)
                    <tr class="hover:bg-gradient-to-r hover:from-indigo-50 hover:to-purple-50 transition-all duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-indigo-100 text-indigo-700 font-semibold text-sm">
                                {{ $surats->firstItem() + $index }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm font-semibold text-gray-900">{{ $surat->nomor_surat }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm text-gray-700">{{ $surat->nomor_agenda }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="max-w-xs">
                                <p class="text-sm font-medium text-gray-900 truncate" title="{{ $surat->perihal }}">
                                    {{ $surat->perihal }}
                                </p>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-lg bg-gray-100 text-gray-700 text-sm font-medium">
                                <i class="fas fa-calendar mr-2 text-gray-400"></i>{{ $surat->tanggal->format('d/m/Y') }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="text-sm text-gray-700">{{ $surat->pengirim }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1 rounded-lg bg-blue-100 text-blue-700 text-sm font-medium">
                                {{ $surat->bagian }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($surat->file_path)
                                <a href="{{ route('surat.download', $surat) }}" 
                                   class="inline-flex items-center px-3 py-1 rounded-lg bg-green-100 text-green-700 hover:bg-green-200 font-medium text-sm transition-colors">
                                    <i class="fas fa-download mr-2"></i>Download
                                </a>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-lg bg-gray-100 text-gray-400 text-sm">
                                    <i class="fas fa-file-slash mr-2"></i>Tidak ada
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('surat.show', $surat) }}" 
                                   class="w-9 h-9 flex items-center justify-center rounded-lg bg-indigo-100 text-indigo-600 hover:bg-indigo-600 hover:text-white transition-all duration-200" 
                                   title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('surat.edit', $surat) }}" 
                                   class="w-9 h-9 flex items-center justify-center rounded-lg bg-yellow-100 text-yellow-600 hover:bg-yellow-600 hover:text-white transition-all duration-200" 
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('surat.destroy', $surat) }}" 
                                      class="inline" 
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-100 text-red-600 hover:bg-red-600 hover:text-white transition-all duration-200" 
                                            title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-6 py-16 text-center">
                            <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-12 border-2 border-dashed border-gray-300">
                                <div class="w-20 h-20 bg-gray-200 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-inbox text-4xl text-gray-400"></i>
                                </div>
                                <p class="text-xl font-bold text-gray-700 mb-2">Tidak ada surat ditemukan</p>
                                <p class="text-sm text-gray-500 mb-6">Belum ada surat {{ $jenis == 'masuk' ? 'masuk' : 'keluar' }} yang ditambahkan</p>
                                <a href="{{ route('surat.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl font-semibold">
                                    <i class="fas fa-plus mr-2"></i>Tambah Surat Pertama
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($surats->hasPages())
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex-1 flex justify-between sm:hidden">
                    @if($surats->onFirstPage())
                        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-xl text-gray-300 bg-white cursor-not-allowed">
                            <i class="fas fa-chevron-left mr-2"></i>Sebelumnya
                        </span>
                    @else
                        <a href="{{ $surats->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-indigo-50 hover:border-indigo-300 transition-all">
                            <i class="fas fa-chevron-left mr-2"></i>Sebelumnya
                        </a>
                    @endif
                    
                    @if($surats->hasMorePages())
                        <a href="{{ $surats->nextPageUrl() }}" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-indigo-50 hover:border-indigo-300 transition-all">
                            Selanjutnya<i class="fas fa-chevron-right ml-2"></i>
                        </a>
                    @else
                        <span class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-xl text-gray-300 bg-white cursor-not-allowed">
                            Selanjutnya<i class="fas fa-chevron-right ml-2"></i>
                        </span>
                    @endif
                </div>
                
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700 font-medium">
                            Menampilkan <span class="font-bold text-indigo-600">{{ $surats->firstItem() }}</span> sampai 
                            <span class="font-bold text-indigo-600">{{ $surats->lastItem() }}</span> dari 
                            <span class="font-bold text-indigo-600">{{ $surats->total() }}</span> hasil
                        </p>
                    </div>
                    
                    <div class="flex items-center space-x-2">
                        {{ $surats->links() }}
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
