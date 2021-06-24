<x-app-layout>
    @push('css')
        <link href="{{ asset('static/5.60a3b147f091048d9af5.css') }}" rel="stylesheet" type="text/css"/>
    @endpush

        <div class="page-Animation">
            <div class="Pane Pane--underSiteNav" data-url="https://bnetcmsus-a.akamaihd.net/cms/template_resource/CD12CNYD7Q1P1605565002134.jpg">
                <div class="Pane-bg" style="background-image:url(https://bnetcmsus-a.akamaihd.net/cms/template_resource/CD12CNYD7Q1P1605565002134.jpg);">
                    <div class="Pane-overlay"></div>
                </div>
                <div class="Pane-content">
                    <div class="space-huge"></div>
                    <div media-wide="space-large"></div>
                    <div media-huge="space-large"></div>
                    <div class="align-center">
                        <!-- Add a placeholder for the Twitch embed -->
                        <div id="twitch-embed"></div>

                        <!-- Load the Twitch embed script -->
                        <script src="https://player.twitch.tv/js/embed/v1.js"></script>

                        <!-- Create a Twitch.Player object. This will render within the placeholder div -->
                        <script type="text/javascript">
                            new Twitch.Player("twitch-embed", {
                                channel: "cemka"
                            });
                        </script>
                    </div>
                    <div media-large="space-large"></div>
                    <div class="space-huge"></div>
                    <div media-wide="space-large"></div>
                    <div media-huge="space-large"></div>
                </div>
            </div>
            <div class="Divider Divider--lightBrown Divider--borders"></div>
            <div class="Pane" data-url="//bnetcmsus-a.akamaihd.net/cms/template_resource/3RJECJQIC7G41465509851240.jpg">
                <div class="Pane-bg" style="background-image:url(//bnetcmsus-a.akamaihd.net/cms/template_resource/3RJECJQIC7G41465509851240.jpg);">
                    <div class="Pane-overlay"></div>
                </div>
                <div class="Pane-content">
                    <div class="space-medium"></div>
                    <div class="font-semp-large-white gutter-small" media-wide="!gutter-small gutter-normal">
                        Ролик Shadowlands — «За завесой»
                    </div>
                    <div class="space-rhythm-small"></div>
                    <div class="Grid">
                        <div class="Grid-full gutter-small" media-wide="!Grid-full Grid-1of2 !gutter-small gutter-normal">
                            <div class="font-size-small color-beige-medium">
                                <span>В Темных Землях найдется место всем душам — какие-то пройдут по пути перерождения среди шпилей Бастиона, а другие подвергнутся вечным мучениям в глубинах Утробы. Решайте, какой будет ваша судьба.</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-medium"></div>
                    <div class="Grid contain-max SyncHeight SyncHeight--disabled" media-large="!SyncHeight--disabled" media-wide="gutter-small gutter-all"></div>
                    <div class="space-large"></div>
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
