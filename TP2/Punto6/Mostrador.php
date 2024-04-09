<?php

class Mostrador {
    private $objColTramite;
    private $objColPersona; //Cola de clientes
    private $cantActualClientes;
    private $maxCantClientes;

    public function __construct($objColTramite, $objColPersona, $cantActualClientes, $maxCantClientes)
    {
        $this->objColTramite = $objColTramite;
        $this->objColPersona = $objColPersona;
        $this->cantActualClientes = $cantActualClientes;
        $this->maxCantClientes = $maxCantClientes;
    }

    public function getObjColTramite() {
        return $this->objColTramite;
    }
    public function getObjColPersona() {
        return $this->objColPersona;
    }
    public function getCantActualClientes() {
        return $this->cantActualClientes;
    }
    public function getMaxCantClientes() {
        return $this->maxCantClientes;
    }

    public function setObjColTramite($objColTramite) {
        $this->objColTramite = $objColTramite;
    }
    public function setObjColPersona($objColPersona) {
        $this->objColPersona = $objColPersona;
    }
    public function setCantActualClientes($cantActualClientes) {
        $this->cantActualClientes = $cantActualClientes;
    }
    public function setMaxCantClientes($maxCantClientes) {
        $this->maxCantClientes = $maxCantClientes;
    }

    public function atiende($unTramite) {
        $sePuedeAtender = false;
        $coleccionTramites = $this->getObjColTramite();
        $contador = 0;
        while ($contador < count($coleccionTramites) && !$sePuedeAtender) {
            $unObjetoTramite = $coleccionTramites[$contador];
            if ($unObjetoTramite->getTipoTramite() === $unTramite->getTipoTramite() && ($this->getMaxCantClientes() > $this->getCantActualClientes())) {
                $sePuedeAtender = true;
            }
            $contador++;
        }
        return $sePuedeAtender;
    }

    public function mostrarColecciones($unaColeccion) {
        $cadena = "";
        foreach ($unaColeccion as $elemento) {
            $cadena .= $elemento;
        }
        return $cadena;
    }

    public function agregarCliente($objPersona) {
        $coleccionClientes = $this->getObjColPersona();
        $coleccionClientes[] = $objPersona;
        $this->setObjColPersona($coleccionClientes);
        $this->setCantActualClientes($this->getCantActualClientes() + 1);
    }

    public function __toString()
    {
        return "\nColección de trámites:\n" . $this->mostrarColecciones($this->getObjColTramite()) . "\nColección de clientes:\n" . $this->mostrarColecciones($this->getObjColPersona()) . "\nNúmero actual de personas en la cola: " . $this->getCantActualClientes() . "\n\nNúmero máximo de personas permitidas en la cola: " . $this->getMaxCantClientes() . "\n";
    }

}

?>