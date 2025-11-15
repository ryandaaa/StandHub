<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stand;

class StandBookingController extends Controller
{
    public function index(Stand $stand)
    {
        // Ambil booking untuk stand ini
        $bookings = $stand->bookings()
            ->with(['vendor'])
            ->latest()
            ->get();

        return view('admin.stands.bookings', compact('stand', 'bookings'));
    }
}
