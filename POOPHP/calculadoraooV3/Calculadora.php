<?php

    final class Calculadora{

        /*Encapsulamento é a prática de esconder os detalhes internos de uma classe
        private: O acesso é restrito à própria classe.
        protected: O acesso é permitido à classe e suas subclasses.
        public: O acesso é permitido a qualquer parte do código.*/
        
        public function somar(float $a, float $b): float
        {
            return $a + $b;
        }
        public function subtrair(float $a, float $b): float
        {
            return $a - $b;
        }
        public function multiplicar(float $a, float $b): float
        {
            return $a * $b;
        }
        public function dividir(float $a, float $b): float
        {
            if ($b === 0.0) {
                return "Erro: divisão por zero";
            }
            return $a / $b;
        }
    }
?>