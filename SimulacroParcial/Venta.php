<?php

class Venta {

    private $nroVenta;
    private $fecha;
    private $objCliente;
    private $colObjMoto;
    private $precioFinal;

    public function __construct($nroVenta, $fecha, $objCliente, $colObjMoto, $precioFinal)
    {
        $this->nroVenta = $nroVenta;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
        $this->colObjMoto = $colObjMoto;
        $this->precioFinal = $precioFinal;
    }

    public function getNroVenta() {
        return $this->nroVenta;
    }
    public function getFechaVenta() {
        return $this->fecha;
    }
    public function getObjCliente() {
        return $this->objCliente;
    }
    public function getColObjMoto() {
        return $this->colObjMoto;
    }
    public function getPrecioFinal() {
        return $this->precioFinal;
    }

    public function setNroVenta($nroVenta) {
        $this->nroVenta = $nroVenta;
    }
    public function setFechaVenta($fecha) {
        $this->fecha = $fecha;
    }
    public function setObjCliente($objCliente) {
        $this->objCliente = $objCliente;
    }
    public function setColObjMoto($colObjMoto) {
        $this->colObjMoto = $colObjMoto;
    }
    public function setPrecioFinal($precioFinal) {
        $this->precioFinal = $precioFinal;
    }

    public function seEncuentra($objMoto) {
        $motoEncontrada = false;
        $coleccionMotos = $this->getColObjMoto();
        $i = 0;
        while ($i<count($coleccionMotos) && !$motoEncontrada) {
            $unaMoto = $coleccionMotos[$i];
            if ($unaMoto->getCodigoMoto() == $objMoto->getCodigoMoto()) {
                $motoEncontrada = true;
            }
            $i++;
        }
        return $motoEncontrada;
    }

    public function incorporarMoto($objMoto) {
        $motoIncorporada = false;
        $coleccionMotos = $this->getColObjMoto();
        if ($objMoto->getActiva()) {
            $motoEnColeccion = $this->seEncuentra($objMoto);
            if (!$motoEnColeccion) {
                $coleccionMotos[] = $objMoto;
                $this->setColObjMoto($coleccionMotos);
                $this->setPrecioFinal($this->getPrecioFinal()+$objMoto->darPrecioVenta());
                $motoIncorporada = true;
            }
        }
        return $motoIncorporada;
    }

    public function mostrarColeccionDeMotos() {
        $cadena = "";
        $coleccionMotos = $this->getColObjMoto();
        foreach ($coleccionMotos as $objMoto) {
            $cadena .= $objMoto;
        }
        return $cadena;
    }

    public function __toString()
    {
        return "Número de venta: " . $this->getNroVenta() . "\nFecha de venta: " . $this->getFechaVenta() . "\nCliente:\n" . $this->getObjCliente() . "Colección de motos:\n" . $this->mostrarColeccionDeMotos() . "Precio final: " . $this->getPrecioFinal() . "\n";
    }

}
/*
include_once "Cliente.php";
include_once "Moto.php";
$objetoCliente = new Cliente("Marco", "Reus", false, "DNI", "41050862");
$objMoto1 = new Moto("001", 5000, 2020, "Moto deportiva", 5, true);
$objMoto2 = new Moto("002", 6000, 2019, "Moto touring", 6, true);
$objMoto3 = new Moto("003", 4500, 2021, "Moto urbana", 4, false);
$coleccionMotos = [];
$objetoVenta = new Venta(1, "2024-04-10", $objetoCliente, $coleccionMotos, 0);
echo $objetoVenta;
echo "Agregando motos\n";
$objetoVenta->incorporarMoto($objMoto1);
$objetoVenta->incorporarMoto($objMoto2);
$objetoVenta->incorporarMoto($objMoto3);
echo $objetoVenta;*/

?>