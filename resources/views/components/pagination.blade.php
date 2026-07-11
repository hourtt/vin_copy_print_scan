@props([
    'paginator',
])

@php
    // Build the $elements array (page links + ellipsis) that Laravel normally
    // provides only to vendor pagination views rendered via ->links().
    $elements = [];
    $lastPage = $paginator->lastPage();
    $currentPage = $paginator->currentPage();
    $window = 3; // pages shown on each side of current page

    if ($lastPage <= ($window * 2 + 3)) {
        // Few pages – show them all
        $elements[] = $paginator->getUrlRange(1, $lastPage);
    } else {
        $start = max(1, $currentPage - $window);
        $end   = min($lastPage, $currentPage + $window);

        // Leading pages + ellipsis
        if ($start > 2) {
            $elements[] = $paginator->getUrlRange(1, 1);
            $elements[] = '...';
        } elseif ($start === 2) {
            $elements[] = $paginator->getUrlRange(1, 1);
        }

        // Middle window
        $elements[] = $paginator->getUrlRange($start, $end);

        // Trailing ellipsis + last page
        if ($end < $lastPage - 1) {
            $elements[] = '...';
            $elements[] = $paginator->getUrlRange($lastPage, $lastPage);
        } elseif ($end === $lastPage - 1) {
            $elements[] = $paginator->getUrlRange($lastPage, $lastPage);
        }
    }
@endphp

@if ($paginator->hasPages())
    <nav aria-label="Pagination" class="w-full flex justify-center items-center">

        {{-- MOBILE --}}
        <div class="flex sm:hidden items-center justify-center gap-3 flex-wrap">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-lg text-sm font-medium
                             bg-[#f8f9fa] text-[#adb5bd] border border-[#dee2e6] cursor-not-allowed select-none">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Prev
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                   class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-lg text-sm font-medium
                          bg-white text-[#212529] border border-[#dee2e6] transition-colors
                          hover:bg-[#f8f9fa] hover:border-[#0056b3] active:bg-[#e9ecef]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Prev
                </a>
            @endif

            {{-- Page indicator --}}
            <span class="text-sm font-medium text-[#495057]">
                Page <span class="font-bold text-[#212529]">{{ $paginator->currentPage() }}</span>
                of <span class="font-bold text-[#212529]">{{ $paginator->lastPage() }}</span>
            </span>

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                   class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-lg text-sm font-medium
                          bg-white text-[#212529] border border-[#dee2e6] transition-colors
                          hover:bg-[#f8f9fa] hover:border-[#0056b3] active:bg-[#e9ecef]">
                    Next
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            @else
                <span class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-lg text-sm font-medium
                             bg-[#f8f9fa] text-[#adb5bd] border border-[#dee2e6] cursor-not-allowed select-none">
                    Next
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </span>
            @endif
        </div>

        {{-- DESKTOP --}}
        <ul class="hidden sm:flex sm:items-center sm:justify-center gap-1.5 sm:gap-2 flex-wrap m-0 p-0 list-none">

            {{-- Previous Arrow --}}
            <li>
                @if ($paginator->onFirstPage())
                    <span aria-disabled="true" aria-label="Previous"
                          class="w-10 h-10 flex items-center justify-center rounded-lg text-sm
                                 bg-[#f8f9fa] text-[#adb5bd] border border-[#dee2e6] cursor-not-allowed opacity-50 select-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous"
                       class="w-10 h-10 flex items-center justify-center rounded-lg text-sm font-medium
                              bg-white text-[#212529] border border-[#dee2e6] transition-colors
                              hover:bg-[#f8f9fa] hover:border-[#0056b3] active:bg-[#e9ecef]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </a>
                @endif
            </li>

            {{-- Page Numbers --}}
            @foreach ($elements as $element)
                {{-- Ellipsis --}}
                @if (is_string($element))
                    <li>
                        <span aria-disabled="true"
                              class="w-10 h-10 flex items-center justify-center rounded-lg text-sm font-medium
                                     text-[#6c757d] select-none">
                            {{ $element }}
                        </span>
                    </li>
                @endif

                {{-- Page Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li>
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page"
                                      class="w-10 h-10 flex items-center justify-center rounded-lg text-sm font-semibold
                                             bg-[#212529] text-white border border-transparent shadow-sm select-none">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}"
                                   class="w-10 h-10 flex items-center justify-center rounded-lg text-sm font-medium
                                          bg-white text-[#212529] border border-[#dee2e6] transition-colors
                                          hover:bg-[#f8f9fa] hover:border-[#0056b3] active:bg-[#e9ecef]">
                                    {{ $page }}
                                </a>
                            @endif
                        </li>
                    @endforeach
                @endif
            @endforeach

            {{-- Next Arrow --}}
            <li>
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next"
                       class="w-10 h-10 flex items-center justify-center rounded-lg text-sm font-medium
                              bg-white text-[#212529] border border-[#dee2e6] transition-colors
                              hover:bg-[#f8f9fa] hover:border-[#0056b3] active:bg-[#e9ecef]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                @else
                    <span aria-disabled="true" aria-label="Next"
                          class="w-10 h-10 flex items-center justify-center rounded-lg text-sm
                                 bg-[#f8f9fa] text-[#adb5bd] border border-[#dee2e6] cursor-not-allowed opacity-50 select-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </span>
                @endif
            </li>
        </ul>

    </nav>
@endif
