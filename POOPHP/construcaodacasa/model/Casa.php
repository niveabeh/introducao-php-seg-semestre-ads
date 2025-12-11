<?php

require_once 'Aberturas.php';
require_once 'Porta.php';
require_once 'Janela.php';

class Casa
{

    private string $descricao;
    private string $cor;
    private array $listaDePortas = [];
    private array $listaDeJanelas = [];
    private int $qtdQuartos;
    private int $qtdBanheiros;
    private float $tamanho;


    public function getDescricao(): string
    {
        return $this->descricao;
    }
    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }
    public function getCor(): string
    {
        return $this->cor;
    }
    public function setCor(string $cor): void
    {
        $this->cor = $cor;
    }
    public function getListaDePortas(): array
    {
        return $this->listaDePortas;
    }
    public function setListaDePortas(array $listaDePortas): void
    {
        $this->listaDePortas = $listaDePortas;
    }
    public function getListaDeJanelas(): array
    {
        return $this->listaDeJanelas;
    }
    public function setListaDeJanelas(array $listaDeJanelas): void
    {
        $this->listaDeJanelas = $listaDeJanelas;
    }
    public function getQtdQuartos(): int
    {
        return $this->qtdQuartos;
    }
    public function setQtdQuartos(int $qtdQuartos): void
    {
        $this->qtdQuartos = $qtdQuartos;
    }

    public function getQtdBanheiros(): int
    {
        return $this->qtdBanheiros;
    }
    public function setQtdBanheiros(int $qtdBanheiros): void
    {
        $this->qtdBanheiros = $qtdBanheiros;
    }

    public function getTamanhoM2(): float
    {
        return $this->tamanho;
    }
    public function setTamanhoM2(float $tamanho): void
    {
        $this->tamanho = $tamanho;
    }

    public function getAberturasPorTipo(string $tipo): array
    {
        if ($tipo === 'porta') {
            return $this->listaDePortas;
        } elseif ($tipo === "janela") {
            return $this->listaDeJanelas;
        } else {
            return [];
        }
    }

    public function retornaAbertura(string $tipo, int $indice): ?Aberturas
    {
        $lista = $this->getAberturasPorTipo($tipo);
        return $lista[$indice] ?? null;
    }

    public function moverAbertura(Aberturas $abertura, int $novoEstado): void
    {
        $abertura->setEstado($novoEstado);
    }

    public function geraInfoCasa(): string
    {
        $info = "<h2>Informações da casa</h2><br>
    <p><strong>Descrição:</strong> {$this->descricao}</p>
    <p><strong>Cor:</strong> {$this->cor}</p>";

        $info .= "<h3>Informações do imóvel:</h3>";
        $info .= "<p><strong>Quartos:</strong> {$this->qtdQuartos}</p>";
        $info .= "<p><strong>Banheiros:</strong> {$this->qtdBanheiros}</p>";
        $info .= "<p><strong>Tamanho:</strong> {$this->tamanho} m²</p>";

        $info .= "<h3>Portas:</h3>";
        if (!empty($this->listaDePortas)) {
            foreach ($this->listaDePortas as $porta) {
                $estado = $porta->getEstadoTexto();
                $info .= "<p>{$porta->getDescricao()} - {$estado}</p>";
            }
        } else {
            $info .= "<p>Nenhuma porta cadastrada.</p>";
        }

        $info .= "<h3>Janelas:</h3>"; 
        if (!empty($this->listaDeJanelas)) {
            foreach ($this->listaDeJanelas as $janela) {
                $estado = $janela->getEstadoTexto();
                $info .= "<p>{$janela->getDescricao()} - {$estado}</p>";
            }
        } else {
            $info .= "<p>Nenhuma janela cadastrada.</p>";
        }
        $info .= "<p><strong>Aberturas abertas no momento:</strong> "
            . $this->contarAberturasAbertas()
            . "</p>";

        return $info;
    }
    public function contarAberturasAbertas(): int
    {
        $contador = 0;

        foreach ($this->listaDePortas as $porta) {
            if ($porta->getEstado() === 1) {
                $contador++;
            }
        }

        foreach ($this->listaDeJanelas as $janela) {
            if ($janela->getEstado() === 1) {
                $contador++;
            }
        }

        return $contador;
    
    }

}
