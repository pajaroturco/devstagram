<?php

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

Route::get('/', function () {
    return view('principal');
})->name('principal');

Route::get('/registro', [App\Http\Controllers\auth\AuthController::class, 'index'])->name('registro.index');
Route::post('/registro', [App\Http\Controllers\auth\AuthController::class, 'store'])->name('registro.store');

Route::get('/login', [App\Http\Controllers\auth\AuthController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\auth\AuthController::class, 'loginStore'])->name('login.store');
Route::post('/logout', [App\Http\Controllers\auth\AuthController::class, 'logout'])->name('logout');

Route::get('/{user:username}', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [App\Http\Controllers\PostController::class, 'delete'])->name('posts.delete');

Route::post('/{user:username}/posts/{post}/comentarios', [App\Http\Controllers\ComentarioController::class, 'store'])->name('comentarios.store');

Route::post('/imagen', [App\Http\Controllers\ImagenController::class, 'store'])->name('imagen.store');

Route::post('/posts/{post}/likes', [App\Http\Controllers\LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/likes', [App\Http\Controllers\LikeController::class, 'delete'])->name('posts.likes.delete');