<?php

namespace Database\Seeders;

use App\Models\BasicSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasicSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BasicSettings::truncate(); // Clear existing settings to avoid duplicates
        BasicSettings::create([
            'web_title' => 'Apple Iphone 16 Pro Max, Buy Now!',
            'web_tag_line' => 'Buy the latest Apple iPhone 16 Pro Max at the best price.',
            'facebook' => 'facebook',
            'instagram' => 'instagram',
            'twiter' => 'twiter',
            'youtube' => 'youtube',
            'about_title' => 'We are the best in the business',
            'about_description' => 'about_description',
            'address' => 'Damkura, Paba, Rajshahi',
            'email' => 'rmt@gmail.com',
            'phone' => '01740080009',
        ]);
    }
}
