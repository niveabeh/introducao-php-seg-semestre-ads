const form = document.getElementById("formulario");
const campoInicio = document.getElementById("inicio");
const campoFim = document.getElementById("fim");
const campoResp = document.getElementById("resp");

form.addEventListener('submit', (e) => {

     e.preventDefault();

     let regexNum = /^[0-9]+$/;
     let numInicio = parseInt(campoInicio.value);
     let numFim = parseInt(campoFim.value);



     if (!regexNum.test(numInicio) || numInicio < 0) {
          alert("Informe um número valido");
          campoInicio.focus();
          return false;
     } else if (!regexNum.test(numFim) || numFim < 0) {
          alert("Informe um número valido");
          campoFim.focus();
          return false;
     } else if (parseInt(numInicio) >= parseInt(numFim)) {
          alert("O numero inicio tem que ser menor que num limite ");
          campoInicio.focus();
          return false;
     }
     return true;
})