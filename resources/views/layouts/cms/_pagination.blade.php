{{ $paginator->firstItem() }}-{{ $paginator->lastItem() }}/{{ $paginator->total() }}
<div class="btn-group">
    <a class="btn btn-default btn-sm {{ $paginator->currentPage() == 1 ? 'disabled' : '' }}"
       href="{{ $paginator->url('1') }}">
        <i class="fa fa-angle-double-left"></i>
    </a>
    <a class="btn btn-default btn-sm {{ $paginator->currentPage() == 1 ? 'disabled' : '' }}"
       href="{{ $paginator->previousPageUrl() }}">
        <i class="fa fa-angle-left"></i>
    </a>
    <a class="btn btn-default btn-sm {{ $paginator->currentPage() == $paginator->lastPage() ? 'disabled' : '' }}"
       href="{{ $paginator->nextPageUrl() }}">
        <i class="fa fa-angle-right"></i>
    </a>
    <a class="btn btn-default btn-sm {{ $paginator->currentPage() == $paginator->lastPage() ? 'disabled' : '' }}"
       href="{{ $paginator->url($paginator->lastPage()) }}">
        <i class="fa fa-angle-double-right"></i>
    </a>
</div>
<!-- /.btn-group -->
