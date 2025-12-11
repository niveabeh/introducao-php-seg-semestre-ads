<?php

session_start();

require_once '../model/Casa.php';
require_once '../model/Porta.php';
require_once '../model/Janela.php';

if($_SERVER['REQUEST_METHOD']  === 'POST'){
    $acao = $_POST['acao'] ?? '';

    switch($acao){

        case 'construir':
           
            echo "<h2>Você escolheu construir a casa!</h2>";
            echo "<p>Preencha os dados abaixo para definir as características da sua casa:</p>";
            echo '<form action="processa.php" method="POST">
            <input type="hidden" name="acao" value="salvar_casa">
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

            echo "<h2>Etapa 2:: Definir portas e janelas</h2>";
            echo "<form action='processa.php' method='POST'>
                    <input type='hidden' name='acao' value='finalizar_casa'>
                    <input type='hidden' name='descricao' value='{$descricao}'>
                    <input type='hidden' name='cor' value='{$cor}'>
                    <input type='hidden' name='qtde_portas' value='{$qtdePortas}'>
                    <input type='hidden' name='qtde_janelas' value='{$qtdeJanelas}'>";

            if($qtdePortas>0){
                echo "<h3>Portas</h3>";
                for($i = 1; $i <= $qtdePortas; $i++){
                    echo "<label for='descricao_porta_{$i}'>Descrição da Porta {$i}:</label><br>
                    <input type='text' name='descricao_porta_{$i}' required><br>
                    <label for='estado_porta_{$i}'>Estado: </label>
                    <select name='estado_porta_{$i}'>
                    <option value='0'>Fechada</option>
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
            echo "<button type='submit'>Finalizar Construção</button></form>";
        break;

        case 'finalizar_casa':
            $descricao = $_POST['descricao'] ?? '';
            $cor = $_POST['cor'] ?? ' ';
            $qtdePortas= (int)($_POST['qtde_portas'] ?? 0);
            $qtdeJanelas= (int)($_POST['qtde_janelas'] ?? 0);

            $casa = new Casa();
            $casa->setDescricao($descricao);
            $casa->setCor($cor);



            $listaPortas = [];
            for($i = 1; $i <= $qtdePortas; $i++){
                $porta = new Porta();
                $porta->setDescricao($_POST["descricao_porta_{$i}"]);
                $porta->setEstado((int)$_POST["estado_porta_{$i}"]);
                $listaPortas[] = $porta;
            }

            $casa->setListaDePortas($listaPortas);

            $listaJanelas = [];

            for($i = 1; $i <= $qtdeJanelas; $i++){
                $janela = new Janela();
                $janela->setDescricao($_POST["descricao_janela_{$i}"]);
                $janela->setEstado((int)$_POST["estado_janela_{$i}"]);
                $listaJanela[] = $janela;
            }
            $casa->setListaDeJanelas($listaJanela);

            $_SESSION['casa'] = serialize($casa);

            echo "<h2>Casa construída com sucesso!</h2> <br>
            <p><strong>Descriação:</strong> {$casa->getDescricao()}</p>
            <p><strong>Cor:</strong>{$casa->getCor()}</p>";

            echo "<h3>Portas:</h3>";
            foreach($casa->getListaDePortas() as $porta){
                $estado = $porta->getEstado() == 1 ? "Aberta" : "Fechada";
                echo "<p>{$porta->getDescricao()} - {$estado}</p>";
            }

            echo "<h3>Janelas:</h3>";
            foreach($casa->getListaDeJanelas() as $janela){
                $estado = $janela->getEstado() == 1 ? "Aberta" : "Fechada";
                echo "<p>{$janela->getDescricao()} - {$estado}</p>";
            }
            echo '<br><a href="../index.html">Voltar ao menu</a>';
        break;

        case 'movimentar':
            if(!isset($_SESSION['casa'])){
                echo '<h2>Nenhuma casa foi construída ainda!</h2><br>
                <a href="../index.html"> Voltar ao menu</a>';
                exit;
            }
            echo '<h2>Movimentar Aberturas</h2><br>
            <p>Informe qual tipo de abertura deseja mover:</p><br>
            <form action="processa.php" method="POST">
                <input type="hidden" name="acao" value="selecionar_tipo_abertura">
                <button type="submit" name="tipo_abertura" value="porta">Mover Porta</button>
                <button type="submit" name="tipo_abertura" value="janela">Mover Janela</button>
            </form><br>
            <a href="../index.html">Voltar ao menu</a>';
        break;

        case 'selecionar_abertura':
            $casa = unserialize($_SESSION['casa']);
            $tipo = $_POST['tipo'] ?? '';

            $lista = ($tipo === 'porta') ? $casa->getListaDePortas() : $casa->getListaDeJanelas();

            if(empty($lista)){
                echo "<h2>Nenhuma".  ($tipo === 'porta' ? 'porta' : "janela"). "cadastrada! </h2><br>
                <a href='../index.html'>Voltar ao menu</a>";
                exit;
            }


            echo "<h2>Selecione qual ". ($tipo === "porta" ? "porta": "janela"). " deseja movimentar:</h2><br>
            <form  action='processa.php' method='POST' >
                <input type='hidden' name='acao' value='mover_abertura'>
                <input type='hidden' name='tipo' value='{$tipo}'>
                <select name='posicao'>";
                foreach($lista as $i => $abertura){
                    $estado = $abertura->getEstadoTexto();
                    echo "<option value='{$i}'>{$abertura->getDescricao()} - {$estado}</option>";
                }
                echo "<select><button type='submit'>Avançar</button><br></select></form><br>
                <a href='../index.html'> Voltar ao menu</a>";
        break;

        case 'mover_abertura':
            $casa = unserialize($_SESSION['casa']);
            $tipo = $_POST['tipo'] ?? '';
            $posicao = (int)($_POST['posicao'] ?? -1);
            $abertura = $casa->retornaAbertura($tipo, $posicao);
            if(!$abertura){
                echo "<h2> Abertura Inválida </h2><br>
                <a href='../index.html'>Voltar ao menu</a>";
                exit;
            }
            echo " <h2>Movendo".($tipo === 'porta' ? 'porta' : 'janela'). "selecionada: </h2> ";
            echo "<p> <strong> {$abertura->getDescricao()}</strong> (atual: {$abertura->getEstadoTexto()})</p><br>
            <form action='processa.php' method='POST'>
            <input type='hidden' name='acao' value='aplicar_movimento'>
            <input type='hidden' name='tipo' value='{$tipo}'>
            <input type='hidden' name='posicao' value='{$posicao}'>
            <label>Novo estado:</label><br>
            <select name='novo_estado'>
            <option value='1'>Aberta</option>
            <option value='0'>Fechada</option>
            </select><br><br>
            <button type='submit'>Aplicar</button>
            </form><br>
            <a href='../index.html'>Voltar ao menu</a>";
        break;

        case 'aplicar_movimento':

            $casa = unserialize($_SESSION['casa']);
            $tipo = $_POST['tipo'] ?? '';
            $posicao = (int)($_POST['posicao']?? -1);
            $novoEstado = (int)($_POST['novo_estado']?? 0);

            $abertura = $casa->retornaAbertura($tipo, $posicao);

            if($abertura){
                $casa->moverAbertura($abertura, $novoEstado);
                $_SESSION['casa'] = serialize($casa);

                echo "<h2>". ucfirst($tipo)." movimentada com sucesso!</h2><br>
                <p><strong>{$abertura->getDescricao()}</strong>agora está <strong>{$abertura->getEstadoTexto()}</strong></p>";
            }else{
                echo "<h2>Erro ao movimentar abertura</h2>";
            }
            echo "<br><a href='../index.html'>Voltar ao menu</a>";

        break;

        case 'selecionar_tipo_abertura':

            $tipo = $_POST['tipo_abertura'] ?? '';
            echo "<form action='processa.php' method='POST'><br>
            <input type='hidden' name='acao' value='selecionar_abertura'><br>
            <input type='hidden' name='tipo' value='{$tipo}'><br>
            <button type='submit'>Continuar</button></form>";
            
        break;

        case 'ver_info':
            if(!isset($_SESSION['casa'])){
                echo "<h2>Nenhuma casa foi construída ainda!</h2><br>
                <a href='../index.html'>Voltar ao menu</a>";
                break;
            }
            $casa = unserialize($_SESSION['casa']);
            echo $casa->geraInfoCasa();

            echo "<br>
            <form action='processa.php' method='post'>
            <button type ='submit' name='acao' value='limpar_sessao'>Nova Construção</button> 
            </form><br>
            <a href='../index.html'>Voltar ao menu</a>";
        break;

        case 'limpar_sessao':
            session_unset();
            session_destroy();
            echo "<h2> Dados da casa apagados!</h2><br> 
            <p>Você pode construir uma nova casa agora</p><br>
            <a href='../index.html'>Voltar ao menu inicial</a>";
        break;
    }
}else{
    echo "<h2>Nenhuma ação recebida</h2><br>
    <a href='../index.html'>Voltar ao menu</a>";
}


?>