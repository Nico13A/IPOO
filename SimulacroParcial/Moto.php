<?php

class Moto {
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activa;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activa)
    {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this->activa = $activa;
    }

    public function getCodigoMoto() {
        return $this->codigo;
    }
    public function getCostoMoto() {
        return $this->costo;
    }
    public function getAnioFabricacion() {
        return $this->anioFabricacion;
    }
    public function getDescripcionMoto() {
        return $this->descripcion;
    }
    public function getPorcentajeIncrementoAnual() {
        return $this->porcentajeIncrementoAnual;
    }
    public function getActiva() {
        return $this->activa;
    }

    public function setCodigoMoto($codigo) {
        $this->codigo = $codigo;
    }
    public function setCostoMoto($costo) {
        $this->costo = $costo;
    }
    public function setAnioFabricacion($anioFabricacion) {
        $this->anioFabricacion = $anioFabricacion;
    }
    public function setDescripcionMoto($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function setPorcentajeIncrementoAnual($porcentajeIncrementoAnual) {
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
    }
    public function setActiva($activa) {
        $this->activa = $activa;
    }

    public function darPrecioVenta() {
        $valorVenta = -1;
        if ($this->getActiva()) {
            $costoMoto = $this->getCostoMoto();
            $anioFabricacion = $this->getAnioFabricacion();
            $por_inc_anual = $this->getPorcentajeIncrementoAnual();
            $valorVenta = $costoMoto + $costoMoto * ($anioFabricacion * ($por_inc_anual/100)); 
        }
        return $valorVenta;
    }

    public function __toString()
    {
        $estadoMoto = $this->getActiva() ? "Disponible para la venta\n" : "No disponible para la venta\n";
        return "Código de la moto: " . $this->getCodigoMoto() . "\nCosto de la moto: " . $this->getCostoMoto() . "\nAño de fabricación de la moto: " . $this->getAnioFabricacion() . "\nDescripción de la moto: " . $this->getDescripcionMoto() . "\nPorcentaje incremento anual de la moto: " . $this->getPorcentajeIncrementoAnual() . "%\nEstado: " . $estadoMoto;
    }

}

/*
$objetoMoto = new Moto("001", 5000, 2020, "Moto deportiva", 5, true);
echo $objetoMoto->darPrecioVenta();
*/

?>