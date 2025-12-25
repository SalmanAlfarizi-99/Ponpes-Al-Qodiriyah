<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pondok Pesantren - Sistem Manajemen Modern</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/icon/favicon.png">
    <link rel="apple-touch-icon" href="/assets/icon/favicon.png">
    
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
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .card-hover { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
        .card-hover:hover { transform: translateY(-8px); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); }
        .text-gradient { background: linear-gradient(135deg, #16a34a 0%, #22c55e 50%, #4ade80 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .section-pattern { background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2316a34a' fill-opacity='0.03'%3E%3Cpath d='M30 0L60 30L30 60L0 30z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E"); }
        
        /* Carousel Styles */
        .carousel-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        .carousel-slide.active {
            opacity: 1;
        }
        .carousel-dot {
            transition: all 0.3s ease;
        }
        .carousel-dot.active {
            width: 2rem;
            background-color: white;
        }
        
        @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-15px); } }
        @keyframes pulse-glow { 0%, 100% { box-shadow: 0 0 20px rgba(22, 163, 74, 0.3); } 50% { box-shadow: 0 0 40px rgba(22, 163, 74, 0.6); } }
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
    </style>
</head>
<body class="font-sans antialiased bg-white" x-data="{ mobileMenu: false }">
    @php
        use App\Models\ContentSetting;
        $content = ContentSetting::all()->pluck('value', 'key');
    @endphp
    
    <!-- Top Bar -->
    <div class="bg-primary-900 text-white py-2 text-sm hidden md:block">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <span><i class="fas fa-phone-alt mr-2"></i> {{ $content['contact_phone'] ?? '+62 812 3456 7890' }}</span>
                <span><i class="fas fa-envelope mr-2"></i> {{ $content['contact_email'] ?? 'info@ponpes.id' }}</span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ $content['social_facebook'] ?? '#' }}" class="hover:text-accent-400 transition-colors"><i class="fab fa-facebook-f"></i></a>
                <a href="{{ $content['social_instagram'] ?? '#' }}" class="hover:text-accent-400 transition-colors"><i class="fab fa-instagram"></i></a>
                <a href="{{ $content['social_youtube'] ?? '#' }}" class="hover:text-accent-400 transition-colors"><i class="fab fa-youtube"></i></a>
                <a href="{{ $content['social_tiktok'] ?? '#' }}" class="hover:text-accent-400 transition-colors"><i class="fab fa-tiktok"></i></a>
            </div>
        </div>
    </div>
    
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <a href="/" class="flex items-center space-x-3">
                    @if(!empty($content['brand_logo_url']))
                    <img src="{{ $content['brand_logo_url'] }}" alt="{{ $content['brand_name'] ?? 'Logo' }}" class="w-14 h-14 rounded-xl shadow-lg object-cover">
                    @else
                    <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-primary-600 to-primary-800 flex items-center justify-center shadow-lg animate-pulse-glow">
                        <i class="fas fa-mosque text-white text-2xl"></i>
                    </div>
                    @endif
                    <div>
                        <h1 class="text-xl font-bold text-gray-900">{{ $content['brand_name'] ?? 'Ponpes Digital' }}</h1>
                        <p class="text-xs text-gray-500">{{ $content['brand_tagline'] ?? 'Sistem Manajemen Modern' }}</p>
                    </div>
                </a>
                
                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="#beranda" class="text-gray-700 hover:text-primary-600 font-medium transition-colors">Beranda</a>
                    <a href="#lembaga" class="text-gray-700 hover:text-primary-600 font-medium transition-colors">Lembaga</a>
                    <a href="#profil" class="text-gray-700 hover:text-primary-600 font-medium transition-colors">Profil</a>
                    <a href="#berita" class="text-gray-700 hover:text-primary-600 font-medium transition-colors">Berita</a>
                    <a href="#fasilitas" class="text-gray-700 hover:text-primary-600 font-medium transition-colors">Fasilitas</a>
                    <a href="#kontak" class="text-gray-700 hover:text-primary-600 font-medium transition-colors">Kontak</a>
                </div>
                
                <!-- CTA Button -->
                <div class="hidden lg:flex items-center space-x-3">
                    <a href="{{ route('register') }}" class="px-5 py-2.5 border-2 border-primary-600 text-primary-600 font-semibold rounded-xl hover:bg-primary-50 transition-all duration-300">
                        <i class="fas fa-user-plus mr-2"></i> Daftar
                    </a>
                    <a href="{{ route('login') }}" class="px-5 py-2.5 bg-gradient-to-r from-primary-600 to-primary-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5">
                        <i class="fas fa-sign-in-alt mr-2"></i> Masuk
                    </a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button @click="mobileMenu = !mobileMenu" class="lg:hidden p-2 rounded-lg hover:bg-gray-100">
                    <i class="fas text-2xl text-gray-700" :class="mobileMenu ? 'fa-times' : 'fa-bars'"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div x-show="mobileMenu" x-transition class="lg:hidden bg-white border-t shadow-xl">
            <div class="px-4 py-4 space-y-2">
                <a href="#beranda" class="block px-4 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-lg">Beranda</a>
                <a href="#lembaga" class="block px-4 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-lg">Lembaga</a>
                <a href="#profil" class="block px-4 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-lg">Profil</a>
                <a href="#berita" class="block px-4 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-lg">Berita</a>
                <a href="#fasilitas" class="block px-4 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-lg">Fasilitas</a>
                <a href="#kontak" class="block px-4 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-lg">Kontak</a>
                <div class="grid grid-cols-2 gap-2 mt-2">
                    <a href="{{ route('register') }}" class="px-4 py-3 border-2 border-primary-600 text-primary-600 text-center rounded-lg font-semibold">Daftar</a>
                    <a href="{{ route('login') }}" class="px-4 py-3 bg-primary-600 text-white text-center rounded-lg font-semibold">Masuk</a>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Hero Carousel Section -->
    <section id="beranda" class="relative h-[90vh] min-h-[600px] overflow-hidden" 
        x-data="{ 
            currentSlide: 0, 
        @php
        // Count how many hero slides exist by checking for hero titles
        $heroCount = 0;
        for ($i = 1; $i <= 20; $i++) {
            if (!empty($content['hero'.$i.'_title'])) {
                $heroCount = $i;
            }
        }
        $heroCount = max($heroCount, 3); // Minimum 3 slides
        
        $heroGradients = [
            'from-primary-900 via-primary-800 to-primary-700',
            'from-blue-900 via-blue-800 to-primary-700', 
            'from-emerald-900 via-emerald-800 to-teal-700',
            'from-purple-900 via-purple-800 to-indigo-700',
            'from-red-900 via-red-800 to-orange-700',
            'from-cyan-900 via-cyan-800 to-blue-700',
        ];
        $heroIcons = ['fa-star', 'fa-graduation-cap', 'fa-book-quran', 'fa-mosque', 'fa-hands-praying', 'fa-award'];
        @endphp
        
            totalSlides: {{ $heroCount }},
            autoplay: null,
            init() {
                this.startAutoplay();
            },
            startAutoplay() {
                this.autoplay = setInterval(() => { this.nextSlide(); }, 5000);
            },
            stopAutoplay() {
                clearInterval(this.autoplay);
            },
            nextSlide() {
                this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
            },
            prevSlide() {
                this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
            },
            goToSlide(index) {
                this.currentSlide = index;
                this.stopAutoplay();
                this.startAutoplay();
            }
        }">
        
        @for($i = 1; $i <= $heroCount; $i++)
        @if(!empty($content['hero'.$i.'_title']))
        <!-- Slide {{ $i }} -->
        <div class="carousel-slide" :class="{ 'active': currentSlide === {{ $i - 1 }} }">
            @if(!empty($content['hero'.$i.'_image']))
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $content['hero'.$i.'_image'] }}');"></div>
            <div class="absolute inset-0 bg-black/50"></div>
            @else
            <div class="absolute inset-0 bg-gradient-to-r {{ $heroGradients[($i-1) % 6] }}"></div>
            <div class="absolute inset-0 opacity-20" style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%2780%27 height=%2780%27 viewBox=%270 0 80 80%27%3E%3Cg fill=%27%23ffffff%27%3E%3Cpath d=%27M40 10c-5 0-10 10-10 20h20c0-10-5-20-10-20zm-15 20H15v30h10V30zm30 0v30h10V30H55zM25 35v25h30V35H25z%27/%3E%3C/g%3E%3C/svg%3E');"></div>
            @endif
            <div class="relative z-10 h-full flex items-center">
                <div class="max-w-7xl mx-auto px-4 w-full">
                    <div class="max-w-2xl">
                        <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/10 backdrop-blur text-white text-sm font-medium mb-6">
                            <i class="fas {{ $heroIcons[($i-1) % 6] }} text-accent-400 mr-2"></i>
                            {{ $content['hero'.$i.'_badge'] ?? '' }}
                        </div>
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                            {{ $content['hero'.$i.'_title'] }}
                        </h1>
                        <p class="text-lg text-white/80 mb-8 leading-relaxed">
                            {{ $content['hero'.$i.'_subtitle'] ?? '' }}
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('register') }}" class="px-8 py-4 bg-accent-500 hover:bg-accent-600 text-white font-bold rounded-xl shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                                <i class="fas fa-user-plus mr-2"></i> Daftar Sekarang
                            </a>
                            <a href="{{ route('login') }}" class="px-8 py-4 bg-white/10 hover:bg-white/20 text-white font-semibold rounded-xl backdrop-blur border border-white/30 transition-all duration-300">
                                <i class="fas fa-sign-in-alt mr-2"></i> Masuk
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endfor
        
        <!-- Navigation Arrows -->
        <button @click="prevSlide(); stopAutoplay(); startAutoplay();" class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white/10 hover:bg-white/20 backdrop-blur rounded-full flex items-center justify-center text-white transition-all duration-300">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button @click="nextSlide(); stopAutoplay(); startAutoplay();" class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white/10 hover:bg-white/20 backdrop-blur rounded-full flex items-center justify-center text-white transition-all duration-300">
            <i class="fas fa-chevron-right"></i>
        </button>
        
        <!-- Dots Navigation -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex items-center space-x-3">
            <template x-for="(slide, index) in totalSlides" :key="index">
                <button @click="goToSlide(index)" 
                    class="carousel-dot w-3 h-3 rounded-full bg-white/50 hover:bg-white/80"
                    :class="{ 'active': currentSlide === index }">
                </button>
            </template>
        </div>
        
        <!-- Stats Bar -->
        <div class="absolute bottom-0 left-0 right-0 z-20 bg-black/30 backdrop-blur-sm">
            <div class="max-w-7xl mx-auto px-4 py-4">
                <div class="grid grid-cols-3 md:grid-cols-3 gap-4 text-center text-white">
                    <div>
                        <div class="text-2xl md:text-3xl font-bold text-accent-400">{{ $content['stats_santri'] ?? '1500+' }}</div>
                        <div class="text-xs md:text-sm text-white/70">Santri Aktif</div>
                    </div>
                    <div>
                        <div class="text-2xl md:text-3xl font-bold text-accent-400">{{ $content['stats_ustadz'] ?? '100+' }}</div>
                        <div class="text-xs md:text-sm text-white/70">Ustadz/Ustadzah</div>
                    </div>
                    <div>
                        <div class="text-2xl md:text-3xl font-bold text-accent-400">{{ $content['stats_years'] ?? '50+' }}</div>
                        <div class="text-xs md:text-sm text-white/70">Tahun Berdiri</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Lembaga Section -->
    <section id="lembaga" class="py-24 bg-white section-pattern">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-primary-100 text-primary-700 text-sm font-semibold mb-4">
                    <i class="fas fa-graduation-cap mr-2"></i> Lembaga Pendidikan
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    {{ $content['lembaga_title'] ?? 'Lembaga Pendidikan di Bawah Naungan Yayasan' }}
                </h2>
                <p class="text-lg text-gray-600">
                    {{ $content['lembaga_subtitle'] ?? 'Berbagai jenjang pendidikan yang memadukan kurikulum nasional dengan pendidikan keislaman' }}
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                $colors = ['blue', 'green', 'purple', 'orange', 'red', 'teal', 'indigo', 'pink'];
                // Mapping lembaga number to routes
                $lembagaRoutes = [
                    1 => 'lembaga.pondok',
                    2 => 'lembaga.mi',
                    3 => 'lembaga.ma',
                    4 => 'lembaga.majelis',
                    5 => 'lembaga.diniyah',
                    6 => 'lembaga.bpkk',
                    7 => 'lembaga.tpq',
                    8 => 'lembaga.ra',
                ];
                @endphp
                
                @for($i = 1; $i <= 20; $i++)
                    @if(!empty($content['lembaga'.$i.'_title']))
                    <div class="card-hover bg-white rounded-2xl p-6 shadow-lg border border-gray-100 group">
                        @if(!empty($content['lembaga'.$i.'_image']))
                        <div class="w-full h-32 rounded-xl mb-4 overflow-hidden">
                            <img src="{{ $content['lembaga'.$i.'_image'] }}" alt="{{ $content['lembaga'.$i.'_title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>
                        @else
                        <div class="w-16 h-16 bg-gradient-to-br from-{{ $colors[($i-1) % 8] }}-500 to-{{ $colors[($i-1) % 8] }}-700 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas {{ $content['lembaga'.$i.'_icon'] ?? 'fa-school' }} text-white text-2xl"></i>
                        </div>
                        @endif
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $content['lembaga'.$i.'_title'] }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ $content['lembaga'.$i.'_desc'] ?? '' }}</p>
                        @if(isset($lembagaRoutes[$i]))
                        <a href="{{ route($lembagaRoutes[$i]) }}" class="text-primary-600 font-semibold text-sm hover:underline">
                            Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                        @else
                        <a href="#" class="text-primary-600 font-semibold text-sm hover:underline">
                            Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                        @endif
                    </div>
                    @endif
                @endfor
            </div>
        </div>
    </section>
    
    <!-- Sambutan Section -->
    <section id="profil" class="py-24 bg-gradient-to-br from-primary-800 via-primary-900 to-gray-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-accent-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-primary-400 rounded-full blur-3xl"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Image -->
                <div class="relative">
                    <div class="bg-gradient-to-br from-primary-700 to-primary-900 rounded-3xl p-8 text-center border border-primary-600/30">
                        @if(!empty($content['profile_image']))
                        <img src="{{ $content['profile_image'] }}" alt="{{ $content['profile_name'] ?? 'Ketua Yayasan' }}" class="w-64 h-64 mx-auto rounded-full object-cover mb-6 shadow-2xl border-4 border-accent-400">
                        @else
                        <div class="w-64 h-64 mx-auto bg-gradient-to-br from-accent-400 to-accent-600 rounded-full flex items-center justify-center mb-6 shadow-2xl">
                            <i class="fas fa-user-tie text-white text-7xl"></i>
                        </div>
                        @endif
                        <h3 class="text-2xl font-bold text-white mb-2">{{ $content['profile_name'] ?? 'KH. Muhammad Abdullah' }}</h3>
                        <p class="text-accent-400 font-medium">{{ $content['profile_title'] ?? 'Ketua Yayasan' }}</p>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="text-white">
                    <div class="inline-flex items-center px-4 py-2 rounded-full bg-white/10 text-sm font-medium mb-6">
                        <i class="fas fa-comment-alt mr-2 text-accent-400"></i> Sambutan Ketua Yayasan
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 leading-tight">
                        "{{ $content['profile_quote'] ?? 'Dengan Ilmu Hidup Jadi Mudah, Dengan Agama Hidup Jadi Terarah' }}"
                    </h2>
                    <div class="space-y-4 text-white/80 leading-relaxed">
                        <p>{{ $content['profile_message1'] ?? "Assalamu'alaikum warahmatullahi wabarakatuh. Segala puji bagi Allah SWT yang telah memberikan kekuatan dan keistiqamahan dalam perjuangan pendidikan dan dakwah Islam." }}</p>
                        <p>{{ $content['profile_message2'] ?? 'Pondok Pesantren kami merupakan amanah besar dalam melanjutkan perjuangan para ulama pendahulu. Kami mengajak seluruh elemen masyarakat untuk terus bersinergi dan mendukung perjuangan ini.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Berita Section -->
    <section id="berita" class="py-24 bg-gray-50 section-pattern">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-primary-100 text-primary-700 text-sm font-semibold mb-4">
                    <i class="fas fa-newspaper mr-2"></i> Berita & Kegiatan
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Berita &
                    <span class="text-gradient">Kegiatan Terkini</span>
                </h2>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                $newsGradients = ['from-primary-600 to-primary-800', 'from-blue-600 to-blue-800', 'from-purple-600 to-purple-800', 'from-green-600 to-green-800', 'from-red-600 to-red-800'];
                $newsIcons = ['fa-newspaper', 'fa-trophy', 'fa-hands-praying', 'fa-bullhorn', 'fa-star'];
                @endphp
                
                @for($i = 1; $i <= 10; $i++)
                    @if(!empty($content['news'.$i.'_title']))
                    <div class="card-hover bg-white rounded-2xl overflow-hidden shadow-lg group">
                        @if(!empty($content['news'.$i.'_image']))
                        <div class="h-48 relative overflow-hidden">
                            <img src="{{ $content['news'.$i.'_image'] }}" alt="{{ $content['news'.$i.'_title'] }}" class="w-full h-full object-cover">
                            @if($i == 1)
                            <div class="absolute top-4 left-4 bg-accent-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                                Terbaru
                            </div>
                            @endif
                        </div>
                        @else
                        <div class="h-48 bg-gradient-to-br {{ $newsGradients[($i-1) % 5] }} relative overflow-hidden">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <i class="fas {{ $newsIcons[($i-1) % 5] }} text-6xl text-white/20"></i>
                            </div>
                            @if($i == 1)
                            <div class="absolute top-4 left-4 bg-accent-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                                Terbaru
                            </div>
                            @endif
                        </div>
                        @endif
                        <div class="p-6">
                            <div class="text-sm text-gray-500 mb-2">
                                <i class="fas fa-calendar-alt mr-2"></i> {{ $content['news'.$i.'_date'] ?? '' }}
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-primary-600 transition-colors">
                                {{ $content['news'.$i.'_title'] }}
                            </h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $content['news'.$i.'_desc'] ?? '' }}</p>
                            <a href="{{ $content['news'.$i.'_url'] ?? '#' }}" target="{{ str_starts_with($content['news'.$i.'_url'] ?? '#', 'http') ? '_blank' : '_self' }}" class="text-primary-600 font-semibold text-sm hover:text-primary-700">
                                Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                    @endif
                @endfor
            </div>
        </div>
    </section>
    
    <!-- Fasilitas Section -->
    <section id="fasilitas" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-primary-100 text-primary-700 text-sm font-semibold mb-4">
                    <i class="fas fa-building mr-2"></i> Fasilitas
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    {{ $content['fasilitas_title'] ?? 'Lingkungan Nyaman untuk Menuntut Ilmu' }}
                </h2>
                <p class="text-lg text-gray-600">
                    {{ $content['fasilitas_subtitle'] ?? 'Fasilitas lengkap untuk mendukung kegiatan belajar dan beribadah' }}
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                $fasilitasGradients = ['from-blue-600 to-blue-800', 'from-green-600 to-green-800', 'from-purple-600 to-purple-800', 'from-red-600 to-red-800', 'from-orange-600 to-orange-800', 'from-teal-600 to-teal-800', 'from-indigo-600 to-indigo-800', 'from-pink-600 to-pink-800'];
                @endphp
                
                @for($i = 1; $i <= 20; $i++)
                    @if(!empty($content['fasilitas'.$i.'_title']))
                    <div class="card-hover relative overflow-hidden rounded-2xl group">
                        @if(!empty($content['fasilitas'.$i.'_image']))
                        <div class="h-64 relative">
                            <img src="{{ $content['fasilitas'.$i.'_image'] }}" alt="{{ $content['fasilitas'.$i.'_title'] }}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                <h3 class="text-xl font-bold text-white mb-2">{{ $content['fasilitas'.$i.'_title'] }}</h3>
                                <p class="text-white/80 text-sm">{{ $content['fasilitas'.$i.'_desc'] ?? '' }}</p>
                            </div>
                        </div>
                        @else
                        <div class="h-64 bg-gradient-to-br {{ $fasilitasGradients[($i-1) % 8] }} p-6 flex flex-col justify-end">
                            <div class="absolute top-6 right-6 w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center">
                                <i class="fas {{ $content['fasilitas'.$i.'_icon'] ?? 'fa-building' }} text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-2">{{ $content['fasilitas'.$i.'_title'] }}</h3>
                            <p class="text-white/80 text-sm">{{ $content['fasilitas'.$i.'_desc'] ?? '' }}</p>
                        </div>
                        @endif
                    </div>
                    @endif
                @endfor
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-accent-500 via-accent-600 to-accent-700 relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                Siap Bergabung dengan Keluarga Besar Pesantren?
            </h2>
            <p class="text-lg text-white/90 mb-8 max-w-2xl mx-auto">
                Jadilah bagian dari Gen-Z yang berilmu dan berakhlak mulia
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('login') }}" class="px-8 py-4 bg-white text-accent-600 font-bold rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <i class="fas fa-sign-in-alt mr-2"></i> Masuk Sistem
                </a>
                <a href="#kontak" class="px-8 py-4 bg-transparent text-white font-bold rounded-xl border-2 border-white hover:bg-white hover:text-accent-600 transition-all duration-300">
                    <i class="fas fa-phone mr-2"></i> Hubungi Kami
                </a>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer id="kontak" class="bg-gray-900 text-white pt-20 pb-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <!-- About -->
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-3 mb-6">
                        @if(!empty($content['brand_logo_url']))
                        <img src="{{ $content['brand_logo_url'] }}" alt="{{ $content['brand_name'] ?? 'Logo' }}" class="w-14 h-14 rounded-xl shadow-lg object-cover">
                        @else
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-primary-600 to-primary-800 flex items-center justify-center">
                            <i class="fas fa-mosque text-white text-2xl"></i>
                        </div>
                        @endif
                        <div>
                            <h3 class="text-xl font-bold">{{ $content['brand_name'] ?? 'Ponpes Digital' }}</h3>
                            <p class="text-gray-400 text-sm">{{ $content['brand_tagline'] ?? 'Sistem Manajemen Modern' }}</p>
                        </div>
                    </div>
                    <p class="text-gray-400 mb-6 max-w-md leading-relaxed">
                        {{ $content['footer_about'] ?? 'Pondok Pesantren Modern adalah lembaga pendidikan Islam terkemuka yang menggabungkan nilai-nilai tradisional dengan pendekatan modern.' }}
                    </p>
                    <div class="flex space-x-4">
                        <a href="{{ $content['social_facebook'] ?? '#' }}" target="_blank" class="w-12 h-12 rounded-xl bg-gray-800 flex items-center justify-center hover:bg-primary-600 transition-all">
                            <i class="fab fa-facebook-f text-lg"></i>
                        </a>
                        <a href="{{ $content['social_instagram'] ?? '#' }}" target="_blank" class="w-12 h-12 rounded-xl bg-gray-800 flex items-center justify-center hover:bg-primary-600 transition-all">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                        <a href="{{ $content['social_youtube'] ?? '#' }}" target="_blank" class="w-12 h-12 rounded-xl bg-gray-800 flex items-center justify-center hover:bg-primary-600 transition-all">
                            <i class="fab fa-youtube text-lg"></i>
                        </a>
                        <a href="{{ $content['social_tiktok'] ?? '#' }}" target="_blank" class="w-12 h-12 rounded-xl bg-gray-800 flex items-center justify-center hover:bg-primary-600 transition-all">
                            <i class="fab fa-tiktok text-lg"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h4 class="font-bold text-lg mb-6">Link Cepat</h4>
                    <ul class="space-y-3">
                        <li><a href="#beranda" class="text-gray-400 hover:text-white transition-colors"><i class="fas fa-chevron-right mr-2 text-xs text-primary-500"></i> Beranda</a></li>
                        <li><a href="#lembaga" class="text-gray-400 hover:text-white transition-colors"><i class="fas fa-chevron-right mr-2 text-xs text-primary-500"></i> Lembaga</a></li>
                        <li><a href="#berita" class="text-gray-400 hover:text-white transition-colors"><i class="fas fa-chevron-right mr-2 text-xs text-primary-500"></i> Berita</a></li>
                        <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-white transition-colors"><i class="fas fa-chevron-right mr-2 text-xs text-primary-500"></i> Login</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div>
                    <h4 class="font-bold text-lg mb-6">Kontak</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <div class="w-10 h-10 rounded-lg bg-primary-600/20 flex items-center justify-center flex-shrink-0 mt-1">
                                <i class="fas fa-map-marker-alt text-primary-500"></i>
                            </div>
                            <a href="{{ $content['footer_map_url'] ?? 'https://maps.google.com' }}" target="_blank" class="text-gray-400 hover:text-white transition-colors">
                                {{ $content['footer_address'] ?? $content['contact_address'] ?? 'Jl. Pesantren No. 123, Jawa Barat' }}
                            </a>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-lg bg-primary-600/20 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-primary-500"></i>
                            </div>
                            <a href="tel:{{ $content['contact_phone'] ?? '+62 812 3456 7890' }}" class="text-gray-400 hover:text-white transition-colors">
                                {{ $content['contact_phone'] ?? '+62 812 3456 7890' }}
                            </a>
                        </li>
                        <li class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-lg bg-primary-600/20 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-primary-500"></i>
                            </div>
                            <a href="mailto:{{ $content['contact_email'] ?? 'info@ponpes.id' }}" class="text-gray-400 hover:text-white transition-colors">
                                {{ $content['contact_email'] ?? 'info@ponpes.id' }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="border-t border-gray-800 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm">{{ $content['footer_copyright'] ?? '© ' . date('Y') . ' Pondok Pesantren Digital. All rights reserved.' }}</p>
                    <p class="text-gray-500 text-sm mt-2 md:mt-0">{{ $content['footer_tagline'] ?? 'Dibuat dengan ❤️ untuk Pendidikan Islam' }}</p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/{{ $content['footer_whatsapp'] ?? '6281234567890' }}" target="_blank" class="fixed bottom-6 right-6 w-16 h-16 bg-green-500 rounded-full flex items-center justify-center shadow-2xl hover:bg-green-600 transition-all duration-300 hover:scale-110 z-50">
        <i class="fab fa-whatsapp text-white text-3xl"></i>
    </a>
</body>
</html>
