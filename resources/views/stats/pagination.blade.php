@if ($paginator->hasPages())
    <div class="stats-pagination" role="navigation" aria-label="Навігація сторінками статистики">
        <p>Показано {{ $paginator->firstItem() }}–{{ $paginator->lastItem() }} із {{ $paginator->total() }} записів</p>
        @if ($paginator->onFirstPage())
            <span aria-disabled="true">← Назад</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Назад</a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span>{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" aria-label="Сторінка {{ $page }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">Далі →</a>
        @else
            <span aria-disabled="true">Далі →</span>
        @endif
    </div>
@endif
