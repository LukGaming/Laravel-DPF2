@extends('jogador/layout')

@section('titulo', 'Home')

@section('conteudo')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <style>
        .form-group {
            margin: 10px;
        }
    </style>
    <h1>Cadastrando configuração de Jogo</h1>
    <form method="POST" action="{{ route('configcsjogador.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="resolucao">Resolução:</label>
            <input type="text" class="form-control" id="resolucao" name="resolucao" value="{{ old('resolucao') }}">
        </div>
        <div class="form-group">
            <label for="sensibilidade">Sensbilidade:</label>
            <input type="text" class="form-control" id="sensibilidade" name="sensibilidade" value="{{ old('sensibilidade') }}">
        </div>
        <div class="form-group">
            <label for="crosshair">Crosshair/Mira</label>
            <input type="text" class="form-control" id="crosshair" name="crosshair" value="{{ old('crosshair') }}">
        </div>
        <div class="form-group">
            <label for="viewmodel">Viewmodel</label>
            <input type="text" class="form-control" id="viewmodel" name="viewmodel" value="{{ old('viewmodel') }}">
        </div>
        <label for="black_bars">Black Bars/Bordas Pretas</label><br>
        <select name="black_bars" id="black_bars">
            <option value="0">Não</option>
            <option value="1">Sim</option>
        </select><br>
        <br>
        <span class="badge badge-primary bg-danger" style="padding: 10px; margin: 10px" id="spanCfg"></span>
        <br>
        <label for="cfg">Fazer Upload de Cfg</label><br>
        <input type="file" name="cfg" id="cfg">

        <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary" id="btnSalvar">Cadastrar configuração de jogo</button>
    </div>
        </div>
    </form>
    <br><br><br>
    <script src="{{ asset('js/valida_extensao_imagem.js') }}"></script>
@endsection
