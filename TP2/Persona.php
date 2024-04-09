<?php

class Persona {
    
    private $nombre;
    private $apellido;
    private $tipoDeDocumento;
    private $numeroDeDocumento;

    public function __construct($nombre, $apellido, $tipo, $numDocumento)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipoDeDocumento = $tipo;
        $this->numeroDeDocumento = $numDocumento;
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getTipoDeDocumento() {
        return $this->tipoDeDocumento;
    }
    public function getNumeroDeDocumento() {
        return $this->numeroDeDocumento;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function setTipoDeDocumento($tipo) {
        $this->tipoDeDocumento = $tipo;
    }
    public function setNumeroDeDocumento($numDocumento) {
        $this->numeroDeDocumento = $numDocumento;
    }
    
    public function __toString()
    {
        return $this->getNombre() . " " . $this->getApellido() . "\nTipo de documento: " . $this->getTipoDeDocumento() . "\nNúmero de documento: " . $this->getNumeroDeDocumento() . "\n";
    }

}

?>