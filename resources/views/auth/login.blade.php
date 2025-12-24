<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Arsip Surat Ngodingyuk</title>
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
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
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.5s ease-out',
                        'float': 'float 3s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
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
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #f093fb 50%, #4facfe 75%, #00f2fe 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-3 sm:p-4">
    <div class="w-full max-w-md animate-fade-in">
        <!-- Login Card -->
        <div class="glass-effect rounded-xl sm:rounded-2xl shadow-2xl overflow-hidden animate-slide-up">
            <!-- Header -->
            <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 px-4 sm:px-6 py-6 sm:py-10 text-center relative overflow-hidden">
                <!-- Animated Background Elements -->
                <div class="absolute inset-0 opacity-20">
                    <div class="absolute top-0 left-0 w-24 h-24 sm:w-32 sm:h-32 bg-white rounded-full -translate-x-1/2 -translate-y-1/2 animate-float"></div>
                    <div class="absolute bottom-0 right-0 w-16 h-16 sm:w-24 sm:h-24 bg-white rounded-full translate-x-1/2 translate-y-1/2 animate-float" style="animation-delay: 1s;"></div>
                </div>
                
                <div class="relative z-10">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 bg-white rounded-xl sm:rounded-2xl flex items-center justify-center mx-auto mb-3 sm:mb-4 shadow-lg transform hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-archive text-3xl sm:text-4xl bg-gradient-to-r from-indigo-600 to-pink-500 bg-clip-text text-transparent"></i>
                    </div>
                    <h1 class="text-2xl sm:text-3xl font-bold text-white mb-1 sm:mb-2 tracking-tight">
                        Arsip Surat
                    </h1>
                    <p class="text-lg sm:text-xl font-semibold text-white/90 mb-1">
                        Ngodingyuk
                    </p>
                    <p class="text-indigo-100 mt-1 sm:mt-2 text-xs sm:text-sm font-medium">
                        <i class="fas fa-shield-alt mr-1"></i>Panel Admin
                    </p>
                </div>
            </div>
            
            <!-- Login Form -->
            <div class="px-4 sm:px-6 md:px-8 py-6 sm:py-8">
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label for="email" class="block text-xs sm:text-sm font-semibold text-gray-700">
                            <i class="fas fa-envelope mr-2 text-indigo-600"></i>Email
                        </label>
                        <div class="relative">
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                class="w-full px-3 sm:px-4 py-2.5 sm:py-3.5 pl-9 sm:pl-11 text-sm sm:text-base border-2 border-gray-200 rounded-lg sm:rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 input-focus @error('email') border-red-400 focus:ring-red-400 focus:border-red-400 @enderror"
                                placeholder="Masukkan email Anda"
                                required
                                autofocus
                            >
                            <i class="fas fa-envelope absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
                        </div>
                        @error('email')
                            <p class="mt-1 text-xs sm:text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <!-- Password Field -->
                    <div class="space-y-2">
                        <label for="password" class="block text-xs sm:text-sm font-semibold text-gray-700">
                            <i class="fas fa-lock mr-2 text-indigo-600"></i>Password
                        </label>
                        <div class="relative">
                            <input 
                                type="password" 
                                id="password" 
                                name="password" 
                                class="w-full px-3 sm:px-4 py-2.5 sm:py-3.5 pl-9 sm:pl-11 pr-9 sm:pr-11 text-sm sm:text-base border-2 border-gray-200 rounded-lg sm:rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 input-focus @error('password') border-red-400 focus:ring-red-400 focus:border-red-400 @enderror"
                                placeholder="Masukkan password Anda"
                                required
                            >
                            <i class="fas fa-lock absolute left-3 sm:left-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
                            <button 
                                type="button" 
                                onclick="togglePassword()"
                                class="absolute right-3 sm:right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-indigo-600 transition-colors duration-200 p-1"
                            >
                                <i id="password-icon" class="fas fa-eye text-sm"></i>
                            </button>
                        </div>
                        @error('password')
                            <p class="mt-1 text-xs sm:text-sm text-red-600 flex items-center">
                                <i class="fas fa-exclamation-circle mr-1"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>
                    
                    <!-- Login Button -->
                    <button 
                        type="submit" 
                        class="w-full bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 text-white py-3 sm:py-3.5 px-4 rounded-lg sm:rounded-xl hover:from-indigo-700 hover:via-purple-700 hover:to-pink-600 focus:ring-4 focus:ring-indigo-300 focus:ring-offset-2 transition-all duration-200 font-semibold text-sm sm:text-base shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
                    >
                        <i class="fas fa-sign-in-alt mr-2"></i>Masuk ke Sistem
                    </button>
                </form>
                
              
            </div>
        </div>
        
        <!-- Footer -->
        <div class="text-center mt-4 sm:mt-6 animate-fade-in px-2">
            <p class="text-xs sm:text-sm text-white/90 font-medium">
                <i class="fas fa-copyright mr-1"></i>{{ date('Y') }} <span class="font-semibold">Arsip Surat Ngodingyuk</span>. All rights reserved.
            </p>
            <p class="text-xs text-white/70 mt-1 sm:mt-2">
                Made with <i class="fas fa-heart text-red-400"></i> by Ngodingyuk Team
            </p>
        </div>
    </div>
    
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }
        
        // Add smooth animations on load
        document.addEventListener('DOMContentLoaded', function() {
            const card = document.querySelector('.glass-effect');
            if (card) {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'all 0.5s ease-out';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100);
            }
        });
    </script>
</body>
</html>
