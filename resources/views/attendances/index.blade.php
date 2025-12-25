@extends('layouts.app')

@section('title', 'Absensi')
@section('breadcrumb', 'Absensi')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Absensi {{ $type == 'santri' ? 'Santri' : 'Ustadz/Ustadzah' }}</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">Tanggal: {{ \Carbon\Carbon::parse($date)->format('d F Y') }}</p>
        </div>
        <div class="flex space-x-3">
            @if($type == 'santri')
                <a href="{{ route('attendances.create', ['date' => $date]) }}" class="inline-flex items-center px-4 py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors shadow-sm">
                    <i class="fas fa-plus mr-2"></i> Input Absensi Santri
                </a>
            @else
                <a href="{{ route('attendances.create-teacher', ['date' => $date]) }}" class="inline-flex items-center px-4 py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors shadow-sm">
                    <i class="fas fa-plus mr-2"></i> Input Absensi Ustadz
                </a>
            @endif
        </div>
    </div>
    
    <!-- Filters -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-4">
        <form action="{{ route('attendances.index') }}" method="GET" class="flex flex-wrap items-center gap-4">
            <div>
                <input type="date" name="date" value="{{ $date }}" 
                    class="px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
            </div>
            <div>
                <select name="type" class="px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                    <option value="santri" {{ $type == 'santri' ? 'selected' : '' }}>Santri</option>
                    <option value="teacher" {{ $type == 'teacher' ? 'selected' : '' }}>Ustadz/Ustadzah</option>
                </select>
            </div>
            <button type="submit" class="px-4 py-2.5 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 font-medium rounded-lg transition-colors">
                <i class="fas fa-search mr-2"></i> Tampilkan
            </button>
        </form>
    </div>
    
    <!-- Stats Summary -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl p-4 text-center">
            <div class="text-2xl font-bold text-green-600 dark:text-green-400">{{ $attendances->where('status', 'present')->count() }}</div>
            <div class="text-sm text-green-600 dark:text-green-400">Hadir</div>
        </div>
        <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-xl p-4 text-center">
            <div class="text-2xl font-bold text-yellow-600 dark:text-yellow-400">{{ $attendances->where('status', 'sick')->count() }}</div>
            <div class="text-sm text-yellow-600 dark:text-yellow-400">Sakit</div>
        </div>
        <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-xl p-4 text-center">
            <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">{{ $attendances->where('status', 'permitted')->count() }}</div>
            <div class="text-sm text-blue-600 dark:text-blue-400">Izin</div>
        </div>
        <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl p-4 text-center">
            <div class="text-2xl font-bold text-red-600 dark:text-red-400">{{ $attendances->where('status', 'absent')->count() }}</div>
            <div class="text-sm text-red-600 dark:text-red-400">Alpa</div>
        </div>
    </div>
    
    <!-- Table -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 dark:bg-gray-700/50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">#</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Nama</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase">Catatan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @forelse($attendances as $index => $att)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-gray-900 dark:text-white">
                                    {{ $type == 'santri' ? ($att->santri->name ?? '-') : ($att->teacher->name ?? '-') }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $colors = [
                                        'present' => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300',
                                        'sick' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-300',
                                        'permitted' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300',
                                        'absent' => 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-300',
                                    ];
                                    $labels = ['present' => 'Hadir', 'sick' => 'Sakit', 'permitted' => 'Izin', 'absent' => 'Alpa'];
                                @endphp
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $colors[$att->status] ?? '' }}">
                                    {{ $labels[$att->status] ?? $att->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $att->notes ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-gray-400">
                                <i class="fas fa-clipboard-list text-4xl mb-3 opacity-50"></i>
                                <p class="text-lg">Belum ada data absensi</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($attendances->hasPages())
            <div class="px-6 py-4 border-t border-gray-100 dark:border-gray-700">
                {{ $attendances->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
