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

                    
                    if(empty($numInicio) || empty($numFim)){
                        echo "<div class='caixa'>Vazio</div>";
                    }else if(!is_numeric($numInicio) || !is_numeric($numFim)){
                        echo "<div class='caixa'>Informe um número válido</div>";
                    }else{

                        $contador = $numInicio; 
                        echo "<div class='caixa'>";
                        do{
                            echo  "<p>$contador,</p>";
                            $contador = $contador * $numFim;
                        }while($contador <= $numFim);
                        echo "</div>";
                    }
                }
           ?>
        </div>
    </section>
    <script src="main.js"></script>
</body>
</html>