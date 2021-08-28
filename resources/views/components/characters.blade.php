<div class="Dropdown SiteNav-doormat SiteNav-characterDropdown" name="SiteNav-user">
    <div class="SiteNav-doormatContent">
        <div class="Grid Grid--gutters">
            <div class="Grid--full">
                <div class="gutter-tiny gutter-vertical">
                    <div class="SiteNav-sectionTitle font-title-tiny-onDark">@lang('navbar.navbar_40')</div>
                </div>
            </div>
        </div>
        <div class="Grid Grid--gutters SyncHeight">
            @auth
            @empty(!auth()->user()->characters)
                @empty(!auth()->user()->characters)
                    @foreach(auth()->user()->characters as $item)
                        <div class="Grid-1of2 SyncHeight-item" media-small="" media-wide="Grid-1of3" media-huge="Grid-1of4 !hide">
                            <a class="Link Character Character--{{ __('forum.class_key_'.$item->class) }} Character--name Character--avatar Character--level Character--realm Character--onDark" href="{{ route('characters.show', [$item->realmSlug, mb_strtolower($item->name)]) }}">
                                <div class="Character-link">
                                    <div class="Character-table">
                                        <div class="Character-bust">
                                            <div class="Art Art--above">
                                                <div class="Art-size" style="padding-top:50.43478260869565%"></div>
                                                <div class="Art-image" style="background-image:url({{ Utils::imageClass($item->race, $item->gender)}});"></div>
                                                <div class="Art-overlay"></div>
                                            </div>
                                        </div>
                                        <div class="Character-avatar">
                                            <div class="Avatar">
                                                <div class="Avatar-image" style="background-image:url({{ Utils::imageClass($item->race, $item->gender)}});"></div>
                                            </div>
                                        </div>
                                        <div class="Character-details">
                                            <div class="Character-role"></div>
                                            <div class="Character-name">{{ $item->name }}</div>
                                            <div class="Character-level"><b>{{ $item->level }}</b> {{ __('forum.class_'.$item->class) }}</div>
                                            <div class="Character-realm">{{ $item->realmName }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endempty
            @endempty
            @endauth
        </div>
        <div class="List List--vertical List--right">
            @auth
            @can('browse_admin')
            <div class="List-item">
                <a class="SiteNav-pageLink" href="{{ route('voyager.dashboard') }}">@lang('navbar.navbar_43')</a>
            </div>
            @endcan
            @can('gm_ticket')
                <div class="List-item">
                    <a class="SiteNav-pageLink" href="{{ route('gm.index') }}">GM Panel</a>
                </div>
            @endcan
            <div class="List-item">
                <a class="SiteNav-pageLink" href="{{ route('user', ['overview']) }}">@lang('navbar.navbar_33')</a>
            </div>
            @empty(!Auth::user()->characters)
            <div class="List-item">
                <a class="SiteNav-pageLink" href="{{ route('characters.index') }}">@lang('navbar.navbar_41')</a>
            </div>
            @endempty
            @endauth
            <div class="List-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="SiteNav-pageLink" data-analytics="main-nav" data-analytics-placement="Community - Log Out" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">@lang('navbar.navbar_7')</a>
                </form>
            </div>
        </div>
    </div>
</div>
