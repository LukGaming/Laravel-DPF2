@extends('jogador/layout')

@section('titulo', 'Home')
    <link href={{ URL::asset('css/icones-social.css') }} rel="stylesheet">


@section('conteudo')
    @if ($jogador)
        <div class="w-100 cor-texto-site border border-dark rounded " style="padding-bottom: 30px; margin-top: 40px ;">
            <h1 class="d-flex justify-content-center cor-texto-site" style="padding-bottom: 20px">
                {{ $jogador->nick_jogador }}</h1>
            <div class="container-fluid ">
                <div class="">
                    <div>
                        <p class="h5 cor-texto-site">Frase de Perfil:
                            <br>{{ $jogador->frase_perfil }}
                        </p>
                        <div class="d-flex justify-content-start w-30 " style="padding: 15px">

                            <pre style="margin-right: 200">
                                                                                                                <p class="h5 cor-texto-site">Descricao: <br>
                                                                                                                        <div class="descricao_jogador w-30 cor-texto-site"> {{ $jogador->descricao_perfil_jogador }}</div>
                                                                                                                            </pre>
                            </p>
                            <div class="w-30 justify-content-end ">
                                <img src="{{ URL::asset($jogador->caminho_imagem_perfil_jogador) }}"
                                    class="border border-dark rounded">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <p class="h5 cor-texto-site">Funcao Primária: {{ $jogador->funcao_primaria }}</p>
                    <p class="h5 cor-texto-site">Funcao Secundária: {{ $jogador->funcao_secundaria }}</p>
                    <p class="h5 cor-texto-site">Funcao Adicional: {{ $jogador->funcao_adicional }}</p>
                    <p class="h5 cor-texto-site">Jogador Ativo:
                        @if ($jogador->ativo == 0)
                            <div class="cor-texto-site"> Não</div>
                        @else
                            <div class="cor-texto-site"> Sim</div>
                        @endif
                    </p>
                </div>
                <div class="col">
                    <h3 class="d-flex justify-content-center">Sociais do jogador</h3>
                    <div class="d-flex justify-content-center " style="padding-top: 20px">
                        @if ($jogador->facebook)
                            <a href="https://gamersclub.com.br/jogador/{{ $jogador->facebook }}" target="_blank">
                                <img src="{{ URL::asset('images/logos/facebook.png') }}" alt=""
                                    class="fa border border-dark rounded "
                                    style="background-color: #3B5998; padding: 5px; width: 50px; height: 60px;">
                            </a>
                        @endif
                        @if ($jogador->twitter)
                            <a href="https://gamersclub.com.br/jogador/{{ $jogador->twitter }}" target="_blank">
                                <img src="{{ URL::asset('images/logos/twitter.png') }}" alt=""
                                    class="fa border border-dark rounded "
                                    style="background-color: #1DA1F2; padding: 5px; width: 50px; height: 60px;">
                            </a>
                        @endif
                        @if ($jogador->twitch)
                            <a href="https://gamersclub.com.br/jogador/{{ $jogador->twitch }}" target="_blank">
                                <img src="{{ URL::asset('images/logos/twitch.png') }}" alt=""
                                    class="fa border border-dark rounded "
                                    style="background-color: #503484; padding: 5px; width: 50px; height: 60px;">
                            </a>
                        @endif
                        @if ($jogador->instagram)
                            <a href="https://gamersclub.com.br/jogador/{{ $jogador->instagram }}" target="_blank">
                                <img src="{{ URL::asset('images/logos/instagram.png') }}" alt=""
                                    class="fa border border-dark rounded "
                                    style="background-color: #125688; padding: 5px; width: 50px; height: 60px;">
                            </a>
                        @endif
                        @if ($jogador->gamersclub)
                            <a href="https://gamersclub.com.br/jogador/{{ $jogador->gamersclub }}" target="_blank">
                                <img src="{{ URL::asset('images/logos/gamersclub.png') }}" alt=""
                                    class="fa border border-dark rounded "
                                    style="background-color: #34458a; padding: 5px; width: 50px; height: 60px;">
                            </a>
                        @endif
                        @if ($jogador->faceit)
                            <a href="https://www.faceit.com/en/players/{{ $jogador->faceit }}" target="_blank"><img
                                    src="{{ URL::asset('images/logos/faceit.png') }}"
                                    class="fa border border-dark rounded "
                                    style="background-color: #fd5c00; padding: 5px; width: 50px; height: 60px;"></a>
                        @endif
                        @if ($jogador->steam)
                            <a href="https://steamcommunity.com/id/{{ $jogador->steam }}" target="_blank"><img
                                    src="{{ URL::asset('images/logos/steam.png') }}" alt=""
                                    class="fa border border-dark rounded border border-dark rounded"
                                    style="background-color: #231f20; padding: 10px; width: 50px; height: 60px;"></a>
                        @endif
                    </div>
                    <div class="d-flex justify-content-center" style="padding-top: 20px">
                        @if ($jogador->email_contato)
                            <p class="h5"> Contato: {{ $jogador->email_contato }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion accordion-flush cor-texto-site border border-dark rounded" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed cor-texto-site" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Configuração de Computador do Jogador
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        @if ($config_pc_jogador)
                            <h5 class="cor-texto-site border border-dark rounded" style="padding: 5px">Monitor :
                                {{ $config_pc_jogador->monitor }} </h5>
                            <h5 class="cor-texto-site border border-dark rounded" style="padding: 5px">Mouse :
                                {{ $config_pc_jogador->mouse }} </h5>
                            <h5 class="cor-texto-site border border-dark rounded" style="padding: 5px">Mousepad :
                                {{ $config_pc_jogador->mousepad }} </h5>
                            <h5 class="cor-texto-site border border-dark rounded" style="padding: 5px">Teclado :
                                {{ $config_pc_jogador->teclado }} </h5>

                            <h5 class="cor-texto-site border border-dark rounded" style="padding: 5px">
                                Processador : {{ $config_pc_jogador->processador }} </h5>
                            <h5 class="cor-texto-site border border-dark rounded" style="padding: 5px">
                                Gabinete : {{ $config_pc_jogador->gabinete }} </h5>
                            <h5 class="cor-texto-site border border-dark rounded" style="padding: 5px">Memória Ram :
                                {{ $config_pc_jogador->memoria_ram }} </h5>
                            <h5 class="cor-texto-site border border-dark rounded" style="padding: 5px">Placa de Vídeo :
                                {{ $config_pc_jogador->placa_de_video }} </h5>
                            <h5 class="cor-texto-site border border-dark rounded" style="padding: 5px">Placa Mãe :
                                {{ $config_pc_jogador->placa_mae }} </h5>
                            <h5 class="cor-texto-site border border-dark rounded" style="padding: 5px">Fonte :
                                {{ $config_pc_jogador->fonte }} </h5>

                            <div class=" justify-content-end">
                                <img src="{{ URL::asset($config_pc_jogador->caminho_imagem_pc_jogador) }}"
                                    class="border border-dark rounded w-50" style="padding: 5px">
                            </div>
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
@endsection
