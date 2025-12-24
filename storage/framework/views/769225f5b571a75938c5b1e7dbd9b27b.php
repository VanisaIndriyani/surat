

<?php $__env->startSection('title', 'Detail Surat - Arsip Surat'); ?>

<?php $__env->startSection('header', 'Detail Surat'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Back Button -->
    <div class="flex items-center">
        <a href="<?php echo e(route('surat.index', ['jenis' => $surat->jenis])); ?>" 
           class="flex items-center text-navy-600 hover:text-navy-800 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali ke daftar surat
        </a>
    </div>

    <!-- Surat Details Card -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <!-- Header -->
        <div class="bg-navy-800 px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-<?php echo e($surat->jenis == 'masuk' ? 'inbox' : 'paper-plane'); ?> text-navy-800 text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white">
                            <?php echo e($surat->jenis == 'masuk' ? 'Surat Masuk' : 'Surat Keluar'); ?>

                        </h1>
                        <p class="text-navy-200"><?php echo e($surat->nomor_surat); ?></p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-2">
                    <a href="<?php echo e(route('surat.edit', $surat)); ?>" 
                       class="bg-navy-600 text-white px-4 py-2 rounded-lg hover:bg-navy-700 transition-colors">
                        <i class="fas fa-edit mr-2"></i>Edit
                    </a>
                    <form method="POST" action="<?php echo e(route('surat.destroy', $surat)); ?>" 
                          class="inline" 
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" 
                                class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                            <i class="fas fa-trash mr-2"></i>Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Basic Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Dasar</h3>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <div class="w-4 h-4 bg-navy-600 rounded-full mr-3"></div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-500">Nomor Surat</p>
                                    <p class="text-gray-900"><?php echo e($surat->nomor_surat); ?></p>
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <div class="w-4 h-4 bg-navy-600 rounded-full mr-3"></div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-500">Nomor Agenda</p>
                                    <p class="text-gray-900"><?php echo e($surat->nomor_agenda); ?></p>
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <div class="w-4 h-4 bg-navy-600 rounded-full mr-3"></div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-500">Perihal</p>
                                    <p class="text-gray-900"><?php echo e($surat->perihal); ?></p>
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <div class="w-4 h-4 bg-navy-600 rounded-full mr-3"></div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-500">Tanggal</p>
                                    <p class="text-gray-900"><?php echo e($surat->tanggal->format('d F Y')); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sender Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Pengirim</h3>
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <div class="w-4 h-4 bg-green-600 rounded-full mr-3"></div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-500">Pengirim</p>
                                    <p class="text-gray-900"><?php echo e($surat->pengirim); ?></p>
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <div class="w-4 h-4 bg-green-600 rounded-full mr-3"></div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-500">Bagian</p>
                                    <p class="text-gray-900"><?php echo e($surat->bagian); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- File Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">File Surat</h3>
                        <?php if($surat->file_path): ?>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-navy-100 rounded-lg flex items-center justify-center mr-4">
                                        <i class="fas fa-file text-navy-600 text-xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-medium text-gray-900">File Surat</p>
                                        <p class="text-sm text-gray-600"><?php echo e(basename($surat->file_path)); ?></p>
                                    </div>
                                    <a href="<?php echo e(route('surat.download', $surat)); ?>" 
                                       class="bg-navy-600 text-white px-4 py-2 rounded-lg hover:bg-navy-700 transition-colors">
                                        <i class="fas fa-download mr-2"></i>Download
                                    </a>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <i class="fas fa-file-slash text-4xl text-gray-300 mb-2"></i>
                                <p class="text-gray-500">Tidak ada file yang diupload</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Additional Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Keterangan Tambahan</h3>
                        <?php if($surat->keterangan): ?>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <p class="text-gray-900"><?php echo e($surat->keterangan); ?></p>
                            </div>
                        <?php else: ?>
                            <div class="bg-gray-50 rounded-lg p-4 text-center">
                                <p class="text-gray-500">Tidak ada keterangan tambahan</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Timestamps -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Sistem</h3>
                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex justify-between">
                                <span>Dibuat pada:</span>
                                <span><?php echo e($surat->created_at->format('d F Y H:i')); ?></span>
                            </div>
                            <div class="flex justify-between">
                                <span>Terakhir diperbarui:</span>
                                <span><?php echo e($surat->updated_at->format('d F Y H:i')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex justify-center space-x-4">
        <a href="<?php echo e(route('surat.edit', $surat)); ?>" 
           class="bg-navy-600 text-white px-6 py-3 rounded-lg hover:bg-navy-700 transition-colors">
            <i class="fas fa-edit mr-2"></i>Edit Surat
        </a>
        
        <?php if($surat->file_path): ?>
        <a href="<?php echo e(route('surat.download', $surat)); ?>" 
           class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition-colors">
            <i class="fas fa-download mr-2"></i>Download File
        </a>
        <?php endif; ?>
        
        <a href="<?php echo e(route('surat.index', ['jenis' => $surat->jenis])); ?>" 
           class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition-colors">
            <i class="fas fa-list mr-2"></i>Kembali ke Daftar
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\IZSAA\JOKIAN\SEPTEMBER\arsip-surat\resources\views/surat/show.blade.php ENDPATH**/ ?>