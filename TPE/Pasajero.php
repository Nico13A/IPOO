<?php

class Pasajero {
    
    private $nombre;
    private $apellido;
    private $numeroDocumento;
    private $telefono;

    public function __construct($nombre, $apellido, $dni, $telefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numeroDocumento = $dni;
        $this->telefono = $telefono;
    }

    public function getNombrePasajero() {
        return $this->nombre;
    }
    public function getApellidoPasajero() {
        return $this->apellido;
    }
    public function getDniPasajero() {
        return $this->numeroDocumento;
    }
    public function getTelefonoPasajero() {
        return $this->telefono;
    }

    public function setNombrePasajero($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellidoPasajero($apellido) {
        $this->apellido = $apellido;
    }
    public function setDniPasajero($dni) {
        $this->numeroDocumento = $dni;
    }
    public function setTelefonoPasajero($telefono) {
        $this->telefono = $telefono;
    }

    public function __toString()
    {
        return "Nombre del pasajero: " . $this->getNombrePasajero() . " " . $this->getApellidoPasajero() . "\nNúmero de documento: " . $this->getDniPasajero() . "\nTeléfono del pasajero: " . $this->getTelefonoPasajero() . "\n";
    }

}


?>