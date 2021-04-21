@if ($participa_de_time != 0)
    <div class="col-sm-4">
        <div class="card text-white  card-itens card-title " style=" padding: 3px; ">
            <h3 class="card-title mx-auto h4 ">Seu time</h3>
            <div class=" bg-light text-dark" style="height: 300px">
                <p class="card-text h5 text-center alinhando-texto-dos-cards">
                    Parece que voce já faz parte de um time!
                </p>
            </div>
            <a href="{{ url('time/'. $participa_de_time['id_time']) }}" class="btn  stretched-link text-dark card-button-link" style="padding: 4px;  border-style: solid;
                        border-style: outset;
                        border-color: #3E872E;
                        border-width: 3px;
                       ">
                <h5>Visualizar Perfil de Time</h5>
            </a>
        </div>
    </div>
    @else 
    <div class="col-sm-4">
        <div class="card text-white  card-itens card-title " style=" padding: 3px; ">
            <h3 class="card-title mx-auto h4 ">Seu time</h3>
            <div class=" bg-light text-dark" style="height: 300px">
                <p class="card-text h5 text-center alinhando-texto-dos-cards">
                    Voce ainda não faz parte de nenhum time!
                </p>
            </div>
            <a href="{{ url('time/create') }}" class="btn  stretched-link text-dark card-button-link" style="padding: 4px;  border-style: solid;
                        border-style: outset;
                        border-color: #3E872E;
                        border-width: 3px;
                       ">
                <h5>Criar um Time</h5>
            </a>
        </div>
    </div>
@endif
