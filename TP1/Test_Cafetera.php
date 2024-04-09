<?php

require 'Cafetera.php'; 

$objCafetera = new Cafetera(100, 50);
echo "\n********** OBJETO CAFETERA CREADO **********\n";
echo $objCafetera . "\n";

echo "********** Llenar cafetera **********\n";
$objCafetera->llenarCafetera();
echo $objCafetera . "\n";

echo "********** Agregar café **********\n";
if ($objCafetera->agregarCafe(20)) {
    echo "Café agregado con éxito.\n";
}
else {
    echo "No se pudo agregar café porque la cantidad a agregar excede la capacidad máxima de la cafetera.\n";
} 
echo $objCafetera . "\n";

echo "********** Servir taza **********\n";
if ($objCafetera->servirTaza(30)) {
    echo "Se pudo llenar la taza.\n";
}
else {
    echo "No se pudo llenar la taza porque no habia la cantidad suficiente en la cafetera.\n";
}
echo $objCafetera . "\n";

echo "********** Vaciar cafetera **********\n";
$objCafetera->vaciarCafetera();
echo $objCafetera . "\n";

?>