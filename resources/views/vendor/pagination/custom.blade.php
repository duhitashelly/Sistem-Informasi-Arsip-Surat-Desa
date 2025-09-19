@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center mt-6">
        <ul class="inline-flex items-center space-x-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="px-3 py-1 rounded-lg bg-gray-200 text-gray-500 cursor-not-allowed">
                    ‹
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" 
                       class="px-3 py-1 rounded-lg bg-white border border-gray-300 text-gray-700 hover:bg-indigo-500 hover:text-white transition">
                        ‹
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="px-3 py-1 text-gray-500">...</li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="px-3 py-1 rounded-lg bg-indigo-600 text-white font-semibold">
                                {{ $page }}
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" 
                                   class="px-3 py-1 rounded-lg bg-white border border-gray-300 text-gray-700 hover:bg-indigo-500 hover:text-white transition">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" 
                       class="px-3 py-1 rounded-lg bg-white border border-gray-300 text-gray-700 hover:bg-indigo-500 hover:text-white transition">
                        ›
                    </a>
                </li>
            @else
                <li class="px-3 py-1 rounded-lg bg-gray-200 text-gray-500 cursor-not-allowed">
                    ›
                </li>
            @endif
        </ul>
    </nav>
@endif
