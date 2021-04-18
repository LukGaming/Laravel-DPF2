<div>
    <div class="d-flex justify-content-between">
        <a href="{{ url('time/'.$id_time) }}">
        <button class="btn btn-success">Visualizar Perfil de Time</button>
    </a>
        <button class="btn btn-primary" wire:click="aceitarConvite({{$id_time}}, {{Auth::id()}})">Aceitar Convite</button>
       
        <button class="btn btn-danger" wire:click="recusarConvite({{$id_time}}, {{Auth::id()}})">Recusar Convite</button>
    </div>
        @if (session()->has('convite_aceito'))
            <div class="alert alert-success" style="margin: 10px">
                {{ session('convite_aceito') }}
            </div>
        @endif
        @if (session()->has('convite_recusado'))
            <div class="alert alert-success" style="margin: 10px">
                {{ session('convite_recusado') }}
            </div>
        @endif
</div>
