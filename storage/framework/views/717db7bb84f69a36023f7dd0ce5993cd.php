

<?php $__env->startSection('title', 'Dashboard - Arsip Surat'); ?>

<?php $__env->startSection('header', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-navy-100 rounded-lg flex items-center justify-center mr-4">
                <i class="fas fa-user text-navy-800 text-xl"></i>
            </div>
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Selamat Datang, <?php echo e(Auth::user()->name ?? 'Admin'); ?>!</h2>
                <p class="text-gray-600">Kelola arsip surat masuk dan keluar dengan mudah</p>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Surat Card -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-archive text-blue-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Total Surat</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo e($totalSurat); ?></p>
                </div>
            </div>
        </div>

        <!-- Surat Masuk Card -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-inbox text-green-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Surat Masuk</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo e($suratMasuk); ?></p>
                </div>
            </div>
        </div>

        <!-- Surat Keluar Card -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-paper-plane text-orange-600 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600">Surat Keluar</p>
                    <p class="text-2xl font-bold text-gray-900"><?php echo e($suratKeluar); ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Aksi Cepat</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="<?php echo e(route('surat.create')); ?>" class="flex items-center p-4 bg-navy-50 rounded-lg hover:bg-navy-100 transition-colors">
                <div class="w-10 h-10 bg-navy-600 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-plus text-white"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Tambah Surat</p>
                    <p class="text-sm text-gray-600">Tambah surat baru</p>
                </div>
            </a>

            <a href="<?php echo e(route('surat.index', ['jenis' => 'masuk'])); ?>" class="flex items-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-colors">
                <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-inbox text-white"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Surat Masuk</p>
                    <p class="text-sm text-gray-600">Lihat surat masuk</p>
                </div>
            </a>

            <a href="<?php echo e(route('surat.index', ['jenis' => 'keluar'])); ?>" class="flex items-center p-4 bg-orange-50 rounded-lg hover:bg-orange-100 transition-colors">
                <div class="w-10 h-10 bg-orange-600 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-paper-plane text-white"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Surat Keluar</p>
                    <p class="text-sm text-gray-600">Lihat surat keluar</p>
                </div>
            </a>

            <a href="<?php echo e(route('dashboard')); ?>" class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                    <i class="fas fa-chart-bar text-white"></i>
                </div>
                <div>
                    <p class="font-medium text-gray-900">Statistik</p>
                    <p class="text-sm text-gray-600">Lihat statistik</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Aktivitas Terbaru</h3>
        <div class="space-y-4">
            <?php
                $recentSurats = \App\Models\Surat::orderBy('created_at', 'desc')->limit(5)->get();
            ?>
            
            <?php if($recentSurats->count() > 0): ?>
                <?php $__currentLoopData = $recentSurats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex items-center p-4 bg-gray-50 rounded-lg">
                    <div class="w-10 h-10 bg-navy-100 rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-<?php echo e($surat->jenis == 'masuk' ? 'inbox' : 'paper-plane'); ?> text-navy-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-gray-900"><?php echo e($surat->perihal); ?></p>
                        <p class="text-sm text-gray-600">
                            <?php echo e($surat->jenis == 'masuk' ? 'Surat Masuk' : 'Surat Keluar'); ?> • 
                            <?php echo e($surat->nomor_surat); ?> • 
                            <?php echo e($surat->created_at->diffForHumans()); ?>

                        </p>
                    </div>
                    <a href="<?php echo e(route('surat.show', $surat)); ?>" class="text-navy-600 hover:text-navy-800">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="text-center py-8">
                    <i class="fas fa-inbox text-4xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500">Belum ada surat yang ditambahkan</p>
                    <a href="<?php echo e(route('surat.create')); ?>" class="inline-block mt-2 text-navy-600 hover:text-navy-800">
                        Tambah surat pertama
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\IZSAA\JOKIAN\SEPTEMBER\arsip-surat\resources\views/dashboard.blade.php ENDPATH**/ ?>