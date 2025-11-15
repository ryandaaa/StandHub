@if (session('success'))
    <div class="mb-4 p-3 bg-green-600 text-white rounded">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="mb-4 p-3 bg-red-600 text-white rounded">
        {{ session('error') }}
    </div>
@endif
