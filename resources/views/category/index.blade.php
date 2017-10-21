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
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td><a href="{{ route('category.show', ['id' => $category->id]) }}">{{ $category->id }}</a></td>
                        <td>{{ $category->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('category.create') }}" class="btn btn-primary">Ajouter une catégorie</a>
        </div>

    </div>
@endsection
