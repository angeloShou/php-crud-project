<?php

/*
 * classe TCriterio
  essa classe prove uma interface ultilizada para definicao de criteirios
 *
 */

class TCriterio extends TExpressoes {

    private $expressoes;
    private $operadores;
    private $propriedades;

    function __construct() {
        $this->expressoes = array();
        $this->operadores = array();
    }

    /*
     * metodo add()
     * @param $expressoes = expressao(objeto TExpressao)
     * @param $operedor = operador logico de comparacao
     */

    public function add(TExpressoes $expressao, $oprerador = self::AND_OPERATOR) {
        if (empty($this->expressoes)) {
            $oprerador = null;
        }

        //agrega o resultado da expressao a lista de expressoes
        $this->expressoes[] = $expressao;
        $this->operadores[] = $oprerador;
    }

    //metodo dump()
    //retorna a expressao final

    public function dump() {
        // concatena a lista de expressoes
        if (is_array($this->expressoes)) {
            if (count($this->expressoes) > 0) {
                $result = ' ';
                foreach ($this->expressoes as $i => $expressao) {
                    $operador = $this->operadores[$i];
                    $result .=$operador . ' ' . $expressao->dump() . ' ';
                }

                $result = trim($result);
                return "({$result})";
            }
        }
    }

    public function setProperty($property, $value) {
        if (isset($value)) {
            $this->propriedades[$property] = $value;
        } else {
            $this->propriedades[$property] = null;
        }
    }

    public function getProperty($property) {
        if (isset($this->propriedades[$property])) {
            return $this->propriedades[$property];
        }
    }

}

?>