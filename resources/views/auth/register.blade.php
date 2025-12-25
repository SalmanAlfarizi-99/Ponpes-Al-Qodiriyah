<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="{{ asset('assets/icon/favicon.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @php
        use App\Models\ContentSetting;
        $content = ContentSetting::all()->pluck('value', 'key');
    @endphp
    <title>Daftar - {{ $content['brand_name'] ?? 'Pondok Pesantren Digital' }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { 'sans': ['Poppins', 'system-ui', 'sans-serif'] },
                    colors: {
                        primary: { 50: '#f0fdf4', 100: '#dcfce7', 200: '#bbf7d0', 300: '#86efac', 400: '#4ade80', 500: '#22c55e', 600: '#16a34a', 700: '#15803d', 800: '#166534', 900: '#14532d' },
                        accent: { 400: '#fbbf24', 500: '#f59e0b', 600: '#d97706' }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-out',
                    },
                    keyframes: {
                        fadeIn: { '0%': { opacity: '0', transform: 'translateY(10px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } },
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .input-focus:focus { box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.15); }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100 min-h-screen flex items-center justify-center p-4" x-data="{ showPassword: false, showConfirmPassword: false }">
    
    <!-- Register Card -->
    <div class="w-full max-w-md animate-fade-in">
        <!-- Logo -->
        <div class="text-center mb-8">
            <a href="{{ url('/') }}" class="inline-block mb-4">
                @if(!empty($content['brand_logo_url']))
                <img src="{{ $content['brand_logo_url'] }}" alt="{{ $content['brand_name'] ?? 'Logo' }}" class="w-20 h-20 mx-auto rounded-2xl shadow-xl object-cover">
                @else
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-primary-600 to-primary-800 rounded-2xl shadow-xl">
                    <i class="fas fa-mosque text-white text-4xl"></i>
                </div>
                @endif
            </a>
            <h1 class="text-2xl font-bold text-gray-900">{{ $content['brand_name'] ?? 'Ponpes Digital' }}</h1>
            <p class="text-gray-500 text-sm">{{ $content['brand_tagline'] ?? 'Sistem Manajemen Pesantren' }}</p>
        </div>
        
        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <div class="text-center mb-6">
                <h2 class="text-xl font-bold text-gray-900">Buat Akun Baru</h2>
                <p class="text-gray-500 text-sm mt-1">Daftar untuk mengakses sistem</p>
            </div>
            
            <!-- Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">
                        Nama Lengkap
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fas fa-user"></i>
                        </span>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ old('name') }}"
                            required 
                            autofocus
                            class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 focus:border-primary-500 focus:ring-0 input-focus transition-all @error('name') border-red-500 @enderror"
                            placeholder="Masukkan nama lengkap"
                        >
                    </div>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1.5"><i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">
                        Email
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            value="{{ old('email') }}"
                            required
                            class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-300 focus:border-primary-500 focus:ring-0 input-focus transition-all @error('email') border-red-500 @enderror"
                            placeholder="nama@email.com"
                        >
                    </div>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1.5"><i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">
                        Password
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input 
                            :type="showPassword ? 'text' : 'password'" 
                            id="password" 
                            name="password" 
                            required
                            class="w-full pl-11 pr-12 py-3 rounded-xl border border-gray-300 focus:border-primary-500 focus:ring-0 input-focus transition-all @error('password') border-red-500 @enderror"
                            placeholder="Minimal 8 karakter"
                        >
                        <button 
                            type="button" 
                            @click="showPassword = !showPassword"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors"
                        >
                            <i :class="showPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1.5"><i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Confirm Password -->
                <div>
                    <label for="password-confirm" class="block text-sm font-medium text-gray-700 mb-1.5">
                        Konfirmasi Password
                    </label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input 
                            :type="showConfirmPassword ? 'text' : 'password'" 
                            id="password-confirm" 
                            name="password_confirmation" 
                            required
                            class="w-full pl-11 pr-12 py-3 rounded-xl border border-gray-300 focus:border-primary-500 focus:ring-0 input-focus transition-all"
                            placeholder="Ulangi password"
                        >
                        <button 
                            type="button" 
                            @click="showConfirmPassword = !showConfirmPassword"
                            class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors"
                        >
                            <i :class="showConfirmPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Terms -->
                <div class="flex items-start">
                    <input type="checkbox" id="terms" required class="w-4 h-4 mt-0.5 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                    <label for="terms" class="ml-2 text-sm text-gray-600">
                        Saya menyetujui <a href="#" class="text-primary-600 hover:text-primary-700 font-medium">Syarat & Ketentuan</a> serta <a href="#" class="text-primary-600 hover:text-primary-700 font-medium">Kebijakan Privasi</a>
                    </label>
                </div>
                
                <!-- Submit -->
                <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-semibold rounded-xl shadow-lg transition-all duration-300 flex items-center justify-center space-x-2">
                    <i class="fas fa-user-plus"></i>
                    <span>Daftar</span>
                </button>
            </form>
            
            <!-- Divider -->
            <div class="my-6 flex items-center">
                <div class="flex-1 h-px bg-gray-200"></div>
                <span class="px-4 text-sm text-gray-400">atau</span>
                <div class="flex-1 h-px bg-gray-200"></div>
            </div>
            
            <!-- Login Link -->
            <div class="text-center">
                <p class="text-gray-600 text-sm">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="text-primary-600 hover:text-primary-700 font-semibold">
                        Masuk di sini
                    </a>
                </p>
            </div>
        </div>
        
        <!-- Back to Home -->
        <div class="text-center mt-6">
            <a href="{{ url('/') }}" class="text-gray-500 hover:text-gray-700 text-sm transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Beranda
            </a>
        </div>
        
        <!-- Footer -->
        <p class="text-center text-gray-400 text-sm mt-4">
            &copy; {{ date('Y') }} Ponpes Digital. All rights reserved.
        </p>
    </div>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>
