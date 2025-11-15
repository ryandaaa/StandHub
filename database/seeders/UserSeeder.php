<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@standhub.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Vendors (realistic Indonesian names)
        $vendors = [
            ['Alya Refina Putri', 'alyarfnptr@gmail.com'],
            ['Rizky Maulana', 'rizky.maulana@yahoo.com'],
            ['Dewi Kartika', 'dewi.kartika@outlook.com'],
            ['Fajar Pratama', 'fajar.prtm@gmail.com'],
            ['Siti Nurjanah', 'siti.nurjanah12@gmail.com'],
            ['Rendra Setiawan', 'rendra.stwn@gmail.com'],
            ['Nanda Febriansyah', 'nanda.febrian@icloud.com'],
            ['Rama Suryadi', 'rama.suryadi@gmail.com'],
        ];

        foreach ($vendors as $v) {
            User::create([
                'name' => $v[0],
                'email' => $v[1],
                'password' => Hash::make('password'),
                'role' => 'vendor',
            ]);
        }
    }
}
