<?php

namespace App\Http\Controllers;

use App\Models\ContentSetting;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
     * Get all sections
     */
    private function getSections()
    {
        return [
            'brand' => 'Brand & Logo',
            'contact' => 'Kontak & Sosial Media',
            'hero' => 'Hero Slider',
            'stats' => 'Statistik',
            'lembaga' => 'Lembaga Pendidikan',
            'fasilitas' => 'Fasilitas',
            'profile' => 'Profil & Sambutan',
            'news' => 'Berita',
            'footer' => 'Footer',
        ];
    }

    /**
     * Get content types
     */
    private function getTypes()
    {
        return [
            'text' => 'Teks Pendek',
            'textarea' => 'Teks Panjang',
            'image' => 'Gambar URL',
        ];
    }

    /**
     * Display content settings management
     */
    public function index()
    {
        $this->checkAdmin();
        
        $sections = $this->getSections();
        
        // Get all settings grouped by section
        $allSettings = ContentSetting::orderBy('section')->get()->groupBy('section');
        
        // Sort each section: headers first (no numbers in key), then by order
        $settings = $allSettings->map(function ($items) {
            return $items->sortBy(function ($item) {
                // Check if key contains a number (like lembaga1, fasilitas5)
                if (preg_match('/\d/', $item->key)) {
                    // Numbered items: sort by extracted number, then by key suffix
                    preg_match('/(\d+)/', $item->key, $matches);
                    $number = isset($matches[1]) ? (int)$matches[1] : 999;
                    // Add suffix weight: _title=0, _desc=1, _icon=2, _image=3
                    $suffixWeight = 0;
                    if (str_ends_with($item->key, '_title')) $suffixWeight = 0;
                    elseif (str_ends_with($item->key, '_desc')) $suffixWeight = 1;
                    elseif (str_ends_with($item->key, '_icon')) $suffixWeight = 2;
                    elseif (str_ends_with($item->key, '_image')) $suffixWeight = 3;
                    elseif (str_ends_with($item->key, '_date')) $suffixWeight = 4;
                    else $suffixWeight = 5;
                    return 1000 + ($number * 10) + $suffixWeight;
                } else {
                    // Non-numbered items (headers): sort by order at the top
                    return $item->order;
                }
            })->values();
        });
        
        return view('content.index', compact('sections', 'settings'));
    }

    /**
     * Show form for creating new content
     */
    public function create()
    {
        $this->checkAdmin();
        
        $sections = $this->getSections();
        $types = $this->getTypes();
        
        return view('content.create', compact('sections', 'types'));
    }

    /**
     * Store new content setting
     */
    public function store(Request $request)
    {
        $this->checkAdmin();
        
        $validated = $request->validate([
            'key' => 'required|string|unique:content_settings,key',
            'section' => 'required|string',
            'value' => 'nullable|string',
            'type' => 'required|in:text,textarea,image',
            'label' => 'required|string',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image_file') && $validated['type'] === 'image') {
            $file = $request->file('image_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/content'), $filename);
            $validated['value'] = '/uploads/content/' . $filename;
        }

        unset($validated['image_file']);
        ContentSetting::create($validated);

        return redirect()->route('content.index')->with('success', 'Konten berhasil ditambahkan');
    }

    /**
     * Show form for editing content
     */
    public function edit(ContentSetting $content)
    {
        $this->checkAdmin();
        
        $sections = $this->getSections();
        $types = $this->getTypes();
        
        return view('content.edit', compact('content', 'sections', 'types'));
    }

    /**
     * Update content setting
     */
    public function update(Request $request, ContentSetting $content)
    {
        $this->checkAdmin();
        
        $validated = $request->validate([
            'key' => 'required|string|unique:content_settings,key,' . $content->id,
            'section' => 'required|string',
            'value' => 'nullable|string',
            'type' => 'required|in:text,textarea,image',
            'label' => 'required|string',
            'order' => 'nullable|integer',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Handle image upload
        if ($validated['type'] === 'image') {
            if ($request->hasFile('image_file')) {
                // Delete old image if exists
                if ($content->value && file_exists(public_path($content->value))) {
                    @unlink(public_path($content->value));
                }
                
                $file = $request->file('image_file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/content'), $filename);
                $validated['value'] = '/uploads/content/' . $filename;
            } else {
                // Keep existing value if no new image uploaded
                $validated['value'] = $content->value;
            }
        }

        unset($validated['image_file']);
        $content->update($validated);

        return redirect()->route('content.index')->with('success', 'Konten berhasil diperbarui');
    }

    /**
     * Delete content setting
     */
    public function destroy(ContentSetting $content)
    {
        $this->checkAdmin();
        
        // Delete image file from disk if it's an image type
        if ($content->type === 'image' && $content->value && file_exists(public_path($content->value))) {
            @unlink(public_path($content->value));
        }
        
        $content->delete();

        return redirect()->route('content.index')->with('success', 'Konten berhasil dihapus');
    }

    /**
     * Reset content to default value
     */
    public function resetToDefault(ContentSetting $content)
    {
        $this->checkAdmin();
        
        // Default values from seeder
        $defaults = [
            'brand_name' => 'Ponpes Digital',
            'brand_tagline' => 'Sistem Manajemen Modern',
            'brand_logo_url' => '',
            'contact_phone' => '+62 812 3456 7890',
            'contact_email' => 'info@ponpes.id',
            'contact_address' => 'Jl. Pesantren No. 123, Kota',
            'social_facebook' => '#',
            'social_instagram' => '#',
            'social_youtube' => '#',
            'social_tiktok' => '#',
            'hero1_badge' => "Assalamu'alaikum Warahmatullahi Wabarakatuh",
            'hero1_title' => 'Selamat Datang di Pondok Pesantren Modern Digital',
            'hero1_subtitle' => 'Mencetak generasi Qurani yang berilmu, berakhlak mulia, dan berdaya saing tinggi.',
            'hero1_image' => '',
            'hero2_badge' => 'Pendidikan Berkualitas',
            'hero2_title' => '8 Lembaga Pendidikan Terintegrasi',
            'hero2_subtitle' => 'Dari Madrasah Diniyah hingga Perguruan Tinggi.',
            'hero2_image' => '',
            'hero3_badge' => 'Program Unggulan',
            'hero3_title' => 'Program Tahfidz Quran Intensif',
            'hero3_subtitle' => 'Hafal Al-Quran 30 Juz dengan metode modern.',
            'hero3_image' => '',
            'stats_santri' => '2,500+',
            'stats_alumni' => '10,000+',
            'stats_ustadz' => '100+',
            'stats_years' => '50+',
            'profile_name' => 'KH. Muhammad Abdullah',
            'profile_title' => 'Ketua Yayasan',
            'profile_quote' => 'Dengan Ilmu Hidup Jadi Mudah, Dengan Agama Hidup Jadi Terarah',
            'profile_image' => '',
            'footer_about' => 'Pondok Pesantren Modern adalah lembaga pendidikan Islam terkemuka.',
            'footer_address' => 'Jl. Pesantren No. 123, Jawa Barat',
            'footer_map_url' => 'https://maps.google.com',
            'footer_whatsapp' => '6281234567890',
            'footer_tagline' => 'Dibuat dengan ❤️ untuk Pendidikan Islam',
            'footer_copyright' => '© 2025 Pondok Pesantren Digital. All rights reserved.',
        ];
        
        // Delete old image if it's an image type
        if ($content->type === 'image' && $content->value && file_exists(public_path($content->value))) {
            @unlink(public_path($content->value));
        }
        
        // Get default value or empty string
        $defaultValue = $defaults[$content->key] ?? '';
        
        $content->update(['value' => $defaultValue]);

        return redirect()->route('content.edit', $content)->with('success', 'Konten berhasil dikembalikan ke nilai default');
    }

    /**
     * Show batch edit form for a section
     */
    public function editSection($section)
    {
        $this->checkAdmin();
        
        $sections = $this->getSections();
        
        if (!array_key_exists($section, $sections)) {
            return redirect()->route('content.index')->with('error', 'Section tidak ditemukan');
        }
        
        // Get all settings for this section, sorted properly
        $settings = ContentSetting::where('section', $section)
            ->get()
            ->sortBy(function ($item) {
                if (preg_match('/\d/', $item->key)) {
                    preg_match('/(\d+)/', $item->key, $matches);
                    $number = isset($matches[1]) ? (int)$matches[1] : 999;
                    $suffixWeight = 0;
                    if (str_ends_with($item->key, '_title')) $suffixWeight = 0;
                    elseif (str_ends_with($item->key, '_desc')) $suffixWeight = 1;
                    elseif (str_ends_with($item->key, '_icon')) $suffixWeight = 2;
                    elseif (str_ends_with($item->key, '_image')) $suffixWeight = 3;
                    elseif (str_ends_with($item->key, '_date')) $suffixWeight = 4;
                    elseif (str_ends_with($item->key, '_url')) $suffixWeight = 5;
                    else $suffixWeight = 6;
                    return 1000 + ($number * 10) + $suffixWeight;
                } else {
                    return $item->order;
                }
            })->values();
        
        $sectionLabel = $sections[$section];
        
        return view('content.edit-section', compact('section', 'sectionLabel', 'settings', 'sections'));
    }

    /**
     * Batch update all content in a section
     */
    public function updateSection(Request $request, $section)
    {
        $this->checkAdmin();
        
        $sections = $this->getSections();
        
        if (!array_key_exists($section, $sections)) {
            return redirect()->route('content.index')->with('error', 'Section tidak ditemukan');
        }
        
        $items = $request->input('items', []);
        $deleteIds = $request->input('delete', []);
        $updatedCount = 0;
        $deletedCount = 0;
        
        // Process deletions first
        if (!empty($deleteIds)) {
            foreach ($deleteIds as $id) {
                $content = ContentSetting::find($id);
                if ($content && $content->section === $section) {
                    // Delete image file if exists
                    if ($content->type === 'image' && $content->value && file_exists(public_path($content->value))) {
                        @unlink(public_path($content->value));
                    }
                    $content->delete();
                    $deletedCount++;
                }
            }
        }
        
        // Process updates
        foreach ($items as $id => $data) {
            // Skip deleted items
            if (in_array($id, $deleteIds)) {
                continue;
            }
            
            $content = ContentSetting::find($id);
            if ($content && $content->section === $section) {
                // Handle image upload
                if ($content->type === 'image') {
                    if ($request->hasFile("images.{$id}")) {
                        // Delete old image
                        if ($content->value && file_exists(public_path($content->value))) {
                            @unlink(public_path($content->value));
                        }
                        
                        $file = $request->file("images.{$id}");
                        $filename = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('uploads/content'), $filename);
                        $content->value = '/uploads/content/' . $filename;
                    }
                    // Keep existing value if no new upload
                } else {
                    $content->value = $data['value'] ?? '';
                }
                
                $content->save();
                $updatedCount++;
            }
        }
        
        $message = "Berhasil menyimpan {$updatedCount} konten";
        if ($deletedCount > 0) {
            $message .= " dan menghapus {$deletedCount} konten";
        }
        
        return redirect()->route('content.section.edit', $section)->with('success', $message);
    }
}

