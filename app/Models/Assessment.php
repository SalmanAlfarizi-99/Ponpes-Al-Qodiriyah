<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'subject_id',
        'teacher_id',
        'type',
        'score',
        'max_score',
        'semester',
        'academic_year',
        'notes',
    ];

    protected $casts = [
        'score' => 'decimal:2',
        'max_score' => 'decimal:2',
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function getTypeLabelAttribute()
    {
        $labels = [
            'daily' => 'Nilai Harian',
            'midterm' => 'UTS',
            'final' => 'UAS',
            'practical' => 'Praktik',
            'tahfidz' => 'Tahfidz',
        ];
        return $labels[$this->type] ?? $this->type;
    }

    public function getPercentageAttribute()
    {
        if ($this->max_score <= 0) return 0;
        return round(($this->score / $this->max_score) * 100, 2);
    }

    public function getGradeAttribute()
    {
        $percentage = $this->percentage;
        if ($percentage >= 90) return 'A';
        if ($percentage >= 80) return 'B';
        if ($percentage >= 70) return 'C';
        if ($percentage >= 60) return 'D';
        return 'E';
    }

    public function getGradeColorAttribute()
    {
        $grade = $this->grade;
        $colors = [
            'A' => 'success',
            'B' => 'primary',
            'C' => 'warning',
            'D' => 'secondary',
            'E' => 'danger',
        ];
        return $colors[$grade] ?? 'secondary';
    }
}
