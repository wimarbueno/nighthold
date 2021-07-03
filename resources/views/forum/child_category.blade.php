<span class="Breadcrumb">
    <a href="{{ route('forum.show', [$category->id])}}" class="Breadcrumb-content">
        <span class="Breadcrumb-divider Home">
            <i class="Icon"></i>
        </span>
        {{ $category->name }}
    </a>
</span>
@if ($category->categories)
    @foreach ($category->categories as $childCategory)
        @include('forum.child_category', ['category' => $childCategory])
    @endforeach
@endif
