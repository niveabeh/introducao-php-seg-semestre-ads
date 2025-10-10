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
       $email = $_POST["email"] ?? "";
       
       if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
         echo "<div class='caixa'>Email inválido</div>";
       }
       else{
        echo "<div class='caixa'>continua o código</div>";
       }
      }
    
    ?>
</body>
</html>