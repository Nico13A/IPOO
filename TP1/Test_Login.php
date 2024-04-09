<?php

include 'Login.php';

try {
    $login = new Login("usuario1", "password1", "Frase de recordatorio 1");
    echo $login;

    // Cambiar la contraseña varias veces
    $login->setContrasenia("password2");
    echo "Contraseña cambiada a: " . $login->getContrasenia() . "\n";

    $login->setContrasenia("password3");
    echo "Contraseña cambiada a: " . $login->getContrasenia() . "\n";

    $login->setContrasenia("password4");
    echo "Contraseña cambiada a: " . $login->getContrasenia() . "\n";

    // Intentar cambiar la contraseña a una de las anteriores
    $login->setContrasenia("password3"); // Esta debería fallar
} catch (Exception $error) {
    echo "Error: " . $error->getMessage() . "\n";
}

?>