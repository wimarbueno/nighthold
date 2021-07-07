@section('title')Новые темы - @endsection

@section('og')
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ route('forums.new')}}" />
    <meta property="og:title" content="Новые темы - {{ config('app.name_forum') }}" />
    <meta property="og:image" content="{{ asset('/forum/static/images/social-thumbs/wow.png') }}" />
    <meta property="og:description" content="Новые темы за последние несколько дней" />
@endsection

@section('sidebar')
    <div class="Breadcrumbs"> <span class="Breadcrumb"> <a href="{{ route('forums.index') }}" class="Breadcrumb-content">
<span class="Breadcrumb-divider Home"> <i class="Icon"></i> </span>@lang('navbar.Navbar-forums')</a> </span>
    </div>
@endsection

<x-forum-layout>
    <div id="main-outlet" class="wrap" role="main">
        <div id="ember13" class="above-main-container-outlet blizzard-banner-message ember-view"><!----></div>

        <div class="container">
            <div id="ember14" class="ember-view"></div>
            <div id="ember15" class="controls ember-view"><!----></div>
            <div id="ember16" class="ember-view"><!----></div>
            <div id="ember17" class="ember-view">  <div class="row">
                    <div id="global-notice-alert-emails-disabled" class="alert alert-info alert-emails-disabled">
                        <!---->      <span class="text">Все исходящие письма были глобально отключены администратором. Уведомления любого вида не будут отправляться на почту.</span>

                        <!---->    </div>
                </div>
            </div>
            <div id="ember19" class="hidden create-topics-notice ember-view"><!----></div>
            <!---->
        </div>
        <div class="container">
            <div id="ember20" class="ember-view"><!----></div>
            <div id="ember21" class="ember-view"><!----></div>
        </div>

        <div class="list-controls">
            <div class="container">
                <section id="ember22" class="navigation-container ember-view">  <ol id="ember24" class="category-breadcrumb ember-view">    <li id="ember26" class="select-kit single-select combobox combo-box category-drop none ember-view">  <div data-name="все категории" data-value="" role="button" data-select-kit-id="ember26-header" aria-expanded="false" aria-haspopup="" aria-owns="[data-select-kit-id=ember26-body]" tabindex="0" id="ember27" class="select-kit-header single-select-header combo-box-header category-drop-header ember-view" style="">  <div tabindex="0" title="все категории" data-name="все категории" class="select-kit-selected-name selected-name choice" data-ember-action="" data-ember-action-29="29">
                                    <!---->
                                    <span class="name">
      все категории
    </span>

                                    <!---->  </div>


                                <svg class="fa d-icon d-icon-caret-right svg-icon caret-icon svg-string" xmlns="http://www.w3.org/2000/svg" style=""><use xlink:href="#blizzard-chevron_right"></use></svg>
                            </div>

                            <div data-select-kit-id="ember26-body" id="ember30" class="select-kit-body ember-view"><!----></div>
                            <div class="select-kit-wrapper"></div>
                        </li>

                        <!---->
                        <!---->
                    </ol>

                    <ul class="nav nav-pills ember-view">
                        <li title="Все темы по категориям" id="ember33" class="ember-view">
                            <a href="{{ route('forums.index') }}" class="">Категории</a>
                        </li>
                        <li title="Новые темы за последние несколько дней" id="ember37" class="active ember-view">
                            <a href="{{ route('forums.new') }}" class="active">Новые</a>
                        </li>
                        <li title="Темы с недавними сообщениями" id="ember41" class="ember-view">
                            <a href="{{ route('forums.latest') }}" class="">Последние</a>
                        </li>
                    </ul>

                    <span id="ember45" class="ember-view"><!----></span>

                </section>
            </div>
        </div>

        <div id="ember47" class="loading-container ember-view">
        </div>

        <span id="ember48" class="ember-view"><!----></span>

        <div class="container list-container ">
            <div class="row">
                <div class="full-width">
                    <div id="header-list-area">
                        <!---->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="full-width">
                    <div id="list-area">
                        <span id="ember49" class="ember-view"><!----></span>
                        <!---->
                        <!---->
                        <!---->
                        <div id="ember50" class="bulk-select-container ember-view" style="top: 41px;"><!----></div>

                        <div id="ember51" class="contents ember-view"><!---->  <span id="ember52" class="ember-view"><!----></span>

                            <table id="ember53" class="topic-list ember-view">  <thead>
                                <tr><th data-sort-order="default" class=""></th>

                                    <th data-sort-order="" class=""></th>

                                    <th data-sort-order="posts" class=""></th>

                                    <th data-sort-order="activity" class=""></th>

                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($topics as $topic)
                                    <a class="ForumTopic @if($topic->creator->hasPermission('forum_nighthold'))has-blizzard-post @endif @if($topic->creator->hasPermission('forum_mvp')) has-mvp-post @endif @if($topic->locked) is-locked @endif @if(auth()->check() && $topic->hasUpdatesFor(auth()->user()))  @else is-read @endif" href="{{ route('topic.show', [$topic])}}" data-forum-topic="{'id':{{ $topic }},'lastPosition':0,'isSticky':false,'isFeatured':false,'isLocked':@if($topic->locked) true @else false @endif,'isHidden':false,'isSpam':false}">
<span class="ForumTopic-type">
<i class="Icon"></i>
@if($topic->creator->hasPermission('forum_nighthold'))
        <i class="BlizzIcon" data-toggle="tooltip" data-tooltip-content="@lang('forum.messages_gm')" data-original-title="" title=""></i>
    @endif
    @if($topic->creator->hasPermission('forum_mvp'))
        <i class="MvpIcon" data-toggle="tooltip" data-tooltip-content="@lang('forum.messages_cuf')"></i>
    @endif
</span>
                                            <div class="ForumTopic-details">
<span class="ForumTopic-heading">
<span class="ForumTopic-title--wrapper">

<span class="ForumTopic-timestamp on-mobile">
<span class="ForumTopic-timestamp--lastPost" href="{{ route('topic.show', [$topic])}}" >
</span>
</span>

<span class="ForumTopic-title" data-toggle="tooltip" data-tooltip-content="" data-original-title="" title="">{{ $topic->title }}</span>
@if($topic->locked) <i class="statusIcon statusIcon-mobile" data-toggle="tooltip" data-tooltip-content="Закрыто" data-original-title="" title=""></i>@endif</span>
@if($topic->locked)
        <i class="statusIcon statusIcon-desktop" data-toggle="tooltip" data-tooltip-content="Закрыто" data-original-title="" title=""></i>
    @endif
</span>
                                                <span class="ForumTopic--preview">{{ $topic->content }}</span>
                                                <span class="ForumTopic-author @if($topic->creator->hasPermission('forum_nighthold'))ForumTopic-author--blizzard @endif @if($topic->creator->hasPermission('forum_mvp')) ForumTopic-author--mvp @endif">
    {{ Str::title($topic->creator->name) }}
</span>

                                                <span class="ForumTopic-replies">
<i class="Icon"></i>
<span>{{ $topic->replies_count }}</span>
</span>

                                                <span class="ForumTopic-timestamp">
<span class="ForumTopic-timestamp--lastPost" href="{{ route('topic.show', [$topic])}}">{{ $topic->created_at->diffForHumans() }}</span>
</span>
                                            </div>
                                        </a>
                                @endforeach
                                </tbody>
                            </table>
                            <span id="ember65" class="ember-view"><!----></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <span id="ember70" class="ember-view"><!----></span>

        <!---->
        <div id="user-card" class="user-card no-bg group-undefined selectable-characters-enabled ember-view" style="left: -9999px; top: -9999px;"><!----></div>

        <div id="group-card" class="no-bg group-card ember-view" style="left: -9999px; top: -9999px;"><!----></div>

    </div>
</x-forum-layout>
