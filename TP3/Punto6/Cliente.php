<?php

class Cliente {
    
    private $tipoDoc;
    private $numDoc;
    private $nombre;
    private $apellido;

    public function __construct($tipoDoc, $numDoc, $nombre, $apellido)
    {
        $this->tipoDoc = $tipoDoc;
        $this->numDoc = $numDoc;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public function getTipoDoc() {
        return $this->tipoDoc;
    }
    public function getNumDoc() {
        return $this->numDoc;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }

    public function setTipoDoc($tipoDoc) {
        $this->tipoDoc = $tipoDoc;
    }
    public function setNumDoc($numDoc) {
        $this->numDoc = $numDoc;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function __toString()
    {
        return "Tipo de documento: " . $this->getTipoDoc() . "\nNúmero de documento: " . $this->getNumDoc() . "\nNombre: " . $this->getNombre() . "\nApellido: " . $this->getApellido();
    }

}

?>