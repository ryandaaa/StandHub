<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;
use App\Models\Booking;

class NotificationSeeder extends Seeder
{
    public function run()
    {
        $bookings = Booking::all();

        foreach ($bookings as $b) {

            // Notifikasi awal booking
            Notification::create([
                'user_id' => $b->vendor_id,
                'title' => 'Pengajuan Booking Diterima',
                'message' => 'Admin telah menerima pengajuan booking usaha "' . $b->nama_usaha . '".',
                'link' => route('vendor.bookings.show', $b->id),
            ]);

            // Notifikasi status
            if ($b->status === 'approved') {

                Notification::create([
                    'user_id' => $b->vendor_id,
                    'title' => 'Booking Disetujui',
                    'message' => 'Booking Anda untuk stand ' . $b->stand->nomor_stand . ' telah disetujui.',
                    'link' => route('vendor.bookings.show', $b->id),
                ]);
            } elseif ($b->status === 'rejected') {

                Notification::create([
                    'user_id' => $b->vendor_id,
                    'title' => 'Booking Ditolak',
                    'message' => 'Booking Anda ditolak: ' . $b->catatan_admin,
                    'link' => route('vendor.bookings.show', $b->id),
                ]);
            }
        }
    }
}
