let form = document.getElementById("formulario");
let campoSenha = document.getElementById("senha");
let mensagem = document.getElementById("mensagem");
let oitoCaract = document.getElementById("oitoCaract");
let umaLetraM = document.getElementById("umaLetraM");
let umNumero = document.getElementById("umNumero");

form.addEventListener("input", (e) =>{
    e.preventDefault();
    console.log("entrou");
    let senha = campoSenha.value;
    let regexsenha = /^(\w(A-Z)+\d+){8,}$/;

    if(senha ===""){
        mensagem.style.color = "red";  
        mensagem.innerText = `Campo vazio`;
    }else{
        if(regexsenha.test(senha)){
            if(senha === "/\w{8,}/"){
                oitoCaract.style.color = "green";  
            }
            if(senha === "/(A-Z)+/"){
                umaLetraM.style.color = "green";  
            }
            if(senha === "/\d+/"){
                umNumero.style.color = "green";  
            }
        }
    }

})