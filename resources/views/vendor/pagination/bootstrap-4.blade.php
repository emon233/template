@if ($paginator->hasPages())
    <div class="row">
        <div class="col-12">
            <div class="float-right">
                <nav>
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">&lsaquo;&lsaquo;</span>
                        </li>
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->url(1) }}" rel="prev"
                                aria-label="@lang('pagination.previous')">&lsaquo;&lsaquo;</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                                aria-label="@lang('pagination.previous')">&lsaquo;</a>
                        </li>
                        @endif

                        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                            <?php
                                $link_limit = 5;
                                $half_total_links = floor($link_limit / 2);
                                $from = $paginator->currentPage() - $half_total_links;
                                $to = $paginator->currentPage() + $half_total_links;

                                if ($paginator->currentPage() < $half_total_links) {
                                    $to += $half_total_links - $paginator->currentPage();
                                }

                                if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                                    $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                                }
                            ?>
                            @if ($from < $i && $i < $to)
                                <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                                    <a href="{{ $paginator->url($i) }}" class="page-link">{{ $i }}</a>
                                </li>
                            @endif
                        @endfor

                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                                aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" rel="next"
                                aria-label="@lang('pagination.next')">&rsaquo;&rsaquo;</a>
                        </li>
                        @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                        </li>
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link" aria-hidden="true">&rsaquo;&rsaquo;</span>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endif
