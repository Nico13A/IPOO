<?php

public function informarProductosMasVendidos($anio, $n) {
    $colVentas = $this->getColeccionVentas();
    $productosMasVendidos = [];
    foreach ($colVentas as $objVenta) {
        $anioVenta = date_format($objVenta->getFecha(), "Y");
        if ($anioVenta == $anio) {
            foreach ($objVenta->getColObjProductos() as $productoVendido) {
                if ($productosMasVendidos[$productoVendido->getCodigoBarra()] != null) {
                    $productosMasVendidos[$productoVendido->getCodigoBarra()]++; 
                }
                else {
                    $productosMasVendidos[$productoVendido->getCodigoBarra()] = 1;
                }

            }
        }
    }
    arsort($productosMasVendidos);
    $colProductosMasVendidos = [];
    for ($i=0; $i < $n; $i++) { 
        $producto = $this->buscarProducto($productosMasVendidos[$i]);
        array_push($colProductosMasVendidos, $producto);
    }
    return $colProductosMasVendidos;
}

/*
Aprender metodos de ordenamiento, porque arsort no creo que en el parcial dejen usarlo.
*/

public function promedioVentasImportados() {
    $colVentas = $this->getColeccionVentas();
    $sumaVentas = 0;
    $sumaProductos = 0;
    foreach ($colVentas as $objVenta) {
        foreach ($objVenta->getColObjProductos() as $producto) {
            if (is_a($producto, 'ProductoImportado')) {
                $sumaVentas += $producto->darPrecioVenta();
                $sumaProductos++;
            }
        }
    }
    return $sumaVentas / $sumaProductos;
}

?>