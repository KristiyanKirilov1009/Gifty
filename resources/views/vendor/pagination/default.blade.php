@if ($paginator->hasPages())
    <nav class="ournal-pagination">
        <ul class="pager">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="previous disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a href><span aria-hidden="true">&larr;</span> Newer</a>
                </li>
            @else
                <li class="previous">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><span aria-hidden="true">&larr;</span> Newer</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="next">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Older <span aria-hidden="true">&rarr;</span></a>
                </li>
            @else
                <li class="next disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a href rel="next" aria-label="@lang('pagination.next')">Older <span aria-hidden="true">&rarr;</span></a>
                </li>
            @endif
        </ul>
    </nav>
@endif

<script>
    const disabledLinks = document.querySelectorAll('.journal-pagination .disabled a');

    disabledLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
        });
    });
</script>
