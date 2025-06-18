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
        $dd = <<<HTML
        <p style="text-align: left;">Welcome to Rahat Multimedia and Telecom, your one-stop destination for the latest smartphones, accessories, and expert mobile solutions.&nbsp;<span style="font-size: 0.875rem;">With a passion for technology and a commitment to customer satisfaction, we offer genuine products, competitive prices, and personalized service you can count on.&nbsp;</span><span style="font-size: 0.875rem;">Whether you're upgrading your phone or looking for tech support, we’re here to help you stay connected.</span></p><p><br></p><h6>Services:</h6><ul><li>Phone sells.</li><li>Accessories.</li><li>Repair services.</li><li>Phone cosmatics design.</li></ul><p><span style="font-size: 15px; font-weight: 600;">Location: Damkura hat, Damkura, Rajshahi.</span></p>
        HTML;

        BasicSettings::create([
            'web_title' => 'Apple Iphone 16 Pro Max, Buy Now!',
            'web_tag_line' => 'Buy the latest Apple iPhone 16 Pro Max at the best price.',
            'facebook' => 'facebook',
            'instagram' => 'instagram',
            'twiter' => 'twiter',
            'youtube' => 'youtube',
            'about_title' => 'Your Trusted Mobile Partner',
            'about_description' => $dd,
            'address' => 'Damkura, Paba, Rajshahi',
            'email' => 'rmt@gmail.com',
            'phone' => '01740080009',
            'service_page_title' => 'Our Services',
            'service_page_meta_title' => 'Rahat Multimedia and Telecom Services',
            'contact_us_page_title' => 'Contact Us',
            'contact_us_page_meta_title' => 'We are always for you. Just Send a message about your queries!',
            'about_us_page_title' => 'About Us',
            'about_us_page_meta_title' => 'Get in Touch with Rahat Multimedia and Telecom',
            'subscribe_form_title' => 'Subscribe to Our Newsletter',
        ]);
    }
}
