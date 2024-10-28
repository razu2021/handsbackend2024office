<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name"=>"Admin",
            "email" => "mdrazuhossainraj@gmail.com",
            "role" => 1,
            "role_request" => 1,
            "password" => Hash::make('Password@Admin123'),

        ]);
    }
}
