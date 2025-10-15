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
                $nome = validar($_POST['nome']) ?? '';
                $email = validar($_POST['email']) ?? '';
                $idade = validar($_POST['idade']) ?? '';

                if (empty($nome) || empty($email) || empty($idade)) {
                    echo 'Preencha todos os campos';
                } else if (!preg_match("/^[a-zA-Z]+(\s[a-zA-Z]+)*/", $nome)) {
                    echo 'Nome inválido';
                } else if ($idade < 0 || !is_numeric($idade)) {
                    echo 'Erro, idade inválida';
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo 'E-mail inválido';
                }else{
                    echo "<div class='caixa'>Nome: $nome <br> Idade: $idade <br> E-mail: $email </div>";
                }
            }
            ?>
        </div>
    </section>
    <script src="main.js"></script>
</body>

</html>