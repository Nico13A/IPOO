<?php

include_once "Cliente.php";
include_once "Destino.php";
include_once "PaqueteTuristico.php";
include_once "Venta.php";
include_once "VentaOnline.php";
include_once "VentaAgencia.php";
include_once "Agencia2.php";

$objDestino = new Destino("BRC001", "Bariloche", 250);

$objPaqueteTuristico = new PaqueteTuristico("2014-05-23", 3, $objDestino, 25);

$objAgencia = new Agencia([], [], []);

//echo $objAgencia;

$objAgencia->incorporarPaquete($objPaqueteTuristico);

$objAgencia->incorporarPaquete($objPaqueteTuristico);

$objAgencia->incorporarVenta($objPaqueteTuristico, "DNI", "27898654", 5, false);

$objAgencia->incorporarVenta($objPaqueteTuristico, "DNI", "27898654", 4, true);

$objAgencia->incorporarVenta($objPaqueteTuristico, "DNI", "27898654", 15, true);

//echo $objAgencia;

// Crear otro destino
$destinoMiami = new Destino("M002", "Miami", 400);

// Crear otro paquete turístico referenciando al destino creado
$fechaDesdeMiami = "2014-06-15"; 
$cantidadDiasMiami = 5;
$cantidadTotalPlazasMiami = 30;
$paqueteMiami = new PaqueteTuristico($fechaDesdeMiami, $cantidadDiasMiami, $destinoMiami, $cantidadTotalPlazasMiami);

// Invocar al método incorporarPaquete de la agencia con el paquete de Miami
$objAgencia->incorporarPaquete($paqueteMiami);

// Realizar una venta online con el paquete de Miami
$objAgencia->incorporarVenta($paqueteMiami, "DNI", "12345678", 3, true);

// Realizar una venta presencial con el paquete de Miami
$objAgencia->incorporarVenta($paqueteMiami, "DNI", "87654321", 2, false);

// Función informar paquetes turisticos.
$paquetesCoincidentes = $objAgencia->informarPaquetesTuristicos("2014-06-15", "Miami");
/*
foreach ($paquetesCoincidentes as $paquete) {
    echo $paquete;
}
*/

// Función paquete mas economico.
$destinoMiami2 = new Destino("M003", "Miami", 420);
$paqueteMiami2 = new PaqueteTuristico("2014-06-15", 6, $destinoMiami2, 20);
$objAgencia->incorporarPaquete($paqueteMiami2);
$paqueteMasEconomico = $objAgencia->paqueteMasEcomomico("2014-06-15", "Miami");
//echo $paqueteMasEconomico;

// Informar consumo cliente.

$consumoCliente = $objAgencia->informarConsumoCliente("DNI", "87654321");
/*
foreach ($consumoCliente as $objVenta) {
    echo $objVenta;
}
*/

// Paquete mas vendido.
$objAgencia->incorporarVenta($paqueteMiami2, "DNI", "41050862", 2, false);
$objAgencia->incorporarVenta($paqueteMiami2, "DNI", "41050862", 3, false);
$objAgencia->incorporarVenta($paqueteMiami2, "DNI", "41050862", 4, false);
$paqueteMasVendido = $objAgencia->informarPaquetesMasVendido("2024", 2);
foreach ($paqueteMasVendido as $objPaqueteTuristico) {
    echo $objPaqueteTuristico;
}

/*
$ventas = $objAgencia->getColObjVenta();
foreach ($ventas as $objVenta) {
    echo $objVenta->obtenerAnioDeVenta();
}
*/
//echo $objAgencia;

?>