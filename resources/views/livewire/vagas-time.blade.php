<div>
    <div class="d-flex justify-content-center">
        <h5>Vagas do Time</h5>
    </div>
    <div class="border border-dark" style="padding: 10px">
        <div class="h6">Criar Vagas Para o Time</div>
        <hr>
        <div>
            @if (session()->has('vaga_adicionada'))
                <div class="alert alert-success">
                    {{ session('vaga_adicionada') }}
                </div>
            @endif
        </div>
        <form wire:submit.prevent="adicionarVaga">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="exampleFormControlInput1" style="margin-bottom: 15px"> Função desejada para
                            Vaga</label>
                        <select name="funcao" id="funcao" class="form-control" style="margin-bottom: 15px"
                            wire:model.debounce.500ms="funcao">
                            <option value="Capitão/Igl">Capitão/IGL</option>
                            <option value="Entry Fragger">Entry Fragger</option>
                            <option value="Suporte">Suporte</option>
                            <option value="Trader">Trader</option>
                            <option value="Rifler">Rifler</option>
                            <option value="Awper">Awper</option>
                        </select>
                    </div>
                    <div class="form-group">
                        @if (session()->has('descricao'))
                            <span class="badge bg-danger">{{ session('descricao') }}</span>
                        @endif<br>
                        <label for="exampleFormControlTextarea1" style="margin-bottom: 15px">Descrição da Vaga</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            wire:model.debounce.500ms="descricao"></textarea>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" style="margin-top: 10px">Adicionar Vaga</button>
        </form>
        <!--Mostrando as Vagas Já criadas deste time-->
    </div>

    @if (count($vagas_iniciais) > 0)
        <div class="form-group" style="margin: 10px">
            <div class="h5">Vagas já existentes</div>
        </div>
        <hr>
        @if (session()->has('vaga_removida'))
            <div class="alert alert-success">
                {{ session('vaga_removida') }}
            </div>
        @endif
        @foreach ($vagas_iniciais as $vagas)
            <div class="border border-dark" style="padding: 10px">

                <div class="d-flex justify-content-between">

                    <label for="exampleFormControlInput1" style="margin-bottom: 15px"> Função desejada para
                        Vaga</label>
                    <button class="btn btn-danger" wire:click="removerVaga({{ $vagas->id }})">Remover Vaga</button>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="inputPassword2" value="{{ $vagas->funcao }}"
                            disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1" style="margin-bottom: 15px">Descrição da Vaga</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                        disabled>{{ $vagas->descricao }}</textarea>
                </div>
            </div>
        @endforeach
    @endif
</div>
