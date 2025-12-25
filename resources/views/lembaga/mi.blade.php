@extends('lembaga.layout')

@section('title', 'Madrasah Ibtidaiyah (MI)')

@section('hero-class', 'bg-gradient-to-br from-blue-700 via-blue-800 to-indigo-900')
@section('favicon-url', '/assets/lembaga/favicon/faviconlm.png')
@section('nav-logo-url', '/assets/lembaga/lm.png')
@section('nav-brand', 'MI Al-Wathoniyah')
@section('nav-icon', 'fa-child')
@section('footer-logo-url', '/assets/icon/favicon.png')
@section('nav-gradient', 'bg-gradient-to-br from-blue-600 to-blue-800')


@section('logo')
<div class="w-32 h-32 rounded-2xl bg-white/10 backdrop-blur flex items-center justify-center mx-auto mb-8">
    <i class="fas fa-child text-6xl text-white"></i>
</div>
@endsection

@section('hero-title')
Madrasah Ibtidaiyah
@endsection

@section('hero-subtitle')
Pendidikan Dasar Islami yang Menyeimbangkan Ilmu Pengetahuan dan Nilai-nilai Keislaman
@endsection

@section('content')
<!-- About Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Tentang Madrasah Ibtidaiyah</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Madrasah Ibtidaiyah (MI) adalah jenjang pendidikan dasar setara SD yang mengintegrasikan 
                    kurikulum nasional dengan pendidikan agama Islam. Kami berkomitmen untuk memberikan 
                    fondasi pendidikan yang kuat bagi anak-anak muslim.
                </p>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Dengan metode pembelajaran yang menyenangkan dan lingkungan yang islami, siswa tidak hanya 
                    unggul dalam akademik tetapi juga memiliki akhlak yang baik dan pemahaman agama yang kuat.
                </p>
                <div class="flex flex-wrap gap-4">
                    <div class="flex items-center text-blue-600">
                        <i class="fas fa-check-circle mr-2"></i> Kurikulum Nasional + Agama
                    </div>
                    <div class="flex items-center text-blue-600">
                        <i class="fas fa-check-circle mr-2"></i> Tahsin Al-Quran
                    </div>
                    <div class="flex items-center text-blue-600">
                        <i class="fas fa-check-circle mr-2"></i> Ekstrakurikuler Islami
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-users text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">300+</h3>
                    <p class="text-white/80">Siswa Aktif</p>
                </div>
                <div class="bg-gradient-to-br from-indigo-500 to-indigo-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-chalkboard-teacher text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">25+</h3>
                    <p class="text-white/80">Guru Berkualitas</p>
                </div>
                <div class="bg-gradient-to-br from-purple-500 to-purple-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-door-open text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">12</h3>
                    <p class="text-white/80">Ruang Kelas</p>
                </div>
                <div class="bg-gradient-to-br from-cyan-500 to-cyan-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-trophy text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">50+</h3>
                    <p class="text-white/80">Prestasi</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Programs Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Program Pembelajaran</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Kurikulum terintegrasi untuk membentuk siswa yang cerdas dan berakhlak</p>
        </div>
        <div class="grid md:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl p-6 shadow-lg card-hover text-center">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-book text-white text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Kurikulum Nasional</h3>
                <p class="text-gray-600 text-sm">Mengikuti standar pendidikan nasional</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg card-hover text-center">
                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-quran text-white text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Tahsin & Tahfidz</h3>
                <p class="text-gray-600 text-sm">Program baca dan hafal Al-Quran</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg card-hover text-center">
                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-700 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-language text-white text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Bahasa Arab</h3>
                <p class="text-gray-600 text-sm">Pembelajaran bahasa Arab dasar</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg card-hover text-center">
                <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-700 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-palette text-white text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Ekstrakurikuler</h3>
                <p class="text-gray-600 text-sm">Seni, olahraga, dan keislaman</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Informasi Pendaftaran</h2>
        <p class="text-gray-600 mb-8">Bergabunglah bersama kami untuk pendidikan dasar yang berkualitas</p>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-blue-50 rounded-xl p-6">
                <i class="fas fa-phone text-blue-600 text-2xl mb-3"></i>
                <h4 class="font-semibold text-gray-900">Telepon</h4>
                <p class="text-gray-600">+62 812 3456 7891</p>
            </div>
            <div class="bg-blue-50 rounded-xl p-6">
                <i class="fas fa-envelope text-blue-600 text-2xl mb-3"></i>
                <h4 class="font-semibold text-gray-900">Email</h4>
                <p class="text-gray-600">mi@pesantren.id</p>
            </div>
            <div class="bg-blue-50 rounded-xl p-6">
                <i class="fas fa-clock text-blue-600 text-2xl mb-3"></i>
                <h4 class="font-semibold text-gray-900">Jam Operasional</h4>
                <p class="text-gray-600">07:00 - 14:00 WIB</p>
            </div>
        </div>
    </div>
</section>
@endsection
