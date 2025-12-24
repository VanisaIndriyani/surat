<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Arsip Surat'); ?></title>
    
    <!-- Vite Assets -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: {
                            50: '#f0f4f8',
                            100: '#d9e2ec',
                            200: '#bcccdc',
                            300: '#9fb3c8',
                            400: '#829ab1',
                            500: '#627d98',
                            600: '#486581',
                            700: '#334e68',
                            800: '#243b53',
                            900: '#102a43',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }
        
        @media (max-width: 768px) {
            .sidebar-mobile {
                transform: translateX(-100%);
            }
            
            .sidebar-mobile.show {
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar-transition bg-navy-800 text-white w-64 flex-shrink-0 hidden md:block relative">
            <div class="p-4">
                <h1 class="text-xl font-bold text-white">Arsip Surat</h1>
            </div>
            
            <nav class="mt-8">
                <div class="px-4 space-y-2">
                    <a href="<?php echo e(route('dashboard')); ?>" class="flex items-center px-4 py-2 text-gray-300 hover:bg-navy-700 hover:text-white rounded-lg transition-colors <?php echo e(request()->routeIs('dashboard') ? 'bg-navy-700 text-white' : ''); ?>">
                        <i class="fas fa-home w-5 h-5 mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                    
                    <a href="<?php echo e(route('surat.index', ['jenis' => 'masuk'])); ?>" class="flex items-center px-4 py-2 text-gray-300 hover:bg-navy-700 hover:text-white rounded-lg transition-colors <?php echo e(request()->get('jenis') == 'masuk' ? 'bg-navy-700 text-white' : ''); ?>">
                        <i class="fas fa-inbox w-5 h-5 mr-3"></i>
                        <span>Surat Masuk</span>
                    </a>
                    
                    <a href="<?php echo e(route('surat.index', ['jenis' => 'keluar'])); ?>" class="flex items-center px-4 py-2 text-gray-300 hover:bg-navy-700 hover:text-white rounded-lg transition-colors <?php echo e(request()->get('jenis') == 'keluar' ? 'bg-navy-700 text-white' : ''); ?>">
                        <i class="fas fa-paper-plane w-5 h-5 mr-3"></i>
                        <span>Surat Keluar</span>
                    </a>
                    
                    <a href="<?php echo e(route('surat.create')); ?>" class="flex items-center px-4 py-2 text-gray-300 hover:bg-navy-700 hover:text-white rounded-lg transition-colors <?php echo e(request()->routeIs('surat.create') ? 'bg-navy-700 text-white' : ''); ?>">
                        <i class="fas fa-plus w-5 h-5 mr-3"></i>
                        <span>Tambah Surat</span>
                    </a>
                </div>
            </nav>
            
            <div class="absolute bottom-0 w-full p-4">
              
                
                <form method="POST" action="<?php echo e(route('logout')); ?>" class="mt-2">
                    <?php echo csrf_field(); ?>
                  
                </form>
            </div>
        </div>
        
        <!-- Mobile Sidebar Overlay -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden hidden" onclick="toggleSidebar()"></div>
        
        <!-- Mobile Sidebar -->
        <div id="mobile-sidebar" class="sidebar-transition sidebar-mobile fixed left-0 top-0 h-full w-64 bg-navy-800 text-white z-50 md:hidden relative">
            <div class="p-4">
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-bold text-white">Arsip Surat</h1>
                    <button onclick="toggleSidebar()" class="text-white hover:text-gray-300">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            
            <nav class="mt-8">
                <div class="px-4 space-y-2">
                    <a href="<?php echo e(route('dashboard')); ?>" class="flex items-center px-4 py-2 text-gray-300 hover:bg-navy-700 hover:text-white rounded-lg transition-colors <?php echo e(request()->routeIs('dashboard') ? 'bg-navy-700 text-white' : ''); ?>" onclick="toggleSidebar()">
                        <i class="fas fa-home w-5 h-5 mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                    
                    <a href="<?php echo e(route('surat.index', ['jenis' => 'masuk'])); ?>" class="flex items-center px-4 py-2 text-gray-300 hover:bg-navy-700 hover:text-white rounded-lg transition-colors <?php echo e(request()->get('jenis') == 'masuk' ? 'bg-navy-700 text-white' : ''); ?>" onclick="toggleSidebar()">
                        <i class="fas fa-inbox w-5 h-5 mr-3"></i>
                        <span>Surat Masuk</span>
                    </a>
                    
                    <a href="<?php echo e(route('surat.index', ['jenis' => 'keluar'])); ?>" class="flex items-center px-4 py-2 text-gray-300 hover:bg-navy-700 hover:text-white rounded-lg transition-colors <?php echo e(request()->get('jenis') == 'keluar' ? 'bg-navy-700 text-white' : ''); ?>" onclick="toggleSidebar()">
                        <i class="fas fa-paper-plane w-5 h-5 mr-3"></i>
                        <span>Surat Keluar</span>
                    </a>
                    
                    <a href="<?php echo e(route('surat.create')); ?>" class="flex items-center px-4 py-2 text-gray-300 hover:bg-navy-700 hover:text-white rounded-lg transition-colors <?php echo e(request()->routeIs('surat.create') ? 'bg-navy-700 text-white' : ''); ?>" onclick="toggleSidebar()">
                        <i class="fas fa-plus w-5 h-5 mr-3"></i>
                        <span>Tambah Surat</span>
                    </a>
                    
                    <hr class="my-4 border-navy-600">
                    
                    <a href="<?php echo e(route('profile.index')); ?>" class="flex items-center px-4 py-2 text-gray-300 hover:bg-navy-700 hover:text-white rounded-lg transition-colors <?php echo e(request()->routeIs('profile.index') ? 'bg-navy-700 text-white' : ''); ?>" onclick="toggleSidebar()">
                        <i class="fas fa-user-cog w-5 h-5 mr-3"></i>
                        <span>Profile Admin</span>
                    </a>
                </div>
            </nav>
            
            <div class="absolute bottom-0 w-full p-4">
                <div class="flex items-center px-4 py-2 text-gray-300">
                    <i class="fas fa-user w-5 h-5 mr-3"></i>
                    <span><?php echo e(Auth::user()->name ?? 'Admin'); ?></span>
                </div>
                
                <form method="POST" action="<?php echo e(route('logout')); ?>" class="mt-2">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="flex items-center w-full px-4 py-2 text-gray-300 hover:bg-navy-700 hover:text-white rounded-lg transition-colors">
                        <i class="fas fa-sign-out-alt w-5 h-5 mr-3"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-4 py-3">
                    <div class="flex items-center">
                        <button onclick="toggleSidebar()" class="md:hidden text-gray-600 hover:text-gray-900 mr-3">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h2 class="text-lg font-semibold text-gray-900"><?php echo $__env->yieldContent('header', 'Dashboard'); ?></h2>
                    </div>
                    
                    <!-- Profile Dropdown -->
                    <div class="relative">
                        <button onclick="toggleProfileDropdown()" class="flex items-center text-gray-600 hover:text-gray-900 focus:outline-none">
                            <div class="w-8 h-8 bg-navy-600 rounded-full flex items-center justify-center mr-2">
                                <i class="fas fa-user text-white text-sm"></i>
                            </div>
                            <span class="hidden md:block text-sm font-medium"><?php echo e(Auth::user()->name); ?></span>
                            <i class="fas fa-chevron-down ml-2 text-xs"></i>
                        </button>
                        
                        <div id="profile-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                            <div class="py-1">
                                <a href="<?php echo e(route('profile.index')); ?>" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user-cog mr-3"></i>
                                    Profile Settings
                                </a>
                                <hr class="my-1">
                                <form method="POST" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="flex items-center w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <i class="fas fa-sign-out-alt mr-3"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-4">
                <?php if(session('success')): ?>
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
                
                <?php if(session('error')): ?>
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>
                
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>
    
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('mobile-sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            
            if (sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
                overlay.classList.add('hidden');
            } else {
                sidebar.classList.add('show');
                overlay.classList.remove('hidden');
            }
        }
        
        function toggleProfileDropdown() {
            const dropdown = document.getElementById('profile-dropdown');
            dropdown.classList.toggle('hidden');
        }
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('profile-dropdown');
            const button = event.target.closest('button');
            
            if (!button || !button.onclick || button.onclick.toString().indexOf('toggleProfileDropdown') === -1) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
<?php /**PATH D:\IZSAA\JOKIAN\SEPTEMBER\arsip-surat\resources\views/layouts/app.blade.php ENDPATH**/ ?>