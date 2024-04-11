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

    public function getNombreCliente() {
        return $this->nombre;
    }
    public function getApellidoCliente() {
        return $this->apellido;
    }
    public function getEstadoCliente() {
        return $this->estado;
    }
    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }
    public function getNumeroDocumento() {
        return $this->numeroDocumento;
    }

    public function setNombreCliente($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellidoCliente($apellido) {
        $this->apellido = $apellido;
    }
    public function setEstadoCliente($estado) {
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
        $cadena = $this->getEstadoCliente() ? "Activo\n" : "Dado de baja\n";
        return "Nombre: " . $this->getNombreCliente() . " " . $this->getApellidoCliente(). "\nEstado: " . $cadena . "Tipo de documento: " . $this->getTipoDocumento() . "\nNúmero de documento: " . $this->getNumeroDocumento() . "\n";
    }
}
/*
$objetoCliente = new Cliente("Marco", "Reus", false, "DNI", "41050862");
echo $objetoCliente;
*/
?>