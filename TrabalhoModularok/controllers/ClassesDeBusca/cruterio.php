<?php

/**
 * @author Ahmet YUCEL
 * @copyright 2014
 */
include'TExpressoes.class.php';
require_once'TFiltro.class.php';
require_once'TCriterio.class.php';

$criterio = new TCriterio;
$criterio->add(new TFiltro('idade', '>', 18), TExpressoes::OR_PRERATOR);
$criterio->add(new TFiltro('idade', '<', 16), TExpressoes::OR_PRERATOR);
echo $criterio->dump();
?>