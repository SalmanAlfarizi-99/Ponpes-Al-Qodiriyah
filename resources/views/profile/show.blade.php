@extends('layouts.app')

@section('title', 'Profil Saya')
@section('breadcrumb', 'Profil')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Profile Header -->
    <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-2xl p-6 text-white">
        <div class="flex items-center space-x-4">
            <div class="w-20 h-20 bg-white/20 rounded-xl flex items-center justify-center">
                <i class="fas fa-user text-4xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
                <p class="text-primary-100 mt-1">{{ $user->email }}</p>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-white/10 text-white mt-2">
                    <i class="fas fa-shield-alt mr-2"></i>
                    {{ $user->role->name ?? 'User' }}
                </span>
            </div>
        </div>
    </div>
    
    <!-- Profile Form -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700">
        <div class="p-6 border-b border-gray-100 dark:border-gray-700">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Edit Profil</h2>
            <p class="text-gray-500 dark:text-gray-400 mt-1">Perbarui informasi profil Anda</p>
        </div>
        
        <form action="{{ route('profile.update') }}" method="POST" class="p-6 space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Basic Info -->
            <div class="border-b border-gray-200 dark:border-gray-700 pb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Informasi Dasar</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                            class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                        @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email <span class="text-red-500">*</span></label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                            class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                        @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
            
            <!-- Change Password -->
            <div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Ubah Password</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Kosongkan jika tidak ingin mengubah password</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password Saat Ini</label>
                        <input type="password" name="current_password"
                            class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                        @error('current_password')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password Baru</label>
                        <input type="password" name="password"
                            class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                        @error('password')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation"
                            class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                    </div>
                </div>
            </div>
            
            <!-- Buttons -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                <a href="{{ route('dashboard') }}" class="px-6 py-2.5 text-gray-700 dark:text-gray-300 hover:text-gray-900 font-medium">
                    Kembali
                </a>
                <button type="submit" class="px-6 py-2.5 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors shadow-sm">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
    
    <!-- Account Info -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Informasi Akun</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="flex justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                <span class="text-gray-500 dark:text-gray-400">ID Pengguna</span>
                <span class="text-gray-900 dark:text-white font-medium">#{{ $user->id }}</span>
            </div>
            <div class="flex justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                <span class="text-gray-500 dark:text-gray-400">Role</span>
                <span class="text-gray-900 dark:text-white font-medium">{{ $user->role->name ?? 'User' }}</span>
            </div>
            <div class="flex justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                <span class="text-gray-500 dark:text-gray-400">Bergabung Sejak</span>
                <span class="text-gray-900 dark:text-white font-medium">{{ $user->created_at->format('d F Y') }}</span>
            </div>
            <div class="flex justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                <span class="text-gray-500 dark:text-gray-400">Terakhir Diperbarui</span>
                <span class="text-gray-900 dark:text-white font-medium">{{ $user->updated_at->format('d F Y H:i') }}</span>
            </div>
        </div>
    </div>
    
    <!-- Delete Account Section -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-red-200 dark:border-red-900 p-6" x-data="{ showDeleteModal: false }">
        <div class="flex items-start space-x-4">
            <div class="w-12 h-12 bg-red-100 dark:bg-red-900 rounded-lg flex items-center justify-center flex-shrink-0">
                <i class="fas fa-exclamation-triangle text-red-600 dark:text-red-400 text-xl"></i>
            </div>
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-red-600 dark:text-red-400">Hapus Akun</h3>
                <p class="text-gray-500 dark:text-gray-400 mt-1 text-sm">
                    Menghapus akun Anda akan menghapus semua data terkait secara permanen. Tindakan ini tidak dapat dibatalkan.
                </p>
                <button @click="showDeleteModal = true" class="mt-4 px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors text-sm">
                    <i class="fas fa-trash-alt mr-2"></i> Hapus Akun Saya
                </button>
            </div>
        </div>
        
        <!-- Delete Modal -->
        <div x-show="showDeleteModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4" style="background-color: rgba(0,0,0,0.5);">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl w-full max-w-md" @click.away="showDeleteModal = false">
                <div class="p-6">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-red-100 dark:bg-red-900 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-exclamation-triangle text-red-600 dark:text-red-400 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Konfirmasi Hapus Akun</h3>
                        <p class="text-gray-500 dark:text-gray-400 text-sm mb-6">
                            Masukkan password Anda untuk mengkonfirmasi penghapusan akun. Data Anda akan dihapus secara permanen.
                        </p>
                    </div>
                    
                    <form action="{{ route('profile.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password</label>
                            <input type="password" name="password" required
                                class="w-full px-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:text-white"
                                placeholder="Masukkan password Anda">
                            @error('password')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                        </div>
                        
                        <div class="flex space-x-3">
                            <button type="button" @click="showDeleteModal = false" class="flex-1 px-4 py-2.5 border border-gray-300 text-gray-700 dark:text-gray-300 font-medium rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                Batal
                            </button>
                            <button type="submit" class="flex-1 px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors">
                                <i class="fas fa-trash-alt mr-2"></i> Hapus
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
