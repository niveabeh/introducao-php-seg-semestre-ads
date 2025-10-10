
let form = document.getElementById("formulario");
let campoTexto = document.getElementById("texto");

form.addEventListener("input", (e) =>{
    e.preventDefault(); 
    let resp = document.getElementById("resp");
    let texto = campoTexto.value;
    let contPalavras = texto.match(/\b\w+\b/g);; 
    let tamanhoArray = contPalavras.length; 
    if(texto === ""){
        resp.innerText = "";
    }else{
        resp.innerText = `${tamanhoArray}`;
    }
})
form.addEventListener("submit", (e) =>{
    let texto = campoTexto.value;
    let mensagem = document.getElementById("mensagem");
    if(texto === ""){
        mensagem.style.color = "red";
        mensagem.innerText = `erro`;
        return false;
    }else{
        mensagem.style.color = "green";
        mensagem.innerText = `certo`;
        return true; 
    }
})
