@section('og')
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ route('forums.index') }}" />
<meta property="og:title" content="@yield('title') {{ config('app.name_forum', __('forum.title')) }}" />
<meta property="og:image" content="{{ asset('/forum/static/images/social-thumbs/wow.png') }}" />
<meta property="og:description" content="@lang('forum.description')" />
@endsection

<x-forum-layout>

@push('stylesheet')
<link rel="stylesheet" href="{{ asset('forum_test/css/main.css') }}" />
<link rel="stylesheet" href="{{ asset('forum_test/css/main_style.css') }}" />
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
    <a href="{{ route('forums.create', ['category' => 'null']) }}" class="button--cta button button--icon button--icon--write" data-xf-click="overlay">
        <span class="button-text">
            Создать тему...
        </span>
    </a>
</div>
</div>
</div>
</div>
@endpush

<div class="p-body-main p-body-main--withSidebar ">
<div uix_component="MainContent" class="p-body-content">
<!-- ABOVE MAIN CONTENT -->
<div class="p-body-pageContent">
<div class="uix_nodeList block">
@foreach($thread as $category)
@if($category->visible == "PUBLISHED")
<div class="block block--category block--category{{ $category->id }} ">
<span class="u-anchorTarget" id="main-category.{{ $category->id }}"></span>
<h2 class="block-header js-nodeMain">
<div class="uix_categoryStrip-content">
<a href="{{ route('forums.index') }}#main-category.{{ $category->id }}" class="uix_categoryTitle" data-xf-init="" data-shortcut="node-description">
{{$category->name}}
</a>
</div>
</h2>

<div class="block-container">

<div class="uix_block-body--outer">
<div class="block-body">
@foreach ($category->forums as $forum)
<div class="node node--id2 node--depth2 node--forum node--read">
<div class="node-body">
<span class="node-icon" aria-hidden="true">
<i class="fa--xf far fa-comments" aria-hidden="true"></i>
</span>
<div class="node-main js-nodeMain">
<h3 class="node-title">
<a href="{{ route('forum.show', [$forum->id])}}" data-xf-init="" data-shortcut="node-description">
{!! $forum->name !!}
</a>

</h3>



<div class="node-meta">

<div class="node-statsMeta">
<dl class="pairs pairs--inline">

<dt><i class="fa--xf far fa-comment" aria-hidden="true"></i></dt>

<dd>{{ $forum->threads->count() }}</dd>
</dl>
<dl class="pairs pairs--inline">

<dt><i class="fa--xf far fa-comments" aria-hidden="true"></i></dt>

<dd>{{ $forum->replies->count() }}</dd>
</dl>
</div>
</div>
</div>
<div class="node-stats">
<dl class="pairs pairs--rows">
<dt>Темы</dt>
<dd>{{ $forum->threads->count() }}</dd>
</dl>
<dl class="pairs pairs--rows">
<dt>Сообщения</dt>
<dd>{{ $forum->replies->count() }}</dd>
</dl>
</div>


    @if($forum->threads->first())
        <div class="node-extra">
            <div class="node-extra-icon">
                <a href="#" class="avatar avatar--l" data-user-id="{{ $forum->threads->first()->creator->id }}" data-xf-init="member-tooltip" id="js-XFUniqueId5">
                    <img src="{{ asset('/storage/' . $forum->threads->first()->creator->avatar) }}" srcset="{{ asset('/storage/'.$forum->threads->first()->creator->avatar) }} 2x" alt="{{ $forum->threads->first()->creator->name }}" class="avatar-u1-s" width="48" height="48" loading="lazy" itemprop="image">
                </a>

            </div>
            <div class="uix_nodeExtra__rows">
                <div class="node-extra-row">

                    <a href="{{ route('topic.show', [$forum->threads->first()])}}" class="node-extra-title" title="{{ $forum->threads->first()->title }}">{{ $forum->threads->first()->title }}</a>

                </div>
                <div class="node-extra-row">
                    <ul class="listInline listInline--bullet">
                        <li>
                            <time  class="node-extra-date u-dt" dir="auto" datetime="{{ $forum->threads->first()->created_at }}">
                                {{ $forum->threads->first()->created_at->diffForHumans() }}
                            </time>
                        </li>

                        <li class="node-extra-user">
                            <a href="#" class="username " dir="auto" itemprop="name" data-user-id="{{ $forum->threads->first()->creator->id }}" data-xf-init="member-tooltip">
                                <span class="username--staff username--moderator username--admin">{{ $forum->threads->first()->creator->name }}</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
    @else
        <div class="node-extra">

            <span class="node-extra-placeholder">Нет</span>

        </div>
    @endif
</div>
</div>
@endforeach
</div>
</div>
</div>
</div>
@endif
@endforeach
</div>
</div>
<!-- BELOW MAIN CONTENT -->
</div>

<div uix_component="MainSidebar" class="p-body-sidebar">
<div data-ocm-class="offCanvasMenu-backdrop"></div>
<div class="uix_sidebarInner ">
<div class="uix_sidebar--scroller">
<div class="block" data-widget-section="staffMembers" data-widget-id="6" data-widget-key="forum_overview_members_online" data-widget-definition="members_online">
<div class="block-container">
<h3 class="block-minorHeader"><a href="/index.php?members/&amp;key=staff_members">Команда онлайн</a></h3>
<ul class="block-body">



<li class="block-row">
<div class="contentRow">
<div class="contentRow-figure">
<a href="/index.php?members/thanos.1/" class="avatar avatar--xs avatar--default avatar--default--dynamic" data-user-id="1" data-xf-init="member-tooltip" style="background-color: #a32985; color: #e699d2">
<span class="avatar-u1-s">T</span>
</a>
</div>
<div class="contentRow-main contentRow-main--close">
<a href="/index.php?members/thanos.1/" class="username " dir="auto" itemprop="name" data-user-id="1" data-xf-init="member-tooltip"><span class="username--staff username--moderator username--admin">Thanos</span></a>
<div class="contentRow-minor">
<span class="userTitle" dir="auto">Administrator</span>
</div>
</div>
</div>
</li>



</ul>
</div>
</div>
<div class="block" data-widget-section="onlineNow" data-widget-id="6" data-widget-key="forum_overview_members_online" data-widget-definition="members_online">
<div class="block-container">
<h3 class="block-minorHeader"><a href="/index.php?online/">Пользователи онлайн</a></h3>
<div class="block-body">

<div class="block-row block-row--minor">



<ul class="listInline listInline--comma">
<li><a href="/index.php?members/thanos.1/" class="username " dir="auto" itemprop="name" data-user-id="1" data-xf-init="member-tooltip"><span class="username--staff username--moderator username--admin">Thanos</span></a></li>
</ul>


</div>
</div>
<div class="block-footer">
<span class="block-footer-counter">Всего:&nbsp;1 (пользователей:&nbsp;1, гостей:&nbsp;0)</span>
</div>
</div>
</div>
<div class="block" data-widget-id="7" data-widget-key="forum_overview_new_posts" data-widget-definition="new_posts">
<div class="block-container">

<h3 class="block-minorHeader">
<a href="/index.php?whats-new/posts/&amp;skip=1" rel="nofollow">Новые сообщения</a>
</h3>
<ul class="block-body">


<li class="block-row">

<div class="contentRow">
<div class="contentRow-figure">
<a href="/index.php?members/thanos.1/" class="avatar avatar--xxs avatar--default avatar--default--dynamic" data-user-id="1" data-xf-init="member-tooltip" style="background-color: #a32985; color: #e699d2">
<span class="avatar-u1-s">T</span>
</a>
</div>
<div class="contentRow-main contentRow-main--close">

<a href="/index.php?threads/%D0%A2%D0%B5%D1%81%D1%82%D0%BE%D0%B2%D0%B0%D1%8F-%D1%82%D0%B5%D0%BC%D0%B0.1/post-1">Тестовая тема</a>


<div class="contentRow-minor contentRow-minor--hideLinks">
<ul class="listInline listInline--bullet">
<li>Последнее: Thanos</li>
<li><time  class="u-dt" dir="auto" datetime="2021-07-05T08:59:57+0100" data-time="1625471997" data-date-string="05.07.2021" data-time-string="08:59" title="05.07.2021 в 08:59">2 мин. назад</time></li>
</ul>
</div>
<div class="contentRow-minor contentRow-minor--hideLinks">
<a href="/index.php?forums/main-forum.2/">Main forum</a>
</div>
</div>
</div>

</li>


</ul>

</div>
</div>
<div class="block" data-widget-id="9" data-widget-key="forum_overview_forum_statistics" data-widget-definition="forum_statistics">
<div class="block-container">
<h3 class="block-minorHeader">Статистика форума</h3>
<div class="block-body block-row">
<dl class="pairs pairs--justified">
<dt>Темы</dt>
<dd>0</dd>
</dl>

<dl class="pairs pairs--justified">
<dt>Сообщения</dt>
<dd>0</dd>
</dl>

<dl class="pairs pairs--justified">
<dt>Пользователи</dt>
<dd>1</dd>
</dl>

<dl class="pairs pairs--justified">
<dt>Новый пользователь</dt>
<dd>
    <a href="#" class="username " dir="auto" itemprop="name" data-user-id="1" data-xf-init="member-tooltip">
        <span class="username--staff username--moderator username--admin">Thanos</span>
    </a>
</dd>
</dl>
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
<script src="{{ asset('forum_test/js/themehouse/uix_dark/ripple.min.js') }}?_v=8fc53ba3"></script>
<script src="{{ asset('forum_test/js/themehouse/global/20180112.min.js') }}?_v=8fc53ba3"></script>
<script src="{{ asset('forum_test/js/themehouse/uix_dark/index.min.js') }}?_v=8fc53ba3"></script>
<script src="{{ asset('forum_test/js/themehouse/uix_dark/vendor/hover-intent/jquery.hoverIntent.min.js') }}?_v=8fc53ba3"></script>
@endpush
</x-forum-layout>
