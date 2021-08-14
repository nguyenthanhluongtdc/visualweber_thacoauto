@if ($paginator->hasPages())
<div class="pagination-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <div class="pagination_style">
                <nav>
                    @if ($paginator->hasPages())
                    <ul class="pagination font25 font-pri-bold">
                        @if ($paginator->hasMorePages() == false)
                        @if($paginator->currentPage() >= $paginator->lastPage())
                            <li class=""><a href="{{ $paginator->url(1) }}" class="button"><<</a></li>
                        @endif
                            <li class=""><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="button"><</a></li>
                        @endif

                        @if($paginator->currentPage() > 2)
                            <li class=""><a class="" href="{{ $paginator->url(1) }}">1</a></li>
                        @endif
                        @if($paginator->currentPage() > 3)
                            <li class=""><span class="">...</span></li>
                        @endif
                        @foreach(range(1, $paginator->lastPage()) as $i)
                            @if($i >= $paginator->currentPage() - 1 && $i <= $paginator->currentPage() + 1)
                                @if ($i == $paginator->currentPage())
                                    <li class=" active "><span class="">{{ $i }}</span></li>
                                @else
                                    <li class=""><a class="" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                                @endif
                            @endif
                        @endforeach
                        @if($paginator->currentPage() < $paginator->lastPage() - 2)
                            <li class=""><span class="">...</span></li>
                        @endif

                        @if($paginator->currentPage() < $paginator->lastPage() - 1)
                            <li class=""><a href="{{ $paginator->url($paginator->lastPage()) }}" class="">{{ $paginator->lastPage() }}</a></li>
                        @endif

                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <li class=""><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="button">></a></li>
                            @if($paginator->currentPage() < $paginator->lastPage())
                                <li class=""><a href="{{ $paginator->url($paginator->lastPage()) }}" class="button">>></a></li>
                            @endif
                        @endif
                    </ul>
                @endif 
                </nav>
            </div>
        </div>
    </div>
</div>
@endif
