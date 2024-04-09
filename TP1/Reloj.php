<?php

class Reloj {
    private $horas;
    private $minutos;
    private $segundos;

    public function __construct($horas, $minutos, $segundos)
    {
        $this->horas = $horas;
        $this->minutos = $minutos;
        $this->segundos = $segundos;
    }

    public function getHoras() {
        return $this->horas;
    }
    public function getMinutos() {
        return $this->minutos;
    }
    public function getSegundos() {
        return $this->segundos;
    }

    public function setHoras($horas) {
        $this->horas = $horas;
    }
    public function setMinutos($minutos) {
        $this->minutos = $minutos;
    }
    public function setSegundos($segundos) {
        $this->segundos = $segundos;
    }

    public function puesta_a_cero() {
        $this->setHoras(0);
        $this->setMinutos(0);
        $this->setSegundos(0);
    }

    public function incremento() {
        $hora = $this->getHoras();
        $minuto = $this->getMinutos();
        $segundo = $this->getSegundos();
        if ($segundo < 59) {
            $this->setSegundos($segundo+1);
        }
        else {
            $this->setSegundos(0);
            if ($minuto < 59) {
                $this->setMinutos($minuto+1);
            }
            else {
                $this->setMinutos(0);
                $hora < 23 ? $this->setHoras($hora+1) : $this->setHoras(0);
            }
        }
    }
    
    public function __toString()
    {
        return "(" . sprintf("%02d", $this->getHoras()) . ":" . sprintf("%02d", $this->getMinutos()) . ":" . sprintf("%02d", $this->getSegundos()) . ")\n";
    }

    public function __destruct()
    {
        echo $this . "Instancia destruida, no hay referencias a este objeto.\n";
    }

}

?>