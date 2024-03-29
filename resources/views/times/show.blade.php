@extends('jogador/layout')

@section('titulo', 'Home')
    <link href={{ URL::asset('css/icones-social.css') }} rel="stylesheet">


@section('conteudo')
    <style>
        .centered {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translate(-50%, -50%);
            color: crimson;
        }

        .div-image {
            position: relative;
            text-align: center;
            color: white;
        }

    </style>
    @livewireStyles
    <div class="bg-dark text-light rounded" style="margin-bottom: 10px">
        @if ($time)
            <div class="w-100  border border-dark rounded " style="padding-bottom: 30px; margin-top: 40px ;">
                <h1 class="d-flex justify-content-center " style="padding-bottom: 20px">
                    {{ $time->nome }}</h1>
                <div class="container-fluid ">
                    <div class="">
                        <div>
                            <p class="h5 ">Frase de Perfil:
                                <br>{{ $time->frase }}
                            </p>
                            <div class="d-flex justify-content-around" style="padding: 15px">
                                <pre>{{ $time->descricao }}</pre>
                                @if ($time->caminho_imagem_time)
                                    <img src=" {{ url($time->caminho_imagem_time) }}" alt=""
                                        class="img-thumbnail img-fluid" width="200px" style="border-radius: 50%">
                                @else
                                    <img src="  {{ asset('images/user_without_image.png') }} " alt=""
                                        class="img-thumbnail img-fluid" width="200px" style="border-radius: 50%">

                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <h3 class="d-flex justify-content-center">Sociais do time</h3>
                        <div class="d-flex justify-content-center " style="padding-top: 20px">
                            @if ($time->facebook)
                                <a href="https://facebook.com/{{ $time->facebook }}" target="_blank">
                                    <img src="{{ URL::asset('images/logos/facebook.png') }}" alt=""
                                        class="fa border border-dark rounded "
                                        style="background-color: #3B5998; padding: 5px; width: 50px; height: 60px;">
                                </a>
                            @endif
                            @if ($time->twitter)
                                <a href="https://twitter.com/{{ $time->twitter }}" target="_blank">
                                    <img src="{{ URL::asset('images/logos/twitter.png') }}" alt=""
                                        class="fa border border-dark rounded "
                                        style="background-color: #1DA1F2; padding: 5px; width: 50px; height: 60px;">
                                </a>
                            @endif
                            @if ($time->twitch)
                                <a href="https://twitch.tv/{{ $time->twitch }}" target="_blank">
                                    <img src="{{ URL::asset('images/logos/twitch.png') }}" alt=""
                                        class="fa border border-dark rounded "
                                        style="background-color: #503484; padding: 5px; width: 50px; height: 60px;">
                                </a>
                            @endif
                            @if ($time->instagram)
                                <a href="https://instagram.com/{{ $time->instagram }}" target="_blank">
                                    <img src="{{ URL::asset('images/logos/instagram.png') }}" alt=""
                                        class="fa border border-dark rounded "
                                        style="background-color: #125688; padding: 5px; width: 50px; height: 60px;">
                                </a>
                            @endif
                            @if ($time->gamersclub)
                                <a href="https://gamersclub.com.br/time/{{ $time->gamersclub }}" target="_blank">
                                    <img src="{{ URL::asset('images/logos/gamersclub.png') }}" alt=""
                                        class="fa border border-dark rounded "
                                        style="background-color: #34458a; padding: 5px; width: 50px; height: 60px;">
                                </a>
                            @endif
                            @if ($time->faceit)
                                <a href="https://www.faceit.com/en/teams/{{ $time->faceit }}" target="_blank"><img
                                        src="{{ URL::asset('images/logos/faceit.png') }}"
                                        class="fa border border-dark rounded "
                                        style="background-color: #fd5c00; padding: 5px; width: 50px; height: 60px;"></a>
                            @endif
                            @if ($time->steam)
                                <a href="https://steamcommunity.com/id/{{ $time->steam }}" target="_blank"><img
                                        src="{{ URL::asset('images/logos/steam.png') }}" alt=""
                                        class="fa border border-dark rounded border border-dark rounded"
                                        style="background-color: #231f20; padding: 10px; width: 50px; height: 60px;"></a>
                            @endif
                        </div>
                        <div class="d-flex justify-content-center" style="padding-top: 20px">
                            @if ($time->email)
                                <p class="h5"> Contato: {{ $time->email }}</p>
                            @endif
                        </div>
                        @if ($time_admin == 1)
                            <div class="d-flex justify-content-end">
                                <a href="{{ url('time/' . $time->id . '/edit') }}">
                                    <button class="btn btn-success">Editar Time</button>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @if ($jogadores_do_time)
                <div class="d-flex justify-content-center ">
                    <div class="h5"> Jogadores deste Time</div>
                </div>
                <div class="d-flex justify-content-center ">
                    @foreach ($jogadores_do_time as $jogador)
                        <div style="margin: 5px" class="div-image">
                            @if ($jogador['imagem'])
                                <img src="{{ asset($jogador['imagem']) }}" class="img-fluid" width="150px"
                                    style="border-radius: 50%">
                                <div class="h5 centered">{{ $jogador['nome'] }}</div>
                            @else
                                <img src="{{ asset('images/user_without_image.png') }}" class="img-fluid" width="150px"
                                    style="border-radius: 50%">
                                <div class="h5 centered">{{ $jogador['nome'] }}</div>
                            @endif
                        </div>

                    @endforeach
                </div>
                @foreach ($jogadores_do_time as $jogador)
                    @if ($jogador['id_jogador'] == Auth::id())
                        @livewire('sair-do-time', ['id_time'=>$time->id, 'id_jogador'=>$jogador['id_jogador']])

                    @endif
                @endforeach
            @endif
    </div>

    @if (count($horarios_treino) > 0)
        <div class="w-100  border border-dark rounded bg-dark text-light"
            style="padding-bottom: 30px; margin-top: 10px ; margin-bottom: 10px">
            <h1 class="d-flex justify-content-center " style="padding-bottom: 20px">
                Horarios de Treino</h1>
            <hr>
            @foreach ($horarios_treino as $horario_treino)
                <div class="d-flex justify-content-center">
                    <div class="card text-white bg-primary w-75" style="margin: 10px;">
                        <div class="card-header">
                            <h5>{{ $horario_treino->dia_da_semana }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                            <div class="d-flex justify-content-between">
                                <h5>Horario de Inicio: {{ $horario_treino->horario_inicio }} </h5>
                                <h5>Horario de Término: {{ $horario_treino->horario_fim }}</h5>
                            </div>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    @auth
        @if ($time_admin == 1)
            @if (count($inscritos_na_vaga) > 0)

                <div class="bg-dark text-light  rounded" style="margin-bottom: 10px">
                    <div class=" rounded" style="padding: 10px">
                        <div class="d-flex justify-content-center h5">Jogadores Inscritos para suas Vagas</div>
                        @foreach ($inscritos_na_vaga as $inscrito)
                            <div class="border border-light" style="padding: 10px">
                                <div class="h5">Nome do Jogador: {{ $inscrito->name }}</div>
                                <div class="h5">Função Inscrita: {{ $inscrito->funcao }}</div>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ url('jogador/' . $inscrito->user_id) }}"> <button
                                            class="btn btn-secondary">Ver
                                            Perfil de
                                            Jogador</button></a>
                                    <a href="{{ url('mensagens-time/' . $time->id . '/jogador/' . $inscrito->user_id) }}">
                                        <button class="btn btn-info">Enviar Mensagem para jogador</button></a>
                                    @livewire('convidando-jogador-inscrito-na-vaga-para-time', ['id_jogador' =>
                                    $inscrito->user_id])

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @else
            @livewire('inscrevendo-vaga', ['time' => $time->id])
        @endif
    @endauth
    @endif
    @livewireScripts
@endsection
