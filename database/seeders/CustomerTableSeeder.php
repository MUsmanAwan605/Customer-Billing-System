<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Customer::create([
            'name' => 'Ahmed',
            'email' => 'Ahmed@gmail.com',
            'phone' => '12345678102',
            'address' => 'address',
        ]);
        Customer::create([
            'name' => 'Ali',
            'email' => 'Ali@gmail.com',
            'phone' => '18745678102',
            'address' => 'address',
        ]);

        Customer::create([
            'name' => 'Akf',
            'email' => 'Afk@gmail.com',
            'phone' => '18945678102',
            'address' => 'address',
        ]);

        Customer::create([
            'name' => 'Wahab',
            'email' => 'Wahab@gmail.com',
            'phone' => '12045678102',
            'address' => 'address',
        ]);
    }
}
