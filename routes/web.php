<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use function App\Helpers\limparFiltros;
use App\Http\Controllers\LotoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ApostaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/',function(){
    return redirect('login');
});


// // Login Controller
// Route::get('/login',[LoginController::class,'login'])->name('login');
// Route::get('/logout',[LoginController::class,'logout'])->name('logout');
// Route::post('/logar',[LoginController::class,'logar'])->name('logar');

// // Usuário Controller
// Route::get('/criarusuario',[UsuarioController::class,'criar_usuario']);

// Route::get('/cargateste',[LotoController::class,'cargateste']);
// Route::middleware('auth')->group(function(){
//     Route::get('/loto',[LotoController::class,'index'])->name('loto');

//     Route::get('/loto/limparFiltros/{redirect}/{nomeFiltro}',function($redirect,$nomeFiltro){
//         return limparFiltros(redirect: $redirect, nomeFiltro: $nomeFiltro);
//     })->name('limparFiltros');

//     Route::post('/loto',[LotoController::class,'index']);
//     Route::get('/atualizar',[LotoController::class,'atualizarBase'])->name('atualizar');

// });

// Route::middleware('auth')->group(function(){
//     Route::get('/conferidor',[ApostaController::class,'conferidor'])->name('conferidor');
//     Route::post('/conferidor',[ApostaController::class,'conferidor'])->name('conferidor');
// });


// Auth

Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login')
    ->middleware('guest');

Route::post('login', [AuthenticatedSessionController::class, 'store'])
    ->name('login.store')
    ->middleware('guest');

Route::delete('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');



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
