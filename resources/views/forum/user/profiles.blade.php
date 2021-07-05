<ul class="tabPanes">
<li class="is-active" role="tabpanel" id="_xfUid-accountMenu-1625491862" aria-expanded="true">
    <div class="menu-row menu-row--alt">
        <div class="contentRow contentRow--alignMiddle">
            <div class="contentRow-figure">
        <span class="avatarWrapper">
            <span class="avatar avatar--s" data-user-id="1" title="Thanos">
                <img src="{{ asset('/storage/' . auth()->user()->avatar) }}" srcset="{{ asset('/storage/' . auth()->user()->avatar) }} 2x" alt="{{ auth()->user()->name }}" class="avatar-u1-s" width="48" height="48" loading="lazy">
            </span>
                <a class="avatarWrapper-update" href="#" data-xf-click="overlay"><span>Изменить</span></a>
        </span>
            </div>
            <div class="contentRow-main">
                <h3 class="contentRow-header"><a href="#" class="username " dir="auto" itemprop="name" data-user-id="1"><span class="username--staff username--moderator username--admin">{{ auth()->user()->name }}</span></a></h3>
                <div class="contentRow-lesser">
                    <span class="userTitle" dir="auto">{{ auth()->user()->role->display_name }}</span>
                </div>
            </div>
        </div>
        <div class="contentRow-minor">

            <dl class="pairs pairs--justified fauxBlockLink">

                <dt>Сообщения</dt>

                <dd>
                    <a href="#" class="fauxBlockLink-linkRow u-concealed">
                        0
                    </a>
                </dd>
            </dl>

            <dl class="pairs pairs--justified fauxBlockLink">

                <dt>Реакции</dt>

                <dd>
                    <a href="#" class="fauxBlockLink-linkRow u-concealed">
                        0
                    </a>
                </dd>
            </dl>

            <dl class="pairs pairs--justified fauxBlockLink">
                <dt>Баллы</dt>
                <dd>
                    <a href="#" data-xf-click="overlay" class="fauxBlockLink-linkRow u-concealed">0</a>
                </dd>
            </dl>
        </div>
    </div>
    <hr class="menu-separator menu-separator--hard">

    <ul class="listPlain listColumns listColumns--narrow listColumns--together">
        <li><a href="#" class="menu-linkRow">Лента новостей</a></li>
        <li><a href="#" class="menu-linkRow">Ваш контент</a></li>
        <li><a href="#" class="menu-linkRow">Полученные реакции</a></li>
    </ul>

    <hr class="menu-separator">

    <ul class="listPlain listColumns listColumns--narrow listColumns--together">
        <li><a href="#" class="menu-linkRow">Информация</a></li>
        <li><a href="#" class="menu-linkRow">Настройки</a></li>
    </ul>

    <hr class="menu-separator">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{ route('logout') }}" class="menu-linkRow" onclick="event.preventDefault(); this.closest('form').submit();">@lang('navbar.navbar_7')</a>
    </form>
</li>
</ul>
