<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\User;
use App\Models\Stand;

class BookingSeeder extends Seeder
{
    public function run()
    {
        $jenis = ['Makanan', 'Minuman', 'Snack', 'Fashion', 'Aksesoris'];

        $usaha = [
            'Kedai Kopi Seduh',
            'Thai Tea Mama',
            'Ayam Geprek Juara',
            'Martabak Bang Fadil',
            'Rujak Bunda Rani',
            'Dimsum Kenyang',
            'Tahu Crispy Lumer',
            'Es Teh Manis Manja',
            'Kaos Lokal Riau',
            'Aksesoris Handmade Kain Tenun'
        ];

        $vendors = User::where('role', 'vendor')->get();
        $stands  = Stand::all();

        for ($i = 1; $i <= 20; $i++) {

            $vendor = $vendors->random();
            $stand  = $stands->random();

            $status = collect(['pending', 'approved', 'rejected'])->random();

            Booking::create([
                'vendor_id' => $vendor->id,
                'stand_id' => $stand->id,
                'nama_usaha' => $usaha[array_rand($usaha)],
                'jenis_usaha' => $jenis[array_rand($jenis)],
                'kontak' => '08' . rand(111111111, 999999999),
                'status' => $status,
                'catatan_admin' => $status == 'rejected'
                    ? 'Silakan unggah ulang bukti pembayaran dengan format yang benar.'
                    : null,
                'bukti_pembayaran' => $status == 'pending'
                    ? null
                    : 'bukti/' . strtolower(str_replace(' ', '_', $vendor->name)) . '.jpg',
            ]);

            // Update stand status if approved
            if ($status == 'approved') {
                $stand->status = 'booked';
                $stand->save();
            }
        }
    }
}
