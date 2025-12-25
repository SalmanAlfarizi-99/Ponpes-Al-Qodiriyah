@extends('layouts.app')

@section('title', 'Detail Kelas')
@section('breadcrumb')
    <a href="{{ route('classes.index') }}" class="hover:text-primary-600">Kelas</a>
    <i class="fas fa-chevron-right mx-2 text-xs"></i>
    <span class="text-gray-700 dark:text-gray-300">{{ $class->name }}</span>
@endsection

@section('content')
<div class="space-y-6">
    <!-- Header Card -->
    <div class="bg-gradient-to-r from-purple-600 to-purple-700 rounded-2xl p-6 text-white">
        <div class="flex items-start justify-between">
            <div class="flex items-center space-x-4">
                <div class="w-20 h-20 bg-white/20 rounded-xl flex items-center justify-center">
                    <i class="fas fa-door-open text-4xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold">{{ $class->name }}</h1>
                    <p class="text-purple-100 mt-1">{{ $class->level ?? 'Tingkat belum diatur' }}</p>
                    <div class="flex items-center space-x-4 mt-2">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm {{ $class->status == 'active' ? 'bg-green-500/20 text-green-100' : 'bg-gray-500/20 text-gray-100' }}">
                            <i class="fas fa-circle text-xs mr-2"></i>
                            {{ $class->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                        <span class="text-purple-200">
                            <i class="fas fa-calendar mr-1"></i> {{ $class->academic_year }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('classes.edit', $class) }}" class="px-4 py-2 bg-white/10 hover:bg-white/20 rounded-lg transition-colors">
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
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Santri</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">{{ $class->santri_count }}</p>
                </div>
                <div class="w-14 h-14 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center">
                    <i class="fas fa-users text-blue-600 dark:text-blue-400 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Kapasitas</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">{{ $class->capacity }}</p>
                </div>
                <div class="w-14 h-14 bg-green-100 dark:bg-green-900/30 rounded-xl flex items-center justify-center">
                    <i class="fas fa-chair text-green-600 dark:text-green-400 text-xl"></i>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-sm border border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Slot Tersedia</p>
                    <p class="text-3xl font-bold text-gray-900 dark:text-white mt-1">{{ $class->available_slots }}</p>
                </div>
                <div class="w-14 h-14 bg-yellow-100 dark:bg-yellow-900/30 rounded-xl flex items-center justify-center">
                    <i class="fas fa-user-plus text-yellow-600 dark:text-yellow-400 text-xl"></i>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Info Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Class Info -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
            <div class="p-6 border-b border-gray-100 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Informasi Kelas</h3>
            </div>
            <div class="p-6 space-y-4">
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Nama Kelas</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $class->name }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Tingkat</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $class->level ?? '-' }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Tahun Ajaran</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $class->academic_year }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500 dark:text-gray-400">Wali Kelas</span>
                    <span class="text-gray-900 dark:text-white font-medium">{{ $class->teacher->name ?? 'Belum ada wali kelas' }}</span>
                </div>
            </div>
        </div>
        
        <!-- Description -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
            <div class="p-6 border-b border-gray-100 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Deskripsi</h3>
            </div>
            <div class="p-6">
                <p class="text-gray-600 dark:text-gray-300">{{ $class->description ?? 'Tidak ada deskripsi' }}</p>
            </div>
        </div>
    </div>
    
    <!-- Santri List -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
        <div class="p-6 border-b border-gray-100 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Daftar Santri</h3>
                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $class->santri_count }} santri</span>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 dark:bg-gray-700/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Santri</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Jenis Kelamin</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse($class->santri as $index => $santri)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 rounded-full bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center">
                                        <i class="fas fa-user text-primary-600 dark:text-primary-400 text-sm"></i>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $santri->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $santri->nis }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">
                                {{ $santri->gender == 'male' ? 'Laki-laki' : 'Perempuan' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $santri->status == 'active' ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $santri->status == 'active' ? 'Aktif' : ucfirst($santri->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                <i class="fas fa-users text-3xl mb-2 opacity-50"></i>
                                <p>Belum ada santri di kelas ini</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Back Button -->
    <div class="flex">
        <a href="{{ route('classes.index') }}" class="px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-gray-900 font-medium">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>
    </div>
</div>
@endsection
