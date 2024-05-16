<?php

class ProductoRegional extends Producto {
    private $porcentajeDescuento;
    public function __construct($codigo, $descripcion, $stock, $porcentajeIva, $precioCompra, $objRubro, $porcentajeDescuento)
    {
        parent::__construct($codigo, $descripcion, $stock, $porcentajeIva, $precioCompra, $objRubro);
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
        $precioVenta -= $precioVenta * ($this->getPorcentajeDescuento() / 100);
        return number_format($precioVenta, 2);
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        return $cadena . "\nPorcentaje de descuento: " . $this->getPorcentajeDescuento() . "%\n";
    }
}

?>