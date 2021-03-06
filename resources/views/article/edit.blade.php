@extends('layouts.app')

@section('content')
    {!! Form::model($article, ['url' => route('article.update', $article), 'method' => 'PUT']) !!}

    @include('layouts.errors')

    <div class="form-group">
        {!! Form::label("title", "Titre de l'article") !!}
        {!! Form::text('title', $article->title, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label("slug", "Slug de l'article") !!}
        {!! Form::text('slug', $article->slug, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label("content", "Contenu de l'article") !!}
        {!! Form::textarea('content', $article->content, ['class' => 'form-control']) !!}
    </div>


    <div class="form-group">
        @foreach ($categories as $category)
            <div class="checkbox-inline">
                <label for="categories[]" class="checkbox">{!! Form::checkbox('categories[]', $category->id) !!}{{ $category->name }}</label>
            </div>
        @endforeach
    </div>

    <button class="btn btn-primary">Modifier</button>

    {!! Form::close() !!}
@endsection