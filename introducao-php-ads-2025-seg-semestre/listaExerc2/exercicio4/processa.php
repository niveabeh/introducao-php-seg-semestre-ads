<?php

session_start();

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contador decrescente</title>
</head>

<body>
    <section>

        <div id="resp">
            <?php
            function validar($valor)
            {
                $valor = htmlspecialchars($valor);
                $valor = trim($valor);
                $valor = stripcslashes($valor);
                return $valor;
            }
            function voltar()
            {
                $voltar = "<a style=' color: #4d4d4d; text-decoration: none; font-weight: bold; font-size: 16px; margin-top: 1rem;  background-color: #73ff00; padding: 12px 20px; border-radius: 20px; ' href='index.html'>Voltar</a></div>";
                echo  $voltar;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $numero = validar($_POST['numero']) ?? '';
                if (empty($numero)) {
                    echo 'Preencha todos os campos';
                    exit;
                } else if (!is_numeric($numero) || $numero < 0) {
                    echo 'Erro, numero inválido';
                    exit;
                } else {
                    if (!isset($_SESSION['numero'])) {
                        $_SESSION['numero']= [];
                    }
                    echo "<div class='caixa'>";

                    $numero = (int) $numero;
                    $_SESSION['numero'][] = $numero;

                    do{
                        if($numero <= 10){
                            echo "<p>$numero<br></p>";
                            voltar();
                        }
                        break;
                    }
                    while( $numero <= 10);
                    if($numero > 10){
                        echo "<div class='caixa'>".implode(",",$_SESSION['numero'])."</div>";
                        voltar();
                        session_destroy();
                    }
                    echo "</div>";
                    
                    
                }
            }

            ?>
        </div>
    </section>
    <script src="main.js"></script>
</body>

</html>