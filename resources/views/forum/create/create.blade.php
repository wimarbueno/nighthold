<div class="block block--treeEntryChooser">
    <div class="block-container">
        @foreach($thread as $category)
            @if($category->visible == "PUBLISHED")
                <h2 class="block-header">
                    {{$category->name}}
                </h2>
                <div class="block-body">
                    @foreach ($category->forums as $forum)
                    <div class="block-row block-row--clickable block-row--separated fauxBlockLink">
                        <div class="contentRow contentRow--alignMiddle">
                            <div class="contentRow-main">
                                <h2 class="contentRow-title">
                                    <a href="{{ route('forums.create', ['category' => $forum->id]) }}" class="fauxBlockLink-blockLink">
                                        {!! $forum->name !!}
                                    </a>
                                </h2>
                            </div>
                            <div class="contentRow-suffix">
                                <dl class="pairs pairs--rows pairs--rows--centered">
                                    <dt>Темы</dt>
                                    <dd>{{ $forum->threads->count() }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        @endforeach
    </div>
</div>
