<?php

session_start();

require_once 'model/Casa.php';
require_once 'model/Porta.php';
require_once 'model/Janela.php';

if($_SERVER['REQUEST_METHOD']  === 'POST'){
    $acao = $_POST['acho'] ?? '';

    switch($acho){
        case 'construir':
            echo "<h2>Você escolheu construir a casa!</h2>";
            echo "<p>Preencha os dados abaixo para definir as características da sua casa:</p>";
            echo '<form action="controller/processa.php" method="POST">
            <input type="hidden" name="achao" value="salvar_casa">

            <label for="descricao"><strong>Descrição da casa:</strong></label>
            <input type="text" name="descricao" id="descricao" required><br><br>
            <label for="cor"><strong>Cor da casa:</strong></label>
            <input type="text" name="cor" id="cor" required><br><br>
            <label for="qtde_portas"><strong>Quantidade de Portas</strong></label>
            <input type="number" name="qtde_portas" id="qtde_portas" min="0" required> <br><br>
            <label for="qtde_janelas"><strong>Quantidade de Janelas:</strong></label>
            <input type="number" name="qtde_janelas" id="qtde_janelas" min="0" required> <br><br>

            <button type="submit">Avançar</button>
            </form>';
            break;
        case 'salvar_casa';
        $descricao = $_POST['descricao'] ?? '';
        $cor = $_POST['cor'] ?? ' ';
        $qtdePortas= (int)($_POST['qtde_portas'] ?? 0);
        $qtdeJanelas= (int)($_POST['qtde_janelas'] ?? 0);

        echo "salvar_casa";
        $descricao = $_POST['descricao'] ?? '';
        $cor = $_POST['cor'] ?? '';
        $qtdePortas = (int)($_POST['qtde_portas'] ?? 0);
        $qtdeJanelas = (int)($_POST['qtde_janelas'] ?? 0);
        echo "<h2>Etapa 2:: Definir portas e janelas</h2>";
        echo "<form action='processa.php' method='POST'>
        <input type='hidden' name='acao' value='finalizar_casa'>
        <input type='hidden' name='descricao' value='{$descricao}'>
        <input type='hidden' name='cor' value='{$cor}'>
        <input type='hidden' name='qtde_portas' value='{$qtde_portas}'>
        <input type='hidden' name='qtde_janelas' value='{$qtde_janelas}'>
         </form>";
         if($qtdePortas>0){
            echo "<h3>Portas</h3>";
            for($i = 1; $i <= $qtdePortas; $i++){
                echo "<label for='descricao_portas_{$i}'>Descrição da Porta {$i}:</label><br>
                <input type='text' name='descricao_portas_{$i}' required><br>
                <label for='estado_porta_{$i}'>Estado: </label>
                <select name='estado_porta_{$i}'>
                <option value='0'>Fechado</option>
                <option value='1'>Aberta</option>
                </select><br><br>";
            }
         }
         if($qtdeJanelas > 0){
            echo "<h3>Janela</h3>";
            for($i = 1; $i <= $qtdeJanelas; $i++){
                echo "<label>Descrição da janela {$i}:</label><br>
                <input type='text' name='descricao_janela_{$i}' required><br>
                <label>Estado:</label>
                <select name='estado_janela_{$i}'>
                <option value='0'>Fechada</option>
                <option value='1'>Aberta</option>
                </select> <br><br>";
            }
         }
         echo "<button type='submit'>Finalizar Construção</button> </form>";
    }
}


?>