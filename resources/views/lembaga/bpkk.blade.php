@extends('lembaga.layout')

@section('title', 'Balai Pelatihan Kerja Komunitas (BPKK)')

@section('hero-class', 'bg-gradient-to-br from-orange-600 via-orange-700 to-red-800')
@section('favicon-url', '/assets/lembaga/favicon/faviconblkk.png')
@section('nav-logo-url', '/assets/lembaga/blkk.png')
@section('nav-brand', 'Workshop Kejuruan')
@section('nav-icon', 'fa-tools')
@section('footer-logo-url', '/assets/icon/favicon.png')

@section('nav-gradient', 'bg-gradient-to-br from-orange-600 to-red-700')

@section('logo')
<div class="w-32 h-32 rounded-2xl bg-white/10 backdrop-blur flex items-center justify-center mx-auto mb-8">
    <i class="fas fa-tools text-6xl text-white"></i>
</div>
@endsection

@section('hero-title')
Balai Pelatihan Kerja Komunitas
@endsection

@section('hero-subtitle')
Membekali Keterampilan Kerja untuk Kemandirian Ekonomi Santri dan Masyarakat
@endsection

@section('content')

<!-- About Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Tentang BPKK</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Balai Pelatihan Kerja Komunitas (BPKK) adalah unit pelatihan vokasional yang 
                    bertujuan untuk membekali santri dan masyarakat sekitar dengan keterampilan 
                    kerja praktis untuk kemandirian ekonomi.
                </p>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Dengan instruktur berpengalaman dan fasilitas lengkap, peserta pelatihan siap 
                    untuk bekerja atau berwirausaha setelah menyelesaikan program.
                </p>
                <div class="flex flex-wrap gap-4">
                    <div class="flex items-center text-orange-600">
                        <i class="fas fa-check-circle mr-2"></i> Sertifikat Resmi
                    </div>
                    <div class="flex items-center text-orange-600">
                        <i class="fas fa-check-circle mr-2"></i> Praktik Langsung
                    </div>
                    <div class="flex items-center text-orange-600">
                        <i class="fas fa-check-circle mr-2"></i> Pendampingan Usaha
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gradient-to-br from-orange-500 to-orange-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-users text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">500+</h3>
                    <p class="text-white/80">Alumni Terlatih</p>
                </div>
                <div class="bg-gradient-to-br from-red-500 to-red-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-briefcase text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">85%</h3>
                    <p class="text-white/80">Tingkat Kerja</p>
                </div>
                <div class="bg-gradient-to-br from-amber-500 to-amber-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-cogs text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">10+</h3>
                    <p class="text-white/80">Program Pelatihan</p>
                </div>
                <div class="bg-gradient-to-br from-yellow-500 to-yellow-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-handshake text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">20+</h3>
                    <p class="text-white/80">Mitra Industri</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Programs Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Program Pelatihan</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Berbagai keterampilan praktis untuk karir masa depan</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-2xl p-6 shadow-lg card-hover">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-laptop-code text-white text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Komputer & IT</h3>
                <p class="text-gray-600 text-sm">Office, desain grafis, dan web</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg card-hover">
                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-cut text-white text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Tata Busana</h3>
                <p class="text-gray-600 text-sm">Menjahit dan fashion design</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg card-hover">
                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-700 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-utensils text-white text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Tata Boga</h3>
                <p class="text-gray-600 text-sm">Memasak dan kuliner</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg card-hover">
                <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-700 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas fa-wrench text-white text-xl"></i>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Otomotif</h3>
                <p class="text-gray-600 text-sm">Perawatan kendaraan</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Daftar Pelatihan</h2>
        <p class="text-gray-600 mb-8">Tingkatkan keterampilan Anda bersama kami</p>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-orange-50 rounded-xl p-6">
                <i class="fas fa-phone text-orange-600 text-2xl mb-3"></i>
                <h4 class="font-semibold text-gray-900">Telepon</h4>
                <p class="text-gray-600">+62 812 3456 7895</p>
            </div>
            <div class="bg-orange-50 rounded-xl p-6">
                <i class="fas fa-envelope text-orange-600 text-2xl mb-3"></i>
                <h4 class="font-semibold text-gray-900">Email</h4>
                <p class="text-gray-600">bpkk@pesantren.id</p>
            </div>
            <div class="bg-orange-50 rounded-xl p-6">
                <i class="fas fa-clock text-orange-600 text-2xl mb-3"></i>
                <h4 class="font-semibold text-gray-900">Jam Operasional</h4>
                <p class="text-gray-600">08:00 - 16:00 WIB</p>
            </div>
        </div>
    </div>
</section>
@endsection
