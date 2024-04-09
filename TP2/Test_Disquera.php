<?php

include_once "Persona.php";
include_once "Disquera.php";

$objetoPersona = new Persona("Nicolas", "Antinao", "DNI", 41050862);
$objetoDisquera = new Disquera(["hora" => 8, "minutos" => 30], ["hora" => 16, "minutos" => 30], false, "Río Salado 254", $objetoPersona);

echo $objetoDisquera;
echo "\n*********************** Probando función dentroHorarioAtencion() ***********************\n";
if ($objetoDisquera->dentroHorarioAtencion(16, 29)) {
    echo "La tienda se encuentra abierta.\n";
} else {
    echo "La tienda se encuentra cerrada.\n";
}
echo "\n*********************** Probando función abrirDisquera() ***********************\n";
$objetoDisquera->abrirDisquera(8, 45);
echo $objetoDisquera;

echo "\n*********************** Probando función cerrarDisquera() ***********************\n";
$objetoDisquera->cerrarDisquera(17, 0);
echo $objetoDisquera;
?>