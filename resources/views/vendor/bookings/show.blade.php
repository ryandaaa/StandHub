<x-app-layout>
    <div class="p-6 bg-white rounded-lg shadow-sm">
        <h2 class="text-xl font-bold mb-4">Detail Booking</h2>

        <div class="space-y-2 text-sm">
            <p><strong>Nama Usaha:</strong> {{ $booking->nama_usaha }}</p>
            <p><strong>Jenis Usaha:</strong> {{ $booking->jenis_usaha }}</p>
            <p><strong>Stand:</strong> {{ $booking->stand->nomor_stand }}</p>
            <p><strong>Status:</strong> <span class="font-medium">{{ $booking->status }}</span></p>
            <p><strong>Catatan Admin:</strong> {{ $booking->catatan_admin ?? '-' }}</p>
        </div>
    </div>
</x-app-layout>
