<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Laptop Asus',
                'sku' => 'LAP-001',
                'category_id' => 1, // Elektronik
                'supplier_id' => 1, // PT Elektronik Jaya
                'unit' => 'Unit',
                'stock' => 10,
                'min_stock' => 5,
                'purchase_price' => 8000000,
                'selling_price' => 10000000,
            ],
            [
                'name' => 'Kemeja Putih',
                'sku' => 'KEM-001',
                'category_id' => 2, // Pakaian
                'supplier_id' => 2, // PT Fashion Indonesia
                'unit' => 'Pcs',
                'stock' => 50,
                'min_stock' => 20,
                'purchase_price' => 80000,
                'selling_price' => 120000,
            ],
            [
                'name' => 'Mie Instan',
                'sku' => 'MIE-001',
                'category_id' => 3, // Makanan
                'supplier_id' => 3, // PT Makanan Sehat
                'unit' => 'Dus',
                'stock' => 100,
                'min_stock' => 30,
                'purchase_price' => 85000,
                'selling_price' => 100000,
            ],
            [
                'name' => 'Air Mineral',
                'sku' => 'AIR-001',
                'category_id' => 4, // Minuman
                'supplier_id' => 4, // PT Minuman Segar
                'unit' => 'Dus',
                'stock' => 80,
                'min_stock' => 25,
                'purchase_price' => 35000,
                'selling_price' => 45000,
            ],
            [
                'name' => 'Pulpen',
                'sku' => 'PEN-001',
                'category_id' => 5, // Alat Tulis
                'supplier_id' => 5, // PT Alat Tulis Indonesia
                'unit' => 'Lusin',
                'stock' => 40,
                'min_stock' => 15,
                'purchase_price' => 45000,
                'selling_price' => 60000,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
} 