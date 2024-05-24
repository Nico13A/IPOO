<?php

class PartidoFutbol extends Partido {
    private $coefMenores;
    private $coefJuveniles;
    private $coefMayores;

    // CONSTRUCTOR
    public function __construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2,$cantGolesE2) {
        parent::__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2, $cantGolesE2);
        $this->coefMenores = 0.13;
        $this->coefJuveniles = 0.19;
        $this->coefMayores = 0.27;
    }

    // GETTERS Y SETTERS
    public function getCoefMenores()
    {
        return $this->coefMenores;
    }
    public function setCoefMenores($coefMenores)
    {
        $this->coefMenores = $coefMenores;
    }

    public function getCoefJuveniles()
    {
        return $this->coefJuveniles;
    }
    public function setCoefJuveniles($coefJuveniles)
    {
        $this->coefJuveniles = $coefJuveniles;
    }

    public function getCoefMayores()
    {
        return $this->coefMayores;
    }
    public function setCoefMayores($coefMayores)
    {
        $this->coefMayores = $coefMayores;
    }

    /*
    Implementar el método coeficientePartido() en la clase Partido el cual retorna el 
    valor obtenido por el coeficiente base, 
    multiplicado por la cantidad de goles y la cantidad de jugadores. 
    Redefinir dicho método según corresponda.

    Si se trata de un partido de fútbol, se deben gestionar el valor de 3 coeficientes 
    que serán aplicados según la categoría del partido 
    (coef_Menores,coef_juveniles,coef_Mayores).
    */
    public function coeficientePartido() {
        $coefPartido = parent::coeficientePartido();
        $coefAplicado = null;
        $categoriaE1 = $this->getObjEquipo1()->getObjCategoria()->getDescripcion();
        if ($categoriaE1 == "Menores") {
            $coefAplicado = $this->getCoefMenores();
        }
        elseif ($categoriaE1 == "Juvenil") {
            $coefAplicado = $this->getCoefJuveniles();
        }
        elseif ($categoriaE1 == "Mayores") {
            $coefAplicado = $this->getCoefMayores();
        }
        if ($coefAplicado != null) {
            $coefPartido *= $coefAplicado;
        }
        return $coefPartido;
    }

    public function __toString()
    {
        $cadena = "---- Partido de fútbol ----\n";
        $cadena = parent::__toString();
        return $cadena;
    }

}


?>