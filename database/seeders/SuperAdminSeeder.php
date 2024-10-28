<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Admin::create([
            "name"=>"Super Admin",
            "email" => "superadmin@gmail.com",
            "password" => Hash::make('Password@SuperAdmin@hands@razu2087'),

        ]);
    }
}
