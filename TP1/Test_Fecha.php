<?php

include 'Fecha.php';

$unaFecha = new Fecha(29, 2, 2020);
echo $unaFecha;

$unaFecha->incrementa_un_dia();
echo $unaFecha;
$unaFecha->incrementa_un_dia();
echo $unaFecha;
echo "----------------------\n";
echo $unaFecha->incremento(59, $unaFecha);

?>