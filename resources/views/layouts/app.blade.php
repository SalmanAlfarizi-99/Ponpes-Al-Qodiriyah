<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - {{ config('app.name', 'Ponpes Management') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        },
                        accent: {
                            50: '#fffbeb',
                            100: '#fef3c7',
                            200: '#fde68a',
                            300: '#fcd34d',
                            400: '#fbbf24',
                            500: '#f59e0b',
                            600: '#d97706',
                            700: '#b45309',
                            800: '#92400e',
                            900: '#78350f',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine.js for interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Heroicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        [x-cloak] { display: none !important; }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        
        /* Smooth transitions */
        .sidebar-link {
            transition: all 0.2s ease-in-out;
        }
        .sidebar-link:hover {
            transform: translateX(4px);
        }
    </style>
    
    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900" x-data="{ sidebarOpen: window.innerWidth >= 768, mobileMenuOpen: false, darkMode: false }">
    @php
        use App\Models\ContentSetting;
        $siteContent = ContentSetting::all()->pluck('value', 'key');
    @endphp
    <div class="min-h-screen flex">
        <!-- Mobile Sidebar Overlay -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="mobileMenuOpen = false"
             class="fixed inset-0 bg-black/50 z-40 md:hidden" x-cloak>
        </div>
        
        <!-- Sidebar -->
        <aside 
            :class="[
                mobileMenuOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0',
                sidebarOpen ? 'md:w-64' : 'md:w-20',
                'w-64'
            ]"
            class="fixed inset-y-0 left-0 z-50 bg-gradient-to-b from-primary-800 to-primary-900 text-white transition-all duration-300 ease-in-out shadow-xl"
        >
            <!-- Logo Section -->
            <div class="h-16 flex items-center justify-between border-b border-primary-700/50 px-4">
                <div class="flex items-center space-x-3">
                    @if(!empty($siteContent['brand_logo_url']))
                    <img src="{{ $siteContent['brand_logo_url'] }}" alt="{{ $siteContent['brand_name'] ?? 'Logo' }}" class="w-10 h-10 rounded-lg object-cover">
                    @else
                    <div class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center">
                        <i class="fas fa-mosque text-accent-400 text-xl"></i>
                    </div>
                    @endif
                    <span x-show="sidebarOpen || mobileMenuOpen" x-cloak class="font-bold text-lg whitespace-nowrap">{{ $siteContent['brand_name'] ?? 'Ponpes' }}</span>
                </div>
                <!-- Close button for mobile -->
                <button @click="mobileMenuOpen = false" class="md:hidden p-2 rounded-lg hover:bg-white/10">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <!-- Navigation -->
            <nav class="mt-6 px-3 overflow-y-auto" style="max-height: calc(100vh - 180px);">
                <div class="space-y-1">
                    @php
                        $user = auth()->user();
                        $isAdmin = $user && ($user->isAdmin() || $user->isSuperAdmin());
                        $isTeacher = $user && $user->isTeacher();
                        $isStudent = $user && $user->isStudent();
                        $isParent = $user && $user->isParent();
                    @endphp
                    
                    @if($isAdmin || $isTeacher)
                    <!-- Dashboard (Admin & Teacher only) -->
                    <a href="{{ route('dashboard') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('dashboard') || request()->routeIs('home') ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-th-large w-5 text-center"></i>
                        <span x-show="sidebarOpen || mobileMenuOpen" x-cloak class="ml-3">Dashboard</span>
                    </a>
                    @endif
                    
                    @if($isAdmin)
                    <!-- User Management (Admin Only) -->
                    <a href="{{ route('users.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('users.*') ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-users-cog w-5 text-center"></i>
                        <span x-show="sidebarOpen || mobileMenuOpen" x-cloak class="ml-3">Manajemen User</span>
                    </a>
                    
                    <!-- Santri (Admin Only) -->
                    <a href="{{ route('santri.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('santri.*') ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-user-graduate w-5 text-center"></i>
                        <span x-show="sidebarOpen || mobileMenuOpen" x-cloak class="ml-3">Santri</span>
                    </a>
                    
                    <!-- Teachers (Admin Only) -->
                    <a href="{{ route('teachers.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('teachers.*') ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-chalkboard-teacher w-5 text-center"></i>
                        <span x-show="sidebarOpen || mobileMenuOpen" x-cloak class="ml-3">Ustadz/Ustadzah</span>
                    </a>
                    
                    <!-- Classes (Admin Only) -->
                    <a href="{{ route('classes.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('classes.*') ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-school w-5 text-center"></i>
                        <span x-show="sidebarOpen || mobileMenuOpen" x-cloak class="ml-3">Kelas</span>
                    </a>
                    
                    <!-- Attendance (Admin Only) -->
                    <a href="{{ route('attendances.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('attendances.*') ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-clipboard-check w-5 text-center"></i>
                        <span x-show="sidebarOpen || mobileMenuOpen" x-cloak class="ml-3">Absensi</span>
                    </a>
                    
                    <!-- Payments (Admin Only) -->
                    <a href="{{ route('payments.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('payments.*') ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-money-bill-wave w-5 text-center"></i>
                        <span x-show="sidebarOpen || mobileMenuOpen" x-cloak class="ml-3">Keuangan</span>
                    </a>
                    
                    <!-- Content Management (Admin Only) -->
                    <a href="{{ route('content.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('content.*') ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-palette w-5 text-center"></i>
                        <span x-show="sidebarOpen || mobileMenuOpen" x-cloak class="ml-3">Kelola Konten</span>
                    </a>
                    
                    <!-- Info Pages Management (Admin Only) -->
                    <a href="{{ route('info-pages.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('info-pages.*') ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-file-alt w-5 text-center"></i>
                        <span x-show="sidebarOpen || mobileMenuOpen" x-cloak class="ml-3">Halaman Info</span>
                    </a>
                    @endif
                    
                    @if($isTeacher)
                    <!-- Teacher Menu: Classes they teach -->
                    <a href="{{ route('classes.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('classes.*') ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-school w-5 text-center"></i>
                        <span x-show="sidebarOpen || mobileMenuOpen" x-cloak class="ml-3">Kelas Saya</span>
                    </a>
                    
                    <!-- Teacher Menu: Attendance -->
                    <a href="{{ route('attendances.index') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('attendances.*') ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-clipboard-check w-5 text-center"></i>
                        <span x-show="sidebarOpen || mobileMenuOpen" x-cloak class="ml-3">Absensi</span>
                    </a>
                    @endif
                    
                    @if($isStudent || $isParent)
                    <!-- Student/Parent Home -->
                    <a href="{{ route('dashboard') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('dashboard') || request()->routeIs('home') ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-home w-5 text-center"></i>
                        <span x-show="sidebarOpen || mobileMenuOpen" x-cloak class="ml-3">Beranda</span>
                    </a>
                    
                    <!-- Dynamic Info Pages for Students -->
                    @php
                        $infoPages = \App\Models\InfoPage::active()->inMenu()->orderBy('order')->get();
                    @endphp
                    @foreach($infoPages as $infoPage)
                    <a href="{{ route('info.show', $infoPage->slug) }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->is('info/' . $infoPage->slug) ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="{{ $infoPage->icon }} w-5 text-center"></i>
                        <span x-show="sidebarOpen || mobileMenuOpen" x-cloak class="ml-3">{{ $infoPage->title }}</span>
                    </a>
                    @endforeach
                    @endif
                </div>
                
                <!-- Section Divider -->
                <div class="mt-8 mb-4 px-4">
                    <div class="h-px bg-primary-700/50"></div>
                    <span x-show="sidebarOpen || mobileMenuOpen" x-cloak class="block mt-4 text-xs font-semibold text-primary-400 uppercase tracking-wider">Pengaturan</span>
                </div>
                
                <div class="space-y-1">
                    <!-- Profile -->
                    <a href="{{ route('profile.show') }}" class="sidebar-link flex items-center px-4 py-3 rounded-lg {{ request()->routeIs('profile.*') ? 'bg-white/10 text-white' : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                        <i class="fas fa-user-cog w-5 text-center"></i>
                        <span x-show="sidebarOpen || mobileMenuOpen" x-cloak class="ml-3">Profil</span>
                    </a>
                </div>
            </nav>
            
            <!-- User Section at Bottom -->
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-primary-700/50">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <div x-show="sidebarOpen || mobileMenuOpen" x-cloak class="ml-3 flex-1 min-w-0">
                        <p class="text-sm font-medium text-white truncate">{{ auth()->user()->name ?? 'User' }}</p>
                        <p class="text-xs text-primary-300 truncate">{{ auth()->user()->role->name ?? 'Admin' }}</p>
                    </div>
                </div>
            </div>
        </aside>
        
        <!-- Main Content -->
        <div :class="sidebarOpen ? 'md:ml-64' : 'md:ml-20'" class="flex-1 transition-all duration-300 w-full">
            <!-- Top Header -->
            <header class="h-16 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between px-4 md:px-6 sticky top-0 z-40">
                <!-- Left: Toggle & Breadcrumb -->
                <div class="flex items-center space-x-4">
                    <!-- Mobile menu button -->
                    <button @click="mobileMenuOpen = true" class="md:hidden p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <i class="fas fa-bars text-gray-600 dark:text-gray-300"></i>
                    </button>
                    <!-- Desktop sidebar toggle -->
                    <button @click="sidebarOpen = !sidebarOpen" class="hidden md:block p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <i class="fas fa-bars text-gray-600 dark:text-gray-300"></i>
                    </button>
                    <div class="hidden md:flex items-center text-sm text-gray-500 dark:text-gray-400">
                        <a href="{{ route('dashboard') }}" class="hover:text-primary-600">Dashboard</a>
                        @hasSection('breadcrumb')
                            <i class="fas fa-chevron-right mx-2 text-xs"></i>
                            @yield('breadcrumb')
                        @endif
                    </div>
                </div>
                
                <!-- Right: Actions -->
                <div class="flex items-center space-x-2 md:space-x-4">
                    <!-- Notifications Dropdown -->
                    <div class="relative" x-data="{ notifOpen: false }">
                        <button @click="notifOpen = !notifOpen" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 relative transition-colors">
                            <i class="fas fa-bell text-gray-600 dark:text-gray-300"></i>
                            @php
                                $unreadCount = \App\Models\Announcement::where('status', 'published')->where('published_at', '>=', now()->subDays(7))->count();
                            @endphp
                            @if($unreadCount > 0)
                                <span class="absolute top-1 right-1 w-4 h-4 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">{{ $unreadCount > 9 ? '9+' : $unreadCount }}</span>
                            @endif
                        </button>
                        
                        <!-- Notification Dropdown -->
                        <div x-show="notifOpen" @click.away="notifOpen = false" x-cloak
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-80 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 z-50">
                            <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Notifikasi</h3>
                            </div>
                            <div class="max-h-64 overflow-y-auto">
                                @php
                                    $notifications = \App\Models\Announcement::where('status', 'published')
                                        ->orderBy('published_at', 'desc')
                                        ->take(5)
                                        ->get();
                                @endphp
                                @forelse($notifications as $notif)
                                    <div class="px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 border-b border-gray-100 dark:border-gray-700 last:border-0">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $notif->title }}</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ Str::limit($notif->content, 60) }}</p>
                                        <p class="text-xs text-gray-400 mt-1">{{ $notif->published_at?->diffForHumans() ?? 'Baru saja' }}</p>
                                    </div>
                                @empty
                                    <div class="px-4 py-8 text-center text-gray-500">
                                        <i class="fas fa-bell-slash text-2xl mb-2 opacity-50"></i>
                                        <p class="text-sm">Tidak ada notifikasi</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    
                    <!-- User Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 md:space-x-3 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <div class="w-8 h-8 rounded-full bg-primary-100 dark:bg-primary-800 flex items-center justify-center">
                                <i class="fas fa-user text-primary-600 dark:text-primary-300 text-sm"></i>
                            </div>
                            <span class="hidden md:block text-sm font-medium text-gray-700 dark:text-gray-200">{{ auth()->user()->name ?? 'User' }}</span>
                            <i class="hidden md:block fas fa-chevron-down text-xs text-gray-400"></i>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div x-show="open" @click.away="open = false" x-cloak
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 py-1 z-50"
                        >
                            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <i class="fas fa-user mr-2"></i> Profil Saya
                            </a>
                            <div class="border-t border-gray-200 dark:border-gray-700 my-1"></div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="p-4 md:p-6">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg flex items-center space-x-3">
                        <i class="fas fa-check-circle text-green-500"></i>
                        <span class="text-green-700 dark:text-green-300">{{ session('success') }}</span>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg flex items-center space-x-3">
                        <i class="fas fa-exclamation-circle text-red-500"></i>
                        <span class="text-red-700 dark:text-red-300">{{ session('error') }}</span>
                    </div>
                @endif
                
                @yield('content')
            </main>
            
            <!-- Footer -->
            <footer class="border-t border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 py-4 px-6">
                <div class="text-center text-sm text-gray-500 dark:text-gray-400">
                    &copy; {{ date('Y') }} Pondok Pesantren Management System. All rights reserved.
                </div>
            </footer>
        </div>
    </div>
    
    @stack('scripts')
</body>
</html>
