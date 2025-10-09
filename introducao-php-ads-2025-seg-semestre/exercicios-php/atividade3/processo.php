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
    // function btnVoltar(){
    //     echo "<a class='btn'>Voltar</a>";
    // }
    $voltar =  "<a class='btn'>Voltar</a>";

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $notaUm = $_POST["notaUm"] ?? "";
        $notaDois = $_POST["notaDois"] ?? "";
        $notaTres = $_POST["notaTres"] ?? "" ;
        $notaQuatro = $_POST["notaQuatro"] ?? "";

        if($notaUm =="" || !is_numeric($notaUm)){
            echo "<div class='caixa'>Erro, informe um número válido no campo</div>";
        }else if($notaDois =="" || !is_numeric($notaDois)){
            echo "<div class='caixa'>Erro, informe um número válido no campo</div>";
        }else if($notaTres =="" || !is_numeric($notaTres)){
            echo "<div class='caixa'>Erro, informe um número válido no campo</div>";
        }else if($notaQuatro =="" || !is_numeric($notaQuatro)){
            echo "<div class='caixa'>Erro, informe um número válido no campo</div>";
        }else{
            $vetor = [(float)$notaUm, (float)$notaDois, (float)$notaTres, (float)$notaQuatro];
            $acumulador = 0.0;
            for($i = 0 ; $i < 4; $i++){
                $acumulador += $vetor[$i];
            }
            $media = $acumulador/4;

            if($media >= 7){
                echo "<div class='caixa'>Aprovado. <br> A média: $media </div>";
            }else{
                echo "<div class='caixa'>Reprovado. <br> A média: $media </div>";
            }
        }
        
    }
        
    ?>
</body>
</html>