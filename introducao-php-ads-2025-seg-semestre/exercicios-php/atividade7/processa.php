<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contador Personalizado</title>
</head>
<body>
    <?php 
     $voltar =  "<a class='btn'>Voltar</a>";
     if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $senha = $_POST["senha"] ?? "";

        if($senha === ""){
            echo "<div class='caixa'>Erro, compo 'senha' vazio ou inválido". $voltar ."</div>";
            echo $voltar;
            
        }else if(strlen($senha) < 8){
            echo "<div class='caixa'>Erro, senha fraca". $voltar ."</div>";
            
        }else if(!preg_match('/[A-Z]/', $senha)){
            echo "<div class='caixa'>Erro, senha não contém letra maiúscula". $voltar ."</div>";
            
        }else if(!preg_match('/\d/', $senha)){
            echo "<div class='caixa'>Erro, senha não contém número". $voltar ."</div>";
            
        }else{
            echo "<div class='caixa'>Entrou, senha salva". $voltar ."</div>";
        }

     }
    ?>
</body>
</html>