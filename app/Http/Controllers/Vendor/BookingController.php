<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\Stand;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\User;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = request()->user()
            ->bookings()
            ->with('stand')
            ->latest()
            ->paginate(10);

        return view('vendor.bookings.index', compact('bookings'));
    }

    public function create(Request $request)
    {
        $standId = $request->stand;
        $stand = Stand::findOrFail($standId);

        return view('vendor.bookings.create', compact('stand'));
    }

    public function store(BookingRequest $request)
    {
        // Buat booking dan ambil instance-nya
        $booking = Booking::create([
            'vendor_id'   => $request->user()->id,
            'stand_id'    => $request->stand_id,
            'nama_usaha'  => $request->nama_usaha,
            'jenis_usaha' => $request->jenis_usaha,
            'kontak'      => $request->kontak,
            'status'      => 'pending',
        ]);

        $admins = \App\Models\User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            \App\Models\Notification::create([
                'user_id' => $admin->id,
                'title'   => 'Booking Baru Masuk',
                'message' => 'Vendor ' . $request->user()->name .
                    ' mengajukan booking stand #' . $booking->stand_id .
                    ' (ID Booking: ' . $booking->id . ').',
                'link' => route('admin.bookings.show', $booking), // sesuaikan dengan route-mu
            ]);
        }

        return redirect()->route('vendor.bookings.index')
            ->with('success', 'Pengajuan booking dikirim.');
    }

    public function destroy(Booking $booking)
    {
        if ($booking->vendor_id !== request()->user()->id) {
            abort(403);
        }
        if ($booking->status !== 'pending') {
            return back()->with('error', 'Booking tidak bisa dibatalkan.');
        }
        $booking->stand->update(['status' => 'available']); // restore stand
        $booking->delete();
        return back()->with('success', 'Booking berhasil dibatalkan.');
    }

    public function uploadForm(Booking $booking)
    {
        // Pastikan hanya vendor pemilik booking yang bisa upload
        abort_if($booking->vendor_id !== request()->user()->id, 403);

        return view('vendor.bookings.upload', compact('booking'));
    }

    public function upload(Request $request, Booking $booking)
    {
        abort_if($booking->vendor_id !== request()->user()->id, 403);

        $request->validate([
            'bukti' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);
        $path = $request->file('bukti')->store('bukti', 'public');
        $booking->update([
            'bukti_pembayaran' => $path
        ]);
        return redirect()->route('vendor.bookings.index')
            ->with('success', 'Bukti pembayaran berhasil diupload.');
    }

    public function show(Booking $booking)
    {
        return view('vendor.bookings.show', compact('booking'));
    }
}
