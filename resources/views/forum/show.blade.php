@section('title'){{ $category->name }} - @endsection

@section('og')
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('forum.show', [$category->id])}}" />
    <meta property="og:title" content="{{ $category->name }} - {{ config('app.name_forum') }}" />
    <meta property="og:image" content="{{ asset('/forum/static/images/social-thumbs/wow.png') }}" />
    <meta property="og:description" content="{{ $category->category_description }}" />
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
            </ul>
        </div>
    </div>
@endsection

<x-forum-layout>

    @push('stylesheet')
        <link rel="stylesheet" href="{{ asset('forum_test/css/topic.css') }}" />
        <link rel="stylesheet" href="{{ asset('forum_test/css/topic_style.css') }}" />
    @endpush

    @push('header')
        <div class="p-body-header">
                <div class="pageContent">


                    <div class="uix_headerInner">


                        <div class="p-title ">


                            <h1 class="p-title-value">Список разделов</h1>


                        </div>




                    </div>


                    <div class="uix_headerInner--opposite">



                        <div class="p-title-pageAction">


                            <a href="/index.php?forums/-/create-thread" class="button--cta button button--icon button--icon--write" data-xf-click="overlay"><span class="button-text">
			Создать тему...
		</span></a>
                        </div>
                    </div>
                </div>
    </div>
    @endpush

    <div class="p-body-main  ">
        <div uix_component="MainContent" class="p-body-content">
            <div class="p-body-pageContent">

                <div class="block uix_nodeList block--category ">
                    <div class="block-container">
                        <div class="uix_block-body--outer">
                            <div class="block-body">
                                @foreach($categories as $cat)
                                    @foreach($cat->forums as $cats)
                                        <div class="node below--xl node--id4 node--depth2 node--category node--read">
                                    <div class="node-body">
                                        <span class="node-icon" aria-hidden="true"><i></i></span>
                                        <div class="node-main js-nodeMain">
                                            <h3 class="node-title">
                                                <a href="{{ route('forum.show', [$cats->id])}}" data-xf-init="" data-shortcut="node-description">{!! $cats->name !!}</a>

                                            </h3>
                                            <div class="node-description ">{!! $cats->category_description !!}</div>
                                            <div class="node-meta">
                                                <div class="node-statsMeta">
                                                    <dl class="pairs pairs--inline">

                                                        <dt><i class="fa--xf far fa-comment" aria-hidden="true"></i></dt>

                                                        <dd>0</dd>
                                                    </dl>
                                                    <dl class="pairs pairs--inline">

                                                        <dt><i class="fa--xf far fa-comments" aria-hidden="true"></i></dt>

                                                        <dd>0</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="node-stats">
                                            <dl class="pairs pairs--rows">
                                                <dt>Темы</dt>
                                                <dd>0</dd>
                                            </dl>
                                            <dl class="pairs pairs--rows">
                                                <dt>Сообщения</dt>
                                                <dd>0</dd>
                                            </dl>
                                        </div>
                                        <div class="node-extra">
                                            <span class="node-extra-placeholder">Нет</span>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block " data-xf-init="inline-mod" data-type="thread" data-href="/index.php?inline-mod/">
                    <div class="block-container uix_discussionList">
                        <div class="block-filterBar">
                            <div class="filterBar">


                                <a class="filterBar-menuTrigger" data-xf-click="menu" role="button" tabindex="0" aria-expanded="false" aria-haspopup="true">Фильтры</a>
                                <div class="menu menu--wide" data-menu="menu" aria-hidden="true"
                                     data-href="/index.php?forums/main-forum.2/filters"
                                     data-load-target=".js-filterMenuBody">
                                    <div class="menu-content">
                                        <h4 class="menu-header">Показать только:</h4>
                                        <div class="js-filterMenuBody">
                                            <div class="menu-row">Загрузка...</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-body">

                            <div class="structItemContainer">
                                <form action="/index.php?forums/main-forum.2/post-thread&amp;inline-mode=1" method="post" class="structItem structItem--quickCreate"
                                      data-xf-init="quick-thread ajax-submit draft" data-draft-url="/index.php?forums/main-forum.2/draft" data-draft-autosave="60" data-focus-activate=".js-titleInput" data-focus-activate-href="/index.php?forums/main-forum.2/post-thread&amp;inline-mode=1" data-focus-activate-target=".js-quickThreadFields" data-insert-target=".js-threadList" data-replace-target=".js-emptyThreadList"
                                >
                                    <div class="structItem-cell structItem-cell--icon">
                                        <div class="structItem-iconContainer">
                                            <a href="/index.php?members/thanos.1/" class="avatar avatar--s avatar--default avatar--default--dynamic" data-user-id="1" data-xf-init="member-tooltip" style="background-color: #a32985; color: #e699d2">
                                                <span class="avatar-u1-s">T</span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="structItem-cell structItem-cell--newThread js-prefixListenContainer">


                                        <dl class="formRow formRow--noGutter formRow--noLabel formRow--fullWidth formRow--noPadding formRow--mergeNext">
                                            <dt>
                                                <div class="formRow-labelWrapper">
                                                    <label class="formRow-label">Заголовок</label></div>
                                            </dt>
                                            <dd>

                                        <textarea rows="1" name="title"
                  data-xf-init="textarea-handler tooltip" data-single-line="true"
                  class="input js-titleInput "
                  autocomplete="off"
                  maxlength="150" placeholder="Заголовок темы" title="Создать новую тему в этом разделе"></textarea>
                                            </dd>
                                        </dl>
                                        <div class="js-quickThreadFields inserter-container is-hidden"><!--Загрузка...--></div>
                                    </div>
                                    <input type="hidden" name="_xfToken" value="1625476064,6bfae791f471f21731522d5ed446e11f" />
                                </form>
                                @if ($topics->isEmpty())
                                    <div class="structItemContainer-group js-threadList">

                                        <div class="structItem js-emptyThreadList">
                                            <div class="structItem-cell">В этом разделе нет ни одной темы.</div>
                                        </div>

                                    </div>
                                @endif
                                @foreach ($topics as $topic)
                                @if($topic->sticky == 1)
                                    <div class="uix_stickyContainerOuter  is-active">
                                        <div class="uix_stickyContainerInner">
                                            <div class="structItemContainer-group structItemContainer-group--sticky">
                                @else
                                    <div class="structItemContainer-group js-threadList">
                                @endif
                                    <div class="structItem structItem--thread js-inlineModContainer js-threadListItem-{{ $category->id }}" data-author="{{ $topic->creator->name }}">
                                    <div class="structItem-cell structItem-cell--icon">
                                        <div class="structItem-iconContainer">
                                            <a href="#" class="avatar avatar--l" data-user-id="1" data-xf-init="member-tooltip" id="js-XFUniqueId5">
                                                <img src="{{ asset('/storage/' . $topic->creator->avatar) }}" srcset="{{ asset('/storage/'.$topic->creator->avatar) }} 2x" alt="{{ $topic->creator->name }}" class="avatar-u1-s" width="48" height="48" loading="lazy" itemprop="image">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="structItem-cell structItem-cell--main" data-xf-init="touch-proxy">
                                        <ul class="structItem-statuses">
                                            <li>
                                                <i class="structItem-status structItem-status--watched" aria-hidden="true" title="Отслеживаемая тема"></i>
                                                <span class="u-srOnly">Отслеживаемая тема</span>
                                            </li>
                                        </ul>

                                        <div class="structItem-title" uix-data-href="{{ route('topic.show', [$topic])}}">


                                            <a href="{{ route('topic.show', [$topic])}}" class="" data-tp-primary="on" data-xf-init="preview-tooltip" data-preview-url="{{ route('topic.show', [$topic])}}/preview">{{ $topic->title }}</a>
                                        </div>

                                        <div class="structItem-minor">
                                            <ul class="structItem-extraInfo">
                                                <li class="structItem-extraInfoMinor">
                                                    <a href="#" data-xf-click="overlay" data-cache="false" data-href="#/edit">
                                                        Изменить
                                                    </a>
                                                </li>
                                            </ul>
                                            <ul class="structItem-parts">
                                                <li>
                                                    <a href="#" class="username " dir="auto" itemprop="name" data-user-id="1" data-xf-init="member-tooltip"><span class="username--staff username--moderator username--admin">{{ Str::title($topic->creator->name) }}</span>
                                                    </a>
                                                </li>
                                                <li class="structItem-startDate"><a href="{{ route('topic.show', [$topic])}}" rel="nofollow"><time  class="u-dt" dir="auto" datetime="{{ $topic->created_at }}">{{ $topic->created_at->diffForHumans() }}</time></a></li>
                                            </ul>

                                        </div>
                                    </div>
                                    <div class="structItem-cell structItem-cell--meta" title="Количество реакций на первое сообщение: 0">
                                        <dl class="pairs pairs--justified">
                                            <dt>Ответы</dt>
                                            <dd>{{ $topic->replies_count }}</dd>
                                        </dl>
                                        <dl class="pairs pairs--justified structItem-minor">
                                            <dt>Просмотры</dt>
                                            <dd>5</dd>
                                        </dl>
                                    </div>
                                    @if(is_array($topic->replies))
                                        <div class="structItem-cell structItem-cell--latest ">
                                            <a href="#/latest" rel="nofollow">
                                                <time  class="structItem-latestDate u-dt" dir="auto" datetime="{{ $topic->replies[0]->created_at }}">
                                                    {{ $topic->replies[0]->created_at->diffForHumans() }}
                                                </time>
                                            </a>
                                            <div class="structItem-minor">
                                                <a href="#" class="username " dir="auto" itemprop="name" data-user-id="{{ $topic->replies[0]->creator->id }}" data-xf-init="member-tooltip"><span class="username--staff username--moderator username--admin">{{ Str::title($topic->replies[0]->creator->name) }}</span></a>
                                            </div>
                                        </div>
                                        <div class="structItem-cell structItem-cell--icon structItem-cell--iconEnd">
                                            <div class="structItem-iconContainer">

                                                <a href="#" class="avatar avatar--l" data-user-id="{{ $topic->replies[0]->creator->id }}" data-xf-init="member-tooltip" id="js-XFUniqueId5">
                                                    <img src="{{ asset('/storage/' . $topic->replies[0]->creator->avatar) }}" srcset="{{ asset('/storage/'.$topic->replies[0]->creator->avatar) }} 2x" alt="{{ $topic->replies[0]->creator->name }}" class="avatar-u1-s" width="48" height="48" loading="lazy" itemprop="image">
                                                </a>

                                            </div>
                                        </div>
                                    @else
                                        <div class="structItem-cell structItem-cell--latest ">
                                            <a href="#/latest" rel="nofollow">
                                                <time  class="structItem-latestDate u-dt" dir="auto" datetime="{{ $topic->created_at }}">
                                                    {{ $topic->created_at->diffForHumans() }}
                                                </time>
                                            </a>
                                            <div class="structItem-minor">
                                                <a href="#" class="username " dir="auto" itemprop="name" data-user-id="{{ $topic->creator->id }}" data-xf-init="member-tooltip">
                                                    <span class="username--staff username--moderator username--admin">
                                                        {{ Str::title($topic->creator->name) }}
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="structItem-cell structItem-cell--icon structItem-cell--iconEnd">
                                            <div class="structItem-iconContainer">

                                                <a href="#" class="avatar avatar--l" data-user-id="{{ $topic->creator->id }}" data-xf-init="member-tooltip" id="js-XFUniqueId5">
                                                    <img src="{{ asset('/storage/' . $topic->creator->avatar) }}" srcset="{{ asset('/storage/'.$topic->creator->avatar) }} 2x" alt="{{ $topic->creator->name }}" class="avatar-u1-s" width="48" height="48" loading="lazy" itemprop="image">
                                                </a>

                                            </div>
                                        </div>
                                    @endif
                                </div>
                                </div>
                                @if($topic->sticky == 1)
                                        </div>
                                    </div>
                                @endif
                                @endforeach
                            </div>
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
        <script src="{{ asset('forum_test/js/xf/thread.min.js') }}?_v=8fc53ba3"></script>
        <script src="{{ asset('forum_test/js/xf/prefix_menu.min.js') }}?_v=8fc53ba3"></script>
        <script src="{{ asset('forum_test/js/themehouse/uix_dark/ripple.min.js') }}?_v=8fc53ba3"></script>
        <script src="{{ asset('forum_test/js/themehouse/global/20180112.min.js') }}?_v=8fc53ba3"></script>
        <script src="{{ asset('forum_test/js/themehouse/uix_dark/index.min.js') }}?_v=8fc53ba3"></script>
        <script src="{{ asset('forum_test/js/themehouse/uix_dark/vendor/hover-intent/jquery.hoverIntent.min.js') }}?_v=8fc53ba3"></script>
    @endpush
</x-forum-layout>
