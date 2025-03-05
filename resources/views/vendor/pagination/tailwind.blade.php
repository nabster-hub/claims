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
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5 dark:bg-gray-800 dark:border-gray-600">{{ $element }}</span>
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
{{--    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">--}}
{{--        <div class="flex justify-between flex-1 sm:hidden">--}}
{{--            @if ($paginator->onFirstPage())--}}
{{--                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">--}}
{{--                    {!! __('pagination.previous') !!}--}}
{{--                </span>--}}
{{--            @else--}}
{{--                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">--}}
{{--                    {!! __('pagination.previous') !!}--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            @if ($paginator->hasMorePages())--}}
{{--                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">--}}
{{--                    {!! __('pagination.next') !!}--}}
{{--                </a>--}}
{{--            @else--}}
{{--                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">--}}
{{--                    {!! __('pagination.next') !!}--}}
{{--                </span>--}}
{{--            @endif--}}
{{--        </div>--}}

{{--        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">--}}
{{--            <div>--}}
{{--                <p class="text-sm text-gray-700 leading-5 dark:text-gray-400">--}}
{{--                    {!! __('Showing') !!}--}}
{{--                    @if ($paginator->firstItem())--}}
{{--                        <span class="font-medium">{{ $paginator->firstItem() }}</span>--}}
{{--                        {!! __('to') !!}--}}
{{--                        <span class="font-medium">{{ $paginator->lastItem() }}</span>--}}
{{--                    @else--}}
{{--                        {{ $paginator->count() }}--}}
{{--                    @endif--}}
{{--                    {!! __('of') !!}--}}
{{--                    <span class="font-medium">{{ $paginator->total() }}</span>--}}
{{--                    {!! __('results') !!}--}}
{{--                </p>--}}
{{--            </div>--}}


{{--        </div>--}}
{{--    </nav>--}}
@endif
