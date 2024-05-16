<?php

class Producto {
    private $codigoBarra;
    private $descripcion;
    private $stock;
    private $porcentajeIva;
    private $precioCompra;
    private $objRubro;

    public function __construct($codigo, $descripcion, $stock, $porcentajeIva, $precioCompra, $objRubro)
    {
        $this->codigoBarra = $codigo;
        $this->descripcion = $descripcion;
        $this->stock = $stock;
        $this->porcentajeIva = $porcentajeIva;
        $this->precioCompra = $precioCompra;
        $this->objRubro = $objRubro;
    }

    public function getCodigoBarra()
    {
        return $this->codigoBarra;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getStock()
    {
        return $this->stock;
    }
    public function getPorcentajeIva()
    {
        return $this->porcentajeIva;
    }
    public function getPrecioCompra()
    {
        return $this->precioCompra;
    }
    public function getObjRubro()
    {
        return $this->objRubro;
    }

    public function setCodigoBarra($codigoBarra)
    {
        $this->codigoBarra = $codigoBarra;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function setStock($stock)
    {
        $this->stock = $stock;
    }
    public function setPorcentajeIva($porcentajeIva)
    {
        $this->porcentajeIva = $porcentajeIva;
    }
    public function setPrecioCompra($precioCompra)
    {
        $this->precioCompra = $precioCompra;
    }
    public function setObjRubro($objRubro)
    {
        $this->objRubro = $objRubro;
    }

    public function darPrecioVenta() {
        $precioVenta = 0;
        $precioCompra = $this->getPrecioCompra();
        $porcentajeGanancia = $this->getObjRubro()->getPorcentajeGanancia();
        $porcentajeIva = $this->getPorcentajeIva();
        $precioVenta = $precioCompra + ($precioCompra * ($porcentajeGanancia / 100));
        $precioVenta += $precioVenta * ($porcentajeIva / 100);
        return $precioVenta;
    }

    public function __toString()
    {
        return "\nCódigo de barra: " . $this->getCodigoBarra() . "\nDescripción: " . $this->getDescripcion() . "\nStock: " . $this->getStock() . "\nPorcentaje de IVA: " . $this->getPorcentajeIva() . "%\nPrecio de compra: " . $this->getPrecioCompra() . "\nRubro:\n" . $this->getObjRubro();
    }

}

/*
include_once "Rubro.php";

// Crear objetos Rubro
$rubro1 = new Rubro("Electrónica", 20);
$rubro2 = new Rubro("Alimentos", 15);

// Crear objetos Producto
$producto1 = new Producto("001", "Teléfono móvil", 50, 10, 500, $rubro1);
$producto2 = new Producto("002", "Queso regional", 100, 5, 10, $rubro2);

echo $producto1;
$precioVentaProducto1 = $producto1->darPrecioVenta();
echo "\nEl precio de venta del producto es: $" . $precioVentaProducto1;
*/
?>