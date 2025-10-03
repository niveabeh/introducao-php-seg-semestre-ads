function validarForm(){
    let numero = parseInt(document.getElementById("numero").value.trim());
    let inputNumero = document.getElementById("numero");


    if(numero === " "){

        inputNumero.focus();
        alert("campo número vazio")
        return false;
    }else{
        if(numero % 2 === 0){
            alert(`O número: ${numero} é par `);
        }else{
            alert(`O número: ${numero} é ímpar`);
        }
    }
    return true;
}
