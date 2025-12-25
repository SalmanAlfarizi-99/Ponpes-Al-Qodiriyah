@extends('layouts.app')

@section('title', $page->title)

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Breadcrumb -->
    <div class="mb-6">
        <nav class="flex items-center space-x-2 text-sm text-gray-500">
            <a href="{{ route('dashboard') }}" class="hover:text-primary-600"><i class="fas fa-home"></i></a>
            <span>/</span>
            <span class="text-gray-900 dark:text-white">{{ $page->title }}</span>
        </nav>
    </div>

    <!-- Page Header -->
    <div class="bg-gradient-to-r from-primary-600 to-primary-700 rounded-2xl p-6 mb-6 text-white">
        <div class="flex items-center space-x-4">
            <div class="w-16 h-16 bg-white/20 rounded-xl flex items-center justify-center">
                <i class="{{ $page->icon }} text-3xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold">{{ $page->title }}</h1>
                <p class="text-primary-100 mt-1">
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs bg-white/20">
                        {{ $page->category_label }}
                    </span>
                    <span class="ml-2">Diperbarui: {{ $page->updated_at->format('d M Y') }}</span>
                </p>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-8">
        <article class="prose prose-lg dark:prose-invert max-w-none">
            {!! $page->content !!}
        </article>
    </div>

    <!-- Related Pages -->
    @php
        $relatedPages = \App\Models\InfoPage::where('category', $page->category)
            ->where('id', '!=', $page->id)
            ->active()
            ->limit(3)
            ->get();
    @endphp
    
    @if($relatedPages->count() > 0)
    <div class="mt-8">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Halaman Terkait</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($relatedPages as $related)
            <a href="{{ route('info.show', $related->slug) }}" class="block p-4 bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 hover:border-primary-500 transition-colors">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-primary-100 dark:bg-primary-900 rounded-lg flex items-center justify-center">
                        <i class="{{ $related->icon }} text-primary-600 dark:text-primary-400"></i>
                    </div>
                    <span class="font-medium text-gray-900 dark:text-white">{{ $related->title }}</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif
</div>

<style>
    .prose h2 { @apply text-xl font-bold text-gray-900 dark:text-white mt-8 mb-4; }
    .prose h3 { @apply text-lg font-semibold text-gray-900 dark:text-white mt-6 mb-3; }
    .prose p { @apply text-gray-600 dark:text-gray-300 mb-4 leading-relaxed; }
    .prose ul { @apply list-disc list-inside mb-4 space-y-2; }
    .prose ol { @apply list-decimal list-inside mb-4 space-y-2; }
    .prose li { @apply text-gray-600 dark:text-gray-300; }
    .prose table { @apply w-full border-collapse border border-gray-200 dark:border-gray-700 mb-4; }
    .prose th { @apply border border-gray-200 dark:border-gray-700 px-4 py-2 bg-gray-50 dark:bg-gray-700 font-semibold text-left; }
    .prose td { @apply border border-gray-200 dark:border-gray-700 px-4 py-2; }
    .prose strong { @apply font-semibold text-gray-900 dark:text-white; }
</style>
@endsection
