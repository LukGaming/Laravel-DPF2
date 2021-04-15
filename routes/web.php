<?php

use App\Http\Controllers\{
    configCsJogadorController,
    ConfigPcJogadorController,
    ImagemPcJogadorController,
    ImagePerifilJogadorController,
    JogadorController,
    TimeController,
    nomeTimes,
    ImagemTimeController,
    vagasController
};

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('jogador/index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::resource('jogador', JogadorController::class); //->middleware('auth');
Route::any('editar-jogador', [JogadorController::class, 'editar'])->name('jogador.editar')->middleware('auth');
Route::any('VerificaSeUsuarioTemJogador', [JogadorController::class, 'VerificaSeUsuarioTemJogador'])->name('jogador.VerificaSeUsuarioTemJogador')->middleware('auth');


/* Rotas Para Imagem de Jogador */
Route::any('removerImagem', [ImagePerifilJogadorController::class, 'removerImagem'])->name('ImagePerifilJogadorController.removerImagem')->middleware('auth');
Route::any('editarImagem', [ImagePerifilJogadorController::class, 'editarImagem'])->name('ImagePerifilJogadorController.editarImagem')->middleware('auth');
Route::any('adicionandoImagem', [ImagePerifilJogadorController::class, 'adicionandoImagem'])->name('ImagePerifilJogadorController.adicionandoImagem')->middleware('auth');
Route::resource('configpcjogador', ConfigPcJogadorController::class);
/* Rotas Para Imagem de Pc de jogador */
Route::any('removerImagempcjogador', [ImagemPcJogadorController::class, 'removerImagem'])->name('ImagemPcJogadorController.removerImagem')->middleware('auth');
Route::any('editarImagempcjogador', [ImagemPcJogadorController::class, 'editarImagem'])->name('ImagemPcJogadorController.editarImagem')->middleware('auth');
Route::any('adicionandoImagempcjogador', [ImagemPcJogadorController::class, 'adicionandoImagem'])->name('ImagemPcJogadorController.adicionandoImagem')->middleware('auth');
/*Rotas para configcsjogador*/
Route::any('configcsjogador/create', [configCsJogadorController::class, 'create'])->name('configcsjogador.create')->middleware('auth');
Route::any('configcsjogador/store', [configCsJogadorController::class, 'store'])->name('configcsjogador.store')->middleware('auth');
Route::any('configcsjogador/update', [configCsJogadorController::class, 'update'])->name('configcsjogador.update')->middleware('auth');



/*Rotas para Update da Cfg do jogador*/

Route::any('removercfgjogador', [configCsJogadorController::class, 'removercfgjogador'])->name('configCsJogadorController.removercfgjogador')->middleware('auth');
Route::any('editarcfgjogador', [configCsJogadorController::class, 'editarcfgjogador'])->name('configCsJogadorController.editarcfgjogador')->middleware('auth');
Route::any('adicionarcfgjogador', [configCsJogadorController::class, 'adicionarcfgjogador'])->name('configCsJogadorController.adicionarcfgjogador')->middleware('auth');
Route::any('downloadcfg/{id_jogador}', [configCsJogadorController::class, 'downloadcfg'])->name('configcsjogadorController.downloadcfg')->middleware('auth');


/* Rotas para Times */
Route::resource('time', TimeController::class);
/*Rotas para editar Imagem do time*/
Route::any('editarImagem/{id_time}', [ImagemTimeController::class, 'editarImagem'])->name('imagemtimecontroller.editarimagem');
Route::any('removerImagem/{id_time}', [ImagemTimeController::class, 'removerImagem'])->name('imagemtimecontroller.removerImagem');
Route::any('adicionaImagemonEdit/{id_time}', [ImagemTimeController::class, 'adicionaImagemonEdit'])->name('imagemtimecontroller.adicionaImagemonEdit');


/*Rota para procurar um time pelo nome*/
Route::any("search/times", [TimeController::class, "searchtime"])->name("time.searchtime");


/*Api para procurar os nomes de times já existentes*/
Route::any('nometimes', [nomeTimes::class, 'retrieve_team_names']);

Route::any('search/jogador', [JogadorController::class, 'search'])->name('search');
Route::any('mensagens-time/{time}/jogador/{jogador}', [TimeController::class, 'menssagens']);
Route::any('search/vagas', [vagasController::class, 'searchVagas'])->middleware('auth');
Route::any('mensagens', [TimeController::class, 'mensagens'])->middleware('auth');