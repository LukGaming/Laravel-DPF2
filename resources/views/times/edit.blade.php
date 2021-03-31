@extends('jogador/layout')

@section('titulo', 'Time')

@section('conteudo')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="d-flex justify-content-center">
        <h1>Cadastrando Time</h1>

    </div>
    <form method="POST" action="{{ route('time.update', $time->id) }}" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        <div class="form-group" style="margin-bottom: 10px">
            <label for="nome">Nome do time </label>
            <input type="text" class="form-control" id="nome" placeholder="Nome para seu time" name="nome"
                value="{{ $time->nome }}">
        </div>

        <span class="nome_igual"></span>
        <div class="form-group">
            <label for="frase">Frase de Perfil</label>
            <input type="text" class="form-control" id="frase"
                placeholder="Uma Frase de perfil que exibirá quando verem o Perfil do time (Opcional)" name="frase"
                value="{{ $time->frase }}">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição do perfil do Time (Opcional)</label>
            <textarea class="form-control" id="descricao" rows="3" name="descricao">{{ $time->descricao }}</textarea>
        </div>
        <label for="basic-url">Facebook</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">facebook.com/</span>
            </div>
            <input type="text" class="form-control" id="facebook" placeholder="Link do facebook do seu time (Opcional)"
                name="facebook" value="{{ $time->facebook }}">
        </div>
        <label for="basic-url">Instagram</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">instagram.com/</span>
            </div>
            <input type="text" class="form-control" id="instagram" placeholder="Link  do Instagram seu time  (Opcional)"
                name="instagram" value="{{ $time->instagram }}">
        </div>
        <label for="basic-url">Gamersclub</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">gamersclub.com.br/time/</span>
            </div>
            <input type="text" class="form-control" id="gamersclub" placeholder="Link  do seu time na gamersclub (Opcional)"
                name="gamersclub" value="{{ $time->gamersclub }}">
        </div>

        <label for="basic-url">Faceit</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">faceit.com/en/players/</span>
            </div>
            <input type="text" class="form-control" id="faceit"
                placeholder="Link do perfil  do seu time na faceit (Opcional)" name="faceit" value="{{ $time->faceit }}">
        </div>

        <label for="basic-url">Twitter</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">twitter.com/</span>
            </div>
            <input type="text" class="form-control" id="twitter" placeholder="Link do Twitter do seu time (Opcional)"
                name="twitter" value="{{ $time->twitter }}">
        </div>

        <label for="basic-url">Steam</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">steamcommunity.com/id/</span>
            </div>
            <input type="text" class="form-control" id="steam" placeholder="Link da Steam do seu time (Opcional)"
                name="steam" value="{{ $time->steam }}">
        </div>
        <label for="basic-url">Twitch</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">twitch.tv/</span>
            </div>
            <input type="text" class="form-control" id="twitch" placeholder="Link da twitch do seu time (Opcional)"
                name="twitch" value="{{ $time->twitch }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email"
                placeholder="Email para que outros usuários possam ver e entrarem em contato. (Opcional)" name="email"
                value="{{ $time->email }}">
        </div>
        <br>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" id="btnSalvarTime">Salvar perfil de jogador</button>
        </div>
    </form>
    <br><br>
    <div class="border border-dark">
        <div class="d-flex justify-content-center">
            <h3>Editando Imagem do time</h3>
        </div>
        @if ($time->caminho_imagem_time != null)
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-1" style="margin: 10px">
                Editando Foto de Perfil
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Escolha uma nova imagem para o time</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{ route('imagemtimecontroller.editarimagem', $time->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="imagem_time" id="imagem_time">
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



            <!-- Removendo Imagem-->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal-2" style="margin: 10px">
                Removendo imagem de perfil
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal-2">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Removendo imagem</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{ route('imagemtimecontroller.removerImagem', $time->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <img src="{{ url($time->caminho_imagem_time) }}" class="w-50"><br><br>
                                <input type="submit" value="Remover Imagem" class="btn btn-danger">
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-3" style="margin: 10px">
                Adicionar uma nova Imagem ao time
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal-3">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Escolha uma nova imagem para o time</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{ route('imagemtimecontroller.adicionaImagemonEdit', $time->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="imagem_time" id="imagem_time">
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


        @endif


    </div>












    <br><br><br>
    <script src="{{ asset('js/nomes_times.js') }}"></script>
@endsection
