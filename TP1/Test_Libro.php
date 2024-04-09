<?php

include "Libro.php";

function iguales($libro, $arregloLibros) {
    $seEncuentra = false;
    $contador = 0;
    while (!$seEncuentra && $contador < count($arregloLibros)) {
        $unLibro = $arregloLibros[$contador];
        if ($libro->getTituloLibro() === $unLibro->getTituloLibro()) {
            $seEncuentra = true;
        }
        $contador++;
    }
    return $seEncuentra;
}

function libroDeEditoriales($arregloLibros, $editorial) {
    $librosDeEditorial = [];
    foreach ($arregloLibros as $libro) {
        if ($libro->getEditorial() === $editorial) {
            $librosDeEditorial[] = ["Libro" => $libro->getTituloLibro(), "Editorial" => $libro->getEditorial()];
        }
    }
    return $librosDeEditorial;
}

function mostrarColeccion($coleccionDeLibros) {
    foreach ($coleccionDeLibros as $libro) {
        echo $libro . "\n\n";
    }
}

function mostrarArreglosAsociativos($arreglosAsociativos) {
    foreach ($arreglosAsociativos as $arreglo) {
        echo $arreglo["Libro"] . "\n";
    }
}

$obj_libro1 = new Libro("978-140003477", "Cien años de soledad", 1967, "Sudamericana", "Gabriel García", "Márquez");
$obj_libro2 = new Libro("978-8497593699", "El Señor de los Anillos: La Comunidad del Anillo", 1954, "Allen & Unwin", "J.R.R.", "Tolkien");
$obj_libro3 = new Libro("978-0743273565", "Harry Potter y la piedra filosofal", 1997, "Bloomsbury", "J.K.", "Rowling");
$obj_libro4 = new Libro("978-0061120084", "To Kill a Mockingbird", 1960, "J. B. Lippincott & Co.", "Harper", "Lee");
$obj_libro5 = new Libro("978-9500701303", "Rayuela", 1963, "Sudamericana", "Julio", "Cortázar");
$obj_libro6 = new Libro("978-9500732024", "La ciudad y los perros", 1962, "Sudamericana", "Mario", "Vargas Llosa");
$obj_libro7 = new Libro("978-0307594004", "El hobbit", 1937, "Houghton Mifflin Harcourt", "J.R.R.", "Tolkien");
$obj_libro8 = new Libro("978-0525478812", "El guardián entre el centeno", 1951, "Little, Brown and Company", "J.D.", "Salinger");
$obj_libro9 = new Libro("978-0307390486", "Crimen y castigo", 1866, "Fyodor Dostoevsky", "Fyodor", "Dostoevsky");
$obj_libro10 = new Libro("978-0679723165", "La metamorfosis", 1915, "Schocken", "Franz", "Kafka");

$coleccionDeLibros = [$obj_libro1, $obj_libro2, $obj_libro3, $obj_libro4, $obj_libro5, $obj_libro6, $obj_libro8, $obj_libro9];

echo "\nColección de libros: \n\n";
mostrarColeccion($coleccionDeLibros);

echo "******************* Probando función aniosDesdeEdicion *******************\n";
echo $obj_libro1->getTituloLibro() . " se estrenó en " . $obj_libro1->getAnioEdicion() . ".\n";
echo "Han pasado " . $obj_libro1->aniosDesdeEdicion() . " años desde que se estrenó.\n\n";

echo "******************* Probando función perteneceEditorial *******************\n";
if ($obj_libro10->perteneceEditorial("Fyodor")) {
    echo "El libro " . $obj_libro10->getTituloLibro() . " pertenece a la editorial pasada por párametro.\n\n";
} else {
    echo "El libro " . $obj_libro10->getTituloLibro() . " NO pertenece a la editorial pasada por párametro.\n\n";
}

echo "******************* Probando función iguales *******************\n";
if (iguales($obj_libro9, $coleccionDeLibros)) {
    echo "El libro " . $obj_libro9->getTituloLibro() . " pertenece a la colección de libros.\n\n";
} else {
    echo "El libro " . $obj_libro9->getTituloLibro() . " NO pertenece a la colección de libros.\n\n";
}

echo "******************* Probando función libroDeEditoriales *******************\n";
$editorialPasadaPorParametro = "Sudamericana";
$librosDeLaEditorial = libroDeEditoriales($coleccionDeLibros, $editorialPasadaPorParametro);

if ($librosDeLaEditorial) {
    echo "Los libros que pertenecen a la editorial " . $editorialPasadaPorParametro . " son:\n";
    mostrarArreglosAsociativos($librosDeLaEditorial);
}
else {
    echo "La editorial " . $editorialPasadaPorParametro . " no se encuentra en la colección de libros.";
}

?>