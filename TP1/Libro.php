<?php

class Libro {
    private $ISBN;
    private $titulo;
    private $anioEdicion;
    private $editorial;
    private $nombreAutor;
    private $apellidoAutor;

    public function __construct($ISBN, $titulo, $anioEdicion, $editorial, $nombreAutor, $apellidoAutor)
    {
        $this->ISBN = $ISBN;
        $this->titulo = $titulo;
        $this->anioEdicion = $anioEdicion;
        $this->editorial = $editorial;
        $this->nombreAutor = $nombreAutor;
        $this->apellidoAutor = $apellidoAutor;
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
    public function getNombreAutor() {
        return $this->nombreAutor;
    }
    public function getApellidoAutor() {
        return $this->apellidoAutor;
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
    public function setNombreAutor($nombreAutor) {
        $this->nombreAutor = $nombreAutor;
    }
    public function setApellidoAutor($apellidoAutor) {
        $this->apellidoAutor = $apellidoAutor;
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
        return "ISBN: " . $this->getISBN() . "\nTítulo del libro: " . $this->getTituloLibro() . "\nAño de edición: " . $this->getAnioEdicion() . "\nEditorial: " . $this->getEditorial() . "\nNombre y apellido del autor: " . $this->getNombreAutor() . " " . $this->getApellidoAutor();
    }

}


?>