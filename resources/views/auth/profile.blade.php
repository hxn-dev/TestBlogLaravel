@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-8">
            <p>Nom d'utilisateur : {{ Auth::user()->name }}</p>
            <p>Adresse email : {{ Auth::user()->email }}</p>
            <p>Compte crée le {{ Carbon\Carbon::parse(Auth::user()->created_at)->format('d/m/Y à h:i:s') }}</p>

        </div>

@endsection
