<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet" type="text/css"/>
    @endpush

        <div class="page-Story">
            <div class="position-relative">
                <div class="Pane Pane--underSiteNav" data-url="//bnetcmsus-a.akamaihd.net/cms/page_media/pd/PDBCM917Y5ZT1461949019886.jpg">
                    <div class="Pane-bg" style="background-image:url(//bnetcmsus-a.akamaihd.net/cms/page_media/pd/PDBCM917Y5ZT1461949019886.jpg);">
                        <div class="Pane-overlay"></div>
                    </div>
                    <div class="Pane-content">
                        <div class="space-medium"></div>
                        <div class="Grid SyncHeight SyncHeight--disabled gutter-small gutter-all gutter-negative" media-large="!SyncHeight--disabled">
                            <div class="space-medium"></div>
                            <div class="space-medium"></div>
                            <div class="space-medium" media-wide="!space-medium"></div>
                            <div class="space-medium" media-wide="!space-medium"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="Divider Divider--lightBrown Divider--borders" media-wide="hide"></div>
            <div class="Pane" data-url="//bnetcmsus-a.akamaihd.net/cms/template_resource/JPKVVF0I2ZBB1461617074269.jpg">
                <div class="Pane-bg" style="background-image:url(//bnetcmsus-a.akamaihd.net/cms/template_resource/JPKVVF0I2ZBB1461617074269.jpg);">
                    <div class="Pane-overlay"></div>
                </div>
                <div class="Pane-content">
                    <div class="Tab Tab--save Tab--default" name="all" data-group="story">
                        <div class="space-normal" media-wide="space-medium"></div>
                        <div class="Grid SyncHeight SyncHeight--disabled gutter-small gutter-all gutter-negative" media-large="!SyncHeight--disabled">
                            @foreach($stream as $item)
                            <div class="Grid-full" media-large="Grid-1of2" media-wide="Grid-1of3" media-huge="Grid-1of4">
                                <div class="ArticleTile ArticleTile--stacked ArticleTile--gutter">
                                    <div class="ArticleTile-content">
                                        <div class="Tile ArticleTile-tile">
                                            <div class="Tile-area">
                                                <div class="Tile-bg" style="background-image:url({{ $item->profile_image_url }});"></div>
                                                <div class="Tile-content"></div>
                                            </div>
                                        </div>
                                        <div class="ArticleTile-fade"></div>
                                        <div class="ArticleTile-play">
                                            <div class="ArticleTile-playArrow"></div>
                                        </div>
                                        <div class="ArticleTile-bottom SyncHeight-item" data-syncheight-multiplier="1">
                                            <div class="ArticleTile-bottomInner">
                                                <div class="ArticleTile-left">
                                                    <div class="ArticleTile-subtitle">{{ $item->display_name }}</div>
                                                    <div class="ArticleTile-title">{{ $item->view_count }} Просмотров</div>
                                                </div>
                                                <div class="ArticleTile-right"></div>
                                            </div>
                                        </div>
                                        <a class="Link ArticleTile-link" href="{{ route('stream.view', [$item->name]) }}" data-thumb="{}"></a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="space-huge"></div></div>
            </div>
        </div>

    @push('scripts')
        <script src="{{ asset('static/runtime.c86dff083122a451b1af.js') }}"></script>
        <script src="{{ asset('static/vendor.ac7a75610385e9b40211.js') }}"></script>
        <script src="{{ asset('static/3.20dec79f412b658fa525.js') }}"></script>
        <script src="{{ asset('static/legacy-components.24c8e8ac1040f44e6717.js') }}"></script>
    @endpush
</x-app-layout>
