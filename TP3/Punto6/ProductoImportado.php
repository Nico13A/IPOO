<?php

class ProductoImportado extends Producto {

    public function __construct($codigo, $descripcion, $stock, $porcentajeIva, $precioCompra, $objRubro)
    {
        parent::__construct($codigo, $descripcion, $stock, $porcentajeIva, $precioCompra, $objRubro);
    }

    public function darPrecioVenta()
    {
        $precioVenta = parent::darPrecioVenta();
        $precioVenta += $precioVenta * 0.5;
        $precioVenta += $precioVenta * 0.1;
        return number_format($precioVenta, 2);
    }

}

?>