<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\PostController;

=======
>>>>>>> a804d73 (solve conflicts)
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
<<<<<<< HEAD

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

=======
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
>>>>>>> a804d73 (solve conflicts)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
<<<<<<< HEAD




Route::middleware('auth')->group(function () {
    Route::get('/post', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post', [PostController::class, 'destroy'])->name('post.destroy');
    return view('home');
});

=======
>>>>>>> a804d73 (solve conflicts)
require __DIR__.'/auth.php';