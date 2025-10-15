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
            function voltar(){
                $voltar = "<a class='btn' href='index.html'>Voltar</a></div>";
                echo  $voltar;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $numero = validar($_POST['numero']) ?? '';


                if (empty($numero)) {
                    echo 'Preencha todos os campos';
                    exit;
                } else if ($numero < 0 || !is_numeric($numero)) {
                    echo 'Erro, numero inválida';
                    exit;
                } else {
                    echo "<div class='caixa'>Números: ";
                    $contador = $numero;
                    while ( 0 <= $contador) {
                        echo "<p> $contador,</p>";
                        $contador--;
                    }
                    echo "</div>";
                    voltar();
                }
            }
            ?>
        </div>
    </section>
    <script src="main.js"></script>
</body>

</html>