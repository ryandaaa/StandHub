<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title') — Vendor</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="flex">
        <aside class="w-64 bg-white shadow min-h-screen p-4">
            <h1 class="text-xl font-bold mb-6">Vendor Panel</h1>

            <ul class="space-y-2">
                <li><a href="{{ route('vendor.dashboard') }}" class="block p-2 hover:bg-gray-200">Dashboard</a></li>
                <li><a href="{{ route('vendor.stands.index') }}" class="block p-2 hover:bg-gray-200">Ketersediaan
                        Stand</a></li>
                <li><a href="{{ route('vendor.bookings.index') }}" class="block p-2 hover:bg-gray-200">Booking Saya</a>
                </li>
                <li class="mt-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left p-2 text-red-600 hover:bg-red-100 rounded">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </aside>

        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

</body>

</html>
