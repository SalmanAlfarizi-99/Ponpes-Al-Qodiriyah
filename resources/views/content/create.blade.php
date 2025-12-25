@extends('layouts.app')

@section('title', 'Tambah Konten')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('content.index') }}" class="text-primary-600 hover:text-primary-700 text-sm">
            <i class="fas fa-arrow-left mr-1"></i> Kembali ke Daftar Konten
        </a>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-2">Tambah Konten Baru</h1>
        <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Buat konten baru untuk ditampilkan di halaman utama</p>
    </div>
    
    <div class="grid lg:grid-cols-3 gap-6">
        <!-- Main Form -->
        <div class="lg:col-span-2">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                <form action="{{ route('content.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6" id="contentForm">
                    @csrf
                    
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Section *</label>
                            <select name="section" id="sectionSelect" required class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white" onchange="updateKeyPrefix()">
                                @foreach($sections as $key => $label)
                                    <option value="{{ $key }}" {{ (old('section') ?? request('section')) == $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tipe *</label>
                            <select name="type" id="contentType" required class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white" onchange="toggleImageUpload()">
                                @foreach($types as $key => $label)
                                    <option value="{{ $key }}" {{ old('type') == $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Key (Unik) *</label>
                            <input type="text" name="key" id="keyInput" value="{{ old('key') }}" required
                                class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white"
                                placeholder="lembaga9_title">
                            <p class="text-xs text-gray-500 mt-1">Gunakan format: <span id="keyExample">section_item</span></p>
                            @error('key')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Label *</label>
                            <input type="text" name="label" value="{{ old('label') }}" required
                                class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white"
                                placeholder="Lembaga 9 - Judul">
                            @error('label')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Urutan</label>
                        <input type="number" name="order" value="{{ old('order', 99) }}" min="1"
                            class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white"
                            placeholder="99">
                        <p class="text-xs text-gray-500 mt-1">Urutan tampil dalam section (angka kecil tampil duluan)</p>
                    </div>
                    
                    <div id="textValueField">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nilai/Konten</label>
                        <textarea name="value" rows="4"
                            class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white"
                            placeholder="Masukkan nilai konten...">{{ old('value') }}</textarea>
                        @error('value')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    
                    <div id="imageUploadField" style="display: none;">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Upload Gambar</label>
                        <input type="file" name="image_file" accept="image/*"
                            class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                        <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, GIF, WebP. Maksimal 2MB</p>
                        @error('image_file')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    
                    <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('content.index') }}" class="px-4 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                            <i class="fas fa-times mr-2"></i>Batal
                        </a>
                        <button type="submit" class="px-6 py-2.5 bg-primary-600 text-white rounded-lg hover:bg-primary-700">
                            <i class="fas fa-save mr-2"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Templates Panel -->
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6 sticky top-24">
                <h3 class="font-bold text-gray-900 dark:text-white mb-4">
                    <i class="fas fa-lightbulb text-yellow-500 mr-2"></i>Template Cepat
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Klik untuk mengisi otomatis:</p>
                
                <div class="space-y-2">
                    <button type="button" onclick="applyTemplate('lembaga')" class="w-full text-left px-4 py-3 bg-blue-50 dark:bg-blue-900/20 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition">
                        <div class="font-medium text-blue-700 dark:text-blue-400"><i class="fas fa-school mr-2"></i>Lembaga Baru</div>
                        <div class="text-xs text-gray-500">Kartu lembaga pendidikan</div>
                    </button>
                    
                    <button type="button" onclick="applyTemplate('fasilitas')" class="w-full text-left px-4 py-3 bg-green-50 dark:bg-green-900/20 rounded-lg hover:bg-green-100 dark:hover:bg-green-900/30 transition">
                        <div class="font-medium text-green-700 dark:text-green-400"><i class="fas fa-building mr-2"></i>Fasilitas Baru</div>
                        <div class="text-xs text-gray-500">Kartu fasilitas pesantren</div>
                    </button>
                    
                    <button type="button" onclick="applyTemplate('news')" class="w-full text-left px-4 py-3 bg-purple-50 dark:bg-purple-900/20 rounded-lg hover:bg-purple-100 dark:hover:bg-purple-900/30 transition">
                        <div class="font-medium text-purple-700 dark:text-purple-400"><i class="fas fa-newspaper mr-2"></i>Berita Baru</div>
                        <div class="text-xs text-gray-500">Kartu berita/pengumuman</div>
                    </button>
                </div>
                
                <div class="mt-6 p-4 bg-yellow-50 dark:bg-yellow-900/20 rounded-lg border border-yellow-200 dark:border-yellow-800">
                    <h4 class="font-medium text-yellow-800 dark:text-yellow-300 text-sm mb-2">
                        <i class="fas fa-info-circle mr-1"></i> Panduan Key
                    </h4>
                    <ul class="text-xs text-yellow-700 dark:text-yellow-400 space-y-1">
                        <li>• <code>lembaga9_title</code> → Judul lembaga ke-9</li>
                        <li>• <code>lembaga9_desc</code> → Deskripsi</li>
                        <li>• <code>lembaga9_icon</code> → Icon (fa-xxx)</li>
                        <li>• <code>lembaga9_image</code> → Gambar</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function toggleImageUpload() {
    const type = document.getElementById('contentType').value;
    const textField = document.getElementById('textValueField');
    const imageField = document.getElementById('imageUploadField');
    
    if (type === 'image') {
        textField.style.display = 'none';
        imageField.style.display = 'block';
    } else {
        textField.style.display = 'block';
        imageField.style.display = 'none';
    }
}

function updateKeyPrefix() {
    const section = document.getElementById('sectionSelect').value;
    const example = document.getElementById('keyExample');
    
    const examples = {
        'brand': 'brand_xxx',
        'contact': 'contact_xxx',
        'hero': 'hero1_title',
        'stats': 'stats_xxx',
        'lembaga': 'lembaga9_title',
        'fasilitas': 'fasilitas5_title',
        'profile': 'profile_xxx',
        'news': 'news4_title',
        'footer': 'footer_xxx'
    };
    
    example.textContent = examples[section] || 'section_item';
}

function applyTemplate(type) {
    const sectionSelect = document.getElementById('sectionSelect');
    const typeSelect = document.getElementById('contentType');
    const keyInput = document.getElementById('keyInput');
    const labelInput = document.querySelector('input[name="label"]');
    
    if (type === 'lembaga') {
        sectionSelect.value = 'lembaga';
        typeSelect.value = 'text';
        keyInput.value = 'lembaga9_title';
        labelInput.value = 'Lembaga 9 - Judul';
        alert('Template Lembaga diterapkan!\n\nUntuk kartu lembaga lengkap, Anda perlu membuat 4 item:\n• lembaga9_title (text)\n• lembaga9_desc (textarea)\n• lembaga9_icon (text: fa-xxx)\n• lembaga9_image (image)');
    } else if (type === 'fasilitas') {
        sectionSelect.value = 'fasilitas';
        typeSelect.value = 'text';
        keyInput.value = 'fasilitas5_title';
        labelInput.value = 'Fasilitas 5 - Judul';
        alert('Template Fasilitas diterapkan!\n\nUntuk kartu fasilitas lengkap, buat 4 item:\n• fasilitas5_title (text)\n• fasilitas5_desc (textarea)\n• fasilitas5_icon (text: fa-xxx)\n• fasilitas5_image (image)');
    } else if (type === 'news') {
        sectionSelect.value = 'news';
        typeSelect.value = 'text';
        keyInput.value = 'news4_title';
        labelInput.value = 'Berita 4 - Judul';
        alert('Template Berita diterapkan!\n\nUntuk kartu berita lengkap, buat 4 item:\n• news4_title (text)\n• news4_desc (textarea)\n• news4_date (text)\n• news4_image (image)');
    }
    
    toggleImageUpload();
    updateKeyPrefix();
}

document.addEventListener('DOMContentLoaded', function() {
    toggleImageUpload();
    updateKeyPrefix();
});
</script>
@endsection
