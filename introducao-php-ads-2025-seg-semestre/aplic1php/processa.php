<?php
 $nome = $_POST['nome'];
 $email = $_POST['email'];
 $mensagem = $_POST['mensagem'];
//  echo "<h2>Resultado</h2>"; 
//  echo "Nome: ". htmlspecialchars($nome). "<br>";
//  echo "Email: ". htmlspecialchars($email). "<br>";
//  echo "Mensagem: ". htmlspecialchars($mensagem). "<br>";
 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "poppins", sans-serif;
        }
        body{
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #dedede;
        }
        .resultado{
            background:  #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 10px #0000001e;
            width: 30%;
            height: auto;
            display: flex;
            align-items: left;
            justify-content: center;
            gap: 20px;
            flex-direction: column;
        }
        h2{
            text-align: center;
            color: #333;

        }
        p{
            margin: 10px 0;
            font-size: 1rem;   
        }
        span{
            font-weight: bold;
        }
        .btn-voltar{
            padding: 16px 20px;
            border-radius: 2rem;
            background: #1840c5;
            color: #fff;
            font-size: 1rem;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="resultado">
        <h2>Dados recebidos</h2>
        <!-- Use span quando quiser aplicar (css) em uma parte de um texto -->
        <p><span>Nome:</span><?php echo htmlspecialchars($nome);?></p>
        <p><span>Email:</span><?php echo htmlspecialchars($email);?></p>
        <p><span>Mensagem:</span><?php echo htmlspecialchars($mensagem);?></p>
        <?php echo "<a class='btn-voltar' href='http://localhost:8080/aplic1php/'>Voltar</a>";?>
    </div>
</body>
</html>