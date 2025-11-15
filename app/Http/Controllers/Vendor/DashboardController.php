<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $user = request()->user();

        // Total booking aktif vendor
        $activeBooking = $user->bookings()->where('status', 'approved')->count();

        // Total transaksi selesai
        $totalTransaksi = $user->bookings()->where('status', 'approved')->count();

        // Booking terbaru
        $recentBookings = $user->bookings()
            ->latest()
            ->take(5)
            ->get();

        // STAND AVAILABLE (untuk e-commerce katalog)
        $stands = \App\Models\Stand::where('status', 'available')->paginate(9);

        // Notifikasi terbaru
        $notifications = $user->notifications()->latest()->take(5)->get();

        return view('vendor.dashboard', compact(
            'activeBooking',
            'totalTransaksi',
            'recentBookings',
            'stands',
            'notifications'
        ));
    }
}
