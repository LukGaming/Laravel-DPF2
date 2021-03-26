$("#btnSalvar").click(function (e) {
    $cfg = $("#cfg").val();
    if ($cfg) {
        $array_repartido = $cfg.split(".");
        $extensao_arquivo = $array_repartido.pop();
        if ($extensao_arquivo != "cfg") {
            e.preventDefault();
            $("#spanCfg").html("É permitido somente upload de arquivos com extensão .cfg");
        }
        else {
            $("#spanCfg").html("");
        }
    }
});