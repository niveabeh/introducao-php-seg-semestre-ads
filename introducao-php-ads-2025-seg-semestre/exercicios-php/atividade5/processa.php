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
       $regexEmail = "/^(\w){3,}@(\w){3,}.?((\w){2,})?$/";

     }
    
    
    ?>
</body>
</html>