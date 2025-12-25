@extends('layouts.app')

@section('title', 'Edit Konten')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('content.index') }}" class="text-primary-600 hover:text-primary-700 text-sm">
            <i class="fas fa-arrow-left mr-1"></i> Kembali ke Daftar Konten
        </a>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-2">Edit Konten</h1>
        <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">{{ $content->label }}</p>
    </div>

    <!-- Info Card -->
    <div class="bg-blue-50 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-700 rounded-lg p-4 mb-6">
        <div class="flex items-start">
            <i class="fas fa-info-circle text-blue-500 mt-0.5 mr-3"></i>
            <div class="text-sm text-blue-700 dark:text-blue-300">
                <strong>Key:</strong> {{ $content->key }}<br>
                <strong>Section:</strong> {{ $sections[$content->section] ?? $content->section }}<br>
                <strong>Tipe:</strong> {{ $types[$content->type] ?? $content->type }}
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <form action="{{ route('content.update', $content) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Hidden fields to preserve key, section, type -->
            <input type="hidden" name="key" value="{{ $content->key }}">
            <input type="hidden" name="section" value="{{ $content->section }}">
            <input type="hidden" name="type" value="{{ $content->type }}">
            <input type="hidden" name="label" value="{{ $content->label }}">
            <input type="hidden" name="order" value="{{ $content->order }}">
            
            @if($content->type === 'image')
            <!-- Image Upload Field -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    <i class="fas fa-image mr-1"></i> Gambar
                </label>
                
                @if($content->value)
                <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-2">Gambar saat ini:</p>
                    <img src="{{ $content->value }}" alt="Current image" class="h-32 rounded-lg shadow">
                    <p class="text-xs text-gray-500 mt-2">{{ $content->value }}</p>
                </div>
                @else
                <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg text-center">
                    <i class="fas fa-image text-4xl text-gray-400 mb-2"></i>
                    <p class="text-sm text-gray-500">Belum ada gambar</p>
                </div>
                @endif
                
                <input type="file" name="image_file" accept="image/*"
                    class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, GIF, WebP. Maksimal 2MB.</p>
                <p class="text-sm text-gray-500">Kosongkan jika tidak ingin mengganti gambar.</p>
                @error('image_file')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            @else
            <!-- Text/Textarea Field -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    <i class="fas fa-pen mr-1"></i> Nilai/Konten
                </label>
                @if($content->type === 'textarea')
                <textarea name="value" rows="5"
                    class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white"
                    placeholder="Masukkan konten...">{{ old('value', $content->value) }}</textarea>
                @else
                <input type="text" name="value" value="{{ old('value', $content->value) }}"
                    class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white"
                    placeholder="Masukkan nilai...">
                @endif
                @error('value')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            @endif
            
            <!-- Action Buttons -->
            <div class="flex justify-between items-center pt-4 border-t border-gray-200 dark:border-gray-700">
                <a href="{{ route('content.index') }}" class="px-4 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                    <i class="fas fa-times mr-2"></i>Batal
                </a>
                <div class="flex space-x-3">
                    <button type="submit" class="px-6 py-2.5 bg-primary-600 text-white rounded-lg hover:bg-primary-700">
                        <i class="fas fa-save mr-2"></i>Simpan
                    </button>
                </div>
            </div>
        </form>
        
        <!-- Reset to Default Form (separate form) -->
        <form action="{{ route('content.reset', $content) }}" method="POST" class="mt-4" onsubmit="return confirm('Apakah Anda yakin ingin mengembalikan konten ini ke nilai default? Perubahan yang telah disimpan akan hilang.');">
            @csrf
            <button type="submit" class="w-full px-4 py-2.5 border border-yellow-400 text-yellow-600 rounded-lg hover:bg-yellow-50 dark:border-yellow-500 dark:text-yellow-400 dark:hover:bg-yellow-900/20">
                <i class="fas fa-undo mr-2"></i>Reset ke Nilai Default
            </button>
        </form>
    </div>
    
    <!-- Warning Card -->
    <div class="mt-6 bg-yellow-50 dark:bg-yellow-900/30 border border-yellow-200 dark:border-yellow-700 rounded-lg p-4">
        <div class="flex items-start">
            <i class="fas fa-exclamation-triangle text-yellow-500 mt-0.5 mr-3"></i>
            <div class="text-sm text-yellow-700 dark:text-yellow-300">
                <strong>Tips:</strong>
                <ul class="list-disc ml-4 mt-1">
                    <li>Klik <strong>Batal</strong> untuk kembali tanpa menyimpan perubahan</li>
                    <li>Klik <strong>Undo</strong> untuk mengembalikan nilai ke kondisi sebelum diedit</li>
                    <li>Klik <strong>Simpan</strong> untuk menyimpan perubahan ke database</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
