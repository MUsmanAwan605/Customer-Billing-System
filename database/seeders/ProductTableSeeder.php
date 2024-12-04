<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'prod' =>('Product'),

        ]);
        Product::create([
            'prod' =>('Green'),

        ]);
        Product::create([
            'prod' =>('abcdef'),

        ]);
        Product::create([
            'prod' =>('Yellow'),

        ]);
        Product::create([
            'prod' =>('Orange'),

        ]);
        Product::create([
            'prod' =>('Blue'),

        ]);
        Product::create([
            'prod' =>('Black'),

        ]);

        Product::create([
            'prod' =>('White'),

        ]);
        Product::create([
            'prod' =>('Purple'),

        ]);
        Product::create([
            'prod' =>('Navy Blue'),

        ]);
      
    }
}
