@extends('lembaga.layout')

@section('title', 'Madrasah Diniyah')

@section('hero-class', 'bg-gradient-to-br from-teal-700 via-teal-800 to-cyan-900')
@section('favicon-url', '/assets/lembaga/favicon/faviconlm.png')
@section('nav-logo-url', '/assets/lembaga/lm.png')
@section('nav-brand', 'Madin An-Nahdloh')
@section('nav-icon', 'fa-book-quran')
@section('footer-logo-url', '/assets/icon/favicon.png')
@section('nav-gradient', 'bg-gradient-to-br from-teal-600 to-teal-800')

@section('logo')
<div class="w-32 h-32 rounded-2xl bg-white/10 backdrop-blur flex items-center justify-center mx-auto mb-8">
    <i class="fas fa-book-quran text-6xl text-white"></i>
</div>
@endsection

@section('hero-title')
Madrasah Diniyah
@endsection

@section('hero-subtitle')
Pendidikan Agama Islam Non-Formal untuk Memperdalam Ilmu Keislaman
@endsection

@section('content')
<!-- About Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Tentang Madrasah Diniyah</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Madrasah Diniyah adalah lembaga pendidikan agama Islam non-formal yang fokus pada 
                    pembelajaran ilmu-ilmu keislaman seperti Fiqih, Akidah, Akhlak, Bahasa Arab, 
                    dan Al-Quran dengan metode tradisional pesantren.
                </p>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Program ini dirancang untuk melengkapi pendidikan formal siswa dengan pemahaman 
                    agama yang lebih mendalam, menjadikan mereka generasi yang taat beribadah.
                </p>
                <div class="flex flex-wrap gap-4">
                    <div class="flex items-center text-teal-600">
                        <i class="fas fa-check-circle mr-2"></i> Sore & Malam Hari
                    </div>
                    <div class="flex items-center text-teal-600">
                        <i class="fas fa-check-circle mr-2"></i> Kitab Kuning
                    </div>
                    <div class="flex items-center text-teal-600">
                        <i class="fas fa-check-circle mr-2"></i> Bahasa Arab
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gradient-to-br from-teal-500 to-teal-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-users text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">200+</h3>
                    <p class="text-white/80">Santri Aktif</p>
                </div>
                <div class="bg-gradient-to-br from-cyan-500 to-cyan-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-user-tie text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">15+</h3>
                    <p class="text-white/80">Ustadz/Ustadzah</p>
                </div>
                <div class="bg-gradient-to-br from-emerald-500 to-emerald-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-book text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">30+</h3>
                    <p class="text-white/80">Kitab Dipelajari</p>
                </div>
                <div class="bg-gradient-to-br from-green-500 to-green-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-layer-group text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">6</h3>
                    <p class="text-white/80">Tingkatan Kelas</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Curriculum Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Mata Pelajaran</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Kurikulum keagamaan yang komprehensif</p>
        </div>
        <div class="grid md:grid-cols-3 lg:grid-cols-6 gap-4">
            <div class="bg-white rounded-xl p-4 shadow-lg text-center card-hover">
                <i class="fas fa-balance-scale text-teal-600 text-2xl mb-2"></i>
                <h4 class="font-semibold text-sm">Fiqih</h4>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-lg text-center card-hover">
                <i class="fas fa-heart text-teal-600 text-2xl mb-2"></i>
                <h4 class="font-semibold text-sm">Akidah</h4>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-lg text-center card-hover">
                <i class="fas fa-hands-praying text-teal-600 text-2xl mb-2"></i>
                <h4 class="font-semibold text-sm">Akhlak</h4>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-lg text-center card-hover">
                <i class="fas fa-quran text-teal-600 text-2xl mb-2"></i>
                <h4 class="font-semibold text-sm">Al-Quran</h4>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-lg text-center card-hover">
                <i class="fas fa-language text-teal-600 text-2xl mb-2"></i>
                <h4 class="font-semibold text-sm">Nahwu</h4>
            </div>
            <div class="bg-white rounded-xl p-4 shadow-lg text-center card-hover">
                <i class="fas fa-spell-check text-teal-600 text-2xl mb-2"></i>
                <h4 class="font-semibold text-sm">Shorof</h4>
            </div>
        </div>
    </div>
</section>

<!-- Schedule Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Jadwal Pembelajaran</h2>
        <p class="text-gray-600 mb-8">Dua sesi pembelajaran setiap hari</p>
        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-teal-50 rounded-xl p-6">
                <i class="fas fa-sun text-teal-600 text-3xl mb-3"></i>
                <h4 class="font-bold text-gray-900 mb-2">Sesi Sore</h4>
                <p class="text-gray-600">15:00 - 17:00 WIB</p>
                <p class="text-gray-500 text-sm mt-2">Tingkat Ula (Dasar)</p>
            </div>
            <div class="bg-cyan-50 rounded-xl p-6">
                <i class="fas fa-moon text-cyan-600 text-3xl mb-3"></i>
                <h4 class="font-bold text-gray-900 mb-2">Sesi Malam</h4>
                <p class="text-gray-600">19:30 - 21:00 WIB</p>
                <p class="text-gray-500 text-sm mt-2">Tingkat Wustho & Ulya</p>
            </div>
        </div>
    </div>
</section>
@endsection
