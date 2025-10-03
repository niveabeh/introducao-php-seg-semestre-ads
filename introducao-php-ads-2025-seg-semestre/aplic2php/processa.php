<?php 

    if($_SERVER['REQUEST_METHOD']==="POST"){

    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';

        if(empty($nome)){
            echo "O campo nome está vazio.<br>";
            echo "<br><a href='index.html'>Voltar</a>";

        }else if(empty($email)){
            echo "O campo email está vazio.<br>";
            echo "<br><a href='index.html'>Voltar</a>";

        }else if(!empty($email) && !empty($email)){
           echo "Nome: ". htmlspecialchars($nome). "<br>";
           echo "Email: ". htmlspecialchars($email);
           echo "<br><a href='index.html'>Voltar</a>";

        }
    }
    
?>