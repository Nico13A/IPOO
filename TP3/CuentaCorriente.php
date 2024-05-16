<?php

class CuentaCorriente extends Cuenta {
    private $descubierto;

    public function __construct($nroCuenta, $saldo, $objCliente, $descubierto)
    {
        parent::__construct($nroCuenta, $saldo, $objCliente);
        $this->descubierto = $descubierto;
    }

    public function getDescubierto()
    {
        return $this->descubierto;
    }

    public function setDescubierto($descubierto)
    {
        $this->descubierto = $descubierto;
    }

    /*
    public function realizarRetiro($monto)
    {
        $retiroExitoso = false;
        if ($monto > 0) {
            if ($monto <= ($this->getSaldo() + $this->getDescubierto())) {
                $this->setSaldo($this->getSaldo() - $monto);
                $retiroExitoso = true;
            }
        }
        return $retiroExitoso;
    }*/

    public function realizarDeposito($monto)
    {
        $depositoExitoso = false;
        if ($monto>0) {
            parent::realizarDeposito($monto);
            $depositoExitoso = true;
        }
        return $depositoExitoso;
    }

    public function realizarRetiro($monto)
    {
        $retiroExitoso = false;
        if ($monto>0) {
            if ($monto <= ($this->getSaldo() + $this->getDescubierto())) {
                parent::realizarRetiro($monto);
                $retiroExitoso = true;
            }
        }
        return $retiroExitoso;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena .= "Tipo de cuenta: Cuenta corriente\nDescubierto: " . $this->getDescubierto() . "\n";
        return $cadena;
    }

}

?>