<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'amount',
        'description',
        'frequency',
        'status',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getFrequencyLabelAttribute()
    {
        $labels = [
            'monthly' => 'Bulanan',
            'yearly' => 'Tahunan',
            'once' => 'Sekali',
            'optional' => 'Opsional',
        ];
        return $labels[$this->frequency] ?? $this->frequency;
    }
}
