<div>
    <div class="d-flex justify-content-end">
        <button class="btn btn-danger" style="margin: 10px" wire:click="sairDoTime">Sair de Time</button>
    </div>
    @if (session()->has('saindo_time'))
        <div class="alert alert-success">
            {{ session('saindo_time') }}
        </div>
    @endif
</div>
