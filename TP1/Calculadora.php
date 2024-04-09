<?php

class Calculadora {

    private $primerNumero;
    private $segundoNumero;

    public function __construct($primerNumero, $segundoNumero) {
        if (is_numeric($primerNumero) && is_numeric($segundoNumero)) {
            $this->primerNumero = $primerNumero;
            $this->segundoNumero = $segundoNumero;
        } else {
            throw new ErrorException($primerNumero . " y " . $segundoNumero . " deben ser valores númericos");
        }
    }

    public function getPrimerNumero() {
        return $this->primerNumero;
    }
    public function getSegundoNumero() {
        return $this->segundoNumero;
    }

    public function setPrimerNumero($unNumero) {
        $this->primerNumero = $unNumero;
    }
    public function setSegundoNumero($unNumero) {
        $this->segundoNumero = $unNumero;
    }

    public function sumar() {
        $suma = $this->getPrimerNumero() + $this->getSegundoNumero();
        return $suma;
    }

    public function restar() {
        $resta = $this->getPrimerNumero() - $this->getSegundoNumero();
        return $resta;
    }

    public function multiplicar() {
        $multiplicacion = $this->getPrimerNumero() * $this->getSegundoNumero();
        return $multiplicacion;
    }

    public function dividir() {
        if ($this->getSegundoNumero() !== 0) {
            $division = round(($this->getPrimerNumero() / $this->getSegundoNumero()), 2); 
        } else {
            $division = "Error: No se puede dividir por cero.";
        }
        return $division;
    }

    public function __toString() {
        return "Número 1: " . $this->getPrimerNumero() . "\nNúmero 2: " . $this->getSegundoNumero() . "\n";
    }

    public function __destruct()
    {
        echo $this . "Instancia destruida, no hay referencias a este objeto.\n";
    }

}

?>