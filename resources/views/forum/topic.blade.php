@section('title'){{ $thread->title }} - @endsection

@section('og')
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('forum.show', [$thread->id])}}" />
    <meta property="og:title" content="{{ $thread->title }} - {{ config('app.name_forum') }}" />
    <meta property="og:image" content="{{ asset('/forums/static/images/social-thumbs/wow.png') }}" />
    <meta property="og:description" content="{{ $thread->body }}" />
@endsection

@section('sidebar')
    <div class="breadcrumb block ">
        <div class="pageContent">
            <ul class="p-breadcrumbs " itemscope="" itemtype="https://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="{{ route('index') }}" itemprop="item">

                        <i class="fa--xf far fa-home" aria-hidden="true"></i>
                        <span style="display: none;" itemprop="name">Главная</span>

                    </a>
                    <meta itemprop="position" content="1">
                </li>
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="{{ route('forums.index') }}" itemprop="item">

                        <span itemprop="name">@lang('navbar.Navbar-forums')</span>

                    </a>
                    <meta itemprop="position" content="2">
                </li>
                @foreach ($sidebar as $category)
                    <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                        <a href="{{ route('forum.show', [$category->id])}}" itemprop="item">

                            <span itemprop="name">{{ $category->name }}</span>

                        </a>
                        <meta itemprop="position" content="3">
                    </li>
                    @if($category->categories)
                        @foreach ($category->categories as $childCategory)

                            @include('forum.child_category', ['category' => $childCategory])
                        @endforeach
                    @endif
                @endforeach
                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                    <a href="{{ route('topic.show', [$thread->id])}}" itemprop="item">

                        <span itemprop="name">{{ $thread->title }}</span>

                    </a>
                    <meta itemprop="position" content="2">
                </li>
            </ul>
        </div>
    </div>
@endsection

<x-forum-layout>

@push('stylesheet')
    <link rel="stylesheet" href="{{ asset('forum_test/css/cat.css') }}" />
    <link rel="stylesheet" href="{{ asset('forum_test/css/cat_style.css') }}" />
@endpush

@push('header')
<div class="p-body-header">
    <div class="pageContent">
        <div class="uix_headerInner">
            <div class="p-title ">
                <h1 class="p-title-value">{{ $thread->title }}</h1>
            </div>
            <div class="p-description">
                <ul class="listInline listInline--bullet">
                    <li>
                        <i class="fa--xf far fa-user" aria-hidden="true" title="Автор темы"></i>
                        <span class="u-srOnly">Автор темы</span>

                        <a href="#" class="username  u-concealed" dir="auto" itemprop="name" data-user-id="{{ $thread->creator->id }}" data-xf-init="member-tooltip" id="js-XFUniqueId{{ $thread->creator->id }}">
                            <span class="username--staff username--moderator username--admin">
                                {{ Str::Title($thread->creator->name) }}
                            </span>
                        </a>
                    </li>
                    <li>
                        <i class="fa--xf far fa-clock" aria-hidden="true" title="Дата начала"></i>
                        <span class="u-srOnly">Дата начала</span>
                        <a href="{{ route('topic.show', [$thread->id])}}" class="u-concealed">
                            <time class="u-dt" dir="auto" datetime="{{ $thread->created_at }}">{{ $thread->created_at->diffForHumans() }}</time>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="uix_headerInner--opposite">
            <div class="p-title-pageAction">
                <a href="{{ route('topic.show', [$thread->id])}}/reply" class="button--cta uix_quickReply--button button button--icon button--icon--write rippleButton"><span class="button-text">Ответ</span></a>
            </div>
        </div>
    </div>
</div>
@endpush

<div class="p-body-main  ">
<div uix_component="MainContent" class="p-body-content">
    <div class="p-body-pageContent">
        <div class="block block--messages" data-xf-init="inline-mod" data-type="post" data-href="/index.php?inline-mod/" data-search-target="*">
            <span class="u-anchorTarget" id="posts"></span>
            <div class="block-outer"><div class="block-outer-opposite">
                <div class="buttonGroup">
                    <button type="button" class="button--link js-inlineModTrigger button rippleButton" data-xf-init="tooltip" data-original-title="Количество элементов выделенных для модерации" id="js-XFUniqueId2">
                        <span class="button-text">
                            <span class="inlineModButton">
                                <i aria-hidden="true"></i>
                                <span class="inlineModButton-label">Модерация</span>
                                <span class="inlineModButton-count js-inlineModCounter">0</span>
                            </span>
                        </span>
                    </button>
                     <a href="#/watch" class="button--link button rippleButton" data-xf-click="switch-overlay" data-sk-watch="Отслеживать" data-sk-unwatch="Перестать отслеживать">
                         <span class="button-text">
                                Перестать отслеживать
                        </span>
                    </a>
                    <div class="buttonGroup-buttonWrapper">
                                    <button type="button" class="button--link menuTrigger button rippleButton" data-xf-click="menu" aria-expanded="false" aria-haspopup="true" title="Дополнительные параметры"><span class="button-text">•••</span></button>
                                    <div class="menu" data-menu="menu" aria-hidden="true">
                                        <div class="menu-content">
                                            <h4 class="menu-header">Дополнительные параметры</h4>



                                            <a href="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/edit" data-xf-click="overlay" class="menu-linkRow">Редактировать тему</a>


                                            <a href="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/change-type" data-xf-click="overlay" class="menu-linkRow">Изменить тип темы</a>


                                            <a href="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/quick-close" class="menu-linkRow" data-xf-click="switch" data-menu-closer="true">


                                                Закрыть тему

                                            </a>


                                            <a href="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/quick-stick" class="menu-linkRow" data-xf-click="switch" data-menu-closer="true">


                                                Открепить тему

                                            </a>


                                            <a href="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/poll/create" data-xf-click="overlay" class="menu-linkRow">Создать опрос</a>


                                            <a href="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/delete" data-xf-click="overlay" class="menu-linkRow">Удалить тему</a>


                                            <a href="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/move" data-xf-click="overlay" class="menu-linkRow">Переместить тему</a>


                                            <a href="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/reply-bans" data-xf-click="overlay" class="menu-linkRow">Управление блокировкой ответов</a>


                                            <a href="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/moderator-actions" data-xf-click="overlay" class="menu-linkRow">Действия модераторов</a>



                                            <div class="menu-footer" data-xf-init="inline-mod" data-type="thread" data-href="/index.php?inline-mod/" data-toggle=".js-threadInlineModToggle">

                                                <ul class="inputChoices">
                                                    <li class="inputChoices-choice"><label class="iconic"><input type="checkbox" value="1" class="js-threadInlineModToggle"><i aria-hidden="true"></i><span class="iconic-label">Выбрать для модерации</span></label></li>

                                                </ul>

                                            </div>



                                        </div>
                                    </div>
                                </div>
                </div>
            </div>
        </div>
    <div class="block-outer js-threadStatusField"></div>
    <div class="block-container lbContainer" data-xf-init="lightbox select-to-quote" data-message-selector=".js-post" data-lb-id="thread-{{ $thread->id }}" data-lb-universal="0">
        <div class="block-body js-replyNewMessageContainer">
            <article class="message message--post js-post js-inlineModContainer" data-author="{{ $thread->creator->name }}" data-content="post-{{ $thread->id }}" id="js-post-{{ $thread->id }}">

                <span class="u-anchorTarget" id="post-{{ $thread->id }}"></span>


                <div class="message-inner">

                    <div class="message-cell message-cell--user">


                        <section itemscope="" class="message-user userExtra--expand">
                            <div class="message-avatar message-avatar--online">
                                <div class="message-avatar-wrapper">

                                    <a href="#" class="avatar avatar--l" data-user-id="1" data-xf-init="member-tooltip" id="js-XFUniqueId5">
                                        <img src="{{ asset('/storage/' . $thread->creator->avatar) }}" srcset="{{ asset('/storage/'.$thread->creator->avatar) }} 2x" alt="{{ $thread->creator->name }}" class="avatar-u1-s" width="48" height="48" loading="lazy" itemprop="image">
                                    </a>


                                    <span class="message-avatar-online" tabindex="0" data-xf-init="tooltip" data-trigger="auto" data-original-title="Сейчас онлайн" id="js-XFUniqueId4"></span>

                                </div>
                            </div>
                            <div class="uix_messagePostBitWrapper">
                                <div class="message-userDetails">
                                    <h4 class="message-name">
                                        <a href="#" class="username " dir="auto" itemprop="name" data-user-id="{{ $thread->creator->id }}" data-xf-init="member-tooltip" id="js-XFUniqueId5"><span class="username--staff username--moderator username--admin">{{ $thread->creator->name }}</span>
                                        </a>
                                    </h4>
                                    <h5 class="userTitle message-userTitle" dir="auto" itemprop="jobTitle">
                                        {{ $thread->creator->role->display_name }}
                                    </h5>

                                    <div class="uix_originalPoster__icon" data-xf-init="tooltip" data-original-title="th_original_poster" id="js-XFUniqueId6">
                                        <i class="fa--xf far fa-user-edit mdi mdi-account-edit" aria-hidden="true"></i>
                                    </div>


                                    <div class="userBanner userBanner--staff message-userBanner" dir="auto" itemprop="jobTitle"><span class="userBanner-before"></span><strong>Команда форума</strong><span class="userBanner-after"></span></div>

                                </div>





                                <div class="thThreads__message-userExtras" style="">

                                    <div class="message-userExtras">


                                        <dl class="pairs pairs--justified">

                                            <dt>
                                <span data-xf-init="tooltip" data-original-title="Регистрация" id="js-XFUniqueId7">
                                    <i class="fa--xf far fa-user" aria-hidden="true"></i>
                                </span>
                                            </dt>

                                            <dd>{{ $thread->creator->created_at->format('d.m.Y') }}</dd>
                                        </dl>


                                        <dl class="pairs pairs--justified">

                                            <dt>
                                <span data-xf-init="tooltip" data-original-title="Сообщения" id="js-XFUniqueId8">
                                    <i class="fa--xf far fa-comments" aria-hidden="true"></i>
                                </span>
                                            </dt>

                                            <dd> {{ $thread->creator->posts_count }}</dd>
                                        </dl>



                                        <dl class="pairs pairs--justified">

                                            <dt>
                                                <span data-xf-init="tooltip" data-original-title="Реакции" id="js-XFUniqueId9">
                                                    <i class="fa--xf far fa-thumbs-up" aria-hidden="true"></i>
                                                </span>
                                            </dt>

                                            <dd>0</dd>
                                        </dl>


                                        <dl class="pairs pairs--justified">

                                            <dt>
                                                <span data-xf-init="tooltip" data-original-title="Баллы" id="js-XFUniqueId10">
                                                    <i class="fa--xf far fa-trophy" aria-hidden="true"></i>
                                                </span>
                                            </dt>
                                            <dd>1</dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="thThreads__userExtra--toggle">
                                    <span class="thThreads__userExtra--trigger" data-xf-click="ththreads-userextra-trigger"></span>
                                </div>
                            </div>
                            <span class="message-userArrow"></span>
                        </section>
                    </div>
                    <div class="message-cell message-cell--main">
                        <div class="message-main uix_messageContent js-quickEditTarget">
                            <header class="message-attribution message-attribution--split">
                                <ul class="message-attribution-main listInline ">

                                    <li class="u-concealed">
                                        <a href="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/post-1" rel="nofollow">
                                            <time class="u-dt" dir="auto" datetime="2021-07-05T08:59:57+0100" data-time="1625471997" data-date-string="05.07.2021" data-time-string="08:59" title="05.07.2021 в 08:59" itemprop="datePublished">Сегодня в 08:59</time>
                                        </a>
                                    </li>


                                </ul>

                                <ul class="message-attribution-opposite message-attribution-opposite--list ">

                                    <li>
                                        <a href="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/post-1" class="message-attribution-gadget" data-xf-init="share-tooltip" data-href="/index.php?posts/1/share" data-web-share="on" rel="nofollow" id="js-XFUniqueId11">
                                            <i class="fa--xf far fa-share-alt" aria-hidden="true"></i>
                                        </a>
                                    </li>

                                    <li>




                                        <a href="/index.php?posts/1/bookmark" class="bookmarkLink message-attribution-gadget bookmarkLink--highlightable " title="Закладка" data-xf-click="bookmark-click" data-label=".js-bookmarkText" data-sk-bookmarked="addClass:is-bookmarked, Редактировать закладку" data-sk-bookmarkremoved="removeClass:is-bookmarked, Добавить закладку"><span class="js-bookmarkText u-srOnly">Добавить закладку</span></a>



                                    </li>


                                    <li>
                                        <a href="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/post-1" rel="nofollow">
                                            #1
                                        </a>
                                    </li>

                                </ul>
                            </header>
                            <div class="message-content js-messageContent">
                                <div class="message-userContent lbContainer js-lbContainer " data-lb-id="post-1" data-lb-caption-desc="Thanos · 05.07.2021 в 08:59">
                                    <article class="message-body js-selectToQuote">


                                        <div class="bbWrapper">{!! $thread->body !!}</div>

                                        <div class="js-selectToQuoteEnd">&nbsp;</div>

                                    </article>
                                </div>
                            </div>

                            <div class="reactionsBar js-reactionsList "></div>
                            <footer class="message-footer">
                                <div class="message-actionBar actionBar">
                                    <div class="actionBar-set actionBar-set--external">
                                        <a href="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/reply&amp;quote=1" class="actionBar-action actionBar-action--reply" title="Ответить, цитируя это сообщение" data-xf-click="quote" data-quote-href="/index.php?posts/1/quote">Ответ</a>
                                    </div>
                                    <div class="actionBar-set actionBar-set--internal">
                                        <span class="actionBar-action actionBar-action--inlineMod">
                                        <label class="iconic iconic--hiddenLabel" data-xf-init="tooltip" data-original-title="Выбрать для модерации" id="js-XFUniqueId12"><input type="checkbox" value="1" class="js-inlineModToggle"><i aria-hidden="true"></i><span class="iconic-label"><span class="u-srOnly">Выбрать для модерации</span></span></label></span>

                                        <a href="/index.php?posts/1/report" class="actionBar-action actionBar-action--report" data-xf-click="overlay">Жалоба</a>
                                        <a href="/index.php?posts/1/edit" class="actionBar-action actionBar-action--edit actionBar-action--menuItem" data-xf-click="quick-edit" data-editor-target="#js-post-1 .js-quickEditTarget" data-menu-closer="true">Изменить</a>
                                        <a href="/index.php?posts/1/delete" class="actionBar-action actionBar-action--delete actionBar-action--menuItem" data-xf-click="overlay">Удалить</a>
                                        <a href="/index.php?posts/1/ip" class="actionBar-action actionBar-action--ip actionBar-action--menuItem" data-xf-click="overlay">IP</a>
                                        <a class="actionBar-action actionBar-action--menuTrigger" data-xf-click="menu" title="Дополнительные параметры" role="button" tabindex="0" aria-expanded="false" aria-haspopup="true">•••</a>

                                        <div class="menu" data-menu="menu" aria-hidden="true" data-menu-builder="actionBar">
                                            <div class="menu-content">
                                                <h4 class="menu-header">Дополнительные параметры</h4>
                                                <div class="js-menuBuilderTarget"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="js-historyTarget message-historyTarget toggleTarget" data-href="trigger-href"></div>
                            </footer>
                        </div>
                    </div>
                </div>
            </article>
            @foreach ($topics as $reply)
                <article class="message message--post js-post js-inlineModContainer" data-author="{{ $reply->creator->name }}" data-content="post-{{ $reply->id }}" id="js-post-{{ $reply->id }}">
                    <span class="u-anchorTarget" id="post-{{ $reply->id }}"></span>
                    <div class="message-inner">
                        <div class="message-cell message-cell--user">
                            <section class="message-user userExtra--expand">
                                <div class="message-avatar message-avatar--online">
                                    <div class="message-avatar-wrapper">

                                        <a href="#" class="avatar avatar--xs" data-user-id="1" data-xf-init="member-tooltip" id="js-XFUniqueId5">
                                            <img src="{{ asset('/storage/' . $reply->creator->avatar) }}" srcset="{{ asset('/storage/'.$reply->creator->avatar) }} 2x" alt="{{ $reply->creator->name }}" class="avatar-u1-s" width="48" height="48" loading="lazy" itemprop="image">
                                        </a>


                                        <span class="message-avatar-online" tabindex="0" data-xf-init="tooltip" data-trigger="auto" data-original-title="Сейчас онлайн" id="js-XFUniqueId4"></span>

                                    </div>
                                </div>
                                <div class="uix_messagePostBitWrapper">
                                    <div class="message-userDetails">
                                        <h4 class="message-name">
                                            <a href="#" class="username " dir="auto" itemprop="name" data-user-id="{{ $reply->creator->id }}" data-xf-init="member-tooltip" id="js-XFUniqueId5"><span class="username--staff username--moderator username--admin">{{ $reply->creator->name }}</span>
                                            </a>
                                        </h4>
                                        <h5 class="userTitle message-userTitle" dir="auto" itemprop="jobTitle">
                                            {{ $reply->creator->role->display_name }}
                                        </h5>

                                        <div class="uix_originalPoster__icon" data-xf-init="tooltip" data-original-title="th_original_poster" id="js-XFUniqueId6">
                                            <i class="fa--xf far fa-user-edit mdi mdi-account-edit" aria-hidden="true"></i>
                                        </div>


                                        <div class="userBanner userBanner--staff message-userBanner" dir="auto" itemprop="jobTitle"><span class="userBanner-before"></span><strong>Команда форума</strong><span class="userBanner-after"></span></div>

                                    </div>





                                    <div class="thThreads__message-userExtras" style="">

                                        <div class="message-userExtras">


                                            <dl class="pairs pairs--justified">

                                                <dt>
                                <span data-xf-init="tooltip" data-original-title="Регистрация" id="js-XFUniqueId7">
                                    <i class="fa--xf far fa-user" aria-hidden="true"></i>
                                </span>
                                                </dt>

                                                <dd>{{ $reply->creator->created_at->format('d.m.Y') }}</dd>
                                            </dl>


                                            <dl class="pairs pairs--justified">

                                                <dt>
                                <span data-xf-init="tooltip" data-original-title="Сообщения" id="js-XFUniqueId8">
                                    <i class="fa--xf far fa-comments" aria-hidden="true"></i>
                                </span>
                                                </dt>

                                                <dd> {{ $reply->creator->posts_count }}</dd>
                                            </dl>



                                            <dl class="pairs pairs--justified">

                                                <dt>
                                                <span data-xf-init="tooltip" data-original-title="Реакции" id="js-XFUniqueId9">
                                                    <i class="fa--xf far fa-thumbs-up" aria-hidden="true"></i>
                                                </span>
                                                </dt>

                                                <dd>0</dd>
                                            </dl>


                                            <dl class="pairs pairs--justified">

                                                <dt>
                                                <span data-xf-init="tooltip" data-original-title="Баллы" id="js-XFUniqueId10">
                                                    <i class="fa--xf far fa-trophy" aria-hidden="true"></i>
                                                </span>
                                                </dt>
                                                <dd>1</dd>
                                            </dl>
                                        </div>
                                    </div>
                                    <div class="thThreads__userExtra--toggle">
                                        <span class="thThreads__userExtra--trigger" data-xf-click="ththreads-userextra-trigger"></span>
                                    </div>
                                </div>
                                <span class="message-userArrow"></span>
                            </section>
                        </div>
                        <div class="message-cell message-cell--main">
                            <div class="message-main uix_messageContent js-quickEditTarget">
                                <header class="message-attribution message-attribution--split">
                                    <ul class="message-attribution-main listInline ">

                                        <li class="u-concealed">
                                            <a href="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/post-1" rel="nofollow">
                                                <time class="u-dt" dir="auto" datetime="2021-07-05T08:59:57+0100" data-time="1625471997" data-date-string="05.07.2021" data-time-string="08:59" title="05.07.2021 в 08:59" itemprop="datePublished">Сегодня в 08:59</time>
                                            </a>
                                        </li>


                                    </ul>

                                    <ul class="message-attribution-opposite message-attribution-opposite--list ">

                                        <li>
                                            <a href="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/post-1" class="message-attribution-gadget" data-xf-init="share-tooltip" data-href="/index.php?posts/1/share" data-web-share="on" rel="nofollow" id="js-XFUniqueId11">
                                                <i class="fa--xf far fa-share-alt" aria-hidden="true"></i>
                                            </a>
                                        </li>

                                        <li>




                                            <a href="/index.php?posts/1/bookmark" class="bookmarkLink message-attribution-gadget bookmarkLink--highlightable " title="Закладка" data-xf-click="bookmark-click" data-label=".js-bookmarkText" data-sk-bookmarked="addClass:is-bookmarked, Редактировать закладку" data-sk-bookmarkremoved="removeClass:is-bookmarked, Добавить закладку"><span class="js-bookmarkText u-srOnly">Добавить закладку</span></a>



                                        </li>


                                        <li>
                                            <a href="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/post-1" rel="nofollow">
                                                #1
                                            </a>
                                        </li>

                                    </ul>
                                </header>
                                <div class="message-content js-messageContent">
                                    <div class="message-userContent lbContainer js-lbContainer " data-lb-id="post-1" data-lb-caption-desc="Thanos · 05.07.2021 в 08:59">
                                        <article class="message-body js-selectToQuote">


                                            <div class="bbWrapper">{!! $reply->body !!}</div>

                                            <div class="js-selectToQuoteEnd">&nbsp;</div>

                                        </article>
                                    </div>
                                </div>

                                <div class="reactionsBar js-reactionsList "></div>
                                <footer class="message-footer">
                                    <div class="message-actionBar actionBar">
                                        <div class="actionBar-set actionBar-set--external">
                                            <a href="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/reply&amp;quote=1" class="actionBar-action actionBar-action--reply" title="Ответить, цитируя это сообщение" data-xf-click="quote" data-quote-href="/index.php?posts/1/quote">Ответ</a>
                                        </div>
                                        <div class="actionBar-set actionBar-set--internal">
                                        <span class="actionBar-action actionBar-action--inlineMod">
                                        <label class="iconic iconic--hiddenLabel" data-xf-init="tooltip" data-original-title="Выбрать для модерации" id="js-XFUniqueId12"><input type="checkbox" value="1" class="js-inlineModToggle"><i aria-hidden="true"></i><span class="iconic-label"><span class="u-srOnly">Выбрать для модерации</span></span></label></span>

                                            <a href="/index.php?posts/1/report" class="actionBar-action actionBar-action--report" data-xf-click="overlay">Жалоба</a>
                                            <a href="/index.php?posts/1/edit" class="actionBar-action actionBar-action--edit actionBar-action--menuItem" data-xf-click="quick-edit" data-editor-target="#js-post-1 .js-quickEditTarget" data-menu-closer="true">Изменить</a>
                                            <a href="/index.php?posts/1/delete" class="actionBar-action actionBar-action--delete actionBar-action--menuItem" data-xf-click="overlay">Удалить</a>
                                            <a href="/index.php?posts/1/ip" class="actionBar-action actionBar-action--ip actionBar-action--menuItem" data-xf-click="overlay">IP</a>
                                            <a class="actionBar-action actionBar-action--menuTrigger" data-xf-click="menu" title="Дополнительные параметры" role="button" tabindex="0" aria-expanded="false" aria-haspopup="true">•••</a>

                                            <div class="menu" data-menu="menu" aria-hidden="true" data-menu-builder="actionBar">
                                                <div class="menu-content">
                                                    <h4 class="menu-header">Дополнительные параметры</h4>
                                                    <div class="js-menuBuilderTarget"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="js-historyTarget message-historyTarget toggleTarget" data-href="trigger-href"></div>
                                </footer>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
    <div class="block-outer block-outer--after">
        {{ $topics->links('forum.paginate.post') }}
        <div class="block-outer-opposite">
            <a href="javascript:" class="showIgnoredLink is-hidden js-showIgnored" data-xf-init="tooltip" data-original-title="Показать скрытый контент" id="js-XFUniqueId13">Показать игнорируемый контент</a>
        </div>
    </div>
</div>
        <form action="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/add-reply" method="post" class="block js-quickReply" data-xf-init="attachment-manager quick-reply ajax-submit draft" data-draft-url="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/draft" data-draft-autosave="60" data-message-container="div[data-type='post'] .js-replyNewMessageContainer">




            <div class="block-container">
                <div class="block-body">





                    <div class="message message--quickReply block-topRadiusContent block-bottomRadiusContent">
                        <div class="message-inner">
                            <div class="message-cell message-cell--user">
                                <div class="message-user ">
                                    <div class="message-avatar">
                                        <div class="message-avatar-wrapper">


                                            <a href="/index.php?members/thanos.1/" class="avatar avatar--s avatar--default avatar--default--dynamic" data-user-id="1" data-xf-init="member-tooltip" style="background-color: #a32985; color: #e699d2" id="js-XFUniqueId14">
                                                <span class="avatar-u1-s">T</span>
                                            </a>

                                        </div>
                                    </div>
                                    <span class="message-userArrow"></span>
                                </div>
                            </div>
                            <div class="message-cell message-cell--main">
                                <div class="message-editorWrapper">
                                    <script class="js-editorToolbars" type="application/json">{"toolbarButtons":{"moreText":{"buttons":["clearFormatting","bold","italic","fontSize","textColor","fontFamily","strikeThrough","underline","xfInlineCode","xfInlineSpoiler"],"buttonsVisible":"5","align":"left"},"moreParagraph":{"buttons":["xfList","align","paragraphFormat"],"buttonsVisible":"3","align":"left"},"moreRich":{"buttons":["insertLink","insertImage","xfSmilie","xfMedia","xfQuote","insertTable","insertHR","insertVideo","xfSpoiler","xfCode"],"buttonsVisible":"6","align":"left"},"moreMisc":{"buttons":["undo","redo","xfBbCode","xfDraft"],"buttonsVisible":"4","align":"right"}},"toolbarButtonsMD":{"moreText":{"buttons":["bold","italic","fontSize","textColor","fontFamily","strikeThrough","underline","xfInlineCode","xfInlineSpoiler"],"buttonsVisible":"3","align":"left"},"moreParagraph":{"buttons":["xfList","align","paragraphFormat"],"buttonsVisible":"3","align":"left"},"moreRich":{"buttons":["insertLink","insertImage","xfSmilie","insertVideo","xfMedia","xfQuote","insertTable","insertHR","xfSpoiler","xfCode"],"buttonsVisible":"2","align":"left"},"moreMisc":{"buttons":["undo","redo","clearFormatting","xfBbCode","xfDraft"],"buttonsVisible":"1","align":"right"}},"toolbarButtonsSM":{"moreText":{"buttons":["bold","italic","fontSize","textColor","fontFamily","strikeThrough","underline","xfInlineCode","xfInlineSpoiler"],"buttonsVisible":"2","align":"left"},"moreParagraph":{"buttons":["xfList","align","paragraphFormat"],"buttonsVisible":"1","align":"left"},"moreRich":{"buttons":["insertLink","insertImage","xfSmilie","xfQuote","insertVideo","xfMedia","insertTable","insertHR","xfSpoiler","xfCode"],"buttonsVisible":"3","align":"left"},"moreMisc":{"buttons":["undo","redo","xfBbCode","clearFormatting","xfDraft"],"buttonsVisible":"1","align":"right"}},"toolbarButtonsXS":{"moreText":{"buttons":["bold","italic","fontSize","textColor","fontFamily","xfList","align","paragraphFormat","strikeThrough","underline","xfInlineSpoiler","xfInlineCode"],"buttonsVisible":"2","align":"left"},"moreParagraph":{"buttons":[],"buttonsVisible":"0","align":"left"},"moreRich":{"buttons":["insertLink","insertImage","xfSmilie","xfQuote","insertVideo","xfMedia","insertTable","insertHR","xfSpoiler","xfCode"],"buttonsVisible":"2","align":"left"},"moreMisc":{"buttons":["undo","redo","xfBbCode","clearFormatting","xfDraft"],"buttonsVisible":"1","align":"right"}}}
</script>
                                    <script class="js-editorToolbarSizes" type="application/json">{"SM":420,"MD":575,"LG":900}
</script>
                                    <script class="js-editorDropdowns" type="application/json">{"xfList":{"cmd":"xfList","icon":"fa-list","buttons":["formatOL","formatUL","indent","outdent"],"title":"List"}}
</script>
                                    <script class="js-editorLanguage" type="application/json">
{
"Align Center": "По центру",
"Align Left": "По левому краю",
"Align Right": "По правому краю",
"Align Justify": "Выравнивание текста",
"Align": "Выравнивание",
"Alignment": "Выравнивание",
"Back": "Назад",
"Bold": "Полужирный",
"By URL": "По URL",
"Clear Formatting": "Удалить форматирование",
"Code": "Код",
"Text Color": "Цвет текста",
"Decrease Indent": "Уменьшить отступ",
"Delete Draft": "Удалить черновик",
"Drafts": "Черновики",
"Drop image": "Перетащите изображение",
"Drop video": "Перетащите видео",
"Edit Link": "Редактировать ссылку",
"Font Family": "Шрифт",
"Font Size": "Размер шрифта",
"Normal": "Обычный",
"Heading 1": "Заголовок 1",
"Heading 2": "Заголовок 2",
"Heading 3": "Заголовок 3",
"Increase Indent": "Увеличить отступ",
"Inline Code": "Однострочный код",
"Insert GIF": "Вставить GIF",
"Insert Horizontal Line": "Вставить горизонтальную линию",
"Inline Spoiler": "Размытый текст",
"Insert Image": "Изображение",
"Insert Link": "Ссылка",
"Insert": "Вставить",
"Italic": "Курсив",
"List": "Список",
"Loading image": "Загрузка изображения",
"Media": "Медиа",
"More Text": "Дополнительные параметры...",
"More Paragraph": "Дополнительные параметры...",
"More Rich": "Дополнительные параметры...",
"More Misc": "Дополнительные параметры...",
"Open Link": "Перейти по ссылке",
"or click": "Или нажмите здесь",
"Ordered List": "Нумерованный список",
"Paragraph Format": "Формат абзаца",
"Preview": "Предварительный просмотр",
"Quote": "Цитата",
"Redo": "Повторить",
"Remove": "Удалить",
"Replace": "Заменить",
"Save Draft": "Сохранить черновик",
"Smilies": "Смайлы",
"Something went wrong. Please try again.": "Что-то пошло не так. Попробуйте ещё раз или обратитесь к администратору.",
"Spoiler": "Спойлер",
"Strikethrough": "Зачёркнутый",
"Text": "Текст",
"Toggle BB Code": "Переключение BB-кодов",
"Underline": "Подчёркнутый",
"Undo": "Отменить",
"Unlink": "Удалить ссылку",
"Unordered List": "Маркированный список",
"Update": "Обновить",
"Upload Image": "Загрузить изображение",
"Uploading": "Загрузка",
"URL": "URL-адрес",
"Insert Table": "Вставить таблицу",
"Table Header": "Заголовок таблицы",
"Remove Table": "Удалить таблицу",
"Row": "Строка",
"Column": "Колонка",
"Insert row above": "Вставить строку выше",
"Insert row below": "Вставить строку ниже",
"Delete row": "Удалить строку",
"Insert column before": "Вставить столбец до",
"Insert column after": "Вставить столбец после",
"Delete column": "Удалить колонку",
"Ctrl": "Ctrl",
"Shift": "Shift",
"Alt": "Alt",
"Insert Video": "Вставить видео",
"Upload Video": "Загрузить видео",
"Width": "Ширина",
"Height": "Высота",
"Change Size": "Изменить размер",
"None": "Нет",
"Alternative Text": "Альтернативный текст",
"__lang end__": ""
}
</script>
                                    <script class="js-editorCustom" type="application/json">
[]
</script>
                                    <script class="js-xfEditorMenu" type="text/template">
                                        <div class="menu" data-menu="menu" aria-hidden="true"
                                             data-href=""
                                             data-load-target=".js-xfEditorMenuBody">
                                            <div class="menu-content">
                                                <div class="js-xfEditorMenuBody">
                                                    <div class="menu-row">Загрузка...</div>
                                                </div>
                                            </div>
                                        </div>
                                    </script>

                                    <textarea name="message_html" class="input js-editor u-jsOnly" data-xf-init="editor" data-original-name="message" data-buttons-remove="xfInsertGif" style="height: 137px; display: none;" aria-label="Текстовое поле с поддержкой форматирования" data-min-height="100" placeholder="Напишите ответ..." data-deferred="off" data-xf-key="r" data-preview-url="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/reply-preview"></textarea>
                                    <input type="hidden" value="" data-bb-code="message">
                                    <noscript>
                                        <textarea name="message" class="input" aria-label="Текстовое поле с поддержкой форматирования"></textarea>
                                    </noscript>
                                    <div class="attachmentUploads js-attachmentUploads attachmentUploads--spaced ">
                                        <div class="hScroller" data-xf-init="h-scroller">
                                            <div class="hScroller-scroll is-calculated" style="margin-bottom: -47px;">
                                                <ul class="attachUploadList js-attachmentFiles">

                                                </ul>
                                            </div><i class="hScroller-action hScroller-action--end" aria-hidden="true"></i><i class="hScroller-action hScroller-action--start" aria-hidden="true"></i>
                                        </div>

                                        <div class="attachmentUploads-banner js-attachmentInsertMultiRow u-hidden">
                                            <button type="button" class="button--link js-attachmentSelect button rippleButton" data-toggle="Отменить">
                                                <span class="button-text">
                                                    Вставить несколько...
                                                </span>
                                            </button>
                                            <ul class="attachmentUploads-selectActions js-attachmentSelectActions">
                                                <li>
        <span class="button button--link selectAll rippleButton">
            <span class="button-text">
                <label class="iconic"><input type="checkbox" value="1" data-xf-init="check-all" data-container="< .attachmentUploads"><i aria-hidden="true"></i><span class="iconic-label">Выбрать все</span></label>

            </span>
        </span>
                                                </li>
                                                <li class="js-attachmentSelectInsertActions">
                                                    <span class="insert-label">Вставить:</span>
                                                    <span class="buttonGroup">
            <button type="button" class="button--link js-attachmentSelectAction button rippleButton" data-action="thumbnail" title="Изображение" disabled=""><span class="button-text">
                Миниатюра
            </span></button>
            <button type="button" class="button--link js-attachmentSelectAction button rippleButton" data-action="full" title="Изображение" disabled=""><span class="button-text">
                Полное изображение
            </span></button>
        </span>
                                                </li>
                                                <li>
                                                    <button type="button" class="button--link button--iconOnly js-attachmentSelectAction button button--icon rippleButton" data-action="delete" disabled=""><i class="fa--xf far fa-trash-alt" aria-hidden="true"></i><span class="button-text">
            <span class="u-srOnly">Удалить</span>
        </span></button>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>

                                    <div class="formButtonGroup ">
                                        <div class="formButtonGroup-primary">
                                            <button type="submit" class="button--primary button button--icon button--icon--reply rippleButton"><span class="button-text">
    Ответить
</span></button>
                                        </div>

                                        <div class="formButtonGroup-extra">







                                            <span class="js-attachButton"><a href="/index.php?attachments/upload&amp;type=post&amp;context[thread_id]=1&amp;hash=c38cd37b53442380fcc9252111896931" class="button--link js-attachmentUpload button button--icon button--icon--attach rippleButton" target="_blank" data-accept=".zip,.txt,.pdf,.png,.jpg,.jpeg,.jpe,.gif"><span class="button-text">Прикрепить файлы</span></a><input type="file" multiple="multiple" accept=".zip,.txt,.pdf,.png,.jpg,.jpeg,.jpe,.gif" title="Прикрепить файлы" style="visibility: hidden; position: absolute; width: 1px; height: 1px; overflow: hidden; left: -1000px;"></span>
                                            <input type="hidden" name="attachment_hash" value="c38cd37b53442380fcc9252111896931">
                                            <input type="hidden" name="attachment_hash_combined" value="{&quot;type&quot;:&quot;post&quot;,&quot;context&quot;:{&quot;thread_id&quot;:1},&quot;hash&quot;:&quot;c38cd37b53442380fcc9252111896931&quot;}">





                                        </div>

                                        <input type="hidden" name="last_date" value="1625471997" autocomplete="off">
                                        <input type="hidden" name="last_known_date" value="1625471997" autocomplete="off">
                                        <input type="hidden" name="load_extra" value="1">
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <input type="hidden" name="_xfToken" value="1625480906,76a3cd2c3884f40d4d6f8e2ae5bebd68">

        </form>
        <div class="blockMessage blockMessage--none">





            <div class="shareButtons shareButtons--iconic" data-xf-init="share-buttons" data-page-url="" data-page-title="" data-page-desc="" data-page-image="">

                <span class="shareButtons-label">Поделиться:</span>


                <div class="shareButtons-buttons">


                    <a class="shareButtons-button shareButtons-button--brand shareButtons-button--facebook" data-href="https://www.facebook.com/sharer.php?u={url}" id="js-XFUniqueId15">
                        <i aria-hidden="true"></i>
                        <span>Facebook</span>
                    </a>



                    <a class="shareButtons-button shareButtons-button--brand shareButtons-button--twitter" data-href="https://twitter.com/intent/tweet?url={url}&amp;text={title}" id="js-XFUniqueId16">
                        <i aria-hidden="true"></i>
                        <span>Twitter</span>
                    </a>



                    <a class="shareButtons-button shareButtons-button--brand shareButtons-button--reddit" data-href="https://reddit.com/submit?url={url}&amp;title={title}" id="js-XFUniqueId17">
                        <i aria-hidden="true"></i>
                        <span>Reddit</span>
                    </a>



                    <a class="shareButtons-button shareButtons-button--brand shareButtons-button--pinterest" data-href="https://pinterest.com/pin/create/bookmarklet/?url={url}&amp;description={title}&amp;media={image}" id="js-XFUniqueId18">
                        <i aria-hidden="true"></i>
                        <span>Pinterest</span>
                    </a>



                    <a class="shareButtons-button shareButtons-button--brand shareButtons-button--tumblr" data-href="https://www.tumblr.com/widgets/share/tool?canonicalUrl={url}&amp;title={title}" id="js-XFUniqueId19">
                        <i aria-hidden="true"></i>
                        <span>Tumblr</span>
                    </a>



                    <a class="shareButtons-button shareButtons-button--brand shareButtons-button--whatsApp" data-href="https://api.whatsapp.com/send?text={title}&nbsp;{url}" id="js-XFUniqueId20">
                        <i aria-hidden="true"></i>
                        <span>WhatsApp</span>
                    </a>



                    <a class="shareButtons-button shareButtons-button--email" data-href="mailto:?subject={title}&amp;body={url}" id="js-XFUniqueId21">
                        <i aria-hidden="true"></i>
                        <span>Электронная почта</span>
                    </a>



                    <a class="shareButtons-button shareButtons-button--share is-hidden" data-xf-init="web-share" data-title="" data-text="" data-url="" data-hide=".shareButtons-button:not(.shareButtons-button--share)" id="js-XFUniqueId22">

                        <i aria-hidden="true"></i>
                        <span>Поделиться</span>
                    </a>



                    <a class="shareButtons-button shareButtons-button--link is-hidden" data-clipboard="{url}" id="js-XFUniqueId23">
                        <i aria-hidden="true"></i>
                        <span>Ссылка</span>
                    </a>


                </div>
            </div>


        </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('forum_test/js/vendor/jquery/jquery-3.5.1.min.js') }}?_v=8fc53ba3"></script>
<script src="{{ asset('forum_test/js/vendor/vendor-compiled.js') }}?_v=8fc53ba3"></script>
<script src="{{ asset('forum_test/js/xf/core-compiled.js') }}?_v=8fc53ba3"></script>
<script src="{{ asset('forum_test/js/xf/inline_mod.min.js') }}?_v=8fc53ba3"></script>
<script src="{{ asset('forum_test/js/xf/message.min.js') }}?_v=8fc53ba3"></script>
<script src="{{ asset('forum_test/js/xf/editor-compiled.js') }}?_v=8fc53ba3"></script>
<script src="{{ asset('forum_test/js/xf/attachment_manager-compiled.js') }}?_v=8fc53ba3"></script>
<script src="{{ asset('forum_test/js/themehouse/uix_dark/ripple.min.js') }}?_v=8fc53ba3"></script>
<script src="{{ asset('forum_test/js/themehouse/global/20180112.min.js') }}?_v=8fc53ba3"></script>
<script src="{{ asset('forum_test/js/themehouse/uix_dark/index.min.js') }}?_v=8fc53ba3"></script>
<script src="{{ asset('forum_test/js/themehouse/uix_dark/vendor/hover-intent/jquery.hoverIntent.min.js') }}?_v=8fc53ba3"></script>
@endpush
</x-forum-layout>
