<?php

class MotoImportada extends Moto {
    private $paisOrigen;
    private $impuesto;
    
    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa, $paisOrigen, $impuesto)
    {
        parent::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa);
        $this->paisOrigen = $paisOrigen;
        $this->impuesto = $impuesto;
    }

    public function getPaisOrigen()
    {
        return $this->paisOrigen;
    }
    public function getImpuesto()
    {
        return $this->impuesto;
    }

    public function setPaisOrigen($paisOrigen)
    {
        $this->paisOrigen = $paisOrigen;
    }
    public function setImpuesto($impuesto)
    {
        $this->impuesto = $impuesto;
    }

    public function darPrecioVenta()
    {
        $precioVenta = parent::darPrecioVenta();
        $precioVenta += $this->getImpuesto();
        return $precioVenta;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena .= "País origen: " . $this->getPaisOrigen() . "\nImpuesto por importación: " . $this->getImpuesto() . "\n";
        return $cadena;
    }

}

?>