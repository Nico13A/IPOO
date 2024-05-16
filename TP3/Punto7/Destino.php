<?php

class Destino {
    private $id;
    private $nombre;
    private $precioPorDia;

    public function __construct($id, $nombre, $precioPorDia) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precioPorDia = $precioPorDia;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getPrecioPorDia()
    {
        return $this->precioPorDia;
    }
    public function setPrecioPorDia($precioPorDia)
    {
        $this->precioPorDia = $precioPorDia;
    }

    public function __toString()
    {
        return "Identificación: " . $this->getId() . "\nNombre del lugar: " . $this->getNombre() . "\nValor por día: " . $this->getPrecioPorDia() . "\n";
    }

}

/*
$objDestino = new Destino("1", "Bariloche", 100);
echo $objDestino;
*/

?>