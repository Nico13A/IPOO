<?php

class Venta {
    private $fecha;
    private $colObjProducto;
    private $objCliente;

    public function __construct($fecha, $colObjProducto, $objCliente)
    {
        $this->fecha = $fecha;
        $this->colObjProducto = $colObjProducto;
        $this->objCliente = $objCliente;
    }

    public function getFecha()
    {
        return $this->fecha;
    }
    public function getColObjProducto()
    {
        return $this->colObjProducto;
    }
    public function getObjCliente()
    {
        return $this->objCliente;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    } 
    public function setColObjProducto($colObjProducto)
    {
        $this->colObjProducto = $colObjProducto;
    }
    public function setObjCliente($objCliente)
    {
        $this->objCliente = $objCliente;
    }

    public function darImporteVenta() {
        $importeTotal = 0;
        $productosVendidos = $this->getColObjProducto();
        foreach ($productosVendidos as $producto) {
            $importeTotal += $producto->darPrecioVenta();
        }
        return $importeTotal;
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
        return "Fecha: " . $this->getFecha() . "\nProductos:\n" . $this->mostrarColeccion($this->getColObjProducto()) . "\nCliente:\n" . $this->getObjCliente();
    }

}

?>