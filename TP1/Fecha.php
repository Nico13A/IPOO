<?php

class Fecha {
    
    private $dia;
    private $mes;
    private $anio;
    private static $nombre_meses = [1 => "enero", 2 => "febrero", 3 => "marzo", 4 => "abril", 5 => "mayo", 6 => "junio", 7 => "julio", 8 => "agosto", 9 => "septiembre", 10 => "octubre", 11 => "noviembre", 12 => "diciembre"];
    private $diasDeLosMeses;

    public function __construct($dia, $mes, $anio)
    {
        $this->diasDeLosMeses = ["enero" => 31, "febrero" => self::esBisiesto($anio) ? 29 : 28, "marzo" => 31, "abril" => 30, "mayo" => 31, "junio" => 30, "julio" => 31, "agosto" => 31, "septiembre" => 30, "octubre" => 31, "noviembre" => 30, "diciembre" => 31];

        if (!is_numeric($dia) || !is_numeric($mes) || !is_numeric($anio)) {
            throw new ErrorException($dia . ", " . $mes . " y " . $anio . " deben ser valores enteros");
        }
        elseif ($dia <= 0 || $dia > $this->diasDeLosMeses[self::$nombre_meses[$mes]]) {
            throw new ErrorException("Debe ingresar un día válido");
        }
        elseif ($mes <= 0 || $mes > 12) {
            throw new ErrorException("Debe ingresar un mes válido");
        }
        elseif ($anio <= 0) {
            throw new ErrorException("Debe ingresar un año válido");
        }
        else {
            $this->dia = $dia;
            $this->mes = $mes;
            $this->anio = $anio;
        }
    }

    public function getDia() {
        return $this->dia;
    }
    public function getMes() {
        return $this->mes;
    }
    public function getAnio() {
        return $this->anio;
    }

    public function setDia($dia) {
        $this->dia = $dia;
    }
    public function setMes($mes) {
        $this->mes = $mes;
    }
    public function setAnio($anio) {
        $this->anio = $anio;
    }

    public static function esBisiesto($anio) {
        return ($anio % 4 === 0 && ($anio % 100 !== 0 || $anio % 400 === 0));
    }

    public function incrementa_un_dia() {
        $dia = $this->getDia();
        $mes =  $this->getMes();
        $anio = $this->getAnio();
        $nombreMes = self::$nombre_meses[$mes];
        if ($dia < $this->diasDeLosMeses[$nombreMes]) {
            $this->setDia($dia + 1);
        } else {
            $this->setDia(1);
            if ($mes < 12) {
                $this->setMes($mes + 1);
            } else {
                $this->setMes(1);
                $this->setAnio($anio + 1);
            }
        }
    }

    public function incremento($numeroEntero, $fecha) {
        $dia = $fecha->getDia();
        $mes = $fecha->getMes();
        $anio = $fecha->getAnio();
        $nuevaFecha = new Fecha($dia, $mes, $anio);
        for ($i=0; $i < $numeroEntero; $i++) { 
            $nuevaFecha->incrementa_un_dia();
        }
        return $nuevaFecha;
    }

    public function __toString()
    {
        return "Fecha abreviada: (" . $this->getDia() . "/" . sprintf("%02d", $this->getMes()) . "/" . $this->getAnio() . ")\nFecha extendida: " . $this->getDia() . " de " . self::$nombre_meses[$this->getMes()] . " de " . $this->getAnio() . "\n";
    }

    public function __destruct()
    {
        echo $this . "Instancia destruida, no hay referencias a este objeto.\n";
    }

}


?>