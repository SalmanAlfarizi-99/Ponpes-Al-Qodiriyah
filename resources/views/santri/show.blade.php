@extends('layouts.app')

@section('title', 'Detail Santri')
@section('breadcrumb')
    <a href="{{ route('santri.index') }}" class="hover:text-primary-600">Santri</a>
    <i class="fas fa-chevron-right mx-2 text-xs"></i>
    <span class="text-gray-700 dark:text-gray-300">{{ $santri->name }}</span>
@endsection

@section('content')
<div class="space-y-6">
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-2xl p-6 text-white">
        <div class="flex items-start justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-20 h-20 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-user-graduate text-4xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold">{{ $santri->name }}</h1>
                    <p class="text-primary-100 mt-1">NIS: {{ $santri->nis }}</p>
                    <div class="flex items-center space-x-4 mt-2">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm {{ $santri->status == 'active' ? 'bg-green-500/20 text-green-100' : 'bg-gray-500/20 text-gray-100' }}">
                            <i class="fas fa-circle text-xs mr-2"></i>
                            {{ $santri->status == 'active' ? 'Aktif' : ucfirst($santri->status) }}
                        </span>
                        <span class="text-primary-200">
                            <i class="fas fa-school mr-1"></i> {{ $santri->class->name ?? 'Belum ada kelas' }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('santri.edit', $santri) }}" class="px-4 py-2 bg-white/10 hover:bg-white/20 rounded-lg transition-colors">
                    <i class="fas fa-edit mr-2"></i> Edit
                </a>
            </div>
        </div>
    </div>
    
    <!-- Info Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Personal Info -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
            <div class="p-6 border-b border-gray-100 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Data Pribadi</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Jenis Kelamin</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $santri->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Tempat Lahir</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $santri->birth_place ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Tanggal Lahir</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $santri->birth_date?->format('d F Y') ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Usia</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $santri->age ?? '-' }} tahun</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Alamat</span>
                    <span class="text-gray-900 dark:text-white font-medium text-right max-w-xs">{{ $santri->address ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Tanggal Masuk</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $santri->enrollment_date?->format('d F Y') ?? '-' }}</span>
                </div>
            </div>
        </div>
        
        <!-- Guardian Info -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
            <div class="p-6 border-b border-gray-100 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Data Wali Santri</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Nama Wali</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $santri->guardian_name ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Hubungan</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $santri->guardian_relation ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">No. Telepon</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $santri->guardian_phone ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Notes -->
    @if($santri->notes)
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Catatan</h3>
            <p class="text-gray-600 dark:text-gray-300">{{ $santri->notes }}</p>
        </div>
    @endif
    
    <!-- Back Button -->
    <div class="flex">
        <a href="{{ route('santri.index') }}" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-gray-900 font-medium">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>
    </div>
</div>
@endsection
