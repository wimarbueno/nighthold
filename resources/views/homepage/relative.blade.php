<div class="page-Guide-section position-relative">
    <div class="Divider"></div>
    <div class="Panel Panel--small Panel--alignCenter bordered Panel--stacked Panel--normal" media-wide="hide">
        <div class="Panel-bg" data-background-image="{{ asset('storage/'. Utils::ImagesLogo($item->images_phone)) }}"></div>
        <div class="Panel-area SyncHeight-item">
            <div class="Panel-box">
                <div class="Panel-content">
                    @if($item->sub_title)<h3 class="Panel-subtitle">{{ $item->sub_title }}</h3>@endif
                    <h2 class="Panel-title">{{ $item->title }}</h2>
                    <div class="Content Content--onDark Panel-desc">{{ $item->description }}</div>
                    <div class="Panel-buttons">
                        @if($item->slug)
                            <a class="Link Button Button--ghost Panel-button" href="{{ $item->slug }}" data-analytics="homepage-panel" data-analytics-placement="Recruit A Friend Page">
                                <div class="Button-outer">
                                    <div class="Button-inner">
                                        <div class="Button-label" data-text="{{ $item->slug_text }}">{{ $item->slug_text }}</div>
                                    </div>
                                </div>
                            </a>
                        @endif
                        @if($item->slug_two)
                            <a class="Link Button Button--ghost Panel-button" href="{{ $item->slug_two }}" data-analytics="homepage-panel" data-analytics-placement="Page: Burning Crusade Classic">
                                <div class="Button-outer">
                                    <div class="Button-inner">
                                        <div class="Button-label" data-text="{{ $item->slug_text_two }}">{{ $item->slug_text_two }}</div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($item->left_or_right === 1)
    <div class="Panel bordered hide Panel--normal Panel--stretched Panel--right Panel--alignRight Panel--overflowing" media-wide="!hide" media-huge="!Panel--stretched">
    @else
    <div class="Panel bordered Panel--normal Panel--left Panel--alignLeft Panel--overflowing hide Panel--stretched" media-wide="!hide" media-huge="!Panel--stretched">
    @endif
        <div class="Panel-bg" data-background-image="{{ asset('storage/'. Utils::ImagesLogo($item->images)) }}">
            <div class="Panel-fg"></div>
        </div>
        <div class="Panel-area SyncHeight-item">
            <div class="Panel-box">
                <div class="Panel-content">
                    @if($item->sub_title)<h3 class="Panel-subtitle">{{ $item->sub_title }}</h3>@endif
                    <h2 class="Panel-title">{{ $item->title }}</h2>
                    <div class="Content Content--onDark Panel-desc">{{ $item->description }}</div>
                    <div class="Panel-buttons">
                        @if($item->slug)
                        <a class="Link Button Button--ghost Panel-button" href="{{ $item->slug }}" data-analytics="homepage-panel" data-analytics-placement="Recruit A Friend Page">
                            <div class="Button-outer">
                                <div class="Button-inner">
                                    <div class="Button-label" data-text="{{ $item->slug_text }}">{{ $item->slug_text }}</div>
                                </div>
                            </div>
                        </a>
                        @endif
                        @if($item->slug_two)
                        <a class="Link Button Button--ghost Panel-button" href="{{ $item->slug_two }}" data-analytics="homepage-panel" data-analytics-placement="Page: Burning Crusade Classic">
                            <div class="Button-outer">
                                <div class="Button-inner">
                                    <div class="Button-label" data-text="{{ $item->slug_text_two }}">{{ $item->slug_text_two }}</div>
                                </div>
                            </div>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
