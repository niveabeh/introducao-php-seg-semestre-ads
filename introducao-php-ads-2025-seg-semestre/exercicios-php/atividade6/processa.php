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
        $texto = $_POST["texto"] ?? "";

        if($texto == ""){
          echo "<div class='caixa'>Campo textarea vazio</div>";
        }else{
          $qtdPalavras = str_word_count($texto);
          if($qtdPalavras < 20){
            echo "<div class='caixa'>Texto curto.<br> Quantidade de palavras: ". $qtdPalavras."</div>";
            
          }else if($qtdPalavras > 20 && $qtdPalavras < 50){
            echo "<div class='caixa'>Texto médio.<br> Quantidade de palavras: ". $qtdPalavras."</div>";
          }else{
            echo "<div class='caixa'>Texto longo <br>Quantidade de palavras: ". $qtdPalavras."</div>";
          }
        }
     }
    ?>
</body>
</html>