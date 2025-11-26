<?php

require_once 'Operacao.php';
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
    $novoOb = null;

    if ($val1 === null || $val2 === null) {

        $erro = 'Entrada inválida. Certifique-se de informar números válidos';

    } else {
        
        switch ($operacao) {
            case 'somar':
                $novoOb = new Soma();
                break;
            case 'subtrair':
                $novoOb = new Subtracao();
                break;
            case 'multiplicar':
                $novoOb = new Multiplicacao();
                break;
            case 'dividir':
                if($val2 === 0.0){
                    $erro = "Erro na divisão por zero";
                }else{
                    $novoOb = new Divisao();
                }
                break;
        }
        if(empty($erro)){
            $novoOb->setNum1($val1);
            $novoOb->setNum2($val2);
            $resultado = $novoOb->calcula(); 
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