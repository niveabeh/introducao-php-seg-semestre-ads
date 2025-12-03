<?php

require_once 'Aberturas.php';
require_once 'Porta.php';
require_once 'Janela.php';

class Casa{

    private string $descricao;
    private string $cor;
    private array $listaDePortas = [];
    private array $listaDeJanelas = [];

    public function getDescricao(): string{
        return $this->descricao;
    }
    public function setDescricao (string $descricao): void{
        $this->descricao = $descricao;
    }
    public function getCor(): string{
        return $this->cor;
    }
    public function setCor( string $cor): void{
        $this->$cor = $cor;
    }
    public function getListaDePortas():array{
        return $this->listaDePortas;
    }
    public function setListaDePortas( array $listaDePortas): void{
        $this->$listaDePortas = $listaDePortas;
    }
    public function getListaDeJanelas():array{
        return $this->listaDeJanelas;
    }
    public function setListaDeJanelas(array $listaDeJanelas): void{
        $this->$listaDeJanelas = $listaDeJanelas;
    }




    public function getAberturasPorTipo(string $tipo): array{
        if($tipo === 'porta'){
            return $this->listaDePortas;
        }elseif($tipo === "janela"){
            return $this->listaDeJanelas;
        }else{
            return [];
        }
    }

    public function retornaAbertura(string $tipo, int $indice): ?Aberturas{
        $lista = $this-> getAberturasPorTipo($tipo);
        return $lista[$indice] ?? null;
    }

    public function moverAbertura(Aberturas $abertura, int $novoEstado): void{
        $abertura->setEstado($novoEstado);
    }
    public function geraInfoCasa(): string{
        $info = "<h2> Informações da casa</h2><br>
        <p><strong>Descrição:</strong> {$this->descricao}</p>
        <p><strong>Cor:</strong>{$this->cor}</p>";

        $info .= "<h3>Portas: </h3>";
        if(!empty($this->listaDePortas)){
            foreach($this->listaDePortas as $porta){
                $estado = $porta->getEstadoTexto();
                $info .= "<p>{$porta->getDescricao()} - {$estado}</p>";
            }
        }else{
            $info .= "<p>Nunhuma porta cadastrada.</p>";
        }

        $info .= "<h>Janelas:</h3>";
        if(!empty($this->listaDeJanelas)){
            foreach($this->listaDeJanelas as $janela){
                $estado = $janela -> getEstadoTexto();
                $info .= "<p>{$janela->getDescricao()} - {$estado}</p>";
            }
        } else{
            $info .= "<p> Nenhuma janela cadastrada.</p>";
        }
        return $info;
    }

}

?>