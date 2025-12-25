@extends('lembaga.layout')

@section('title', 'Raudhatul Athfal (RA)')

@section('hero-class', 'bg-gradient-to-br from-pink-500 via-pink-600 to-rose-700')
@section('favicon-url', '/assets/lembaga/favicon/faviconlm.png')
@section('nav-logo-url', '/assets/lembaga/lm.png')
@section('nav-brand', 'RA Islam Amanah')
@section('nav-icon', 'fa-baby')
@section('footer-logo-url', '/assets/icon/favicon.png')
@section('nav-gradient', 'bg-gradient-to-br from-pink-500 to-rose-600')

@section('logo')
<div class="w-32 h-32 rounded-2xl bg-white/10 backdrop-blur flex items-center justify-center mx-auto mb-8">
    <i class="fas fa-baby text-6xl text-white"></i>
</div>
@endsection

@section('hero-title')
Raudhatul Athfal
@endsection

@section('hero-subtitle')
Taman Kanak-Kanak Islami yang Menyenangkan untuk Tumbuh Kembang Si Kecil
@endsection

@section('content')
<!-- About Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Tentang Raudhatul Athfal</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Raudhatul Athfal (RA) adalah jenjang pendidikan anak usia dini setara TK yang 
                    menggabungkan kurikulum PAUD nasional dengan nilai-nilai keislaman. Kami menciptakan 
                    lingkungan belajar yang aman, nyaman, dan menyenangkan.
                </p>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Dengan metode bermain sambil belajar, anak-anak dikenalkan dengan dasar-dasar 
                    agama Islam, keterampilan sosial, dan persiapan akademik untuk jenjang sekolah dasar.
                </p>
                <div class="flex flex-wrap gap-4">
                    <div class="flex items-center text-pink-600">
                        <i class="fas fa-check-circle mr-2"></i> Usia 4-6 Tahun
                    </div>
                    <div class="flex items-center text-pink-600">
                        <i class="fas fa-check-circle mr-2"></i> Belajar & Bermain
                    </div>
                    <div class="flex items-center text-pink-600">
                        <i class="fas fa-check-circle mr-2"></i> Hafalan Doa Harian
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gradient-to-br from-pink-400 to-pink-600 rounded-2xl p-6 text-white">
                    <i class="fas fa-child text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">80+</h3>
                    <p class="text-white/80">Murid Aktif</p>
                </div>
                <div class="bg-gradient-to-br from-rose-400 to-rose-600 rounded-2xl p-6 text-white">
                    <i class="fas fa-female text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">8+</h3>
                    <p class="text-white/80">Guru Penyayang</p>
                </div>
                <div class="bg-gradient-to-br from-purple-400 to-purple-600 rounded-2xl p-6 text-white">
                    <i class="fas fa-door-open text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">4</h3>
                    <p class="text-white/80">Ruang Kelas</p>
                </div>
                <div class="bg-gradient-to-br from-fuchsia-400 to-fuchsia-600 rounded-2xl p-6 text-white">
                    <i class="fas fa-gamepad text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">10+</h3>
                    <p class="text-white/80">Area Bermain</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Activities Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Kegiatan Pembelajaran</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Aktivitas yang menyenangkan untuk perkembangan si kecil</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl p-6 shadow-lg card-hover text-center">
                <div class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-quran text-white text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Iqro & Doa</h3>
                <p class="text-gray-600 text-sm">Belajar huruf hijaiyah dan doa harian</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg card-hover text-center">
                <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-pencil-alt text-white text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Calistung</h3>
                <p class="text-gray-600 text-sm">Baca, tulis, hitung dasar</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg card-hover text-center">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-music text-white text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Seni & Musik</h3>
                <p class="text-gray-600 text-sm">Menggambar, mewarnai, bernyanyi</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg card-hover text-center">
                <div class="w-14 h-14 bg-gradient-to-br from-pink-400 to-pink-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-running text-white text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Motorik</h3>
                <p class="text-gray-600 text-sm">Senam, bermain, dan olahraga</p>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Fasilitas Kami</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Lingkungan belajar yang aman dan nyaman untuk si kecil</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-shield-alt text-pink-600 text-3xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Lingkungan Aman</h3>
                <p class="text-gray-600 text-sm">Area bermain yang aman dengan pengawasan ketat</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-utensils text-purple-600 text-3xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Makan Bergizi</h3>
                <p class="text-gray-600 text-sm">Snack dan makan siang sehat halal</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-bus text-blue-600 text-3xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Antar Jemput</h3>
                <p class="text-gray-600 text-sm">Layanan antar jemput tersedia</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-pink-50">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Pendaftaran Murid Baru</h2>
        <p class="text-gray-600 mb-8">Berikan pendidikan terbaik untuk putra/putri Anda sejak dini</p>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl p-6 shadow-md">
                <i class="fas fa-phone text-pink-600 text-2xl mb-3"></i>
                <h4 class="font-semibold text-gray-900">Telepon</h4>
                <p class="text-gray-600">+62 812 3456 7897</p>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-md">
                <i class="fas fa-envelope text-pink-600 text-2xl mb-3"></i>
                <h4 class="font-semibold text-gray-900">Email</h4>
                <p class="text-gray-600">ra@pesantren.id</p>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-md">
                <i class="fas fa-clock text-pink-600 text-2xl mb-3"></i>
                <h4 class="font-semibold text-gray-900">Jam Sekolah</h4>
                <p class="text-gray-600">07:30 - 11:00 WIB</p>
            </div>
        </div>
    </div>
</section>
@endsection
