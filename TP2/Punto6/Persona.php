<?php

class Persona {
    
    private $nombre;
    private $apellido;
    private $tipoDeDocumento;
    private $numeroDeDocumento;
    private $objTramite; // Tipo de trámite

    public function __construct($nombre, $apellido, $tipo, $numDocumento, $objTramite)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipoDeDocumento = $tipo;
        $this->numeroDeDocumento = $numDocumento;
        $this->objTramite = $objTramite;
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
    public function getObjTramite() {
        return $this->objTramite;
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
    public function setObjTramite($objTramite) {
        $this->objTramite = $objTramite;
    }
    
    public function __toString()
    {
        return $this->getNombre() . " " . $this->getApellido() . "\nTipo de documento: " . $this->getTipoDeDocumento() . "\nNúmero de documento: " . $this->getNumeroDeDocumento() . "\nTipo de trámite a realizar: " . $this->getObjTramite()->getTipoTramite() . "\n";
    }

}

?>