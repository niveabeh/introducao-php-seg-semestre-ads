<?php

require_once 'TrataeMostra.php';
require_once 'Subtracao.php';
require_once 'Divisao.php';
require_once 'Soma.php';
require_once 'Multiplicacao.php';



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
                //assim como em um a função há passagem de parametros e retorno (ou não) de valores,
                // na programação há essas ferramentas
                // Ali ele diz "na classe calculadora, use a função 'somar', onde irá retornar um valor e esse
                // valor será armazenado nesta variável
                $soma = new Soma();
                $soma->setNum1($val1);
                $soma->setNum2($val2); 
                $resultado = $soma->calculaSoma(); 
                break;
            case 'subtrair':
                $subtrair = new Subtracao();
                $subtrair->setNum1($val1);
                $subtrair->setNum2($val2); 
                $resultado = $subtrair->calculaSubtrair(); 

                break;
            case 'multiplicar':
                $multiplica = new Multiplicacao();
                $multiplica->setNum1($val1);
                $multiplica->setNum2($val2); 
                $resultado = $multiplica->calculaMultiplicacao(); 

                break;
            case 'dividir':
                $divide = new Divisao();
                $divide->setNum1($val1);
                $divide->setNum2($val2); 
                $resultado = $divide->calculaDivisao(); 
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