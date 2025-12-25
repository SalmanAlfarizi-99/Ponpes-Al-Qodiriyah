@extends('layouts.app')

@section('title', 'Edit Section: ' . $sectionLabel)

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('content.index') }}" class="text-primary-600 hover:text-primary-700 text-sm">
            <i class="fas fa-arrow-left mr-1"></i> Kembali ke Daftar Konten
        </a>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mt-2">
            <i class="fas fa-layer-group text-primary-600 mr-2"></i> Edit Section: {{ $sectionLabel }}
        </h1>
        <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Edit semua konten dalam section ini sekaligus, lalu klik "Simpan Semua"</p>
    </div>
    
    @if(session('success'))
    <div class="mb-6 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg">
        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
    </div>
    @endif
    
    @if(session('error'))
    <div class="mb-6 p-4 bg-red-100 border border-red-300 text-red-800 rounded-lg">
        <i class="fas fa-exclamation-circle mr-2"></i> {{ session('error') }}
    </div>
    @endif
    
    <form action="{{ route('content.section.update', $section) }}" method="POST" enctype="multipart/form-data" id="batchEditForm">
        @csrf
        
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
            <!-- Header -->
            <div class="p-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                <div>
                    <span class="text-sm text-gray-500">{{ $settings->count() }} item dalam section ini</span>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('content.create', ['section' => $section]) }}" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-sm">
                        <i class="fas fa-plus mr-1"></i> Tambah Konten
                    </a>
                    <button type="submit" class="px-6 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg font-medium">
                        <i class="fas fa-save mr-2"></i> Simpan Semua
                    </button>
                </div>
            </div>
            
            <!-- Content Items -->
            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse($settings as $setting)
                <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition" id="item-{{ $setting->id }}" data-deleted="false">
                    <div class="flex items-start gap-4">
                        <!-- Delete Checkbox -->
                        <div class="pt-2">
                            <label class="flex items-center cursor-pointer group" title="Tandai untuk dihapus">
                                <input type="checkbox" name="delete[]" value="{{ $setting->id }}" 
                                    class="delete-checkbox w-5 h-5 rounded border-gray-300 text-red-600 focus:ring-red-500"
                                    onchange="toggleDeleteState({{ $setting->id }})">
                                <span class="ml-2 text-xs text-gray-400 group-hover:text-red-500"><i class="fas fa-trash"></i></span>
                            </label>
                        </div>
                        
                        <!-- Content Fields -->
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="font-semibold text-gray-900 dark:text-white">{{ $setting->label }}</span>
                                <span class="px-2 py-0.5 text-xs bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 rounded">{{ $setting->key }}</span>
                                <span class="px-2 py-0.5 text-xs bg-{{ $setting->type == 'image' ? 'purple' : ($setting->type == 'textarea' ? 'blue' : 'green') }}-100 text-{{ $setting->type == 'image' ? 'purple' : ($setting->type == 'textarea' ? 'blue' : 'green') }}-700 rounded">{{ $setting->type }}</span>
                            </div>
                            
                            @if($setting->type == 'image')
                                <div class="flex items-center gap-4">
                                    @if($setting->value)
                                    <div class="relative">
                                        <img src="{{ $setting->value }}" alt="{{ $setting->label }}" class="w-20 h-20 object-cover rounded-lg border">
                                        <span class="absolute -top-2 -right-2 bg-green-500 text-white text-xs px-1.5 py-0.5 rounded">Current</span>
                                    </div>
                                    @else
                                    <div class="w-20 h-20 bg-gray-100 dark:bg-gray-700 rounded-lg flex items-center justify-center text-gray-400">
                                        <i class="fas fa-image text-2xl"></i>
                                    </div>
                                    @endif
                                    <div class="flex-1">
                                        <input type="file" name="images[{{ $setting->id }}]" accept="image/*"
                                            class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-primary-50 file:text-primary-700 hover:file:bg-primary-100">
                                        <p class="text-xs text-gray-400 mt-1">Pilih gambar baru untuk mengganti</p>
                                    </div>
                                </div>
                            @elseif($setting->type == 'textarea')
                                <textarea name="items[{{ $setting->id }}][value]" rows="3"
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white"
                                    placeholder="Masukkan konten...">{{ $setting->value }}</textarea>
                            @else
                                <input type="text" name="items[{{ $setting->id }}][value]" value="{{ $setting->value }}"
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white"
                                    placeholder="Masukkan nilai...">
                            @endif
                        </div>
                        
                        <!-- Individual Edit Link -->
                        <div class="pt-2">
                            <a href="{{ route('content.edit', $setting) }}" class="text-gray-400 hover:text-primary-600" title="Edit Detail">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="p-8 text-center text-gray-500">
                    <i class="fas fa-inbox text-4xl mb-3 opacity-50"></i>
                    <p>Belum ada konten dalam section ini</p>
                    <a href="{{ route('content.create', ['section' => $section]) }}" class="mt-4 inline-block px-4 py-2 bg-primary-600 text-white rounded-lg">
                        <i class="fas fa-plus mr-1"></i> Tambah Konten Pertama
                    </a>
                </div>
                @endforelse
            </div>
            
            <!-- Footer Actions -->
            @if($settings->count() > 0)
            <div class="p-4 bg-gray-50 dark:bg-gray-700/50 border-t border-gray-200 dark:border-gray-700 flex items-center justify-between">
                <div class="text-sm text-gray-500">
                    <span id="deleteCount">0</span> item ditandai untuk dihapus
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('content.index') }}" class="px-4 py-2 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-lg font-medium">
                        <i class="fas fa-save mr-2"></i> Simpan Semua Perubahan
                    </button>
                </div>
            </div>
            @endif
        </div>
    </form>
</div>

<script>
function toggleDeleteState(id) {
    const item = document.getElementById('item-' + id);
    const checkbox = item.querySelector('.delete-checkbox');
    
    if (checkbox.checked) {
        item.classList.add('opacity-50', 'bg-red-50');
        item.dataset.deleted = 'true';
    } else {
        item.classList.remove('opacity-50', 'bg-red-50');
        item.dataset.deleted = 'false';
    }
    
    updateDeleteCount();
}

function updateDeleteCount() {
    const checkboxes = document.querySelectorAll('.delete-checkbox:checked');
    document.getElementById('deleteCount').textContent = checkboxes.length;
}

// Confirm before submit if items are marked for deletion
document.getElementById('batchEditForm').addEventListener('submit', function(e) {
    const deleteCount = document.querySelectorAll('.delete-checkbox:checked').length;
    if (deleteCount > 0) {
        if (!confirm(`Anda akan menghapus ${deleteCount} item. Lanjutkan?`)) {
            e.preventDefault();
        }
    }
});
</script>
@endsection
