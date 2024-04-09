<?php

include_once "Persona.php";
include_once "Libro.php";
include_once "Lectura.php";

$objetoPersona = new Persona("Gabriel García", "Márquez", "DNI", 20451896);
$obj_libro1 = new Libro("978-140003477", "Cien años de soledad", 1967, "Sudamericana", $objetoPersona, 250, "Una sinopsis");
$obj_lectura1 = new Lectura($obj_libro1, 150);
echo $obj_lectura1;
$obj_lectura1->retrocederPagina();
$obj_lectura1->retrocederPagina();
echo $obj_lectura1->getPaginaActual() . "\n";
$obj_lectura1->siguientePagina();
$obj_lectura1->siguientePagina();
$obj_lectura1->siguientePagina();
$obj_lectura1->siguientePagina();
$obj_lectura1->siguientePagina();
$obj_lectura1->siguientePagina();
echo $obj_lectura1->getPaginaActual() . "\n";
?>