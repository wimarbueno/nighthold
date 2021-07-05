@if ($paginator->hasPages())
<div class="block-outer-main">
    <nav class="pageNavWrapper pageNavWrapper--mixed ">

        <div class="pageNav  ">
            @if (!$paginator->onFirstPage())
                <a href="{{ $paginator->previousPageUrl() }}" class="pageNav-jump pageNav-jump--prev">Назад</a>
            @endif

            <ul class="pageNav-main">
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <a class="Pagination-button Pagination-button--ordinal is-active" href="?page={{ $element }}" data-page-number="{{ $element }}"><span class="Button-content">{{ $element }}</span></a>
                        <li class="pageNav-page pageNav-page--current ">
                            <a href="?page={{ $element }}">{{ $element }}</a>
                        </li>
                    @endif
                    @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="pageNav-page pageNav-page--current ">
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @else
                                    <li class="pageNav-page ">
                                        <a href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach

                    @endif
                @endforeach
            </ul>
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="pageNav-jump pageNav-jump--next">Вперёд</a>
            @endif
        </div>

        <div class="pageNavSimple">


            @if (!$paginator->onFirstPage())
                <a href="{{ $paginator->previousPageUrl() }}" class="pageNav-jump pageNav-jump--prev">Назад</a>
            @endif

            <ul class="pageNav-main">
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <a class="Pagination-button Pagination-button--ordinal is-active" href="?page={{ $element }}" data-page-number="{{ $element }}"><span class="Button-content">{{ $element }}</span></a>
                        <li class="pageNav-page pageNav-page--current ">
                            <a href="?page={{ $element }}">{{ $element }}</a>
                        </li>
                    @endif
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="pageNav-page pageNav-page--current ">
                                    <a href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @else
                                <li class="pageNav-page ">
                                    <a href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach

                    @endif
                @endforeach
            </ul>
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="pageNav-jump pageNav-jump--next">Вперёд</a>
            @endif

        </div>

    </nav>
</div>
@endif
