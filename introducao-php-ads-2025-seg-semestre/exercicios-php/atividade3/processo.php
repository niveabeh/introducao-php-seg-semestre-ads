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

        $notaUm = $_POST["notaUm"] ?? "" || $_POST[(float)"notaUm"];
        $notaDois = $_POST["notaDois"] ?? ""|| $_POST[(float)"notaDois"];
        $notaTres = $_POST["notaTres"] ?? "" || $_POST[(float)"notaTres"];
        $notaQuatro = $_POST["notaQuatro"] ?? ""|| $_POST[(float)"notaQuatro"];
        
        if(empty($notaUm)){
            echo "<div class='caixa'><p>Por favor, informe um número no campo Primeira nota</p>".$voltar." </div>";
        }else if(!is_numeric($notaUm)){
            echo "<div class='caixa'><p>Por favor, informe um número valido</p>".$voltar." </div>";
        }else if(empty($notaDois)){
            echo "<div class='caixa'><p>Por favor, informe um número no campo Primeira nota</p>".$voltar." </div>";
        }else if(!is_numeric($notaDois)){
            echo "<div class='caixa'><p>Por favor, informe um número valido</p>".$voltar." </div>";
        }else if(empty($notaTres)){
            echo "<div class='caixa'><p>Por favor, informe um número no campo Primeira nota</p>".$voltar." </div>";
        }else if(!is_numeric($notaTres)){
            echo "<div class='caixa'><p>Por favor, informe um número valido</p>".$voltar." </div>";
        }else if(empty($notaQuatro)){
            echo "<div class='caixa'><p>Por favor, informe um número no campo Primeira nota</p>".$voltar." </div>";
        }else if(!is_numeric($notaQuatro)){
            echo "<div class='caixa'><p>Por favor, informe um número valido</p>".$voltar." </div>";
        }
    }
    ?>
</body>
</html>