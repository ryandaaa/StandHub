<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = User::where('role', 'vendor')
            ->latest()
            ->paginate(10);

        return view('admin.vendors.index', compact('vendors'));
    }

    public function show(User $vendor)
    {
        abort_if($vendor->role !== 'vendor', 404);

        $vendor->load('bookings');

        return view('admin.vendors.show', compact('vendor'));
    }

    public function destroy($id)
    {
        $vendor = User::where('role', 'vendor')->findOrFail($id);

        // Hapus semua booking + file bukti pembayaran
        foreach ($vendor->bookings as $booking) {

            // Hapus file bukti pembayaran
            if ($booking->bukti_pembayaran && Storage::disk('public')->exists($booking->bukti_pembayaran)) {
                Storage::disk('public')->delete($booking->bukti_pembayaran);
            }

            $booking->delete();
        }

        // Hapus vendor
        $vendor->delete();

        return redirect()
            ->route('admin.vendors.index')
            ->with('success', 'Vendor berhasil dihapus beserta seluruh data bookingnya.');
    }
}
