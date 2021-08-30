@if ($paginator->hasPages())
    <div>
        <ul class="nav-pagination font15 mb-0">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item active fontmb-little" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Link --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active fontmb-little" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item fontmb-little"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item fontmb-little">
                    <a class="page-link fontmb-little" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"> > </a>
                </li>
            @else
                <li class="page-item disabled fontmb-little" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link fontmb-little" aria-hidden="true"> > </span>
                </li>
            @endif

            @if($paginator->lastPage() == $paginator->currentPage())
                <li class="page-item fontmb-little"> <span class="page-link">>></span> </li>
            @else 
                <li class="color page-item fontmb-little"> <a class="page-link" href="{{$elements[0][$paginator->lastPage()]}}"> >> </a> </li>
            @endif
        </ul>
    </div>
@endif