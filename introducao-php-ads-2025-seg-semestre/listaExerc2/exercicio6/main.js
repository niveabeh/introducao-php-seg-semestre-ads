const form = document.getElementById("formulario");
const campoNumero = document.getElementById("numero");



form.addEventListener('submit', (e) => {

     e.preventDefault();

     let regexNum = /^[0-9]+$/;
;
      numero = campoNumero.value;

     if(numero === ""){
          alert("Erro, campo numero vazio");
          campoNumero.focus();
          return false;
          
     }else if(!regexNum.test(numero)){
          alert("Erro, informe um numero valido");
          campoNumero.focus();
          return false;
     }
     
     numero = parseInt(campoNumero.value);
     alert(`O numero informado foi ${numero}`);
     campoNumero.value = "";
     campoNumero.focus();

     return true;
})