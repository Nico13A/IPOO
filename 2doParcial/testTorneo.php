<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("PartidoFutbol.php");
include_once("PartidoBasquet.php");

$catMayores = neW Categoria(1,'Mayores');
$catJuveniles = neW Categoria(2,'Juveniles');
$catMenores = neW Categoria(1,'Menores');

$objE1 = neW Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = neW Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);

$objE3 = neW Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = neW Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = neW Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = neW Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = neW Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = neW Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = neW Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = neW Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = neW Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = neW Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);

// Crear un objeto de la clase Torneo donde el importe base del premio es de: 100.000. 
$objTorneo = new Torneo(100000);

// Crear 3 objetos partidos de Básquet.
$objPartidoBasquet1 = new PartidoBasquet(11, "2024-05-05", $objE7, 80, $objE8, 120, 7);
$objPartidoBasquet2 = new PartidoBasquet(12, "2024-05-06", $objE9, 81, $objE10, 110, 8);
$objPartidoBasquet3 = new PartidoBasquet(13, "2024-05-07", $objE11, 115, $objE12, 85, 9);

// Crear 3 objetos partidos de Futbol.
$objPartidoFutbol1 = new PartidoFutbol(14, "2024-05-07", $objE1, 3, $objE2, 2);
$objPartidoFutbol2 = new PartidoFutbol(15, "2024-05-08", $objE3, 0, $objE4, 1);
$objPartidoFutbol3 = new PartidoFutbol(16, "2024-05-09", $objE5, 2, $objE6, 3);

$coleccionPartidos = [$objPartidoBasquet1, $objPartidoBasquet2, $objPartidoBasquet3, $objPartidoFutbol1, $objPartidoFutbol2, $objPartidoFutbol3];
$objTorneo->setColeccionPartidos($coleccionPartidos);

// ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol'); visualizar la respuesta y la cantidad de equipos del torneo.
$partidoAgregado = $objTorneo->ingresarPartido($objE5, $objE11, "2024-05-23", "Futbol");
if ($partidoAgregado != null) {
    echo "Partido agregado con éxito.\n" . $partidoAgregado;
}
else {
    echo "No se pudo ingresar el partido.\n";
}

// ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol') ; visualizar la respuesta y la cantidad de equipos del torneo.
$partidoAgregado2 = $objTorneo->ingresarPartido($objE11, $objE11, "2024-05-23", "Basquetbol");
if ($partidoAgregado2 != null) {
    echo "Partido agregado con éxito.\n" . $partidoAgregado2;
}
else {
    echo "No se pudo ingresar el partido.\n";
}

// ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol'); visualizar la respuesta y la cantidad de equipos del torneo.
$partidoAgregado3 = $objTorneo->ingresarPartido($objE9, $objE10, "2024-05-25", "Basquetbol");
if ($partidoAgregado3 != null) {
    echo "Partido agregado con éxito.\n" . $partidoAgregado3;
}
else {
    echo "No se pudo ingresar el partido.\n";
}

// darGanadores(‘basquet’) y visualizar el resultado.
$equiposDeBasquetGanadores = $objTorneo->darGanadores("basquet");
echo "Equipo ganadores de basquet:\n";
foreach ($equiposDeBasquetGanadores as $objEquipo) {
    echo $objEquipo;
}

// darGanadores(‘futbol’) y visualizar el resultado.
/*
$equiposDeFutbolGanadores = $objTorneo->darGanadores("futbol");
echo "Equipo ganadores de fútbol:\n";
foreach ($equiposDeFutbolGanadores as $objEquipo) {
    echo $objEquipo;
}*/

// calcularPremioPartido con cada uno de los partidos obtenidos en a,b,c.
/*
$partido1 = $objTorneo->calcularPremioPartido($partidoAgregado);
$partido2 = $objTorneo->calcularPremioPartido($partidoAgregado2);
$partido3 = $objTorneo->calcularPremioPartido($partidoAgregado3);
*/
echo $objTorneo;
?>
