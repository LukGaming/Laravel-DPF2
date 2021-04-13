<div>
    <div class="container-fluid" style="padding-top: 40px; margin-bottom: 50px">
        <form method="post">
            <div class="row">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group " style="padding-bottom: 10px">
                            
                            <label for="exampleFormControlSelect1">Selecionar Vagas Por Funcao: </label>
                        
                    </div>
                    </div>
                
                    <div class="col-3" style="padding-bottom: 10px">
                        <div class="d-flex justify-content-center">
                        <select class="form-control inputfieldsofsite custom-select" id="exampleFormControlSelect1" wire:model="search" >
                            <option value="">Todas</option>
                            <option value="Entry Fragger">Entry Fragger</option>
                            <option value="Capitão/IGL">Capitão/IGL</option>
                            <option value="Awper">Awper</option>
                            <option value="Suporte">Suporte</option>
                            <option value="Rifler">Rifler</option>
                            <option value="Trader">Trader</option>
                        </select>
                    </div>
                    </div>
                </div>
            </div>
        </form>
        @if ($search == '')
            <div class="row">
                @foreach ($vagas as $vaga)
                    <div class="col-sm-4">
                        <div class="card text-white  card-itens card-title " style=" padding: 3px">
                            <h3 class="card-title mx-auto h5 text-dark" style="">{{ $vaga->funcao }}</h3>
                            <div class=" bg-light text-dark text-justify">
                                <p class="card-text descricoes text-justify">

                                    <?php echo mb_strimwidth($vaga->descricao, 0, 100, '...'); ?>
                                </p>
                            </div>
                            <a href="{{ url('time/' . $vaga->id_time) }}"
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
                @if (count($vagas))
                    {{ $vagas->links() }}
                @endif
            </div>

        @else
            <div class="row">
                @if (count($vagas) > 0)
                    @foreach ($vagas as $vaga)
                        <div class="col-sm-4">
                            <div class="card text-white  card-itens card-title " style=" padding: 3px">
                                <h3 class="card-title mx-auto h5 text-dark" style="">{{ $vaga->funcao }}</h3>
                                <div class=" bg-light text-dark text-justify">
                                    <p class="card-text descricoes text-justify">

                                        <?php echo mb_strimwidth($vaga->descricao, 0, 100, '...'); ?>
                                    </p>
                                </div>
                                <a href="{{ url('time/' . $vaga->id_time) }}"
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
                    Nenhuma Vaga Encontrada!
                @endif

            </div>
            <div class="d-flex justify-content-center fixed-bottom" style="margin-top: 50px">
                @if (count($vagas))
                    {{ $vagas->links() }}
                @endif
            </div>
        @endif
    </div>

    <script>
        /*$descricoes = $(".descricoes");
        for ($i = 0; $i < $descricoes.length; $i++) {
            if ($descricoes[$i].innerHTML.length > 10) {
                 $descricoes[$i].innerHTML = $descricoes[$i].innerHTML.substr(0, 400) + "...";
            }

        }*/
        //$descricoes[0].val($descricoes[0].text().substr(0, 10));
        //console.log($descricoes[0].innerHTML.length);
        

    </script>
</div>
