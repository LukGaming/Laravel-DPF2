<div>
    @foreach ($ultimas_mensagens as $mensagem)
        {{ $mensagem['nome'] }}
        {{ $mensagem['ultima_mensagem'] }}
        {{ $mensagem['imagem'] }}
        @if ($mensagem['ultima_mensagem'])
            {{ $mensagem['ultima_mensagem'] }}
            @if ($mensagem['mensagem_lida'] == 1)
                Lida!
            @else
                Não lida
            @endif
        @endif
    @endforeach
</div>
