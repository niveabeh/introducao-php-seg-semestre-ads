function validaFormulario(){

    const campoUm = document.getElementById('valor1');
    const campoDois = document.getElementById('valor2');

    let valorUm = campoUm.value.trim();
    let valorDois = campoDois.value.trim();

    const regexNumero = /^[0-9]+$/;

    if(!regexNumero.test(valorUm)){
        alert("Campo 'Valor 1' inválido. Por valor, informe um número válido");
        campoUm.focus();
        return false;
    }
    if(!regexNumero.test(valorDois)){
        alert("Campo 'Valor 2' inválido. Por valor, informe um número válido");
        campoDois.focus();
        return false;
    }
    
    return true;


}