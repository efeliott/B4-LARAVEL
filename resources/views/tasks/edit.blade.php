@extends('layout')

@section('content')
<div class="container">
    <h1>Modifier la tâche</h1>

    {{-- Assurez-vous que l'action pointe vers la route 'tasks.update' et inclut l'ID de la tâche --}}
    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT') {{-- La directive pour indiquer que la requête doit être traitée comme une requête PUT --}}

        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}" required>
        </div>

        <div class="form-group">
            <label for="due_date">Date d'échéance</label>
            <input type="date" class="form-control" id="due_date" name="due_date" value="{{ old('due_date', $task->due_date->format('Y-m-d')) }}" required>
        </div>

        <div class="form-group">
            <label for="category_id">Catégorie</label>
            <select class="form-control" id="category_id" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $task->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
