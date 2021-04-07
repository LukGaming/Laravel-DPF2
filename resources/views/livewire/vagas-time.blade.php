<div>
    <div class="d-flex justify-content-center">
        <h5>Vagas do Time</h5>
    </div>
    <div class="border border-dark" style="padding: 10px">
        <div class="h6">Criar Vagas Para o Time</div>
        <hr>
        <form wire:submit.prevent="adicionarVaga">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="exampleFormControlInput1" style="margin-bottom: 15px"> Função desejada para
                            Vaga</label>
                        <select name="funcao" id="funcao" class="form-control" style="margin-bottom: 15px"
                            wire:model="funcao">
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
                            wire:model="descricao"></textarea>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" style="margin-top: 10px">Adicionar Vaga</button>
        </form>
    </div>
</div>
