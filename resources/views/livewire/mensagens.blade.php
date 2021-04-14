<div>
    @if ($dono_time == 1)
        @if ($permissao_mensagens == 1)
            <div class="d-flex justify-content-end" style="margin-top: 10px">
                <button class="btn btn-danger" wire:click="desabilitarMensagens({{$time}}, {{$jogador}})">Desabilitar as mensagens para este usuário</button>
            </div>
        @endif
        @if ($permissao_mensagens == 0)
            <div class="d-flex justify-content-end" style="margin-top: 10px">
                <button class="btn btn-success" wire:click="habilitarMensagens({{$time}}, {{$jogador}})">Habilitar as mensagens para este usuário</button>
            </div>
        @endif
    @endif


    <div style="padding: 10px">

        <div class="border border-dark overflow-auto bg-dark text-light rounded" id="sobe-overflow"
            style="height: 80vh;">

            <div class="skype-parent" wire:poll>
                @if (count($old_messages) > 0)
                    @if ($old_messages[0]->user_id == Auth::id())
                        <!--Se for o dono do time!-->
                        @foreach ($old_messages as $messages)
                            @if ($messages->user_id == Auth::id())
                                <!--Verificar se a mensagem é do jogador ou do Time-->
                                <div class="message user" >
                                    <div style="vertical-align: bottom">

                                    </div>
                                    <div>
                                        <p class="d-flex justify-content-between" >{{ $messages->body }}<button
                                                wire:click="removerMensagem({{ $messages->id }})" type="button"
                                                class="close button-delete-message" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button></p>

                                    </div>
                                    <div>{{ \Carbon\Carbon::parse($messages->created_at)->format('H:i:s') }}</div>
                                </div>
                            @endif
                            @if ($messages->user_id != Auth::id())
                                <!--Verificar se a mensagem é do jogador ou do Time-->
                                <div class="message">
                                    <div>
                                        @if ($imagem_jogador == null)
                                            <img src="{{ asset('images/user_without_image.png') }}">
                                        @else
                                            <img src="{{ url($imagem_jogador) }}" sizes="50x50">
                                        @endif
                                    </div>
                                    <div>
                                        <p>{{ $messages->body }}</p>
                                    </div>
                                    <div>{{ \Carbon\Carbon::parse($messages->created_at)->format('H:i:s') }}</div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <!--Se Não for o dono do time!-->
                        @foreach ($old_messages as $messages)
                            @if ($messages->user_id == Auth::id())
                                <!--Verificar se a mensagem é do jogador ou do Time-->
                                <div class="message user">
                                    <div>

                                    </div>
                                    <div>
                                        <div style="margin-right: 10px">
                                            <p class="d-flex justify-content-between" style="margin-right: 10px">
                                                {{ $messages->body }}<button
                                                    wire:click="removerMensagem({{ $messages->id }})" type="button"
                                                    class="close button-delete-message" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button></p>

                                        </div>
                                    </div>
                                    <div>{{ \Carbon\Carbon::parse($messages->created_at)->format('H:i:s') }}</div>
                                </div>
                            @endif
                            @if ($messages->user_id != Auth::id())
                                <!--Verificar se a mensagem é do jogador ou do Time-->
                                <div class="message">
                                    <div>
                                        @if ($imagem_time == null)
                                            <img src="{{ asset('images/user_without_image.png') }}">
                                        @else
                                            <img src="{{ url($imagem_time) }}" sizes="50x50">
                                        @endif
                                    </div>
                                    <div>
                                        <p>{{ $messages->body }}</p>
                                    </div>
                                    <div>{{ \Carbon\Carbon::parse($messages->created_at)->format('H:i:s') }}</div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endif
            </div>
            <div class="fixed-bottom container">
                <form wire:submit.prevent="">
                    <div class="row">
                        <div class="col-8">
                            @if ($permissao_mensagens == 1)

                                <input type="text" id="inputPassword5" class="form-control"
                                    aria-describedby="passwordHelpBlock" wire:model.lazy="body">
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Envie mensagens ao jogador...
                                </small>
                            @endif
                            @if ($permissao_mensagens == 0)

                                <input type="text" id="inputPassword5" class="form-control"
                                    aria-describedby="passwordHelpBlock" wire:model.lazy="body" disabled>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Chat desabilitado pelo administrador do time!
                                </small>


                            @endif


                        </div>
                        <div class="col-3">
                            <input class="btn btn-success" type="submit" wire:click="sendMessage()" id="btnEnviar"
                                function="scrollDownWhenSendMessage()">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script>
            $btnEnviar = $("#btnEnviar");
            var $overflow = $("#sobe-overflow");
            window.addEventListener('mensagem_enviada', event => {
                scrollDownWhenSendMessage();
            })

            function scrollDownWhenSendMessage() {
                var objDiv = document.getElementById("sobe-overflow");
                objDiv.scrollTop = objDiv.scrollHeight;
            }
            $(document).ready(function() {
                scrollDownWhenSendMessage();
                $numero_mensagens_iniciais = $(".message");
                console.log($numero_mensagens_iniciais);
            });
            window.addEventListener('mensagem_recebida', event => {
                if ($numero_mensagens_iniciais.length != $(".message").length) {
                    console.log($numero_mensagens_iniciais.length);
                    $numero_mensagens_iniciais.length++;
                    console.log($(".message").length);
                    scrollDownWhenSendMessage();
                }
            })

            /*$btnEnviar.click(scrollDownWhenSendMessage);*/

        </script>
