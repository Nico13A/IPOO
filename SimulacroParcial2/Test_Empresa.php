<?php

include_once "Cliente.php";
include_once "Moto.php";
include_once "MotoNacional.php";
include_once "MotoImportada.php";
include_once "Venta.php";
include_once "Empresa.php";

//Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
$objCliente1 = new Cliente("Juan", "Pérez", true, "DNI", "12345678");
$objCliente2 = new Cliente("María", "Gómez", true, "CUIL", "20350457893");

//Cree 4 objetos Motos con la información visualizada en la tabla.
$objMoto1 = new MotoNacional("11", 2230000, 2022, "Benelli Imperiale 400", 85, true, 10);
$objMoto2 = new MotoNacional("12", 584000 , 2021, "Zanella Zr 150 Ohc", 70, true, 10);
$objMoto3 = new MotoNacional("13", 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);
$objMoto4 = new MotoImportada("14", 12499900, 2020, "Pitbike Enduro Motocross Apollo Aiii 190cc Plr", 100, true, "Francia", 6244400);

/*
Se crea un objeto Empresa con la siguiente información: denominación =” Alta Gama”, 
dirección= “Av Argentina 123”, colección de motos= [$obMoto11, $obMoto12, $obMoto13, $obMoto14], 
colección de clientes = [$objCliente1, $objCliente2 ], la colección de ventas realizadas=[].
*/
$objEmpresa = new Empresa("Alta Gama", "Av.Argentina 123", [$objCliente1, $objCliente2], [$objMoto1, $objMoto2, $objMoto3, $objMoto4], []);

/*
Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable 
$objCliente2 (creada en el punto 1) y la colección de códigos de motos 
es la siguiente [11,12,13,14]. 
Visualizar el resultado obtenido.
*/
echo "Importe final de la venta: " . $objEmpresa->registrarVenta(["11", "12", "13", "14"], $objCliente2) . "\n";

/*
Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde 
el $objCliente es una referencia a la clase Cliente almacenada en la variable 
$objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [13, 14]. 
Visualizar el resultado obtenido.
*/
echo "Importe final de la venta: " . $objEmpresa->registrarVenta(["13", "14"], $objCliente2) . "\n";

/*
Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable 
$objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [14, 2]. 
Visualizar el resultado obtenido.
*/
echo "Importe final de la venta: " . $objEmpresa->registrarVenta(["14", "2"], $objCliente2) . "\n"; 

/*
Invocar al método informarVentasImportadas(). Visualizar el resultado obtenido.
*/
$ventasImportadas = $objEmpresa->informarVentasImportadas();
if (count($ventasImportadas)>0) {
    echo "Ventas importadas:\n";
    foreach ($ventasImportadas as $objVenta) {
        echo $objVenta;
    }
}
else {
    echo "No se encontraron ventas importadas.\n";
}

/*
Invocar al método informarSumaVentasNacionales(). Visualizar el resultado obtenido.
*/
echo "Suma de las ventas nacionales: " . $objEmpresa->informarSumaVentasNacionales() . "\n";

//Realizar un echo de la variable Empresa creada en 2.
echo "-------------------------- Información de la empresa --------------------------\n";
echo $objEmpresa;

?>