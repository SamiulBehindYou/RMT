<?php

namespace Database\Seeders;


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

        User::create([
            'name' => 'samiul',
            'email' => 'samiul@gmail.com',
            'password' => Hash::make('Pa$$w0rd!'),
        ]);



        $this->call([
            BasicSettingSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            BrandSeeder::class,
            CustomerSeeder::class,
            TestimonialSeeder::class,
            TagSeeder::class,
            ColorSeeder::class,
            SizeSeeder::class,
        ]);


    }
}
