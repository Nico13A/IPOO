<?php

class Empresa {
    private $denominacion;
    private $direccion;
    private $colObjCliente;
    private $colObjMoto;
    private $colObjVenta;

    public function __construct($denominacion, $direccion, $colObjCliente, $colObjMoto, $colObjVenta)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colObjCliente = $colObjCliente;
        $this->colObjMoto = $colObjMoto;
        $this->colObjVenta = $colObjVenta;
    }

    public function getDenominacion() {
        return $this->denominacion;
    }
    public function getDireccionEmpresa() {
        return $this->direccion;
    }
    public function getColObjCliente() {
        return $this->colObjCliente;
    }
    public function getColObjMoto() {
        return $this->colObjMoto;
    }
    public function getColObjVenta() {
        return $this->colObjVenta;
    }

    public function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }
    public function setDireccionEmpresa($direccion) {
        $this->direccion = $direccion;
    }
    public function setColObjCliente($colObjCliente) {
        $this->colObjCliente = $colObjCliente;
    }
    public function setColObjMoto($colObjMoto) {
        $this->colObjMoto = $colObjMoto;
    }
    public function setColObjVenta($colObjVenta) {
        $this->colObjVenta = $colObjVenta;
    }

    public function mostrarColeccion($coleccion) {
        $cadena = "";
        foreach ($coleccion as $elemento) {
            $cadena .= $elemento;
        }
        return $cadena;
    }

    public function retornarMoto($codigoMoto) {
        $coleccionMotos = $this->getColObjMoto();
        $objetoMotoCoincidente = null;
        $i = 0;
        while ($i<count($coleccionMotos) && !$objetoMotoCoincidente) {
            $unaMoto = $coleccionMotos[$i];
            if ($unaMoto->getCodigoMoto() == $codigoMoto) {
                $objetoMotoCoincidente = $unaMoto;
            }
            $i++;
        }
        return $objetoMotoCoincidente;
    }

    public function generarNumeroVenta() {
        $coleccionVentas = $this->getColObjVenta();
        $numeroVenta = count($coleccionVentas) + 1;
        return $numeroVenta;
    }

    public function registrarVenta($colCodigosMoto, $objCliente) {
        $importeFinalVenta = 0;
        if ($objCliente->getEstado()) {
            $nuevaVenta = new Venta($this->generarNumeroVenta(), date("Y-m-d"), $objCliente, [], $importeFinalVenta);
            foreach ($colCodigosMoto as $codigo) {
                $objetoMoto = $this->retornarMoto($codigo);
                if ($objetoMoto) {
                    $nuevaVenta->incorporarMoto($objetoMoto);
                }
            }
            $importeFinalVenta = $nuevaVenta->getPrecioFinal(); 
            if ($importeFinalVenta > 0) {
                $coleccionVentas = $this->getColObjVenta();
                $coleccionVentas[] = $nuevaVenta;
                $this->setColObjVenta($coleccionVentas);
            }        
        }
        return $importeFinalVenta;
    }
    
    public function retornarVentasXCliente($tipo, $numDoc) {
        $coleccionVentas = $this->getColObjVenta();
        $ventasRealizadasDelCliente = [];
        foreach ($coleccionVentas as $objVenta) {
            if ($objVenta->getObjCliente()->getTipoDocumento() == $tipo && $objVenta->getObjCliente()->getNumeroDocumento() == $numDoc && $objVenta->getPrecioFinal() != 0) {
                $ventasRealizadasDelCliente[] = $objVenta;
            }
        }
        return $ventasRealizadasDelCliente;
    }

    public function informarSumaVentasNacionales() {
        $sumaVentasNacionales = 0;
        foreach ($this->getColObjVenta() as $objVenta) {
            $sumaVentasNacionales += $objVenta->retornarTotalVentaNacional();
        }
        return $sumaVentasNacionales;
    }

    public function informarVentasImportadas() {
        $ventasImportadas = [];
        foreach ($this->getColObjVenta() as $objVenta) {
            $motosImportadas = $objVenta->retornarMotosImportadas();
            if ($motosImportadas>0) {
                $ventasImportadas[] = $objVenta;
            }
        }
        return $ventasImportadas;
    }

    public function __toString()
    {
        return "Denominación de la empresa: " . $this->getDenominacion() . "\nDirección de la empresa: " . $this->getDireccionEmpresa() . "\nColección de clientes:\n" . $this->mostrarColeccion($this->getColObjCliente()) . "Colección de motos:\n" . $this->mostrarColeccion($this->getColObjMoto()) . "Ventas realizadas:\n" . $this->mostrarColeccion($this->getColObjVenta());
    }

}

?>