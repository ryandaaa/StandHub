@foreach ($stands as $s)
    @include('vendor.partials.stand-card', ['s' => $s])
@endforeach
