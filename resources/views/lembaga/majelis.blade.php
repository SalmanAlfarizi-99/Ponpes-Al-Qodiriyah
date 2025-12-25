@extends('lembaga.layout')

@section('title', 'Majelis Nurul Musthofa')

@section('hero-class', 'bg-gradient-to-br from-amber-600 via-amber-700 to-orange-800')
@section('favicon-url', '/assets/lembaga/favicon/faviconnm.png')
@section('nav-logo-url', '/assets/lembaga/nmlm.jpg')
@section('nav-brand', 'Majelis Nurul Musthofa')
@section('nav-icon', 'fa-star-and-crescent')
@section('footer-logo-url', '/assets/icon/favicon.png')
@section('nav-gradient', 'bg-gradient-to-br from-amber-600 to-orange-700')

@section('logo')
<div class="w-32 h-32 rounded-2xl bg-white/10 backdrop-blur flex items-center justify-center mx-auto mb-8">
    <i class="fas fa-star-and-crescent text-6xl text-white"></i>
</div>
@endsection

@section('hero-title')
Majelis Nurul Musthofa
@endsection

@section('hero-subtitle')
Majelis Dzikir dan Sholawat untuk Meningkatkan Kecintaan kepada Rasulullah SAW
@endsection

@section('content')
<!-- About Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Tentang Majelis Nurul Musthofa</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Majelis Nurul Musthofa adalah wadah bagi umat Islam untuk berkumpul dalam rangka 
                    menumbuhkan kecintaan kepada Nabi Muhammad SAW melalui dzikir, sholawat, dan 
                    tausiyah keagamaan yang menyejukkan hati.
                </p>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Kami rutin mengadakan pengajian mingguan, peringatan hari besar Islam, dan 
                    kegiatan dakwah yang bertujuan untuk memperkuat ukhuwah islamiyah di masyarakat.
                </p>
                <div class="flex flex-wrap gap-4">
                    <div class="flex items-center text-amber-600">
                        <i class="fas fa-check-circle mr-2"></i> Sholawat Nabi
                    </div>
                    <div class="flex items-center text-amber-600">
                        <i class="fas fa-check-circle mr-2"></i> Dzikir Bersama
                    </div>
                    <div class="flex items-center text-amber-600">
                        <i class="fas fa-check-circle mr-2"></i> Tausiyah Ulama
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gradient-to-br from-amber-500 to-amber-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-users text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">1000+</h3>
                    <p class="text-white/80">Jamaah Rutin</p>
                </div>
                <div class="bg-gradient-to-br from-orange-500 to-orange-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-calendar-week text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">52</h3>
                    <p class="text-white/80">Pengajian/Tahun</p>
                </div>
                <div class="bg-gradient-to-br from-yellow-500 to-yellow-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-microphone text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">20+</h3>
                    <p class="text-white/80">Muballigh Tetap</p>
                </div>
                <div class="bg-gradient-to-br from-red-500 to-red-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-heart text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">15+</h3>
                    <p class="text-white/80">Tahun Berdiri</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Activities Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Kegiatan Rutin</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Berbagai kegiatan dakwah dan pengajian untuk umat</p>
        </div>
        <div class="grid md:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl p-6 shadow-lg card-hover text-center">
                <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-amber-700 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-moon text-white text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Malam Selasa</h3>
                <p class="text-gray-600 text-sm">Sholawat dan dzikir bersama</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg card-hover text-center">
                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-book-open text-white text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Kajian Ahad</h3>
                <p class="text-gray-600 text-sm">Kajian kitab dan hadits</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg card-hover text-center">
                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-700 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-star text-white text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Maulid Nabi</h3>
                <p class="text-gray-600 text-sm">Peringatan kelahiran Rasul</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg card-hover text-center">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-hand-holding-heart text-white text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Bakti Sosial</h3>
                <p class="text-gray-600 text-sm">Santunan dan bantuan</p>
            </div>
        </div>
    </div>
</section>

<!-- Schedule Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Jadwal Pengajian</h2>
        <p class="text-gray-600 mb-8">Bergabunglah dalam majlis ilmu dan dzikir bersama kami</p>
        <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl p-8">
            <div class="grid md:grid-cols-2 gap-6">
                <div class="text-left">
                    <h4 class="font-bold text-gray-900 mb-4"><i class="fas fa-calendar-alt text-amber-600 mr-2"></i> Setiap Malam Selasa</h4>
                    <p class="text-gray-600">Ba'da Isya - Selesai</p>
                    <p class="text-gray-500 text-sm mt-2">Sholawat, Dzikir, dan Tausiyah</p>
                </div>
                <div class="text-left">
                    <h4 class="font-bold text-gray-900 mb-4"><i class="fas fa-map-marker-alt text-amber-600 mr-2"></i> Lokasi</h4>
                    <p class="text-gray-600">Masjid Agung Pondok Pesantren</p>
                    <p class="text-gray-500 text-sm mt-2">Terbuka untuk umum</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
