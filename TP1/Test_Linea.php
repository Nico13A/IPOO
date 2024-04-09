<?php

$unaLinea = new Linea(["x" => 2, "y" => 2], ["x" => 3, "y" => 3], ["x" => 4, "y" => 4], ["x" => 5, "y" => 5]);
echo $unaLinea;

$unaLinea->mueveArriba(4);
echo $unaLinea;


?>