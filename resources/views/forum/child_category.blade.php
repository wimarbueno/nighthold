<li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
    <a href="{{ route('forum.show', [$category->id])}}" itemprop="item">

        <span itemprop="name">{{ $category->name }}</span>

    </a>
    <meta itemprop="position" content="3">
</li>
@if ($category->categories)
    @foreach ($category->categories as $childCategory)
        @include('forum.child_category', ['category' => $childCategory])
    @endforeach
@endif
