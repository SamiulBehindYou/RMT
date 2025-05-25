<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::truncate();
        Brand::create([
            'brand' => 'Apple',
        ]);
        Brand::create([
            'brand' => 'Samsung',
        ]);
        Brand::create([
            'brand' => 'Nokia',
        ]);
        Brand::create([
            'brand' => 'Motorola',
        ]);
        Brand::create([
            'brand' => 'Vivo',
        ]);
    }
}
