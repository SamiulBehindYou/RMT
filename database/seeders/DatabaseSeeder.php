<?php

namespace Database\Seeders;

use App\Models\BasicSettings;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'samiul',
            'email' => 'samiul@gmail.com',
            'password' => Hash::make('Pa$$w0rd!'),
        ]);

        BasicSettings::factory()->create([
            'web_title' => 'web_title',
            'web_tag_line' => 'web_tag_line',
            'facebook' => 'facebook',
            'instagram' => 'instagram',
            'twiter' => 'twiter',
            'youtube' => 'youtube',
            'about_title' => 'about_title',
            'about_description' => 'about_description',
        ]);
    }
}
