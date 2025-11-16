<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Stand;
use Illuminate\Http\Request;


class StandController extends Controller
{
    public function index(Request $request)
    {
        // Ambil kategori unik dari huruf pertama nomor_stands
        $categories = Stand::selectRaw("LEFT(nomor_stand, 1) as category")
            ->distinct()
            ->pluck('category');

        // Base query
        $query = Stand::where('status', 'available');

        // Filter kategori
        if ($request->category) {
            $query->where('nomor_stand', 'like', $request->category . '%');
        }

        // Search
        if ($request->search) {
            $query->where('nomor_stand', 'like', '%' . $request->search . '%');
        }

        // Pagination WITH full query string
        $stands = $query
            ->orderBy('nomor_stand')
            ->paginate(9)
            ->withQueryString(); // ⭐ PENTING BANGET

        return view('vendor.dashboard', [
            'stands'     => $stands,
            'categories' => $categories,
        ]);
    }

    public function search(Request $request)
    {
        $query = Stand::where('status', 'available');

        // filter category (optional)
        if ($request->category) {
            $query->where('nomor_stand', 'like', $request->category . '%');
        }

        // search
        if ($request->search) {
            $query->where('nomor_stand', 'like', '%' . $request->search . '%');
        }

        $stands = $query->orderBy('nomor_stand')->get();

        return view('vendor.partials.stand-list', compact('stands'));
    }
}
