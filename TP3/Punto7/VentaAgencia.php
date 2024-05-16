<?php

class VentaAgencia extends Venta {

    public function __construct($fecha, $paquete, $cantidadPersonas, $cliente)
    {
        parent::__construct($fecha, $paquete, $cantidadPersonas, $cliente);
    }

    public function darImporteVenta()
    {
        return parent::darImporteVenta();
    }

    public function obtenerAnioDeVenta() {
        return parent::obtenerAnioDeVenta();
    }

    public function __toString()
    {
        $cadena = "Venta de agencia:\n";
        $cadena .= parent::__toString() . "\n";
        return $cadena;
    }

}

?>