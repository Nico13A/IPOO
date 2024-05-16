<?php

include_once "Persona.php";
include_once "Cliente.php";
include_once "Cuenta.php";
include_once "CuentaCorriente.php";
include_once "CuentaAhorro.php";
include_once "Banco.php";

$objBanco = new Banco([], 0, []);
$objCliente1 = new Cliente("12345678", "Juan", "Pérez", 1001);
$objCliente2 = new Cliente("87654321", "María", "García", 1002);
//echo $objBanco;

$objBanco->incorporarCliente($objCliente1);
$objBanco->incorporarCliente($objCliente2);

//echo $objBanco;
$objBanco->incorporarCuentaCorriente($objCliente1->getNroCliente(), 500);
$objBanco->incorporarCuentaCorriente($objCliente2->getNroCliente(), 1000);
$objBanco->incorporarCajaAhorro($objCliente1->getNroCliente());
$objBanco->incorporarCajaAhorro($objCliente1->getNroCliente());
$objBanco->incorporarCajaAhorro($objCliente2->getNroCliente());
//echo $objBanco;

echo "\n***********************************************\n";
echo $objBanco;
echo "\n***********************************************\n";
$coleccionDeCuentas = $objBanco->getColeccionObjCuenta();
foreach ($coleccionDeCuentas as $objCuenta) {
    if ($objCuenta instanceof CuentaAhorro) {
        $objBanco->realizarDeposito($objCuenta->getNumero(), 300);
    }
}
$objBanco->realizarRetiro(1, 150);
$objBanco->realizarDeposito(5, 150);

echo $objBanco;

?>