<?php

class ResponsableV {

    private $numeroDeEmpleado;
    private $numeroDeLicencia;
    private $nombre;
    private $apellido;

    public function __construct($nroEmpleado, $nroLicencia, $nombre, $apellido)
    {
        $this->numeroDeEmpleado = $nroEmpleado;
        $this->numeroDeLicencia = $nroLicencia;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public function getNroEmpleado() {
        return $this->numeroDeEmpleado;
    }
    public function getNroLicencia() {
        return $this->numeroDeLicencia;
    }
    public function getNombreResponsableV() {
        return $this->nombre;
    }
    public function getApellidoResponsableV() {
        return $this->apellido;
    }

    public function setNroEmpleado($nroEmpleado) {
        $this->numeroDeEmpleado = $nroEmpleado;
    }
    public function setNroLicencia($nroLicencia) {
        $this->numeroDeLicencia = $nroLicencia;
    }
    public function setNombreResponsableV($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellidoResponsableV($apellido) {
        $this->apellido = $apellido;
    }

    public function __toString()
    {
        return "Nombre del responsable del viaje: " . $this->getNombreResponsableV() . " " . $this->getApellidoResponsableV() . "\nNúmero de empleado: " . $this->getNroEmpleado() . "\nNúmero de licencia: " . $this->getNroLicencia() . "\n";
    }

}

?>