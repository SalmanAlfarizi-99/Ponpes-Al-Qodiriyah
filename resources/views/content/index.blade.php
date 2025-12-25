@extends('layouts.app')

@section('title', 'Kelola Konten')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Kelola Konten Website</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-1">Kelola konten yang ditampilkan di halaman utama</p>
        </div>
        <a href="{{ route('content.create') }}" class="inline-flex items-center px-4 py-2.5 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors">
            <i class="fas fa-plus mr-2"></i> Tambah Konten
        </a>
    </div>

    <!-- Content Cards by Section -->
    @foreach($sections as $sectionKey => $sectionLabel)
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
        <div class="p-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">
                <i class="fas fa-layer-group mr-2 text-primary-600"></i> {{ $sectionLabel }}
            </h2>
            <a href="{{ route('content.section.edit', $sectionKey) }}" class="px-4 py-2 bg-primary-600 hover:bg-primary-700 text-white text-sm rounded-lg transition">
                <i class="fas fa-edit mr-1"></i> Edit Section
            </a>
        </div>
        <div class="p-4">
            @if(isset($settings[$sectionKey]) && $settings[$sectionKey]->count() > 0)
            <div class="space-y-3">
                @foreach($settings[$sectionKey] as $setting)
                <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                    <div class="flex-1">
                        <p class="font-medium text-gray-900 dark:text-white">{{ $setting->label }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Key: {{ $setting->key }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                            @if($setting->type == 'textarea')
                                {{ Str::limit($setting->value, 100) }}
                            @elseif($setting->type == 'image')
                                <img src="{{ $setting->value }}" class="h-10 rounded">
                            @else
                                {{ $setting->value }}
                            @endif
                        </p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('content.edit', $setting) }}" class="p-2 text-yellow-600 hover:bg-yellow-50 rounded-lg">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('content.destroy', $setting) }}" method="POST" class="inline" onsubmit="return confirm('Hapus konten ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <p class="text-gray-500 dark:text-gray-400 text-center py-4">
                <i class="fas fa-inbox text-2xl mb-2 block opacity-50"></i>
                Belum ada konten untuk section ini
            </p>
            @endif
        </div>
    </div>
    @endforeach
</div>
@endsection
