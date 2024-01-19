@extends('layout')

@section('title', 'Connexion')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Connexion</h1>
        <form method="POST" action="{{ route('login') }}" class="border p-4 rounded">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Connexion</button>
            </div>
        </form>
        <div class="mt-3">
            <a href="{{ route('register') }}">S'inscrire</a>
        </div>
    </div>
@endsection
