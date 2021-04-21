<div>
    @if ($jogador_tem_time == 1)
        @if ($id_link_time != null)
            <a class="dropdown-item  bg-primary rounded" href="{{ url('time/' . $id_link_time) }}"
                style="margin-left: 10px">
                <button type="button" class="btn text-light">
                    Visualizar Perfil de Time
                </button>
            </a>
        @endif
    @endif
    @if ($jogador_tem_time == 0)
        <a class="dropdown-item  bg-primary rounded" href="{{ url('time/create') }}" style="margin-left: 20px">
            <button type="button" class="btn text-light">
                Criar um time
            </button>
        </a>
    @endif
</div>
