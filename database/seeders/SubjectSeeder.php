<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $subjects = [
            // Diniyah subjects
            ['code' => 'FQH', 'name' => 'Fiqih', 'category' => 'diniyah', 'description' => 'Ilmu Fiqih dan Hukum Islam'],
            ['code' => 'AQD', 'name' => 'Aqidah', 'category' => 'diniyah', 'description' => 'Ilmu Tauhid dan Aqidah'],
            ['code' => 'AKH', 'name' => 'Akhlak', 'category' => 'diniyah', 'description' => 'Budi Pekerti dan Akhlak Mulia'],
            ['code' => 'ARB', 'name' => 'Bahasa Arab', 'category' => 'diniyah', 'description' => 'Nahwu, Shorof, dan Praktik'],
            ['code' => 'TJW', 'name' => 'Tajwid', 'category' => 'diniyah', 'description' => 'Ilmu Tajwid Al-Quran'],
            ['code' => 'TFS', 'name' => 'Tafsir', 'category' => 'diniyah', 'description' => 'Tafsir Al-Quran'],
            ['code' => 'HDS', 'name' => 'Hadits', 'category' => 'diniyah', 'description' => 'Ilmu Hadits dan Musthalah'],
            ['code' => 'SKI', 'name' => 'Sejarah Islam', 'category' => 'diniyah', 'description' => 'Tarikh dan Sirah Nabawiyah'],
            
            // Tahfidz
            ['code' => 'THF', 'name' => 'Tahfidz Al-Quran', 'category' => 'tahfidz', 'description' => 'Hafalan Al-Quran'],
            ['code' => 'MRJ', 'name' => 'Muraja\'ah', 'category' => 'tahfidz', 'description' => 'Pengulangan Hafalan'],
            
            // Formal subjects
            ['code' => 'MTK', 'name' => 'Matematika', 'category' => 'formal', 'description' => 'Pelajaran Matematika'],
            ['code' => 'IPA', 'name' => 'IPA', 'category' => 'formal', 'description' => 'Ilmu Pengetahuan Alam'],
            ['code' => 'IPS', 'name' => 'IPS', 'category' => 'formal', 'description' => 'Ilmu Pengetahuan Sosial'],
            ['code' => 'BIN', 'name' => 'Bahasa Indonesia', 'category' => 'formal', 'description' => 'Pelajaran Bahasa Indonesia'],
            ['code' => 'BIG', 'name' => 'Bahasa Inggris', 'category' => 'formal', 'description' => 'Pelajaran Bahasa Inggris'],
            
            // Extra
            ['code' => 'KLG', 'name' => 'Kaligrafi', 'category' => 'extra', 'description' => 'Seni Khat dan Kaligrafi'],
            ['code' => 'PRM', 'name' => 'Pramuka', 'category' => 'extra', 'description' => 'Kepanduan Pramuka'],
        ];

        foreach ($subjects as $subject) {
            Subject::updateOrCreate(
                ['code' => $subject['code']],
                array_merge($subject, ['status' => 'active'])
            );
        }
    }
}
