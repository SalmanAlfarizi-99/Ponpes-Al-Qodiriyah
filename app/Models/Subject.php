<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'category',
        'status',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeDiniyah($query)
    {
        return $query->where('category', 'diniyah');
    }

    public function scopeFormal($query)
    {
        return $query->where('category', 'formal');
    }

    public function getCategoryLabelAttribute()
    {
        $labels = [
            'diniyah' => 'Pelajaran Diniyah',
            'formal' => 'Pelajaran Formal',
            'tahfidz' => 'Tahfidz Al-Quran',
            'extra' => 'Ekstrakurikuler',
        ];
        return $labels[$this->category] ?? $this->category;
    }
}
