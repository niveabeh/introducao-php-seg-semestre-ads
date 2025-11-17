<?php
    final class Soma{


        //atributos da classe
        private float $num1;
        private float $num2;


        //metodo para retornar o valor do atributo num1
        public function getNum(): float{
            return $this->num1;
        }
        //metodo para receber o valor de num1
        public function serNum(): void{
            $this->num1 = $num1;
        }
        //metodo para retornar o valor do atributo num2
        public function getNum2(): float{
            return $this->num2;
        }
        //metodo para receber o valor de num2
        public function setNum2(): void{
            $this->num2 = $num2;
        }

        public function calculaSoma(): float{
            return $this->num1 + $this->num2;
        }
    }
?>