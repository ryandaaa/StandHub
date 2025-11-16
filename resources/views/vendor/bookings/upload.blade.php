@extends('layouts.vendor')
@section('title', 'Upload Bukti Pembayaran')

@section('content')

    <div class="max-w-5xl mx-auto">

        <!-- SUCCESS BANNER -->
        <div class="bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-xl mb-10 flex items-start gap-3">
            <svg class="w-6 h-6 mt-1 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <div>
                <h2 class="font-semibold text-lg">Terima kasih telah melakukan booking!</h2>
                <p class="text-sm text-green-700 mt-1">
                    Silakan selesaikan pembayaran agar booking stand
                    <strong>{{ $booking->stand->nomor_stand }}</strong> dapat diproses.
                </p>
            </div>
        </div>

        <!-- PAYMENT INFO -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-10">
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Informasi Pembayaran</h3>
            <p class="text-gray-600 mb-6">Lakukan pembayaran ke salah satu metode berikut:</p>

            <!-- BANK -->
            <div class="mb-8">
                <p class="text-sm font-medium text-gray-700 mb-2">Transfer Bank</p>

                <div class="bg-gray-50 border border-gray-200 p-4 rounded-lg flex justify-between items-center">
                    <div>
                        <p class="text-gray-900 font-semibold text-lg">BCA</p>
                        <p class="text-gray-700 font-medium tracking-wider">1234567890</p>
                        <p class="text-gray-500 text-sm">a.n StandHub Indonesia</p>
                    </div>

                    <button onclick="navigator.clipboard.writeText('1234567890')"
                        class="px-3 py-2 bg-blue-100 text-blue-700 rounded-md text-sm font-semibold hover:bg-blue-200 transition">
                        Copy
                    </button>
                </div>
            </div>

            <!-- QRIS -->
            <div>
                <p class="text-sm font-medium text-gray-700 mb-2">QRIS</p>

                <div class="bg-gray-50 border border-gray-200 p-5 rounded-lg flex justify-center">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Rickrolling_QR_code.png"
                        class="w-72 h-72 object-contain" />
                </div>
            </div>

        </div>

        <!-- SECTION: Upload -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">

            <h3 class="text-2xl font-semibold text-gray-900 mb-2">Upload Bukti Pembayaran</h3>
            <p class="text-gray-600 mb-6">
                Unggah bukti transfer Anda untuk melanjutkan proses verifikasi.
            </p>

            <form method="POST" action="{{ route('vendor.bookings.upload', $booking->id) }}" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                <!-- LABEL -->
                <label class="block text-sm font-medium text-gray-700">
                    Bukti Pembayaran
                </label>

                <!-- DROPZONE BARU - TERPUSAT -->
                <label for="buktiInput"
                    class="block w-full border-2 border-dashed border-gray-300 rounded-xl p-10 
                       text-center cursor-pointer hover:border-green-500 transition">

                    <svg class="w-10 h-10 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>

                    <p class="text-gray-700 font-medium">
                        Klik untuk memilih gambar bukti pembayaran
                    </p>

                    <p class="text-sm text-gray-400 mt-1">
                        Format JPG/PNG • Maksimal 2MB
                    </p>
                </label>

                <input type="file" name="bukti" id="buktiInput" accept="image/*" class="hidden" required>

                @error('bukti')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror

                <!-- PREVIEW -->
                <div id="previewContainer" class="hidden mt-4">
                    <p class="text-sm font-medium text-gray-700 mb-2">Preview:</p>

                    <img id="previewImage"
                        class="w-full max-h-[450px] object-contain rounded-lg border bg-gray-50 p-2 shadow-sm">
                </div>

                <!-- CTA -->
                <button
                    class="w-full py-3 bg-green-600 text-white rounded-lg 
                       text-lg font-semibold hover:bg-green-700 transition">
                    Upload Bukti Pembayaran
                </button>

            </form>
        </div>

    </div>

@endsection

@section('scripts')
    <script>
        const input = document.getElementById('buktiInput');
        const previewBox = document.getElementById('previewContainer');
        const previewImg = document.getElementById('previewImage');

        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(evt) {
                previewImg.src = evt.target.result;
                previewBox.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        });
    </script>
@endsection
