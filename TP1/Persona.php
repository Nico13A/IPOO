<?php
class Persona {
    private $nombre;
    private $apellido;
    private $edad;
    private $genero;
    private $altura;
    private $peso;

    public function __construct($nombre, $apellido, $edad, $genero, $altura, $peso) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        $this->genero = $genero;
        $this->altura = $altura;
        $this->peso = $peso;
    }

    // GETTERS
    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getEdad() {
        return $this->edad;
    } 
    public function getGenero() {
        return $this->genero;
    }
    public function getAltura() {
        return $this->altura;
    }
    public function getPeso() {
        return $this->peso;
    }

    // SETTERS
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function setEdad($edad) {
        $this->edad = $edad;
    }
    public function setGenero($genero) {
        $this->genero = $genero;
    }
    public function setAltura($altura) {
        $this->altura = $altura;
    }
    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function calcular_imc() {
        // Fórmula del Índice de Masa Corporal (IMC): peso (kg) / altura^2 (m^2)
        $imc = $this->getPeso() / ($this->getAltura() * $this->getAltura());
        return $imc;
    }

    public function cumplir_anios() {
        $this->setEdad($this->getEdad() + 1);
        return "¡Feliz cumpleaños, " . $this->getNombre() . "! Ahora tienes " . $this->getEdad() . " años.\n";
    }

    public function __toString(){
		return "Soy ". $this->getNombre() . " " . $this->getApellido() . " tengo " . $this->getEdad() . ", soy " . $this->getGenero() . ", mido " . $this->getAltura() . "m y peso " . $this->getPeso() . "kg.\n";
	}
	
	public function __destruct(){
		echo $this . " instancia destruida, no hay referencias a este objeto.\n";
	}

}

?>