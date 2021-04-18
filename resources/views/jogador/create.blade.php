@extends('jogador/layout')

@section('titulo', 'Criar')

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
    <div class="bg-dark text-light rounded" style="padding: 10px; margin-top: 20px">
        <h1>Cadastrando Perfil de Jogador</h1>
        <form method="POST" action="{{ route('jogador.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nick_jogador">Apelido</label>
                <input type="text" class="form-control" id="nick_jogador" placeholder="Seu apelido de jogador"
                    name="nick_jogador" value="{{ old('nick_jogador') }}">
            </div>
            <div class="form-group">
                <label for="frase_perfil">Frase de Perfil</label>
                <input type="text" class="form-control" id="frase_perfil"
                    placeholder="Uma Frase de perfil que exibirá quando verem seu perfil" name="frase_perfil"
                    value="{{ old('frase_perfil') }}">
            </div>
            <div class="form-group">
                <label for="descricao_perfil_jogador">Descrição do perfil</label>
                <textarea class="form-control" id="descricao_perfil_jogador" rows="3"
                    name="descricao_perfil_jogador">{{ old('descricao_perfil_jogador') }}</textarea>
            </div>
            <span class="badge badge-primary bg-danger" style="padding: 10px; margin: 10px" id="spanFuncoes"></span>
            <div class="form-group ">
                <label for="funcao_primaria">Função Primária em jogo</label>
                <div class="col-2 d-flex">
                    <select class="form-control " id="funcao_primaria" name="funcao_primaria">
                        <option @if (old('funcao_primaria') == 'Capitão/IGL') selected @endif>Capitão/IGL</option>
                        <option @if (old('funcao_primaria') == 'Entry Fragger') selected @endif>Entry Fragger</option>
                        <option @if (old('funcao_primaria') == 'Awper') selected @endif>Awper</option>
                        <option @if (old('funcao_primaria') == 'Trader') selected @endif>Trader</option>
                        <option @if (old('funcao_primaria') == 'Suporte') selected @endif>Suporte</option>
                        <option @if (old('funcao_primaria') == 'Rifler') selected @endif>Rifler</option>
                    </select>
                </div>
                <div class="form-group ">
                    <label for="funcao_secundaria">Função Secundária em jogo</label>
                    <div class="col-2 d-flex">
                        <select class="form-control " id="funcao_secundaria" name="funcao_secundaria">
                            <option @if (old('funcao_secundaria') == 'Capitão/IGL') selected @endif>Capitão/IGL</option>
                            <option @if (old('funcao_secundaria') == 'Entry Fragger') selected @endif>Entry Fragger</option>
                            <option @if (old('funcao_secundaria') == 'Awper') selected @endif>Awper</option>
                            <option @if (old('funcao_secundaria') == 'Trader') selected @endif>Trader</option>
                            <option @if (old('funcao_secundaria') == 'Suporte') selected @endif>Suporte</option>
                            <option @if (old('funcao_secundaria') == 'Rifler') selected @endif>Rifler</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="funcao_adicional">Função Adicional em jogo</label>
                        <div class="col-2 d-flex">
                            <select class="form-control " id="funcao_adicional" name="funcao_adicional">
                                <option @if (old('funcao_adicional') == 'Capitão/IGL') selected @endif>Capitão/IGL</option>
                                <option @if (old('funcao_adicional') == 'Entry Fragger') selected @endif>Entry Fragger</option>
                                <option @if (old('funcao_adicional') == 'Awper') selected @endif>Awper</option>
                                <option @if (old('funcao_adicional') == 'Trader') selected @endif>Trader</option>
                                <option @if (old('funcao_adicional') == 'Suporte') selected @endif>Suporte</option>
                                <option @if (old('funcao_adicional') == 'Rifler') selected @endif>Rifler</option>
                            </select>
                        </div>
                    </div>
                    <label for="basic-url">Facebook</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">facebook.com/</span>
                        </div>
                        <input type="text" class="form-control" id="facebook" placeholder="Link do seu perfil do facebook"
                            name="facebook" value="{{ old('facebook') }}">
                    </div>
                    <label for="basic-url">Instagram</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">instagram.com/</span>
                        </div>
                        <input type="text" class="form-control" id="instagram" placeholder="Link do seu perfil do instagram"
                            name="instagram" value="{{ old('instagram') }}">
                    </div>

                    <label for="basic-url">Gamersclub</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">gamersclub.com.br/jogador/</span>
                        </div>
                        <input type="text" class="form-control" id="gamersclub"
                            placeholder="Link do seu perfil de jogador da gamersclub" name="gamersclub"
                            value="{{ old('gamersclub') }}">
                    </div>

                    <label for="basic-url">Faceit</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">faceit.com/en/players/</span>
                        </div>
                        <input type="text" class="form-control" id="faceit"
                            placeholder="Link do seu perfil de jogador da faceit" name="faceit"
                            value="{{ old('faceit') }}">
                    </div>

                    <label for="basic-url">Twitter</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">twitter.com/</span>
                        </div>
                        <input type="text" class="form-control" id="twitter" placeholder="Link do seu perfil do  Twitter"
                            name="twitter" value="{{ old('twitter') }}">
                    </div>

                    <label for="basic-url">Steam</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">steamcommunity.com/id/</span>
                        </div>
                        <input type="text" class="form-control" id="steam" placeholder="Link do seu perfil da Steam"
                            name="steam" value="{{ old('steam') }}">
                    </div>


                    <label for="basic-url">Twitch</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">twitch.tv/</span>
                        </div>
                        <input type="text" class="form-control" id="twitch" placeholder="Link do seu perfil da Twitch"
                            name="twitch" value="{{ old('twitch') }}">
                    </div>
                    <div class="form-group">
                        <label for="email_contato">Email</label>
                        <input type="email" class="form-control" id="email_contato"
                            placeholder="Email para que outros usuários possam ver e entrarem em contato."
                            name="email_contato" value="{{ old('email_contato') }}">
                    </div>

                    <br>
                    <label for="imagem_perfil_jogador" class="h5">Selecione uma imagem para seu perfil de
                        jogador</label><br>
                    <input type="file" id="imagem_perfil_jogador" name="imagem_perfil_jogador">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" id="btnCriar">Criar Perfil de
                            Jogador</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <br><br><br>
    <script src="{{ asset('js/options.js') }}"></script>
@endsection
