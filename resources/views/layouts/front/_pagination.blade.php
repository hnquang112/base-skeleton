<div class="clearboth"></div>

<!--BEGIN .page-pagination -->
@if ($paginator->total() > $paginator->perPage())
    <div class="page-pagination page-pagination-full">
        <p class="clearfix">
            @if ($paginator->currentPage() > 1)
                <span class="fl"><a href="{{ $paginator->previousPageUrl() }}">@lang('pagination.previous')</a></span>
            @endif
            @if ($paginator->hasMorePages())
                <span class="fr"><a href="{{ $paginator->nextPageUrl() }}">@lang('pagination.next')</a></span>
            @endif
        </p>
    </div><!--END .page-pagination -->
@endif