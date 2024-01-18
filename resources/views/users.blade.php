@extends('layout')

@section('content')

    <h1>Liste des utilisateurs</h1>

    <ul class="list-group">
        @foreach ($users as $user)
            <li class="list-group-item">
                Nom: {{ $user->name }}
            </li>
        @endforeach
    </ul>

    <!-- Boutons pour les formulaires d'inscription et de connexion -->
    <a href="{{ route('register') }}" class="btn btn-primary">Inscription</a>
    <a href="{{ route('login') }}" class="btn btn-secondary">Connexion</a>

@endsection
