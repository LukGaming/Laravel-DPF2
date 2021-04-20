<div>
    
    @if ($jogador_tem_time == 1)
        <a class="dropdown-item  bg-primary rounded" href="{{ url('time/'.$id_link_time) }}" style="margin-left: 10px">
            <button type="button" class="btn text-light">
                Visualizar Perfil de Time
            </button>
        </a>
    @endif
    @if ($jogador_tem_time == 0)
    <a class="dropdown-item  bg-primary rounded" href="{{ url('convites') }}" style="margin-left: 10px">
        <button type="button" class="btn text-light">
            Criar um time
        </button>
    </a>
    @endif
</div>
