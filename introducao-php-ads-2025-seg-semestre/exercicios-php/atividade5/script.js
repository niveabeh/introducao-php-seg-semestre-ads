function validarForm(){
    let email = document.getElementById("email");
    let valorEmail = email.value.trim();
    let resp = document.getElementById("resp");

    let regexEmail = /^(\w){3,}@(\w){3,}.?((\w){2,})?$/;

    if(valorEmail === "" || !regexEmail.test(valorEmail)){
        resp.innerText = `Email inválido!`;
        return false;
    }else{
        resp.innerText = `Enviado com sucesso!`;
    }
    setTimeout(() => {
        resp.innerText = "";
    }, 5000);
    return true;
}