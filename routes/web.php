<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

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