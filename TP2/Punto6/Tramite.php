<?php

class Tramite {
    
    private $tipo;
    private $horario_creacion;
    private $horario_resolucion;

    public function __construct($tipoTramite, $horario_creacion, $horario_resolucion)
    {
        $this->tipo = $tipoTramite;
        $this->horario_creacion = $horario_creacion;
        $this->horario_resolucion = $horario_resolucion;
    }

    public function getTipoTramite() {
        return $this->tipo;
    }
    public function getHorarioCreacion() {
        return $this->horario_creacion;
    }
    public function getHorarioResolucion() {
        return $this->horario_resolucion;
    }

    public function setTipoTramite($tipoTramite) {
        $this->tipo = $tipoTramite;
    }
    public function setHorarioCreacion($horario_creacion) {
        $this->horario_creacion = $horario_creacion;
    }
    public function setHorarioResolucion($horario_resolucion) {
        $this->horario_resolucion = $horario_resolucion;
    }

    public function __toString()
    {
        return "Tipo de trámite: " . $this->getTipoTramite() . "\nHorario de creación: " . $this->getHorarioCreacion() . "\nHorario de resolución: " . $this->getHorarioResolucion() . "\n";
    }

}

?>