@if ($paginator->hasPages())
<nav class="d-flex justify-content-center my-4">
    <ul class="pagination pagination-modern shadow-sm rounded-lg">
        {{-- First Page Link --}}
        @if (!$paginator->onFirstPage())
        <li class="page-item">
            <a class="page-link rounded-start" href="{{ $paginator->url(1) }}" aria-label="First">&laquo;&laquo;</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">&laquo;</a>
        </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @php
        $start = max(1, $paginator->currentPage() - 1);
        $end = min($start + 2, $paginator->lastPage());

        if ($start > 1) {
        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
        }
        @endphp

        @for ($page = $start; $page <= $end; $page++)
            @if ($page==$paginator->currentPage())
            <li class="page-item active" aria-current="page">
                <span class="page-link">{{ $page }}</span>
            </li>
            @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a>
            </li>
            @endif
            @endfor

            @if ($end < $paginator->lastPage())
                <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif
                @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">&raquo;</a>
                </li>
                <li class="page-item">
                    <a class="page-link rounded-end" href="{{ $paginator->url($paginator->lastPage()) }}" aria-label="Last">&raquo;&raquo;</a>
                </li>
                @endif
    </ul>
</nav>
@endif