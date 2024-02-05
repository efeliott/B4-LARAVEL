@extends('layout')

@section('content')
<div class="container mt-4">
    <h1>Gestion des tâches</h1>
    
    <!-- Catégories et Création de Tâche -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <label for="category_id" class="mr-2">Filtrer par catégorie :</label>
            <select id="category_id" name="category_id" class="custom-select" style="width: auto;">
                <option value="">Toutes les catégories</option>
                @foreach (\App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <a href="{{ route('categories.create') }}" class="btn btn-outline-info">+ Catégorie</a>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ Nouvelle tâche</a>
        </div>
    </div>
    
    <!-- Liste des Tâches -->
    <ul class="list-group">
        @forelse ($tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center" data-category-id="{{ $task->category_id }}">
                <div>
                    <strong>{{ $task->title }}</strong> - {{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}
                </div>
                <div>
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="event.preventDefault(); document.getElementById('delete-task-form-{{ $task->id }}').submit();">
                        Supprimer
                    </button>
                    <form id="delete-task-form-{{ $task->id }}" action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </li>
        @empty
            <li class="list-group-item">Aucune tâche disponible.</li>
        @endforelse
    </ul>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const categorySelector = document.getElementById('category_id');
        const tasks = document.querySelectorAll('.list-group-item');

        categorySelector.addEventListener('change', function () {
            const selectedCategory = this.value;
            console.log(selectedCategory); // Devrait afficher l'ID de la catégorie sélectionnée

            tasks.forEach(task => {
                console.log(task.getAttribute('data-category-id')); // Devrait afficher l'ID de la catégorie pour chaque tâche
                if (selectedCategory === '' || task.getAttribute('data-category-id') === selectedCategory) {
                    task.style.display = ''; // Affiche la tâche
                } else {
                    task.style.display = 'none'; // Cache la tâche
                }
            });
        });
    });

</script>
@endpush
