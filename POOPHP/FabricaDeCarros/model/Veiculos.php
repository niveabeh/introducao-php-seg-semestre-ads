<?php
abstract class Veiculo
{


    protected string $modelo = '';
    protected string $cor = '';
    protected int $ano = 0;
    protected float $preco = 0.0;
    protected int $quantidade = 0;


    public function getModelo(): string
    {
        return $this->modelo;
    }
    public function setModelo($modelo): void
    {
        $this->modelo = $modelo;
    }
    public function getCor(): string
    {
        return $this->cor;
    }
    public function setCor($cor): void
    {
        $this->cor = $cor;
    }
    public function getAno(): int
    {
        return $this->ano;
    }
    public function setAno($ano): void
    {
        $this->ano = $ano;
    }
    public function getPreco(): float
    {
        return $this->preco;
    }
    public function setPreco($preco): void
    {
        $this->preco = $preco;
    }
    public function getQuantidade(): int
    {
        return $this->quantidade;
    }
    public function setQuantidade($quantidade): void
    {
        $this->quantidade = $quantidade;
    }


    public function exibirInfo(): void
    {
        echo "<div>
            <h3>Informações do Carro</h3>
            <p><strong>Modelo:</strong> {$this->getModelo()}</p>
            <p><strong>Cor:</strong> {$this->getCor()}</p>
            <p><strong>Ano:</strong> {$this->getAno()}</p>
            <p><strong>Quantidade:</strong> {$this->getQuantidade()}</p>
            <p><strong>Preço:</strong> R$ " . number_format($this->getPreco(), 2, ',', '.') . "</p>
        </div>
    ";
    }
}
