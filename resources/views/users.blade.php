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

@endsection