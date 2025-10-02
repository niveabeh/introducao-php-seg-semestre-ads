function validarformulario(){
    
    /*A função trim()server para remover 
    possíveis espaços em brancos no início ou final do input*/

    let nome = document.getElementById("nome").value.trim();
    let email = document.getElementById("email").value.trim();
    let mensagem = document.getElementById("mensagem").value.trim();

    if(nome === "" || email=== "" || mensagem === ""){
        alert("Preencha todos os campos obrigatório");
        return false;

    }
    return true;

}