<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stand;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung semua stand
        $totalStands = Stand::count();

        // Hitung booked
        $booked = Stand::where('status', 'booked')->count();

        // Hitung vendor (role = vendor)
        $vendors = User::where('role', 'vendor')->count();

        return view('admin.dashboard', compact(
            'totalStands',
            'booked',
            'vendors'
        ));
    }
}
