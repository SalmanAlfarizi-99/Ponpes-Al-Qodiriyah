@extends('lembaga.layout')

@section('title', 'Taman Pendidikan Al-Quran (TPQ)')

@section('hero-class', 'bg-gradient-to-br from-green-600 via-green-700 to-emerald-800')
@section('favicon-url', '/assets/lembaga/favicon/faviconlm.png')
@section('nav-logo-url', '/assets/lembaga/lm.png')
@section('nav-brand', 'TPQ Al-Qodiriyah')
@section('nav-icon', 'fa-quran')
@section('footer-logo-url', '/assets/icon/favicon.png')
@section('nav-gradient', 'bg-gradient-to-br from-green-600 to-emerald-700')

@section('logo')
<div class="w-32 h-32 rounded-2xl bg-white/10 backdrop-blur flex items-center justify-center mx-auto mb-8">
    <i class="fas fa-quran text-6xl text-white"></i>
</div>
@endsection

@section('hero-title')
Taman Pendidikan Al-Quran
@endsection

@section('hero-subtitle')
Membentuk Generasi Qurani yang Fasih Membaca dan Mencintai Al-Quran Sejak Dini
@endsection

@section('content')
<!-- About Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Tentang TPQ</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Taman Pendidikan Al-Quran (TPQ) adalah lembaga pendidikan non-formal yang fokus 
                    pada pengajaran baca tulis Al-Quran untuk anak-anak. Dengan metode yang menyenangkan, 
                    anak-anak belajar Al-Quran dengan semangat dan kecintaan.
                </p>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Kami menggunakan metode Iqro dan Tilawati yang telah terbukti efektif dalam 
                    mengajarkan Al-Quran kepada anak-anak dengan cara yang mudah dipahami.
                </p>
                <div class="flex flex-wrap gap-4">
                    <div class="flex items-center text-green-600">
                        <i class="fas fa-check-circle mr-2"></i> Usia 4-12 Tahun
                    </div>
                    <div class="flex items-center text-green-600">
                        <i class="fas fa-check-circle mr-2"></i> Metode Iqro/Tilawati
                    </div>
                    <div class="flex items-center text-green-600">
                        <i class="fas fa-check-circle mr-2"></i> Hafalan Juz Amma
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gradient-to-br from-green-500 to-green-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-child text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">150+</h3>
                    <p class="text-white/80">Santri TPQ</p>
                </div>
                <div class="bg-gradient-to-br from-emerald-500 to-emerald-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-chalkboard-teacher text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">10+</h3>
                    <p class="text-white/80">Guru Ngaji</p>
                </div>
                <div class="bg-gradient-to-br from-teal-500 to-teal-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-book-open text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">6</h3>
                    <p class="text-white/80">Tingkatan Iqro</p>
                </div>
                <div class="bg-gradient-to-br from-lime-500 to-lime-700 rounded-2xl p-6 text-white">
                    <i class="fas fa-star text-4xl mb-4"></i>
                    <h3 class="text-2xl font-bold">90%</h3>
                    <p class="text-white/80">Lulus Iqro</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Levels Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Tingkatan Pembelajaran</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Tahapan belajar Al-Quran dari dasar hingga mahir</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl p-8 shadow-lg card-hover">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-xl flex items-center justify-center mb-6">
                    <span class="text-white text-2xl font-bold">1</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Tingkat Pemula</h3>
                <p class="text-gray-600">Mengenal huruf hijaiyah dan tanda baca dasar. Iqro jilid 1-3.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-lg card-hover">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center mb-6">
                    <span class="text-white text-2xl font-bold">2</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Tingkat Menengah</h3>
                <p class="text-gray-600">Membaca dengan tajwid dasar. Iqro jilid 4-6 dan hafalan surat pendek.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-lg card-hover">
                <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center mb-6">
                    <span class="text-white text-2xl font-bold">3</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Tingkat Mahir</h3>
                <p class="text-gray-600">Membaca Al-Quran dengan tartil dan tajwid lengkap. Hafalan Juz Amma.</p>
            </div>
        </div>
    </div>
</section>

<!-- Schedule Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Jadwal Mengaji</h2>
        <p class="text-gray-600 mb-8">Pilih waktu yang sesuai untuk putra/putri Anda</p>
        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-green-50 rounded-xl p-6">
                <i class="fas fa-sun text-green-600 text-3xl mb-3"></i>
                <h4 class="font-bold text-gray-900 mb-2">Sesi Sore</h4>
                <p class="text-gray-600">15:30 - 17:00 WIB</p>
                <p class="text-gray-500 text-sm mt-2">Senin - Jumat</p>
            </div>
            <div class="bg-emerald-50 rounded-xl p-6">
                <i class="fas fa-moon text-emerald-600 text-3xl mb-3"></i>
                <h4 class="font-bold text-gray-900 mb-2">Sesi Maghrib</h4>
                <p class="text-gray-600">18:00 - 19:30 WIB</p>
                <p class="text-gray-500 text-sm mt-2">Senin - Jumat</p>
            </div>
        </div>
    </div>
</section>
@endsection
