@extends('layouts.app')

@section('title', 'Data Ustadz/Ustadzah')
@section('breadcrumb', 'Ustadz/Ustadzah')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Data Ustadz/Ustadzah</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">Kelola data pengajar pondok pesantren</p>
        </div>
        <a href="{{ route('teachers.create') }}" class="inline-flex items-center justify-center px-4 py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors shadow-sm">
            <i class="fas fa-plus mr-2"></i> Tambah Ustadz/Ustadzah
        </a>
    </div>
    
    <!-- Filters -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-4">
        <form action="{{ route('teachers.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <input type="text" name="search" value="{{ request('search') }}" 
                    placeholder="Cari nama, NIP, atau spesialisasi..." 
                    class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
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
                <a href="{{ route('teachers.index') }}" class="px-4 py-2.5 text-gray-500 hover:text-gray-700 dark:text-gray-400">
                    <i class="fas fa-times"></i>
                </a>
            </div>
        </form>
    </div>
    
    <!-- Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($teachers as $teacher)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-md transition-shadow">
                <div class="p-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-16 h-16 rounded-xl bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center overflow-hidden">
                            @if($teacher->photo)
                                <img src="{{ $teacher->photo_url }}" alt="{{ $teacher->name }}" class="w-full h-full object-cover">
                            @else
                                <i class="fas fa-user text-primary-600 dark:text-primary-400 text-2xl"></i>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white truncate">{{ $teacher->name }}</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $teacher->nip ?? 'NIP belum diatur' }}</p>
                            @php
                                $statusColors = [
                                    'active' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300',
                                    'inactive' => 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300',
                                ];
                            @endphp
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium mt-2 {{ $statusColors[$teacher->status] ?? $statusColors['inactive'] }}">
                                {{ $teacher->status == 'active' ? 'Aktif' : 'Tidak Aktif' }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="mt-4 space-y-2">
                        <div class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                            <i class="fas fa-graduation-cap w-5 text-gray-400"></i>
                            <span class="ml-2">{{ $teacher->specialization ?? 'Spesialisasi belum diatur' }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                            <i class="fas fa-phone w-5 text-gray-400"></i>
                            <span class="ml-2">{{ $teacher->phone ?? '-' }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600 dark:text-gray-300">
                            <i class="fas fa-door-open w-5 text-gray-400"></i>
                            <span class="ml-2">{{ $teacher->classes->count() }} kelas</span>
                        </div>
                    </div>
                </div>
                
                <div class="px-6 py-3 bg-gray-50 dark:bg-gray-700/50 border-t border-gray-100 dark:border-gray-700 flex justify-end space-x-2">
                    <a href="{{ route('teachers.show', $teacher) }}" class="p-2 text-gray-400 hover:text-blue-600 transition-colors" title="Lihat">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('teachers.edit', $teacher) }}" class="p-2 text-gray-400 hover:text-yellow-600 transition-colors" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('teachers.destroy', $teacher) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                        <i class="fas fa-chalkboard-teacher text-4xl mb-3 opacity-50"></i>
                        <p class="text-lg font-medium">Belum ada data ustadz/ustadzah</p>
                        <p class="text-sm mt-1">Klik tombol "Tambah Ustadz/Ustadzah" untuk menambahkan data baru</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
    
    <!-- Pagination -->
    @if($teachers->hasPages())
        <div class="flex justify-center">
            {{ $teachers->links() }}
        </div>
    @endif
</div>
@endsection
