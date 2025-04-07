<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Elektronik',
                'description' => 'Kategori untuk barang-barang elektronik',
            ],
            [
                'name' => 'Pakaian',
                'description' => 'Kategori untuk pakaian',
            ],
            [
                'name' => 'Makanan',
                'description' => 'Kategori untuk makanan',
            ],
            [
                'name' => 'Minuman',
                'description' => 'Kategori untuk minuman',
            ],
            [
                'name' => 'Alat Tulis',
                'description' => 'Kategori untuk alat tulis',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
} 