const form = document.getElementById("formulario");
const campoNome = document.getElementById("nome");
const campoIdade = document.getElementById("idade");
const campoEmail = document.getElementById("email");


form.addEventListener('submit', (e) => {

     e.preventDefault();

     let nome = campoNome.value.trim();
     let email = campoEmail.value.trim();
     
     let regexNum = /^[0-9]+$/;
     let regexString = /^[a-zA-Z]+$/;
     let regexEmail = /^(\w){3,}@(\w){3,}.?((\w){3,})?$/;
     let idade = campoIdade.value;
     

     if(nome === ""){
          alert("Erro, campo nome vazio");
          campoNome.focus();
          return false;
          
     }else if(!regexString.test(nome)){
          alert("Erro, informe um nome valido");
          campoNome.focus();
          return false;
     }
     
     if(idade === "" ){
          alert("Erro, campo idade vazio");
          campoIdade.focus();
          return false;
     }else if(!regexNum.test(idade) || idade < 0){
          alert("Erro, informe uma idade valida");
          campoIdade.focus();
          return false;
     }

     idade = parseInt(campoIdade.value);

     if(email === ""){
          alert("Erro, campo email vazio");
          campoEmail.focus();
          return false;
     }else if(!regexEmail.test(email)){
          alert("Erro, informe um email valido");
          campoEmail.focus();
          return false;
     }
     alert("Cadastro realizado com sucesso");
     campoNome.value = "";
     campoIdade.value = "";
     campoEmail.value = "";
     return true;
})