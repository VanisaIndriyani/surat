@extends('layouts.app')

@section('title', 'Edit Surat - Arsip Surat Ngodingyuk')

@section('header', 'Edit Surat')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-yellow-500 via-orange-500 to-red-500 rounded-2xl shadow-xl p-6 mb-6 text-white">
        <div class="flex items-center space-x-4">
            <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-lg">
                <i class="fas fa-edit text-3xl bg-gradient-to-r from-yellow-500 to-red-500 bg-clip-text text-transparent"></i>
            </div>
            <div>
                <h2 class="text-2xl font-bold">Edit Surat</h2>
                <p class="text-white/90 mt-1">Perbarui informasi surat yang sudah ada</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
        <form method="POST" action="{{ route('surat.update', $surat) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Jenis Surat -->
            <div>
                <label for="jenis" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-tag mr-2 text-indigo-600"></i>Jenis Surat <span class="text-red-500">*</span>
                </label>
                <select id="jenis" name="jenis" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 @error('jenis') border-red-400 focus:ring-red-400 focus:border-red-400 @enderror">
                    <option value="">Pilih jenis surat</option>
                    <option value="masuk" {{ old('jenis', $surat->jenis) == 'masuk' ? 'selected' : '' }}>Surat Masuk</option>
                    <option value="keluar" {{ old('jenis', $surat->jenis) == 'keluar' ? 'selected' : '' }}>Surat Keluar</option>
                </select>
                @error('jenis')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nomor Surat -->
                <div>
                    <label for="nomor_surat" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-hashtag mr-2 text-indigo-600"></i>Nomor Surat <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="nomor_surat" 
                           name="nomor_surat" 
                           value="{{ old('nomor_surat', $surat->nomor_surat) }}"
                           required
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 @error('nomor_surat') border-red-400 focus:ring-red-400 focus:border-red-400 @enderror"
                           placeholder="Masukkan nomor surat">
                    @error('nomor_surat')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Nomor Agenda -->
                <div>
                    <label for="nomor_agenda" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-list-ol mr-2 text-indigo-600"></i>Nomor Agenda <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           id="nomor_agenda" 
                           name="nomor_agenda" 
                           value="{{ old('nomor_agenda', $surat->nomor_agenda) }}"
                           required
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 @error('nomor_agenda') border-red-400 focus:ring-red-400 focus:border-red-400 @enderror"
                           placeholder="Masukkan nomor agenda">
                    @error('nomor_agenda')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Perihal -->
            <div>
                <label for="perihal" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-file-alt mr-2 text-indigo-600"></i>Perihal <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="perihal" 
                       name="perihal" 
                       value="{{ old('perihal', $surat->perihal) }}"
                       required
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 @error('perihal') border-red-400 focus:ring-red-400 focus:border-red-400 @enderror"
                       placeholder="Masukkan perihal surat">
                @error('perihal')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Tanggal -->
                <div>
                    <label for="tanggal" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-calendar mr-2 text-indigo-600"></i>Tanggal <span class="text-red-500">*</span>
                    </label>
                    <input type="date" 
                           id="tanggal" 
                           name="tanggal" 
                           value="{{ old('tanggal', $surat->tanggal->format('Y-m-d')) }}"
                           required
                           class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 @error('tanggal') border-red-400 focus:ring-red-400 focus:border-red-400 @enderror">
                    @error('tanggal')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Bagian -->
                <div>
                    <label for="bagian" class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-building mr-2 text-indigo-600"></i>Bagian <span class="text-red-500">*</span>
                    </label>
                    <select id="bagian" name="bagian" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 @error('bagian') border-red-400 focus:ring-red-400 focus:border-red-400 @enderror">
                        <option value="">Pilih bagian</option>
                        <option value="Umum" {{ old('bagian', $surat->bagian) == 'Umum' ? 'selected' : '' }}>Umum</option>
                        <option value="Keuangan" {{ old('bagian', $surat->bagian) == 'Keuangan' ? 'selected' : '' }}>Keuangan</option>
                        <option value="SDM" {{ old('bagian', $surat->bagian) == 'SDM' ? 'selected' : '' }}>SDM</option>
                        <option value="IT" {{ old('bagian', $surat->bagian) == 'IT' ? 'selected' : '' }}>IT</option>
                        <option value="Marketing" {{ old('bagian', $surat->bagian) == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                        <option value="Produksi" {{ old('bagian', $surat->bagian) == 'Produksi' ? 'selected' : '' }}>Produksi</option>
                        <option value="Lainnya" {{ old('bagian', $surat->bagian) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('bagian')
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Pengirim -->
            <div>
                <label for="pengirim" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-user mr-2 text-indigo-600"></i>Pengirim <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       id="pengirim" 
                       name="pengirim" 
                       value="{{ old('pengirim', $surat->pengirim) }}"
                       required
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 @error('pengirim') border-red-400 focus:ring-red-400 focus:border-red-400 @enderror"
                       placeholder="Masukkan nama pengirim">
                @error('pengirim')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Keterangan -->
            <div>
                <label for="keterangan" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-sticky-note mr-2 text-indigo-600"></i>Keterangan
                </label>
                <textarea id="keterangan" 
                          name="keterangan" 
                          rows="4"
                          class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 @error('keterangan') border-red-400 focus:ring-red-400 focus:border-red-400 @enderror"
                          placeholder="Masukkan keterangan tambahan (opsional)">{{ old('keterangan', $surat->keterangan) }}</textarea>
                @error('keterangan')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Current File -->
            @if($surat->file_path)
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-file mr-2 text-indigo-600"></i>File Saat Ini
                </label>
                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-4 border border-indigo-100">
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-xl flex items-center justify-center mr-4 shadow-lg">
                            <i class="fas fa-file text-white text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-900">{{ basename($surat->file_path) }}</p>
                            <p class="text-sm text-gray-600">File yang sudah diupload</p>
                        </div>
                        <a href="{{ route('surat.download', $surat) }}" 
                           class="px-4 py-2 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition-all duration-200 flex items-center">
                            <i class="fas fa-download mr-2"></i>Download
                        </a>
                    </div>
                </div>
            </div>
            @endif

            <!-- File Upload -->
            <div>
                <label for="file" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-paperclip mr-2 text-indigo-600"></i>{{ $surat->file_path ? 'Ganti File Surat' : 'Upload File Surat' }} (Opsional)
                </label>
                <input id="file" name="file" type="file" class="hidden" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                <div id="upload-area" class="mt-1 flex justify-center px-6 pt-8 pb-8 border-2 border-gray-300 border-dashed rounded-xl hover:border-indigo-400 hover:bg-indigo-50 transition-all duration-200 cursor-pointer" onclick="document.getElementById('file').click()">
                    <div id="upload-content" class="space-y-2 text-center">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                        <div class="flex text-sm text-gray-600 justify-center items-center">
                            <span class="font-semibold text-indigo-600">Klik untuk upload file</span>
                            <span class="pl-2 text-gray-500">atau drag and drop</span>
                        </div>
                        <p class="text-xs text-gray-500">PDF, DOC, DOCX, JPG, JPEG, PNG (maks. 10MB)</p>
                        @if($surat->file_path)
                        <p class="text-xs text-orange-600 font-medium">
                            <i class="fas fa-exclamation-triangle mr-1"></i>File baru akan menggantikan file yang ada
                        </p>
                        @endif
                    </div>
                </div>
                @error('file')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('surat.show', $surat) }}" 
                   class="px-6 py-3 border-2 border-gray-300 rounded-xl text-gray-700 font-semibold hover:bg-gray-50 transition-all duration-200 flex items-center">
                    <i class="fas fa-times mr-2"></i>Batal
                </a>
                <button type="submit" 
                        class="px-8 py-3 bg-gradient-to-r from-yellow-500 via-orange-500 to-red-500 text-white rounded-xl hover:from-yellow-600 hover:via-orange-600 hover:to-red-600 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105 font-semibold flex items-center">
                    <i class="fas fa-save mr-2"></i>Update Surat
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // File upload preview
    const fileInput = document.getElementById('file');
    const uploadArea = document.getElementById('upload-area');
    const uploadContent = document.getElementById('upload-content');
    const hasExistingFile = {{ $surat->file_path ? 'true' : 'false' }};
    const originalContent = uploadContent.innerHTML;
    
    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            let warningHtml = '';
            if (hasExistingFile) {
                warningHtml = '<p class="text-xs text-orange-600 font-medium"><i class="fas fa-exclamation-triangle mr-1"></i>File baru akan menggantikan file yang ada</p>';
            }
            
            uploadContent.innerHTML = `
                <div class="space-y-2 text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-file-check text-3xl text-green-600"></i>
                    </div>
                    <p class="text-sm font-semibold text-gray-900">${file.name}</p>
                    <p class="text-xs text-gray-500">${(file.size / 1024 / 1024).toFixed(2)} MB</p>
                    ${warningHtml}
                    <button type="button" onclick="document.getElementById('file').click(); event.stopPropagation();" class="inline-block mt-2 px-4 py-2 bg-indigo-100 text-indigo-700 rounded-lg font-medium hover:bg-indigo-200 transition-colors cursor-pointer text-sm">
                        <i class="fas fa-sync-alt mr-1"></i>Ganti file
                    </button>
                </div>
            `;
        } else {
            uploadContent.innerHTML = originalContent;
        }
    });
    
    // Drag and drop
    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        uploadArea.classList.add('border-indigo-500', 'bg-indigo-50');
    });
    
    uploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('border-indigo-500', 'bg-indigo-50');
    });
    
    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('border-indigo-500', 'bg-indigo-50');
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            fileInput.dispatchEvent(new Event('change'));
        }
    });
</script>
@endsection
