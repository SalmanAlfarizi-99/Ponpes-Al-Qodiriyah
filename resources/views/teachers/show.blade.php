@extends('layouts.app')

@section('title', 'Detail Ustadz/Ustadzah')
@section('breadcrumb')
    <a href="{{ route('teachers.index') }}" class="hover:text-primary-600">Ustadz/Ustadzah</a>
    <i class="fas fa-chevron-right mx-2 text-xs"></i>
    <span class="text-gray-700 dark:text-gray-300">{{ $teacher->name }}</span>
@endsection

@section('content')
<div class="space-y-6">
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-green-600 to-green-700 rounded-2xl p-6 text-white">
        <div class="flex items-start justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-24 h-24 bg-white/20 rounded-xl flex items-center justify-center overflow-hidden">
                    @if($teacher->photo)
                        <img src="{{ $teacher->photo_url }}" alt="{{ $teacher->name }}" class="w-full h-full object-cover">
                    @else
                        <i class="fas fa-user text-5xl"></i>
                    @endif
                </div>
                <div>
                    <h1 class="text-2xl font-bold">{{ $teacher->name }}</h1>
                    <p class="text-green-100 mt-1">{{ $teacher->nip ?? 'NIP belum diatur' }}</p>
                    <div class="flex items-center space-x-4 mt-2">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm {{ $teacher->status == 'active' ? 'bg-green-500/20 text-green-100' : 'bg-gray-500/20 text-gray-100' }}">
                            <i class="fas fa-circle text-xs mr-2"></i>
                            {{ $teacher->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                        <span class="text-green-200">
                            <i class="fas fa-graduation-cap mr-1"></i> {{ $teacher->specialization ?? 'Spesialisasi belum diatur' }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('teachers.edit', $teacher) }}" class="px-4 py-2 bg-white/10 hover:bg-white/20 rounded-lg transition-colors">
                    <i class="fas fa-edit mr-2"></i> Edit
                </a>
            </div>
        </div>
    </div>
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Kelas</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">{{ $teacher->classes->count() }}</p>
                </div>
                <div class="w-14 h-14 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center">
                    <i class="fas fa-door-open text-purple-600 dark:text-purple-400 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Jadwal Mengajar</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">{{ $teacher->schedules->count() }}</p>
                </div>
                <div class="w-14 h-14 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center">
                    <i class="fas fa-calendar-alt text-blue-600 dark:text-blue-400 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Lama Mengajar</p>
                    @php
                        $years = $teacher->join_date ? now()->diffInYears($teacher->join_date) : 0;
                    @endphp
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">{{ $years }} <span class="text-lg font-normal">tahun</span></p>
                </div>
                <div class="w-14 h-14 bg-green-100 dark:bg-green-900/30 rounded-xl flex items-center justify-center">
                    <i class="fas fa-clock text-green-600 dark:text-green-400 text-xl"></i>
                </div>
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
                    <span class="text-gray-900 dark:text-white font-medium">{{ $teacher->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Tempat Lahir</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $teacher->birth_place ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Tanggal Lahir</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $teacher->birth_date?->format('d F Y') ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">No. Telepon</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $teacher->phone ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Alamat</span>
                    <span class="text-gray-900 dark:text-white font-medium text-right max-w-xs">{{ $teacher->address ?? '-' }}</span>
                </div>
            </div>
        </div>
        
        <!-- Education Info -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
            <div class="p-6 border-b border-gray-100 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pendidikan & Karir</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Pendidikan Terakhir</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $teacher->education ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Spesialisasi</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $teacher->specialization ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Tanggal Bergabung</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $teacher->join_date?->format('d F Y') ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Classes List -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
        <div class="p-6 border-b border-gray-100 dark:border-gray-700">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Kelas yang Diampu</h3>
        </div>
        <div class="p-6">
            @if($teacher->classes->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($teacher->classes as $class)
                        <div class="flex items-center space-x-3 p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                            <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center">
                                <i class="fas fa-door-open text-purple-600 dark:text-purple-400"></i>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $class->name }}</p>
                                <p class="text-xs text-gray-500">{{ $class->santri_count }} santri</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center text-gray-500 dark:text-gray-400 py-4">
                    <i class="fas fa-door-open text-2xl mb-2 opacity-50"></i>
                    <p>Belum ada kelas yang diampu</p>
                </div>
            @endif
        </div>
    </div>
    
    <!-- Back Button -->
    <div class="flex">
        <a href="{{ route('teachers.index') }}" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-gray-900 font-medium">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>
    </div>
</div>
@endsection
