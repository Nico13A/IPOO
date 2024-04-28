<?php

class Inmueble {
    
    private $codigo;
    private $nropiso;
    private $tipouso;
    private $costomensual;
    private $objInquilino;

    public function __construct($codigo, $nropiso, $tipouso, $costomensual, $objInquilino) {
        $this->codigo = $codigo;
        $this->nropiso = $nropiso;
        $this->tipouso = $tipouso;
        $this->costomensual = $costomensual;
        $this->objInquilino = $objInquilino;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getNropiso()
    {
        return $this->nropiso;
    }
    public function setNropiso($nropiso)
    {
        $this->nropiso = $nropiso;
    }

    public function getTipouso()
    {
        return $this->tipouso;
    }
    public function setTipouso($tipouso)
    {
        $this->tipouso = $tipouso;
    }

    public function getCostomensual()
    {
        return $this->costomensual;
    }
    public function setCostomensual($costomensual)
    {
        $this->costomensual = $costomensual;
    }

    public function getObjInquilino()
    {
        return $this->objInquilino;
    }
    public function setObjInquilino($objInquilino)
    {
        $this->objInquilino = $objInquilino;
    }


    /*
     Implementar el método estaDisponible el cual recibe como parámetro el tipo  de uso que se requiere y el monto máximo disponible para alquilar y determine si el inmueble está disponible o no. Tener en cuenta que un inmueble sólo puede ser alquilado si no se encuentra alquilado en ese momento. Ingrese una implementación posible para el método.
    */
    public function estaDisponible($tipouso, $costoMaximo) {
        $disponibilidad = false;
        if (!$this->getObjInquilino()) {
            if ($this->getTipouso() == $tipouso && $this->getCostomensual()<= $costoMaximo) {
                $disponibilidad = true;
            }
        }
        return $disponibilidad;
    }

    public function alquilar($objInquilino) {
        $alquilerCompletado = false;
        if (!$this->getObjInquilino()) {
            $this->setObjInquilino($objInquilino);
            $alquilerCompletado = true;
        }
        return $alquilerCompletado;
    }

    public function __toString()
    {
        $inquilinoInfo = $this->getObjInquilino() ? $this->getObjInquilino() : "No hay inquilino asignado\n";
        
        return "Código de referencia: " . $this->getCodigo() . "\nNúmero de piso: " . $this->getNropiso() . "\nTipo de uso: " . $this->getTipouso() . "\nCosto mensual: " . $this->getCostomensual() . "\nInquilino: " . $inquilinoInfo;
    }


}

?>