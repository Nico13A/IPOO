<?php

include_once "Persona.php";
include_once "Libro.php";

$objetoPersona = new Persona("Gabriel García", "Márquez", "DNI", 20451896);
$obj_libro1 = new Libro("978-140003477", "Cien años de soledad", 1967, "Sudamericana", $objetoPersona, 250, "Una sinopsis");
echo $obj_libro1;


?>