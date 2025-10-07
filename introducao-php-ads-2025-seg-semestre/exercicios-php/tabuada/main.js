function validaForm(){
    let campoNumero = document.getElementById("numero");
    let numero = campoNumero.value.trim();

    if(numero === ""){
        alert("Por favor, informe um número")
        campoNumero.focus();
        return false;
    }

    for(let i = 1; i <= 9; i++){
        let result = numero * i;
        console.log(`${i}x${numero} = ${result}`)
    }
    return true;
}