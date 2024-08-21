<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Route d'accueil
Route::get('/', function () {
    return view('welcome');
});

// Route pour la liste des posts
Route::get('/home', [PostController::class, 'index'])->name('home');

// Routes pour la gestion des posts, protégées par authentification
Route::middleware('auth')->group(function () {
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    Route::get('/post', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');
    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');
    // Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');

    
    // Routes pour la gestion du profil utilisateur
    Route::middleware('verified')->group(function () {
        Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::post('/update-biography', [ProfileController::class, 'updateBiography'])->name('update.biography');

    });

    // Routes pour la liste des utilisateurs
    Route::get('/users', [ProfileController::class, 'index'])->name('users.index');
    Route::get('/user/{id}', [ProfileController::class, 'show'])->name('users.show');
});

require __DIR__.'/auth.php';
