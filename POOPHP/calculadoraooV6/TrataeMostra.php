<?php
    final class TrataeMostra{
        public static function exibirResultado(?string $er, string $oper, ?float $v1, ?float $v2, ?float $resultado): void{
            echo "<h1>Resultado</h1>";
            if(!empty($er)){
                echo "<p class='error'>".htmlspecialchars($er, ENT_QUOTES, 'UTF-8')."</p>";
            }else{
                echo "<p>Operação: " . htmlspecialchars($oper) . "<br> " . htmlspecialchars($v1);
                switch ($oper) {
                    case 'somar':
                        echo "+";
                        break;
                    case 'subtrair':
                        echo "-";
                        break;
                    case 'multiplicar':
                        echo "x";
                        break;
                    case 'dividir':
                        echo "/";
                        break;
                }
                echo "</strong>" . htmlspecialchars($v2) . " = <strong>" . htmlspecialchars($resultado) . "</strong></p>";
            }
            echo "<a href='index.html'>Voltar</a>";
        }
        public static function parse_num($val ) : ?float{
            $s = trim($val);
            $s = str_replace(',', '.', $s);
            if(!preg_match('/^\s*[+-]?\d+(?:[\.,]\d+)?\s*$/',$s)){           
                return null;
            }
            return floatval($s);
        }
    }
?>