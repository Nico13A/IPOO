<?php

include 'Calculadora.php';

$calculadora = new Calculadora(5, 7);
echo "Números a calcular: \n" . $calculadora;
echo "Suma: " . $calculadora->sumar() . "\n";
echo "Resta: " . $calculadora->restar() . "\n";
echo "Multiplicación: " . $calculadora->multiplicar() . "\n";
echo "División: " . $calculadora->dividir() . "\n";

?>