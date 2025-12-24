@extends('layouts.app')

@section('title', 'Tambah Surat - Arsip Surat Ngodingyuk')

@section('header', 'Tambah Surat Baru')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 rounded-2xl shadow-xl p-6 mb-6 text-white">
        <div class="flex items-center space-x-4">
            <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-lg">
                <i class="fas fa-file-alt text-3xl bg-gradient-to-r from-indigo-600 to-pink-500 bg-clip-text text-transparent"></i>
            </div>
            <div>
                <h2 class="text-2xl font-bold">Tambah Surat Baru</h2>
                <p class="text-white/90 mt-1">Isi form di bawah untuk menambahkan surat baru</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
        <form method="POST" action="{{ route('surat.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <!-- Jenis Surat -->
            <div>
                <label for="jenis" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-tag mr-2 text-indigo-600"></i>Jenis Surat <span class="text-red-500">*</span>
                </label>
                <select id="jenis" name="jenis" required class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 @error('jenis') border-red-400 focus:ring-red-400 focus:border-red-400 @enderror">
                    <option value="">Pilih jenis surat</option>
                    <option value="masuk" {{ old('jenis') == 'masuk' ? 'selected' : '' }}>Surat Masuk</option>
                    <option value="keluar" {{ old('jenis') == 'keluar' ? 'selected' : '' }}>Surat Keluar</option>
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
                           value="{{ old('nomor_surat') }}"
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
                           value="{{ old('nomor_agenda') }}"
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
                       value="{{ old('perihal') }}"
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
                           value="{{ old('tanggal') }}"
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
                        <option value="Umum" {{ old('bagian') == 'Umum' ? 'selected' : '' }}>Umum</option>
                        <option value="Keuangan" {{ old('bagian') == 'Keuangan' ? 'selected' : '' }}>Keuangan</option>
                        <option value="SDM" {{ old('bagian') == 'SDM' ? 'selected' : '' }}>SDM</option>
                        <option value="IT" {{ old('bagian') == 'IT' ? 'selected' : '' }}>IT</option>
                        <option value="Marketing" {{ old('bagian') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                        <option value="Produksi" {{ old('bagian') == 'Produksi' ? 'selected' : '' }}>Produksi</option>
                        <option value="Lainnya" {{ old('bagian') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
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
                       value="{{ old('pengirim') }}"
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
                          placeholder="Masukkan keterangan tambahan (opsional)">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <p class="mt-2 text-sm text-red-600 flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                    </p>
                @enderror
            </div>

            <!-- File Upload -->
            <div>
                <label for="file" class="block text-sm font-semibold text-gray-700 mb-2">
                    <i class="fas fa-paperclip mr-2 text-indigo-600"></i>File Surat (Opsional)
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
                <a href="{{ route('surat.index', ['jenis' => old('jenis', 'masuk')]) }}" 
                   class="px-6 py-3 border-2 border-gray-300 rounded-xl text-gray-700 font-semibold hover:bg-gray-50 transition-all duration-200 flex items-center">
                    <i class="fas fa-times mr-2"></i>Batal
                </a>
                <button type="submit" 
                        class="px-8 py-3 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 text-white rounded-xl hover:from-indigo-700 hover:via-purple-700 hover:to-pink-600 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105 font-semibold flex items-center">
                    <i class="fas fa-save mr-2"></i>Simpan Surat
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
    const originalContent = uploadContent.innerHTML;
    
    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            uploadContent.innerHTML = `
                <div class="space-y-2 text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mx-auto mb-2">
                        <i class="fas fa-file-check text-3xl text-green-600"></i>
                    </div>
                    <p class="text-sm font-semibold text-gray-900">${file.name}</p>
                    <p class="text-xs text-gray-500">${(file.size / 1024 / 1024).toFixed(2)} MB</p>
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
        e.stopPropagation();
        uploadArea.classList.add('border-indigo-500', 'bg-indigo-50');
    });
    
    uploadArea.addEventListener('dragleave', function(e) {
        e.preventDefault();
        e.stopPropagation();
        uploadArea.classList.remove('border-indigo-500', 'bg-indigo-50');
    });
    
    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        e.stopPropagation();
        uploadArea.classList.remove('border-indigo-500', 'bg-indigo-50');
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;
            fileInput.dispatchEvent(new Event('change', { bubbles: true }));
        }
    });
</script>
@endsection
