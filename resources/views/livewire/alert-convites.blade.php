<div>
    @if ($dono_de_time == 0)
        <a class="dropdown-item  bg-primary rounded" href="{{ url('convites') }}" style="margin-left: 10px">
            <button type="button" class="btn text-light">
                Convites <span class="badge badge-light" wire:poll.10000ms>{{ $convites }}</span>
            </button>
        </a>
    @endif
</div>