@extends('layouts.app')

@section('title', 'Data Kelas')
@section('breadcrumb', 'Kelas')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Data Kelas</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">Kelola data kelas pondok pesantren</p>
        </div>
        <a href="{{ route('classes.create') }}" class="inline-flex items-center justify-center px-4 py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors shadow-sm">
            <i class="fas fa-plus mr-2"></i> Tambah Kelas
        </a>
    </div>
    
    <!-- Filters -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-4">
        <form action="{{ route('classes.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <input type="text" name="search" value="{{ request('search') }}" 
                    placeholder="Cari nama kelas..." 
                    class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
            </div>
            <div>
                <select name="level" class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                    <option value="">Semua Tingkat</option>
                    @foreach($levels as $level)
                        <option value="{{ $level }}" {{ request('level') == $level ? 'selected' : '' }}>{{ $level }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <select name="status" class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                    <option value="">Semua Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Aktif</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>
            <div class="flex space-x-2">
                <button type="submit" class="flex-1 px-4 py-2.5 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 font-medium rounded-lg transition-colors">
                    <i class="fas fa-search mr-2"></i> Filter
                </button>
                <a href="{{ route('classes.index') }}" class="px-4 py-2.5 text-gray-500 hover:text-gray-700 dark:text-gray-400">
                    <i class="fas fa-times"></i>
                </a>
            </div>
        </form>
    </div>
    
    <!-- Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($classes as $class)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-md transition-shadow">
                <div class="p-6">
                    <div class="flex items-start justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 rounded-lg bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center">
                                <i class="fas fa-door-open text-purple-600 dark:text-purple-400 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $class->name }}</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $class->level ?? 'Tingkat belum diatur' }}</p>
                            </div>
                        </div>
                        @php
                            $statusColors = [
                                'active' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300',
                                'inactive' => 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300',
                            ];
                        @endphp
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$class->status] ?? $statusColors['inactive'] }}">
                            {{ $class->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </div>
                    
                    <div class="mt-4 space-y-3">
                        <div class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                            <i class="fas fa-chalkboard-teacher w-5 text-gray-400"></i>
                            <span class="ml-2">{{ $class->teacher->name ?? 'Belum ada wali kelas' }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                            <i class="fas fa-calendar-alt w-5 text-gray-400"></i>
                            <span class="ml-2">{{ $class->academic_year }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                                <i class="fas fa-users w-5 text-gray-400"></i>
                                <span class="ml-2">{{ $class->santri_count }}/{{ $class->capacity }} Santri</span>
                            </div>
                            <div class="w-24 bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                @php
                                    $percentage = $class->capacity > 0 ? ($class->santri_count / $class->capacity) * 100 : 0;
                                @endphp
                                <div class="bg-primary-600 h-2 rounded-full" style="width: {{ min($percentage, 100) }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="px-6 py-3 bg-gray-50 dark:bg-gray-700/50 border-t border-gray-100 dark:border-gray-700 flex justify-end space-x-2">
                    <a href="{{ route('classes.show', $class) }}" class="p-2 text-gray-400 hover:text-blue-600 transition-colors" title="Lihat">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('classes.edit', $class) }}" class="p-2 text-gray-400 hover:text-yellow-600 transition-colors" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('classes.destroy', $class) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus kelas ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 text-gray-400 hover:text-red-600 transition-colors" title="Hapus">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-12 text-center">
                    <div class="text-gray-400 dark:text-gray-500">
                        <i class="fas fa-school text-4xl mb-3 opacity-50"></i>
                        <p class="text-lg font-medium">Belum ada data kelas</p>
                        <p class="text-sm mt-1">Klik tombol "Tambah Kelas" untuk menambahkan data baru</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
    
    <!-- Pagination -->
    @if($classes->hasPages())
        <div class="flex justify-center">
            {{ $classes->links() }}
        </div>
    @endif
</div>
@endsection
