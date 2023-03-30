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
