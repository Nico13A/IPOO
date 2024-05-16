<?php

class Rubro {
    private $descripcionRubro;
    private $porcentajeGanancia;

    public function __construct($descripcionRubro, $porcentajeGanancia)
    {
        $this->descripcionRubro = $descripcionRubro;
        $this->porcentajeGanancia = $porcentajeGanancia;
    }

    public function getDescripcionRubro()
    {
        return $this->descripcionRubro;
    }
    public function getPorcentajeGanancia()
    {
        return $this->porcentajeGanancia;
    }

    public function setDescripcionRubro($descripcionRubro)
    {
        $this->descripcionRubro = $descripcionRubro;
    }
    public function setPorcentajeGanancia($porcentajeGanancia)
    {
        $this->porcentajeGanancia = $porcentajeGanancia;
    }

    public function __toString()
    {
        return "Descripción: " . $this->getDescripcionRubro() . "\nPorcentaje de ganancia: " . $this->getPorcentajeGanancia() . "%";
    }

}

?>