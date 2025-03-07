@if ($paginator->hasPages())

    <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
        <span class="text-xs xs:text-sm text-gray-900">
                                {!! __('pagination.Showing') !!}
                                @if ($paginator->firstItem())
                                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                                    {!! __('pagination.to') !!}
                                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                                @else
                                    {{ $paginator->count() }}
                                @endif
                                {!! __('pagination.of') !!}
                                <span class="font-medium">{{ $paginator->total() }}</span>
                                {!! __('pagination.results') !!}
        </span>
        <div class="inline-flex gap-2 mt-2 xs:mt-0">

                    <div class="flex justify-between gap-2 flex-1 sm:hidden">
                        @if ($paginator->onFirstPage())
                            <span class="relative block text-sm bg-gray-300 hover:bg-gray-400 text-gray-800/60 font-semibold py-2 px-4 rounded-l">
                                {!! __('pagination.previous') !!}
                            </span>
                        @else
                            <a href="{{ $paginator->previousPageUrl() }}" class="relative text-sm cursor-pointer bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l">
                                {!! __('pagination.previous') !!}
                            </a>
                        @endif

                        @if ($paginator->hasMorePages())
                            <a href="{{ $paginator->nextPageUrl() }}" class="relative text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">
                                {!! __('pagination.next') !!}
                            </a>
                        @else
                            <span class="relative block text-sm cursor-pointer bg-gray-300 hover:bg-gray-400 text-gray-800/60  font-semibold py-2 px-4 rounded-r">
                                {!! __('pagination.next') !!}
                            </span>
                        @endif
                    </div>

            <div>
                <span class="relative z-0 inline-flex rtl:flex-row-reverse shadow-sm rounded-md gap-2">
{{--                     Previous Page Link--}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" class="relative block text-sm bg-gray-300 hover:bg-gray-400 text-gray-800/60 font-semibold py-2 px-4 rounded-l" aria-label="{{ __('pagination.previous') }}">
                                {!! __('pagination.previous') !!}
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative block text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l" aria-label="{{ __('pagination.previous') }}">
                             {!! __('pagination.previous') !!}
                        </a>
                    @endif

{{--                     Pagination Elements--}}
                    @foreach ($elements as $element)
{{--                        "Three Dots" Separator--}}
                        @if (is_string($element))
                            <span aria-disabled="true" class="relative text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded">
                                {{ $element }}
                            </span>
                        @endif

{{--                        Array Of Links--}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page" class="relative text-sm bg-gray-300 hover:bg-gray-400 text-gray-800/60 font-semibold py-2 px-4 rounded">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

{{--                     Next Page Link--}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r" aria-label="{{ __('pagination.next') }}">
                            {!! __('pagination.next') !!}
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}" class="relative text-sm bg-gray-300 hover:bg-gray-400 text-gray-800/60 font-semibold py-2 px-4 rounded-r" >
                            {!! __('pagination.next') !!}
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </div>

@endif
