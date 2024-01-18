@extends('layout')

@section('title', 'Inscription')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Inscription</h1>
        <form method="POST" action="{{ route('register') }}" class="border p-4 rounded">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">Confirmez le mot de passe</label>
                <input type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Inscription</button>
            </div>
        </form>
        <div class="mt-3">
            <a href="{{ route('login') }}">Se connecter</a>
        </div>
    </div>
@endsection