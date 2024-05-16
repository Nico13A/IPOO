<?php

class Banco {
    private $coleccionObjCuenta;
    private $ultimoValorCuentaAsignado;
    private $coleccionCliente;

    public function __construct($coleccionObjCuenta, $ultimoValorCuentaAsignado, $colCliente)
    {
        $this->coleccionObjCuenta = $coleccionObjCuenta;
        $this->ultimoValorCuentaAsignado = $ultimoValorCuentaAsignado;
        $this->coleccionCliente = $colCliente;        
    }

    public function getColeccionObjCuenta() {
        return $this->coleccionObjCuenta;
    }
    public function getUltimoValorCuentaAsignado()
    {
        return $this->ultimoValorCuentaAsignado;
    }
    public function getColeccionCliente()
    {
        return $this->coleccionCliente;
    }

    public function setColeccionObjCuenta($coleccionCuenta) {
        $this->coleccionObjCuenta = $coleccionCuenta;
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
        $clientes = $this->getColeccionCliente();
        $i = 0;
        $clienteEncontrado = false;
        $incorporacionExitosa = false;
        while ($i<count($clientes) && !$clienteEncontrado) {
            $unCliente = $clientes[$i];
            if ($unCliente->getDni() == $objCliente->getDni()) {
                $clienteEncontrado = true;
            }
            $i++;
        }
        if (!$clienteEncontrado) {
            $clientes[] = $objCliente;
            $this->setColeccionCliente($clientes);
            $incorporacionExitosa = true;
        }
        return $incorporacionExitosa;
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
        $incorporacionExitosa = false;
        $objCliente = $this->buscarCliente($numeroCliente);
        if ($objCliente) {
            $coleccionCuentas = $this->getColeccionObjCuenta();
            $objCuentaCorriente = new CuentaCorriente($this->getUltimoValorCuentaAsignado()+1, 0, $objCliente, $montoDescubierto);
            $coleccionCuentas[] = $objCuentaCorriente;
            $this->setColeccionObjCuenta($coleccionCuentas);
            $this->setUltimoValorCuentaAsignado($this->getUltimoValorCuentaAsignado()+1);
            $incorporacionExitosa = true;
        }
        return $incorporacionExitosa;
    }

    public function incorporarCajaAhorro($numeroCliente) {
        $incorporacionExitosa = false;
        $objCliente = $this->buscarCliente($numeroCliente);
        if ($objCliente) {
            $coleccionCuentas = $this->getColeccionObjCuenta();
            $objCajaAhorro = new CuentaAhorro($this->getUltimoValorCuentaAsignado()+1, 0, $objCliente);
            $coleccionCuentas[] = $objCajaAhorro;
            $this->setColeccionObjCuenta($coleccionCuentas);
            $this->setUltimoValorCuentaAsignado($this->getUltimoValorCuentaAsignado()+1);
            $incorporacionExitosa = true;
        }
        return $incorporacionExitosa;
    }

    private function buscarCuenta($numCuenta) {
        $coleccionCuentas = $this->getColeccionObjCuenta();
        $i = 0;
        $cuentaEncontrada = null;
        $encontrada = false;
        while ($i<count($coleccionCuentas) && !$encontrada) {
            $cuenta = $coleccionCuentas[$i];
            if ($cuenta->getNumero() == $numCuenta) {
                $cuentaEncontrada = $cuenta;
                $encontrada = true;
            }
            $i++;
        }
        return $cuentaEncontrada;
    }

    public function realizarDeposito($numCuenta, $monto) {
        $depositoExitoso = false;
        $objCuenta = $this->buscarCuenta($numCuenta);
        if ($objCuenta && $objCuenta->realizarDeposito($monto)) {
            $depositoExitoso = true;
        }
        return $depositoExitoso;
    }

    public function realizarRetiro($numCuenta, $monto) {
        $retiroExitoso = false;
        $objCuenta = $this->buscarCuenta($numCuenta);
        if ($objCuenta && $objCuenta->realizarRetiro($monto)) {
            $retiroExitoso = true;
        }
        return $retiroExitoso;
    }

    private function mostrarColeccion($coleccion) {
        $cadena = "";
        foreach ($coleccion as $elemento) {
            $cadena .= $elemento;
        }
        return $cadena;
    }

    public function __toString()
    {
        return "Cuentas:\n" . $this->mostrarColeccion($this->getColeccionObjCuenta()) . "Último valor de cuenta asignado: " . $this->getUltimoValorCuentaAsignado() . "\nClientes:\n" . $this->mostrarColeccion($this->getColeccionCliente());
    }

}

?>