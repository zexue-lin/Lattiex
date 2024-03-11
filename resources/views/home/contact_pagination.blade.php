<nav aria-label="Page navigation example">
    <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link"><i class="fas fa-angle-left"></i></span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i
                        class="fas fa-angle-left"></i></a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
 
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i
                        class="fas fa-angle-right"></i></a></li>
        @else
            <li class="page-item disabled"><span class="page-link"><i class="fas fa-angle-right"></i></span></li>
        @endif
    </ul>
</nav>
