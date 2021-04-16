<div>
    @foreach ($ultimas_mensagens as $mensagem)
        <a href="{{ url('mensagens-time/' . $mensagem['id_time'] . '/jogador/' . $mensagem['id_jogador']) }}"
            style="text-decoration: none; " class="text-dark">
            <div class="d-flex justify-content-center" style="padding: 10px">
                <div class="border border-dark w-75" style="padding: 10px">
                    <div class="d-flex justify-content-between">
                        @if ($mensagem['imagem'])
                            <img src="{{ asset($mensagem['imagem']) }}" class="img-thumbnail" width="50px"
                                height="50px">
                        @else
                            <img src="{{ asset('images/user_without_image.png') }}" class="img-thumbnail" width="50px"
                                height="50px">
                        @endif
                        <div style="margin: auto 0; margin-left: 20px" class="h5">{{ $mensagem['nome'] }}</div>
                        @if ($mensagem['ultima_mensagem'])
                            <div style="margin: auto 0;  margin-left: 20px" class="h6">
                                @php
                                    echo mb_strimwidth($mensagem['ultima_mensagem'], 0, 50, '...');
                                @endphp
                            </div>
                        @endif
                        @if ($mensagem['ultima_mensagem'])
                            @if ($mensagem['mensagem_lida'] == 1)
                                <button type="button" class="btn btn-primary">
                                    Não lidas <span class="badge badge-light">0</span>
                                </button>
                            @else
                                <button type="button" class="btn btn-primary">
                                    Não lidas <span class="badge badge-light">1</span>
                                </button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </a>
    @endforeach
</div>
