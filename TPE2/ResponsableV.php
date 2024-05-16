<?php

class ResponsableV extends Persona { 

    private $numeroDeEmpleado;
    private $numeroDeLicencia;

    public function __construct($nroEmpleado, $nroLicencia, $nombre, $apellido, $nroDoc, $telefono)
    {
        $this->numeroDeEmpleado = $nroEmpleado;
        $this->numeroDeLicencia = $nroLicencia;
        parent::__construct($nombre, $apellido, $nroDoc, $telefono);
    }

    public function getNroEmpleado() {
        return $this->numeroDeEmpleado;
    }
    public function getNroLicencia() {
        return $this->numeroDeLicencia;
    }

    public function setNroEmpleado($nroEmpleado) {
        $this->numeroDeEmpleado = $nroEmpleado;
    }
    public function setNroLicencia($nroLicencia) {
        $this->numeroDeLicencia = $nroLicencia;
    }

    public function __toString()
    {
        $cadena = parent::__toString();
        $cadena .= "Número de empleado: " . $this->getNroEmpleado() . "\nNúmero de licencia: " . $this->getNroLicencia() . "\n";
        return $cadena;
    }

}

?>