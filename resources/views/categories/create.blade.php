@extends('layout')

@section('content')
<div class="container">
    <h1>Ajouter une catégorie</h1>
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nom de la catégorie</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-danger">Retour à la liste des tâches</a>
    </form>
</div>
@endsection
