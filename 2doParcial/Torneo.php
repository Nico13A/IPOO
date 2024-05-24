<?php

class Torneo {
    private $coleccionPartidos;
    private $importePremio;

    public function __construct($importePremio)
    {
        $this->coleccionPartidos = [];
        $this->importePremio = $importePremio;
    }

    public function getColeccionPartidos()
    {
        return $this->coleccionPartidos;
    }
    public function setColeccionPartidos($coleccionPartidos)
    {
        $this->coleccionPartidos = $coleccionPartidos;
    }

    public function getImportePremio()
    {
        return $this->importePremio;
    }
    public function setImportePremio($importePremio)
    {
        $this->importePremio = $importePremio;
    }

    /*
    Implementar el método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) 
    en la  clase Torneo el cual recibe por parámetro 2 equipos, la fecha en la que se 
    realizará el partido y si se trata de un partido de futbol o basquetbol . 
    
    El método debe crear y retornar la instancia de la clase Partido que corresponda y 
    almacenarla en la colección de partidos del Torneo. 
    
    Se debe chequear que los 2 equipos tengan la misma categoría e igual cantidad de jugadores, 
    caso contrario no podrá ser registrado ese partido en el torneo. 
    */
    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido) {
        $objPartido = null;
        if ($objEquipo1->getCantJugadores() == $objEquipo2->getCantJugadores() && $objEquipo1->getObjCategoria()->getDescripcion() == $objEquipo2->getObjCategoria()->getDescripcion()) {
            $coleccionPartidos = $this->getColeccionPartidos();
            if (count($coleccionPartidos) > 0) {
                $idUltimoPartido = $coleccionPartidos[count($coleccionPartidos)-1]->getIdpartido();
            }
            else {
                $idUltimoPartido = 0;
            }
            if ($tipoPartido == "Futbol") {
                $objPartido = new PartidoFutbol($idUltimoPartido+1, $fecha, $objEquipo1, 0, $objEquipo2, 0);
            }
            elseif ($tipoPartido == "Basquetbol") {
                $objPartido = new PartidoBasquet($idUltimoPartido+1, $fecha, $objEquipo1, 0, $objEquipo2, 0, 0);
            }
        }
        if ($objPartido != null) {
            $coleccionPartidos[] = $objPartido;
            $this->setColeccionPartidos($coleccionPartidos);
        }
        return $objPartido;
    }

    /*
    Implementar el método darGanadores($deporte) en la clase Torneo que recibe por parámetro 
    si se trata de un partido de fútbol o de básquetbol y en  base  al parámetro busca 
    entre esos partidos los equipos ganadores (equipo con mayor cantidad de goles). 
    El método retorna una colección con los objetos de los equipos encontrados.
    */
    public function darGanadores($deporte) {
        $equiposGanadores = [];
        $coleccionPartidos = $this->getColeccionPartidos();
        foreach ($coleccionPartidos as $objPartido) {
            if (($objPartido instanceof PartidoFutbol && $deporte == "futbol") || ($objPartido instanceof PartidoBasquet && $deporte == "basquet")) {
                $objEquipoGanador = $objPartido->darEquipoGanador();
                if (!is_array($objEquipoGanador)) {
                    $equiposGanadores[] = $objEquipoGanador;
                }
                else {
                    $equiposGanadores[] = $objEquipoGanador[0];
                    $equiposGanadores[] = $objEquipoGanador[1];
                }
            }
        }
        return $equiposGanadores;
    }

    /*
    Implementar el método calcularPremioPartido($OBJPartido) que debe retornar un arreglo 
    asociativo donde una de sus claves es ‘equipoGanador’  y 
    contiene la referencia al equipo ganador; y la otra clave es ‘premioPartido’
    que contiene el valor obtenido del coeficiente del Partido por el importe configurado 
    para el torneo. (premioPartido = Coef_partido * ImportePremio)
    */
    public function calcularPremioPartido($objPartido) {
        $equipoGanador = $objPartido->darEquipoGanador();
        $premioPartido = $this->getImportePremio() * $objPartido->coeficientePartido();
        $premio = [
            "equipoGanador" => $equipoGanador,
            "premioPartido" => $premioPartido
        ];
        return $premio;
    }

    private function mostrarColeccion() {
        $cadena = "";
        $coleccionPartidos = $this->getColeccionPartidos();
        foreach ($coleccionPartidos as $objPartido) {
            $cadena .= $objPartido;
        }
        return $cadena;
    }

    public function __toString()
    {
        return "Partidos:\n" . $this->mostrarColeccion() . "Importe premio del partido: " . $this->getImportePremio() . "\n";
    }

}

?>