<?php

use App\Http\Controllers\ApostaController;
use App\Http\Controllers\LotoController;
use App\Http\Controllers\MegaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use function App\Helpers\limparFiltros;

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

// Route::get('/',fn()=> Inertia::render('Home',[ 'title' => 'Olá teste']));
// Route::get('/login',fn()=> Inertia::render('Login',[ 'title' => 'Olá teste']));

Route::get('/',[UsuarioController::class,'login'])->name('login');

// Usuário Controller
Route::get('/login',[UsuarioController::class,'login'])->name('login');
Route::get('/criarusuario',[UsuarioController::class,'criar_usuario']);
Route::post('/logar',[UsuarioController::class,'logar'])->name('logar');
Route::get('/logout',[UsuarioController::class,'deslogar'])->name('deslogar');


Route::get('/cargateste',[LotoController::class,'cargateste']);
Route::middleware('auth')->group(function(){
    Route::get('/loto',[LotoController::class,'index'])->name('loto');

    Route::get('/loto/limparFiltros/{redirect}/{nomeFiltro}',function($redirect,$nomeFiltro){
        return limparFiltros(redirect: $redirect, nomeFiltro: $nomeFiltro);
    })->name('limparFiltros');

    Route::post('/loto',[LotoController::class,'index']);
    Route::get('/atualizar',[LotoController::class,'atualizarBase'])->name('atualizar');

});

Route::middleware('auth')->group(function(){
    Route::get('/conferidor',[ApostaController::class,'conferidor'])->name('conferidor');
    Route::post('/conferidor',[ApostaController::class,'conferidor'])->name('conferidor');
});


