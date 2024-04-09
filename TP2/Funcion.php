<?php

class Funcion {
    
    private $nombre;
    private $horaInicio;
    private $duracionObra;
    private $precio;

    public function __construct($nombre, $horaInicio, $duracionObra, $precio)
    {
        $this->nombre = $nombre;
        $this->horaInicio = $horaInicio;
        $this->duracionObra = $duracionObra;
        $this->precio = $precio;
    }

    public function getNombreFuncion() {
        return $this->nombre;
    }
    public function getHoraInicio() {
        return $this->horaInicio;
    }
    public function getDuracionObra() {
        return $this->duracionObra;
    }
    public function getPrecioFuncion() {
        return $this->precio;
    }

    public function setNombreFuncion($nombre) {
        $this->nombre = $nombre;
    }
    public function setHoraInicio($horaInicio) {
        $this->horaInicio = $horaInicio;
    }
    public function setDuracionObra($duracionObra) {
        $this->duracionObra = $duracionObra;
    }
    public function setPrecioFuncion($precio) {
        $this->precio = $precio;
    }

    public function calcularHorarioFin() {
        $horarioFinMinutos = $this->getHoraInicio()["hora"] * 60 + $this->getHoraInicio()["minutos"] + $this->getDuracionObra();
        $horas = floor($horarioFinMinutos / 60);
        $minutos = $horarioFinMinutos % 60;
        $horarioFin = ["hora" => $horas, "minutos" => $minutos];
        return $horarioFin;
    }

    public function __toString()
    {
        return "Nombre de la función: " . $this->getNombreFuncion() . "\nHora de inicio: " . $this->getHoraInicio()["hora"] . ":" . $this->getHoraInicio()["minutos"] . " hs\nDuración de la obra: " . $this->getDuracionObra() . " min\nPrecio: $" . $this->getPrecioFuncion() . "\n";
    }

}

?>