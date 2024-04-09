<?php

include_once "Persona.php";
include_once "Libro.php";
include_once "LecturaModificado.php";

$objPersonaAutor1 = new Persona("Gabriel", "García Márquez", "DNI", 14256002);
$objPersonaAutor2 = new Persona("J.R.R.", "Tolkien", "DNI", 31252212);
$objPersonaAutor3 = new Persona("J.K.", "Rowling", "DNI", 12959083);

$obj_libro1 = new Libro("978-140003477", "Cien años de soledad", 1967, "Sudamericana", $objPersonaAutor1, 250, "Cien años de soledad trata un siglo en la vida de la familia Buendía, cuyo patriarca, José Arcadio Buendía, fundó el pueblo ficticio de Macondo, en Colombia. La novela es considerada una obra maestra de la literatura latinoamericana y uno de los ejemplos clásicos del realismo mágico.");
$obj_libro2 = new Libro("978-8497593699", "El Señor de los Anillos: La Comunidad del Anillo", 1954, "Allen & Unwin", $objPersonaAutor2, 300, "En la Tierra Media, el Señor Oscuro Sauron forjó los Grandes Anillos del Poder y creó uno con el poder de esclavizar a toda la Tierra Media. Frodo Bolsón es un hobbit al que su tío Bilbo hace portador del poderoso Anillo Único con la misión de destruirlo.");
$obj_libro3 = new Libro("978-0743273565", "Harry Potter y la piedra filosofal", 1997, "Bloomsbury", $objPersonaAutor3, 420, "El día de su cumpleaños, Harry Potter descubre que es hijo de dos conocidos hechiceros, de los que ha heredado poderes mágicos. Debe asistir a una famosa escuela de magia y hechicería, donde entabla una amistad con dos jóvenes que se convertirán en sus compañeros de aventura. Durante su primer año en Hogwarts, descubre que un malévolo y poderoso mago llamado Voldemort está en busca de una piedra filosofal que alarga la vida de quien la posee.");

$coleccionDeLibros = [$obj_libro1, $obj_libro2, $obj_libro3];

$lectura = new LecturaModificado($coleccionDeLibros);

//echo $lectura;

// Probar el método libroLeido
echo "********************************* Método libroLeido *********************************\n";
$titulo = "Cien años de soledad";
$libroFueLeido = $lectura->libroLeido($titulo);
if ($libroFueLeido) {
    echo "El libro " . $titulo . " fue leído.\n";
} else {
    echo "El libro " . $titulo . " no fue leído.\n";
}

// Probar el método darSinopsis
echo "\n******************************** Método darSinopsis ********************************\n";
$titulo = "Cien años de soledad";
$sinopsis = $lectura->darSinopsis($titulo);
if ($sinopsis) {
    echo "Sinopsis del libro " . $titulo . ":\n"  . $sinopsis . "\n";
} else {
    echo "El libro " . $titulo . " no fue encontrado o no tiene sinopsis.\n";
}

// Probar el método leidosAnioEdicion
echo "\n***************************** Método leidosAnioEdicion *****************************\n";
$anio = 1967;
$librosLeidosEnAnio = $lectura->leidosAnioEdicion($anio);
echo "Libros leídos cuyo año de edición es " . $anio . ":\n";
echo $lectura->mostrarArregloDeLibrosLeidos($librosLeidosEnAnio);

// Probar el método darLibrosPorAutor
echo "\n***************************** Método darLibrosPorAutor *****************************\n";
$nombreAutor = "J.R.R. Tolkien";
$librosPorAutor = $lectura->darLibrosPorAutor($nombreAutor);
echo "Libros leídos del autor " . $nombreAutor . ":\n";
echo count($librosPorAutor) > 0 ? $lectura->mostrarArregloDeLibrosLeidos($librosPorAutor) : "No se ha leído un libro del autor " . $nombreAutor . ".\n";

?>