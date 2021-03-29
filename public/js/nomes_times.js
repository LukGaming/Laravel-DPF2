$('#nome').on('input', validando_nomes_enquanto_digita);
function validando_nomes_enquanto_digita() {
    $nome_value = $("#nome").val();
    $.ajax({
        url: "http://localhost:8000/nometimes", success: function (result) {
            $count = 0;
            for ($i = 0; $i < result['nomes'].length; $i++) {
                if (result['nomes'][$i] == $nome_value) {
                    $count++;
                }
            }
            if ($count > 0) {
                $(".nome_igual").html("Já existe um time com este nome!");
                $(".nome_igual").addClass("btn btn-danger")
            }
            else {
                $(".nome_igual").html("");
                $(".nome_igual").removeClass("btn btn-danger")
            }
        }
    });
}