<?php

include_once "Persona.php";
include_once "Inmueble.php";
include_once "Edificio.php";

$objResponsable = new Persona("DNI", "27432561", "Carlos", "Martinez", "154321233");

$objEdificio = new Edificio("Juab B. Justo 3456", [], $objResponsable);

$inmueble1 = new Inmueble("11", "1", "local comercial", 50000, new Persona("DNI", "12333456", "Pepe", "Suarez", "4456722"));
$inmueble2 = new Inmueble("12", "1", "local comercial", 50000, null);
$inmueble3 = new Inmueble("13", "2", "departamento", 35000, new Persona("DNI", "12333422", "Pedro", "Suarez", "446678"));
$inmueble4 = new Inmueble("14", "2", "departamento", 35000, null);
$inmueble5 = new Inmueble("15", "3", "departamento", 55000, null);

$objEdificio->setColInmueble([$inmueble1, $inmueble2, $inmueble3, $inmueble4, $inmueble5]);

// Invocar al método darInmueblesDisponiblesParaAlquiler con los parámetros dados
$inmueblesDisponibles = $objEdificio->darInmueblesDisponibles("departamento", 55000);

// Visualizar el resultado
echo "Inmuebles disponibles para alquiler:\n";
foreach ($inmueblesDisponibles as $inmueble) {
    echo $inmueble->getCodigo() . ": $" . $inmueble->getCostomensual() . " por mes\n";
}

// Crear una instancia de Persona para el inquilino
$inquilino = new Persona("DNI", "28765436", "Mariela", "Suarez", "25543562");

// Invocar al método registrarAlquilerInmueble con los parámetros dados
$registroExitoso = $objEdificio->registrarAlquilerInmueble("departamento", 25000, $inquilino);

// Visualizar un mensaje que represente si la acción pudo o no ser concretada
if ($registroExitoso) {
    echo "El alquiler del departamento fue registrado exitosamente.\n";
} else {
    echo "No se pudo registrar el alquiler del departamento.\n";
}

// Invocar al método calcularCostoEdificio()
$costoTotalEdificio = $objEdificio->calcularCostoEdificio();

// Visualizar el resultado
echo "El costo total del edificio es: $" . $costoTotalEdificio . " por mes.\n";
echo $objEdificio;

?>