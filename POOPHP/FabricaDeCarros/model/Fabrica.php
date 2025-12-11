<?php
require_once "Carro.php";

class Fabrica
{

    private array $carros = [];

    public function fabricarCarro(string $modelo, string $cor, int $ano = 0, float $preco = 0, int $quantidade = 1): void
    {
        for ($i = 0; $i < $quantidade; $i++) {
            $carro = new Carro();
            $carro->setModelo($modelo);
            $carro->setCor($cor);
            $carro->setAno($ano);
            $carro->setPreco($preco);
            $carro->setQuantidade(1);
            $this->carros[] = $carro;
        }
    }

    public function venderCarro(string $modelo, string $cor): bool
    {
        foreach ($this->carros as $i => $carro) {
            if ($carro->getModelo() === $modelo && $carro->getCor() === $cor) {
                unset($this->carros[$i]);
                $this->carros = array_values($this->carros);
                return true;
            }
        }
        return false;
    }

    public function listarCarros(): void
    {
        if (empty($this->carros)) {
            echo "<p>Nenhum carro foi fabricado na fábrica.</p>";
            return;
        }

        foreach ($this->carros as $carro) {
            $carro->exibirInfo();
        }
    }

    public function getCarros(): array
    {
        return $this->carros;
    }
    public function removerCarroPorIndice(int $indice): void
    {
        if (isset($this->carros[$indice])) {
            unset($this->carros[$indice]);
            $this->carros = array_values($this->carros);
        }
    }
    public function setCarros(array $carros): void
    {
        $this->carros = $carros;
    }
}
