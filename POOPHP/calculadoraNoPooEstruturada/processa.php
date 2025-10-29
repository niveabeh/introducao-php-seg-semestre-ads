<?php

function somar($a, $b)
{
    return $a + $b;
}
function subtrair($a, $b)
{
    return $a - $b;
}
function multiplicar($a, $b)
{
    return $a * $b;
}
function dividir($a, $b)
{
    if ($a < $b) {
        return null;
    } else {
        return $a / $b;
    }
}
//Função utilitário: limpa/normaliza entrada
function parse_num($val)
{
    //removendo os espaços e adicionando "esse valor" em uma variável
    $val = trim($val);
    //trocando a virgula que está vindo do formulário para ponto
    //pegando a variável que já está em trim para salva-la novamente
    $val = str_replace(",", ".", $val);
    // a funcao preg_match para utilizar regex 
    //regex para validar SE NAO FOR (falso) com os caracteres/condições ditas
    if (!preg_match("/^\s*[+-]?\d+(?:[\.,])?\s*$/", $val)) {
        return null;
    }
    //caso a condição for verdadeira, ou seja, se os valores estiverem na condições que coloquei no regex
    return floatval($val);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valor1 = $_POST["valor1"] ?? "";
    $valor2 = $_POST["valor2"] ?? "";
    $operacao = $_POST["operacao"] ?? "";

    $resultado = null;
    $erro = null;

    if ($valor1 === null || $valor2 === null) {
        $erro = 'Entrada inválida. Certifique-se de informar números válidos';
    } else {
        switch ($operacao) {
            case 'somar':
                $resultado = somar($valor1, $valor2);

                break;
            case 'subtrair':
                $resultado = subtrair($valor1, $valor2);

                break;
            case 'multiplicar':
                $resultado = multiplicar($valor1, $valor2);

                break;
            case 'dividir':
                if ($valor2 == 0) {
                    $erro = 'Divisão por zero não permitida';
                } else {
                    $resultado = dividir($valor1, $valor2);
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
        <h1>Resultado</h1>
        <?php

        if ($erro !== null) {
            echo "<p class='error> " . htmlspecialchars($erro) . "</p>";
        } else {

            echo "<p>Operação: " . htmlspecialchars($operacao) . "<br> " . htmlspecialchars($valor1);

            switch ($operacao) {
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
            echo "</strong>" . htmlspecialchars($valor2) . " = <strong>" . htmlspecialchars($resultado) . "</strong></p>";
        }
        ?>
        <a href="index.html">Voltar</a>
    </main>
</body>

</html>