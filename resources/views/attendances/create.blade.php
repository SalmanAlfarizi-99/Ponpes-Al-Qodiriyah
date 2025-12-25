@extends('layouts.app')

@section('title', 'Input Absensi Santri')
@section('breadcrumb')
    <a href="{{ route('attendances.index') }}" class="hover:text-primary-600">Absensi</a>
    <i class="fas fa-chevron-right mx-2 text-xs"></i>
    <span class="text-gray-700 dark:text-gray-300">Input</span>
@endsection

@section('content')
<div class="space-y-6">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
        <div class="p-6 border-b border-gray-100 dark:border-gray-700">
            <h1 class="text-xl font-bold text-gray-900 dark:text-white">Input Absensi Santri</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">Pilih kelas dan tanggal untuk mengisi absensi</p>
        </div>
        
        <!-- Class Selection -->
        <div class="p-6 border-b border-gray-100 dark:border-gray-700">
            <form action="{{ route('attendances.create') }}" method="GET" class="flex flex-wrap items-end gap-4">
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tanggal</label>
                    <input type="date" name="date" value="{{ $date }}" 
                        class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                </div>
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kelas</label>
                    <select name="class_id" class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                        <option value="">Pilih Kelas</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}" {{ $classId == $class->id ? 'selected' : '' }}>{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="px-6 py-2.5 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 font-medium rounded-lg transition-colors">
                    <i class="fas fa-search mr-2"></i> Tampilkan
                </button>
            </form>
        </div>
        
        @if($classId && $santriList->count() > 0)
            <form action="{{ route('attendances.store') }}" method="POST" class="p-6">
                @csrf
                <input type="hidden" name="date" value="{{ $date }}">
                <input type="hidden" name="class_id" value="{{ $classId }}">
                
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 dark:bg-gray-700/50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">#</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Nama Santri</th>
                                <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase">
                                    <span class="text-green-600">Hadir</span>
                                </th>
                                <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase">
                                    <span class="text-yellow-600">Sakit</span>
                                </th>
                                <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase">
                                    <span class="text-blue-600">Izin</span>
                                </th>
                                <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase">
                                    <span class="text-red-600">Alpa</span>
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Catatan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            @foreach($santriList as $index => $s)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                    <td class="px-4 py-3 text-sm text-gray-500">{{ $index + 1 }}</td>
                                    <td class="px-4 py-3">
                                        <input type="hidden" name="attendance[{{ $index }}][santri_id]" value="{{ $s->id }}">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $s->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $s->nis }}</div>
                                    </td>
                                    @php $current = $existingAttendance[$s->id] ?? 'present'; @endphp
                                    <td class="px-4 py-3 text-center">
                                        <input type="radio" name="attendance[{{ $index }}][status]" value="present" {{ $current == 'present' ? 'checked' : '' }}
                                            class="w-4 h-4 text-green-600 border-gray-300 focus:ring-green-500">
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <input type="radio" name="attendance[{{ $index }}][status]" value="sick" {{ $current == 'sick' ? 'checked' : '' }}
                                            class="w-4 h-4 text-yellow-600 border-gray-300 focus:ring-yellow-500">
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <input type="radio" name="attendance[{{ $index }}][status]" value="permitted" {{ $current == 'permitted' ? 'checked' : '' }}
                                            class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <input type="radio" name="attendance[{{ $index }}][status]" value="absent" {{ $current == 'absent' ? 'checked' : '' }}
                                            class="w-4 h-4 text-red-600 border-gray-300 focus:ring-red-500">
                                    </td>
                                    <td class="px-4 py-3">
                                        <input type="text" name="attendance[{{ $index }}][notes]" placeholder="Keterangan..."
                                            class="w-full px-2 py-1 text-sm border border-gray-300 dark:border-gray-600 rounded focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="flex justify-end mt-6">
                    <button type="submit" class="px-6 py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors shadow-sm">
                        <i class="fas fa-save mr-2"></i> Simpan Absensi
                    </button>
                </div>
            </form>
        @elseif($classId)
            <div class="p-12 text-center text-gray-400">
                <i class="fas fa-users-slash text-4xl mb-3 opacity-50"></i>
                <p class="text-lg">Tidak ada santri di kelas ini</p>
            </div>
        @else
            <div class="p-12 text-center text-gray-400">
                <i class="fas fa-chalkboard text-4xl mb-3 opacity-50"></i>
                <p class="text-lg">Pilih kelas terlebih dahulu</p>
            </div>
        @endif
    </div>
</div>
@endsection
