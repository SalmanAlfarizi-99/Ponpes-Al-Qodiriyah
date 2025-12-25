@extends('layouts.app')

@section('title', 'Tambah Halaman Informasi')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('info-pages.index') }}" class="text-primary-600 hover:text-primary-700 text-sm">
            <i class="fas fa-arrow-left mr-1"></i> Kembali
        </a>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-2">Tambah Halaman Informasi</h1>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <form action="{{ route('info-pages.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Judul Halaman *</label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                        class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white"
                        placeholder="Jadwal Pelajaran">
                    @error('title')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kategori</label>
                    <select name="category" required class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white">
                        @foreach($categories as $key => $label)
                            <option value="{{ $key }}" {{ old('category') == $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Icon (Font Awesome class)</label>
                <input type="text" name="icon" value="{{ old('icon', 'fas fa-info-circle') }}"
                    class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white"
                    placeholder="fas fa-book">
                <p class="text-sm text-gray-500 mt-1">Contoh: fas fa-book, fas fa-calendar, fas fa-money-bill</p>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Konten Halaman *</label>
                <textarea name="content" rows="15" required
                    class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white"
                    placeholder="Tulis konten halaman di sini. Anda dapat menggunakan HTML.">{{ old('content') }}</textarea>
                @error('content')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                <p class="text-sm text-gray-500 mt-1">Mendukung HTML untuk formatting seperti &lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;table&gt;, dll.</p>
            </div>
            
            <div class="flex items-center space-x-6">
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" checked
                        class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Aktif (tampil untuk pengguna)</span>
                </label>
                <label class="flex items-center cursor-pointer">
                    <input type="checkbox" name="show_in_menu" value="1" checked
                        class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Tampilkan di menu sidebar</span>
                </label>
            </div>
            
            <div class="flex justify-end space-x-3 pt-4 border-t">
                <a href="{{ route('info-pages.index') }}" class="px-4 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50">Batal</a>
                <button type="submit" class="px-4 py-2.5 bg-primary-600 text-white rounded-lg hover:bg-primary-700">
                    <i class="fas fa-save mr-2"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
