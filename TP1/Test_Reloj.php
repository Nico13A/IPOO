<?php

include 'Reloj.php';

$unaHora = new Reloj(22, 58, 58);
/*
echo $unaHora;
$unaHora->incremento();
echo $unaHora;
$unaHora->puesta_a_cero();
echo $unaHora;
*/
for ($i=0; $i < 1000; $i++) { 
    $unaHora->incremento();
    echo $unaHora;
}

?>