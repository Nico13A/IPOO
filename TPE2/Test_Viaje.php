<?php

include_once "Persona.php";
include_once "Pasajero.php";
include_once "PasajeroVip.php";
include_once "PasajeroConServiciosEspeciales.php";
include_once "ResponsableV.php";
include_once "Viaje.php";

// Objetos Pasajero
$pasajero1 = new PasajeroVip("Juan", "Pérez", "28567890", "0299-123456", "A1", "T1", "VF123", 400);
$pasajero2 = new Pasajero("María", "Gómez", "32678901", "0299-234567", "B1", "T123");
$pasajero3 = new Pasajero("Luis", "Martínez", "39456789", "0299-345678", "B2", "T456");
$pasajero4 = new Pasajero("Ana", "Rodríguez", "40567890", "0299-456789", "B3", "T789");
$pasajero5 = new PasajeroConServiciosEspeciales("Pedro", "López", "43789012", "0299-567890", "C1", "TE1", false, true, false);
$pasajero6 = new PasajeroVip("Laura", "Sánchez", "45890123", "0299-678901", "A2", "T2", "VF456", 250);
$pasajero7 = new Pasajero("Carlos", "Fernández", "47678901", "0299-789012", "B4", "T2123");
$pasajero8 = new PasajeroConServiciosEspeciales("Sofía", "Hernández", "49801234", "0299-890123", "C2", "TE2", false, false, true);
$pasajero9 = new Pasajero("Gabriel", "Díaz", "50890123", "0299-901234", "B5", "T2456");
$pasajero10 = new Pasajero("Elena", "Torres", "51901234", "0299-012345", "B6", "T2456");

// Crear un objeto ResponsableV
$responsableViaje = new ResponsableV("001", "ABC123", "Pedro", "González", "42050841", "0299-6571295");

// Colección de pasajeros
//$coleccionPasajeros = [$pasajero1, $pasajero2, $pasajero3, $pasajero4, $pasajero5, $pasajero6, $pasajero7, $pasajero8, $pasajero9, $pasajero10];

// Crear un objeto Viaje
$viaje = new Viaje("V001", "San Martín de los Andes", 15, [], $responsableViaje, 400, 0);
$viaje->venderPasaje($pasajero1);
$viaje->venderPasaje($pasajero2);
$viaje->venderPasaje($pasajero3);
$viaje->venderPasaje($pasajero4);
$viaje->venderPasaje($pasajero5);
$viaje->venderPasaje($pasajero6);
$viaje->venderPasaje($pasajero7);
$viaje->venderPasaje($pasajero8);
$viaje->venderPasaje($pasajero9);
$viaje->venderPasaje($pasajero10);
//echo $viaje;

// Menú
function mostrarMenu() {
    echo "Menú:\n";
    echo "1. Ver información del viaje.\n";
    echo "2. Modificar información de un pasajero.\n";
    echo "3. Modificar información del responsable del viaje.\n";
    echo "4. Vender pasaje.\n";
    echo "X. Salir\n";
    echo "Seleccione una opción: ";
}

function mostrarMenuDeModificaciones($objPersona) {
    echo "**********************************************************\n";
    echo "1. Modificar nombre.\n";
    echo "2. Modificar apellido.\n";
    echo "3. Modificar el teléfono.\n";
    if ($objPersona instanceof Pasajero) {
        if ($objPersona instanceof PasajeroVip) {
            echo "4. Modificar el número de viajero frecuente.\n";
            echo "5. Modificar cantidad de millas.\n";
        }
        elseif ($objPersona instanceof PasajeroConServiciosEspeciales) {
            echo "4. Modificar requerimiento de silla de ruedas.\n";
            echo "5. Modificar requerimiento de asistencia de embarque o desembarque.\n";
            echo "6. Modificar requerimiento de comida especial.\n";
        }
    }
    elseif ($objPersona instanceof ResponsableV) {
        echo "4. Modificar número del empleado.\n";
        echo "5. Modificar número de licencia.\n";
    }
    echo "X. Volver atrás.\n";
    echo "**********************************************************\n";
    echo "Seleccione una opción: ";
}

function devolverBooleano($respuesta) {
    $valorDelBooleano = false;
    if ($respuesta == "S") {
        $valorDelBooleano = true;
    }
    return $valorDelBooleano;
}

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
            $pasajero = $viaje->buscarPasajero($dniPasajeroAModificar);
            if ($pasajero) {
                echo "**** Información del pasajero que desea modificar ****\n";
                echo $pasajero;
                $nombreModificado = null;
                $apellidoModificado = null;
                $telefonoModificado = null;
                $nroViajeroModificado = null;
                $cantMillasModificado = null;
                $necSillaModificado = null;
                $necAsistModificado = null;
                $necComEspModificado = null;
                do {
                    mostrarMenuDeModificaciones($pasajero);
                    $nroDeModificacion = trim(fgets(STDIN));
                    switch ($nroDeModificacion) {
                        case '1':
                            echo "Ingrese el nombre del pasajero: ";
                            $nombreModificado = trim(fgets(STDIN));
                            break;
                        case '2':
                            echo "Ingrese el apellido del pasajero: ";
                            $apellidoModificado = trim(fgets(STDIN));
                            break;
                        case '3':
                            echo "Ingrese el teléfono del pasajero: ";
                            $telefonoModificado = trim(fgets(STDIN));
                            break;
                        case '4':
                            if ($pasajero instanceof PasajeroVip) {
                                echo "Ingrese el número de viajero frecuente: ";
                                $nroViajeroModificado = trim(fgets(STDIN));
                            }
                            elseif ($pasajero instanceof PasajeroConServiciosEspeciales) {
                                echo "¿El pasajero requiere silla de ruedas? (S/N) ";
                                $necSillaModificado = devolverBooleano(trim(fgets(STDIN)));
                            }
                            break;
                        case '5':
                            if ($pasajero instanceof PasajeroVip) {
                                echo "Ingrese la cantidad de millas: ";
                                $cantMillasModificado = trim(fgets(STDIN));
                            }
                            elseif ($pasajero instanceof PasajeroConServiciosEspeciales) {
                                echo "¿El pasajero requiere asistencia para embarcar o desembarcar? (S/N) ";
                                $necAsistModificado = devolverBooleano(trim(fgets(STDIN)));
                            }
                            break;
                        case '6':
                            if ($pasajero instanceof PasajeroConServiciosEspeciales) {
                                echo "¿El pasajero requiere comida especial? (S/N) ";
                                $necComEspModificado = devolverBooleano(trim(fgets(STDIN)));
                            }
                            break;
                        case 'X':
                            echo "Volviendo atrás...\n";
                            break;
                    }
                } while ($nroDeModificacion != "X");
                $viaje->modificarPasajero($dniPasajeroAModificar, $nombreModificado, $apellidoModificado, $telefonoModificado, $nroViajeroModificado, $cantMillasModificado, $necSillaModificado, $necAsistModificado, $necComEspModificado);
            }
            else {
                echo "El pasajero que desea modificar no se encuentra registrado en el viaje.\n";
            }
            break;
        case '3':
            echo "**** Información del responsable del viaje ****\n";
            echo $viaje->getObjResponsableV();
            do {
                mostrarMenuDeModificaciones($viaje->getObjResponsableV());
                $nroDeModificacion = trim(fgets(STDIN));
                switch ($nroDeModificacion) {
                    case '1':
                        echo "Ingrese el nombre del responsable: ";
                        $nombreResponsableModificado = trim(fgets(STDIN));
                        $viaje->getObjResponsableV()->setNombre($nombreResponsableModificado);
                        break;
                    case '2':
                        echo "Ingrese el apellido del responsable: ";
                        $apellidoResponsableModificado = trim(fgets(STDIN));
                        $viaje->getObjResponsableV()->setApellido($apellidoResponsableModificado);
                        break;
                    case '3':
                        echo "Ingrese el número de teléfono del responsable: ";
                        $telefonoResponsableModificado = trim(fgets(STDIN));
                        $viaje->getObjResponsableV()->setTelefono($telefonoResponsableModificado);
                        break;
                    case '4':
                        echo "Ingrese el número de empleado del responsable: ";
                        $numeroResponsableModificado = trim(fgets(STDIN));
                        $viaje->getObjResponsableV()->setNroEmpleado($numeroResponsableModificado);
                        break;
                    case '5':
                        echo "Ingrese el número de licencia del responsable: ";
                        $nroLicenciaResponsableModificado = trim(fgets(STDIN));
                        $viaje->getObjResponsableV()->setNroLicencia($nroLicenciaResponsableModificado);
                        break;
                    case 'X':
                        echo "Volviendo atrás...\n";
                        break;
                }
            } while ($nroDeModificacion != 'X');
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
            echo "Ingrese el número de asiento: ";
            $nroAsiento = trim(fgets(STDIN));
            echo "Ingrese el número de ticket: ";
            $nroTicket = trim(fgets(STDIN));
            echo "¿El pasajero requiere servicios especiales? (S/N) ";
            $respuesta = trim(fgets(STDIN));
            if ($respuesta == "S") {
                echo "¿El pasajero requiere silla de ruedas? (S/N) ";
                $necSilla = devolverBooleano(trim(fgets(STDIN)));
                echo "¿El pasajero requiere asistencia para embarcar o desembarcar? (S/N) ";
                $necAsist = devolverBooleano(trim(fgets(STDIN)));
                echo "¿El pasajero requiere comida especial? (S/N) ";
                $necComEsp = devolverBooleano(trim(fgets(STDIN)));
                $nuevoPasajero = new PasajeroConServiciosEspeciales($nombre, $apellido, $dni, $telefono, $nroAsiento, $nroTicket, $necSilla, $necAsist, $necComEsp);
            }
            else {
                echo "¿El pasajero es VIP? (S/N) ";
                $respuestaVip = trim(fgets(STDIN));
                if ($respuestaVip == "S") {
                    echo "Ingrese el número de viajero frecuente: ";
                    $nroViajeroFrecuente = trim(fgets(STDIN));
                    echo "Ingrese la cantidad de millas: ";
                    $cantMillas = trim(fgets(STDIN));
                    $nuevoPasajero = new PasajeroVip($nombre, $apellido, $dni, $telefono, $nroAsiento, $nroTicket, $nroViajeroFrecuente, $cantMillas);
                }
                else {
                    $nuevoPasajero = new Pasajero($nombre, $apellido, $dni, $telefono, $nroAsiento, $nroTicket);
                }
            }
            $importeVenta = $viaje->venderPasaje($nuevoPasajero);
            if ($importeVenta != -1) {
                echo "Pasaje vendido con éxito.\n";
            }
            else {
                echo "No se pudo realizar la venta.\n";
            }
            break;
        case 'X':
            echo "Gracias por usar nuestra aplicación.\nSaliendo...";
            break;
        default:
            echo "Valor incorrecto, debe ingresar una opción válida.\n";
            break;
    }
} while ($opcion != 'X');


?>