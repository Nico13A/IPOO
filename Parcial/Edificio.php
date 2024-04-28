<?php
/*
En la clase Edificio: se registra la dirección, la referencia a la colección de inmuebles que lo componen y la referencia a una instancia de la clase Persona que representa al administrador del edificio.
*/
class Edificio {
    private $direccion;
    private $colInmueble;
    private $objadministrador;

    public function __construct($direccion, $colObjInmueble, $objPersonaAdministrador)
    {
        $this->direccion = $direccion;
        $this->colInmueble = $colObjInmueble;
        $this->objadministrador = $objPersonaAdministrador;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getColInmueble()
    {
        return $this->colInmueble;
    }
    public function setColInmueble($colInmueble)
    {
        $this->colInmueble = $colInmueble;
    }

    public function getObjadministrador()
    {
        return $this->objadministrador;
    }
    public function setObjadministrador($objadministrador)
    {
        $this->objadministrador = $objadministrador;
    }

    public function mostrarColeccionInmueble($colInmueble) {
        $cadena = "";
        foreach ($colInmueble as $objInmueble) {
            $cadena .= $objInmueble;
        }
        return $cadena;
    }

    public function darInmueblesDisponibles($tipoUso, $costoMaximo) {
        $colDisponibles = [];
        foreach ($this->getColInmueble() as $unInm) {
            if ($unInm->estaDisponible($tipoUso, $costoMaximo)) {
                $colDisponibles[] = $unInm;
            }
        }
        return $colDisponibles;
    }

    /*
    Implementar el método buscarInmueble que recibe por parámetro un objeto inmueble y retorna el índice de la colección donde se encuentra almacenado. Si el objeto no existe en la colección se debe retornar el valor-1
    */
    public function buscarInmueble($objInmueble) {
        $indiceInmueble = -1;
        $i = 0;
        $colInmueble = $this->getColInmueble();
        while ($i < count($colInmueble) && $indiceInmueble == -1) {
            $unInmueble = $colInmueble[$i];
            if ($unInmueble->getCodigo() == $objInmueble->getCodigo()) {
                $indiceInmueble = $i;
            }
            $i++;
        }
        return $indiceInmueble;
    }

    /*
    Implementar el método registrarAlquilerInmueble que recibe por parámetro el tipo de uso que se requiere para el inmueble (tipoUso) , el monto máximo (montoMaximo) a pagar por mes y la referencia a la persona que  desea alquilar (objPersona) elinmueble. Tener en cuenta que solo se va a poder realizar el alquiler de dicho inmueble si se verifica la política de alquiler de la empresa.  Por política de la empresa, los inmuebles de un edificio se deben ir ocupando por piso y por tipo. Es decir, hasta que todos los inmuebles de un piso y de un tipo no se encuentren ocupados, no es posible alquilar un inmueble de un piso superior.
El método debe retornar verdadero en caso de poder registrar el alquiler o falso en caso contrario. Recordar actualizar las estructuras correspondientes
    */
    
    /*
    public function registrarAlquilerInmueble($tipoUso, $costoMaximo, $objPersona) {

        $inmueblesDisponibles = $this->darInmueblesDisponibles($tipoUso, $costoMaximo);
        $registroExitoso = false;
        $indiceInmueble = 0;

        while ($indiceInmueble < count($inmueblesDisponibles) && !$registroExitoso) {
            $unInmueble = $inmueblesDisponibles[$indiceInmueble];
            $piso = $unInmueble->getNropiso();
            $tipoInmueble = $unInmueble->getTipouso();

            $ocupadoMismoPiso = false;
            $i = 0;
            while ($i < count($inmueblesDisponibles) && !$ocupadoMismoPiso) {
                $otroInmueble = $inmueblesDisponibles[$i];
                if (($otroInmueble->getNropiso() == $piso || $otroInmueble->getNropiso() > $piso) && $otroInmueble->getTipouso() == $tipoInmueble && $otroInmueble->getObjInquilino() != null) {
                    $ocupadoMismoPiso = true;
                }
                $i++;
            }

            if (!$ocupadoMismoPiso) {
                $unInmueble->setObjInquilino($objPersona);
                $registroExitoso = true;
            }
            $indiceInmueble++;
        }
        return $registroExitoso;
    }
    */

    public function registrarAlquilerInmueble($tipoUso, $costoMaximo, $objPersona) {
        $coleccionInmuebles = $this->getColInmueble();
        $registroExitoso = false;
        $inmueblesDisponibles = $this->darInmueblesDisponibles($tipoUso, $costoMaximo);
        if (count($inmueblesDisponibles) > 0) {
            $inmuebleMasBajo = $inmueblesDisponibles[0];
            foreach ($inmueblesDisponibles as $unInmueble) {
                if ($unInmueble->getNropiso() < $inmuebleMasBajo->getNropiso()) {
                    $inmuebleMasBajo = $unInmueble;
                }
            }
            $indiceInmueble = $this->buscarInmueble($inmuebleMasBajo);
            if ($indiceInmueble != -1) {
                echo "Inmueble encontrado en el índice: " . $indiceInmueble . "\n"; // Depuración
                if ($this->verificarPoliticaEmpresa($inmuebleMasBajo)) {
                    echo "Política de empresa verificada\n"; // Depuración
                    if ($inmuebleMasBajo->alquilar($objPersona)) {
                        echo "Alquiler exitoso\n"; // Depuración
                        $registroExitoso = true;
                        $inmuebleMasBajo->alquilar($objPersona);
                        $coleccionInmuebles[$indiceInmueble] = $inmuebleMasBajo;
                        $this->setColInmueble($coleccionInmuebles);
                    } 
                } 
            }
        } 
        return $registroExitoso;
    }

    private function verificarPoliticaEmpresa($objInmueble) {
        $cumplePolitica = true;
        $i = 0;
        $coleccionInmuebles = $this->getColInmueble();
        
        // Obtener el piso y tipo del inmueble
        $pisoInmueble = $objInmueble->getNropiso();
        $tipoInmueble = $objInmueble->getTipouso();
        
        while ($i < count($coleccionInmuebles) && $cumplePolitica) {
            $unInmueble = $coleccionInmuebles[$i];
            // Verificar si el inmueble actual es del mismo tipo y piso superior
            if ($unInmueble->getTipouso() == $tipoInmueble && $unInmueble->getNropiso() < $pisoInmueble) {
                // Verificar si el inmueble actual está desocupado
                if (!$unInmueble->getObjInquilino()) {
                    // Si hay al menos un inmueble del mismo tipo y piso inferior desocupado, no cumple la política
                    $cumplePolitica = false;
                }
            }
            $i++;
        }
        return $cumplePolitica;
    }

    public function calcularCostoEdificio() {
        $costo = 0;
        foreach ($this->getColInmueble() as $unInm) {
            if ($unInm->getObjInquilino() != null) {
                $costo += $unInm->getCostomensual();
            }
        }
        return $costo;
    }

    public function __toString()
    {
        return "Dirección del edificio: " . $this->getDireccion() . "\nColección de inmuebles:\n" . $this->mostrarColeccionInmueble($this->getColInmueble()) . "\nAdministrador del edificio: " . $this->getObjadministrador();
    }

}
/*
include_once "Persona.php";
include_once "Inmueble.php";

// Crear instancias de personas
$administrador = new Persona("DNI", "12345678", "Juan", "García", "123456789");
$inquilino1 = new Persona("DNI", "87654321", "María", "Martínez", "987654321");

// Crear instancias de inmuebles
$inmueble1 = new Inmueble("001", 1, "departamento", 1000, null);
$inmueble2 = new Inmueble("002", 2, "comercial", 1500, null);

$coleccionInmuebles = [$inmueble1, $inmueble2];

// Crear una instancia de edificio
$edificio = new Edificio("Calle Principal 123", $coleccionInmuebles, $administrador);

// Mostrar información del edificio
echo $edificio;
*/


/*
// Crear una nueva persona
$nuevoInquilino = new Persona("CI", "09876543", "Luisa", "Rodríguez", "555555555");

// Intentar registrar el alquiler del inmueble
$tipoUso = "departamento";
$costoMaximo = 1200;
$registroExitoso = $edificio->registrarAlquilerInmueble($tipoUso, $costoMaximo, $nuevoInquilino);

// Verificar si el registro fue exitoso
if ($registroExitoso) {
    echo "El alquiler se ha registrado exitosamente para Luisa Rodríguez.";
} else {
    echo "No se pudo registrar el alquiler. No hay inmuebles disponibles que cumplan con los requisitos.";
}
*/

/*
// Crear una nueva persona
$nuevoInquilino = new Persona("CI", "09876543", "Ana", "López", "555555555");

// Intentar registrar el alquiler del inmueble
$tipoUso = "departamento";
$costoMaximo = 1000;
$registroExitoso = $edificio->registrarAlquilerInmueble($tipoUso, $costoMaximo, $nuevoInquilino);

// Verificar si el registro fue exitoso
if ($registroExitoso) {
    echo "El alquiler se ha registrado exitosamente para Ana López.";
} else {
    echo "No se pudo registrar el alquiler. No hay inmuebles disponibles que cumplan con los requisitos.";
}
*/
?>