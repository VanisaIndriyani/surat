

<?php $__env->startSection('title', 'Daftar Surat - Arsip Surat'); ?>

<?php $__env->startSection('header', 'Daftar Surat ' . ($jenis == 'masuk' ? 'Masuk' : 'Keluar')); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="flex items-center space-x-4">
            <a href="<?php echo e(route('surat.index', ['jenis' => 'masuk'])); ?>" 
               class="px-4 py-2 rounded-lg <?php echo e($jenis == 'masuk' ? 'bg-navy-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'); ?> transition-colors">
                <i class="fas fa-inbox mr-2"></i>Surat Masuk
            </a>
            <a href="<?php echo e(route('surat.index', ['jenis' => 'keluar'])); ?>" 
               class="px-4 py-2 rounded-lg <?php echo e($jenis == 'keluar' ? 'bg-navy-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'); ?> transition-colors">
                <i class="fas fa-paper-plane mr-2"></i>Surat Keluar
            </a>
        </div>
        
        <a href="<?php echo e(route('surat.create')); ?>" class="bg-navy-600 text-white px-4 py-2 rounded-lg hover:bg-navy-700 transition-colors">
            <i class="fas fa-plus mr-2"></i>Tambah Surat
        </a>
    </div>

    <!-- Search and Filter -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <form method="GET" action="<?php echo e(route('surat.index')); ?>" class="flex flex-col sm:flex-row gap-4">
            <input type="hidden" name="jenis" value="<?php echo e($jenis); ?>">
            
            <div class="flex-1">
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Cari Surat</label>
                <input type="text" 
                       id="search" 
                       name="search" 
                       value="<?php echo e(request('search')); ?>"
                       placeholder="Cari berdasarkan nomor surat, perihal, atau pengirim..."
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-navy-500 focus:border-navy-500">
            </div>
            
            <div class="flex items-end">
                <button type="submit" class="bg-navy-600 text-white px-6 py-2 rounded-lg hover:bg-navy-700 transition-colors">
                    <i class="fas fa-search mr-2"></i>Cari
                </button>
            </div>
        </form>
    </div>

    <!-- Results Count -->
    <div class="flex justify-between items-center">
        <p class="text-gray-600">
            Menampilkan <?php echo e($surats->firstItem() ?? 0); ?> - <?php echo e($surats->lastItem() ?? 0); ?> dari <?php echo e($surats->total()); ?> surat
        </p>
    </div>

    <!-- Surat Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No Surat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No Agenda</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Perihal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengirim</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bagian</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">File</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $__empty_1 = true; $__currentLoopData = $surats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <?php echo e($surats->firstItem() + $index); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <?php echo e($surat->nomor_surat); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <?php echo e($surat->nomor_agenda); ?>

                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">
                            <div class="max-w-xs truncate" title="<?php echo e($surat->perihal); ?>">
                                <?php echo e($surat->perihal); ?>

                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <?php echo e($surat->tanggal->format('d/m/Y')); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <?php echo e($surat->pengirim); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <?php echo e($surat->bagian); ?>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <?php if($surat->file_path): ?>
                                <a href="<?php echo e(route('surat.download', $surat)); ?>" 
                                   class="text-blue-600 hover:text-blue-800 font-medium">
                                    <i class="fas fa-download mr-1"></i>Lihat File
                                </a>
                            <?php else: ?>
                                <span class="text-gray-400">Tidak ada file</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                <a href="<?php echo e(route('surat.show', $surat)); ?>" 
                                   class="text-navy-600 hover:text-navy-800" 
                                   title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?php echo e(route('surat.edit', $surat)); ?>" 
                                   class="text-yellow-600 hover:text-yellow-800" 
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="<?php echo e(route('surat.destroy', $surat)); ?>" 
                                      class="inline" 
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-800" 
                                            title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="9" class="px-6 py-12 text-center">
                            <div class="text-gray-500">
                                <i class="fas fa-inbox text-4xl mb-4"></i>
                                <p class="text-lg font-medium">Tidak ada surat ditemukan</p>
                                <p class="text-sm">Belum ada surat <?php echo e($jenis == 'masuk' ? 'masuk' : 'keluar'); ?> yang ditambahkan</p>
                                <a href="<?php echo e(route('surat.create')); ?>" class="inline-block mt-4 text-navy-600 hover:text-navy-800">
                                    <i class="fas fa-plus mr-1"></i>Tambah surat pertama
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <?php if($surats->hasPages()): ?>
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
            <div class="flex items-center justify-between">
                <div class="flex-1 flex justify-between sm:hidden">
                    <?php if($surats->onFirstPage()): ?>
                        <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-300 bg-white cursor-not-allowed">
                            Sebelumnya
                        </span>
                    <?php else: ?>
                        <a href="<?php echo e($surats->previousPageUrl()); ?>" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Sebelumnya
                        </a>
                    <?php endif; ?>
                    
                    <?php if($surats->hasMorePages()): ?>
                        <a href="<?php echo e($surats->nextPageUrl()); ?>" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Selanjutnya
                        </a>
                    <?php else: ?>
                        <span class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-300 bg-white cursor-not-allowed">
                            Selanjutnya
                        </span>
                    <?php endif; ?>
                </div>
                
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Menampilkan <span class="font-medium"><?php echo e($surats->firstItem()); ?></span> sampai <span class="font-medium"><?php echo e($surats->lastItem()); ?></span> dari <span class="font-medium"><?php echo e($surats->total()); ?></span> hasil
                        </p>
                    </div>
                    
                    <div>
                        <?php echo e($surats->links()); ?>

                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\IZSAA\JOKIAN\SEPTEMBER\arsip-surat\resources\views/surat/index.blade.php ENDPATH**/ ?>