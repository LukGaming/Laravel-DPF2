<div class="container-fluid" style="padding-top: 40px; margin-bottom: 50px">
    <form method="post">
        @csrf
        <div class="row" style="padding-left: 10px">
            <label for="nometime" style="padding-left: 10px">Buscar Times</label>
            <input type="text" class="col-7 inputfieldsofsite" id="nometime" aria-describedby="emailHelp"
                placeholder="Digite o nome do time" name="nometime" style="padding: 5px; margin: 10px"
                wire:model.debounce.500ms="search">
            <div class="col-4">
                <input type="submit" value="Buscar" class=" btn btn-primary" style="margin: 10px">
            </div>
        </div>
    </form>
    @if ($search == '')
        <div class="row " style="margin-top: 20px">
            @foreach ($times as $time)
                <div class="col-sm-4">
                    <div class="card text-white  card-itens card-title " style=" padding: 3px">
                        <h3 class="card-title mx-auto h5 " style="">{{ $time->nome }}</h3>
                        <div class=" bg-light text-dark d-flex justify-content-center ">
                            <p class="card-text h5">
                                {{ $time->frase }}</p>
                        </div>
                        <div class="d-flex justify-content-center bg-light" style="margin: 5px">
                            @if ($time->caminho_imagem_time)
                                <img src=" {{ url($time->caminho_imagem_time) }}" alt=""
                                    class="img-thumbnail img-fluid" width="200px">
                            @else
                                <img src="  {{ asset('images/user_without_image.png') }} " alt=""
                                    class="img-thumbnail img-fluid" width="200px">

                            @endif
                        </div>
                        <a href="{{ url('time/' . $time->id) }}"
                            class="btn  stretched-link text-dark card-button-link" style="padding: 4px;  border-style: solid;
                            border-style: outset;
                            border-color: #3E872E;
                            border-width: 3px;">
                            <h5>Ir para perfil do time</h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center fixed-bottom" style="margin-top: 50px">
            {{ $times->links() }}
        </div>
    @else
        <div class="row " style="margin-top: 20px">
            @if (count($times) > 0)
                @foreach ($times as $time)
                    <div class="col-sm-4">
                        <div class="card text-white  card-itens card-title " style=" padding: 3px">
                            <h3 class="card-title mx-auto h5 " style="">{{ $time->nome }}</h3>
                            <div class=" bg-light text-dark d-flex justify-content-center ">
                                <p class="card-text h5">
                                    {{ $time->frase }}</p>
                            </div>
                            <div class="d-flex justify-content-center bg-light" style="margin: 5px">
                                @if ($time->caminho_imagem_time)
                                    <img src=" {{ url($time->caminho_imagem_time) }}" alt=""
                                        class="img-thumbnail img-fluid" width="200px">
                                @else
                                    <img src="  {{ asset('images/user_without_image.png') }} " alt=""
                                        class="img-thumbnail img-fluid" width="200px">

                                @endif
                            </div>
                            <a href="{{ url('time/' . $time->id) }}"
                                class="btn  stretched-link text-dark card-button-link" style="padding: 4px;  border-style: solid;
                            border-style: outset;
                            border-color: #3E872E;
                            border-width: 3px;">
                                <h5>Ir para perfil do time</h5>
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info" role="alert" style="margin: 10px">
                    Nenhum Time encontrado com o resultado da pesquisa!
                </div>


            @endif

        </div>
        <div class="d-flex justify-content-center fixed-bottom" style="margin-top: 50px">
            {{ $times->links() }}
        </div>
    @endif
</div>
