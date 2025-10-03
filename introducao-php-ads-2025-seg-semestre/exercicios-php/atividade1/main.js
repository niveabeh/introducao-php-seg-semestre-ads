function validarForm(){
    let nome = document.getElementById("nome").value.trim();
    let inputNome = document.getElementById("nome");


    if(nome === ""){
        alert("O Campo nome está vazio");
        inputNome.focus();
        return false;
    }
    return true;   
}