<?php

class Local {
    private $colObjProductoImportado;
    private $colObjProductoRegional;
    private $colObjVenta;

    public function __construct($productosImportados, $productosRegionales, $ventas)
    {
        $this->colObjProductoImportado = $productosImportados;
        $this->colObjProductoRegional = $productosRegionales;
        $this->colObjVenta = $ventas;
    }

    public function getColObjProductoImportado()
    {
        return $this->colObjProductoImportado;
    }
    public function getColObjProductoRegional()
    {
        return $this->colObjProductoRegional;
    }
    public function getColObjVenta()
    {
        return $this->colObjVenta;
    }

    public function setColObjProductoImportado($productosImportados)
    {
        $this->colObjProductoImportado = $productosImportados;
    }
    public function setColObjProductoRegional($productosRegionales)
    {
        $this->colObjProductoRegional = $productosRegionales;
    }
    public function setColObjVenta($ventas)
    {
        $this->colObjVenta = $ventas;
    }

    private function buscarProducto($codProducto, $coleccionProductos) {
        $productoEncontrado = null;
        $i = 0;
        while ($i < count($coleccionProductos) && !$productoEncontrado) {
            $unProducto = $coleccionProductos[$i];
            if ($unProducto->getCodigoBarra() == $codProducto) {
                $productoEncontrado = $unProducto;
            }
            $i++;
        }
        return $productoEncontrado;
    }

    public function incorporarProductoLocal($objProducto) {
        $incorporacionExitosa = false;
        $productoEncontrado = null;
        if ($objProducto instanceof ProductoRegional) {
            $productosRegionales = $this->getColObjProductoRegional();
            $productoEncontrado = $this->buscarProducto($objProducto->getCodigoBarra(), $productosRegionales);
            if ($productoEncontrado == null) {
                $productosRegionales[] = $objProducto;
                $this->setColObjProductoRegional($productosRegionales);
                $incorporacionExitosa = true;
            }
        }
        else if ($objProducto instanceof ProductoImportado) {
            $productosImportados = $this->getColObjProductoImportado();
            $productoEncontrado = $this->buscarProducto($objProducto->getCodigoBarra(), $productosImportados);
            if ($productoEncontrado == null) {
                $productosImportados[] = $objProducto;
                $this->setColObjProductoImportado($productosImportados);
                $incorporacionExitosa = true;
            }
        }
        return $incorporacionExitosa;
    }

    public function retornarImporteProducto($codProducto) {
        $precioVenta = -1;
        $productoRegional = $this->buscarProducto($codProducto, $this->getColObjProductoRegional());
        if ($productoRegional) {
            $precioVenta = $productoRegional->darPrecioVenta();
        }
        else {
            $productoImportado = $this->buscarProducto($codProducto, $this->getColObjProductoImportado());
            if ($productoImportado) {
                $precioVenta = $productoImportado->darPrecioVenta();
            }
        }
        return $precioVenta;
    }

    public function retornarCostoProductoLocal() {
        $productosRegionales = $this->getColObjProductoRegional();
        $productosImportados = $this->getColObjProductoImportado();
        $costoTotal = 0;
        foreach ($productosRegionales as $producto) {
            $costoTotal += $producto->getPrecioCompra() * $producto->getStock();
        }
        foreach ($productosImportados as $producto) {
            $costoTotal += $producto->getPrecioCompra() * $producto->getStock();
        }
        return $costoTotal;
    }

    public function productoMasEcomomico($rubro) {
        $productoMasEconomico = null;
        $productosDelRubro = [];
        $productosImportados = $this->getColObjProductoImportado();
        $productosRegionales = $this->getColObjProductoRegional();
        foreach ($productosImportados as $producto) {
            if ($producto->getObjRubro()->getDescripcionRubro() == $rubro) {
                $productosDelRubro[] = $producto;
            }
        }
        foreach ($productosRegionales as $producto) {
            if ($producto->getObjRubro()->getDescripcionRubro() == $rubro) {
                $productosDelRubro[] = $producto;
            }
        }
        if (count($productosDelRubro)>0) {
            $productoMasEconomico = $productosDelRubro[0];
            foreach ($productosDelRubro as $producto) {
                if ($producto->darPrecioVenta() < $productoMasEconomico->darPrecioVenta()) {
                    $productoMasEconomico = $producto;
                }
            }
        }
        return $productoMasEconomico;
    }

    private function filtrarVentasPorAnio($anio) {
        $ventasDelAnio = [];
        foreach ($this->getColObjVenta() as $objVenta) {
            if (date("Y", strtotime($objVenta->getFecha())) == $anio) {
                $ventasDelAnio[] = $objVenta;
            }
        }
        return $ventasDelAnio;
    }

    public function informarProductosMasVendidos($anio, $n) {
        $productosVendidos = [];
        $ventasDelAnio = $this->filtrarVentasPorAnio($anio);

        foreach ($ventasDelAnio as $objVenta) {
            $productosVenta = $objVenta->getColObjProducto();
            foreach ($productosVenta as $objProducto) {
                $codigoProducto = $objProducto->getCodigoBarra();
                if (!isset($productosVendidos[$codigoProducto])) {
                    $productosVendidos[$codigoProducto] = 0;
                }
                $productosVendidos[$codigoProducto]++;
            }
        }

        arsort($productosVendidos);

        $productosMasVendidos = [];
        $numProductosAgregados = 0;
        $i = 0;

        while ($i < count($productosVendidos) && $numProductosAgregados < $n) {
            $codigoProducto = array_keys($productosVendidos)[$i];
            $producto = $this->buscarProducto($codigoProducto, $this->getColObjProductoRegional());
            if (!$producto) {
                $producto = $this->buscarProducto($codigoProducto, $this->getColObjProductoImportado());
            }
            if ($producto) {
                $productosMasVendidos[] = $producto;
                $numProductosAgregados++;
            }
            $i++;
        }
        return $productosMasVendidos;
    }

    public function promedioVentasImportados() {
        $promedioVentas = -1;
        $cantidadVentasImportadas = 0;
        $totalVentasProdImportados = 0;
        $ventasRealizadas = $this->getColObjVenta();
        foreach ($ventasRealizadas as $objVenta) {
            $productosVenta = $objVenta->getColObjProducto();
            $i = 0;
            $importeAportado = false;
            while ($i < count($productosVenta) && !$importeAportado) {
                $objProducto = $productosVenta[$i];
                if ($objProducto instanceof ProductoImportado) {
                    $cantidadVentasImportadas++;
                    $totalVentasProdImportados += $objVenta->darImporteVenta();
                    $importeAportado = true; 
                }
                $i++;
            }
        }
        if ($cantidadVentasImportadas > 0) {
            $promedioVentas = $totalVentasProdImportados / $cantidadVentasImportadas;
        }
        return $promedioVentas;
    }

    public function informarConsumoCliente($tipoDoc, $numDoc) {
        $coleccionVentas = $this->getColObjVenta();
        $productosCompradosPorCliente = [];
        foreach ($coleccionVentas as $objVenta) {
            $objCliente = $objVenta->getObjCliente();
            if ($objCliente->getTipoDoc() == $tipoDoc && $objCliente->getNumDoc() == $numDoc) {
                foreach ($objVenta->getColObjProducto() as $objProducto) {
                    $productosCompradosPorCliente[] = $objProducto;
                }
            }
        }
        return $productosCompradosPorCliente;
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
        return "\nProductos importados:\n" . $this->mostrarColeccion($this->getColObjProductoRegional()) . "\nProductos regionales:\n" . $this->mostrarColeccion($this->getColObjProductoRegional()) . "\nVentas:\n" . $this->mostrarColeccion($this->getColObjVenta());
    }

}

?>