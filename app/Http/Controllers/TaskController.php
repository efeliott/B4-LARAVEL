<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index()
    {
        // Récupérer uniquement les tâches appartenant à l'utilisateur connecté
        $tasks = auth()->user()->tasks; // Assurez-vous que la relation 'tasks' est définie dans le modèle User
        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        $categories = Category::all(); // Récupère toutes les catégories pour le formulaire de sélection
        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'due_date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
        ]);

        $data = $request->only(['title', 'due_date', 'category_id']); // Récupérez uniquement les champs nécessaires
        $task = new Task($data);
        $task->user_id = Auth::id(); // Associe la tâche à l'utilisateur connecté
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès.');
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task);
        $categories = Category::all(); // Récupère toutes les catégories pour le formulaire de sélection
        return view('tasks.edit', compact('task', 'categories'));
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $request->validate([
            'title' => 'required|max:255',
            'due_date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès.');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée avec succès.');
    }
}
