@extends('layout')

@section('title', 'Profil de l\'utilisateur')

@section('content')
    <div class="container mt-4">
        <h1>Profil de l'utilisateur</h1>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
            </div>

            <div class="form-group">
                <label for="password">Nouveau mot de passe</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmer le nouveau mot de passe</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
