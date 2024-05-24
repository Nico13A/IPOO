<?php

class PartidoBasquet extends Partido {
    private $infracciones;
    private $coefPenalizacion;
    
    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2,$cantGolesE2, $infracciones)
    {
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->infracciones = $infracciones;
        $this->coefPenalizacion = 0.75;
    }

    public function getInfracciones()
    {
        return $this->infracciones;
    }
    public function setInfracciones($infracciones)
    {
        $this->infracciones = $infracciones;
    }

    public function getCoefPenalizacion()
    {
        return $this->coefPenalizacion;
    }
    public function setCoefPenalizacion($coefPenalizacion)
    {
        $this->coefPenalizacion = $coefPenalizacion;
    }

    /*
    Implementar el método coeficientePartido() en la clase Partido el cual retorna el 
    valor obtenido por el coeficiente base, 
    multiplicado por la cantidad de goles y la cantidad de jugadores. 
    Redefinir dicho método según corresponda.

    Por otro lado, si se trata de un partido de basquetbol  se almacena la cantidad 
    de infracciones de manera tal que al coeficiente base se debe restar un coeficiente de 
    penalización, cuyo valor por defecto es: 0.75, * (por) la cantidad de infracciones. 
    
    Es decir: coef  = coeficiente_base_partido  - (coef_penalización*cant_infracciones);
    */
    public function coeficientePartido() {
        $coefPartido = parent::coeficientePartido();
        if ($this->getInfracciones() > 0) {
            $coefAplicado = $this->getCoefBase() - ($this->getCoefPenalizacion() * $this->getInfracciones());
            $coefPartido = $coefAplicado * ($this->getCantGolesE1() + $this->getCantGolesE2()) * ($this->getObjEquipo1()->getCantJugadores() + $this->getObjEquipo2()->getCantJugadores());
        }
        return $coefPartido;
    }

    public function __toString()
    {
        $cadena = "---- Partido de basquetbol ----\n";
        $cadena = parent::__toString();
        $cadena .= "Infracciones: " . $this->getInfracciones() . "\n";
        return $cadena;
    }
}

?>