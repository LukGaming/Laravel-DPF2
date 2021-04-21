<div style="margin-left: 20px">
    <a class="dropdown-item  bg-primary rounded" href="{{ url('mensagens') }}" style="margin-left: 10px">
        <button type="button" class="btn text-light">
            Mensagens <span class="badge badge-light" wire:poll.5000ms>{{$mensagens}}</span>
        </button>
    </a>
</div>
