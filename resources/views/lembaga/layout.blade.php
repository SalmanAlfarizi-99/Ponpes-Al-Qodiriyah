<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Lembaga') - Pondok Pesantren</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="@yield('favicon-url', '/assets/icon/favicon.png')">
    <link rel="apple-touch-icon" href="@yield('favicon-url', '/assets/icon/favicon.png')">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { 'sans': ['Poppins', 'system-ui', 'sans-serif'] },
                    colors: {
                        primary: { 50: '#f0fdf4', 100: '#dcfce7', 200: '#bbf7d0', 300: '#86efac', 400: '#4ade80', 500: '#22c55e', 600: '#16a34a', 700: '#15803d', 800: '#166534', 900: '#14532d' },
                        accent: { 50: '#fffbeb', 100: '#fef3c7', 200: '#fde68a', 300: '#fcd34d', 400: '#fbbf24', 500: '#f59e0b', 600: '#d97706', 700: '#b45309', 800: '#92400e', 900: '#78350f' }
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .card-hover { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
        .card-hover:hover { transform: translateY(-8px); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); }
        .text-gradient { background: linear-gradient(135deg, #16a34a 0%, #22c55e 50%, #4ade80 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        @yield('custom-styles')
    </style>
</head>
<body class="font-sans antialiased bg-white">
    
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <a href="/" class="flex items-center space-x-3">
                    @hasSection('nav-logo-url')
                    <img src="@yield('nav-logo-url')" alt="@yield('nav-brand', 'Logo')" class="w-10 h-10 rounded-lg object-contain">
                    @else
                    <div class="w-10 h-10 rounded-lg @yield('nav-gradient', 'bg-gradient-to-br from-primary-600 to-primary-800') flex items-center justify-center">
                        <i class="fas @yield('nav-icon', 'fa-mosque') text-white text-lg"></i>
                    </div>
                    @endif
                    <span class="font-bold text-gray-900">@yield('nav-brand', 'Pondok Pesantren')</span>
                </a>
                <a href="/" class="text-primary-600 hover:text-primary-700 font-medium">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <section class="relative min-h-[60vh] flex items-center @yield('hero-class', 'bg-gradient-to-br from-primary-800 via-primary-900 to-gray-900')">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%2780%27 height=%2780%27 viewBox=%270 0 80 80%27%3E%3Cg fill=%27%23ffffff%27%3E%3Cpath d=%27M40 10c-5 0-10 10-10 20h20c0-10-5-20-10-20zm-15 20H15v30h10V30zm30 0v30h10V30H55zM25 35v25h30V35H25z%27/%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 py-20 relative z-10">
            <div class="text-center">
                @yield('logo')
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white mb-6">
                    @yield('hero-title')
                </h1>
                <p class="text-xl text-white/80 max-w-3xl mx-auto">
                    @yield('hero-subtitle')
                </p>
            </div>
        </div>
    </section>
    
    <!-- Main Content -->
    @yield('content')
    
    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            @hasSection('footer-logo-url')
            <img src="@yield('footer-logo-url')" alt="Pondok Pesantren" class="w-16 h-16 rounded-xl object-contain mx-auto mb-4">
            @else
            <div class="w-16 h-16 rounded-xl bg-gradient-to-br from-primary-600 to-primary-800 flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-mosque text-white text-2xl"></i>
            </div>
            @endif
            <p class="text-gray-400 mb-4">@yield('footer-yayasan', 'Bagian dari Yayasan Pondok Pesantren')</p>
            <a href="/" class="inline-flex items-center px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition">
                <i class="fas fa-home mr-2"></i> Kembali ke Beranda
            </a>
            <p class="text-gray-500 text-sm mt-6">@yield('footer-copyright', '© 2025 Pondok Pesantren Digital. All rights reserved.')</p>
        </div>
    </footer>
    
</body>
</html>
