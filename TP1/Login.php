<?php

class Login {
    private $nombreUsuario;
    private $contrasenia;
    private $fraseParaRecordarContrasenia;
    private $contraseniasUtilizadas = [];

    public function __construct($usuario, $contrasenia, $fraseRecordatoria)
    {
        $this->nombreUsuario = $usuario;
        $this->contrasenia = $contrasenia;
        $this->fraseParaRecordarContrasenia = $fraseRecordatoria;
        $this->contraseniasUtilizadas[] = $contrasenia;
    }

    public function getUsuario() {
        return $this->nombreUsuario;
    }
    public function getContrasenia() {
        return $this->contrasenia;
    }
    public function getFraseRecordatoria() {
        return $this->fraseParaRecordarContrasenia;
    }

    public function setUsuario($usuario) {
        $this->nombreUsuario = $usuario;
    }
    public function setContrasenia($contrasenia) {
        if ($this->validarContrasenia($contrasenia)) {
            //echo "La nueva contraseña no puede ser la misma que la última contraseña utilizada.";
            throw new Exception("La nueva contraseña no puede ser la misma que la última contraseña utilizada.");
        }
        else {
            if (count($this->contraseniasUtilizadas) >= 4) {
                array_shift($this->contraseniasUtilizadas);
            }
            $this->contraseniasUtilizadas[] = $contrasenia; 
            $this->contrasenia = $contrasenia;
        }
    }
    public function setFraseRecordatoria($fraseRecordatoria) {
        $this->fraseParaRecordarContrasenia = $fraseRecordatoria;
    }

    public function validarContrasenia($contrasenia) {
        return in_array($contrasenia, $this->contraseniasUtilizadas);
    }

    public function recordar($usuario) {
        return $this->getUsuario() === $usuario ? $this->getFraseRecordatoria() : "El usuario no esta registrado.";
    }

    public function __toString()
    {
        return "Nombre de usuario: " . $this->getUsuario() . "\nContraseña: " . $this->getContrasenia() . "\nFrase para recordar la contraseña: " . $this->getFraseRecordatoria() . "\n";
    }

    public function __destruct()
    {
        echo $this . "Instancia destruida, no hay referencias a este objeto.\n";
    }

}

?>