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
        $inicio = $_POST["inicio"] ?? "";
        $fim = $_POST["fim"] ?? "";

        if($inicio == "" || !is_numeric($inicio)){
            echo "<div class='caixa'>Erro, compo 'inicio' vazio ou inválido</div>"; 
        }else if($fim == "" || !is_numeric($fim)){
            echo "<div class='caixa'>Erro, compo 'fim' vazio ou inválido</div>"; 
        }else{
            if($inicio > $fim){
                echo "<div class='caixa'>Erro, inicio maior que fim</div>"; 
            }else{
                 echo  "<div class='caixa'>";
                
                for ($i = $inicio; $i <= $fim; $i++){
                    echo "$i,";
                }
                echo  "</div>";
            }
        }
     }
    
    
    ?>
</body>
</html>