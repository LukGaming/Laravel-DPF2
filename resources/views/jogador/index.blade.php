@extends('jogador/layout')

@section('titulo', 'Home')

@section('conteudo')
    <style>
        .card-title {
            background-color: #5F5AE6;
        }

        .card-button-link {

            background-color: #61C44B;
        }

        .alinhando-texto-dos-cards {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

    </style>
    <!--Verificar se este usuário tem um time-->

    <div class="row alinhando-cards" style="margin-top: 130px; " >
        @if ($tem_jogador == 0)
            <div class="col-sm-4">
                <div class="card text-white  card-itens card-title " style=" padding: 3px">
                    <h3 class="card-title mx-auto h4 ">Perfil de Jogador</h3>
                    <div class=" bg-light text-dark" style="height: 150px">
                        <p class="card-text h5 text-center alinhando-texto-dos-cards">
                            Voce ainda não possui um perfil de jogador!
                        </p>
                    </div>
                    <a href="{{ url('jogador/create') }}" class="btn  stretched-link text-dark card-button-link" style="padding: 4px;  border-style: solid;
                        border-style: outset;
                        border-color: #3E872E;
                        border-width: 3px;">
                        <h5>Criar um Perfil de Jogador</h5>
                    </a>
                </div>
            </div>
        @else($tem_jogador == 1)
            <div class="col-sm-4">
                <div class="card text-white  card-itens card-title " style=" padding: 3px">
                    <h3 class="card-title mx-auto h4 ">Perfil de Jogador</h3>
                    <div class=" bg-light text-dark" style="height: 150px">
                        <p class="card-text h5 text-center alinhando-texto-dos-cards " style="margin-top: auto">
                            Olá! Parece que voce já tem um Perfil de jogador!
                        </p>
                    </div>
                    <a href="{{ url('jogador/create') }}" class="btn  stretched-link text-dark card-button-link" style="padding: 4px;  border-style: solid;
                        border-style: outset;
                        border-color: #3E872E;
                        border-width: 3px;">
                        <h5>Ir para seu perfil de jogador</h5>
                    </a>
                </div>
            </div>
        @endif
        <div class="col-sm-4">
            <div class="card text-white  card-itens card-title " style=" padding: 3px">
                <h3 class="card-title mx-auto h4 ">Buscar por Jogadores</h3>
                <div class=" bg-light text-dark" style="height: 150px">
                    <p class="card-text h5 text-center alinhando-texto-dos-cards">
                        Busque por jogadores cadastrados no sistema!
                    </p>
                </div>
                <a href="{{ url('search/jogador') }}" class="btn  stretched-link text-dark card-button-link" style="padding: 4px;  border-style: solid;
                    border-style: outset;
                    border-color: #3E872E;
                    border-width: 3px;">
                    <h5>Buscar Jogadores</h5>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-white  card-itens card-title " style=" padding: 3px">
                <h3 class="card-title mx-auto h4 ">Buscar por Times</h3>
                <div class=" bg-light text-dark" style="height: 150px">
                    <p class="card-text h5 text-center alinhando-texto-dos-cards">
                        Busque por Times cadastrados no sistema!
                    </p>
                </div>
                <a href="{{ url('search/times') }}" class="btn  stretched-link text-dark card-button-link" style="padding: 4px;  border-style: solid;
                    border-style: outset;
                    border-color: #3E872E;
                    border-width: 3px;">
                    <h5>Buscar Times</h5>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-white  card-itens card-title " style=" padding: 3px">
                <h3 class="card-title mx-auto h4 ">Buscar por Vagas</h3>
                <div class=" bg-light text-dark" style="height: 150px">
                    <p class="card-text h5 text-center alinhando-texto-dos-cards">
                        Busque por Vagas que foram colocadas pelos times cadastrados no sistema!
                    </p>
                </div>
                <a href="{{ url('search/vagas') }}" class="btn  stretched-link text-dark card-button-link" style="padding: 4px;  border-style: solid;
                    border-style: outset;
                    border-color: #3E872E;
                    border-width: 3px;">
                    <h5>Buscar Vagas</h5>
                </a>
            </div>
        </div>
    </div>

    <!--Verificar se este usuário tem um perfil de jogador-->



    <!--buscar times-->


    <!--buscar Jogadores-->







@endsection
