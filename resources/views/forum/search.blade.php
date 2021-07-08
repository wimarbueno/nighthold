@section('title')Поиск - @endsection

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
    <div role="main">
        <section class="Search">
            <header class="Search-header">
                <div class="Container Container--content">
                    <h1 class="Search-heading">
                        <a class="Game-logo" href="/"></a>
                        @if(!$result)
                            Поиск
                        @endif
                        @if(!is_null(request('a')))
                            <span>История сообщений <span class="Author-search">{{ request('a') }}</span></span>
                        @elseif(!is_null(request('q')))
                            <span>Поиск <span class="Author-search">{{ request('q') }}</span></span>
                        @endif
                    </h1>
                    <div class="Search-controls">
                        <div class="Search-option">
                            <select class="Search-forum-dropdown">
                                <option value="">All Forums</option>
                                <optgroup label="SUPPORT">
                                    <option name="forum" value="1011699">Support</option>
                                </optgroup>
                            </select>
                        </div>
                        <form action="" class="Form" id="search-form">
                            <div class="Form-group">
                                <div class="Input Input--large Input--search">
                                    <input id="search-input" name="q" placeholder="Поиск..." type="search" value="{{ request()->q ?? request('a')}}" autocomplete="off" />
                                    <input data-search-forum="true" type="hidden" name="forum" />
                                    <div class="Input-border"></div>
                                </div>
                                <button class="Search-button" type="submit">
                                    <span class="Button-content">
                                        <i class="Icon Icon--32 Icon--search"></i>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </header>
            <div class="Search-content">
                @if(!is_null(request('a')))
                <div class="Page-searchSummary">
                    <div class="Page-searchSummary--results">
                        <span class="Search-result--numbers">1–10</span>
                        <span class="Search-result--text"> of</span>
                        <span class="Search-result--numbers"> 10</span>
                        <span class="Search-result--text"> posts</span>
                    </div>
                </div>
                @endif
                @if($result)
                    @foreach($result as $item)
                        <div class="Post--searchPage" id="post-{{ $item->id }}">
                            <a href="{{ route('topic.show', $item->parent_id) }}#post-{{ $item->id }}">
                                <div class="Post-content Post-content--searchPage">
                                    <aside class="TopicPost-author">
                                        <div class="Author">
                                            <div class="Author" id="" data-topic-post-body-content="true">
                                                <a href="#" class="Author-avatar @if($item->creator->hasPermission('forum_nighthold')) Author--blizzard @endif @if($item->creator->hasPermission('forum_mvp')) Author--mvp @endif">
                                                    <img src="{{ asset('/storage/'.$item->creator->avatar) }}" alt="" /></a>
                                                <div class="Author-details">
                                                    <span class="Author-name">
                                                        <a class="Author-name--profileLink" href="#">{{ $item->creator->name }}</a>
                                                    </span>
                                                    <span class="Author-posts">
                                                        <a class="Author-posts" href="{{ route('forum.search', ['a' => $item->creator->name]) }}" data-toggle="tooltip" data-tooltip-content="View Post History" data-original-title="" title=""> @lang('forum.count_messages', ['count' => $item->creator->posts_count]) </a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="Author-ignored is-hidden" data-topic-post-ignored-author="true">
                                                <span class="Author-name">
                                                    <a class="Author-name--profileLink" href="#">{{ $item->creator->name }}</a>
                                                </span>
                                                <div class="Author-posts Author-posts--ignored">Ignored</div>
                                            </div>
                                        </div>
                                    </aside>
                                    <div class="Post-body Post-body--searchPage">
                                        <div class="Post-body Post-body--topicTitle">{{ $item->thread->title ?? '' }}</div>
                                        <span class="Post-body Post-body--forumName"> {{ $item->channel->name }}</span>
                                        <span class="Post-timestamp Post-timestamp--searchPage"> {{ $item->created_at->diffForHumans() }}
                                            <span class="TopicPost-rank TopicPost-rank--none" data-topic-post-rank="true"></span>
                                        </span>
                                        <div class="Post-body--postContent"> {!! $item->body !!} </div>
                                    </div>
                                    <!-- <div class="Post-details Post-details-searchPage"> </div> -->
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                <div class="Search-noResults">
                    Ничего не найдено
                </div>
                @endif
            </div>
        </section>
    </div>
</x-forum-layout>
