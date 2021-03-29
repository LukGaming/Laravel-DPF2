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
    @if (session('nome_existe'))
    <div class="alert alert-danger">
        {{ session('nome_existe') }}
    </div>
@endif
    <form method="POST" action="{{ route('time.store') }}" enctype="multipart/form-data">
        @csrf
       
        <div class="form-group" style="margin-bottom: 10px">
            <label for="nome">Nome do time</label>
            <input type="text" class="form-control" id="nome" placeholder="Nome para seu time" name="nome"
                value="{{ old('nome')}}@if (session('ultimo_request_nome')){{ session('ultimo_request_nome') }}@endif">               
        </div>
        
        <span class="nome_igual"></span>  
        <div class="form-group">
            <label for="frase">Frase de Perfil</label>
            <input type="text" class="form-control" id="frase"
                placeholder="Uma Frase de perfil que exibirá quando verem o Perfil do time" name="frase"
                value="{{ old('frase') }}@if (session('ultimo_request_frase')){{ session('ultimo_request_frase') }}@endif">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição do perfil do Time</label>
            <textarea class="form-control" id="descricao" rows="3" name="descricao">{{ old('descricao') }}@if (session('ultimo_request_descricao')){{ session('ultimo_request_descricao') }}@endif</textarea>
        </div>
        <label for="basic-url">Facebook</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">facebook.com/</span>
            </div>
            <input type="text" class="form-control" id="facebook" placeholder="Link do seu perfil do facebook"
                name="facebook" value="{{ old('facebook') }}@if (session('ultimo_request_facebook')){{ session('ultimo_request_facebook') }}@endif">
        </div>
        <label for="basic-url">Instagram</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">instagram.com/</span>
            </div>
            <input type="text" class="form-control" id="instagram" placeholder="Link do seu perfil do instagram"
                name="instagram" value="{{ old('instagram') }}@if (session('ultimo_request_instagram')){{ session('ultimo_request_instagram') }}@endif">
        </div>
        <label for="basic-url">Gamersclub</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">gamersclub.com.br/time/</span>
            </div>
            <input type="text" class="form-control" id="gamersclub"
                placeholder="Link do seu perfil de jogador da gamersclub" name="gamersclub"
                value="{{ old('gamersclub') }}@if (session('ultimo_request_gamersclub')){{ session('ultimo_request_gamersclub') }}@endif">
        </div>

        <label for="basic-url">Faceit</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">faceit.com/en/players/</span>
            </div>
            <input type="text" class="form-control" id="faceit" placeholder="Link do seu perfil de jogador da faceit"
                name="faceit" value="{{ old('faceit') }}@if (session('ultimo_request_faceit')){{ session('ultimo_request_faceit') }}@endif">
        </div>

        <label for="basic-url">Twitter</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">twitter.com/</span>
            </div>
            <input type="text" class="form-control" id="twitter" placeholder="Link do seu perfil do  Twitter" name="twitter"
                value="{{ old('twitter') }}@if (session('ultimo_request_twitter')){{ session('ultimo_request_twitter') }}@endif">
        </div>

        <label for="basic-url">Steam</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">steamcommunity.com/id/</span>
            </div>
            <input type="text" class="form-control" id="steam" placeholder="Link do seu perfil da Steam" name="steam"
                value="{{ old('steam') }}@if (session('ultimo_request_steam')){{ session('ultimo_request_steam') }}@endif">
        </div>
        <label for="basic-url">Twitch</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">twitch.tv/</span>
            </div>
            <input type="text" class="form-control" id="twitch" placeholder="Link do seu perfil da Twitch" name="twitch"
                value="{{ old('twitch') }}@if (session('ultimo_request_twitch')){{ session('ultimo_request_twitch') }}@endif">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email"
                placeholder="Email para que outros usuários possam ver e entrarem em contato." name="email"
                value="{{ old('email') }}@if (session('ultimo_request_email')){{ session('ultimo_request_email') }}@endif">
        </div>
        <br>
        <label for="imagem_perfil_jogador" class="h5">Selecione uma imagem para seu perfil de jogador</label><br>
        <input type="file" id="imagem_perfil_jogador" name="imagem_perfil_jogador">
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" id="btnCriarTime">Criar Perfil de
                Jogador</button>
        </div>
    </form>
    <br><br><br>
    <script src="{{ asset('js/nomes_times.js') }}"></script>
@endsection
