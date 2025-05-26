<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::truncate();
        Tag::create([
            'name' => 'Technology',
        ]);
        Tag::create([
            'name' => 'Mobile',
        ]);
        Tag::create([
            'name' => 'Accessories',
        ]);
        Tag::create([
            'name' => 'Devices',
        ]);
    }
}
