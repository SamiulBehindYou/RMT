<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubCategory::truncate();
        SubCategory::create([
            'category_id' => 1,
            'subcategory_name' => 'Smartphones',
        ]);
        SubCategory::create([
            'category_id' => 1,
            'subcategory_name' => 'Tablets',
        ]);
        SubCategory::create([
            'category_id' => 2,
            'subcategory_name' => 'Chargers',
        ]);
        SubCategory::create([
            'category_id' => 2,
            'subcategory_name' => 'Headphones',
        ]);
    }
}
