<?php
session_start();

function validar($valor)
{
    $valor = trim($valor);
    $valor = stripslashes($valor);
    $valor = htmlspecialchars($valor);
    return $valor;
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Contador Personalizado</title>
</head>

<body>

    <header>
        <div class="logo">
            <i class="fa-solid fa-cart-shopping"></i>
            <h1>SuperCod</h1>
        </div>
        <div class="info">
            <h2>Lista de Produtos</h2>
        </div>
    </header>
    <div class="container">
        <div class="menu">

        </div>
        <div class="container-direito">
            <div class="cadastrar">
                <form action="processa.php" method="POST" id="formProd">
                    <div class="coluna">
                        <label for="produto">Produto</label>
                        <input type="text" id="produto" name="produto" placeholder="Digite o nome do produto">
                    </div>
                    <div class="coluna">
                        <label for="preco">Preço</label>
                        <input type="text" id="preco" name="preco" placeholder="R$ 0,00">
                    </div>
                    <div class="colunabtnCol">
                        <button type="submit" class="btn">Cadastrar</button>
                    </div>
                </form>
            </div>
            <div class="listar">
                <table>
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="listaProdutos">
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $produto = validar($_POST["produto"] ?? "");
                            $preco = validar($_POST["preco"] ?? "");
                            $erros = [];


                            if ($produto === "") {
                                $erros[] = " <div class='divErro'>Erro, campo produto vazio</div>";
                            } else if (preg_match('/[0-9]/', $produto)) {
                                $erros[] = " <div class='divErro'>Erro, não aceita números, informe um nome do produto</div>";

                            } else if (preg_match('/[!@#$%^&*(),.?":{}|<>]/', $produto)) {
                                $erros[] = " <div class='divErro'>Erro, não aceita simbolos, informe um nome do produto</div>";
                            }

                            if ($preco === "") {
                                $erros[] = " <div class='erro'>Erro, campo preco vazio</div>";
                            } else if (!is_numeric($preco) || $preco < 0) {
                                $erros[] = " <div class='divErro'>Erro, informe um preco valido</div>";
                            }


                            if (empty($erros)) {
                                if (!isset($_SESSION['produtos'])) {
                                    $_SESSION['produtos'] = [];
                                    $_SESSION['precos'] = [];
                                }
                                $_SESSION['produtos'][] = $produto;
                                $_SESSION['precos'][] = number_format((float)$preco, 2, '.', '');
                            } else {
                                foreach ($erros as $erro) {
                                    echo $erro . "<br>";
                                }
                            }

                            if (isset($_SESSION['produtos']) && !empty($_SESSION['produtos'])) {

                                $count = count($_SESSION['produtos']);
                                for ($i = 0; $i < $count; $i++) {
                                    echo "<tr>  
                                    <td>{$_SESSION['produtos'][$i]}</td>
                                    <td>{$_SESSION['precos'][$i]}</td>
                                        <td>
                                        </td>
                                    </tr>";
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>