<div>
    <style>
        .centered {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translate(-50%, -50%);
            color: crimson;
        }

        .div-image {
            position: relative;
            text-align: center;
            color: white;
        }

    </style>
    @if (count($jogadores) > 0)
        <div class="bg-dark text-light rounded" style="margin-top: 10px">
            <div class="d-flex justify-content-center h5" style="padding: 10px">
                Jogadores do seu time.
            </div>
            <div class="d-flex justify-content-center" style="margin: 10px">
                @foreach ($jogadores as $jogador)
                    <div class="border border-light" style="margin: 10px">
                        <div class="d-flex justify-content-center" style="margin: 5px">
                            <button class="btn btn-danger" wire:click="removerJogador({{$jogador['id']}})">Remover Jogador do Time</button>
                        </div>
                        <div style="margin: 5px" class="div-image">
                            <img src="{{ asset($jogador['imagem']) }}" class="img-fluid" width="150px"
                                style="border-radius: 50%">
                            <div class="h5 centered">{{ $jogador['nick_jogador'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
