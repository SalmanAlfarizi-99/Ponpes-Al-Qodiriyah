<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PaymentType;

class PaymentTypeSeeder extends Seeder
{
    public function run()
    {
        $paymentTypes = [
            [
                'name' => 'SPP Bulanan',
                'code' => 'SPP',
                'amount' => 500000,
                'description' => 'Sumbangan Pembinaan Pendidikan bulanan',
                'frequency' => 'monthly',
            ],
            [
                'name' => 'Biaya Pendaftaran',
                'code' => 'DAFTAR',
                'amount' => 1500000,
                'description' => 'Biaya pendaftaran santri baru',
                'frequency' => 'once',
            ],
            [
                'name' => 'Biaya Seragam',
                'code' => 'SERAGAM',
                'amount' => 750000,
                'description' => 'Biaya seragam lengkap',
                'frequency' => 'once',
            ],
            [
                'name' => 'Biaya Kitab',
                'code' => 'KITAB',
                'amount' => 350000,
                'description' => 'Biaya kitab dan buku pelajaran',
                'frequency' => 'yearly',
            ],
            [
                'name' => 'Infaq Pembangunan',
                'code' => 'INFAQ',
                'amount' => 0,
                'description' => 'Infaq sukarela untuk pembangunan',
                'frequency' => 'optional',
            ],
            [
                'name' => 'Biaya Makan',
                'code' => 'MAKAN',
                'amount' => 300000,
                'description' => 'Biaya makan bulanan',
                'frequency' => 'monthly',
            ],
            [
                'name' => 'Biaya Asrama',
                'code' => 'ASRAMA',
                'amount' => 200000,
                'description' => 'Biaya asrama bulanan',
                'frequency' => 'monthly',
            ],
        ];

        foreach ($paymentTypes as $type) {
            PaymentType::updateOrCreate(
                ['code' => $type['code']],
                array_merge($type, ['status' => 'active'])
            );
        }
    }
}
