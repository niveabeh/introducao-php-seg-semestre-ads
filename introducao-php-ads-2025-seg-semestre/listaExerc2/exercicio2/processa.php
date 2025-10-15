<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gerador de Múltiplos</title>
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

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $numero = validar($_POST['numero']) ?? '';
                

                if (empty($numero)) {
                    echo 'Preencha todos os campos';
                }else if ($numero < 0 || !is_numeric($numero)) {
                    echo 'Erro, numero inválida';
                }else{
                    echo "<div class='caixa'>Números: ";

                    for ($i = 1; $i <= $numero; $i++) {
                        if ($i %2 == 0) {
                            echo "<p> $i,</p>";
                        } 
                       
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