@if ($paginator->hasPages())
<div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50 flex justify-between items-center flex-wrap gap-4">

    <!-- INFO -->
    <p class="text-sm text-gray-600">
        Showing 
        <span class="font-medium">{{ $paginator->firstItem() }}</span> 
        to 
        <span class="font-medium">{{ $paginator->lastItem() }}</span> 
        of 
        <span class="font-medium">{{ $paginator->total() }}</span> data
    </p>

    <!-- PAGINATION BUTTON -->
    <div class="flex gap-2">

        <!-- PREVIOUS -->
        @if ($paginator->onFirstPage())
            <span class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm text-gray-400 cursor-not-allowed">
                Previous
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
               class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm hover:bg-gray-100 transition-colors">
                Previous
            </a>
        @endif

        <!-- PAGE NUMBERS -->
        @foreach ($elements as $element)

            @if (is_string($element))
                <span class="px-3 py-1.5 text-sm text-gray-500">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-3 py-1.5 bg-emerald-600 text-white rounded-lg text-sm shadow-sm">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}"
                           class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm hover:bg-gray-100 transition-colors">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif

        @endforeach

        <!-- NEXT -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
               class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm hover:bg-gray-100 transition-colors">
                Next
            </a>
        @else
            <span class="px-3 py-1.5 border border-gray-300 rounded-lg text-sm text-gray-400 cursor-not-allowed">
                Next
            </span>
        @endif

    </div>
</div>
@endif