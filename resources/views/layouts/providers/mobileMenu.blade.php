@foreach($menu as $category)
    @if($category->visible == "PUBLISHED")
        <div class="menu-divider"></div>
        <span class="menu-item menu-item-disabled">{{$category->name}}</span>
        @foreach ($category->forums as $forum)
        <a href="{{ route('forum.show', [$forum->id])}}" class="menu-item "><i class="Forum-icon" style="background-image: url('{{ asset('/storage/' . Utils::Images($forum->icons)) }}')"></i>{!! $forum->name !!}</a>
        @endforeach
    @endif
@endforeach
