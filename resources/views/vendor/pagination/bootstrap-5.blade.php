@if ($paginator->hasPages())
<div class="border-top py-3 px-3 d-flex flex-column flex-sm-row align-items-center">
    {{-- Showing Info --}}
    <div class="small text-muted mb-2 mb-sm-0">
        {!! __('Showing') !!}
        <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
        {!! __('to') !!}
        <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
        {!! __('of') !!}
        <span class="fw-semibold">{{ $paginator->total() }}</span>
        {!! __('results') !!}
    </div>

    {{-- Previous Button --}}
    @if ($paginator->onFirstPage())
    <button class="btn btn-sm btn-white d-sm-block d-none mb-0 ms-sm-4" disabled>@lang('pagination.previous')</button>
    @else
    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn btn-sm btn-white d-sm-block d-none mb-0 ms-sm-4">@lang('pagination.previous')</a>
    @endif

    {{-- Pagination List --}}
    <nav aria-label="Page navigation" class="ms-auto">
        <ul class="pagination pagination-light mb-0">
            @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            <li class="page-item">
                <span class="page-link border-0 font-weight-bold">{{ $element }}</span>
            </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
            @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
            <li class="page-item active" aria-current="page">
                <span class="page-link font-weight-bold">{{ $page }}</span>
            </li>
            @else
            <li class="page-item">
                <a class="page-link border-0 font-weight-bold {{ $loop->iteration > 2 ? 'd-sm-inline-flex d-none' : '' }}" href="{{ $url }}">{{ $page }}</a>
            </li>
            @endif
            @endforeach
            @endif
            @endforeach
        </ul>
    </nav>

    {{-- Next Button --}}
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn btn-sm btn-white d-sm-block d-none mb-0 ms-auto">@lang('pagination.next')</a>
    @else
    <button class="btn btn-sm btn-white d-sm-block d-none mb-0 ms-auto" disabled>@lang('pagination.next')</button>
    @endif
</div>
@endif