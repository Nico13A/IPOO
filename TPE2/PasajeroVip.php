<?php

class PasajeroVip extends Pasajero{
    
    private $nroViajeroFrecuente;
    private $cantMillas;

    public function __construct($nombre, $apellido, $dni, $telefono, $nroAsiento, $nroTicket, $nroViajeroFrecuente, $cantMillas)
    {
        parent::__construct($nombre, $apellido, $dni, $telefono, $nroAsiento, $nroTicket);
        $this->nroViajeroFrecuente = $nroViajeroFrecuente;
        $this->cantMillas = $cantMillas;
    }
 
    public function getNroViajeroFrecuente()
    {
        return $this->nroViajeroFrecuente;
    }
    public function getCantMillas()
    {
        return $this->cantMillas;
    }

    public function setNroViajeroFrecuente($nroViajeroFrecuente)
    {
        $this->nroViajeroFrecuente = $nroViajeroFrecuente;
    }
    public function setCantMillas($cantMillas)
    {
        $this->cantMillas = $cantMillas;
    }

    public function darPorcentajeIncremento() {
        $porcentajeIncremento = parent::darPorcentajeIncremento();
        if ($this->getCantMillas()>300) {
            $porcentajeIncremento += 20;
        }
        else {
            $porcentajeIncremento += 25;
        }
        return $porcentajeIncremento;
    }

    public function modificar($nombre = null, $apellido = null, $telefono = null, $nroViajeroFrecuente = null, $cantMillas = null)
    {
        parent::modificar($nombre, $apellido, $telefono);
        if ($nroViajeroFrecuente != null) {
            $this->setNroViajeroFrecuente($nroViajeroFrecuente);
        }
        if ($cantMillas != null) {
            $this->setCantMillas($cantMillas);
        }
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena .= "Número de viajero frecuente: " . $this->getNroViajeroFrecuente() . "\nCantidad de millas del pasajero: " . $this->getCantMillas() . "\n";
        return $cadena;
    }

}

?>