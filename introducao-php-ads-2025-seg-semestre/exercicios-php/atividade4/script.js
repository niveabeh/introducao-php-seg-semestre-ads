function validarForm(){
    let inicio = document.getElementById("inicio");
    let fim = document.getElementById("fim");
    let resp = document.getElementById("resp");
   
    let valorInicio = inicio.value.trim();
    let valorFim = fim.value.trim();

    
    if(valorInicio > valorFim){
        resp.innerText = `O valor do início(${valorInicio}) é maior que do final (${valorFim})`;
        return false;
    }
    return true;
}