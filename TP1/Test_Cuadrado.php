<?php

include 'Cuadrado.php';

$cuadrado = new Cuadrado(
    ['x' => 2, 'y' => 4],
    ['x' => 6, 'y' => 4],
    ['x' => 6, 'y' => 0],
    ['x' => 2, 'y' => 0]
);


echo $cuadrado;

echo $cuadrado->area() . "\n";

//$cuadrado->desplazar(["x" => -1, "y" => 3]);

$cuadrado->aumentarTamanio(2);

echo $cuadrado;

?>