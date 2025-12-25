<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'section',
        'value',
        'type',
        'label',
        'order',
    ];

    /**
     * Get a content setting value by key
     */
    public static function getValue($key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    /**
     * Set a content setting value
     */
    public static function setValue($key, $value, $section = 'general', $type = 'text', $label = null)
    {
        return static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'section' => $section,
                'type' => $type,
                'label' => $label ?? ucfirst(str_replace('_', ' ', $key)),
            ]
        );
    }

    /**
     * Get all settings for a section
     */
    public static function getSection($section)
    {
        return static::where('section', $section)
            ->orderBy('order')
            ->get()
            ->pluck('value', 'key');
    }

    /**
     * Get all sections
     */
    public static function getAllSections()
    {
        return static::select('section')
            ->distinct()
            ->pluck('section');
    }
}
