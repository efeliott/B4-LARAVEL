<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ---------- Home route ----------
Route::get('/', [HomeController::class, 'index'])->name('home');

// ---------- User route ----------
Route::get('/users', [UserController::class, 'showUsers'])->name('users');

Route::get('/users/{id}', function ($id) {
    return $id;
})->where(["id" => "[0-9]+"])->name("user.show");

// ---------- Contact route ----------
Route::get('/contact', function () {
    $title = "Formulaire de contact";
    return view('contact', compact("title"));
})->name('contact');

Route::post('/contact', [ContactController::class, 'store']);

// Routes de connexion utilisateur
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', function () {
    request()->session()->invalidate();
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/profile', function () {
    return view('profile');
})->name('profile')->middleware('auth');

Route::put('/profile', [UserController::class, 'update'])->name('profile.update')->middleware('auth');

### Routes pour les Tâches

Route::get('/tasks', [ArticleController::class, 'index'])->name('tasks.index');

Route::middleware(['auth'])->group(function () {
    // Route pour afficher le formulaire de création d'une nouvelle tâche
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    
    // Route pour enregistrer une nouvelle tâche
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    
    // Route pour afficher une tâche spécifique
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    
    // Route pour afficher le formulaire d'édition d'une tâche
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit')
         ->middleware('can:update,task'); // Utilisez une Policy pour vérifier si l'utilisateur peut modifier cette tâche
    
    // Route pour mettre à jour une tâche
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update')
         ->middleware('can:update,task'); // Utilisez une Policy pour vérifier si l'utilisateur peut modifier cette tâche
    
    // Route pour supprimer une tâche
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy')
         ->middleware('can:delete,task'); // Utilisez une Policy pour vérifier si l'utilisateur peut supprimer cette tâche
});

### Routes pour les Catégories

Route::get('/categories', [ArticleController::class, 'index'])->name('categories.index');

Route::middleware(['auth'])->group(function () {
    // Route pour afficher le formulaire de création d'une nouvelle catégorie
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    
    // Route pour enregistrer une nouvelle catégorie
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    
    // Vous pouvez ajouter ici d'autres routes pour les catégories si nécessaire
});

// Routes pour les tâches
Route::resource('tasks', TaskController::class);