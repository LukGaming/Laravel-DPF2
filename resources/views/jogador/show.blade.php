@extends('jogador/layout')

@section('titulo', 'Home')
    <link href={{ URL::asset('css/icones-social.css') }} rel="stylesheet">


@section('conteudo')
    @if ($jogador)
        <div class="w-100 text-white border border-white rounded" style="padding-bottom: 30px; margin-top: 40px ;background-color: rgb(22, 20, 20);" >
            <h1 class="d-flex justify-content-center" style="padding-bottom: 20px">
                {{ $jogador->nick_jogador }}</h1>
            <div class="container-fluid ">
                <div class="">
                    <div >
                        <p class="h5">Frase de Perfil:
                            <br>{{ $jogador->frase_perfil }}
                        </p>
                        <div class="d-flex justify-content-start w-30 " style="padding: 15px">
                            
                            <pre style="margin-right: 200">
                                <p class="h5">Descricao: <br>
                                        <div class="descricao_jogador w-30 "> {{ $jogador->descricao_perfil_jogador }}</div>
                                            </pre>
                            </p>
                            <div class="w-30 justify-content-end">
                                <img src="{{ URL::asset($jogador->caminho_imagem_perfil_jogador) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <p class="h5">Funcao Primária: {{ $jogador->funcao_primaria }}</p>
                    <p class="h5">Funcao Secundária: {{ $jogador->funcao_secundaria }}</p>
                    <p class="h5">Funcao Adicional: {{ $jogador->funcao_adicional }}</p>
                    <p class="h5">Jogador Ativo:
                        @if ($jogador->ativo == 0)
                            Não
                        @else
                            Sim
                        @endif
                    </p>
                </div>
                <div class="col">
                    <h3 class="d-flex justify-content-center">Sociais do jogador</h3>
                    <div class="d-flex justify-content-center " style="padding-top: 20px">
                        @if ($jogador->facebook)
                            <a href="https://gamersclub.com.br/jogador/{{ $jogador->facebook }}" target="_blank">
                                <img src="{{ URL::asset('images/logos/facebook.png') }}" alt="" class="fa"
                                    style="background-color: #3B5998; padding: 5px; width: 50px; height: 60px;">
                            </a>
                        @endif
                        @if ($jogador->twitter)
                            <a href="https://gamersclub.com.br/jogador/{{ $jogador->twitter }}" target="_blank">
                                <img src="{{ URL::asset('images/logos/twitter.png') }}" alt="" class="fa"
                                    style="background-color: #1DA1F2; padding: 5px; width: 50px; height: 60px;">
                            </a>
                        @endif
                        @if ($jogador->twitch)
                            <a href="https://gamersclub.com.br/jogador/{{ $jogador->twitch }}" target="_blank">
                                <img src="{{ URL::asset('images/logos/twitch.png') }}" alt="" class="fa"
                                    style="background-color: #503484; padding: 5px; width: 50px; height: 60px;">
                            </a>
                        @endif
                        @if ($jogador->instagram)
                            <a href="https://gamersclub.com.br/jogador/{{ $jogador->instagram }}" target="_blank">
                                <img src="{{ URL::asset('images/logos/instagram.png') }}" alt="" class="fa"
                                    style="background-color: #125688; padding: 5px; width: 50px; height: 60px;">
                            </a>
                        @endif
                        @if ($jogador->gamersclub)
                            <a href="https://gamersclub.com.br/jogador/{{ $jogador->gamersclub }}" target="_blank">
                                <img src="{{ URL::asset('images/logos/gamersclub.png') }}" alt="" class="fa"
                                    style="background-color: #34458a; padding: 5px; width: 50px; height: 60px;">
                            </a>
                        @endif
                        @if ($jogador->faceit)
                            <a href="https://www.faceit.com/en/players/{{ $jogador->faceit }}" target="_blank"><img
                                    src="{{ URL::asset('images/logos/faceit.png') }}" class="fa"
                                    style="background-color: #fd5c00; padding: 5px; width: 50px; height: 60px;"></a>
                        @endif
                        @if ($jogador->steam)
                            <a href="https://steamcommunity.com/id/{{ $jogador->steam }}" target="_blank"><img
                                    src="{{ URL::asset('images/logos/steam.png') }}" alt="" class="fa"
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

        </div>
    @else
        <div class="alert alert-warning" role="alert" style="margin-top: 30px">
            Este jogador não está cadastrado em nosso sistema!
        </div>
        <button type="button" class="btn btn-info">Buscar outros jogadores</button>
    @endif

@endsection
