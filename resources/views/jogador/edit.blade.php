@extends('jogador/layout')

@section('titulo', 'Editar')

@section('conteudo')
    <div class="border border-dark rounded bg-dark text-light"
        style="padding: 10px; margin-top: 20px; padding-bottom: 20px">
        <h1>Editando Perfil de Jogador</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form method="POST" action="{{ route('jogador.update', $jogador->user_id) }}">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="nick_jogador">Apelido</label>
                <input type="text" class="form-control" id="nick_jogador" placeholder="Seu apelido de jogador"
                    name="nick_jogador" value="{{ $jogador->nick_jogador }}">
            </div>
            <div class="form-group">
                <label for="frase_perfil">Frase de Perfil</label>
                <input type="text" class="form-control" id="frase_perfil"
                    placeholder="Uma Frase de perfil que exibirá quando verem seu perfil" name="frase_perfil"
                    value="{{ $jogador->frase_perfil }}">
            </div>
            <div class="form-group">
                <label for="descricao_perfil_jogador">Descrição do perfil</label>
                <textarea class="form-control " id="descricao_perfil_jogado" rows="3"
                    name="descricao_perfil_jogador"> {{ $jogador->descricao_perfil_jogador }}</textarea>
            </div>
            <span class="badge badge-primary bg-danger" style="padding: 10px; margin: 10px" id="spanFuncoes"></span>

            <div class="form-group ">
                <label for="funcao_primaria">Função Primária em jogo</label>
                <div class="col-2 d-flex">
                    <select class="form-control " id="funcao_primaria" name="funcao_primaria">
                        <option @if (old('funcao_primaria') == 'Capitão/IGL') selected @endif @if ($jogador->funcao_primaria == 'Capitão/IGL')
                            selected @endif>Capitão/IGL</option>
                        <option @if (old('funcao_primaria') == 'Entry Fragger') selected @endif @if ($jogador->funcao_primaria == 'Entry Fragger')
                            selected @endif>Entry Fragger</option>
                        <option @if (old('funcao_primaria') == 'Awper') selected @endif @if ($jogador->funcao_primaria == 'Awper')
                            selected @endif>Awper</option>
                        <option @if (old('funcao_primaria') == 'Trader') selected @endif @if ($jogador->funcao_primaria == 'Trader')
                            selected @endif>Trader</option>
                        <option @if (old('funcao_primaria') == 'Suporte') selected @endif @if ($jogador->funcao_primaria == 'Suporte')
                            selected @endif>Suporte</option>
                        <option @if (old('funcao_primaria') == 'Rifler') selected @endif @if ($jogador->funcao_primaria == 'Rifler')
                            selected @endif>Rifler</option>
                    </select>
                </div>
                <div class="form-group ">
                    <label for="funcao_secundaria">Função Secundária em jogo</label>
                    <div class="col-2 d-flex">
                        <select class="form-control " id="funcao_secundaria" name="funcao_secundaria">
                            <option @if (old('funcao_secundaria') == 'Capitão/IGL') selected @endif @if ($jogador->funcao_primaria == 'Capitão/IGL') selected @endif
                                >Capitão/IGL</option>
                            <option @if (old('funcao_secundaria') == 'Entry Fragger') selected @endif @if ($jogador->funcao_secundaria == 'Entry Fragger') selected @endif
                                >Entry Fragger</option>
                            <option @if (old('funcao_secundaria') == 'Awper') selected @endif @if ($jogador->funcao_secundaria == 'Awper')
                                selected @endif>Awper</option>
                            <option @if (old('funcao_secundaria') == 'Trader') selected @endif @if ($jogador->funcao_secundaria == 'Trader')
                                selected @endif>Trader</option>
                            <option @if (old('funcao_secundaria') == 'Suporte') selected @endif @if ($jogador->funcao_secundaria == 'Suporte')
                                selected @endif>Suporte</option>
                            <option @if (old('funcao_secundaria') == 'Rifler') selected @endif @if ($jogador->funcao_secundaria == 'Rifler')
                                selected @endif>Rifler</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="funcao_adicional">Função Adicional em jogo</label>
                        <div class="col-2 d-flex">
                            <select class="form-control " id="funcao_adicional" name="funcao_adicional">
                                <option @if (old('funcao_adicional') == 'Capitão/IGL') selected @endif @if ($jogador->funcao_primaria == 'Capitão/IGL') selected @endif
                                    >Capitão/IGL</option>
                                <option @if (old('funcao_adicional') == 'Entry Fragger') selected @endif @if ($jogador->funcao_adicional == 'Entry Fragger') selected @endif>Entry Fragger</option>
                                <option @if (old('funcao_adicional') == 'Awper') selected @endif @if ($jogador->funcao_adicional == 'Awper') selected @endif
                                    >Awper</option>
                                <option @if (old('funcao_adicional') == 'Trader') selected @endif @if ($jogador->funcao_adicional == 'Trader') selected @endif
                                    >Trader</option>
                                <option @if (old('funcao_adicional') == 'Suporte') selected @endif @if ($jogador->funcao_adicional == 'Suporte') selected @endif
                                    >Suporte</option>
                                <option @if (old('funcao_adicional') == 'Rifler') selected @endif @if ($jogador->funcao_adicional == 'Rifler') selected @endif
                                    >Rifler</option>
                            </select>
                        </div>
                    </div>
                    <label for="basic-url">Facebook</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">facebook.com/</span>
                        </div>
                        <input type="text" class="form-control" id="facebook" placeholder="Link do seu perfil do facebook"
                            name="facebook" value="{{ $jogador->facebook }}">
                    </div>
                    <label for="basic-url">Instagram</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">instagram.com/</span>
                        </div>
                        <input type="text" class="form-control" id="instagram" placeholder="Link do seu perfil do instagram"
                            name="instagram" value="{{ $jogador->instagram }}">
                    </div>

                    <label for="basic-url">Gamersclub</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">gamersclub.com.br/jogador/</span>
                        </div>
                        <input type="text" class="form-control" id="gamersclub"
                            placeholder="Link do seu perfil de jogador da gamersclub" name="gamersclub"
                            value="{{ $jogador->gamersclub }}">
                    </div>
                    <label for="basic-url">Faceit</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">faceit.com/en/players/</span>
                        </div>
                        <input type="text" class="form-control" id="faceit"
                            placeholder="Link do seu perfil de jogador da faceit" name="faceit"
                            value="{{ $jogador->faceit }}">
                    </div>
                    <label for="basic-url">Twitter</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">www.twitter.com/</span>
                        </div>
                        <input type="text" class="form-control" id="twitter" placeholder="Link do seu perfil do  Twitter"
                            name="twitter" value="{{ $jogador->twitter }}">
                    </div>
                    <label for="basic-url">Steam</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">steamcommunity.com/id/</span>
                        </div>
                        <input type="text" class="form-control" id="steam" placeholder="Link do seu perfil da Steam"
                            name="steam" value="{{ $jogador->steam }}">
                    </div>
                    <label for="basic-url">Twitch</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">twitch.tv/</span>
                        </div>
                        <input type="text" class="form-control" id="twitch" placeholder="Link do seu perfil da Twitch"
                            name="twitch" value="{{ $jogador->twitch }}">
                    </div>
                    <div class="form-group">
                        <label for="email_contato">Email</label>
                        <input type="email" class="form-control" id="email_contato"
                            placeholder="Email para que outros usuários possam ver e entrarem em contato."
                            name="email_contato" value="{{ $jogador->email_contato }}">
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-4">
                        </div>
                        <div class="col-3">
                            <div class=""><button type="submit" class="btn btn-primary" id="btnCriar">Salvar
                                    alterações</button>
                            </div>
                        </div>
        </form>
    </div>
    </div>
    </div>
    

    @if ($jogador->caminho_imagem_perfil_jogador)
        <div class="bg-dark text-light rounded" style="margin-top: 10px; padding: 10px">
            <div class="d-flex justify-content-center h5">
                Editar Imagem do Jogador
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-5">
                Editar Imagem de Perfil
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal-5">
                <div class="modal-dialog">
                    <div class="modal-content bg-dark text-light">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Sua Imagem</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{ route('ImagePerifilJogadorController.editarImagem') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <label for="imagem_contato">Escolha uma nova imagem para o seu perfil de jogador</label><br>
                                <br>

                                <input type="file" name="image" id="imagem_contato">
                                <button type="submit" class="btn btn-danger"> Enviar</button><br>
                                <br>
                            </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal-2">
                Remover Imagem de Perfil
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal-2">
                <div class="modal-dialog">
                    <div class="modal-content bg-dark text-light">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Remover sua imagem</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{ route('ImagePerifilJogadorController.removerImagem') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <img src="{{ URL::asset($jogador->caminho_imagem_perfil_jogador) }}" class="w-100">
                                <br><br>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-danger ">Remover</button>
                                </div>

                                <br>
                            </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-5">
                Adicionar uma imagem ao seu perfil
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal-5">
                <div class="modal-dialog">
                    <div class="modal-content bg-dark text-light">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Sua Imagem</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{ route('ImagePerifilJogadorController.adicionandoImagem') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <label for="imagem_contato">Escolha uma nova imagem para o seu perfil de jogador</label><br>
                                <br>
                                <input type="file" name="image" id="imagem_contato">
                                <button type="submit" class="btn btn-danger"> Enviar</button><br>
                                <br>
                            </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
    <br><br>
   
    <div class="bg-dark text-light container" >
        <div class="border border-dark rounded" style="padding: 10px; margin-top: 20px; padding-bottom: 20px">
            <h1>Editando Configurações de computador</h1>
            <form method="POST" action="{{ route('configpcjogador.update', 'configPcJogador', Auth::id()) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="monitor">Monitor</label>
                    <input type="text" class="form-control" id="monitor" name="monitor"
                        value="{{ $config_pc_jogador->monitor }}">
                </div>
                <div class="form-group">
                    <label for="teclado">Teclado</label>
                    <input type="text" class="form-control" id="teclado" name="teclado"
                        value="{{ $config_pc_jogador->teclado }}">
                </div>
                <div class="form-group">
                    <label for="mouse">Mouse</label>
                    <input type="text" class="form-control" id="mouse" name="mouse"
                        value="{{ $config_pc_jogador->mouse }}">
                </div>
                <div class="form-group">
                    <label for="mousepad">Mousepad</label>
                    <input type="text" class="form-control" id="mousepad" name="mousepad"
                        value="{{ $config_pc_jogador->mousepad }}">
                </div>
                <div class="form-group">
                    <label for="processador">Processador</label>
                    <input type="text" class="form-control" id="processador" name="processador"
                        value="{{ $config_pc_jogador->processador }}">
                </div>
                <div class="form-group">
                    <label for="placa_mae">Placa Mãe</label>
                    <input type="text" class="form-control" id="placa_mae" name="placa_mae"
                        value="{{ $config_pc_jogador->placa_mae }}">
                </div>
                <div class="form-group">
                    <label for="placa_de_video">Placa de Vídeo</label>
                    <input type="text" class="form-control" id="placa_de_video" name="placa_de_video"
                        value="{{ $config_pc_jogador->placa_de_video }}">
                </div>
                <div class="form-group">
                    <label for="memoria_ram">Memória Ram</label>
                    <input type="text" class="form-control" id="memoria_ram" name="memoria_ram"
                        value="{{ $config_pc_jogador->memoria_ram }}">
                </div>
                <div class="form-group">
                    <label for="fonte">Fonte</label>
                    <input type="text" class="form-control" id="fonte" name="fonte"
                        value="{{ $config_pc_jogador->fonte }}">
                </div>
                <div class="form-group">
                    <label for="gabinete">Gabinete</label>
                    <input type="text" class="form-control" id="gabinete" name="gabinete"
                        value="{{ $config_pc_jogador->gabinete }}">
                </div> <br><br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" id="btnCriar">Atualizar dados de computador</button>
                </div>

            </form>
            <br>
            <br>
        
   
    
    @if ($config_pc_jogador->caminho_imagem_pc_jogador)
        <div class="bg-dark text-light" style="padding: 10px; margin-top: 10px">
            <div class="d-flex justify-content-center h5">
                Editando Imagem de Computador
            </div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-8">
                Editar sua imagem de computador
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal-8">
                <div class="modal-dialog">
                    <div class="modal-content bg-dark text-light">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Sua Imagem</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{ route('ImagemPcJogadorController.editarImagem') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <label for="imagem_contato">Escolha uma nova imagem de seu computador</label><br>
                                <br>

                                <input type="file" name="image" id="imagem_contato">
                                <button type="submit" class="btn btn-danger"> Enviar</button><br>
                                <br>
                            </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal-9">
                Remover sua imagem de computador
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal-9">
                <div class="modal-dialog">
                    <div class="modal-content bg-dark text-light">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Remover sua imagem de computador</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{ route('ImagemPcJogadorController.removerImagem') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <img src="{{ URL::asset($config_pc_jogador->caminho_imagem_pc_jogador) }}" class="w-100">
                                <br><br>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-danger ">Remover</button>
                                </div>

                                <br>
                            </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="container">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-10">
                Adicionar uma imagem do seu computador
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal-10">
                <div class="modal-dialog">
                    <div class="modal-content bg-dark text-light">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Sua Imagem</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{ route('ImagemPcJogadorController.adicionandoImagem') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <label for="imagem_contato">Escolha uma nova imagem de seu computador</label><br>
                                <br>
                                <input type="file" name="image" id="imagem_contato">
                                <button type="submit" class="btn btn-danger"> Enviar</button><br>
                                <br>
                            </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
</div>
    </div>
    <div class="border border-dark rounded bg-dark text-light container"
        style="padding: 10px; margin-top: 20px; padding-bottom: 20px">
        <h1>Editando Configuração de jogo</h1>
        <form action="{{ route('configcsjogador.update', 'configPcJogador', Auth::id()) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="resolucao">Resolução:</label>
                <input type="text" class="form-control" id="resolucao" name="resolucao"
                    value="{{ $config_cs_jogador->resolucao }}">
            </div>
            <div class="form-group">
                <label for="sensibilidade">Sensbilidade:</label>
                <input type="text" class="form-control" id="sensibilidade" name="sensibilidade"
                    value="{{ $config_cs_jogador->sensibilidade }}">
            </div>
            <div class="form-group">
                <label for="crosshair">Crosshair/Mira</label>
                <input type="text" class="form-control" id="crosshair" name="crosshair"
                    value="{{ $config_cs_jogador->crosshair }}">
            </div>
            <div class="form-group">
                <label for="viewmodel">Viewmodel</label>
                <input type="text" class="form-control" id="viewmodel" name="viewmodel"
                    value="{{ $config_cs_jogador->viewmodel }}">
            </div>
            <br>
            <label for="black_bars">Black Bars/Bordas Pretas</label><br>
            <select name="black_bars" id="black_bars">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select><br>
            <br>
            <br>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary" id="btnSalvar">Salvar Configuração de Jogo</button>
            </div>
        </form>

        @if ($config_cs_jogador->caminho_cfg)
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal-95">
                Remover Cfg
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal-95">
                <div class="modal-dialog">
                    <div class="modal-content bg-dark text-light">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Sua Cfg</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{ route('configCsJogadorController.removercfgjogador') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="button btn-danger">Remover Cfg</button>
                                <br>
                            </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal-99">
                Atualizar Cfg
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal-99">
                <div class="modal-dialog">
                    <div class="modal-content bg-dark text-light ">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title text-dark">Enviar nova Cfg</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{ route('configCsJogadorController.editarcfgjogador') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="cfg" id="cfg">
                                <button type="submit" class="button btn-danger">Adicionar nova Cfg</button>
                                <br>
                            </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-96">
                Adicionar Cfg
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal-96">
                <div class="modal-dialog">
                    <div class="modal-content bg-dark text-light">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Enviar Nova Cfg</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{ route('configCsJogadorController.adicionarcfgjogador') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="cfg" id="cfg">
                                <input type="submit" class="btn btn-primary">
                            </form>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endif




    <div class="d-flex justify-content-end container" style="margin-top: 10px">
        <form action="{{ route('jogador.destroy', $jogador->user_id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" id="btnSalvar">Excluir Perfil de
                jogador</button>
        </form>
    </div>
    </div>

    </div>
    <script src="{{ asset('js/options.js') }}"></script>
    <br><br>
@endsection
