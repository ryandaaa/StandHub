<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StandHub - Sistem Manajemen Stand (Versi Ryanda)</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #1B3C53 0%, #132440 100%);
        }

        .text-gradient {
            background: linear-gradient(135deg, #132440 0%, #1B3C53 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .float {
            animation: float 6s ease-in-out infinite;
        }

        .hero-grid {
            background-image:
                linear-gradient(to right, rgba(102, 126, 234, 0.1) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(102, 126, 234, 0.1) 1px, transparent 1px);
            background-size: 40px 40px;
        }
    </style>
</head>

<body class="bg-white">

    <!-- NAVIGATION -->
    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl gradient-bg flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-gray-900">StandHub</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="#features"
                        class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">Fitur</a>
                    <a href="#how-it-works"
                        class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">Cara
                        Kerja</a>
                    <a href="#pricing"
                        class="text-sm font-medium text-gray-600 hover:text-gray-900 transition">Harga</a>
                </div>

                <!-- Auth Buttons -->
                <div class="flex items-center gap-3">
                    <a href="/login"
                        class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900 transition">
                        Masuk
                    </a>
                    <a href="/register"
                        class="px-6 py-2 text-sm font-medium text-white gradient-bg rounded-full hover:shadow-lg hover:scale-105 transition-all duration-300">
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="relative pt-32 pb-20 overflow-hidden hero-grid">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-4xl mx-auto">

                <!-- Badge -->
                <div
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-purple-50 border border-purple-200 mb-8">
                    <span class="w-2 h-2 rounded-full bg-purple-500 animate-pulse"></span>
                    <span class="text-sm font-medium text-purple-700">Baru: Rekomendasi Stand berbasis AI (yang dibuat
                        buru-buru)</span>
                </div>

                <!-- Headline -->
                <h1 class="text-5xl md:text-7xl font-bold text-gray-900 mb-6 leading-tight">
                    Kelola Stand Kamu.<br />
                    <span class="text-gradient">Tanpa Ribet.</span>
                </h1>

                <p class="text-xl text-gray-600 mb-10 max-w-2xl mx-auto leading-relaxed">
                    Website sederhana buatan Ryanda untuk tugas kuliah — tapi setidaknya tampilannya tidak malu-maluin.
                    Bisa booking
                    stand, cek ketersediaan, dan lihat-lihat stand yang ada.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-16">
                    <a href="/register"
                        class="w-full sm:w-auto px-8 py-4 text-base font-semibold text-white gradient-bg rounded-full hover:shadow-2xl hover:scale-105 transition-all duration-300">
                        Coba Gratis
                    </a>
                    <a href="https://github.com/ryandaaa/StandHub"
                        class="w-full sm:w-auto px-8 py-4 text-base font-semibold text-gray-700 bg-white border-2 border-gray-200 rounded-full hover:border-gray-300 hover:shadow-lg transition-all duration-300">
                        GitHub
                    </a>
                </div>

                <!-- Social Proof -->
                <div class="flex items-center justify-center gap-8 text-sm text-gray-600">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="font-semibold">4.9/5</span> dari 500+ penilaian (fiktif)
                    </div>
                    <div class="hidden sm:block w-px h-4 bg-gray-300"></div>
                    <div>
                        Dipakai oleh <span class="font-semibold">1.000+</span> vendor (katanya)
                    </div>
                </div>
            </div>

            <!-- Hero Image/Mockup -->
            <div class="mt-20 relative float">
                <div class="relative mx-auto max-w-5xl">
                    <div class="absolute inset-0 gradient-bg rounded-3xl blur-3xl opacity-20"></div>
                    <div class="relative bg-white rounded-2xl shadow-2xl border border-gray-200 p-2">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1200&h=600&fit=crop"
                            alt="Dashboard Preview" class="w-full rounded-xl">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section id="how-it-works" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Mulai dalam <span class="text-gradient">3 langkah mudah</span>
                </h2>
                <p class="text-lg text-gray-600">
                    Gak usah ribet — daftar, pilih stand, langsung booking.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-12">
                <div class="text-center">
                    <div
                        class="w-20 h-20 rounded-full gradient-bg flex items-center justify-center text-3xl font-bold text-white mx-auto mb-6 shadow-lg">
                        1
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Buat Akun</h3>
                    <p class="text-gray-600">
                        Daftar cepat cuma butuh email. Gratis buat coba-coba.
                    </p>
                </div>

                <div class="text-center">
                    <div
                        class="w-20 h-20 rounded-full gradient-bg flex items-center justify-center text-3xl font-bold text-white mx-auto mb-6 shadow-lg">
                        2
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Lihat Daftar Stand</h3>
                    <p class="text-gray-600">
                        Cek stand tersedia, lengkap dengan detailnya.
                    </p>
                </div>

                <div class="text-center">
                    <div
                        class="w-20 h-20 rounded-full gradient-bg flex items-center justify-center text-3xl font-bold text-white mx-auto mb-6 shadow-lg">
                        3
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Langsung Booking</h3>
                    <p class="text-gray-600">
                        Tinggal klik dan selesai. Dapet konfirmasi otomatis.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- PRICING -->
    <section id="pricing" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Harga yang <span class="text-gradient">gak bikin pusing</span>
                </h2>
                <p class="text-lg text-gray-600">
                    Pilih paket sesuai gaya hidup (atau sesuai tugas kelompok).
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">

                <!-- Starter -->
                <div
                    class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-xl transition-all duration-300">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Pemula</h3>
                    <p class="text-gray-600 text-sm mb-6">Cocok buat yang baru coba</p>
                    <div class="mb-6">
                        <span class="text-5xl font-bold text-gray-900">Rp29k</span>
                        <span class="text-gray-600">/bulan</span>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Maksimal 5 stand</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Analitik dasar</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Bantuan via email</span>
                        </li>
                    </ul>
                    <a href="/register"
                        class="block w-full py-3 text-center font-semibold text-gray-700 bg-gray-100 rounded-full hover:bg-gray-200 transition">
                        Daftar
                    </a>
                </div>

                <!-- Pro (Featured) -->
                <div
                    class="relative bg-white rounded-2xl p-8 shadow-xl border-2 border-purple-500 transform md:scale-105">
                    <div
                        class="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1 gradient-bg text-white text-sm font-semibold rounded-full">
                        Paling Laris
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Pro</h3>
                    <p class="text-gray-600 text-sm mb-6">Buat bisnis yang mulai serius</p>
                    <div class="mb-6">
                        <span class="text-5xl font-bold text-gray-900">Rp79k</span>
                        <span class="text-gray-600">/bulan</span>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Stand tak terbatas</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Analitik lanjutan</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Prioritas bantuan</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Akses tim (kolaborasi)</span>
                        </li>
                    </ul>
                    <a href="/register"
                        class="block w-full py-3 text-center font-semibold text-white gradient-bg rounded-full hover:shadow-lg transition">
                        Daftar
                    </a>
                </div>

                <!-- Enterprise -->
                <div
                    class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200 hover:shadow-xl transition-all duration-300">
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Enterprise</h3>
                    <p class="text-gray-600 text-sm mb-6">Untuk organisasi besar</p>
                    <div class="mb-6">
                        <span class="text-5xl font-bold text-gray-900">Custom</span>
                    </div>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Semua fitur Pro</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Integrasi khusus</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="text-gray-700">Manajer akun pribadi</span>
                        </li>
                    </ul>
                    <a href="#contact"
                        class="block w-full py-3 text-center font-semibold text-gray-700 bg-gray-100 rounded-full hover:bg-gray-200 transition">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="py-24 gradient-bg relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;">
            </div>
        </div>
        <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Mau coba sistem manajemen stand buatan Ryanda?
            </h2>
            <p class="text-xl text-white/90 mb-10">
                Udah lumayan kok buat tugas individu. Bukan yang terbaik, tapi at least keren dilihat dosen.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="/register"
                    class="w-full sm:w-auto px-8 py-4 text-base font-semibold text-purple-600 bg-white rounded-full hover:shadow-2xl hover:scale-105 transition-all duration-300">
                    Coba Gratis
                </a>
                <a href="/login"
                    class="w-full sm:w-auto px-8 py-4 text-base font-semibold text-white border-2 border-white rounded-full hover:bg-white hover:text-purple-600 transition-all duration-300">
                    Masuk
                </a>
            </div>
            <p class="mt-8 text-white/80 text-sm">
                Tidak butuh kartu kredit • Gratis 14 hari • Bisa batal kapan saja
            </p>
        </div>
    </section>

    <!-- Smooth Scroll Script -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>

</body>

</html>
