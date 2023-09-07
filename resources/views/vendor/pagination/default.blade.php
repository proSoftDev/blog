@if ($paginator->hasPages())
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-5">
            <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">
                Записи с 1 до 9 из 9 записей
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers">
                <ul class="pagination">
                    @if ($paginator->onFirstPage())
                        <li class="paginate_button page-item previous disabled">
                            <span class="page-link">@lang('Предыдущая')</span>
                        </li>
                    @else
                        <li class="paginate_button page-item previous">
                            <a href="{{ $paginator->previousPageUrl() }}" class="page-link">@lang('Предыдущая')</a>
                        </li>
                    @endif

                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li class="paginate_button page-item">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="paginate_button page-item active">
                                        <span class="page-link">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="paginate_button page-item">
                                        <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                        <li class="paginate_button page-item next">
                            <a href="{{ $paginator->nextPageUrl() }}" class="page-link">@lang('Следующая')</a>
                        </li>
                    @else
                        <li class="paginate_button page-item next disabled">
                            <span class="page-link">@lang('Следующая')</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endif
