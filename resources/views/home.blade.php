@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-8">
            @foreach($articles as $article)
                <article>
                    <h2><a href="{{ route('article.show', ['id' => $article->id]) }}">{{ $article->title }}</a></h2>
                    <p>
                        <small>
                            Catégories:
                            @foreach($article->categories as $category)
                                <a href="{{ route('category.show', ['id' => $category->id]) }}">{{ $category->name }}</a>{{ !$loop->last ? ',' : '' }}
                            @endforeach
                            par <a href="#">{{ $article->user->name }}</a> le {{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y à h:i:s') }}
                        </small>
                    </p>
                    <p>
                        {!! nl2br(str_limit($article->content, 150, '...')) !!}
                    </p>
                    <p class="text-right">
                        <a href="{{ route('article.show', ['id' => $article->id]) }}" class="btn btn-default">Lire plus...</a>
                    </p>
                </article>
            @endforeach
        </div>

        <div class="col-sm-12 col-md-4">
            <h4>Catégories</h4>
            <div class="list-group">
                @foreach($categories as $category)
                    <a href="{{ route('category.show', ['id' => $category->id]) }}" class="list-group-item">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
