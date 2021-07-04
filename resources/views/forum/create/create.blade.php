<div class="Section Section--secondary is-hidden" id="create-topic-section">
    <div class="CreateTopic-container">
        <div class="TopicForm TopicForm-group--isActive TopicForm-group--isActivated TopicForm--create is-hidden is-editing" data-topic-form="{'userId': {{ Auth::user()->id }}  }" id="create-topic"><header class="TopicForm-header"><h1 class="TopicForm-heading">@lang('forum.New_Topic')</h1><a class="TopicForm-button--close" data-trigger="create.topicpost.forum" data-forum-button="true"></a></header>
            <div class="TopicForm-content">
                <aside class="TopicForm-author" data-topic-form="{'userId': {{ Auth::user()->id }}  }">
                    <div class="Author" id="" data-topic-post-body-content="true">
                        <a href="#" class="Author-avatar ">
                            <img src="{{ asset('/storage/'.Auth::user()->avatar ?: '/static/Avatar-anon.png') }}" alt="" /></a>
                        <div class="Author-details">
<span class="Author-name">
<a class="Author-name--profileLink" href="characters">{{ Auth::user()->name }}</a>
</span>
                            <span class="Author-posts">
<a class="Author-posts" href="#" data-toggle="tooltip" data-tooltip-content="@lang('forum.view_message_history')" data-original-title="" title="">
@lang('forum.count_messages', ['count' => Auth::user()->posts_count])
</a>
</span>
                        </div>
                    </div>
                </aside>
                <form class="Form" action="{{ route('forum.topic.store', $category) }}" method="post" id="create-topic-form" data-post-form="true">
                    <fieldset>
                        @csrf
                        <input type="hidden" name="channel_id" value="{{ $category->id }}" />
                    </fieldset>
                    <div class="TopicForm-group">	<i class="Icon Icon-compose"></i>
                        <input type="text" id="subject" name="subject" autocomplete="off" class="TopicForm-control TopicForm-control--subject TopicForm-subject" data-topic-form-subject="true" placeholder="@lang('forum.TopicFormSubject')" required="required" tabindex="1" fieldType="text" />
                    </div>
                    <div class="TopicForm-group TopicForm-group-content">
                        <textarea name="messages" class="TopicForm-control TopicForm-control--detail TopicForm-detail" data-topic-form-detail="true" required="required" spellcheck="true" tabindex="1"></textarea>
                        <script>
                            tinymce.init({
                                selector: 'textarea',
                                plugins: 'autolink lists link image charmap print preview hr anchor pagebreak media',
                                toolbar_mode: 'floating',
                                toolbar: [
                                    {
                                        name: 'history', items: [ 'undo', 'redo' ]
                                    },
                                    {
                                        name: 'styles', items: [ 'styleselect' ]
                                    },
                                    {
                                        name: 'formatting', items: [ 'bold', 'italic']
                                    },
                                    {
                                        name: 'alignment', items: [ 'alignleft', 'aligncenter', 'alignright', 'alignjustify' ]
                                    },
                                    {
                                        name: 'indentation', items: [ 'link', 'image' , 'media']
                                    }
                                ],
                                menubar: false,
                                mobile: {
                                    menubar: false,
                                    plugins: [ 'autosave', 'lists', 'autolink' ],
                                    toolbar: [ 'undo', 'bold', 'italic', 'styleselect' ]
                                },
                                resize: false,
                                theme: 'silver',
                                height : 300,
                                language: 'ru'
                            });
                        </script>
                    </div>
                    <div class="CoolDownTimer-message" data-time-left="0" id="post-countdown">@lang('forum.CoolDownTimerMessage')</div>
                    <div class="TopicForm-action--buttons">
                        <button type="submit" id="submit-button" class="TopicForm-button TopicForm-button--create" data-topic-post-button="true" disabled="disabled">
                            <span class="Button-content" disabled="disabled">@lang('forum.TopicFormButtonCreate')</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (count($errors))
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
