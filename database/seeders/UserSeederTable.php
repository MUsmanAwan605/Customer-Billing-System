<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin123'),
            'user_role'=>'admin',
            'status'=>'active',
        ]);

        User::create([
            'name' => 'user',
            'email'=>'user@gmail.com',
            'password'=>Hash::make('user123'),
            'user_role'=>'user',
            'status'=>'active',
        ]);
    }
}
