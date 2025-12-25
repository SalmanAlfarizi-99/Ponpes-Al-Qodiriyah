@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Hero Section with Islamic Pattern Background -->
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-primary-600 via-primary-700 to-primary-800">
        <!-- Islamic Geometric Pattern Overlay -->
        <div class="absolute inset-0 opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <defs>
                    <pattern id="islamic-pattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <path d="M10 0L20 10L10 20L0 10Z" fill="none" stroke="white" stroke-width="0.5"/>
                        <circle cx="10" cy="10" r="3" fill="none" stroke="white" stroke-width="0.3"/>
                        <path d="M0 0L10 10M20 0L10 10M0 20L10 10M20 20L10 10" stroke="white" stroke-width="0.2"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#islamic-pattern)"/>
            </svg>
        </div>
        
        <!-- Hero Content -->
        <div class="relative z-10 p-8 md:p-12">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                <div class="flex-1 text-center md:text-left">
                    <div class="inline-flex items-center px-3 py-1 rounded-full bg-white/10 text-white/90 text-sm mb-4">
                        <i class="fas fa-moon mr-2"></i>
                        {{ now()->locale('id')->translatedFormat('l, d F Y') }}
                    </div>
                    <h1 class="text-3xl md:text-4xl font-bold text-white">Assalamu'alaikum, {{ $user->name }}!</h1>
                    <p class="text-primary-100 mt-3 text-lg max-w-xl">Selamat datang di Sistem Manajemen Pondok Pesantren. Kelola semua aktivitas pesantren dengan mudah dan efisien.</p>
                    <div class="flex flex-wrap gap-4 mt-6 justify-center md:justify-start">
                        <a href="{{ route('santri.create') }}" class="inline-flex items-center px-4 py-2 bg-white text-primary-700 font-medium rounded-lg hover:bg-primary-50 transition-colors">
                            <i class="fas fa-user-plus mr-2"></i> Tambah Santri
                        </a>
                        <a href="{{ route('attendances.create') }}" class="inline-flex items-center px-4 py-2 bg-white/10 text-white font-medium rounded-lg hover:bg-white/20 transition-colors border border-white/20">
                            <i class="fas fa-clipboard-check mr-2"></i> Absensi Hari Ini
                        </a>
                    </div>
                </div>
                <div class="hidden lg:flex items-center justify-center">
                    <div class="relative">
                        <div class="w-48 h-48 rounded-full bg-white/10 flex items-center justify-center backdrop-blur-sm">
                            <i class="fas fa-mosque text-7xl text-white/80"></i>
                        </div>
                        <div class="absolute -top-4 -right-4 w-16 h-16 bg-accent-400/80 rounded-full flex items-center justify-center shadow-lg animate-pulse">
                            <i class="fas fa-star text-white text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Santri -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Santri</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">{{ number_format($stats['total_santri']) }}</p>
                    <p class="text-xs text-green-600 mt-2">
                        <i class="fas fa-arrow-up mr-1"></i> Santri aktif
                    </p>
                </div>
                <div class="w-14 h-14 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center">
                    <i class="fas fa-user-graduate text-blue-600 dark:text-blue-400 text-xl"></i>
                </div>
            </div>
        </div>
        
        <!-- Total Teachers -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Ustadz/Ustadzah</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">{{ number_format($stats['total_teachers']) }}</p>
                    <p class="text-xs text-green-600 mt-2">
                        <i class="fas fa-check-circle mr-1"></i> Aktif mengajar
                    </p>
                </div>
                <div class="w-14 h-14 bg-green-100 dark:bg-green-900/30 rounded-xl flex items-center justify-center">
                    <i class="fas fa-chalkboard-teacher text-green-600 dark:text-green-400 text-xl"></i>
                </div>
            </div>
        </div>
        
        <!-- Total Classes -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Jumlah Kelas</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">{{ number_format($stats['total_classes']) }}</p>
                    <p class="text-xs text-blue-600 mt-2">
                        <i class="fas fa-school mr-1"></i> Kelas aktif
                    </p>
                </div>
                <div class="w-14 h-14 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center">
                    <i class="fas fa-door-open text-purple-600 dark:text-purple-400 text-xl"></i>
                </div>
            </div>
        </div>
        
        <!-- Monthly Payments -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-100 dark:border-gray-700 hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Pembayaran Bulan Ini</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white mt-1">Rp {{ number_format($monthlyPayments, 0, ',', '.') }}</p>
                    <p class="text-xs text-green-600 mt-2">
                        <i class="fas fa-chart-line mr-1"></i> Total masuk
                    </p>
                </div>
                <div class="w-14 h-14 bg-accent-100 dark:bg-accent-900/30 rounded-xl flex items-center justify-center">
                    <i class="fas fa-coins text-accent-600 dark:text-accent-400 text-xl"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Charts and Tables Row -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Attendance Summary -->
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-100 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Rekapitulasi Absensi</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Bulan {{ now()->format('F Y') }}</p>
            
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        <span class="text-sm text-gray-600 dark:text-gray-300">Hadir</span>
                    </div>
                    <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $attendanceSummary['present'] ?? 0 }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                        <span class="text-sm text-gray-600 dark:text-gray-300">Sakit</span>
                    </div>
                    <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $attendanceSummary['sick'] ?? 0 }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                        <span class="text-sm text-gray-600 dark:text-gray-300">Izin</span>
                    </div>
                    <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $attendanceSummary['permitted'] ?? 0 }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="w-3 h-3 rounded-full bg-red-500"></div>
                        <span class="text-sm text-gray-600 dark:text-gray-300">Alpa</span>
                    </div>
                    <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ $attendanceSummary['absent'] ?? 0 }}</span>
                </div>
            </div>
        </div>
        
        <!-- Recent Payments -->
        <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
            <div class="p-6 border-b border-gray-100 dark:border-gray-700">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pembayaran Terbaru</h3>
                    <a href="{{ route('payments.index') }}" class="text-sm text-primary-600 hover:text-primary-700 font-medium">
                        Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700/50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Santri</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Jenis</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Jumlah</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                        @forelse($recentPayments as $payment)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $payment->santri->name ?? '-' }}</div>
                                    <div class="text-xs text-gray-500">{{ $payment->santri->nis ?? '' }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-100 text-primary-800 dark:bg-primary-900/30 dark:text-primary-300">
                                        {{ $payment->paymentType->name ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white">
                                    Rp {{ number_format($payment->amount, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $payment->payment_date->format('d M Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                    <i class="fas fa-inbox text-3xl mb-2 opacity-50"></i>
                                    <p>Belum ada data pembayaran</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Announcements -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
        <div class="p-6 border-b border-gray-100 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pengumuman Terbaru</h3>
        </div>
        <div class="p-6">
            @forelse($announcements as $announcement)
                <div class="flex items-start space-x-4 {{ !$loop->last ? 'mb-4 pb-4 border-b border-gray-100 dark:border-gray-700' : '' }}">
                    <div class="w-10 h-10 rounded-lg bg-{{ $announcement->priority_color }}-100 dark:bg-{{ $announcement->priority_color }}-900/30 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-bullhorn text-{{ $announcement->priority_color }}-600 dark:text-{{ $announcement->priority_color }}-400"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $announcement->title }}</h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 line-clamp-2">{!! Str::limit(strip_tags($announcement->content), 150) !!}</p>
                        <p class="text-xs text-gray-400 dark:text-gray-500 mt-2">
                            <i class="fas fa-clock mr-1"></i> {{ $announcement->published_at?->diffForHumans() ?? 'Baru saja' }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                    <i class="fas fa-bullhorn text-3xl mb-2 opacity-50"></i>
                    <p>Tidak ada pengumuman</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
