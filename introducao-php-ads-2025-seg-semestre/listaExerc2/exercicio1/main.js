const form = document.getElementById("formulario");
const campoNome = document.getElementById("nome");
const campoIdade = document.getElementById("idade");
const campoEmail = document.getElementById("email");


form.addEventListener('submit', (e) => {

     e.preventDefault();

     let nome = campoNome.value.trim();
     let email = campoEmail.value.trim();
     let idade = parseInt(campoIdade.value);
     let regexNum = /^[0-9]+$/;
     let regexString = /^[a-zA-Z]+$/;
     let regexEmail = /^([a-zA-Z][0-9]){3,}@([gmail]|[hotmail]|)+$/;
     

     if(nome === ""){
          alert("Infome somente um nome ");
          campoNome.focus();
          return false;
          
     }else if(!regexString.test(nome)){
          alert("Infome somente um nome");
          campoNome.focus();
          return false;
     }

     if(email === ""){
          alert("Infome somente um nome ");
          campoEmail.focus();
          return false;
     }else if(!regexString.test(nome)){
          alert("Infome somente um nome");
          campoEmail.focus();
          return false;
     }
})