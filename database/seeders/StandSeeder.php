<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stand;

class StandSeeder extends Seeder
{
    public function run()
    {
        $locations = ['Gedung Serbaguna', 'Outdoor Barat', 'Outdoor Timur', 'Lapangan Utama', 'Zona A', 'Zona B'];

        $ukuran = ['2x2 m', '2x3 m', '3x3 m'];
        $fasilitas = [
            'Meja + Kursi',
            'Listrik 450W',
            'Listrik 900W',
            'Meja, Kursi & Stopkontak',
        ];

        for ($i = 1; $i <= 30; $i++) {

            $nomor =
                $i <= 15
                ? 'A' . str_pad($i, 2, '0', STR_PAD_LEFT)
                : 'B' . str_pad($i - 15, 2, '0', STR_PAD_LEFT);

            Stand::create([
                'nomor_stand' => $nomor,
                'lokasi' => $locations[array_rand($locations)],
                'ukuran' => $ukuran[array_rand($ukuran)],
                'harga' => rand(150000, 500000),
                'fasilitas' => $fasilitas[array_rand($fasilitas)],
                'status' => 'available',
            ]);
        }
    }
}
