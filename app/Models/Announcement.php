<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'author_id',
        'is_public',
        'priority',
        'published_at',
        'expires_at',
        'attachment',
        'status',
    ];

    protected $casts = [
        'is_public' => 'boolean',
        'published_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where('published_at', '<=', now())
            ->where(function ($q) {
                $q->whereNull('expires_at')
                    ->orWhere('expires_at', '>', now());
            });
    }

    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    public function getPriorityLabelAttribute()
    {
        $labels = [
            'low' => 'Rendah',
            'normal' => 'Normal',
            'high' => 'Tinggi',
            'urgent' => 'Mendesak',
        ];
        return $labels[$this->priority] ?? $this->priority;
    }

    public function getPriorityColorAttribute()
    {
        $colors = [
            'low' => 'secondary',
            'normal' => 'info',
            'high' => 'warning',
            'urgent' => 'danger',
        ];
        return $colors[$this->priority] ?? 'secondary';
    }

    public function getStatusLabelAttribute()
    {
        $labels = [
            'draft' => 'Draf',
            'published' => 'Terbit',
            'archived' => 'Diarsipkan',
        ];
        return $labels[$this->status] ?? $this->status;
    }

    public function isExpired()
    {
        return $this->expires_at && $this->expires_at->isPast();
    }
}
