@section('title'){{ $thread->title }} - @endsection

@section('og')
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ route('forum.show', [$thread->id])}}" />
<meta property="og:title" content="{{ $thread->title }} - {{ config('app.name_forum') }}" />
<meta property="og:image" content="{{ asset('/forums/static/images/social-thumbs/wow.png') }}" />
<meta property="og:description" content="{{ $thread->body }}" />
@endsection

@section('sidebar')

<div class="Breadcrumbs">
<span class="Breadcrumb">
<a href="{{ route('forums.index') }}" class="Breadcrumb-content">
<span class="Breadcrumb-divider Home">
<i class="Icon"></i>
</span>
@lang('navbar.Navbar-forums')
</a>
</span>
@foreach ($sidebar as $category)
<span class="Breadcrumb">
<a href="{{ route('forum.show', [$category->id])}}" class="Breadcrumb-content">
<span class="Breadcrumb-divider Home">
<i class="Icon"></i>
</span>
{{ $category->name }}
</a>
</span>

@if($category->categories)
@foreach ($category->categories as $childCategory)

@include('forum.child_category', ['category' => $childCategory])
@endforeach
@endif
</ul>
@endforeach
<span class="Breadcrumb"> <span class="Breadcrumb-divider"> <i class="Icon"></i> </span>
<a href="{{ route('topic.show', [$thread->id])}}" class="Breadcrumb-content is-active"> {{ $thread->title }} </a> </span>
</div>
@endsection

<x-forum-layout>
<section class="Topic" data-topic='{ "id":{{ $thread->channel->id }}, "lastPosition":2,"forum":{"id":{{ $thread->id }} },"isSticky":false,"isFeatured":false,"isLocked":false,"isHidden":false,"isFrozen":false, "isSpam":false, "pollId":0 }' data-user='{"id":{{ $thread->user->id }} }'>
<header class="Topic-header">
<div class="Container Container--content">
<h1 class="Topic-heading">
<a class="Game-logo" href="/"></a>
<span class="Topic-title" data-topic-heading="true">{{ $thread->title }}</span>
</h1>
<span class="Topic-subheading">
<a class="Topic-subheading--link" href="{{ route('forum.show', $thread->channel->id)}}">{{ $thread->channel->name }} </a>
</span>

<div class="Topic-controls">
@guest
<button class="Topic-button Topic-button--reply" id="Button-reply">
<span class="Overlay-element"></span>
<span class="Button-content"><i class="Icon"></i>@lang('forum.TopicFormReplyTopic')</span></button>
@else
    @if(auth()->user()->hasPermission('create_closed_topic_thead'))
    <button class="Topic-button Topic-button--reply" id="Button-reply">
    <span class="Overlay-element"></span>
    <span class="Button-content"><i class="Icon"></i>@lang('forum.TopicFormReplyTopic')</span></button>
    @else
    <button class="Topic-button Topic-button--reply" id="Button-reply" disabled="disabled" data-toggle="tooltip" data-tooltip-content="@lang('forum.thread_is_locked')">
    <span class="Overlay-element" disabled="disabled" data-toggle="tooltip" data-tooltip-content="@lang('forum.thread_is_locked')"></span>
    <span class="Button-content"><i class="Icon"></i>@lang('forum.TopicFormReplyTopic')</span></button>
    @endif
@endguest
</div>
</div>
</header>

{{ $topics->links('forum.paginate.posthead') }}
<div class="Topic-content">
<div class="TopicPost
@if($thread->down >= 30)is-low-rated @endif
@if($thread->creator->hasPermission('forum_nighthold')) TopicPost--blizzard
@endif @if($thread->creator->hasPermission('forum_mvp')) TopicPost--mvp
@endif" id="post-{{ $thread->id }}" data-topic-post="{&quot;id&quot;:&quot;{{ $thread->id }}&quot;,&quot;valueVoted&quot;:{{ $thread->up + $thread->down }},&quot;rank&quot;:{&quot;voteUp&quot;:{{ $thread->up }},&quot;voteDown&quot;:{{ $thread->down }}},&quot;author&quot;:{&quot;id&quot;:&quot;{{ $thread->creator->id }}&quot;,&quot;name&quot;:&quot;{{ $thread->creator->name }}&quot;}}" data-topic="{ &quot;sticky&quot;:&quot;false&quot;,&quot;featured&quot;:&quot;false&quot;,&quot;locked&quot;:&quot;false&quot;,&quot;frozen&quot;:&quot;false&quot;,&quot;hidden&quot;:&quot;false&quot;,&quot;pollId&quot;:&quot;0&quot;}">
<span id="{{ $thread->id }}"></span>
<div class="TopicPost-content">
<div class="TopicPost-authorIcon TopicPost-authorIcon--blizzard">
<svg xmlns="http://www.w3.org/2000/svg">
<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#logo_svg"/>
</svg>
</div>
<aside class="TopicPost-author">
<div class="Author-block">
<div class="Author @if($thread->creator->hasPermission('forum_nighthold')) Author--blizzard @endif @if($thread->creator->hasPermission('forum_mvp')) Author--mvp @endif" id="" data-topic-post-body-content="true">
@if($thread->creator->hasPermission('forum_profile'))
<a href="#" class="Author-avatar hasNoProfile">
<img src="{{ asset('/storage/'.$thread->creator->avatar) }}" alt="" />
</a>
@else
<a href="#" class="Author-avatar">
    <img src="{{ asset('/storage/'.$thread->creator->avatar) }}" alt="" />
</a>
@endif
<div class="Author-details">
@if($thread->creator->hasPermission('forum_profile'))
    <span class="Author-name">{{ Str::Title($thread->creator->name) }}</span>
@else
    <a class="Author-name--profileLink" href="#">{{ Str::Title($thread->creator->name) }}</a>
@endif
<span class="Author-job">{{ $thread->creator->role->display_name }}</span>
<span class="Author-posts">
<a class="Author-posts" href="{{ route('forum.search', ['a' => $thread->creator->name]) }}" data-toggle="tooltip" data-tooltip-content="@lang('forum.view_message_history')" data-original-title="" title="">
@lang('forum.count_messages', ['count' => $thread->creator->posts_count])</a>
</span>
</div>
</div>
</div>
</aside>
<div class="TopicPost-body" data-topic-post-body="true">
<div class="TopicPost-details">
@if($thread->up >= 50)
<div class="TopicPost-bodyStatus">
<div class="TopicPost-statusTag highly-rated">
<span class="TopicPost-statusTagContent"> <i class="thumbsup"></i>
<span class="TopicPost-statusTagText">Высокий рейтинг</span>
</span>
</div>
</div>
@endif
<div class="Timestamp-details">
<a class="TopicPost-timestamp" href="#post-{{ $thread->id }}" data-toggle="tooltip" data-tooltip-content="{{ $thread->created_at->format('m/d/Y H:i') }}" data-original-title="" title="">{{ $thread->created_at->diffForHumans() }}</a>
@if($thread->created_at != $thread->updated_at)
&#160;(Отредактировано)
@endif
@if($thread->up != 0 || $thread->down != 0)
@if($thread->up != $thread->down)
<span class="TopicPost-rank
@if($thread->up > $thread->down)
    TopicPost-rank--up
@else
    TopicPost-rank--down
@endif" data-topic-post-rank="true" data-toggle="tooltip" data-tooltip-content="{{ $thread->down }} Dislikes, {{ $thread->up }} Likes">
    @if($thread->up > $thread->down)
        {{ $thread->up - $thread->down }}
    @else
        {{ $thread->up - $thread->down }}
    @endif
</span>
@endif
@else
<span class="TopicPost-rank TopicPost-rank--none" data-topic-post-rank="true"></span>
@endif
</div>
@auth
<aside class="TopicPost-control">
<div class="TopicPost-menu Dropdown">
<button class="Button-dropdown Button--secondary Button--icon" data-trigger="toggle.dropdown.menu" data-toggle="tooltip" data-tooltip-content="@lang('forum.dropdown')" type="button" data-original-title="" title="">
<span class="Button-content">
<i class="Icon Icon--16 Icon--blue Icon--button Icon--caretdown"></i>
</span>
</button>
<div class="Dropdown-menu">
<span class="Dropdown-arrow Dropdown-arrow--up" data-attachment="top right" data-target-attachment="bottom center"></span>
<div class="Dropdown-items">
@if(auth()->user()->hasPermission('forum_topic_banned'))
    @if($thread->creator->role->id === 4)
        <span class="Dropdown-item" data-topic-post-button="true" data-trigger="unblock.topicpost">Разблокировать</span>
    @else
        <span class="Dropdown-item" data-topic-post-button="true" data-trigger="block.preview.topicpost">Заблокировать</span>
        <div class="Dropdown-divider"></div>
    @endif
@endif
@if(auth()->user()->hasPermission('forum_topic_closed'))
    @if(!$thread->locked)
            <span class="Dropdown-item" data-topic-post-button="true" data-trigger="closed.topicpost">Закрыть тему</span>
            <div class="Dropdown-divider"></div>
    @else
            <span class="Dropdown-item" data-topic-post-button="true" data-trigger="unclosed.topicpost">Открыть тему</span>
            <div class="Dropdown-divider"></div>
    @endif
@endif
@if(auth()->user()->hasPermission('forum_topic_sticky'))
    @if(!$thread->sticky)
            <span class="Dropdown-item" data-topic-post-button="true" data-trigger="sticky.topicpost">Закрепить тему</span>
            <div class="Dropdown-divider"></div>
    @else
            <span class="Dropdown-item" data-topic-post-button="true" data-trigger="unsticky.topicpost">Открепить тему</span>
            <div class="Dropdown-divider"></div>
    @endif
@endif
@if(auth()->user()->name != $thread->creator->name)
    @if(auth()->user()->hasPermission('forum_topic_edit'))
        <a class="Dropdown-item" href="{{ route('forum.edit', ['topic' => $thread->id]) }}">@lang('forum.edit_topicpost')</a>
    @endif
    @if(auth()->user()->hasPermission('forum_topic_delete'))
        <span class="Dropdown-item" data-topic-post-button="true" data-trigger="delete.topicpost">@lang('forum.delete_topicpost')</span>
        <div class="Dropdown-divider"></div>
    @endif
@endif
@if(auth()->user()->name === $thread->creator->name)
    <a class="Dropdown-item" href="{{ route('forum.edit', ['topic' => $thread->id]) }}">@lang('forum.edit_topicpost')</a>
@else
    <span class="Dropdown-item" data-topic-post-button="true" data-trigger="report.preview.topicpost">@lang('forum.report_topicpost')</span>
    <span class="Dropdown-item" data-topic-post-button="true" data-topic-post-ignore-button="true" data-trigger="ignore.user.topicpost">@lang('forum.ignore_user_topicpost')</span>
    <span class="Dropdown-item is-hidden" data-topic-post-button="true" data-topic-post-unignore-button="true" data-trigger="unignore.user.topicpost">@lang('forum.unignore_user_topicpost')</span>
@endif
</div>
</div>
</div>
</aside>
@endauth
</div>

<button class="TopicPost-button TopicPost-button--viewPost is-hidden" data-topic-post-button="true" data-topic-viewpost-button="true" data-trigger="view.post.topicpost">
<span class="Button-content">@lang('forum.view_post_topicpost')</span>
</button>
<div class="TopicPost-bodyContent" data-topic-post-body-content="true">{!! $thread->body !!}</div>
@auth
@if($thread->creator->name != auth()->user()->name)
<footer class="TopicPost-actions" data-topic-post-body-content="true">
<button class="TopicPost-button TopicPost-button--like" data-topic-post-button="true" data-trigger="vote.up.topicpost" type="button"><span class="Button-content"><i class="Icon"></i>Нравится</span></button>
<button class="TopicPost-button TopicPost-button--dislike" data-topic-post-button="true" data-trigger="vote.down.topicpost" type="button"><span class="Button-content"><i class="Icon"></i>Не нравится</span></button>
<a href="#detail" class="TopicPost-button TopicPost-button--quote" data-topic-post-button="true" data-trigger="quote.topicpost" type="button"><span class="Button-content"><svg xmlns="http://www.w3.org/2000/svg"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-quote"/></svg>Цитирование</span></a>
</footer>
@endif
@endauth
</div>
</div>
</div>
@foreach ($topics as $reply)

<div class="TopicPost
@if($reply->down >= 30)is-low-rated @endif
@if($reply->creator->hasPermission('forum_nighthold')) TopicPost--blizzard
@endif @if($reply->creator->hasPermission('forum_mvp')) TopicPost--mvp
@endif" id="post-{{ $reply->id }}" data-topic-post="{&quot;id&quot;:&quot;{{ $reply->id }}&quot;,&quot;valueVoted&quot;:{{ $reply->up + $reply->down }},&quot;rank&quot;:{&quot;voteUp&quot;:{{ $reply->up }},&quot;voteDown&quot;:{{ $reply->down }}},&quot;author&quot;:{&quot;id&quot;:&quot;{{ $reply->creator->id }}&quot;,&quot;name&quot;:&quot;{{ $reply->creator->name }}&quot;}}" data-topic="{ &quot;sticky&quot;:&quot;false&quot;,&quot;featured&quot;:&quot;false&quot;,&quot;locked&quot;:&quot;false&quot;,&quot;frozen&quot;:&quot;false&quot;,&quot;hidden&quot;:&quot;false&quot;,&quot;pollId&quot;:&quot;0&quot;}">
<span id="{{ $reply->id }}"></span>
<div class="TopicPost-content">
<div class="TopicPost-authorIcon TopicPost-authorIcon--blizzard">
<svg xmlns="http://www.w3.org/2000/svg">
<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#logo_svg"/>
</svg>
</div>
<aside class="TopicPost-author">
<div class="Author-block">
<div class="Author @if($reply->creator->hasPermission('forum_nighthold')) Author--blizzard @endif @if($reply->creator->hasPermission('forum_mvp')) Author--mvp @endif" id="" data-topic-post-body-content="true">
        @if($reply->creator->hasPermission('forum_profile'))
            <a href="#" class="Author-avatar hasNoProfile">
                <img src="{{ asset('/storage/'.$reply->creator->avatar) }}" alt="" />
            </a>
        @else
            <a href="#" class="Author-avatar">
                <img src="{{ asset('/storage/'.$reply->creator->avatar) }}" alt="" />
            </a>
        @endif
        <div class="Author-details">
            @if($reply->creator->hasPermission('forum_profile'))
                <span class="Author-name">{{ Str::Title($reply->creator->name) }}</span>
            @else
                <a class="Author-name--profileLink" href="#">{{ Str::Title($reply->creator->name) }}</a>
            @endif
            <span class="Author-job">{{ $reply->creator->role->display_name }}</span>
            <span class="Author-posts">
            <a class="Author-posts" href="{{ route('forum.search', ['a' => $reply->creator->name]) }}" data-toggle="tooltip" data-tooltip-content="@lang('forum.view_message_history')" data-original-title="" title="">
            @lang('forum.count_messages', ['count' => $reply->creator->posts_count])
            </a>
            </span>
        </div>
    </div>
</div>
</aside>
<div class="TopicPost-body" data-topic-post-body="true">
<div class="TopicPost-details">
@if($reply->up >= 50)
<div class="TopicPost-bodyStatus">
<div class="TopicPost-statusTag highly-rated">
<span class="TopicPost-statusTagContent"> <i class="thumbsup"></i>
<span class="TopicPost-statusTagText">Высокий рейтинг</span>
</span>
</div>
</div>
@endif

<div class="Timestamp-details">
<a class="TopicPost-timestamp" data-toggle="tooltip" data-tooltip-content="{{ $reply->created_at->diffForHumans() }}" data-original-title="" title="" href="#post-{{ $reply->id }}">{{ $reply->created_at->diffForHumans() }}</a>
@if($reply->created_at != $reply->updated_at)
&#160;(Отредактировано)
@endif
@if($reply->up != 0 || $reply->down != 0)
@if($reply->up != $reply->down)
<span class="TopicPost-rank
@if($reply->up > $reply->down)
TopicPost-rank--up
@else
TopicPost-rank--down
@endif" data-topic-post-rank="true" data-toggle="tooltip" data-tooltip-content="{{ $reply->down }} Dislikes, {{ $reply->up }} Likes">
@if($reply->up > $reply->down)
{{ $reply->up - $reply->down }}
@else
{{ $reply->up - $reply->down }}
@endif
@endif
</span>
@else
<span class="TopicPost-rank TopicPost-rank--none" data-topic-post-rank="true"></span>
@endif
</div>
@auth
<aside class="TopicPost-control">
<div class="TopicPost-menu Dropdown"><button class="Button-dropdown Button--secondary Button--icon" data-trigger="toggle.dropdown.menu" data-toggle="tooltip" data-tooltip-content="@lang('forum.dropdown')" type="button" data-original-title="" title=""><span class="Button-content"><i class="Icon Icon--16 Icon--blue Icon--button Icon--caretdown"></i></span></button>
<div class="Dropdown-menu">
<span class="Dropdown-arrow Dropdown-arrow--up" data-attachment="top right" data-target-attachment="bottom center"></span>
<div class="Dropdown-items">
    @if(auth()->user()->hasPermission('forum_topic_banned'))
        @if($reply->creator->role->id === 4)
            <span class="Dropdown-item" data-topic-post-button="true" data-trigger="unblock.topicpost">Разблокировать</span>
        @else
            <span class="Dropdown-item" data-topic-post-button="true" data-trigger="block.preview.topicpost">Заблокировать</span>
            <div class="Dropdown-divider"></div>
        @endif
    @endif
        @if(auth()->user()->name != $reply->creator->name)
            @if(auth()->user()->hasPermission('forum_topic_edit'))
                <a class="Dropdown-item" href="{{ route('forum.edit', ['topic' => $reply->id]) }}">@lang('forum.edit_topicpost')</a>
            @endif
            @if(auth()->user()->hasPermission('forum_topic_delete'))
                <span class="Dropdown-item" data-topic-post-button="true" data-trigger="delete.topicpost">@lang('forum.delete_topicpost')</span>
                <div class="Dropdown-divider"></div>
            @endif
        @endif
    @if(auth()->user()->name === $reply->creator->name)
        <a href="{{ route('forum.edit', ['topic' => $reply->id]) }}" class="Dropdown-item" >@lang('forum.edit_topicpost')</a>
        <span class="Dropdown-item" data-topic-post-button="true" data-trigger="delete.topicpost">@lang('forum.delete_topicpost')</span>
        @else
        <span class="Dropdown-item" data-topic-post-button="true" data-trigger="report.preview.topicpost">@lang('forum.report_topicpost')</span>
        <span class="Dropdown-item" data-topic-post-button="true" data-topic-post-ignore-button="true" data-trigger="ignore.user.topicpost">@lang('forum.ignore_user_topicpost')</span>
        <span class="Dropdown-item is-hidden" data-topic-post-button="true" data-topic-post-unignore-button="true" data-trigger="unignore.user.topicpost">@lang('forum.unignore_user_topicpost')</span>
    @endif
</div>
</div>
</div>
</aside>
@endauth
</div>
<button class="TopicPost-button TopicPost-button--viewPost is-hidden" data-topic-post-button="true" data-topic-viewpost-button="true" data-trigger="view.post.topicpost">
<span class="Button-content">@lang('forum.view_post_topicpost')</span>
</button>
<div class="TopicPost-bodyContent" data-topic-post-body-content="true">{!! $reply->body !!}</div>
@auth
    @if($reply->creator->name != auth()->user()->name)
    <footer class="TopicPost-actions" data-topic-post-body-content="true">
    <button class="TopicPost-button TopicPost-button--like" data-topic-post-button="true" data-trigger="vote.up.topicpost" type="button">
    <span class="Button-content"><i class="Icon"></i>Нравится</span>
    </button>
    <button class="TopicPost-button TopicPost-button--dislike" data-topic-post-button="true" data-trigger="vote.down.topicpost" type="button"><span class="Button-content"><i class="Icon"></i>Не нравится</span></button>
    <a href="#detail" class="TopicPost-button TopicPost-button--quote" data-topic-post-button="true" data-trigger="quote.topicpost" type="button">
    <span class="Button-content">
    <svg xmlns="http://www.w3.org/2000/svg">
    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-quote"/></svg>
    Цитирование
    </span>
    </a>
    </footer>
    @endif
@endauth
</div>
</div>
</div>
@endforeach
</div>
{{ $topics->links('forum.paginate.post') }}
</section>
@guest
<section class="Section Section--secondary">
<div data-topic-post="true" tabindex="0" class="TopicForm is-editing" id="topic-reply">
<div class="LoginPlaceholder-content">
<aside class="LoginPlaceholder-author">
<div class="Author" id="" data-topic-post-body-content="true">
<div class="Author-avatar Author-avatar--default"></div>
<div class="Author-details">
<span class="Author-name is-blank"></span>
<span class="Author-posts is-blank"></span>
</div>
</div>
<div class="Author-ignored is-hidden" data-topic-post-ignored-author="true">
<span class="Author-name"> </span>
<div class="Author-posts Author-posts--ignored">@lang('forum.ignored')</div>
</div>
</aside>
<div class="LoginPlaceholder-details">
<div class="LogIn-message">@lang('forum.logIn_message')</div>
<a class="LogIn-button" href="{{ route('login') }}">
<span class="LogIn-button-content" >@lang('forum.logIn_content')</span>
</a>
</div>
</div>
</div>
</section>
@else
@if(!$thread->locked || auth()->user()->hasPermission('create_closed_topic_thead'))
@include('forum.create.reply')
@else
@include('forum.create.reply_topic_closed')
@endif
@endguest
<div class="Topic-container--bottomNav">
<a class="Topic-button--parentForum" href="{{ route('forum.show', [$thread->channel->id])}}" type="button">
<span class="Button-content"><i class="Icon"></i>@lang('forum.parentForum')</span>
</a>
</div>

<svg xmlns="http://www.w3.org/2000/svg" style="display:none;">
<symbol id="icon-quote" viewbox="0 0 128 128">
<title>quote</title>
<path class="path1" d="M74,89h15l10-20V39H69v30h15 M34,89h15l10-20V39H29v30h15L34,89z"/>
</symbol>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 999 460" style="display:none;">
    <g id="logo_svg" transform="translate(21851.587 1531.061) rotate(-30)">
        <rect id="Прямоугольник_526" transform="translate(-18264 -12069)"/>
        <g id="Сгруппировать_44" transform="translate(-18518.756 -12417.228)">
            <path id="Контур_1664" d="M261.654,358.095q5.755-1.463,14.548-9.116c.314,0,.532.25.661.758l.186,13.315L297.4,374.287l-.137-15.628q8.777-1.415,20.254-10.244V398.66q.1,25.788,8.7,46.892-24.747-11.9-28.814-38.389l-.282-16.861-20.544-12.469.1,49.915H254.755V360.029Q255.891,359.558,261.654,358.095Z" transform="translate(0 1.32)"/>
            <path id="Контур_1665" d="M263.433,351.989h13.791v36.56H263.433Z" transform="translate(61.266 26.552)"/>
            <path id="Контур_1666" d="M289.41,375.436v-7.488h20.972v15.233a56.753,56.753,0,0,1-10.728,4.264,43.022,43.022,0,0,1-10.905,1.225,32.76,32.76,0,0,1-12.775-2.136,16.756,16.756,0,0,1-7.7-6.311,17.477,17.477,0,0,1-2.716-9.752,16.867,16.867,0,0,1,3.047-10.139,19.177,19.177,0,0,1,8.664-6.48q4.389-1.838,12.138-1.829a40.28,40.28,0,0,1,10.816,1.088,13.587,13.587,0,0,1,9.583,9.091l-13.129,1.66a6.029,6.029,0,0,0-2.74-2.966,9.617,9.617,0,0,0-4.812-1.128,10.249,10.249,0,0,0-7.254,2.482q-2.66,2.479-2.668,8.052,0,5.743,2.668,8.14t7.536,2.394a18.716,18.716,0,0,0,4.32-.524,20.421,20.421,0,0,0,4.7-1.83v-3.046Z" transform="translate(76.289 26.785)"/>
            <path id="Контур_1667" d="M271.421,352.022h13.936v12.71h15.064v-12.71h13.79v36.471h-13.79V373.7H285.357v14.8H271.421Z" transform="translate(117.659 26.785)"/>
            <path id="Контур_1668" d="M277.091,351.994H319.26v8.793H305.139v27.6H291.309v-27.6H277.091Z" transform="translate(157.689 26.587)"/>
            <path id="Контур_1669" d="M283.6,378.259l.089-19.739q8.789-1.414,20.262-10.252v6.287l.282,22.809h17.192l.194-29.136q9.575,8.681,20.021,9.535l.185,29.991v19.263q-2.974,30.224-25.638,38.4,7.653-19.223,6.093-46.562l-.194-8.93L304,389.833l-.049,8.688q-1.608,27.2,8.689,46.893-24.458-8.258-28.806-38.4l-.282-16.853-.048-4.82Z" transform="translate(202.943 0)"/>
            <path id="Контур_1670" d="M291.233,369.3q0-8.148,5.739-12.735T313,351.983q10.494,0,16.112,4.457t5.618,12.525a17.027,17.027,0,0,1-2.458,9.462,15.417,15.417,0,0,1-7.157,5.779,29.4,29.4,0,0,1-11.494,1.991,32.7,32.7,0,0,1-11.856-1.822,17.633,17.633,0,0,1-7.576-5.6A14.885,14.885,0,0,1,291.233,369.3Zm13.033,0q0,5.175,2.386,7.173a11.556,11.556,0,0,0,12.992,0q2.333-1.995,2.337-7.85c0-3.055-.806-5.3-2.41-6.706A9.57,9.57,0,0,0,313,359.793a9.2,9.2,0,0,0-6.351,2.128Q304.27,364.036,304.266,369.3Z" transform="translate(257.529 26.51)"/>
            <path id="Контур_1671" d="M297.091,351.973H310.93v26.742H332.7v8.745H297.091Z" transform="translate(298.886 26.439)"/>
            <path id="Контур_1672" d="M301.964,351.973h20.778a29.219,29.219,0,0,1,9.777,1.354,17.235,17.235,0,0,1,6.19,3.74,14.185,14.185,0,0,1,3.586,5.69,21.506,21.506,0,0,1,1.136,7.044q0,5.767-1.6,8.825a14.162,14.162,0,0,1-4.538,5.094,21.714,21.714,0,0,1-6.424,3.055,43,43,0,0,1-8.124.854H301.964Zm13.984,8.148v19.36h3.393a17.352,17.352,0,0,0,6.094-.766,6.117,6.117,0,0,0,2.934-2.547q1.076-1.79,1.08-6.2,0-5.779-2.362-7.81t-7.746-2.039Z" transform="translate(333.288 26.439)"/>
        </g>
    </g>
</svg>
</x-forum-layout>
