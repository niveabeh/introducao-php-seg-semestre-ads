<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>processamento</title>
</head>
<body>
    


<?php
session_start();

require_once '../model/Carro.php';
require_once '../model/Fabrica.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "<h2>Nenhuma ação recebida</h2><br><a href='../index.html'>Voltar</a>";
    exit;
}

if (!isset($_SESSION['fabrica'])) {
    $_SESSION['fabrica'] = serialize(new Fabrica());
}

$fabrica = unserialize($_SESSION['fabrica']);
$acao = $_POST['acao'] ?? '';

switch ($acao) {

    case 'fabricar':
        echo "<h2>Quantos carros deseja fabricar?</h2>";
        echo "
            <form action='processa.php' method='POST'>
                <input type='hidden' name='acao' value='formularios'>
                <label>Quantidade:</label>
                <input type='number' name='quantidade' min='1' required>
                <button type='submit'>Enviar</button>
            </form>
            <br><a href='../index.html'>Voltar</a>
        ";
        break;

    case 'formularios':
        $quantidade = intval($_POST['quantidade'] ?? 1);
        if ($quantidade < 1) $quantidade = 1;

        echo "<h2>Preencha os dados dos {$quantidade} carros</h2>";
        echo "<form action='processa.php' method='POST'>";
        echo "<input type='hidden' name='acao' value='salvar_carros'>";
        echo "<input type='hidden' name='quantidade' value='{$quantidade}'>";

        for ($i = 0; $i < $quantidade; $i++) {
            echo "<fieldset style='margin-bottom:15px; padding:10px; border:1px solid #ccc;'>";
            echo "<legend>Carro " . ($i + 1) . "</legend>";
            echo "<label>Modelo:</label><br>";
            echo "<input type='text' name='carros[{$i}][modelo]' required><br>";
            echo "<label>Cor:</label><br>";
            echo "<input type='text' name='carros[{$i}][cor]' required><br>";
            echo "<label>Ano:</label><br>";
            echo "<input type='number' name='carros[{$i}][ano]' min='1886' max='2024' required><br>";
            echo "<label>Preço:</label><br>";
            echo "<input type='number' step='0.01' name='carros[{$i}][preco]' min='0' required><br>";
            echo "</fieldset>";
        }

        echo "<button type='submit'>Fabricar carros</button>";
        echo "</form>";
        echo "<br><a href='../index.html'>Voltar</a>";
        break;

    case 'salvar_carros':
        $carrosDados = $_POST['carros'] ?? [];
        $totalFabricados = 0;

        foreach ($carrosDados as $dados) {
            $modelo = $dados['modelo'] ?? '';
            $cor = $dados['cor'] ?? '';
            $ano = intval($dados['ano'] ?? 0);
            $preco = floatval($dados['preco'] ?? 0);

            if ($modelo && $cor && $ano > 0 && $preco >= 0) {
                $fabrica->fabricarCarro($modelo, $cor, $ano, $preco, 1);
                $totalFabricados++;
            }
        }

        $_SESSION['fabrica'] = serialize($fabrica);

        echo "<h2>{$totalFabricados} carro(s) fabricado(s) com sucesso!</h2>";
        echo "<a href='../index.html'>Voltar</a>";
        break;

    case 'vender':
        $carros = $fabrica->getCarros();

        echo "<h2>Vender Carro</h2>";

        if (empty($carros)) {
            echo "<p>Não há carros disponíveis para venda.</p>";
            echo "<br><a href='../index.html'>Voltar</a>";
            break;
        }

        echo "<h3>Carros disponíveis para venda:</h3>";
        echo "<ul>";
        foreach ($carros as $index => $carro) {
            echo "<li>";
            echo "Modelo: {$carro->getModelo()} | Cor: {$carro->getCor()} | Ano: {$carro->getAno()} | Preço: R$ " . number_format($carro->getPreco(), 2, ',', '.') . " | Quantidade: {$carro->getQuantidade()}";
            echo "</li>";
        }
        echo "</ul>";

        echo "
        <form action='processa.php' method='POST'>
            <input type='hidden' name='acao' value='realizar_venda'>

            <label>Modelo:</label><br>
            <input type='text' name='modelo' required><br><br>

            <label>Cor:</label><br>
            <input type='text' name='cor' required><br><br>

            <label>Ano:</label><br>
            <input type='number' name='ano' min='1886' max='2024' required><br><br>

            <button type='submit'>Vender</button>
        </form>
        <br><a href='../index.html'>Voltar</a>
        ";
    break;

    case 'realizar_venda':
        $modelo = $_POST['modelo'] ?? '';
        $cor = $_POST['cor'] ?? '';
        $ano = intval($_POST['ano'] ?? 0);

        $carros = $fabrica->getCarros();
        $sucesso = false;

        foreach ($carros as $i => $carro) {
            if ($carro->getModelo() === $modelo && $carro->getCor() === $cor && $carro->getAno() === $ano) {
                $fabrica->removerCarroPorIndice($i);
                $sucesso = true;
                break;
            }
        }

        $_SESSION['fabrica'] = serialize($fabrica);

        echo $sucesso
            ? "<h2>Carro vendido com sucesso!</h2>"
            : "<h2>Carro não encontrado para venda!</h2>";

        echo "<br><a href='../index.html'>Voltar</a>";
    break;

    case 'listar':
        $carros = $fabrica->getCarros();
        if (empty($carros)) {
            echo "<h2>Nenhum carro na fábrica!</h2>";
        } else {
            echo "<h2>Carros na Fábrica:</h2>";
            foreach ($carros as $carro) {
                echo "<div style='border:1px solid #ccc; padding:10px; margin-bottom:10px;'>";
                echo "<p><strong>Modelo:</strong> " . $carro->getModelo() . "</p>";
                echo "<p><strong>Cor:</strong> " . $carro->getCor() . "</p>";
                echo "<p><strong>Ano:</strong> " . $carro->getAno() . "</p>";
                echo "<p><strong>Quantidade:</strong> " . $carro->getQuantidade() . "</p>";
                echo "<p><strong>Preço:</strong> R$ " . number_format($carro->getPreco(), 2, ',', '.') . "</p>";
                echo "</div>";
            }
        }
        echo '<br><a href="../index.html">Voltar ao menu</a>';
        break;

    case 'limpar_sessao':
        session_unset();
        session_destroy();
        echo "<h2>Dados da fábrica apagados!</h2>";
        echo "<p>Você pode iniciar uma nova sessão agora.</p>";
        echo '<br><a href="../index.html">Voltar</a>';
        break;

    default:
        echo "<h2>Ação inválida!</h2>";
        echo '<a href="../index.html">Voltar</a>';
        break;
}
?>
</body>
</html>