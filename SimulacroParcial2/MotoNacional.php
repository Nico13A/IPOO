<?php

class MotoNacional extends Moto {
    private $porcentajeDescuento;
    
    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa, $porcentajeDescuento = 15)
    {
        parent::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa);
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

    public function darPrecioVenta()
    {
        $precioVenta = parent::darPrecioVenta();
        $precioVenta -= ($precioVenta * ($this->getPorcentajeDescuento()/100));
        return $precioVenta;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena .= "Porcentaje de descuento: " . $this->getPorcentajeDescuento() . "%\n";
        return $cadena;
    }
}

?>