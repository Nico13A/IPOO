<?php

include_once "Pasajero.php";
include_once "ResponsableV.php";
include_once "Viaje.php";

// Objetos Pasajero
$pasajero1 = new Pasajero("Juan", "Pérez", "28567890", "0299-123456");
$pasajero2 = new Pasajero("María", "Gómez", "32678901", "0299-234567");
$pasajero3 = new Pasajero("Luis", "Martínez", "39456789", "0299-345678");
$pasajero4 = new Pasajero("Ana", "Rodríguez", "40567890", "0299-456789");
$pasajero5 = new Pasajero("Pedro", "López", "43789012", "0299-567890");
$pasajero6 = new Pasajero("Laura", "Sánchez", "45890123", "0299-678901");
$pasajero7 = new Pasajero("Carlos", "Fernández", "47678901", "0299-789012");
$pasajero8 = new Pasajero("Sofía", "Hernández", "49801234", "0299-890123");
$pasajero9 = new Pasajero("Gabriel", "Díaz", "50890123", "0299-901234");
$pasajero10 = new Pasajero("Elena", "Torres", "51901234", "0299-012345");

// Crear un objeto ResponsableV
$responsableViaje = new ResponsableV("001", "ABC123", "Pedro", "González");

// Colección de pasajeros
$coleccionPasajeros = [$pasajero1, $pasajero2, $pasajero3, $pasajero4, $pasajero5, $pasajero6, $pasajero7, $pasajero8, $pasajero9, $pasajero10];

// Crear un objeto Viaje
$viaje = new Viaje("V001", "San Martín de los Andes", 11, $coleccionPasajeros, $responsableViaje);

// Menú
function mostrarMenu() {
    echo "Menú:\n";
    echo "1. Ver información del viaje.\n";
    echo "2. Modificar información de un pasajero.\n";
    echo "3. Modificar información del responsable del viaje.\n";
    echo "4. Agregar pasajero.\n";
    echo "5. Modificar viaje.\n";
    echo "6. Salir\n";
    echo "Seleccione una opción: ";
}

// Programa
echo "--------- ¡Bienvenido/a a nuestra agencia de viaje! ---------\n";
do {
    mostrarMenu();
    $opcion = trim(fgets(STDIN));
    switch ($opcion) {
        case '1':
            echo $viaje;
            break;
        case '2':
            echo "Ingrese el número de documento del pasajero que desea modificar la información: ";
            $dniPasajeroAModificar = trim(fgets(STDIN));
            if ($viaje->buscarPasajero($dniPasajeroAModificar)) {
                echo "Ingrese el nombre del pasajero: ";
                $nombre = trim(fgets(STDIN));
                echo "Ingrese el apellido del pasajero: ";
                $apellido = trim(fgets(STDIN));
                echo "Ingrese el número de teléfono del pasajero: ";
                $telefono = trim(fgets(STDIN));
                $viaje->modificarPasajero($nombre, $apellido, $dniPasajeroAModificar, $telefono);
                echo "Pasajero modificado con éxito.\n";
            }
            else {
                echo "El pasajero que desea modificar no se encuentra registrado en el viaje.\n";
            }
            break;
        case '3':
            echo "La información del responsable del viaje es la siguiente:\n";
            echo $viaje->getObjResponsableV();
            echo "Ingrese el siguiente número si desea:\n";
            echo "1. Modificar nombre.\n";
            echo "2. Modificar apellido.\n";
            echo "3. Modificar número del empleado.\n";
            echo "4. Modificar número de licencia.\n";
            echo "5. Modificar todos los datos del responsable.\n";
            echo "6. Volver atrás.\n";
            $opcionResponsable = trim(fgets(STDIN));
            switch ($opcionResponsable) {
                case '1':
                    echo "Ingrese el nombre del responsable: ";
                    $nombreResponsableModificado = trim(fgets(STDIN));
                    $responsableViaje->setNombreResponsableV($nombreResponsableModificado);
                    break;
                case '2':
                    echo "Ingrese el apellido del responsable: ";
                    $apellidoResponsableModificado = trim(fgets(STDIN));
                    $responsableViaje->setApellidoResponsableV($apellidoResponsableModificado);
                    break;
                case '3':
                    echo "Ingrese el número de empleado del responsable: ";
                    $numeroResponsableModificado = trim(fgets(STDIN));
                    $responsableViaje->setNroEmpleado($numeroResponsableModificado);
                    break;
                case '4':
                    echo "Ingrese el número de licencia del responsable: ";
                    $nroLicenciaResponsableModificado = trim(fgets(STDIN));
                    $responsableViaje->setNroLicencia($nroLicenciaResponsableModificado);
                    break;
                case '5':
                    echo "Ingrese el nombre del responsable: ";
                    $nombreResponsableModificado = trim(fgets(STDIN));
                    echo "Ingrese el apellido del responsable: ";
                    $apellidoResponsableModificado = trim(fgets(STDIN));
                    echo "Ingrese el número de empleado del responsable: ";
                    $numeroResponsableModificado = trim(fgets(STDIN));
                    echo "Ingrese el número de licencia del responsable: ";
                    $nroLicenciaResponsableModificado = trim(fgets(STDIN));
                    $objetoResponsable = new ResponsableV($numeroResponsableModificado,$nroLicenciaResponsableModificado, $nombreResponsableModificado,$apellidoResponsableModificado);
                    $viaje->setObjResponsableV($objetoResponsable);
                    break;
                default:
                    echo "Volviendo atrás...\n";
                    break;   
            }
            break;
        case '4':
            echo "Ingrese el nombre del nuevo pasajero: ";
            $nombre = trim(fgets(STDIN));
            echo "Ingrese el apellido del nuevo pasajero: ";
            $apellido = trim(fgets(STDIN));
            echo "Ingrese el número de documento del nuevo pasajero: ";
            $dni = trim(fgets(STDIN));
            echo "Ingrese el número de teléfono del nuevo pasajero: ";
            $telefono = trim(fgets(STDIN));
            $nuevoObjetoPasajero = new Pasajero($nombre, $apellido, $dni, $telefono);
            if ($viaje->agregarPasajero($nuevoObjetoPasajero)) {
                echo "Pasajero agregado con éxito.\n";
            }
            else {
                echo "No se pudo agregar al pasajero porque se encuentra lleno el viaje o el pasajero ya se encuentra registrado.\n";
            }
            break;
        case '5':
            echo "Ingrese el siguiente número si desea:\n";
            echo "1. Modificar el código del viaje.\n";
            echo "2. Modificar el destino del viaje.\n";
            echo "3. Cantidad máxima de pasajeros.\n";
            echo "4. Volver atrás.\n";
            $opcionViaje = trim(fgets(STDIN));
            switch ($opcionViaje) {
                case '1':
                    echo "Ingrese el código del viaje: ";
                    $codigoViaje = trim(fgets(STDIN));
                    $viaje->setCodigoViaje($codigoViaje);
                    break;
                case '2':
                    echo "Ingrese el destino del viaje: ";
                    $destinoViaje = trim(fgets(STDIN));
                    $viaje->setDestinoViaje($destinoViaje);
                    break;
                case '3':
                    echo "Ingrese la cantidad máxima de pasajeros permitidos: ";
                    $pasajerosPermitidos = intval(trim(fgets(STDIN)));
                    $viaje->setCantMaxPasajeros($pasajerosPermitidos);
                    break;
                default:
                echo "Volviendo atrás...\n";
                    break;
            }
            break;
        case '6':
            echo "Gracias por usar nuestra aplicación.\nSaliendo...";
            break;
        default:
            echo "Valor incorrecto, debe ingresar un número entre 1 y 6.\n";
            break;
    }
} while ($opcion != 6);


?>