<?php

use App\Http\Controllers\JogadorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('jogador', JogadorController::class);//->middleware('auth');
//Route::get('jogador/edit',  JogadorController::class);
Route::any('editar-jogador', [JogadorController::class, 'editar'])->name('jogador.editar');
Route::any('VerificaSeUsuarioTemJogador', [JogadorController::class, 'VerificaSeUsuarioTemJogador'])->name('jogador.VerificaSeUsuarioTemJogador');