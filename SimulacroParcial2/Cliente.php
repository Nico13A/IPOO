<?php

class Cliente {
    private $nombre;
    private $apellido;
    private $estado;
    private $tipoDocumento;
    private $numeroDocumento;

    public function __construct($nombre, $apellido, $estado, $tipoDocumento, $numeroDocumento)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->estado = $estado;
        $this->tipoDocumento = $tipoDocumento;
        $this->numeroDocumento = $numeroDocumento;
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getEstado() {
        return $this->estado;
    }
    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }
    public function getNumeroDocumento() {
        return $this->numeroDocumento;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function setEstado($estado) {
        $this->estado = $estado;
    }
    public function setTipoDocumento($tipoDocumento) {
        $this->tipoDocumento = $tipoDocumento;
    }
    public function setNumeroDocumento($numeroDocumento) {
        $this->numeroDocumento = $numeroDocumento;
    }

    public function __toString()
    {
        $cadena = $this->getEstado() ? "Activo\n" : "Dado de baja\n";
        return "Nombre: " . $this->getNombre() . " " . $this->getApellido(). "\nEstado: " . $cadena . "Tipo de documento: " . $this->getTipoDocumento() . "\nNúmero de documento: " . $this->getNumeroDocumento() . "\n";
    }
}


?>