<?php

class Banco {
    private $coleccionCuentaCorriente;
    private $coleccionCajaAhorro;
    private $ultimoValorCuentaAsignado;
    private $coleccionCliente;

    public function __construct($colCuentaCorriente, $colCajaAhorro, $ultimoValorCuentaAsignado, $colCliente)
    {
        $this->coleccionCuentaCorriente = $colCuentaCorriente;
        $this->coleccionCajaAhorro = $colCajaAhorro;
        $this->ultimoValorCuentaAsignado = $ultimoValorCuentaAsignado;
        $this->coleccionCliente = $colCliente;        
    }

    public function getColeccionCuentaCorriente()
    {
        return $this->coleccionCuentaCorriente;
    }
    public function getColeccionCajaAhorro()
    {
        return $this->coleccionCajaAhorro;
    }
    public function getUltimoValorCuentaAsignado()
    {
        return $this->ultimoValorCuentaAsignado;
    }
    public function getColeccionCliente()
    {
        return $this->coleccionCliente;
    }

    public function setColeccionCuentaCorriente($coleccionCuentaCorriente)
    {
        $this->coleccionCuentaCorriente = $coleccionCuentaCorriente;
    }
    public function setColeccionCajaAhorro($coleccionCajaAhorro)
    {
        $this->coleccionCajaAhorro = $coleccionCajaAhorro;
    }
    public function setUltimoValorCuentaAsignado($ultimoValorCuentaAsignado)
    {
        $this->ultimoValorCuentaAsignado = $ultimoValorCuentaAsignado;
    }
    public function setColeccionCliente($coleccionCliente)
    {
        $this->coleccionCliente = $coleccionCliente;
    }

    public function incorporarCliente($objCliente) {
        $coleccionCliente = $this->getColeccionCliente();
        $i = 0;
        $incorporacionEfectiva = true;
        while ($i < count($coleccionCliente) && $incorporacionEfectiva) {
            $unCliente = $coleccionCliente[$i];
            if ($objCliente->getDni() == $unCliente->getDni()) {
                $incorporacionEfectiva = false;
            }
            $i++;
        }
        if ($incorporacionEfectiva) {
            $coleccionCliente[] = $objCliente;
            $this->setColeccionCliente($coleccionCliente);
        }
        return $incorporacionEfectiva;
    }

    private function buscarCliente($numeroCliente) {
        $coleccionCliente = $this->getColeccionCliente();
        $i = 0;
        $clienteEncontrado = null;
        while ($i < count($coleccionCliente) && !$clienteEncontrado) {
            $unCliente = $coleccionCliente[$i];
            if ($numeroCliente == $unCliente->getNroCliente()) {
                $clienteEncontrado = $unCliente;
            }
            $i++;
        }
        return $clienteEncontrado;
    }

    public function incorporarCuentaCorriente($numeroCliente, $montoDescubierto) {
        $objCliente = $this->buscarCliente($numeroCliente);
        if ($objCliente) {
            $coleccionCuentaCorriente = $this->getColeccionCuentaCorriente();
            $objCuentaCorriente = new CuentaCorriente($this->getUltimoValorCuentaAsignado()+1, 0, $objCliente, $montoDescubierto);
            $coleccionCuentaCorriente[] = $objCuentaCorriente;
            $this->setColeccionCuentaCorriente($coleccionCuentaCorriente);
            $this->setUltimoValorCuentaAsignado($this->getUltimoValorCuentaAsignado()+1);
        }
    }

    public function incorporarCajaAhorro($numeroCliente) {
        $objCliente = $this->buscarCliente($numeroCliente);
        if ($objCliente) {
            $coleccionCajaAhorro = $this->getColeccionCajaAhorro();
            $objCajaAhorro = new CuentaAhorro($this->getUltimoValorCuentaAsignado()+1, 0, $objCliente);
            $coleccionCajaAhorro[] = $objCajaAhorro;
            $this->setColeccionCajaAhorro($coleccionCajaAhorro);
            $this->setUltimoValorCuentaAsignado($this->getUltimoValorCuentaAsignado()+1);
        }
    }

    private function buscarCuenta($numCuenta, $coleccion) {
        $i = 0;
        $cuentaEncontrada = null;
        while ($i<count($coleccion) && !$cuentaEncontrada) {
            $cuenta = $coleccion[$i];
            if ($cuenta->getNumero() == $numCuenta) {
                $cuentaEncontrada = $cuenta;
            }
            $i++;
        }
        return $cuentaEncontrada;
    }

    public function realizarDeposito($numCuenta, $monto) {
        $cuentaCorriente = $this->buscarCuenta($numCuenta, $this->getColeccionCuentaCorriente());
        if ($cuentaCorriente) {
            $cuentaCorriente->realizarDeposito($monto);
        }
        else {
            $cajaAhorro = $this->buscarCuenta($numCuenta, $this->getColeccionCajaAhorro());
            if ($cajaAhorro) {
                $cajaAhorro->realizarDeposito($monto);
            }
        }
    }

    public function realizarRetiro($numCuenta, $monto) {
        $cuentaCorriente = $this->buscarCuenta($numCuenta, $this->getColeccionCuentaCorriente());
        if ($cuentaCorriente) {
            $cuentaCorriente->realizarRetiro($monto);
        }
        else {
            $cajaAhorro = $this->buscarCuenta($numCuenta, $this->getColeccionCajaAhorro());
            if ($cajaAhorro) {
                $cajaAhorro->realizarRetiro($monto);
            }
        }
    }

    public function  mostrarColeccion($coleccion) {
        $cadena = "";
        foreach ($coleccion as $elemento) {
            $cadena .= $elemento;
        }
        return $cadena;
    }

    public function __toString()
    {
        return "Cuentas corrientes:\n" . $this->mostrarColeccion($this->getColeccionCuentaCorriente()) . "\nCajas de ahorro:\n" . $this->mostrarColeccion($this->getColeccionCajaAhorro()) . "\nÚltimo valor de cuenta asignado: " . $this->getUltimoValorCuentaAsignado() . "\nClientes:\n" . $this->mostrarColeccion($this->getColeccionCliente());
    }

}

?>