<?php

class Venta {
    private $fecha;
    private $objPaqueteTuristico;
    private $cantidadPersonas;
    private $objCliente;

    public function __construct($fecha, $paquete, $cantidadPersonas, $cliente) {
        $this->fecha = $fecha;
        $this->objPaqueteTuristico = $paquete;
        $this->cantidadPersonas = $cantidadPersonas;
        $this->objCliente = $cliente;
    }

    public function getFecha()
    {
        return $this->fecha;
    }
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getObjPaqueteTuristico()
    {
        return $this->objPaqueteTuristico;
    }
    public function setObjPaqueteTuristico($objPaqueteTuristico)
    {
        $this->objPaqueteTuristico = $objPaqueteTuristico;
    }

    public function getCantidadPersonas()
    {
        return $this->cantidadPersonas;
    }
    public function setCantidadPersonas($cantidadPersonas)
    {
        $this->cantidadPersonas = $cantidadPersonas;
    }

    public function getObjCliente()
    {
        return $this->objCliente;
    }
    public function setObjCliente($objCliente)
    {
        $this->objCliente = $objCliente;
    }

    public function darImporteVenta() {
        $importeFinal = 0;
        $cantidadPersonas = $this->getCantidadPersonas();
        $objPaqueteTuristico = $this->getObjPaqueteTuristico();
        $cantidadDias = $objPaqueteTuristico->getCantidadDias();
        $precioPorDia = $objPaqueteTuristico->getObjDestino()->getPrecioPorDia();
        $importeFinal = ($cantidadDias * $precioPorDia) * $cantidadPersonas;
        return $importeFinal;
    }

    public function obtenerAnioDeVenta() {
        $fecha = $this->getFecha();
        $anio = "";
        for ($i = 0; $i < 4; $i++) {
            $anio .= $fecha[$i];
        }
        return $anio;
    }

    public function __toString()
    {
        return "Fecha: " . $this->getFecha() . "\nPaquete turístico:\n" . $this->getObjPaqueteTuristico() . "Cantidad de personas: " . $this->getCantidadPersonas() . "\nCliente:\n" . $this->getObjCliente();
    }

}

/*
include_once "Cliente.php";
include_once "Destino.php";
include_once "PaqueteTuristico.php";
include_once "VentaOnline.php";
$objDestino = new Destino("1", "Bariloche", 100);
$objPaqueteTuristico = new PaqueteTuristico("2024-06-01", 7, $objDestino, 20);
$objCliente = new Cliente("DNI", "41050862", "Juan", "Reus");
$objVenta = new Venta("2024-05-01", $objPaqueteTuristico, 2, $objCliente);
echo $objVenta;

// Calcular el importe de la venta
$importeVenta = $objVenta->darImporteVenta();

// Mostrar el importe de la venta
echo "El importe de la venta es: $" . $importeVenta . "\n";

// Crear un objeto de la clase VentaOnline
$objVentaOnline = new VentaOnline("2024-05-12", $objPaqueteTuristico, 2, $objCliente, 10); 

// Obtener el importe de la venta en línea con descuento
$importeVentaOnline = $objVentaOnline->darImporteVenta();

// Mostrar la información de la venta en línea
echo "------------------------ Información de la venta en línea ------------------------\n";
echo $objVentaOnline;
echo "Importe de la venta con descuento: $" . $importeVentaOnline;
*/

?>