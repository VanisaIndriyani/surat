<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Arsip Surat Ngodingyuk'); ?></title>
    
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
                    },
                    animation: {
                        'slide-in': 'slideIn 0.3s ease-out',
                        'fade-in': 'fadeIn 0.3s ease-out',
                    },
                    keyframes: {
                        slideIn: {
                            '0%': { transform: 'translateX(-100%)' },
                            '100%': { transform: 'translateX(0)' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }
        
        .sidebar-gradient {
            background: linear-gradient(180deg, #667eea 0%, #764ba2 50%, #243b53 100%);
        }
        
        .nav-item {
            transition: all 0.2s ease;
        }
        
        .nav-item:hover {
            transform: translateX(4px);
        }
        
        .nav-item.active {
            background: rgba(255, 255, 255, 0.15);
            border-left: 3px solid #fff;
        }
        
        @media (max-width: 768px) {
            .sidebar-mobile {
                transform: translateX(-100%);
            }
            
            .sidebar-mobile.show {
                transform: translateX(0);
            }
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="sidebar-transition sidebar-gradient text-white w-64 flex-shrink-0 hidden md:block relative shadow-2xl">
            <div class="p-6 border-b border-white/10">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-archive text-2xl bg-gradient-to-r from-indigo-600 to-pink-500 bg-clip-text text-transparent"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold text-white">Arsip Surat</h1>
                        <p class="text-xs text-white/80 font-medium">Ngodingyuk</p>
                    </div>
                </div>
            </div>
            
            <nav class="mt-6">
                <div class="px-4 space-y-1">
                    <a href="<?php echo e(route('dashboard')); ?>" class="nav-item flex items-center px-4 py-3 text-white/90 hover:text-white rounded-xl <?php echo e(request()->routeIs('dashboard') ? 'active text-white' : ''); ?>">
                        <i class="fas fa-home w-5 h-5 mr-3"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                    
                    <a href="<?php echo e(route('surat.index', ['jenis' => 'masuk'])); ?>" class="nav-item flex items-center px-4 py-3 text-white/90 hover:text-white rounded-xl <?php echo e(request()->get('jenis') == 'masuk' ? 'active text-white' : ''); ?>">
                        <i class="fas fa-inbox w-5 h-5 mr-3"></i>
                        <span class="font-medium">Surat Masuk</span>
                    </a>
                    
                    <a href="<?php echo e(route('surat.index', ['jenis' => 'keluar'])); ?>" class="nav-item flex items-center px-4 py-3 text-white/90 hover:text-white rounded-xl <?php echo e(request()->get('jenis') == 'keluar' ? 'active text-white' : ''); ?>">
                        <i class="fas fa-paper-plane w-5 h-5 mr-3"></i>
                        <span class="font-medium">Surat Keluar</span>
                    </a>
                    
                    <a href="<?php echo e(route('surat.create')); ?>" class="nav-item flex items-center px-4 py-3 text-white/90 hover:text-white rounded-xl <?php echo e(request()->routeIs('surat.create') ? 'active text-white' : ''); ?>">
                        <i class="fas fa-plus w-5 h-5 mr-3"></i>
                        <span class="font-medium">Tambah Surat</span>
                    </a>
                    
                    <hr class="my-4 border-white/10">
                    
                    <a href="<?php echo e(route('profile.index')); ?>" class="nav-item flex items-center px-4 py-3 text-white/90 hover:text-white rounded-xl <?php echo e(request()->routeIs('profile.index') ? 'active text-white' : ''); ?>">
                        <i class="fas fa-user-cog w-5 h-5 mr-3"></i>
                        <span class="font-medium">Profile Admin</span>
                    </a>
                </div>
            </nav>
            
            <div class="absolute bottom-0 w-full p-4 border-t border-white/10 bg-white/5">
                <div class="flex items-center px-4 py-3 mb-2 bg-white/10 rounded-xl">
                    <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-user text-indigo-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-white"><?php echo e(Auth::user()->name ?? 'Admin'); ?></p>
                        <p class="text-xs text-white/70">Administrator</p>
                    </div>
                </div>
                
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="w-full flex items-center justify-center px-4 py-3 text-white/90 hover:text-white hover:bg-white/10 rounded-xl transition-all duration-200 font-medium">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Mobile Sidebar Overlay -->
        <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden hidden" onclick="toggleSidebar()"></div>
        
        <!-- Mobile Sidebar -->
        <div id="mobile-sidebar" class="sidebar-transition sidebar-mobile fixed left-0 top-0 h-full w-64 sidebar-gradient text-white z-50 md:hidden relative shadow-2xl">
            <div class="p-6 border-b border-white/10">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center">
                            <i class="fas fa-archive text-xl bg-gradient-to-r from-indigo-600 to-pink-500 bg-clip-text text-transparent"></i>
                        </div>
                        <div>
                            <h1 class="text-lg font-bold text-white">Arsip Surat</h1>
                            <p class="text-xs text-white/80 font-medium">Ngodingyuk</p>
                        </div>
                    </div>
                    <button onclick="toggleSidebar()" class="text-white hover:text-white/70 transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            
            <nav class="mt-6">
                <div class="px-4 space-y-1">
                    <a href="<?php echo e(route('dashboard')); ?>" class="nav-item flex items-center px-4 py-3 text-white/90 hover:text-white rounded-xl <?php echo e(request()->routeIs('dashboard') ? 'active text-white' : ''); ?>" onclick="toggleSidebar()">
                        <i class="fas fa-home w-5 h-5 mr-3"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                    
                    <a href="<?php echo e(route('surat.index', ['jenis' => 'masuk'])); ?>" class="nav-item flex items-center px-4 py-3 text-white/90 hover:text-white rounded-xl <?php echo e(request()->get('jenis') == 'masuk' ? 'active text-white' : ''); ?>" onclick="toggleSidebar()">
                        <i class="fas fa-inbox w-5 h-5 mr-3"></i>
                        <span class="font-medium">Surat Masuk</span>
                    </a>
                    
                    <a href="<?php echo e(route('surat.index', ['jenis' => 'keluar'])); ?>" class="nav-item flex items-center px-4 py-3 text-white/90 hover:text-white rounded-xl <?php echo e(request()->get('jenis') == 'keluar' ? 'active text-white' : ''); ?>" onclick="toggleSidebar()">
                        <i class="fas fa-paper-plane w-5 h-5 mr-3"></i>
                        <span class="font-medium">Surat Keluar</span>
                    </a>
                    
                    <a href="<?php echo e(route('surat.create')); ?>" class="nav-item flex items-center px-4 py-3 text-white/90 hover:text-white rounded-xl <?php echo e(request()->routeIs('surat.create') ? 'active text-white' : ''); ?>" onclick="toggleSidebar()">
                        <i class="fas fa-plus w-5 h-5 mr-3"></i>
                        <span class="font-medium">Tambah Surat</span>
                    </a>
                    
                    <hr class="my-4 border-white/10">
                    
                    <a href="<?php echo e(route('profile.index')); ?>" class="nav-item flex items-center px-4 py-3 text-white/90 hover:text-white rounded-xl <?php echo e(request()->routeIs('profile.index') ? 'active text-white' : ''); ?>" onclick="toggleSidebar()">
                        <i class="fas fa-user-cog w-5 h-5 mr-3"></i>
                        <span class="font-medium">Profile Admin</span>
                    </a>
                </div>
            </nav>
            
            <div class="absolute bottom-0 w-full p-4 border-t border-white/10 bg-white/5">
                <div class="flex items-center px-4 py-3 mb-2 bg-white/10 rounded-xl">
                    <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center mr-3">
                        <i class="fas fa-user text-indigo-600"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-white"><?php echo e(Auth::user()->name ?? 'Admin'); ?></p>
                        <p class="text-xs text-white/70">Administrator</p>
                    </div>
                </div>
                
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="w-full flex items-center justify-center px-4 py-3 text-white/90 hover:text-white hover:bg-white/10 rounded-xl transition-all duration-200 font-medium">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-md border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <div class="flex items-center">
                        <button onclick="toggleSidebar()" class="md:hidden text-gray-600 hover:text-indigo-600 mr-4 transition-colors">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                        <div>
                            <h2 class="text-xl font-bold text-gray-900"><?php echo $__env->yieldContent('header', 'Dashboard'); ?></h2>
                            <p class="text-xs text-gray-500 mt-0.5">Arsip Surat Ngodingyuk</p>
                        </div>
                    </div>
                    
                    <!-- Profile Dropdown -->
                    <div class="relative">
                        <button onclick="toggleProfileDropdown()" class="flex items-center space-x-3 bg-gradient-to-r from-indigo-50 to-purple-50 px-4 py-2 rounded-xl hover:from-indigo-100 hover:to-purple-100 transition-all duration-200 focus:outline-none border border-indigo-100">
                            <div class="w-10 h-10 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-lg flex items-center justify-center shadow-md">
                                <i class="fas fa-user text-white text-sm"></i>
                            </div>
                            <div class="hidden md:block text-left">
                                <p class="text-sm font-semibold text-gray-900"><?php echo e(Auth::user()->name); ?></p>
                                <p class="text-xs text-gray-500">Administrator</p>
                            </div>
                            <i class="fas fa-chevron-down text-gray-400 text-xs"></i>
                        </button>
                        
                        <div id="profile-dropdown" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-200 z-50 overflow-hidden animate-fade-in">
                            <div class="py-2">
                                <div class="px-4 py-3 bg-gradient-to-r from-indigo-50 to-purple-50 border-b border-gray-100">
                                    <p class="text-sm font-semibold text-gray-900"><?php echo e(Auth::user()->name); ?></p>
                                    <p class="text-xs text-gray-500"><?php echo e(Auth::user()->email ?? 'admin@arsip.com'); ?></p>
                                </div>
                                <a href="<?php echo e(route('profile.index')); ?>" class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-indigo-50 transition-colors">
                                    <i class="fas fa-user-cog mr-3 text-indigo-600"></i>
                                    <span>Profile Settings</span>
                                </a>
                                <hr class="my-1 border-gray-100">
                                <form method="POST" action="<?php echo e(route('logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="flex items-center w-full px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                        <i class="fas fa-sign-out-alt mr-3"></i>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gradient-to-br from-gray-50 to-gray-100 p-6">
                <?php if(session('success')): ?>
                    <div class="mb-6 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 text-green-800 px-6 py-4 rounded-lg shadow-md flex items-center animate-fade-in">
                        <i class="fas fa-check-circle mr-3 text-green-500 text-xl"></i>
                        <div>
                            <p class="font-semibold">Berhasil!</p>
                            <p class="text-sm"><?php echo e(session('success')); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if(session('error')): ?>
                    <div class="mb-6 bg-gradient-to-r from-red-50 to-rose-50 border-l-4 border-red-500 text-red-800 px-6 py-4 rounded-lg shadow-md flex items-center animate-fade-in">
                        <i class="fas fa-exclamation-circle mr-3 text-red-500 text-xl"></i>
                        <div>
                            <p class="font-semibold">Error!</p>
                            <p class="text-sm"><?php echo e(session('error')); ?></p>
                        </div>
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
<?php /**PATH D:\IZSAA\BBB\LARAVEL\SURAT\arsip-surat\resources\views/layouts/app.blade.php ENDPATH**/ ?>