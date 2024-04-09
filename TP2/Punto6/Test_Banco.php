<?php

include_once "Persona.php";
include_once "Tramite.php";
include_once "Mostrador.php";
include_once "Banco.php";


$tramite1 = new Tramite("Renovación de pasaporte", "09:00", "10:30");
$tramite2 = new Tramite("Solicitud de préstamo", "09:15", "11:00");
$tramite3 = new Tramite("Apertura de cuenta", "09:30", "10:45");
$tramite4 = new Tramite("Pago de servicios", "10:00", "10:30");
$tramite5 = new Tramite("Cambio de moneda", "10:15", "11:15");


$mostrador1 = new Mostrador([$tramite1, $tramite2], [], 0, 5); 
$mostrador2 = new Mostrador([$tramite3, $tramite4, $tramite5], [], 0, 3); 


$coleccionMostradores = [$mostrador1, $mostrador2];


$banco = new Banco($coleccionMostradores);


$cliente1 = new Persona("Juan", "Pérez", "DNI", "12345678", $tramite1);
$cliente2 = new Persona("María", "Gómez", "DNI", "87654321", $tramite2);
$cliente3 = new Persona("Pedro", "López", "DNI", "98765432", $tramite3);
$cliente4 = new Persona("Ana", "Martínez", "DNI", "23456789", $tramite4);
$cliente5 = new Persona("Luis", "Sánchez", "DNI", "34567890", $tramite5);
$cliente6 = new Persona("Eva", "Hernández", "DNI", "45678901", $tramite1);




$banco->atender($cliente1);
$banco->atender($cliente2);
$banco->atender($cliente3);
$banco->atender($cliente4);
$banco->atender($cliente5);
if ($banco->atender($cliente6)) {
    echo "Se pudó atender al cliente.\n";
} else {
    echo "No se pudó atender al cliente.\n";
}


// Mostrar el estado del banco después de atender a los clientes
echo "------------------ Estado del banco después de atender a los clientes ------------------\n";
echo $banco;



?>