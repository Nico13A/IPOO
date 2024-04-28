<?php

class Persona {
    private $tipodocumento;
    private $nrodocumento;
    private $nombre;
    private $apellido;
    private $telefono;

    public function __construct($tipodocumento, $nrodocumento, $nombre, $apellido, $telefono)
    {
        $this->tipodocumento = $tipodocumento;
        $this->nrodocumento = $nrodocumento;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
    }
    
    public function getTipodocumento()
    {
        return $this->tipodocumento;
    }
    public function setTipodocumento($tipodocumento)
    {
        $this->tipodocumento = $tipodocumento;
    }

    public function getNrodocumento()
    {
        return $this->nrodocumento;
    }
    public function setNrodocumento($nrodocumento)
    {
        $this->nrodocumento = $nrodocumento;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }


    public function getApellido()
    {
        return $this->apellido;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function __toString()
    {
        return "Nombre: " . $this->getNombre() . " " . $this->getApellido() . "\nTipo de documento: " . $this->getTipodocumento() . "\nNúmero de documento: " . $this->getNrodocumento() . "\nTeléfono: " . $this->getTelefono() . "\n";
    }

}

?>