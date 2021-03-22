<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>@yield('titulo') - Jogador</title>
    <style>
        .cor-verde{
            color: #42f56c;
        }


    </style>
</head>
@php
use App\Http\Controllers\JogadorController;
$user_has_jogador = JogadorController::VerificaSeUsuarioTemJogador();
@endphp

<body style="background-color:  black;">
    <nav class="navbar navbar-expand-md navbar-dark border border-white " style="background-color: black">
        <a class="navbar-brand" href="{{ route('jogador.index') }}" style="padding-left: 10px; color: #42f56c;">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if (Route::has('login'))
            @auth
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        @if (Auth::user())
                        @if ($user_has_jogador)
                            <a class="dropdown-item " style="background-color: black; color: #42f56c"
                                href="{{ '/jogador/' . Auth::id() }}">Seu Perfil de jogador</a>
                        @else
                            <a class="dropdown-item cor-verde" style=" background-color: black"
                                href="{{ route('jogador.create') }}">
                                Criar um Perfil de jogador</a>
                        @endif
                    @endif
                    </ul>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="dropdown-toggle navbar-brand " href="http://example.com"
                                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" style="color: #42f56c">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu cor-verde border border-white" style="background-color: black"
                                    aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item cor-verde" style="background-color: black"
                                        href="#">Configurações</a>
                                    <a class="dropdown-item cor-verde" style="background-color: black" href="#">Another
                                        action</a>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="dropdown-item cor-verde">Sair</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>            
            @else
                <a href="{{ route('login') }}"
                    class="collapse navbar-collapse justify-content-end text-sm cor-verde underline nav-link  navbar-brand cor-verde"
                    style="padding-right: 10px">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class=" text-sm cor-verde underline nav-link  navbar-brand cor-verde"
                        style="padding-right: 10px">Register</a>
                @endif
            @endauth
            </div>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script>
</body>

</html>
