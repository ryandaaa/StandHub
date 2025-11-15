<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $bookings = request()->user()->bookings()->latest()->take(5)->get();
        $activeBookings = request()->user()->bookings()->where('status', 'confirmed')->count();
        $totalBookings = request()->user()->bookings()->count();

        // Jika ingin hitung stand yang tersedia (tergantung model)
        $availableStands = \App\Models\Stand::where('status', 'available')->count();

        return view('vendor.dashboard', compact(
            'bookings',
            'activeBookings',
            'availableStands',
            'totalBookings'
        ));
    }
}
