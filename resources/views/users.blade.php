@extends('layout')

@section('content')

    <div class="container mt-4">
        <h1 class="mb-4">Liste des utilisateurs</h1>

        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Nom: {{ $user->name }}</h5>
                            <p class="card-text">Email: {{ $user->email }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            <a href="{{ route('register') }}" class="btn btn-primary">Inscription</a>
            <a href="{{ route('login') }}" class="btn btn-secondary">Connexion</a>
        </div>
    </div>

@endsection