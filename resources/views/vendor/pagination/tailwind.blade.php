@if ($paginator->hasPages())
    <nav role="navigation" class="flex justify-center mt-8">
        <ul class="inline-flex items-center overflow-hidden rounded-xl border border-slate-700 bg-slate-800 shadow">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li class="px-3 py-2 text-slate-500">
                    <span>&lsaquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                        class="px-3 py-2 text-slate-300 hover:bg-slate-700 transition">
                        &lsaquo;
                    </a>
                </li>
            @endif

            {{-- Numbers --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="px-3 py-2 text-slate-500">{{ $element }}</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="px-4 py-2 bg-blue-600 text-white font-semibold">
                                {{ $page }}
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                    class="px-4 py-2 text-slate-300 hover:bg-slate-700 transition">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                        class="px-3 py-2 text-slate-300 hover:bg-slate-700 transition">
                        &rsaquo;
                    </a>
                </li>
            @else
                <li class="px-3 py-2 text-slate-500">
                    <span>&rsaquo;</span>
                </li>
            @endif

        </ul>
    </nav>
@endif
