<div class="col-sm-12 col-md-4">
    <h4>Catégories</h4>
    <div class="list-group">
        @foreach($categories as $category)
            <a href="{{ route('category.show', ['slug' => $category->slug]) }}" class="list-group-item">{{ $category->name }}</a>
        @endforeach
    </div>
</div>