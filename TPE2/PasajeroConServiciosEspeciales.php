<?php

class PasajeroConServiciosEspeciales extends Pasajero{
    
    private $sillaDeRuedas;
    private $asistencia;
    private $comidaEspecial;

    public function __construct($nombre, $apellido, $dni, $telefono, $nroAsiento, $nroTicket, $sillaDeRuedas, $asistencia, $comidaEspecial)
    {
        parent::__construct($nombre, $apellido, $dni, $telefono, $nroAsiento, $nroTicket);
        $this->sillaDeRuedas = $sillaDeRuedas;
        $this->asistencia = $asistencia;
        $this->comidaEspecial = $comidaEspecial;
    }

    public function getSillaDeRuedas()
    {
        return $this->sillaDeRuedas;
    }
    public function getAsistencia()
    {
        return $this->asistencia;
    }
    public function getComidaEspecial()
    {
        return $this->comidaEspecial;
    }

    public function setSillaDeRuedas($sillaDeRuedas)
    {
        $this->sillaDeRuedas = $sillaDeRuedas;
    }
    public function setAsistencia($asistencia)
    {
        $this->asistencia = $asistencia;
    }
    public function setComidaEspecial($comidaEspecial)
    {
        $this->comidaEspecial = $comidaEspecial;
    }

    public function darPorcentajeIncremento() {
        $porcentajeIncremento = parent::darPorcentajeIncremento();
        if ($this->getSillaDeRuedas() && $this->getAsistencia() && $this->getComidaEspecial()) {
            $porcentajeIncremento += 20;
        }
        else if ($this->getSillaDeRuedas() || $this->getAsistencia() || $this->getComidaEspecial()) {
            $porcentajeIncremento += 5;
        }
        return $porcentajeIncremento;
    }

    public function modificar($nombre = null, $apellido = null, $telefono = null, $sillaDeRuedas = null, $asistencia = null, $comidaEspecial = null)
    {
        parent::modificar($nombre, $apellido, $telefono);
        if (is_bool($sillaDeRuedas)) {
            //echo "Se va a modificar la silla de ruedas.\n";
            $this->setSillaDeRuedas($sillaDeRuedas);
        }
        if (is_bool($asistencia)) {
            //echo "Se va a modificar la asistencia.\n";
            $this->setAsistencia($asistencia);
        }
        if (is_bool($comidaEspecial)) {
            //echo "Se va a modificar la comida especial.\n";
            $this->setComidaEspecial($comidaEspecial);
        }
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena .= "Servicios especiales:\n" . ($this->getSillaDeRuedas() ? "Requiere silla de ruedas." : "No requiere silla de ruedas.") . "\n" . ($this->getAsistencia() ? "Requiere asistencia de embarque o desembarque." : "No requiere asistencia de embarque o desembarque.") . "\n" . ($this->getComidaEspecial() ? "Requiere comida especial." : "No requiere comida especial.") . "\n";
        return $cadena;
    }

}

?>