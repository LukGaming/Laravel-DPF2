@extends('jogador/layout')

@section('titulo', 'Buscar')

@section('conteudo')
    <style>
        .card-title {
            background-color: #5F5AE6;
        }

        .card-button-link {

            background-color: #61C44B;
        }

        .inputfieldsofsite {
            box-shadow: 0 0 0 0.2rem rgba(95, 90, 230, 1);
            border: none;
            border-radius: 5px;
        }

        .inputfieldsofsite:focus {
            border: none;
            outline: none;
        }

    </style>
    @livewireStyles
    @livewire('search-times')
    @livewireScripts
@endsection
