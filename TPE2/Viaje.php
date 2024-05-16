<?php

class Viaje {

    private $codigo;
    private $destino;
    private $cantidadMaximaPasajeros;
    private $colObjPasajero;
    private $objResponsableV;
    private $precio;
    private $recaudacionTotal;

    public function __construct($codigo, $destino, $cantMaxPasajeros, $colObjPasajero, $objResponsableV, $precio, $recaudacionTotal)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantidadMaximaPasajeros = $cantMaxPasajeros;
        $this->colObjPasajero = $colObjPasajero;
        $this->objResponsableV = $objResponsableV;
        $this->precio = $precio;
        $this->recaudacionTotal = $recaudacionTotal;
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
    public function getPrecio()
    {
        return $this->precio;
    }
    public function getRecaudacionTotal()
    {
        return $this->recaudacionTotal;
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
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }
    public function setRecaudacionTotal($recaudacionTotal)
    {
        $this->recaudacionTotal = $recaudacionTotal;
    }

    public function buscarPasajero($numeroDocumento) {
        $pasajeroEncontrado = null;
        $colecccionPasajeros = $this->getColObjPasajero();
        $contador = 0;
        while ($contador < count($colecccionPasajeros) && !$pasajeroEncontrado) {
            $objPasajero = $colecccionPasajeros[$contador];
            if ($objPasajero->getNumeroDocumento() == $numeroDocumento) {
                $pasajeroEncontrado = $objPasajero;
            }
            $contador++;
        }
        return $pasajeroEncontrado;
    }

    private function agregarPasajero($objPasajero) {
        $pasajeroAgregadoConExito = false;
        $colecccionPasajeros = $this->getColObjPasajero();
        if ($this->hayPasajesDisponibles() && !$this->buscarPasajero($objPasajero->getNumeroDocumento())) {
            $colecccionPasajeros[] = $objPasajero;
            $this->setColObjPasajero($colecccionPasajeros);
            $pasajeroAgregadoConExito = true;
        }
        return $pasajeroAgregadoConExito;
    }

    private function hayPasajesDisponibles() {
        return count($this->getColObjPasajero()) < $this->getCantMaxPasajeros();
    }

    public function venderPasaje($objPasajero) {
        $importeFinalVenta = -1;
        if ($this->hayPasajesDisponibles() && $this->agregarPasajero($objPasajero)) {
            $precioVenta = $this->getPrecio();
            $importeFinalVenta = $precioVenta + ($precioVenta * ($objPasajero->darPorcentajeIncremento() / 100));
            $this->setRecaudacionTotal($this->getRecaudacionTotal()+$importeFinalVenta);
        }
        return $importeFinalVenta;
    }

    public function modificarPasajero($dni, $nombre = null, $apellido = null, $telefono = null, $nroViajeroFrecuente = null, $cantMillas = null, $sillaDeRuedas = null, $asistencia = null, $comidaEspecial = null) {
        $modificacionRealizada = false;
        $pasajeroAModificar = $this->buscarPasajero($dni);
        if ($pasajeroAModificar) {
            if ($pasajeroAModificar instanceof PasajeroVip) {
                $pasajeroAModificar->modificar($nombre, $apellido, $telefono, $nroViajeroFrecuente, $cantMillas);
            }
            elseif ($pasajeroAModificar instanceof PasajeroConServiciosEspeciales) {
                $pasajeroAModificar->modificar($nombre, $apellido, $telefono, $sillaDeRuedas, $asistencia, $comidaEspecial);
            }
            else {
                $pasajeroAModificar->modificar($nombre, $apellido, $telefono);
            }
            $modificacionRealizada = true;
        }
        return $modificacionRealizada;
    }

    public function mostrarColeccion($coleccion) {
        $cadena = "";
        foreach ($coleccion as $elemento) {
            if (is_a($elemento, "PasajeroVip")) {
                $cadena .= "-------- Pasajero VIP --------\n";
                $cadena .= $elemento;
            }
            elseif (is_a($elemento, "PasajeroConServiciosEspeciales")) {
                $cadena .= "-------- Pasajero con servicios especiales --------\n";
                $cadena .= $elemento;
            }
            else {
                $cadena .= "-------- Pasajero estándar --------\n";
                $cadena .= $elemento;
            }
        }
        return $cadena;
    }

    public function __toString()
    {
        return "Código del viaje: " . $this->getCodigoViaje() . "\nDestino del viaje: " . $this->getDestinoViaje() . "\nCantidad máxima de pasajeros: " . $this->getCantMaxPasajeros() . "\nColección de pasajeros:\n" . $this->mostrarColeccion($this->getColObjPasajero()) . "Responsable del viaje:\n" . $this->getObjResponsableV() . "Precio del viaje: " . $this->getPrecio() . "\nRecaudación total: " . $this->getRecaudacionTotal() . "\n";
    }

}

?>