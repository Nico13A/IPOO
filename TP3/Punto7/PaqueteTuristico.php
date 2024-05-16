<?php

class PaqueteTuristico {
    private $fechaDesde;
    private $cantidadDias;
    private $objDestino;
    private $cantidadTotalPlazas;
    private $cantidadDisponiblePlazas;

    public function __construct($fechaDesde, $cantidadDias, $objDestino, $cantidadTotalPlazas) {
        $this->fechaDesde = $fechaDesde;
        $this->cantidadDias = $cantidadDias;
        $this->objDestino = $objDestino;
        $this->cantidadTotalPlazas = $cantidadTotalPlazas;
        $this->cantidadDisponiblePlazas = $cantidadTotalPlazas;
    }

    public function getFechaDesde()
    {
        return $this->fechaDesde;
    }
    public function setFechaDesde($fechaDesde)
    {
        $this->fechaDesde = $fechaDesde;
    }

    public function getCantidadDias()
    {
        return $this->cantidadDias;
    }
    public function setCantidadDias($cantidadDias)
    {
        $this->cantidadDias = $cantidadDias;
    }

    public function getObjDestino()
    {
        return $this->objDestino;
    }
    public function setObjDestino($objDestino)
    {
        $this->objDestino = $objDestino;
    }

    public function getCantidadTotalPlazas()
    {
        return $this->cantidadTotalPlazas;
    }
    public function setCantidadTotalPlazas($cantidadTotalPlazas)
    {
        $this->cantidadTotalPlazas = $cantidadTotalPlazas;
    }

    public function getCantidadDisponiblePlazas()
    {
        return $this->cantidadDisponiblePlazas;
    }
    public function setCantidadDisponiblePlazas($cantidadDisponiblePlazas)
    {
        $this->cantidadDisponiblePlazas = $cantidadDisponiblePlazas;
    }

    public function equals($otroObjPaqueteTuristico) {
        return $this->getFechaDesde() == $otroObjPaqueteTuristico->getFechaDesde() && 
                $this->getCantidadDias() == $otroObjPaqueteTuristico->getCantidadDias() &&
                $this->getObjDestino()->getId() == $otroObjPaqueteTuristico->getObjDestino()->getId();
    }

    public function __toString()
    {
        return "Fecha desde: " . $this->getFechaDesde() . "\nCantidad de días: " . $this->getCantidadDias() . "\nDestino:\n" . $this->getObjDestino() . "Cantidad total de plazas: " . $this->getCantidadTotalPlazas() . "\nCantidad disponible de plazas: " . $this->getCantidadDisponiblePlazas() . "\n";
    }

}

/*
include_once "Destino.php";
$objDestino = new Destino("1", "Bariloche", 100);
$objPaqueteTuristico = new PaqueteTuristico("2024-06-01", 7, $objDestino, 20);
$objPaqueteTuristico->setCantidadDisponiblePlazas(6);
echo $objPaqueteTuristico->obtenerFechaFin();
*/

?>