@extends('jogador/layout')

@section('titulo', 'Visualizar')
    <link href={{ URL::asset('css/icones-social.css') }} rel="stylesheet">


@section('conteudo')
    <style>
        .accordion-button::after {
            background-color: white;
        }

    </style>
    @livewireStyles
    @if ($jogador)
        <div class="w-100 text-light bg-dark border border-light rounded " style="padding-bottom: 30px; margin-top: 40px ;">
            <h1 class="d-flex justify-content-center text-light " style="padding-bottom: 20px">
                {{ $jogador->nick_jogador }}</h1>
            <div class="border-top border-light"></div>
            <div class="">


                <p class="h5 text-light " style="margin: 10px">Frase de Perfil:
                    {{ $jogador->frase_perfil }}
                </p>
                <div class="border-top border-light"></div>
                <div class="w-100">
                    <p class="h5 text-light " style="margin: 10px">Descricao: </p><br>
                    <pre style="margin: 10px">{{ $jogador->descricao_perfil_jogador }}</pre>
                </div>
                <div class="border-top border-light"></div>


                <div class="d-flex justify-content-center ">
                    @if ($jogador->caminho_imagem_perfil_jogador)
                        <img src="{{ URL::asset($jogador->caminho_imagem_perfil_jogador) }}" class="w-25"
                            style="border-radius: 50%  ; border: solid black; margin: 10px">
                    @else
                        <img src="{{ URL::asset('images/user_without_image.png') }}" class="w-25"
                            style="border-radius: 50%  ; border: solid black; margin: 10px">
                    @endif
                </div>
                <div class="border-top border-light"></div>
                <div class="col" style="margin: 10px">
                    <p class="h5 text-light ">Funcao Primária: {{ $jogador->funcao_primaria }}</p>
                    <p class="h5 text-light ">Funcao Secundária: {{ $jogador->funcao_secundaria }}</p>
                    <p class="h5 text-light ">Funcao Adicional: {{ $jogador->funcao_adicional }}</p>
                    <p class="h5 text-light  text-light ">Jogador Ativo:
                        @if ($jogador->ativo == 0)
                            Não
                        @else
                            Sim
                        @endif
                    </p>
                </div>
                <div class="row">
                    <h3 class="d-flex justify-content-center">Sociais do jogador</h3>
                    <div class="d-flex justify-content-center " style="padding-top: 20px">

                        @if ($jogador->facebook)
                        <div class="col-sm">
                            
                        </div>
                            <div class="col-sm">
                                <a href="https://facebook.com/{{ $jogador->facebook }}" target="_blank">
                                    <img src="{{ URL::asset('images/logos/facebook.png') }}" alt=""
                                        class="fa border border-light rounded "
                                        style="background-color: #3B5998; padding: 5px; width: 50px; height: 60px;">
                                </a>
                            </div>
                        @endif
                        @if ($jogador->twitter)
                            <div class="col-sm">
                                <a href="https://twitter.com/{{ $jogador->twitter }}" target="_blank">
                                    <img src="{{ URL::asset('images/logos/twitter.png') }}" alt=""
                                        class="fa border border-light rounded "
                                        style="background-color: #1DA1F2; padding: 5px; width: 50px; height: 60px;">
                                </a>
                            </div>
                        @endif
                        @if ($jogador->twitch)
                            <div class="col-sm">
                                <a href="https://twitch.tv/{{ $jogador->twitch }}" target="_blank">
                                    <img src="{{ URL::asset('images/logos/twitch.png') }}" alt=""
                                        class="fa border border-light rounded "
                                        style="background-color: #503484; padding: 5px; width: 50px; height: 60px;">
                                </a>
                            </div>
                        @endif
                        @if ($jogador->instagram)
                            <div class="col-sm">
                                <a href="https:/instagram.com/{{ $jogador->instagram }}" target="_blank">
                                    <img src="{{ URL::asset('images/logos/instagram.png') }}" alt=""
                                        class="fa border border-light rounded "
                                        style="background-color: #125688; padding: 5px; width: 50px; height: 60px;">
                                </a>
                            </div>
                        @endif
                        @if ($jogador->gamersclub)
                            <div class="col-sm">
                                <a href="https://gamersclub.com.br/jogador/{{ $jogador->gamersclub }}" target="_blank">
                                    <img src="{{ URL::asset('images/logos/gamersclub.png') }}" alt=""
                                        class="fa border border-light rounded "
                                        style="background-color: #34458a; padding: 5px; width: 50px; height: 60px;">
                                </a>
                            </div>
                        @endif

                        @if ($jogador->faceit)
                            <div class="col-sm">
                                <a href="https://www.faceit.com/en/players/{{ $jogador->faceit }}" target="_blank"><img
                                        src="{{ URL::asset('images/logos/faceit.png') }}"
                                        class="fa border border-light rounded "
                                        style="background-color: #fd5c00; padding: 5px; width: 50px; height: 60px;"></a>
                            </div>
                        @endif
                        @if ($jogador->steam)
                            <div class="col-sm">
                                <a href="https://steamcommunity.com/id/{{ $jogador->steam }}" target="_blank"><img
                                        src="{{ URL::asset('images/logos/steam.png') }}" alt=""
                                        class="fa border border-light rounded border border-light rounded"
                                        style="background-color: #231f20; padding: 10px; width: 50px; height: 60px;"></a>
                            </div>
                        @endif
                    </div>
                    <div class="d-flex justify-content-center" style="padding-top: 20px">
                        @if ($jogador->email_contato)
                            <p class="h5"> Contato: {{ $jogador->email_contato }}</p>
                        @endif
                    </div>
                    @if ($convidar_jogador)
                        @if ($convidar_jogador == 1)
                            @if ($participa_de_time == 0)
                                @livewire('convidar-jogador-para-time', ['jogador' => $jogador->user_id])
                            @endif
                        @endif
                    @endif
                </div>
            </div>
            @if ($usuario_jogador == 1)
                <div class="d-flex justify-content-end" style="margin: 10px">
                    <a href="{{ url('jogador/' . Auth::id() . '/edit') }}">
                        <button class="btn btn-success">Editar Perfil de Jogador</button>
                    </a>
                </div>
            @endif
        </div>
        <div class="accordion accordion-flush text-light  bg-dark border border-light rounded" id="accordionFlushExample">
            <div class="accordion-item bg-dark">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed text-light bg-dark " type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Configuração de Computador do Jogador
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        @if ($config_pc_jogador)
                            <h5 class="text-light  border border-light rounded" style="padding: 5px">Monitor :
                                {{ $config_pc_jogador->monitor }} </h5>
                            <h5 class="text-light  border border-light rounded" style="padding: 5px">Mouse :
                                {{ $config_pc_jogador->mouse }} </h5>
                            <h5 class="text-light  border border-light rounded" style="padding: 5px">Mousepad :
                                {{ $config_pc_jogador->mousepad }} </h5>
                            <h5 class="text-light  border border-light rounded" style="padding: 5px">Teclado :
                                {{ $config_pc_jogador->teclado }} </h5>

                            <h5 class="text-light  border border-light rounded" style="padding: 5px">
                                Processador : {{ $config_pc_jogador->processador }} </h5>
                            <h5 class="text-light  border border-light rounded" style="padding: 5px">
                                Gabinete : {{ $config_pc_jogador->gabinete }} </h5>
                            <h5 class="text-light  border border-light rounded" style="padding: 5px">Memória Ram :
                                {{ $config_pc_jogador->memoria_ram }} </h5>
                            <h5 class="text-light  border border-light rounded" style="padding: 5px">Placa de Vídeo :
                                {{ $config_pc_jogador->placa_de_video }} </h5>
                            <h5 class="text-light  border border-light rounded" style="padding: 5px">Placa Mãe :
                                {{ $config_pc_jogador->placa_mae }} </h5>
                            <h5 class="text-light  border border-light rounded" style="padding: 5px">Fonte :
                                {{ $config_pc_jogador->fonte }} </h5>
                            @if ($config_pc_jogador->caminho_imagem_pc_jogador)
                                <div class=" justify-content-end">
                                    <img src="{{ URL::asset($config_pc_jogador->caminho_imagem_pc_jogador) }}"
                                        class="border border-light rounded w-50" style="padding: 5px">
                                </div>
                            @endif
                        @endif

                    </div>
                </div>
            </div>

        </div>

        <div class="accordion accordion-flush text-light  border border-light rounded" id="accordionFlushExample2">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne2">
                    <button class="accordion-button collapsed text-light bg-dark" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne2" aria-expanded="false" aria-controls="flush-collapseOne2">
                        Configuração de jogo do jogador
                    </button>
                </h2>
                <div id="flush-collapseOne2" class="accordion-collapse collapse bg-dark" aria-labelledby="flush-headingOne2"
                    data-bs-parent="#accordionFlushExample2">
                    <div class="accordion-body">
                        @if ($config_cs_jogador)
                            <h5 class="text-light  border border-light rounded" style="padding: 5px">Resolução :
                                {{ $config_cs_jogador->resolucao }} </h5>
                            <h5 class="text-light  border border-light rounded" style="padding: 5px">Sensibilidade :
                                {{ $config_cs_jogador->sensibilidade }} </h5>
                            <h5 class="text-light  border border-light rounded" style="padding: 5px">Crosshair/Mira :
                                {{ $config_cs_jogador->crosshair }} </h5>
                            <h5 class="text-light  border border-light rounded" style="padding: 5px">Viewmodel :
                                {{ $config_cs_jogador->viewmodel }} </h5>
                            @if ($config_cs_jogador->caminho_cfg)
                                <form
                                    action="{{ route('configcsjogadorController.downloadcfg', $config_cs_jogador->id_jogador) }}"
                                    method="POST">
                                    @csrf
                                    <button class="btn btn-primary" type="submit">Baixar Cfg</button>
                                </form>
                            @endif

                        @endif
                    </div>
                </div>
            </div>
        </div>
        <br><br>

        </div>
    @else
        <div class="alert alert-warning" role="alert" style="margin-top: 30px">
            Este jogador não está cadastrado em nosso sistema!
        </div>
        <button type="button" class="btn btn-info">Buscar outros jogadores</button>
    @endif
    @livewireScripts
@endsection
