@if (auth()->user()->role === 'admin')
    @include('layouts.admin')
@else
    @include('layouts.vendor')
@endif
