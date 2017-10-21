@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <h3>Gestion des articles</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Contenu</th>
                        <th>Catégories</th>
                        <th>Par</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td><a href="{{ route('article.show', ['id' => $article->id]) }}">{{ $article->id }}</a></td>
                            <td>{{ $article->title }}</td>
                            <td>{{ str_limit($article->content, $limit = 45, $end = "...") }}</td>
                            <td>
                                @foreach($article->categories as $category)
                                    {{ $category->name }}
                                @endforeach
                            </td>
                            <td>{{ $article->user->name }}</td>
                            <td>{{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y à h:i:s') }}</td>
                            <td>
                                {{ Form::open(['method' => 'DELETE', 'route' => ['article.destroy', $article->id]]) }}
                                    <div class="form-group">
                                        <a href="{{ route('article.edit', ['id' => $article->id]) }}" class="btn btn-primary">Editer</a>
                                        <button class="btn btn-danger">Supprimer</button>
                                    </div>
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('article.create') }}" class="btn btn-primary">Ajouter un article</a>
        </div>

    </div>
@endsection
