@extends('layouts.app')

@section('title', 'Detail Pembayaran')
@section('breadcrumb')
    <a href="{{ route('payments.index') }}" class="hover:text-primary-600">Keuangan</a>
    <i class="fas fa-chevron-right mx-2 text-xs"></i>
    <span class="text-gray-700 dark:text-gray-300">{{ $payment->receipt_number }}</span>
@endsection

@section('content')
<div class="space-y-6">
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-accent-600 to-accent-700 rounded-2xl p-6 text-white">
        <div class="flex items-start justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-20 h-20 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-receipt text-4xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold">{{ $payment->receipt_number }}</h1>
                    <p class="text-accent-100 mt-1">Kwitansi Pembayaran</p>
                    <div class="flex items-center space-x-4 mt-2">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-white/20 text-white">
                            <i class="fas fa-calendar mr-2"></i>
                            {{ $payment->payment_date->format('d F Y') }}
                        </span>
                        <span class="text-accent-200">
                            <i class="fas fa-user mr-1"></i> {{ $payment->santri->name ?? '-' }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('payments.edit', $payment) }}" class="px-4 py-2 bg-white/10 hover:bg-white/20 rounded-lg transition-colors">
                    <i class="fas fa-edit mr-2"></i> Edit
                </a>
            </div>
        </div>
    </div>
    
    <!-- Amount Card -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
        <div class="text-center">
            <p class="text-sm text-gray-500 dark:text-gray-400">Jumlah Pembayaran</p>
            <p class="text-4xl font-bold text-gray-900 dark:text-white mt-2">Rp {{ number_format($payment->amount, 0, ',', '.') }}</p>
            <div class="flex items-center justify-center space-x-4 mt-4">
                @php
                    $methodColors = [
                        'cash' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300',
                        'transfer' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300',
                        'other' => 'bg-gray-100 text-gray-800 dark:bg-gray-900/30 dark:text-gray-300',
                    ];
                @endphp
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $methodColors[$payment->payment_method] ?? $methodColors['other'] }}">
                    <i class="fas fa-{{ $payment->payment_method == 'cash' ? 'money-bill' : ($payment->payment_method == 'transfer' ? 'university' : 'credit-card') }} mr-2"></i>
                    {{ $payment->payment_method_label }}
                </span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-primary-100 text-primary-800 dark:bg-primary-900/30 dark:text-primary-300">
                    {{ $payment->paymentType->name ?? '-' }}
                </span>
            </div>
        </div>
    </div>
    
    <!-- Info Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Payment Info -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
            <div class="p-6 border-b border-gray-100 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Detail Pembayaran</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Jenis Pembayaran</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $payment->paymentType->name ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Periode</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $payment->month_name }} {{ $payment->year }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Metode Pembayaran</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $payment->payment_method_label }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Tanggal Pembayaran</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $payment->payment_date->format('d F Y') }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Dicatat oleh</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $payment->recorder->name ?? '-' }}</span>
                </div>
            </div>
        </div>
        
        <!-- Santri Info -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
            <div class="p-6 border-b border-gray-100 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Data Santri</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Nama</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $payment->santri->name ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">NIS</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $payment->santri->nis ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Kelas</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $payment->santri->class->name ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Wali</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $payment->santri->guardian_name ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Notes -->
    @if($payment->notes)
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Catatan</h3>
            <p class="text-gray-600 dark:text-gray-300">{{ $payment->notes }}</p>
        </div>
    @endif
    
    <!-- Back Button -->
    <div class="flex justify-between">
        <a href="{{ route('payments.index') }}" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-gray-900 font-medium">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>
        <button onclick="window.print()" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 rounded-lg transition-colors">
            <i class="fas fa-print mr-2"></i> Cetak
        </button>
    </div>
</div>
@endsection
