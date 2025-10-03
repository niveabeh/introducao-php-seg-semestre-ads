
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $voltar = "<a class='voltar' href='index.html'>Voltar</a></div>";
        if($_SERVER['REQUEST_METHOD'] === "POST"){

            $nome = $_POST['nome'] ?? '';

            if(empty($nome)){
                echo "<div class='caixa'><p>O campo nome está vazio</p>". $voltar."/div>";
            }else if(!empty($nome)){
                echo "<div class='caixa'> <p>Bem-vindo(a)," . htmlspecialchars($nome)."</p>".  $voltar. "</div>";  
            }
        }
    ?>
</body>
</html>
