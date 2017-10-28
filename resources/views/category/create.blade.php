@extends('layouts.app')

@section('content')
    {!! Form::model($category, ['route' => 'category.store', 'method' => 'POST']) !!}

    @include('layouts.errors')

    <div class="form-group">
        {!! Form::label("name", "Nom de la catégorie") !!}
        {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label("slug", "Slug de la catégorie") !!}
        {!! Form::text('slug', $category->slug, ['class' => 'form-control']) !!}
    </div>

    <button class="btn btn-primary">Envoyer</button>

    {!! Form::close() !!}
@endsection