<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $bookings = request()->user()->bookings()->latest()->limit(5)->get();

        return view('vendor.dashboard', compact('bookings'));
    }
}
