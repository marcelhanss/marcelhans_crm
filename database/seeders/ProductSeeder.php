<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'product_name' => 'Provier 20 Mbps',
            'speed' => '20  Mbps',
            'price' => '200000',
        ]);

        Product::create([
            'product_name' => 'Provier 50 Mbps',
            'speed' => '50  Mbps',
            'price' => '500000',
        ]);
    }
}
