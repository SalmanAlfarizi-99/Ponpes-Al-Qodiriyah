<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classes extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'classes';

    protected $fillable = [
        'name',
        'level',
        'academic_year',
        'teacher_id',
        'capacity',
        'description',
        'status',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function santri()
    {
        return $this->hasMany(Santri::class, 'class_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'class_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getSantriCountAttribute()
    {
        return $this->santri()->count();
    }

    public function getAvailableSlotsAttribute()
    {
        return $this->capacity - $this->santri_count;
    }
}
