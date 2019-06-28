@if($paginator->hasPages())
    <div class="pagination col-lg-12 mt-20">
        <ul role="menubar">
            @if(! $paginator->onFirstPage())
                <li role="presentation">
                    <a href="{{ $paginator->previousPageUrl() }}" title="@lang('pagination.prev')"
                       role="button" rel="prev">
						<span>
							<i class="fas fa-angle-double-left"></i>
						</span>
                    </a>
                </li>
            @endif

            @for ($range = links_range($paginator), $page = $range['start']; $page <= $range['end']; ++$page)
                <li {{ ($paginator->currentPage() == $page) ? 'class=active' : '' }} role="presentation">
                    <a title="{{ $page }}" role="button" {!! $paginator->currentPage() != $page ? 'href="'.$paginator->url($page).'"' : '' !!}>
                        <span>
                            {{ $page }}
                        </span>
                    </a>
                </li>
            @endfor

            @if($paginator->hasMorePages())
                <li role="presentation">
                    <a href="{{ $paginator->nextPageUrl() }}" title="@lang('pagination.next')" role="button" rel="next">
						<span>
							<i class="fas fa-angle-double-right"></i>
						</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
@endif