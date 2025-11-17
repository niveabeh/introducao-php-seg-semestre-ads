<?php

require_once 'Calculadora.php';
require_once 'TrataeMostra.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $valor1 = $_POST["valor1"] ?? "";
    $valor2 = $_POST["valor2"] ?? "";
    $operacao = $_POST["operacao"] ?? "";

    $val1 = TrataeMostra::parse_num($valor1);
    $val2 = TrataeMostra::parse_num($valor2);

    $resultado = null;
    $erro = null;

    $calcoper = new Calculadora();

    if ($val1 === null || $val2 === null) {

        $erro = 'Entrada inválida. Certifique-se de informar números válidos';
    } else {

        switch ($operacao) {
            case 'somar':
                //assim como em um a função há passagem de parametros e retorno (ou não) de valores,
                // na programação há essas ferramentas
                // Ali ele diz "na classe calculadora, use a função 'somar', onde irá retornar um valor e esse
                // valor será armazenado nesta variável
                $resultado = $calcoper->somar($val1, $val2);
                

                break;
            case 'subtrair':
                $resultado = $calcoper->subtrair($val1, $val2);

                break;
            case 'multiplicar':
                $resultado = $calcoper->multiplicar($val1, $val2);

                break;
            case 'dividir':
                if ($val2 == 0) {
                    $erro = 'Divisão por zero não permitida';
                } else {
                    $resultado = $calcoper->dividir($val1, $val2);
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

            //chamando o método estático exibirResultado da classe Calculadora
            TrataeMostra::exibirResultado($erro, $operacao, $val1, $val2, $resultado);
        ?>
       
    </main>
</body>

</html>