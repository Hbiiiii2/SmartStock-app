<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $suppliers = [
            [
                'name' => 'PT Elektronik Jaya',
                'email' => 'elektronikjaya@example.com',
                'phone' => '081234567890',
                'address' => 'Jl. Elektronik No. 123, Jakarta',
            ],
            [
                'name' => 'PT Fashion Indonesia',
                'email' => 'fashion@example.com',
                'phone' => '081234567891',
                'address' => 'Jl. Fashion No. 456, Bandung',
            ],
            [
                'name' => 'PT Makanan Sehat',
                'email' => 'makanansehat@example.com',
                'phone' => '081234567892',
                'address' => 'Jl. Makanan No. 789, Surabaya',
            ],
            [
                'name' => 'PT Minuman Segar',
                'email' => 'minumansegar@example.com',
                'phone' => '081234567893',
                'address' => 'Jl. Minuman No. 321, Medan',
            ],
            [
                'name' => 'PT Alat Tulis Indonesia',
                'email' => 'alattulis@example.com',
                'phone' => '081234567894',
                'address' => 'Jl. Alat Tulis No. 654, Semarang',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
} 