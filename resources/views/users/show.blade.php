@extends('layouts.app')

@section('title', 'Detail User')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <a href="{{ route('users.index') }}" class="text-primary-600 hover:text-primary-700 text-sm mb-2 inline-block">
                <i class="fas fa-arrow-left mr-1"></i> Kembali ke Daftar User
            </a>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Detail User</h1>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('users.edit', $user) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-colors">
                <i class="fas fa-edit mr-2"></i> Edit
            </a>
        </div>
    </div>

    <!-- User Info Card -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
        <div class="p-6">
            <div class="flex items-center space-x-6">
                <div class="w-24 h-24 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center">
                    <span class="text-primary-600 dark:text-primary-400 font-bold text-3xl">{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $user->name }}</h2>
                    <p class="text-gray-500 dark:text-gray-400">{{ $user->email }}</p>
                    <div class="flex items-center gap-3 mt-2">
                        <span class="px-3 py-1 text-sm font-medium rounded-full 
                            @if($user->role && $user->role->slug == 'super-admin') bg-red-100 text-red-700
                            @elseif($user->role && $user->role->slug == 'admin') bg-purple-100 text-purple-700
                            @elseif($user->role && $user->role->slug == 'operator') bg-blue-100 text-blue-700
                            @elseif($user->role && $user->role->slug == 'teacher') bg-green-100 text-green-700
                            @else bg-gray-100 text-gray-700
                            @endif">
                            {{ $user->role ? $user->role->name : 'No Role' }}
                        </span>
                        <span class="px-3 py-1 text-sm font-medium rounded-full
                            @if($user->status == 'active') bg-green-100 text-green-700
                            @elseif($user->status == 'inactive') bg-gray-100 text-gray-700
                            @else bg-red-100 text-red-700
                            @endif">
                            {{ ucfirst($user->status ?? 'active') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Details Grid -->
    <div class="grid md:grid-cols-2 gap-6">
        <!-- Account Info -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                <i class="fas fa-user-circle mr-2 text-primary-600"></i> Informasi Akun
            </h3>
            <div class="space-y-4">
                <div class="flex justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                    <span class="text-gray-500 dark:text-gray-400">ID</span>
                    <span class="font-medium text-gray-900 dark:text-white">#{{ $user->id }}</span>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                    <span class="text-gray-500 dark:text-gray-400">Nama</span>
                    <span class="font-medium text-gray-900 dark:text-white">{{ $user->name }}</span>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                    <span class="text-gray-500 dark:text-gray-400">Email</span>
                    <span class="font-medium text-gray-900 dark:text-white">{{ $user->email }}</span>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                    <span class="text-gray-500 dark:text-gray-400">Phone</span>
                    <span class="font-medium text-gray-900 dark:text-white">{{ $user->phone ?? '-' }}</span>
                </div>
                <div class="flex justify-between py-2">
                    <span class="text-gray-500 dark:text-gray-400">Address</span>
                    <span class="font-medium text-gray-900 dark:text-white">{{ $user->address ?? '-' }}</span>
                </div>
            </div>
        </div>

        <!-- Timestamps -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                <i class="fas fa-clock mr-2 text-primary-600"></i> Timestamps
            </h3>
            <div class="space-y-4">
                <div class="flex justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                    <span class="text-gray-500 dark:text-gray-400">Terdaftar</span>
                    <span class="font-medium text-gray-900 dark:text-white">{{ $user->created_at->format('d M Y H:i') }}</span>
                </div>
                <div class="flex justify-between py-2 border-b border-gray-100 dark:border-gray-700">
                    <span class="text-gray-500 dark:text-gray-400">Terakhir Update</span>
                    <span class="font-medium text-gray-900 dark:text-white">{{ $user->updated_at->format('d M Y H:i') }}</span>
                </div>
                <div class="flex justify-between py-2">
                    <span class="text-gray-500 dark:text-gray-400">Email Verified</span>
                    <span class="font-medium text-gray-900 dark:text-white">{{ $user->email_verified_at ? $user->email_verified_at->format('d M Y') : 'Belum' }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
