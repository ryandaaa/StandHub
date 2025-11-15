<div class="shrink-0 flex items-center">
    <a href="{{ auth()->user()->role === 'admin' 
        ? route('admin.dashboard') 
        : route('vendor.dashboard') }}">
        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
    </a>
</div>

<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link 
        :href="auth()->user()->role === 'admin'
            ? route('admin.dashboard')
            : route('vendor.dashboard')"
        :active="request()->routeIs('admin.dashboard') || request()->routeIs('vendor.dashboard')"
    >
        Dashboard
    </x-nav-link>
</div>
