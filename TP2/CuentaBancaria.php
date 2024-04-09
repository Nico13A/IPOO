<?php

/*
Cuando delego usar en vez de $personaCliente, $objPersona.
Y los setters y getters poner setObjPersona por ejemplo.
*/

class CuentaBancaria {

    private $numeroDeCuenta;
    private $personaCliente;
    private $saldoActual;
    private $interesAnual;

    public function __construct($numCuenta, $personaCliente, $saldoActual, $interesAnual)
    {
        $this->numeroDeCuenta = $numCuenta;
        $this->personaCliente = $personaCliente;
        $this->saldoActual = $saldoActual;
        $this->interesAnual = $interesAnual;
    }

    public function getNumeroCuenta() {
        return $this->numeroDeCuenta;
    }
    public function getPersonaCliente() {
        return $this->personaCliente;
    }
    public function getSaldoActual() {
        return $this->saldoActual;
    }
    public function getInteresAnual() {
        return $this->interesAnual;
    }

    public function setNumeroCuenta($numCuenta) {
        $this->numeroDeCuenta = $numCuenta;
    } 
    public function setPersonaCliente($personaCliente) {
        $this->personaCliente = $personaCliente;
    }
    public function setSaldoActual($saldo) {
        $this->saldoActual = $saldo;
    }
    public function setInteresAnual($interes) {
        $this->interesAnual = $interes;
    }

    public function actualizarSaldo() {
        $interesDiario = $this->getInteresAnual() / 365;
        $saldoActual = $this->getSaldoActual();
        $nuevoSaldo = $saldoActual + round((($saldoActual * $interesDiario)/100), 2);
        $this->setSaldoActual($nuevoSaldo);
    }

    public function depositar($cantidad) {
        $this->setSaldoActual($this->getSaldoActual() + $cantidad);
    }

    public function retirar($cantidad) {
        $dineroRetirado = false;
        $saldoActual = $this->getSaldoActual();
        if (($saldoActual - $cantidad) >= 0) {
            $this->setSaldoActual($saldoActual - $cantidad);
            $dineroRetirado = true;
        }
        return $dineroRetirado;
    }

    public function __toString()
    {
        return "Número de cuenta: " . $this->getNumeroCuenta() . "\nDni del cliente: " . $this->getPersonaCliente()->getNumeroDeDocumento() . "\nSaldo actual: " . $this->getSaldoActual() . "\nInterés anual: " . $this->getInteresAnual() . "%\n"; 
    }

}

?>