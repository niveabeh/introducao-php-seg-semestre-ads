function validarForm(){

    let notaUm = document.getElementById("notaUm");
    let notaDois = document.getElementById("notaDois");
    let notaTres = document.getElementById("notaTres");
    let notaQuatro = document.getElementById("notaQuatro");
    let valorUm = notaUm.value.trim();
    let valorDois = notaDois.value.trim();
    let valorTres = notaTres.value.trim();
    let valorQuatro = notaQuatro.value.trim();
    let resp = document.getElementById("resp");

    let media = (valorUm + valorDois + valorTres + valorQuatro) / 4;
    resp.innerText = `A média é ${media}`;

    
}