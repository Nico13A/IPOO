<?php

class LecturaModificado {

    private $librosLeidos = [];

    public function __construct($arrayObjetosLibros)
    {
        $this->librosLeidos = $arrayObjetosLibros;
    }

    public function getLibrosLeidos() {
        return $this->librosLeidos;
    }
    
    public function setLibrosLeidos($librosLeidos) {
        $this->librosLeidos = $librosLeidos;
    }

    public function libroLeido($titulo) {
        $libroFueLeido = false;
        $librosLeidos = $this->getLibrosLeidos();
        $contador = 0;
        while (!$libroFueLeido && $contador < count($librosLeidos)) {
            $libro = $librosLeidos[$contador];
            if ($libro->getTituloLibro() === $titulo) {
                $libroFueLeido = true;
            }
            $contador++;
        }
        return $libroFueLeido;
    }

    public function darSinopsis($titulo) {
        $sinopsisDelLibro = null;
        $librosLeidos = $this->getLibrosLeidos();
        $contador = 0;
        while (!$sinopsisDelLibro && $contador < count($librosLeidos)) {
            $libro = $librosLeidos[$contador];
            if ($libro->getTituloLibro() === $titulo) {
                $sinopsisDelLibro = $libro->getSinopsisLibro();
            }
            $contador++;
        }
        return $sinopsisDelLibro;
    }

    public function leidosAnioEdicion($anio) {
        $leidosEnAnio = [];
        $librosLeidos = $this->getLibrosLeidos();
        foreach ($librosLeidos as $libro) {
            if ($libro->getAnioEdicion() === $anio) {
                $leidosEnAnio[] = $libro;
            }
        }
        return $leidosEnAnio;
    }

    public function darLibrosPorAutor($nombreAutor) {
        $leidosPorAutor = [];
        $librosLeidos = $this->getLibrosLeidos();
        foreach ($librosLeidos as $libro) {
            $nombreDelAutor = $libro->getPersonaAutor()->getNombre() . " " . $libro->getPersonaAutor()->getApellido();
            if ($nombreDelAutor === $nombreAutor) {
                $leidosPorAutor[] = $libro;
            }
        }
        return $leidosPorAutor;
    }

    public function mostrarArregloDeLibrosLeidos($librosLeidos) {
        $cadena = "";
        foreach ($librosLeidos as $libro) {
            $cadena .= $libro->getTituloLibro() . "\n";
        }
        return $cadena;
    }

    public function __toString()
    {
        return $this->mostrarArregloDeLibrosLeidos($this->getLibrosLeidos());
    }

}

?>