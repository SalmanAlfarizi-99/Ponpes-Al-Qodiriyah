<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Santri extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'santri';

    protected $fillable = [
        'nis',
        'user_id',
        'class_id',
        'name',
        'gender',
        'birth_date',
        'birth_place',
        'address',
        'guardian_name',
        'guardian_phone',
        'guardian_relation',
        'guardian_address',
        'enrollment_date',
        'status',
        'photo',
        'notes',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'enrollment_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function attendances()
    {
        return $this->hasMany(SantriAttendance::class);
    }

    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getPhotoUrlAttribute()
    {
        return $this->photo 
            ? asset('storage/' . $this->photo) 
            : asset('images/default-avatar.png');
    }

    public function getAgeAttribute()
    {
        return $this->birth_date ? $this->birth_date->age : null;
    }

    public static function generateNis($year = null)
    {
        $year = $year ?? date('Y');
        $lastSantri = self::whereYear('created_at', $year)
            ->orderBy('nis', 'desc')
            ->first();
        
        if ($lastSantri) {
            $lastNumber = intval(substr($lastSantri->nis, -4));
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '0001';
        }
        
        return $year . $newNumber;
    }
}
