@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-8">
            @foreach($articles as $article)
                <article>
                    <h2><a href="{{ route('article.show', ['slug' => $article->slug]) }}">{{ $article->title }}</a></h2>
                    <p>
                        <small>
                            Catégories:
                            @foreach($article->categories as $category)
                                <a href="{{ route('category.show', ['slug' => $category->slug]) }}">{{ $category->name }}</a>{{ !$loop->last ? ',' : '' }}
                            @endforeach
                            par <a href="#">{{ $article->user->name }}</a> le {{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y à h:i:s') }}
                        </small>
                    </p>
                    <p>
                        {!! nl2br(str_limit($article->content, 150, '...')) !!}
                    </p>
                    <p class="text-right">
                        <a href="{{ route('article.show', ['slug' => $article->slug]) }}" class="btn btn-default">Lire plus...</a>
                    </p>
                </article>
            @endforeach
        </div>

        @include('layouts.sidebar')
        
    </div>
@endsection
