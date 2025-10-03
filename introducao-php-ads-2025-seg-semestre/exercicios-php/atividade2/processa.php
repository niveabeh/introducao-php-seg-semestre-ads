<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php 
    $voltar = "<a class='voltar' href='index.html'>Voltar</a></div>";
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $numero = $_POST['numero'] ?? '';
        if(empty($numero)){
            echo "<div class='caixa'><p>O campo nome está vazio</p>". $voltar."</div>";
        }else if(!empty($numero)){
            if($numero % 2 == 0){
                echo "<div class='caixa'> <p>O número " . htmlspecialchars($numero)." é par</p>".  $voltar. "</div>";
            }else{
                echo "<div class='caixa'> <p>O número " . htmlspecialchars($numero)." é ímpar</p>".  $voltar. "</div>";
            }
           
        }
    }

?>
    
</body>
</html>

