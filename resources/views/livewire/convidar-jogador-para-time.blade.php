<div style="margin-left: 20px">
    @if ($convite_enviado == 0)
        <button class="btn btn-success" wire:click="convidarJogador">Convidar Jogador Para seu Time</button>
    @endif
    @if ($convite_enviado == 1)
        <button class="btn btn-danger" wire:click="removerConvite">Remover Convite de Jogador Para seu Time</button>
    @endif
</div>
