<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LotoController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthSessionController;

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

// Route::get('/bilhete',fn()=> Inertia::render('Bilhete',[ 'title' => 'Olá teste']));
// Route::get('/login',fn()=> Inertia::render('Login',[ 'title' => 'Olá teste']));

Route::get('/', function () {
    return redirect('login');
});

// Auth

Route::get('login', [AuthSessionController::class, 'create'])
    ->name('login')
    ->middleware('guest');

Route::post('login', [AuthSessionController::class, 'store'])
    ->name('login.store')
    ->middleware('guest');

Route::delete('logout', [AuthSessionController::class, 'destroy'])
    ->name('logout');

// Lotofacil
Route::get('/', [LotoController::class, 'index'])
    ->name('loto')
    ->middleware('auth');

Route::get('/conferidor', [LotoController::class, 'conferidor'])
    ->name('conferidor')
    ->middleware('auth');

// Atualizador
Route::get('/atualizar', [LotoController::class, 'atualizarBase'])
    ->name('atualizar')
    ->middleware('auth');


// Users

Route::get('users', [UsersController::class, 'index'])
    ->name('users')
    ->middleware('auth');

Route::get('users/create', [UsersController::class, 'create'])
    ->name('users.create')
    ->middleware('auth');

Route::post('users', [UsersController::class, 'store'])
    ->name('users.store')
    ->middleware('auth');

Route::get('users/{user}/edit', [UsersController::class, 'edit'])
    ->name('users.edit')
    ->middleware('auth');

Route::put('users/{user}', [UsersController::class, 'update'])
    ->name('users.update')
    ->middleware('auth');

Route::delete('users/{user}', [UsersController::class, 'destroy'])
    ->name('users.destroy')
    ->middleware('auth');

Route::put('users/{user}/restore', [UsersController::class, 'restore'])
    ->name('users.restore')
    ->middleware('auth');
