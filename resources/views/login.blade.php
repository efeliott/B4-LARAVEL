@extends('layout')

@section('title', 'Connexion')

@section('content')
    <h1>Connexion</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <button type="submit">Connexion</button>
        </div>
    </form>
@endsection
