<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>senha</title>
</head>

<body>
    <section>
        <form action="processa.php" method="POST" id="formulario">
            <legend>Criar uma validação de senha</legend>

            <ul>
                <li id="oitoCaract">Pelo menos 8 caracteres.</li>
                <li id="umaLetraM">Uma letra maiúscula.</li>
                <li id="umNumero">Um número.</li>
                <li id="umEspecial">Um caractere especial.</li>
            </ul>

            <?php
            $voltar =  "<a class='btn' href='index.html'>Voltar</a>";
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $senha = $_POST["senha"] ?? "";

                if ($senha === "") {
                    echo "<div class='caixa'>Erro, compo 'senha' vazio ou inválido" . $voltar . "</div>";
                    echo $voltar;
                } else if (strlen($senha) < 8) {
                    echo "<div class='caixa'>Erro, senha fraca" . $voltar . "</div>";
                } else if (!preg_match('/[A-Z]/', $senha)) {
                    echo "<div class='caixa'>Erro, senha não contém letra maiúscula" . $voltar . "</div>";
                } else if (!preg_match('/\d/', $senha)) {
                    echo "<div class='caixa'>Erro, senha não contém número" . $voltar . "</div>";
                } else {
                    echo "<div class='caixa'>Entrou, senha salva" . $voltar . "</div>";
                }
            }
            ?>
        </form>
        <div id="resp">
        </div>
    </section>
    <script src="main.js"></script>
</body>

</html>