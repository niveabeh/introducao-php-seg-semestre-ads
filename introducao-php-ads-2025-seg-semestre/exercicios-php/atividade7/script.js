let form = document.getElementById("formulario");
let campoSenha = document.getElementById("senha");
let mensagem = document.getElementById("mensagem");
let oitoCaract = document.getElementById("oitoCaract");
let umaLetraM = document.getElementById("umaLetraM");
let umNumero = document.getElementById("umNumero");
let umEspecial = document.getElementById("umEspecial");
let caracteresEspeciais = /[!@#$%^&*(),.?":{}|<>]/;

form.addEventListener("input", (e) =>{
    e.preventDefault();
    console.log("entrou");
    let senha = campoSenha.value;

   if(senha.length >= 8){
        oitoCaract.style.color = "green";
   }else{
        oitoCaract.style.color = "red";
   }
   
   if(senha.match(/[A-Z]/)){
        umaLetraM.style.color = "green";
   }else{
        umaLetraM.style.color = "red";
   }
   
   if(senha.match(/\d/)){
        umNumero.style.color = "green";
   }else{
        umNumero.style.color = "red";
   }

   if(senha.match(caracteresEspeciais)){
        umEspecial.style.color = "green";
   }else{
        umEspecial.style.color = "red";
   }

})
