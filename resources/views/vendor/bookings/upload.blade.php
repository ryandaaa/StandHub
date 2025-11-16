@extends('layouts.vendor')
@section('title', 'Upload Bukti Pembayaran')

@section('content')

    <div class="max-w-5xl mx-auto px-4 mt-2">

        <!-- SUCCESS BANNER -->
        <div
            class="bg-blue-900/20 border border-blue-600/30 backdrop-blur-xl 
               rounded-xl px-6 py-5 mb-6 flex items-start gap-4 shadow-[0_0_25px_-8px_rgba(30,58,138,0.6)]">

            <svg class="w-7 h-7 text-blue-300 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <div>
                <h2 class="font-bold text-xl text-slate-100">Booking Berhasil!</h2>
                <p class="text-blue-200 text-sm mt-1">
                    Selesaikan pembayaran agar booking stand
                    <strong class="text-blue-300">{{ $booking->stand->nomor_stand }}</strong> dapat diproses.
                </p>
            </div>

        </div>

        <!-- PAYMENT INFO -->
        <div
            class="bg-slate-900/60 backdrop-blur-xl border border-white/10 rounded-xl 
               shadow-[0_0_25px_-10px_rgba(0,0,0,0.6)] p-6 mb-10">

            <h3 class="text-xl font-semibold text-slate-100 mb-2">Informasi Pembayaran</h3>
            <p class="text-slate-400 mb-6">Lakukan pembayaran ke salah satu metode berikut:</p>

            <!-- BANK -->
            <div class="mb-8">
                <p class="text-sm font-medium text-slate-300 mb-2">Transfer Bank</p>

                <div
                    class="flex justify-between items-center bg-slate-800/40 backdrop-blur rounded-lg
                       px-5 py-4 border border-white/10 shadow-sm">

                    <div>
                        <p class="text-slate-100 font-bold text-lg">BCA</p>
                        <p class="text-blue-300 font-semibold tracking-wider text-lg">1234567890</p>
                        <p class="text-slate-400 text-sm">a.n StandHub Indonesia</p>
                    </div>

                    <button onclick="navigator.clipboard.writeText('1234567890')"
                        class="px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-semibold
                           hover:bg-blue-500 transition shadow-[0_0_10px_-2px_rgba(59,130,246,0.6)]">
                        Copy
                    </button>

                </div>
            </div>

            <!-- QRIS -->
            <div>
                <p class="text-sm font-medium text-slate-300 mb-3">QRIS</p>

                <div
                    class="bg-slate-800/30 border border-white/10 backdrop-blur-xl rounded-xl
                       p-6 flex justify-center shadow-[0_0_25px_-10px_rgba(0,0,0,0.6)]">

                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Rickrolling_QR_code.png"
                        class="w-72 h-72 rounded-lg border border-slate-700 shadow">
                </div>
            </div>
        </div>

        <!-- UPLOAD SECTION -->
        <div
            class="bg-slate-900/60 backdrop-blur-xl border border-white/10 rounded-xl 
               shadow-[0_0_25px_-10px_rgba(0,0,0,0.6)] p-8">

            <h3 class="text-2xl font-bold text-slate-100 mb-2">Upload Bukti Pembayaran</h3>
            <p class="text-slate-400 mb-8">
                Unggah foto bukti transfer Anda untuk melanjutkan proses verifikasi.
            </p>

            <form method="POST" action="{{ route('vendor.bookings.upload', $booking->id) }}" enctype="multipart/form-data"
                class="space-y-6">

                @csrf

                <!-- DROPZONE -->
                <label for="buktiInput"
                    class="block w-full border-2 border-dashed border-slate-600 rounded-xl p-10
                       text-center cursor-pointer transition
                       hover:border-blue-500 hover:bg-blue-900/10">

                    <svg class="w-12 h-12 text-slate-400 mx-auto mb-3" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>

                    <p class="text-slate-200 font-medium">
                        Klik atau seret gambar bukti pembayaran ke sini
                    </p>

                    <p class="text-sm text-slate-500 mt-1">
                        Format JPG/PNG • Maksimal 2MB
                    </p>
                </label>

                <input type="file" name="bukti" id="buktiInput" accept="image/*" class="hidden" required>

                @error('bukti')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror

                <!-- PREVIEW -->
                <div id="previewContainer" class="hidden mt-4">
                    <p class="text-sm font-medium text-slate-300 mb-2">Preview:</p>

                    <img id="previewImage"
                        class="w-full max-h-[450px] object-contain rounded-lg border border-slate-800
                           bg-slate-800/40 p-3 shadow-[0_0_20px_-8px_rgba(255,255,255,0.1)]">
                </div>

                <!-- CTA -->
                <button
                    class="w-full py-4 bg-blue-600 text-white rounded-xl text-lg font-bold
                       hover:bg-blue-500 transition shadow-[0_0_18px_-6px_rgba(59,130,246,0.6)]">
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

        input.addEventListener('change', e => {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = evt => {
                previewImg.src = evt.target.result;
                previewBox.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        });
    </script>
@endsection
