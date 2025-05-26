<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Color::truncate();
        Color::insert([
            ['color_name' => 'Red', 'created_at' => now()],
            ['color_name' => 'Green', 'created_at' => now()],
            ['color_name' => 'Blue', 'created_at' => now()],
            ['color_name' => 'Black', 'created_at' => now()],
            ['color_name' => 'White', 'created_at' => now()],
            ['color_name' => 'Yellow', 'created_at' => now()],
            ['color_name' => 'Purple', 'created_at' => now()],
            ['color_name' => 'Pink', 'created_at' => now()],
            ['color_name' => 'Orange', 'created_at' => now()],
            ['color_name' => 'Gray', 'created_at' => now()],
        ]);
    }
}
