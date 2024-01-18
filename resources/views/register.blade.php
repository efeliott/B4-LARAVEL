@extends('layout')

@section('title', 'Inscription')

@section('content')
    <h1>Inscription</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name">Nom</label>
            <input type="text" name="name" required>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Confirmez le mot de passe</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <div>
            <button type="submit">Inscription</button>
        </div>
    </form>
    <a href="{{ route('login') }}">Se connecter</a>
@endsection
