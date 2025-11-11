<?php

final class Calculadora
{

    public static function somar(float $a, float $b): float
    {
        return $a + $b;
    }
    public static function subtrair(float $a, float $b): float
    {
        return $a - $b;
    }
    public static function multiplicar(float $a, float $b): float
    {
        return $a * $b;
    }
    public static function dividir(float $a, float $b): float
    {
        if ($b === 0.0) {
            return "Erro: divisão por zero";
        }
        return $a / $b;
    }
    public static function exibirResultado(?string $er, string $oper, ?float $v1, ?float $v2, ?float $resultado){
        echo "<h1>Resultado</h1>";

        if(!empty($er)){
            echo "<p class='error'>".htmlspecialchars($er, ENT_QUOTES, 'UTF-8')."</p>";
        }else{
            echo "<p>Operação: " . htmlspecialchars($oper) . "<br> " . htmlspecialchars($v1);

            switch ($oper) {
                case 'somar':
                    echo "+";
                    break;
                case 'subtrair':
                    echo "-";
                    break;
                case 'multiplicar':
                    echo "x";
                    break;
                case 'dividir':
                    echo "/";
                    break;
            }
            echo "</strong>" . htmlspecialchars($v2) . " = <strong>" . htmlspecialchars($resultado) . "</strong></p>";

        }
        echo "<a href='index.html'>Voltar</a>";
    }
    public static function parse_num($val ) : ?float{

        $s = trim($val);

        $s = str_replace(',', '.', $s);

        if(!preg_match('/^\s*[+-]?\d+(?:[\.,]\d+)?\s*$/',$s)){
            return null;
        }
        return floatval($s);


    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $valor1 = $_POST["valor1"] ?? "";
    $valor2 = $_POST["valor2"] ?? "";
    $operacao = $_POST["operacao"] ?? "";

    $val1 = Calculadora::parse_num($valor1);
    $val2 = Calculadora::parse_num($valor2);

    $resultado = null;
    $erro = null;

    if ($valor1 === null || $valor2 === null) {

        $erro = 'Entrada inválida. Certifique-se de informar números válidos';
    } else {

        switch ($operacao) {
            case 'somar':
                //assim como em um a função há passagem de parametros e retorno (ou não) de valores,
                // na programação há essas ferramentas
                // Ali ele diz "na classe calculadora, use a função 'somar', onde irá retornar um valor e esse
                // valor será armazenado nesta variável
                $resultado = Calculadora::somar($valor1, $valor2);
                

                break;
            case 'subtrair':
                $resultado = Calculadora::subtrair($valor1, $valor2);

                break;
            case 'multiplicar':
                $resultado = Calculadora::multiplicar($valor1, $valor2);

                break;
            case 'dividir':
                if ($valor2 == 0) {
                    $erro = 'Divisão por zero não permitida';
                } else {
                    $resultado = Calculadora::dividir($valor1, $valor2);
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
            Calculadora::exibirResultado($erro, $operacao, $val1, $val2, $resultado);
        ?>
       
    </main>
</body>

</html>