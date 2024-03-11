<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts');

    Route::get('/posts/{id}/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::post('/posts/{id}/comments', [CommentController::class, 'create'])->name('comments.store');

    Route::post('/posts/{id}/likes', [LikeController::class, 'create'])->name('likes.store');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class)->names([
        'index' => 'posts.index',
        'create' => 'posts.create',
        'store' => 'posts.store',
        'show' => 'posts.show',
    ]);
})->name('posts');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
