<?php

class Disquera {
    private $hora_desde;
    private $hora_hasta;
    private $estadoTienda;
    private $direccion;
    private $personaDuenio;

    public function __construct($hora_desde, $hora_hasta, $estado, $direccion, $objetoPersona)
    {
        $this->hora_desde = $hora_desde;
        $this->hora_hasta = $hora_hasta;
        $this->estadoTienda = $estado;
        $this->direccion = $direccion;
        $this->personaDuenio = $objetoPersona;
    }

    public function getHoraDesde() {
        return $this->hora_desde;
    }
    public function getHoraHasta() {
        return $this->hora_hasta;
    }
    public function getEstadoTienda() {
        return $this->estadoTienda;
    }
    public function getDireccionTienda() {
        return $this->direccion;
    }
    public function getDuenio() {
        return $this->personaDuenio;
    }

    public function setHoraDesde($hora_desde) {
        $this->hora_desde = $hora_desde;
    }
    public function setHoraHasta($hora_hasta) {
        $this->hora_hasta = $hora_hasta;
    }
    public function setEstadoTienda($estado) {
        $this->estadoTienda = $estado;
    }
    public function setDireccionTienda($direccion) {
        $this->direccion = $direccion;
    }
    public function setDuenio($objetoPersona) {
        $this->personaDuenio = $objetoPersona;
    }

    public function dentroHorarioAtencion($hora, $minutos) {
        $tiendaAbierta = null;
        $horaDeApertura = $this->getHoraDesde()["hora"];
        $minutosDeApertura = $this->getHoraDesde()["minutos"];
        $horaDeCierre = $this->getHoraHasta()["hora"];
        $minutosDeCierre = $this->getHoraHasta()["minutos"];
        if ($hora > $horaDeApertura && $hora < $horaDeCierre) {
            $tiendaAbierta = true;
        }
        elseif ($hora === $horaDeApertura && $minutos >= $minutosDeApertura) {
            $tiendaAbierta = true;
        }
        elseif ($hora === $horaDeCierre && $minutos < $minutosDeCierre) {
            $tiendaAbierta = true;
        }
        else {
            $tiendaAbierta = false;
        }
        return $tiendaAbierta;
    }

    public function abrirDisquera($hora, $minutos) {
        $dentroDeHorarioDeAtencion = $this->dentroHorarioAtencion($hora, $minutos);
        if ($dentroDeHorarioDeAtencion) {
            $this->setEstadoTienda(true);
        }
    }

    public function cerrarDisquera($hora, $minutos) {
        $dentroDeHorarioDeAtencion = $this->dentroHorarioAtencion($hora, $minutos);
        if (!$dentroDeHorarioDeAtencion) {
            $this->setEstadoTienda(false);
        }
    }

    public function __toString()
    {
        $estadoTienda = $this->getEstadoTienda();
        $cadenaEstadoTienda = $estadoTienda ? "La tienda se encuentra abierta" : "La tienda se encuentra cerrada";
        return "Horario de atención:\nHora de apertura: " . $this->getHoraDesde()["hora"] . ":" . $this->getHoraDesde()["minutos"] . " hs\nHora de cierre: " . $this->getHoraHasta()["hora"] . ":" . $this->getHoraHasta()["minutos"] . " hs\n" . $cadenaEstadoTienda . "\nDirección de la tienda: " . $this->getDireccionTienda() . "\nDueño de la tienda: " . $this->getDuenio()->getNombre() . " " . $this->getDuenio()->getApellido() . "\n";
    }

}


?>