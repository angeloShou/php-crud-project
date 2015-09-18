<?php

class TFiltro extends TExpressoes {

    //put your code here
    private $variavel; // variavel
    private $operador; // operador
    private $valor; // valor

    /*
     * metodo __contruct()
     * @param $variavel =  variavel
     * @param $operador = operador (>,<)
     * @param $valor = valor a ser comprado
     * 
     */

    public function __construct($variavel, $operador, $valor) {

        // armazena as propriedades
        $this->variavel = $variavel;
        $this->operador = $operador;

        //trasforma o valor de acordo com certas regras
        // antes de atribuir a propriedade $this->valor
        $this->valor = $this->transforma($valor);
    }

    private function transforma($valor) {
        // caso seja um array
        if (is_array($valor)) {
            //percorre os valores
            foreach ($valor as $x) {
                // se for um inteiro
                if (is_integer($x)) {
                    $foo[] = $x;
                } elseif (is_string($x)) {
                    // se for string, adiciona aspas
                    $foo[] = "'$x'";
                }
            }
            // converte o array em string separada por ","(virgula)
            $result = implode(',', $foo);
        }
        // caso seja uma string
        elseif (is_string($valor)) {
            // adiciona aspas
            $result = "'$valor'";
        }
        //caso seja valor nullo
        elseif (is_null($valor)) {
            // armazena nullo
            $result = 'NULL';
        }
        //caso seja bolleano
        elseif (is_bool($valor)) {
            // armazena true ou false
            $result = $valor ? 'TRUE' : 'FALSE';
        } else {
            $result = $valor;
        }
        // retorna o valor
        return $result;
    }

    /*
     * metodo dump()
     * RETORNA O FILTRO EM FORMA DE EXPRESSÃO       
     */

    public function dump() {
        // concatena a expressão
        return "{$this->variavel} {$this->operador} {$this->valor}";
    }

}

?>