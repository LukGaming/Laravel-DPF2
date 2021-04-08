<div>
    @if (count($vagas) > 0)
        <div class="border border-dark rounded" style=" margin-bottom: 20px">
            <div class="d-flex justify-content-center">
                <div class="h5" style="padding: 10px">Vagas Deste Time</div>
            </div>
            <div class="border-top">
            </div>
            @foreach ($vagas as $vaga)
                <div class="row" style="margin: 10px">
                    <div class="d-flex justify-content-between">
                        <div class="form-group col-2">
                            <label for="funcao" class="sr-only" style="margin: 10px">Funcao para a Vaga:</label>
                            <input type="text" class="form-control" id="funcao" value="{{ $vaga->funcao }} " disabled
                                style="margin: 10px">
                        </div>
                        <div class="form-group col-2">
                            <button class="btn btn-success" wire:click="subscribeInVaga({{$vaga->id}}, {{Auth::id()}})">Inscrever-se na Vaga</button>
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
