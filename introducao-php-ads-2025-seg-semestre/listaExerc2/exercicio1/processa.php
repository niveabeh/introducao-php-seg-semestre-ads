<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <section>
        
        <div id="resp">
           <?php
                function botao(){
                    $voltar = "<a class='btn' href='index.html'>Voltar</div>";
                }
                function validar($valor){
                    $valor = htmlspecialchars($valor);
                    $valor = trim($valor);
                    $valor = stripcslashes($valor);
                    return $valor;
                }

                if($_SERVER['REQUEST_METHOD'] === 'POST'){

                    $numInicio = validar($_POST['inicio']) ?? "";
                    $numFim = validar($_POST['fim']) ?? "";

                    if(!ctype_digit($numInicio) || !ctype_digit($numFim)){
                        echo "<div class='caixa'>Erro, informe um número válido!</div>";
                        voltar();
                        exit;
                    }

                    $numInicio = (int) $numInicio;
                    $numFim = (int) $numFim;

                    if($numInicio >= $numFim){
                        echo "<div class='caixa'>Erro, número início deve ser maior que o limite!</div>";
                        voltar();
                        exit;
                    }
                    $contador = $numInicio;
                    echo "<div class='caixa'>";
                    while($contador <= $numFim){
                        echo "<p>$contador</p>";
                        $contador += $numInicio;
                    }
                    echo "</div>";
                }
           ?>
        </div>
    </section>
    <script src="main.js"></script>
</body>
</html>