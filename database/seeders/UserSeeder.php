<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Bazarket',
            'email' => 'admin@bazaar.test',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Vendor contoh 1
        User::create([
            'name' => 'Vendor Satu',
            'email' => 'vendor1@bazaar.test',
            'password' => Hash::make('vendor123'),
            'role' => 'vendor',
        ]);

        // Vendor contoh 2
        User::create([
            'name' => 'Vendor Dua',
            'email' => 'vendor2@bazaar.test',
            'password' => Hash::make('vendor123'),
            'role' => 'vendor',
        ]);
    }
}
