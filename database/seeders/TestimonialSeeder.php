<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::create([
            'name' => 'John Doe',
            'role' => 'CEO of Example Corp',
            'message' => 'This is a great service! Highly recommend.',
        ]);
        Testimonial::create([
            'name' => 'John Doe',
            'role' => 'CEO of Example Corp',
            'message' => 'This is a great service! Highly recommend.',
        ]);
        Testimonial::create([
            'name' => 'John Doe',
            'role' => 'CEO of Example Corp',
            'message' => 'This is a great service! Highly recommend.',
        ]);
    }
}
