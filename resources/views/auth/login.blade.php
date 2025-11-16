<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — StandHub</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-50 font-[Poppins]">

    <div class="w-full max-w-md bg-white rounded-2xl p-10 shadow-xl border border-gray-200">

        <div class="text-center mb-8">
            <div class="w-16 h-16 mx-auto rounded-full bg-blue-100 flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <circle cx="12" cy="7" r="4"></circle>
                    <path d="M5 21a7 7 0 0114 0"></path>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-gray-900">Welcome Back</h2>
            <p class="text-gray-500 text-sm mt-1">Silakan masuk ke akun Anda</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email -->
            <div>
                <label class="text-gray-700 text-sm font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="mt-2 w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg outline-blue-500 focus:ring focus:ring-blue-200"
                    required autofocus placeholder="masukkan email">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="text-gray-700 text-sm font-medium">Password</label>
                <input type="password" name="password"
                    class="mt-2 w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg outline-blue-500 focus:ring focus:ring-blue-200"
                    required placeholder="masukkan password">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember + Forgot -->
            <div class="flex justify-between items-center text-sm">
                <label class="flex items-center gap-2 text-gray-600 cursor-pointer">
                    <input type="checkbox" class="accent-blue-600" name="remember">
                    Remember me
                </label>

                <a href="{{ route('password.request') }}" class="text-blue-600 hover:text-blue-500 font-medium">
                    Forgot password?
                </a>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full py-3 bg-[#0B1221] hover:bg-[#101A30] text-white font-semibold rounded-lg transition shadow-lg">
                LOGIN
            </button>

        </form>

        <p class="text-center text-sm text-gray-600 mt-6">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-blue-600 font-semibold hover:text-blue-500">
                Sign up now
            </a>
        </p>

    </div>

</body>

</html>
