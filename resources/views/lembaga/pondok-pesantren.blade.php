@extends('lembaga.layout')

@section('title', 'Pondok Pesantren')

@section('hero-class', 'bg-gradient-to-br from-emerald-800 via-emerald-900 to-gray-900')

@section('logo')
<div class="w-32 h-32 rounded-2xl bg-white/10 backdrop-blur flex items-center justify-center mx-auto mb-8">
    <i class="fas fa-mosque text-6xl text-white"></i>
</div>
@endsection

@section('hero-title')
Pondok Pesantren
@endsection


@section('hero-subtitle')
Lembaga Pendidikan Islam Tradisional yang Membentuk Generasi Berakhlak Mulia dan Berwawasan Luas
@endsection

@section('content')
<!-- About Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Tentang Pondok Pesantren</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Pondok Pesantren kami merupakan lembaga pendidikan Islam yang mengintegrasikan pendidikan agama 
                    dengan pendidikan umum. Dengan sistem asrama yang nyaman, santri dibekali ilmu agama yang kuat 
                    sekaligus keterampilan hidup yang diperlukan di era modern.
                </p>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Kami memiliki program unggulan seperti Tahfidz Al-Quran, Kajian Kitab Kuning, dan berbagai 
                    kegiatan pengembangan diri yang dirancang untuk mencetak generasi muslim yang berkarakter.
                </p>
                <div class="flex flex-wrap gap-4">
                    <div class="flex items-center text-primary-600">
                        <i class="fas fa-check-circle mr-2"></i> Putra & Putri
                    </div>
                    <div class="flex items-center text-primary-600">
                        <i class="fas fa-check-circle mr-2"></i> Sistem Asrama
                    </div>
                    <div class="flex items-center text-primary-600">
                        <i class="fas fa-check-circle mr-2"></i> Tahfidz Al-Quran
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gradient-to-br from-primary-500 to-primary-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-users text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">500+</h3>
                    <p class="text-white/80">Santri Aktif</p>
                </div>
                <div class="bg-gradient-to-br from-accent-500 to-accent-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-user-tie text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">50+</h3>
                    <p class="text-white/80">Ustadz/Ustadzah</p>
                </div>
                <div class="bg-gradient-to-br from-blue-500 to-blue-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-book-quran text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">100+</h3>
                    <p class="text-white/80">Hafidz/Hafidzah</p>
                </div>
                <div class="bg-gradient-to-br from-purple-500 to-purple-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-graduation-cap text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">25+</h3>
                    <p class="text-white/80">Tahun Pengalaman</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Programs Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Program Unggulan</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Berbagai program pendidikan yang dirancang untuk membentuk santri yang unggul</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl p-8 shadow-lg card-hover">
                <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-emerald-700 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-book-quran text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Tahfidz Al-Quran</h3>
                <p class="text-gray-600">Program menghafal Al-Quran 30 juz dengan metode yang efektif dan bimbingan intensif dari hafidz berpengalaman.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-lg card-hover">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-700 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-book-open text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Kajian Kitab Kuning</h3>
                <p class="text-gray-600">Pembelajaran literatur Islam klasik dengan metodologi tradisional pesantren yang telah teruji.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-lg card-hover">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-700 rounded-xl flex items-center justify-center mb-6">
                    <i class="fas fa-hands-praying text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Pembinaan Akhlak</h3>
                <p class="text-gray-600">Program pembentukan karakter islami melalui pembiasaan ibadah dan akhlak mulia sehari-hari.</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Hubungi Kami</h2>
        <p class="text-gray-600 mb-8">Untuk informasi lebih lanjut mengenai pendaftaran dan program kami</p>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-gray-50 rounded-xl p-6">
                <i class="fas fa-phone text-primary-600 text-2xl mb-3"></i>
                <h4 class="font-semibold text-gray-900">Telepon</h4>
                <p class="text-gray-600">+62 812 3456 7890</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-6">
                <i class="fas fa-envelope text-primary-600 text-2xl mb-3"></i>
                <h4 class="font-semibold text-gray-900">Email</h4>
                <p class="text-gray-600">info@pesantren.id</p>
            </div>
            <div class="bg-gray-50 rounded-xl p-6">
                <i class="fas fa-map-marker-alt text-primary-600 text-2xl mb-3"></i>
                <h4 class="font-semibold text-gray-900">Alamat</h4>
                <p class="text-gray-600">Jl. Pesantren No. 123</p>
            </div>
        </div>
    </div>
</section>
@endsection
