<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stand;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['vendor', 'stand'])
            ->latest()
            ->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        $booking->load(['vendor', 'stand']);

        return view('admin.bookings.show', compact('booking'));
    }

    public function approve(Booking $booking)
    {
        $booking->update(['status' => 'approved']);
        $booking->stand->update(['status' => 'booked']);

        \App\Models\Notification::create([
            'user_id' => $booking->vendor_id,  // vendor yang punya booking
            'title'   => 'Booking Disetujui',
            'message' => 'Booking #' . $booking->id . 
                        ' untuk stand "' . $booking->stand->nama_stand . '" telah disetujui.',
            'link'    => route('vendor.bookings.show', $booking),
        ]);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking disetujui.');
    }

    public function reject(Request $request, Booking $booking)
    {
        $request->validate([
            'catatan_admin' => 'required|min:5'
        ]);

        $booking->update([
            'status' => 'rejected',
            'catatan_admin' => $request->catatan_admin,
        ]);

        $booking->stand->update(['status' => 'available']);

        $reason = $request->catatan_admin;

        \App\Models\Notification::create([
            'user_id' => $booking->vendor_id,
            'title'   => 'Booking Ditolak',
            'message' => 'Booking #' . $booking->id .
                        ' untuk stand "' . $booking->stand->nama_stand . 
                        '" ditolak. Alasan: ' . $reason,
            'link'    => route('vendor.bookings.show', $booking),
        ]);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking berhasil ditolak.');
    }



    public function rejectForm(Booking $booking)
    {
        return view('admin.bookings.reject', compact('booking'));
    }

    

}

