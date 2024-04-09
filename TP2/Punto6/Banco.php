<?php

class Banco {
    
    private $coleccionObjMostrador; //Colección de mostradores

    public function __construct($coleccionObjMostrador)
    {
        $this->coleccionObjMostrador = $coleccionObjMostrador;
    }

    public function getColObjMostrador() {
        return $this->coleccionObjMostrador;
    }

    public function setColObjMostrador($coleccionObjMostrador) {
        $this->coleccionObjMostrador = $coleccionObjMostrador;
    }

    public function mostradoresQueAtienden($unTramite) {
        $coleccionMostradores = $this->getColObjMostrador();
        $mostradoresQueAtiendenTramite = [];
        foreach ($coleccionMostradores as $objMostrador) {
            if ($objMostrador->atiende($unTramite)) {
                $mostradoresQueAtiendenTramite[] = $objMostrador;
            }
        }
        return $mostradoresQueAtiendenTramite;
    }

    public function mejorMostradorPara($unTramite) {
        $mejorMostrador = null;
        $mostradoresQueAtiendenTramite = $this->mostradoresQueAtienden($unTramite);
        if (count($mostradoresQueAtiendenTramite)>0) {
            $colaMasCorta = -9999;
            foreach ($mostradoresQueAtiendenTramite as $objMostrador) {
                $colaActual = $objMostrador->getMaxCantClientes() - $objMostrador->getCantActualClientes();
                if ($colaActual > 0 && ($colaActual > $colaMasCorta)) {
                    $colaMasCorta = $colaActual;
                    $mejorMostrador = $objMostrador;
                }
            }
        }
        return $mejorMostrador;
    }

    public function atender($unCliente) {
        $seAtiende = false;
        $mejorMostrador = $this->mejorMostradorPara($unCliente->getObjTramite());
        if ($mejorMostrador) {
            $mejorMostrador->agregarCliente($unCliente);
            //$coleccionMostradores = $this->getColObjMostrador();
            //$coleccionMostradores[] = $mejorMostrador;
            //$this->setColObjMostrador($coleccionMostradores);
            $seAtiende = true;
        }
        return $seAtiende;
    }

    public function mostrarColecciones($unaColeccion) {
        $cadena = "";
        foreach ($unaColeccion as $elemento) {
            $cadena .= $elemento;
        }
        return $cadena;
    }

    public function __toString()
    {
        return "Banco:\n" . $this->mostrarColecciones($this->getColObjMostrador()) . "\n";
    }

}

?>