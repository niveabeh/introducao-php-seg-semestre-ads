<?php

require_once 'IOperacao.php';
require_once 'Soma.php';
require_once 'Divisao.php';
require_once 'Multiplicacao.php';
require_once 'Subtracao.php';
require_once 'TrataeMostra.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $valor1 = $_POST["valor1"] ?? "";
    $valor2 = $_POST["valor2"] ?? "";
    $operacao = $_POST["operacao"] ?? "";

    $val1 = TrataeMostra::parse_num($valor1);
    $val2 = TrataeMostra::parse_num($valor2);

    $resultado = null;
    $erro = null;

    if ($val1 === null || $val2 === null) {

        $erro = 'Entrada inválida. Certifique-se de informar números válidos';
    } else {

        switch ($operacao) {
            case 'somar':
                $soma = new Soma();
                $soma->setNum1($val1);
                $soma->setNum2($val2);
                $resultado = $soma->calcula();
                break;
            case 'subtrair':
               $subtrair = new Subtracao();
               $subtrair->setNum1($val1);
               $subtrair->setNum2($val2);
               $resultado = $subtrair->calcula();

                break;
            case 'multiplicar':
                $multiplicar = new Multiplicacao();
                $multiplicar->setNum1($val1);
                $multiplicar->setNum2($val2);
                $resultado = $multiplicar->calcula();

                break;
            case 'dividir':
                if ($val2 == 0) {
                    $erro = 'Divisão por zero não permitida';
                } else {
                    $dividir = new Divisao();
                    $dividir->setNum1($val1);
                    $dividir->setNum2($val2);
                    $resultado = $dividir->calcula();
                }
                break;
            default:
                $erro = 'Operação desconhecida';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Calculadora</title>
</head>
<body>
    <main class="container">
        <?php
            TrataeMostra::exibirResultado($erro, $operacao, $val1, $val2, $resultado);
        ?>
    </main>
</body>
</html>