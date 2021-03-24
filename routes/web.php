<?php

use App\Http\Controllers\ConfigPcJogadorController;
use App\Http\Controllers\ImagemPcJogadorController;
use App\Http\Controllers\ImagePerifilJogadorController;
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
    return view('jogador/index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('jogador', JogadorController::class);//->middleware('auth');
Route::any('editar-jogador', [JogadorController::class, 'editar'])->name('jogador.editar')->middleware('auth');
Route::any('VerificaSeUsuarioTemJogador', [JogadorController::class, 'VerificaSeUsuarioTemJogador'])->name('jogador.VerificaSeUsuarioTemJogador')->middleware('auth');
Route::any('removerImagem', [ImagePerifilJogadorController::class, 'removerImagem'])->name('ImagePerifilJogadorController.removerImagem')->middleware('auth');
Route::any('editarImagem', [ImagePerifilJogadorController::class, 'editarImagem'])->name('ImagePerifilJogadorController.editarImagem')->middleware('auth');
Route::any('adicionandoImagem', [ImagePerifilJogadorController::class, 'adicionandoImagem'])->name('ImagePerifilJogadorController.adicionandoImagem')->middleware('auth');
Route::resource('configpcjogador', ConfigPcJogadorController::class);
Route::any('removerImagempcjogador', [ImagemPcJogadorController::class, 'removerImagem'])->name('ImagemPcJogadorController.removerImagem')->middleware('auth');
Route::any('editarImagempcjogador', [ImagemPcJogadorController::class, 'editarImagem'])->name('ImagemPcJogadorController.editarImagem')->middleware('auth');
Route::any('adicionandoImagempcjogador', [ImagemPcJogadorController::class, 'adicionandoImagem'])->name('ImagemPcJogadorController.adicionandoImagem')->middleware('auth');
