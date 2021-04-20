<div>
    <form wire:submit.prevent="searchJogador()" method="GET">
        <div class="row" style="padding-left: 10px">
            <label for="nometime" style="padding-left: 10px">Buscar Jogadores</label>
            <input type="text" class="col-7 inputfieldsofsite" id="nometime" aria-describedby="emailHelp"
                placeholder="Digite o nome do time" name="nometime" style="padding: 5px; margin: 10px"
                wire:model.debounce.500ms="search">
            <div class="col-4">
                <input type="submit" value="Buscar" class=" btn btn-primary" style="margin: 10px">
            </div>
        </div>
    </form>
    @if ($search == '')
        <div class="row ">
            @foreach ($jogadores as $jogador)
                <div class="col-sm-4">
                    <div class="card text-white  card-itens card-title " style=" padding: 3px">
                        <h3 class="card-title mx-auto h5 " style="">{{ $jogador->nick_jogador }}</h3>
                        <div class=" bg-light text-dark">
                            <p class="card-text ">
                            <div class="d-flex justify-content-center">
                                @if($jogador->caminho_imagem_perfil_jogador)
                                <img src=" {{ asset($jogador->caminho_imagem_perfil_jogador) }}" alt=""
                                    class="img-thumbnail img-fluid" width="200px">
                                    @else 
                                    <img src=" {{ asset("images/user_without_image.png") }}" alt=""
                                    class="img-thumbnail img-fluid" width="200px">
                                @endif
                            </div>
                            </p>
                        </div>
                        <a href="{{ url('jogador/' . $jogador->user_id) }}"
                            class="btn  stretched-link text-dark card-button-link" style="padding: 4px;  border-style: solid;
                    border-style: outset;
                    border-color: #3E872E;
                    border-width: 3px;">
                            <h5>Ir para perfil do Jogador</h5>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center fixed-bottom" style="margin-top: 50px">
            {{ $jogadores->links() }}
        </div>
    @else
        @if (count($jogadores) > 0)
            <div class="row ">
                @foreach ($jogadores as $jogador)
                    <div class="col-sm-4">
                        <div class="card text-white  card-itens card-title " style=" padding: 3px">
                            <h3 class="card-title mx-auto h5 " style="">{{ $jogador->nick_jogador }}</h3>
                            <div class=" bg-light text-dark">
                                <p class="card-text ">
                                <div class="d-flex justify-content-center">
                                    <img src=" {{ url($jogador->caminho_imagem_perfil_jogador) }}" alt=""
                                        class="img-thumbnail img-fluid" width="200px">
                                </div>
                                </p>
                            </div>
                            <a href="{{ url('jogador/' . $jogador->user_id) }}"
                                class="btn  stretched-link text-dark card-button-link" style="padding: 4px;  border-style: solid;
                        border-style: outset;
                        border-color: #3E872E;
                        border-width: 3px;">
                                <h5>Ir para perfil do Jogador</h5>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            @if ($jogadores->links())
                <div class="d-flex justify-content-center fixed-bottom" style="margin-top: 50px">
                    {{ $jogadores->links() }}
                </div>
            @endif
        @else
            <div class="alert alert-warning" role="alert" style="margin-top: 30px">
                Nenhum Jogador Encontrado
            </div>
        @endif
    @endif
</div>
