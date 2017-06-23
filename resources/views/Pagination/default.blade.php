@if ($paginator->hasPages())
    <div class="page-pagination clear-fix">

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            {{--<li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>--}}
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-angle-double-left"></i></a>
        @else
            {{--<li class="disabled"><span>&raquo;</span></li>--}}
            <a class="disabled"><span>&raquo;</span></a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                {{--<li class="disabled"><span>{{ $element }}</span></li>--}}
                <a class="disabled"><span>{{ $element }}</span></a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        {{--<li class="active"><span>{{ $page }}</span></li>--}}
                        <a class="active"><span>{{ $page }}</span></a>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="disabled"></a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" ><i class="fa fa-angle-double-right"></i></a>
        @endif
    </div>
@endif