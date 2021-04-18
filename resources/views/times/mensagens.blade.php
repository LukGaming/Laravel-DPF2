@extends('jogador/layout')

@section('titulo', 'Mensagens')

@section('conteudo')
    @livewireStyles
    <style>
        .inputfieldsofsite {
            box-shadow: 0 0 0 0.2rem rgba(95, 90, 230, 1);
            border: none;
            border-radius: 5px;
            margin: 5px;
        }

        .inputfieldsofsite:focus {
            border: none;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgb(236, 5, 5);
        }

        label {
            font-size: 20px;
        }

        .skype-parent {
            font: 14px/1.23 sans-serif;
            display: table;
            table-layout: fixed;
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        /* ROWS */

        .message {
            display: table-row;
        }

        /* ALL CELLS */

        .message>* {
            position: relative;
            box-sizing: border-box;
            display: table-cell;
        }

        .message img {
            border-radius: 50%;
            vertical-align: middle;
            width: 40px;
            height: 40px;
        }

        /* IMAGE CELL & TIME CELL */

        .message>div:nth-child(1),
        .message>div:nth-child(3) {
            width: 52px;
            text-align: center;
            font-size: 12px;
            color: #AFCBD8;
        }

        /* MESSAGE CELLS */

        .message p {
            color: #6E767C;
            border-radius: 4px;
            padding: 12px 14px;
            margin: 0 36px 0 0;
            background: #c7edfc;
        }

        .message.user p {
            margin: 0 0 0 36px;
            background: #e5f7fd;
        }

        /* ARROWS */

        

        .button-delete-message {
            max-height: 25px;
            border: none;
        }

    </style>
    <div class="" style="margin-top: 20px">
        @livewire('mensagens',['time'=>$time, 'jogador'=>$jogador, 'permissao_jogador'=>$permissao_jogador])
    </div>
    @livewireScripts
@endsection
