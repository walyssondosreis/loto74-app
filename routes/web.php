<?php

use App\Http\Controllers\LotoController;
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
    // return view('welcome');
    return to_route('loto');
});

// Route::resources([
//     'loto'=> LotoController::class,
// ]);

Route::get('/loto',[LotoController::class,'index'])->name('loto');
Route::get('/loto/limparFiltros',[LotoController::class,'limparFiltros'])->name('limparFiltros');
Route::post('/loto',[LotoController::class,'index']);
Route::get('/atualizar',[LotoController::class,'atualizarBase'])->name('atualizar');



