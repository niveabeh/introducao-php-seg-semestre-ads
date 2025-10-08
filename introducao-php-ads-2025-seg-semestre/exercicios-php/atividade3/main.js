function validarForm() {

    let notaUm = document.getElementById("notaUm");
    let notaDois = document.getElementById("notaDois");
    let notaTres = document.getElementById("notaTres");
    let notaQuatro = document.getElementById("notaQuatro");
    let valorUm = notaUm.value.trim();
    let valorDois = notaDois.value.trim();
    let valorTres = notaTres.value.trim();
    let valorQuatro = notaQuatro.value.trim();
    let resp = document.getElementById("resp");

    if (valorUm === "" || isNaN(valorUm)) {
        resp.innerText = `Campo Primeira nota vazio. Por favor, informe um número`;
        notaUm.focus();
        return false;
    }else if(valorUm < 0 || valorUm > 10) {
        resp.innerText = `Por favor, informe um número maior que Zero ou menor que Dez`;
        notaUm.focus();
        return false;
    }

    if (valorDois === "" || isNaN(valorDois)) {
        resp.innerText = `Campo Segunda nota vazio. Por favor, informe um número`;
        notaDois.focus();
        return false;
    }else if(valorDois < 0 || valorDois > 10) {
        resp.innerText = `Por favor, informe um número maior que Zero ou menor que Dez`;
        notaDois.focus();
        return false;
    }

    if (valorTres === "" || isNaN(valorTres)) {
        resp.innerText = `Campo Terceira nota vazio. Por favor, informe um número`;
        notaTres.focus();
        return false;
    }else if(valorTres < 0 || valorTres > 10) {
        resp.innerText = `Por favor, informe um número maior que Zero ou menor que Dez`;
        notaTres.focus();
        return false;
    }

    if (valorQuatro === "" || isNaN(valorQuatro)) {
        resp.innerText = `Campo Quarta nota vazio. Por favor, informe um número`;
        notaQuatro.focus();
        return false;
    }else if(valorQuatro < 0 || valorQuatro > 10) {
        resp.innerText = `Por favor, informe um número maior que Zero ou menor que Dez`;
        notaQuatro.focus();
        return false;
    }
    return true;

}