<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::truncate();
        Customer::create([
            'name' => 'samiul',
            'email' => 'samiul@gmail.com',
            'phone' => '123456789',
            'address' => 'dhaka, bangladesh',
            'password' => Hash::make('Pa$$w0rd!'),
        ]);
    }
}
