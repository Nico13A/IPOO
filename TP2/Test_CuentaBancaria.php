<?php

include_once "Persona.php";
include_once "CuentaBancaria.php";

$objPersona = new Persona("Nicolas", "Antinao", "DNI", 41050862);

$objCuenta = new CuentaBancaria(1, $objPersona, 2000, 5);
echo "************************* Objeto cuenta *************************\n";
echo $objCuenta;
echo "************************* Actualizando saldo *************************\n";

$objCuenta->actualizarSaldo();
echo "Saldo actualizado: " . $objCuenta->getSaldoActual() . "\n";
echo "************************* Depositar saldo *************************\n";
$objCuenta->depositar(250);
echo "Saldo después del depósito: " . $objCuenta->getSaldoActual() . "\n";
echo "************************* Retirar plata *************************\n";
if ($objCuenta->retirar(2450.27)) {
    echo "Se pudo retirar plata.\n";
    echo "Saldo después del retiro: " .$objCuenta->getSaldoActual();
} else {
    echo "NO se pudo retirar plata.\nLa cantidad a retirar excede el sueldo actual de la cuenta: " . $objCuenta->getSaldoActual();
}

?>