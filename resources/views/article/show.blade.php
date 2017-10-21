@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<article>
				<h2>
					<a href="{{ route('article.show', ['id' => $article->id ]) }}">{{ $article->title }}</a>
				</h2>
				<p>
					<small>Section :
						@foreach($article->categories as $category)
							<a href="{{ route('category.show', ['id' => $category->id]) }}">{{ $category->name }}</a>
						@endforeach
						par <a href="#">{{ $article->user->name }}</a>
						Le {{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y à h:i:s') }}</small>
				</p>
				<p>
					{!! nl2br($article->content) !!}
				</p>
			</article>
		</div>
	</div>
	<br>
	<div class="row">
		<a class="btn btn-primary pull-right" href="{{ route('home') }}">Retour à l'accueil</a>
	</div>
@endsection