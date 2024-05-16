<?php

class Pasajero extends Persona{
    
    private $nroAsiento;
    private $nroTicket;

    public function __construct($nombre, $apellido, $dni, $telefono, $nroAsiento, $nroTicket)
    {
        parent::__construct($nombre, $apellido, $dni, $telefono);
        $this->nroAsiento = $nroAsiento;
        $this->nroTicket = $nroTicket;
    }

    public function getNroAsiento()
    {
        return $this->nroAsiento;
    }
    public function getNroTicket()
    {
        return $this->nroTicket;
    }

    public function setNroAsiento($nroAsiento)
    {
        $this->nroAsiento = $nroAsiento;
    }
    public function setNroTicket($nroTicket)
    {
        $this->nroTicket = $nroTicket;
    }

    public function darPorcentajeIncremento() {
        $porcentajeIncremento = 10;
        return $porcentajeIncremento;
    }

    public function modificar($nombre = null, $apellido = null, $telefono = null) {
        if ($nombre != null) {
            $this->setNombre($nombre);
        }
        if ($apellido != null) {
            $this->setApellido($apellido);
        }
        if ($telefono != null) {
            $this->setTelefono($telefono);
        }
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena .= "Número de asiento: " . $this->getNroAsiento() . "\nNúmero de ticket: " . $this->getNroTicket() . "\n";
        return $cadena;
    }

}

?>