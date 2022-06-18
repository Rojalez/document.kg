@if ($paginator->hasPages())
    <nav class="w-full">
        <ul class="flex flex-row my-2 items-center justify-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li aria-disabled="true">
                    <span class="page-item bg-gray-200 text-gray-600 rounded-l py-2 px-4" >@lang('<')</span>
                </li>
            @else
                <li>
                    <a class="bg-blue-400 hover:bg-blue-500 text-white rounded-l py-2 px-4" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('<')</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="bg-blue-400 hover:bg-blue-500 text-white rounded-r py-2 px-4" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('>')</a>
                </li>
            @else
                <li aria-disabled="true">
                    <span class="page-item rounded-r py-2 px-4" >@lang('>')</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
