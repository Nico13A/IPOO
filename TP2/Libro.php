<?php

class Libro {
    private $ISBN;
    private $titulo;
    private $anioEdicion;
    private $editorial;
    private $personaAutor;
    private $cantidadPaginas;
    private $sinopsisDelLibro;

    public function __construct($ISBN, $titulo, $anioEdicion, $editorial, $personaAutor, $cantidadPaginas, $sinopsis)
    {
        $this->ISBN = $ISBN;
        $this->titulo = $titulo;
        $this->anioEdicion = $anioEdicion;
        $this->editorial = $editorial;
        $this->personaAutor = $personaAutor;
        $this->cantidadPaginas = $cantidadPaginas;
        $this->sinopsisDelLibro = $sinopsis;
    }

    public function getISBN() {
        return $this->ISBN;
    }
    public function getTituloLibro() {
        return $this->titulo;
    }
    public function getAnioEdicion() {
        return $this->anioEdicion;
    }
    public function getEditorial() {
        return $this->editorial;
    }
    public function getPersonaAutor() {
        return $this->personaAutor;
    }
    public function getCantidadPaginas() {
        return $this->cantidadPaginas;
    }
    public function getSinopsisLibro() {
        return $this->sinopsisDelLibro;
    }

    public function setISBN($isbn) {
        $this->ISBN = $isbn;
    }
    public function setTituloLibro($titulo) {
        $this->titulo = $titulo;
    }
    public function setAnioEdicion($anioEdicion) {
        $this->anioEdicion = $anioEdicion;
    }
    public function setEditorial($editorial) {
        $this->editorial = $editorial;
    }
    public function setPersonaAutor($personaAutor) {
        $this->personaAutor = $personaAutor;
    }
    public function setCantidadPaginas($cantidadPaginas) {
        $this->cantidadPaginas = $cantidadPaginas;
    }
    public function setSinopsisLibro($sinopsisDelLibro) {
        $this->sinopsisDelLibro = $sinopsisDelLibro;
    }

    public function perteneceEditorial($editorial) {
        $editorialLibro = $this->getEditorial();
        return $editorialLibro === $editorial;
    }

    public function aniosDesdeEdicion() {
        $anioActual = intval(date("Y"));
        $anioEdicion = intval($this->getAnioEdicion());
        return ($anioActual - $anioEdicion);
    }

    public function __toString()
    {
        return "ISBN: " . $this->getISBN() . "\nTítulo del libro: " . $this->getTituloLibro() . "\nAño de edición: " . $this->getAnioEdicion() . "\nEditorial: " . $this->getEditorial() . "\nNombre y apellido del autor: " . $this->getPersonaAutor()->getNombre() . " " . $this->getPersonaAutor()->getApellido() . "\nCantidad de páginas: " . $this->getCantidadPaginas() . "\nSinopsis del libro: " . $this->getSinopsisLibro() . "\n";
    }

}


?>