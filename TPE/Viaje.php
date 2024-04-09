<?php

class Viaje {

    private $codigo;
    private $destino;
    private $cantidadMaximaPasajeros;
    private $colObjPasajero;
    private $objResponsableV;

    public function __construct($codigo, $destino, $cantMaxPasajeros, $colObjPasajero, $objResponsableV)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantidadMaximaPasajeros = $cantMaxPasajeros;
        $this->colObjPasajero = $colObjPasajero;
        $this->objResponsableV = $objResponsableV;
    }

    public function getCodigoViaje() {
        return $this->codigo;
    }
    public function getDestinoViaje() {
        return $this->destino;
    }
    public function getCantMaxPasajeros() {
        return $this->cantidadMaximaPasajeros;
    }
    public function getColObjPasajero() {
        return $this->colObjPasajero;
    }
    public function getObjResponsableV() {
        return $this->objResponsableV;
    }

    public function setCodigoViaje($codigo) {
        $this->codigo = $codigo;
    }
    public function setDestinoViaje($destino) {
        $this->destino = $destino;
    }
    public function setCantMaxPasajeros($cantMaxPasajeros) {
        $this->cantidadMaximaPasajeros = $cantMaxPasajeros;
    }
    public function setColObjPasajero($colObjPasajero) {
        $this->colObjPasajero = $colObjPasajero;
    }
    public function setObjResponsableV($objResponsableV) {
        $this->objResponsableV = $objResponsableV;
    }

    public function buscarPasajero($numeroDocumento) {
        $pasajeroEncontrado = null;
        $colecccionPasajeros = $this->getColObjPasajero();
        $contador = 0;
        while ($contador < count($colecccionPasajeros) && !$pasajeroEncontrado) {
            $unPasajero = $colecccionPasajeros[$contador];
            if ($unPasajero->getDniPasajero() == $numeroDocumento) {
                $pasajeroEncontrado = $unPasajero;
            }
            $contador++;
        }
        return $pasajeroEncontrado;
    }

    public function modificarPasajero($nombre, $apellido, $dni, $telefono) {
        $pasajeroAModificar = $this->buscarPasajero($dni);
        if ($pasajeroAModificar) {
            $pasajeroAModificar->setNombrePasajero($nombre);
            $pasajeroAModificar->setApellidoPasajero($apellido);
            $pasajeroAModificar->setTelefonoPasajero($telefono);
        }
    }

    public function agregarPasajero($unPasajero) {
        $pasajeroAgregadoConExito = false;
        $colecccionPasajeros = $this->getColObjPasajero();
        if (count($colecccionPasajeros) < $this->getCantMaxPasajeros() && !$this->buscarPasajero($unPasajero->getDniPasajero())) {
            $colecccionPasajeros[] = $unPasajero;
            $this->setColObjPasajero($colecccionPasajeros);
            $pasajeroAgregadoConExito = true;
        }
        return $pasajeroAgregadoConExito;
    }

    public function mostrarColeccion($coleccion) {
        $cadena = "";
        foreach ($coleccion as $elemento) {
            $cadena .= $elemento;
        }
        return $cadena;
    }

    public function __toString()
    {
        return "Código del viaje: " . $this->getCodigoViaje() . "\nDestino del viaje: " . $this->getDestinoViaje() . "\nCantidad máxima de pasajeros: " . $this->getCantMaxPasajeros() . "\nColección de pasajeros:\n" . $this->mostrarColeccion($this->getColObjPasajero()) . "Responsable del viaje:\n" . $this->getObjResponsableV();
    }

}

?>