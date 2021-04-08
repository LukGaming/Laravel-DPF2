@extends('jogador/layout')

@section('titulo', 'Home')
    <link href={{ URL::asset('css/icones-social.css') }} rel="stylesheet">


@section('conteudo')
    @livewireStyles
    @if ($time)
        <div class="w-100 cor-texto-site border border-dark rounded " style="padding-bottom: 30px; margin-top: 40px ;">
            <h1 class="d-flex justify-content-center cor-texto-site" style="padding-bottom: 20px">
                {{ $time->nome }}</h1>
            <div class="container-fluid ">
                <div class="">
                    <div>
                        <p class="h5 cor-texto-site">Frase de Perfil:
                            <br>{{ $time->frase }}
                        </p>
                        <div class="d-flex justify-content-start w-30 " style="padding: 15px">

                            <pre style="margin-right: 200">
                                                                        {{ $time->descricao }} 
                                                                    </pre>
                            @if ($time->caminho_imagem_time)
                                <div class="w-30 justify-content-end ">
                                    <img src="{{ URL::asset($time->caminho_imagem_time) }}" class="w-75"
                                        class="border border-dark rounded" style="border-radius: 50%">
                                </div>
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
        @if (count($horarios_treino) > 0)
            <div class="w-100 cor-texto-site border border-dark rounded "
                style="padding-bottom: 30px; margin-top: 40px ; margin-bottom: 10px">
                <h1 class="d-flex justify-content-center cor-texto-site" style="padding-bottom: 20px">
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
        @if (count($horarios_treino) > 0)
            <div class="w-100 cor-texto-site border border-dark rounded "
                style="padding-bottom: 30px; margin-top: 40px ; margin-bottom: 10px">
                <h1 class="d-flex justify-content-center cor-texto-site" style="padding-bottom: 20px">
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
                    @foreach ($inscritos_na_vaga as $inscrito)
                        {{ $inscrito }}
                    @endforeach
                @endif
            @else
                @livewire('inscrevendo-vaga', ['time' => $time->id])
            @endif
        @endauth
    @endif
    @livewireScripts
@endsection
