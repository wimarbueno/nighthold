<section class="Section Section--secondary">
    <div data-topic-post="true" tabindex="0" class="TopicForm is-editing" id="topic-reply">
        <header class="TopicForm-header">
            <h1 class="TopicForm-heading">@lang('forum.TopicFormHeading')</h1>
        </header>
        <div class="TopicForm-content">
            <aside class="TopicForm-author" data-topic-form="{'userId': {{ auth()->user()->id }}}">
                <div class="Author" id="" data-topic-post-body-content="true"><a href="#" class="Author-avatar "><img src="{{ asset('/storage/'. auth()->user()->avatar) }}" alt="" /></a>
                    <div class="Author-details">
                        <span class="Author-name">
                            <a class="Author-name--profileLink" href="#">{{ Str::Title(auth()->user()->name) }}</a>
                        </span>
                        <span class="Author-posts">
                            <a class="Author-posts" href="#" data-toggle="tooltip" data-tooltip-content="@lang('forum.view_message_history')" data-original-title="" title="">
                                @lang('forum.count_messages', ['count' => auth()->user()->posts_count])
                            </a>
                            </span>
                    </div>
                </div>
                <div class="Author-ignored is-hidden" data-topic-post-ignored-author="true">
                    <span class="Author-name">
                        <a class="Author-name--profileLink" href="#">{{ Str::Title(auth()->user()->name) }}</a>
                    </span>
                    <div class="Author-posts Author-posts--ignored">@lang('forum.ignored')</div>
                </div>
            </aside>
            <form class="Form" action="{{ route('forum.topic.reply.create', [$thread->id])}}" id="topic-reply-form" method="post" data-post-form="true">
                <fieldset>
                    @csrf
                </fieldset>
                <div class="TopicForm-group TopicForm-group-content TopicForm-group--isActivated" data-topic-form="true">
                    <textarea id="detail" name="detail"></textarea>
                    <div class="PostForm-errors">
                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        @endif
                    </div>
                    @include('forum.create.tinymce')
                </div>
                <div class="TopicForm-action--buttons">
                    <button type="submit" class="TopicForm-button TopicForm-button--reply" id="submit-button">
                        <span class="Button-content">@lang('forum.TopicFormReply')</span>
                    </button>
                    <button type="button" data-topic-button="true" data-trigger="edit.topic.reply" class="TopicForm-button TopicForm-button--edit">
                        <span class="Button-content">@lang('forum.TopicFormEdit')</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
