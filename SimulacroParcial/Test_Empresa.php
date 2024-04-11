<?php

include_once "Cliente.php";
include_once "Moto.php";
include_once "Venta.php";
include_once "Empresa.php";

//Cree 2 instancias de la clase Cliente: $objCliente1, $objCliente2.
$objCliente1 = new Cliente("Juan", "Pérez", true, "DNI", "12345678");
$objCliente2 = new Cliente("María", "Gómez", true, "CUIL", "20350457893");

//Cree 3 objetos Motos con la información visualizada en la tabla.
$objMoto1 = new Moto("11", 2230000, 2022, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto("12", 584000 , 2021, "Zanella Zr 150 Ohc", 70, true);
$objMoto3 = new Moto("13", 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);

/*
Se crea un objeto Empresa con la siguiente información: 
denominación =” Alta Gama”, dirección= “Av Argenetina 123”, colección de motos= [$obMoto1, 
$obMoto2, $obMoto3] , colección de clientes = [$objCliente1, $objCliente2 ], 
la colección de ventas realizadas=[].
*/
$coleccionMotos = [$objMoto1, $objMoto2, $objMoto3];
$coleccionClientes = [$objCliente1, $objCliente2];
$objEmpresa = new Empresa("Alta Gama", "Av.Argentina 123", $coleccionClientes, $coleccionMotos, []);

/*
Invocar al método registrarVenta($colCodigosMoto, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable 
$objCliente2 (creada en el punto 1) y la colección de códigos de motos 
es la siguiente [11,12,13]. 
Visualizar el resultado obtenido.
*/
echo "Importe final de la venta: " . $objEmpresa->registrarVenta([11, 12, 13], $objCliente2) . "\n";

/*
Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde 
el $objCliente es una referencia a la clase Cliente almacenada en la variable 
$objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [0]. 
Visualizar el resultado obtenido.
*/
echo "Importe final de la venta: " . $objEmpresa->registrarVenta([0], $objCliente2) . "\n";

/*
Invocar al método registrarVenta($colCodigosMotos, $objCliente) de la Clase Empresa donde el
$objCliente es una referencia a la clase Cliente almacenada en la variable 
$objCliente2 (creada en el punto 1) y la colección de códigos de motos es la siguiente [2]. 
Visualizar el resultado obtenido.
*/
echo "Importe final de la venta: " . $objEmpresa->registrarVenta([2], $objCliente2) . "\n"; 

/*
Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento 
se corresponden con el tipo y número de documento del $objCliente1.
*/
$resultadoVentas1 = $objEmpresa->retornarVentasXCliente($objCliente1->getTipoDocumento(), $objCliente1->getNumeroDocumento());
if (count($resultadoVentas1)>0) {
    foreach ($resultadoVentas1 as $venta) {
        echo $venta;
    }
}
else {
    echo "No se encontraron ventas para el cliente.\n";
}

/*
Invocar al método retornarVentasXCliente($tipo,$numDoc) donde el tipo y número de documento 
se corresponden con el tipo y número de documento del $objCliente2
*/
$resultadoVentas2 = $objEmpresa->retornarVentasXCliente($objCliente2->getTipoDocumento(), $objCliente2->getNumeroDocumento());

if (count($resultadoVentas2) > 0) {
    foreach ($resultadoVentas2 as $venta) {
        echo $venta;
    }
} else {
    echo "No se encontraron ventas para el cliente.\n";
}

//Realizar un echo de la variable Empresa creada en 2.
echo "-------------------------- Información de la empresa --------------------------\n";
echo $objEmpresa;

?>