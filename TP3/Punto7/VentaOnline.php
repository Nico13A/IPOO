<?php

class VentaOnline extends Venta {
    private $porcentajeDescuento;

    public function __construct($fecha, $paquete, $cantidadPersonas, $cliente, $porcentajeDescuento = 20)
    {
        parent::__construct($fecha, $paquete, $cantidadPersonas, $cliente);
        $this->porcentajeDescuento = $porcentajeDescuento;
    }

    public function getPorcentajeDescuento()
    {
        return $this->porcentajeDescuento;
    }

    public function setPorcentajeDescuento($porcentajeDescuento)
    {
        $this->porcentajeDescuento = $porcentajeDescuento;
    }

    public function darImporteVenta()
    {
        $importeFinal = parent::darImporteVenta();
        if ($importeFinal>0) {
            $importeFinal -= $importeFinal * ($this->getPorcentajeDescuento() / 100);
        }
        return $importeFinal;
    }

    public function obtenerAnioDeVenta() {
        return parent::obtenerAnioDeVenta();
    }

    public function __toString()
    {
        $cadena = "Venta online:\n";
        $cadena .= parent::__toString();
        $cadena .= "Porcentaje de descuento: " . $this->getPorcentajeDescuento() . "%\n\n";
        return $cadena;
    }

}

?>