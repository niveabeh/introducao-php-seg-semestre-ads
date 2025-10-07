<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tabuada</title>
</head>
<body>
<?php 
    $resultado = "";
    $voltar = "<a class='voltar' href='index.html'>Voltar</a></div>";
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $numero = $_POST['numero'] ?? '';
        


        if(empty($numero)){
            echo "<div class='caixa'><p>O campo nome está vazio</p>". $voltar."</div>";
        }else if(!empty($numero)){
            $resultado .= "<div class='caixa'><h2>Tabuada de $numero</h2>";
            $resultado .= "<table border='1' cellpadding='5'cellspacing='0' style='border-collapse: collapse; text-align: center;'>";
            for($i = 1; $i <= 9; $i++){
                $multiplicacao = $numero * $i;
                $resultado .= "<tr>
                                    <td>$numero</td>
                                    <td>x</td>
                                    <td>$i</td>
                                    <td>=</td>
                                    <td>$multiplicacao</td>
                                </tr>";
                                    
            }
            $resultado .= "</table> ".$voltar. "</div>";
            echo $resultado;
        }
    }
?>
</body>
</html>