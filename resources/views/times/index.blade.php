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
        .inputfieldsofsite{
            box-shadow: 0 0 0 0.2rem rgba(95, 90, 230,1);
            border: none;
            border-radius: 5px;
        }
        .inputfieldsofsite:focus{
            border: none;
            outline: none;
        }

    </style>


    <div class="container-fluid" style="padding-top: 40px; margin-bottom: 50px">
        <form action="{{route('time.searchtime')}}" method="post">
            @csrf
            <div class="row" style="padding-left: 10px">
            <label for="nometime" style="padding-left: 10px">Buscar Times</label>
            <input type="text" class="col-7 inputfieldsofsite" id="nometime" aria-describedby="emailHelp"
                placeholder="Digite o nome do time" name="nometime"  style="padding: 5px; margin: 10px" >
                <div class="col-4">
            <input type="submit" value="Buscar" class=" btn btn-primary" style="margin: 10px">
        </div>
        </div>
        </form>
        <div class="row ">
            @foreach ($times as $time)
                <div class="col-sm-4">
                    <div class="card text-white  card-itens card-title " style=" padding: 3px">
                        <h3 class="card-title mx-auto h5 " style="">{{ $time->nome }}</h3>
                        <div class=" bg-light text-dark">
                            <p class="card-text ">
                                {{ $time->frase }}</p>
                        </div>
                        <a href="{{ url('time/' . $time->id) }}" class="btn  stretched-link text-dark card-button-link"
                            style="padding: 4px;  border-style: solid;
                                    border-style: outset;
                                    border-color: #3E872E;
                                    border-width: 3px;">
                            <h5>Ir para perfil do time</h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center fixed-bottom" style="margin-top: 50px">
            {{ $times->links() }}
    </div>

@endsection
