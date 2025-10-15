const form = document.getElementById("formulario");
const campoTelefone = document.getElementById("telefone");



form.addEventListener('submit', (e) => {

     e.preventDefault();

     let regexNum = /^\(?\d{2}\)?[\s-]?\d{4,5}-?\d{4}$/;
;
      telefone = campoTelefone.value;

     if(telefone === ""){
          alert("Erro, campo telefone vazio");
          campoTelefone.focus();
          return false;
          
     }else if(!regexNum.test(telefone)){
          alert("Erro, informe um telefone valido");
          campoTelefone.focus();
          return false;
     }
    
     alert(`O telefone informado foi ${telefone}`);
     campoTelefone.value = "";
     campoTelefone.focus();

     return true;
})