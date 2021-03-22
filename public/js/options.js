var btncriar = document.getElementById('btnCriar');
var spanFuncoes = document.getElementById("spanFuncoes");

btncriar.addEventListener('click',function(event){
    var funcao_primaria = document.getElementById('funcao_primaria').value;
    var funcao_secundaria = document.getElementById('funcao_secundaria').value;
    var funcao_adicional = document.getElementById('funcao_adicional').value;
    if(funcao_primaria == funcao_secundaria || funcao_secundaria == funcao_adicional || funcao_primaria == funcao_adicional ){
        event.preventDefault();
        spanFuncoes.innerHTML = "As funções devem ser diferentes";
    }
    else{
        spanFuncoes.innerHTML = "";
    } 
});