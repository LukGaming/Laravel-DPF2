<div>
    @if (count($vagas) > 0)
        <div class="border border-dark rounded" style=" margin-bottom: 20px">
            <div class="d-flex justify-content-center">
                <div class="h5" style="padding: 10px">Vagas Deste Time</div>
            </div>
            <div class="border-top">
            </div>
            <div>
                @if (session()->has('inscrito_na_vaga'))
                    <div class="alert alert-success">
                        {{ session('inscrito_na_vaga') }}
                    </div>
                @endif
                @if (session()->has('remover_inscricao_vaga'))
                    <div class="alert alert-success">
                        {{ session('remover_inscricao_vaga') }}
                    </div>
                @endif
            </div>
            @foreach ($vagas as $vaga)
                <div class="row" style="margin: 10px">
                    <div class="d-flex justify-content-between">
                        <div class="form-group col-2">
                            <label for="funcao" class="sr-only" style="margin: 10px">Funcao para a Vaga:</label>
                            <input type="text" class="form-control" value="{{ $vaga->funcao }} " disabled
                                style="margin: 10px">
                        </div>
                        <div class="form-group col-2">
                            @if (count($vagas_inscritas) > 0)
                                @foreach ($vagas_inscritas as $vaga_inscrita)
                                    @if ($vaga_inscrita->id_vaga == $vaga->id)
                                        <button class="btn btn-success"
                                            wire:click="unsubscribeVaga({{ $vaga_inscrita->id }}, {{ Auth::id() }})">Desinscrever-se
                                            da Vaga</button>
                                    @else
                                        <button class="btn btn-success" disabled>
                                            Inscrever-se na
                                            Vaga</button>
                                    @endif

                                @endforeach
                            @else
                                <button class="btn btn-success"
                                    wire:click="subscribeInVaga({{ $vaga->id }}, {{ Auth::id() }})">Inscrever-se
                                    na
                                    Vaga</button>

                            @endif

                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="h5">
                        Descrição da Vaga
                    </div>
                </div>
                <div style="margin: 10px">
                    {{ $vaga->descricao }}
                </div>
                @if ($loop->last)
                @else
                    <hr>
                @endif
            @endforeach
    @endif
</div>
