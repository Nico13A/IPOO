<?php

/*
Se desea implementar una clase Lectura que almacena información sobre la lectura de un 
determinado libro.
Esta clase tiene como variable instancia un referencia a un objeto Libro y el número 
de la página que se esta leyendo. 

Por otro lado la clase contiene los siguientes métodos:
a) Método constructor _ _construct() que recibe como parámetros los valores iniciales 
para los atributos de la clase.
b) Los métodos de acceso de cada uno de los atributos de la clase.
c) siguientePagina(): método que retorna la página del libro y actualiza la variable 
que contiene la pagina actual.
d) retrocederPagina(): método que retorna la página anterior a la actual del libro y 
actualiza su valor.
e) irPagina(x): método que retorna la página actual y setea como página actual al valor 
recibido por parámetro.
f) Redefinir el método _ _toString() para que retorne la información de los atributos de 
la clase.
g) Crear un script Test_Lectura que cree un objeto Lectura e invoque a cada uno de los métodos
implementados.
*/

class Lectura {
    private $objetoLibro;
    private $paginaQueSeEstaLeyendo;

    public function __construct($objetoLibro, $paginaActual)
    {
        $this->objetoLibro = $objetoLibro;
        $this->paginaQueSeEstaLeyendo = $paginaActual;
    }

    public function getLibro() {
        return $this->objetoLibro;
    }
    public function getPaginaActual() {
        return $this->paginaQueSeEstaLeyendo;
    }

    public function setLibro($unObjetoLibro) {
        $this->objetoLibro = $unObjetoLibro;
    }
    public function setPaginaActual($paginaActual) {
        $this->paginaQueSeEstaLeyendo = $paginaActual;
    }

    public function siguientePagina() {
        $paginaActual = $this->getPaginaActual();
        if ($paginaActual < $this->getLibro()->getCantidadPaginas()) {
            $this->setPaginaActual($paginaActual + 1);
        }
        return $this->getPaginaActual();
    }

    public function retrocederPagina() {
        $paginaActual = $this->getPaginaActual();
        if ($paginaActual > 1) {
            $this->setPaginaActual($paginaActual - 1);
        }
        return $this->getPaginaActual();
    }

    public function irPagina($unaPagina) {
        if ($unaPagina > 0 && $unaPagina <= $this->getLibro()->getCantidadPaginas()) {
            $this->setPaginaActual($unaPagina);
        }
        return $this->getPaginaActual();
    }

    public function __toString()
    {
        return "Libro:\n" . $this->getLibro() . "Página que se esta leyendo: " . $this->getPaginaActual() . "\n";
    }

}

?>