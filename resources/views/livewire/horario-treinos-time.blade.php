<div>


    @if (session()->has('erro_horarios'))
        <div class="alert alert-danger">
            {{ session('erro_horarios') }}
        </div>
    @endif
    @if (session()->has('treino_adicionado'))
        <div class="alert alert-success">
            {{ session('treino_adicionado') }}
        </div>
    @endif



    <div class="d-flex justify-content-center">
        <h5>Novos Horários de Treino</h5>
    </div>
    <form wire:submit.prevent="adicionarTreino">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="inputState">Dia da semana</label>
                <select id="inputState" class="form-control" wire:model="dia_semana">
                    <option value="Segunda-Feira">Segunda-Feira</option>
                    <option value="Terça-Feira">Terça-Feira</option>
                    <option value="Quarta-Feira">Quarta-Feira</option>
                    <option value="Quinta-Feira">Quinta-Feira</option>
                    <option value="Sexta-Feira">Sexta-Feira</option>
                    <option value="Sabado">Sabado</option>
                    <option value="Domingo">Domingo</option>
                </select>
            </div>
            <div class="col-md-4 ">
                <label for="validationTooltip01">Horário de Inicio do Treino</label>
                <input type="time" class="form-control" id="validationTooltip01" placeholder="Inicio"
                    wire:model="horario_inicio">
            </div>
            <div class="col-md-4 ">
                <label for="validationTooltip01">Horário de Fim do Treino</label>
                <input type="time" class="form-control" id="validationTooltip01" placeholder="Fim"
                    wire:model="horario_fim">
            </div>
        </div>
        <hr>
        <div class="d-flex justify-content-center">
            <button class="btn btn-success" type="submit">Adicionar Horario de Treino</button>
        </div>
    </form>
    <hr>
    @if ($horarios_anteriores)
        <div class="d-flex justify-content-center">
            <h5>Horários de Treino</h5>
        </div>
        @foreach ($horarios_anteriores as $horarios_treino)
            <div class="card border border-dark" style="margin: 5px">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                        <h6> Dia da Semana: {{ $horarios_treino->dia_da_semana }} </h6>
                        <button class="btn btn-danger" wire:click="removerHorario({{$horarios_treino->id}})">Remover</button>
                    </div>
                    </li>

                    <li class="list-group-item">Horario de Inicio: {{ $horarios_treino->horario_inicio }}</li>
                    <li class="list-group-item">Horario de Término: {{ $horarios_treino->horario_fim }}</li>
                </ul>
            </div>
        @endforeach
    @endif
</div>
