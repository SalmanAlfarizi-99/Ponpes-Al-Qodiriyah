@extends('lembaga.layout')

@section('title', 'Madrasah Aliyah (MA)')

@section('hero-class', 'bg-gradient-to-br from-purple-700 via-purple-800 to-indigo-900')
@section('favicon-url', '/assets/lembaga/favicon/faviconma.png')
@section('nav-logo-url', '/assets/lembaga/sgjlm.png')
@section('nav-brand', 'MA Sunan Gunung Jati')
@section('nav-icon', 'fa-graduation-cap')
@section('footer-logo-url', '/assets/icon/favicon.png')
@section('nav-gradient', 'bg-gradient-to-br from-purple-600 to-purple-800')

@section('logo')
<div class="w-32 h-32 rounded-2xl bg-white/10 backdrop-blur flex items-center justify-center mx-auto mb-8">
    <i class="fas fa-graduation-cap text-6xl text-white"></i>
</div>
@endsection

@section('hero-title')
Madrasah Aliyah
@endsection

@section('hero-subtitle')
Pendidikan Menengah Atas Islami yang Mempersiapkan Generasi Unggul untuk Masa Depan
@endsection

@section('content')
<!-- About Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Tentang Madrasah Aliyah</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Madrasah Aliyah (MA) adalah jenjang pendidikan menengah atas setara SMA yang memadukan 
                    kurikulum nasional dengan pendidikan agama Islam yang mendalam. Kami mempersiapkan 
                    lulusan yang siap melanjutkan ke perguruan tinggi terkemuka.
                </p>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Dengan tenaga pengajar berkualitas dan fasilitas lengkap, siswa mendapat pendidikan 
                    terbaik untuk mengembangkan potensi akademik sekaligus spiritual mereka.
                </p>
                <div class="flex flex-wrap gap-4">
                    <div class="flex items-center text-purple-600">
                        <i class="fas fa-check-circle mr-2"></i> Jurusan IPA & IPS
                    </div>
                    <div class="flex items-center text-purple-600">
                        <i class="fas fa-check-circle mr-2"></i> Program Keagamaan
                    </div>
                    <div class="flex items-center text-purple-600">
                        <i class="fas fa-check-circle mr-2"></i> Bimbingan PTN
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gradient-to-br from-purple-500 to-purple-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-users text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">400+</h3>
                    <p class="text-white/80">Siswa Aktif</p>
                </div>
                <div class="bg-gradient-to-br from-indigo-500 to-indigo-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-chalkboard-teacher text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">35+</h3>
                    <p class="text-white/80">Guru Profesional</p>
                </div>
                <div class="bg-gradient-to-br from-pink-500 to-pink-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-university text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">85%</h3>
                    <p class="text-white/80">Lolos PTN</p>
                </div>
                <div class="bg-gradient-to-br from-amber-500 to-amber-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-medal text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">100+</h3>
                    <p class="text-white/80">Penghargaan</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Jurusan Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Program Jurusan</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Pilihan jurusan untuk mengembangkan minat dan bakat siswa</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl p-8 shadow-lg card-hover">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-flask text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Jurusan IPA</h3>
                <p class="text-gray-600">Fokus pada sains dan matematika dengan laboratorium lengkap untuk praktikum.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-lg card-hover">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Jurusan IPS</h3>
                <p class="text-gray-600">Fokus pada ilmu sosial dan ekonomi untuk mempersiapkan karir di bidang bisnis.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-lg card-hover">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-700 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-book-open text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Program Keagamaan</h3>
                <p class="text-gray-600">Pendalaman ilmu agama Islam dengan kajian kitab klasik dan bahasa Arab.</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Informasi Pendaftaran</h2>
        <p class="text-gray-600 mb-8">Raih masa depan cemerlang bersama Madrasah Aliyah kami</p>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-purple-50 rounded-xl p-6">
                <i class="fas fa-phone text-purple-600 text-2xl mb-3"></i>
                <h4 class="font-semibold text-gray-900">Telepon</h4>
                <p class="text-gray-600">+62 812 3456 7892</p>
            </div>
            <div class="bg-purple-50 rounded-xl p-6">
                <i class="fas fa-envelope text-purple-600 text-2xl mb-3"></i>
                <h4 class="font-semibold text-gray-900">Email</h4>
                <p class="text-gray-600">ma@pesantren.id</p>
            </div>
            <div class="bg-purple-50 rounded-xl p-6">
                <i class="fas fa-clock text-purple-600 text-2xl mb-3"></i>
                <h4 class="font-semibold text-gray-900">Jam Operasional</h4>
                <p class="text-gray-600">07:00 - 15:00 WIB</p>
            </div>
        </div>
    </div>
</section>
@endsection
