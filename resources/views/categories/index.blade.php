{{-- Liste des catégories --}}
@extends('layout')

@section('content')
<div class="container">
    <h1>Catégories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Ajouter une catégorie</a>
    <ul class="list-group">
        @foreach ($categories as $category)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $category->name }}
                <div>
                    <a href="{{ route('categories.edit', $category->id) }}">Modifier</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
