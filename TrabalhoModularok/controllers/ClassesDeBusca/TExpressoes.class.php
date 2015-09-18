<?php

/*
 * Classe TExpressoes
 * Classe Abstrata para gerenciar expre��es
 */

abstract class TExpressoes {

    //operadores logicos
    const AND_PERERATOR = 'AND';
    const OR_PRERATOR = 'OR';

    // MARCA O METODO dump() como OBRIGAT�RIO
    abstract public function dump();
}
?>

