<?php

class Cafetera {
    private $capacidadMaxima;
    private $cantidadActual;

    public function __construct($capacidadMaxima, $cantActual)
    {
        $this->capacidadMaxima = $capacidadMaxima;
        $this->cantidadActual = $cantActual;
    }

    public function getCapacidadMaxima() {
        return $this->capacidadMaxima;
    }
    public function getCantidadActual() {
        return $this->cantidadActual;
    }

    public function setCapacidadMaxima($capacidadMaxima) {
        $this->capacidadMaxima = $capacidadMaxima;
    }
    public function setCantidadActual($cantidadActual) {
        $this->cantidadActual = $cantidadActual;
    }

    public function llenarCafetera() {
        $this->setCantidadActual($this->getCapacidadMaxima());
    }

    public function servirTaza($cantidad) {
        $llenarTaza = false;
        $cantActual = $this->getCantidadActual();
        if ($cantActual < $cantidad) {
            $this->setCantidadActual(0);
        }
        else {
            $llenarTaza = true;
            $this->setCantidadActual($cantActual - $cantidad);
        }
        return $llenarTaza;
    }

    public function vaciarCafetera() {
        $this->setCantidadActual(0);
    }

    public function agregarCafe($cantidad) {
        $seAgrega = true;
        $cantidadActual = $this->getCantidadActual();
        $capacidadMaxima = $this->getCapacidadMaxima();
        if (($cantidadActual + $cantidad) <= $capacidadMaxima) {
            $this->setCantidadActual($cantidad + $cantidadActual);
        } else {
            $seAgrega = false;
        }
        return $seAgrega;
    }

    public function __toString()
    {
        return "Cafetera:\nCantidad máxima de café que puede contener la cafetera: " . $this->getCapacidadMaxima() . "\nCantidad actual de café que hay en la cafetera: " . $this->getCantidadActual() . "\n";
    }

}


?>