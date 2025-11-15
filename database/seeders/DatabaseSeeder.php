<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stand;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Stand::create([
        'nomor_stand' => 'A-01',
        'lokasi' => 'Hall A',
        'ukuran' => '3x3',
        'harga' => 150000,
        'fasilitas' => 'Listrik, Meja, Kursi',
        'status' => 'available',
]);

    }
}
