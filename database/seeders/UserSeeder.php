<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      // Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'country' => 'Pakistan', 
            'password' => 'admin123', 
            'role' => 'admin', // Assuming you have a role column
        ]);

        // Normal User
        User::create([
            'name' => 'Regular User',
            'email' => 'user@gmail.com',
            'country' => 'Pakistan', 
            'password' => 'admin123',
            'role' => 'user', // Assuming you have a role column
        ]);
    }
}
