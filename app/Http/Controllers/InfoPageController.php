<?php

namespace App\Http\Controllers;

use App\Models\InfoPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InfoPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['publicShow']);
    }

    /**
     * Check if user is admin
     */
    private function checkAdmin()
    {
        if (!auth()->user()->isAdmin() && !auth()->user()->isSuperAdmin()) {
            abort(403, 'Unauthorized');
        }
    }

    /**
     * Display all info pages (admin)
     */
    public function index()
    {
        $this->checkAdmin();
        
        $pages = InfoPage::with('creator')
            ->orderBy('category')
            ->orderBy('order')
            ->paginate(15);
            
        $categories = InfoPage::CATEGORIES;
        
        return view('info-pages.index', compact('pages', 'categories'));
    }

    /**
     * Show form for creating new page
     */
    public function create()
    {
        $this->checkAdmin();
        
        $categories = InfoPage::CATEGORIES;
        return view('info-pages.create', compact('categories'));
    }

    /**
     * Store new info page
     */
    public function store(Request $request)
    {
        $this->checkAdmin();
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'icon' => 'nullable|string',
            'category' => 'required|in:' . implode(',', array_keys(InfoPage::CATEGORIES)),
            'is_active' => 'boolean',
            'show_in_menu' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['created_by'] = auth()->id();
        $validated['is_active'] = $request->has('is_active');
        $validated['show_in_menu'] = $request->has('show_in_menu');
        $validated['icon'] = $validated['icon'] ?? 'fas fa-info-circle';

        // Ensure unique slug
        $baseSlug = $validated['slug'];
        $counter = 1;
        while (InfoPage::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $baseSlug . '-' . $counter++;
        }

        InfoPage::create($validated);

        return redirect()->route('info-pages.index')->with('success', 'Halaman informasi berhasil dibuat');
    }

    /**
     * Show single info page (admin)
     */
    public function show(InfoPage $infoPage)
    {
        return view('info-pages.show', compact('infoPage'));
    }

    /**
     * Public view for students/users
     */
    public function publicShow($slug)
    {
        $page = InfoPage::where('slug', $slug)->active()->firstOrFail();
        return view('info-pages.public', compact('page'));
    }

    /**
     * Show form for editing page
     */
    public function edit(InfoPage $infoPage)
    {
        $this->checkAdmin();
        
        $categories = InfoPage::CATEGORIES;
        return view('info-pages.edit', compact('infoPage', 'categories'));
    }

    /**
     * Update info page
     */
    public function update(Request $request, InfoPage $infoPage)
    {
        $this->checkAdmin();
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'icon' => 'nullable|string',
            'category' => 'required|in:' . implode(',', array_keys(InfoPage::CATEGORIES)),
            'is_active' => 'boolean',
            'show_in_menu' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['show_in_menu'] = $request->has('show_in_menu');
        $validated['icon'] = $validated['icon'] ?? 'fas fa-info-circle';

        $infoPage->update($validated);

        return redirect()->route('info-pages.index')->with('success', 'Halaman informasi berhasil diperbarui');
    }

    /**
     * Delete info page
     */
    public function destroy(InfoPage $infoPage)
    {
        $this->checkAdmin();
        
        $infoPage->delete();

        return redirect()->route('info-pages.index')->with('success', 'Halaman informasi berhasil dihapus');
    }
}
