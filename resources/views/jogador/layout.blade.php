<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <title>@yield('titulo') - Jogador</title>
    <style>
        .cor-texto-site {
            color: black;
        }

        .corBtnNav {
            background-color: white;
        }

    </style>
    @livewireStyles
</head>
@php
use App\Http\Controllers\JogadorController;
$user_has_jogador = JogadorController::VerificaSeUsuarioTemJogador();
@endphp


<body>
    @if (Route::has('login'))
        @auth
            <nav class="navbar navbar-expand-md navbar-dark border border-dark corBtnNav">
                <a class="navbar-brand " href="{{ route('jogador.index') }}"
                    style="padding-left: 10px;color: black;">Home</a>
                <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNav">
                    <span class="navbar-toggler-icon " style="color: black; background-color: black;"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav mr-auto bg-primary rounded " style="margin-right: 10px">
                        @if (Auth::user())
                            @if ($user_has_jogador)
                                <a class="dropdown-item" href="{{ '/jogador/' . Auth::id() }}"><button
                                        class="btn  rounded text-light">Seu Perfil
                                        de
                                        jogador</button></a>
                            @else
                                <a class="dropdown-item" href="{{ '/jogador/create' }}"><button
                                        class="btn rounded text-light">Criar perfil de jogador</button></a>
                            @endif
                        @endif
                    </ul>
                    @livewire('alert-mensagens', ['id_usuario' => Auth::id()])
                    @livewire('alert-convites', ['id_usuario' => Auth::id()])
                    <div class="collapse navbar-collapse justify-content-end " id="navbarCollapse">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown ">
                                <a class="dropdown-toggle navbar-brand " href="http://example.com"
                                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" style="color: black">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu  border border-dark" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item  " href="#">Configurações</a>
                                    <a class="dropdown-item  " href="#">Another
                                        action</a>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="dropdown-item ">Sair</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            @else
            @endauth
    @endif
    </nav>


    <div class="container">

        @if (session('mensagem'))

            <div class="alert alert-success" style="margin: 10px">

                {{ session('mensagem') }}

            </div>
        @endif

        @yield('conteudo')

    </div>
    @livewireScripts
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script>
</body>

</html>
