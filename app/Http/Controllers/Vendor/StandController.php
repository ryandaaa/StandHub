<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Stand;

class StandController extends Controller
{
    public function index()
    {
        $stands = Stand::where('status', 'available')->paginate(10);

        return view('vendor.stands.index', compact('stands'));
    }
}
