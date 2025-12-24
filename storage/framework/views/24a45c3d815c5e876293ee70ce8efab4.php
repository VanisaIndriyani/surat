

<?php $__env->startSection('title', 'Detail Surat - Arsip Surat Ngodingyuk'); ?>

<?php $__env->startSection('header', 'Detail Surat'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Back Button -->
    <div class="flex items-center">
        <a href="<?php echo e(route('surat.index', ['jenis' => $surat->jenis])); ?>" 
           class="flex items-center px-4 py-2 text-indigo-600 hover:text-indigo-700 hover:bg-indigo-50 rounded-xl transition-all duration-200 font-medium">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali ke daftar surat
        </a>
    </div>

    <!-- Surat Details Card -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
        <!-- Header -->
        <div class="bg-gradient-to-r <?php echo e($surat->jenis == 'masuk' ? 'from-green-600 to-emerald-600' : 'from-orange-600 to-amber-600'); ?> px-8 py-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-<?php echo e($surat->jenis == 'masuk' ? 'inbox' : 'paper-plane'); ?> text-2xl <?php echo e($surat->jenis == 'masuk' ? 'text-green-600' : 'text-orange-600'); ?>"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white">
                            <?php echo e($surat->jenis == 'masuk' ? 'Surat Masuk' : 'Surat Keluar'); ?>

                        </h1>
                        <p class="text-white/90 mt-1"><?php echo e($surat->nomor_surat); ?></p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-3">
                    <a href="<?php echo e(route('surat.edit', $surat)); ?>" 
                       class="px-4 py-2 bg-white/20 hover:bg-white/30 text-white rounded-xl transition-all duration-200 font-medium flex items-center backdrop-blur-sm">
                        <i class="fas fa-edit mr-2"></i>Edit
                    </a>
                    <form method="POST" action="<?php echo e(route('surat.destroy', $surat)); ?>" 
                          class="inline" 
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" 
                                class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-xl transition-all duration-200 font-medium flex items-center">
                            <i class="fas fa-trash mr-2"></i>Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Basic Information -->
                    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl p-6 border border-indigo-100">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-xl flex items-center justify-center mr-3">
                                <i class="fas fa-info-circle text-white"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Informasi Dasar</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="bg-white rounded-xl p-4 border border-gray-100">
                                <p class="text-xs font-semibold text-gray-500 uppercase mb-1">Nomor Surat</p>
                                <p class="text-lg font-bold text-gray-900"><?php echo e($surat->nomor_surat); ?></p>
                            </div>
                            
                            <div class="bg-white rounded-xl p-4 border border-gray-100">
                                <p class="text-xs font-semibold text-gray-500 uppercase mb-1">Nomor Agenda</p>
                                <p class="text-lg font-bold text-gray-900"><?php echo e($surat->nomor_agenda); ?></p>
                            </div>
                            
                            <div class="bg-white rounded-xl p-4 border border-gray-100">
                                <p class="text-xs font-semibold text-gray-500 uppercase mb-1">Perihal</p>
                                <p class="text-base font-semibold text-gray-900"><?php echo e($surat->perihal); ?></p>
                            </div>
                            
                            <div class="bg-white rounded-xl p-4 border border-gray-100">
                                <p class="text-xs font-semibold text-gray-500 uppercase mb-1">Tanggal</p>
                                <p class="text-lg font-bold text-gray-900">
                                    <i class="fas fa-calendar mr-2 text-indigo-600"></i><?php echo e($surat->tanggal->format('d F Y')); ?>

                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Sender Information -->
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-6 border border-green-100">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-green-600 to-emerald-600 rounded-xl flex items-center justify-center mr-3">
                                <i class="fas fa-user text-white"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Informasi Pengirim</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="bg-white rounded-xl p-4 border border-gray-100">
                                <p class="text-xs font-semibold text-gray-500 uppercase mb-1">Pengirim</p>
                                <p class="text-lg font-bold text-gray-900"><?php echo e($surat->pengirim); ?></p>
                            </div>
                            
                            <div class="bg-white rounded-xl p-4 border border-gray-100">
                                <p class="text-xs font-semibold text-gray-500 uppercase mb-1">Bagian</p>
                                <span class="inline-flex items-center px-3 py-1 rounded-lg bg-blue-100 text-blue-700 font-semibold text-sm">
                                    <?php echo e($surat->bagian); ?>

                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- File Information -->
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-6 border border-blue-100">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-cyan-600 rounded-xl flex items-center justify-center mr-3">
                                <i class="fas fa-file text-white"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">File Surat</h3>
                        </div>
                        <?php if($surat->file_path): ?>
                            <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm">
                                <div class="flex items-center">
                                    <div class="w-14 h-14 bg-gradient-to-br from-blue-600 to-cyan-600 rounded-xl flex items-center justify-center mr-4 shadow-lg">
                                        <i class="fas fa-file text-white text-xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-semibold text-gray-900">File Surat</p>
                                        <p class="text-sm text-gray-600 mt-1"><?php echo e(basename($surat->file_path)); ?></p>
                                    </div>
                                    <a href="<?php echo e(route('surat.download', $surat)); ?>" 
                                       class="px-5 py-2.5 bg-gradient-to-r from-blue-600 to-cyan-600 text-white rounded-xl hover:from-blue-700 hover:to-cyan-700 transition-all duration-200 shadow-lg hover:shadow-xl font-semibold flex items-center">
                                        <i class="fas fa-download mr-2"></i>Download
                                    </a>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="bg-white rounded-xl p-8 text-center border border-gray-100">
                                <div class="w-16 h-16 bg-gray-200 rounded-2xl flex items-center justify-center mx-auto mb-3">
                                    <i class="fas fa-file-slash text-3xl text-gray-400"></i>
                                </div>
                                <p class="text-gray-600 font-medium">Tidak ada file yang diupload</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Additional Information -->
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl p-6 border border-purple-100">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-purple-600 to-pink-600 rounded-xl flex items-center justify-center mr-3">
                                <i class="fas fa-sticky-note text-white"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Keterangan Tambahan</h3>
                        </div>
                        <?php if($surat->keterangan): ?>
                            <div class="bg-white rounded-xl p-5 border border-gray-100">
                                <p class="text-gray-900 leading-relaxed"><?php echo e($surat->keterangan); ?></p>
                            </div>
                        <?php else: ?>
                            <div class="bg-white rounded-xl p-5 text-center border border-gray-100">
                                <p class="text-gray-500">Tidak ada keterangan tambahan</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Timestamps -->
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-6 border border-gray-200">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-gray-600 to-gray-700 rounded-xl flex items-center justify-center mr-3">
                                <i class="fas fa-clock text-white"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Informasi Sistem</h3>
                        </div>
                        <div class="space-y-3">
                            <div class="bg-white rounded-xl p-4 border border-gray-100">
                                <p class="text-xs font-semibold text-gray-500 uppercase mb-1">Dibuat pada</p>
                                <p class="text-sm font-semibold text-gray-900">
                                    <i class="fas fa-calendar-plus mr-2 text-indigo-600"></i><?php echo e($surat->created_at->format('d F Y, H:i')); ?>

                                </p>
                                <p class="text-xs text-gray-500 mt-1"><?php echo e($surat->created_at->diffForHumans()); ?></p>
                            </div>
                            <div class="bg-white rounded-xl p-4 border border-gray-100">
                                <p class="text-xs font-semibold text-gray-500 uppercase mb-1">Terakhir diperbarui</p>
                                <p class="text-sm font-semibold text-gray-900">
                                    <i class="fas fa-sync-alt mr-2 text-green-600"></i><?php echo e($surat->updated_at->format('d F Y, H:i')); ?>

                                </p>
                                <p class="text-xs text-gray-500 mt-1"><?php echo e($surat->updated_at->diffForHumans()); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex flex-wrap justify-center gap-4">
        <a href="<?php echo e(route('surat.edit', $surat)); ?>" 
           class="px-6 py-3 bg-gradient-to-r from-yellow-500 via-orange-500 to-red-500 text-white rounded-xl hover:from-yellow-600 hover:via-orange-600 hover:to-red-600 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105 font-semibold flex items-center">
            <i class="fas fa-edit mr-2"></i>Edit Surat
        </a>
        
        <?php if($surat->file_path): ?>
        <a href="<?php echo e(route('surat.download', $surat)); ?>" 
           class="px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white rounded-xl hover:from-green-700 hover:to-emerald-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105 font-semibold flex items-center">
            <i class="fas fa-download mr-2"></i>Download File
        </a>
        <?php endif; ?>
        
        <a href="<?php echo e(route('surat.index', ['jenis' => $surat->jenis])); ?>" 
           class="px-6 py-3 bg-gradient-to-r from-gray-600 to-gray-700 text-white rounded-xl hover:from-gray-700 hover:to-gray-800 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105 font-semibold flex items-center">
            <i class="fas fa-list mr-2"></i>Kembali ke Daftar
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\IZSAA\BBB\LARAVEL\SURAT\arsip-surat\resources\views/surat/show.blade.php ENDPATH**/ ?>