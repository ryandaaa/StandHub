@props(['disabled' => false])

<input
    {{ $attributes->merge([
        'class' => 'w-full bg-transparent text-white placeholder-slate-400 outline-none',
    ]) }}
    @disabled($disabled) />
