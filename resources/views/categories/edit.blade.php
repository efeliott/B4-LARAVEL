{{-- Formulaire de modification d'une catégorie --}}
@extends('layout')

@section('content')
<div class="container">
    <h1>Modifier la

catégorie</h1>
<form method="POST" action="{{ route('categories.update', $category) }}">
@csrf
@method('PUT')
<div class="form-group">
<label for="name">Nom de la catégorie</label>
<input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
</div>
<button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
</div>
@endsection