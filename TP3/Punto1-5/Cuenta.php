<?php

class Cuenta {
    private $numero;
    private $saldo;
    private $objCliente;

    public function __construct($nroCuenta, $saldo, $objCliente)
    {
        $this->numero = $nroCuenta;
        $this->saldo = $saldo;
        $this->objCliente = $objCliente;
    }

    public function getNumero()
    {
        return $this->numero;
    }
    public function getSaldo()
    {
        return $this->saldo;
    }
    public function getObjCliente()
    {
        return $this->objCliente;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function setSaldo($saldo)
    {
        $this->saldo = $saldo;
    }
    public function setObjCliente($objCliente)
    {
        $this->objCliente = $objCliente;
    }

    public function saldoCuenta() {
        return $this->getSaldo();
    }

    public function realizarDeposito($monto) {
        $this->setSaldo($this->saldoCuenta()+$monto);
    }

    public function realizarRetiro($monto) {
        $this->setSaldo($this->saldoCuenta()-$monto);
    }

    public function __toString()
    {
        return "Número de cuenta: " . $this->getNumero() . "\nSaldo: " . $this->getSaldo() . "\nDueño de la cuenta:\n" . $this->getObjCliente(); 
    }
}

/*
CuentaCorriente, CuentaAhorro asi se nombran a las clases hijas.
Va el nombre de de la clase Padre y luego el nombre de la hija. 
Otra convención, por mas que un metodo,no contando los getters y setters, 
deberia ponerlo igual en las clases hijas por mas que no modifiquen la funcion.
*/

?>