<?php

include_once "Cliente.php";
include_once "Rubro.php";
include_once "Producto.php";
include_once "ProductoRegional.php";
include_once "ProductoImportado.php";
include_once "Venta.php";
include_once "Local.php";

// Se crean 2 rubros: conservas con un 35 % de ganancia, regalos con un 55 % de ganancia.
$objRubroConserva = new Rubro("Conservas", 35);
$objRubroRegalo = new Rubro("Regalos", 55);

// Se crean 4 instancias de la clase Producto y se vinculan a los rubros creados en el inciso anterior.
$objProducto1 = new ProductoRegional("123456789", "Mermelada", 50, 10, 2.5, $objRubroConserva, 5);
$objProducto2 = new ProductoImportado("987654321", "Jabón aromático", 100, 15, 1.75, $objRubroRegalo);
$objProducto3 = new ProductoRegional("111222333", "Salsa de tomate", 30, 10, 3.0, $objRubroConserva, 10);
$objProducto4 = new ProductoImportado("444555666", "Caja de chocolates", 20, 20, 5.0, $objRubroRegalo);

// Crear una instancia de la clase Local.
$objLocal = new Local([], [], []);

// Incorporar cada instancia de Producto a la tienda.
$objLocal->incorporarProductoLocal($objProducto1);
$objLocal->incorporarProductoLocal($objProducto2);
$objLocal->incorporarProductoLocal($objProducto3);
$objLocal->incorporarProductoLocal($objProducto4);

echo $objLocal;

// Incorporar nuevamente la última instancia de producto incorporada a la tienda.
$objLocal->incorporarProductoLocal($objProducto4);
//echo $objLocal;

// Obtener el precio de venta de cada producto.
echo "Precios de venta de los productos:\n";
echo "Producto 1: $" . $objLocal->retornarImporteProducto($objProducto1->getCodigoBarra()) . "\n";
echo "Producto 2: $" . $objLocal->retornarImporteProducto($objProducto2->getCodigoBarra()) . "\n";
echo "Producto 3: $" . $objLocal->retornarImporteProducto($objProducto3->getCodigoBarra()) . "\n";
echo "Producto 4: $" . $objLocal->retornarImporteProducto($objProducto4->getCodigoBarra()) . "\n";

// Obtener el costo total de los productos en el local.
echo "\nCosto total de los productos en el local: $" . $objLocal->retornarCostoProductoLocal();

?>