<?php
    final class Divisao{


        //atributos da classe
        private float $num1;
        private float $num2;


        //metodo para retornar o valor do atributo num1
        public function getNum1(): float{
            return $this->num1;
        }
        //metodo para receber o valor de num1
        public function setNum1(float $num1): void{
            $this->num1 = $num1;
        }
        //metodo para retornar o valor do atributo num2
        public function getNum2(): float{
            return $this->num2;
        }
        //metodo para receber o valor de num2
        public function setNum2(float $num2): void{
            $this->num2 = $num2;
        }

        public function calculaDivisao(): mixed{
            if($this->num2=== 0.0) {
                return "Erro: divisão por zero";
            }
            return $this->num1 / $this->num2;
        }
    }
?>