function validarForm(){
    
    let nome = document.getElementById("nome").value.trim();
    let email = document.getElementById("email").value.trim();
    
    if(nome === "" || email === ""){
        alert("Preencha todo os campos obrigatórios")
        return false;
    }
    return true;
    
}