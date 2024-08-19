<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/users', [ProfileController::class, 'index'])->name('users.index');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    /* Route::get('/users', [ProfileController::class, 'index'])->name('users.index'); */
});

Route::middleware('auth')->group(function () {
    // Route pour afficher le formulaire de création d'un post
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');

    // Route pour stocker un nouveau post
    Route::post('/post', [PostController::class, 'store'])->name('post.store');

    // Route pour afficher tous les posts
    Route::get('/post', [PostController::class, 'index'])->name('post.index');

    // Route pour afficher un post spécifique
    Route::get('/post/{id}', [PostController::class, 'show'])->name('post.show');

    // Route pour afficher le formulaire d'édition d'un post
    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');

    // Route pour mettre à jour un post spécifique
    Route::patch('/post/{id}', [PostController::class, 'update'])->name('post.update');

    // Route pour supprimer un post spécifique
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');
});

require __DIR__.'/auth.php';