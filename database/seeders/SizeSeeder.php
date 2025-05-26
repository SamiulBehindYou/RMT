<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Size::truncate();
        Size::insert([
            ['size' => '128GB', 'created_at' => now()],
            ['size' => '256GB', 'created_at' => now()],
            ['size' => '512GB', 'created_at' => now()],
            ['size' => '1TB', 'created_at' => now()],
            ['size' => '2TB', 'created_at' => now()],
            ['size' => '3TB', 'created_at' => now()],
        ]);
    }
}
