<div>
    @if (count($convites) > 0)
        @foreach ($convites as $convite)
            <div class="d-flex justify-content-center">
                <div class="border border-dark w-75" style="padding: 10px; margin-top: 10px">
                    <div style="padding: 10px">
                        <div class="d-flex justify-content-between">
                            @if ($convite['imagem'])
                                <img src="{{ asset($convite['caminho_imagem_time']) }}" class="img-thumbnail"
                                    width="50px" height="50px" style="border-radius: 50%">
                            @else
                                <img src="{{ asset('images/user_without_image.png') }}" class="img-thumbnail"
                                    width="50px" height="50px" style="border-radius: 50%">
                            @endif
                            <div style="margin: auto 0; margin-left: 20px" class="h5">Nome do Time:
                                {{ $convite['nome_time'] }}
                            </div>
                            @if ($convite['frase_time'])
                                <div style="margin: auto 0;  margin-left: 20px" class="h5">
                                    Frase De perfil do Time:
                                    @php
                                        echo mb_strimwidth($convite['frase_time'], 0, 50, '...');
                                    @endphp
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <a href="{{ url('time/'.$convite->id_time) }}">
                        <button class="btn btn-success">Visualizar Perfil de Time</button>
                    </a>
                        <button class="btn btn-primary">Aceitar Convite</button>
                        <button class="btn btn-primary">Recusar Convite</button>
                    </div>
                </div>
            </div>






        @endforeach
    @else
        Nenhum Convite Até o momento.
    @endif
</div>
