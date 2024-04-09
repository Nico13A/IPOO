<?php

include "Teatro.php";

$objTeatro = new Teatro("Teatro Bellas Artes", "Avellaneda 300", [
    ["nombre" => "Función 1", "precio" => 200],
    ["nombre" => "Función 2", "precio" => 100],
    ["nombre" => "Función 3", "precio" => 150],
    ["nombre" => "Función 4", "precio" => 300]
]);

echo $objTeatro;

$objTeatro->setFuncionNombre(0, "Función cambiada");
$objTeatro->setFuncionPrecio(0, 1500);
echo $objTeatro;

?>