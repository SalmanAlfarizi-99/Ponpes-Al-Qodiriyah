<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'icon',
        'category',
        'order',
        'is_active',
        'show_in_menu',
        'created_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'show_in_menu' => 'boolean',
    ];

    /**
     * Categories available
     */
    public const CATEGORIES = [
        'general' => 'Umum',
        'academic' => 'Akademik',
        'financial' => 'Keuangan',
        'facility' => 'Fasilitas',
        'activity' => 'Kegiatan',
    ];

    /**
     * Get the creator of the page
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Scope for active pages
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for menu items
     */
    public function scopeInMenu($query)
    {
        return $query->where('show_in_menu', true);
    }

    /**
     * Get pages by category
     */
    public static function getByCategory($category)
    {
        return static::where('category', $category)
            ->active()
            ->orderBy('order')
            ->get();
    }

    /**
     * Get all menu items for sidebar
     */
    public static function getMenuItems()
    {
        return static::active()
            ->inMenu()
            ->orderBy('order')
            ->get();
    }

    /**
     * Get category label
     */
    public function getCategoryLabelAttribute()
    {
        return self::CATEGORIES[$this->category] ?? $this->category;
    }
}
