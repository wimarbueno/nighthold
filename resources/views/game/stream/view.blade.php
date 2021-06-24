<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet" type="text/css"/>
    @endpush
        <div class="page-Book">
            <div class="Pane Pane--bg Pane--underSiteNav" data-url="//bnetcmsus-a.akamaihd.net/cms/template_resource/zj/ZJ3VF83KDI941467235461947.jpg">
                <div class="Pane-bg" style="background-color:#000000;background-image:url(//bnetcmsus-a.akamaihd.net/cms/template_resource/zj/ZJ3VF83KDI941467235461947.jpg);">
                    <div class="Pane-overlay"></div>
                </div>
                <div class="Pane-content">
                    <div class="space-huge"></div>
                    <div class="space-normal"></div>
                    <div class="contain-masthead">
                        <div class="font-semp-xxxLarge-white align-center">{{ $user->title }}</div>
                        <div class="space-normal"></div>
                        <div class="font-size-small fontFamily-semplicita fontWeight-bold color-beige-dark textShadow-small-black align-center">
                            {{ $user->game_name }}, {{ $user->user_name }}
                        </div>
                    </div>
                    <div class="space-huge"></div>
                    <div class="contain-huge">
                        <div class="Grid">
                            <div class="Grid-full" media-wide="!Grid-full Grid-3of5">
                                <div class="space-tiny"></div>
                                <div class="font-size-small color-beige-dark">
                                    <div class="Image">
                                    <div id="twitch-embed"></div>
                                    <script src="https://player.twitch.tv/js/embed/v1.js"></script>
                                    <script type="text/javascript">
                                        new Twitch.Player("twitch-embed", {
                                            channel: "{{ $user->user_login }}",
                                            width: 780,
                                            height: 550,
                                        });
                                    </script>
                                    </div>
                                </div>
                                <div class="space-large"></div>
                            </div>
                            <div class="Grid-full gutter-large" media-wide="!Grid-full Grid-2of5">

                                    <iframe
                                        id="chat_embed"
                                        src="https://www.twitch.tv/embed/{{ $user->user_login }}/chat?parent=nighthold.ru"
                                        height="500"
                                        width="380">
                                    </iframe>

                                <div class="space-large" media-wide="!space-large"></div>
                            </div>
                        </div>
                        <div class="space-medium"></div>
                    </div>
                    <div class="space-small"></div>
                    <div class="space-huge"></div>
                </div>
            </div>
        </div>

    @push('scripts')
        <script src="{{ asset('static/runtime.c86dff083122a451b1af.js') }}"></script>
        <script src="{{ asset('static/vendor.ac7a75610385e9b40211.js') }}"></script>
        <script src="{{ asset('static/3.20dec79f412b658fa525.js') }}"></script>
        <script src="{{ asset('static/legacy-components.24c8e8ac1040f44e6717.js') }}"></script>
    @endpush
</x-app-layout>
