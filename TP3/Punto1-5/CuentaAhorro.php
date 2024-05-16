<?php

class CuentaAhorro extends Cuenta {
    
    public function __construct($numero, $saldo, $objCliente)
    {
        parent::__construct($numero, $saldo, $objCliente);
    }

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
        if ($monto>0 && $monto <= $this->getSaldo()) {
            parent::realizarRetiro($monto);
            $retiroExitoso = true;
        }
        return $retiroExitoso;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena .= "Tipo de cuenta: Caja de ahorro\n";
        return $cadena;
    }

}

?>