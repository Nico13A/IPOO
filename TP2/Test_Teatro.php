<?php

include_once "Funcion.php";
include_once "Teatro.php";

$funcion1 = new Funcion("El Rey León", ["hora" => 20, "minutos" => 0], 110, 15.99);
$funcion2 = new Funcion("La Bella y la Bestia", ["hora" => 22, "minutos" => 0], 100, 12.99);
$funcion3 = new Funcion("Cien años de soledad", ["hora" => 23, "minutos" => 40], 130, 14.99);

$funciones = [$funcion1, $funcion2, $funcion3];

$objTeatro = new Teatro("Teatro Bellas Artes", "Avellaneda 300", $funciones);

// Mostrar información del teatro
echo $objTeatro;

// Modificar el nombre de una función
$objTeatro->setFuncionNombre($funcion1, "El Rey León 2");

// Modificar el precio de una función
$objTeatro->setFuncionPrecio($funcion1, 17);

// Agregar una nueva función
$objTeatro->agregarFuncion("El Principito", ["hora" => 21, "minutos" => 50], 10, 13.99);

// Mostrar información actualizada del teatro
echo $objTeatro . "\n";

?>