@extends('jogador/layout')

@section('titulo', 'Home')

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
    <style>
        .form-group {
            margin: 10px;
        }

    </style>
    <div class="bg-dark text-light" style="padding-bottom: 20px">
        <div class="d-flex justify-content-center">
        <h1>Cadastrando configuração de seu computador</h1>
    </div>
        <form method="POST" action="{{ route('configpcjogador.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="monitor">Monitor</label>
                <input type="text" class="form-control" id="monitor" name="monitor" value="{{ old('monitor') }}">
            </div>
            <div class="form-group">
                <label for="teclado">Teclado</label>
                <input type="text" class="form-control" id="teclado" name="teclado" value="{{ old('teclado') }}">
            </div>
            <div class="form-group">
                <label for="mouse">Mouse</label>
                <input type="text" class="form-control" id="mouse" name="mouse" value="{{ old('mouse') }}">
            </div>
            <div class="form-group">
                <label for="mousepad">Mousepad</label>
                <input type="text" class="form-control" id="mousepad" name="mousepad" value="{{ old('mousepad') }}">
            </div>
            <div class="form-group">
                <label for="processador">Processador</label>
                <input type="text" class="form-control" id="processador" name="processador"
                    value="{{ old('processador') }}">
            </div>
            <div class="form-group">
                <label for="placa_mae">Placa Mãe</label>
                <input type="text" class="form-control" id="placa_mae" name="placa_mae" value="{{ old('placa_mae') }}">
            </div>
            <div class="form-group">
                <label for="placa_de_video">Placa de Vídeo</label>
                <input type="text" class="form-control" id="placa_de_video" name="placa_de_video"
                    value="{{ old('placa_de_video') }}">
            </div>
            <div class="form-group">
                <label for="memoria_ram">Memória Ram</label>
                <input type="text" class="form-control" id="memoria_ram" name="memoria_ram"
                    value="{{ old('memoria_ram') }}">
            </div>
            <div class="form-group">
                <label for="fonte">Fonte</label>
                <input type="text" class="form-control" id="fonte" name="fonte" value="{{ old('fonte') }}">
            </div>
            <div class="form-group">
                <label for="gabinete">Gabinete</label>
                <input type="text" class="form-control" id="gabinete" name="gabinete" value="{{ old('gabinete') }}">
            </div>
            <div class="form-group">
                <label for="imagem_pc_jogador">Imagem do seu computador</label><br>
                <input type="file" id="imagem_pc_jogador" name="imagem_pc_jogador">
                <br><br>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary" id="btnCriar">Cadastrar dados de computador</button>
            </div>
    </div>
    </form>
</div>
    <br><br><br>
@endsection
