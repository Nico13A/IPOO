<?php

class Agencia {
    private $colObjPaqueteTuristico;
    private $colObjVenta;

    public function __construct($paquetesTuristicos, $ventas)
    {
        $this->colObjPaqueteTuristico = $paquetesTuristicos;
        $this->colObjVenta = $ventas;
    }

    public function getColObjPaqueteTuristico()
    {
        return $this->colObjPaqueteTuristico;
    }
    public function setColObjPaqueteTuristico($colObjPaqueteTuristico)
    {
        $this->colObjPaqueteTuristico = $colObjPaqueteTuristico;
    }

    public function getColObjVenta()
    {
        return $this->colObjVenta;
    }
    public function setColObjVenta($colObjVenta)
    {
        $this->colObjVenta = $colObjVenta;
    }

    public function incorporarPaquete($objPaqueteTuristico) {
        $incorporacionExitosa = false;
        $paqueteExistente = false;
        $paquetesTuristicos = $this->getColObjPaqueteTuristico();
        $i = 0;
        while ($i < count($paquetesTuristicos) && !$paqueteExistente) {
            $objPaquete = $paquetesTuristicos[$i];
            if ($objPaquete->equals($objPaqueteTuristico)) {
                $paqueteExistente = true;
            }
            $i++;
        }
        if (!$paqueteExistente) {
            $paquetesTuristicos[] = $objPaqueteTuristico;
            $this->setColObjPaqueteTuristico($paquetesTuristicos);
            $incorporacionExitosa = true;
        }
        return $incorporacionExitosa;
    }

    public function incorporarVenta($objPaquete, $tipoDoc, $numDoc, $cantPer, $esOnLine) {
        $importeFinal = -1;
        $paqueteDisponible = false;
        $coleccionPaquetesTuristicos = $this->getColObjPaqueteTuristico();
        $i = 0;
        while ($i < count($coleccionPaquetesTuristicos) && !$paqueteDisponible) {
            $unPaquete = $coleccionPaquetesTuristicos[$i];
            if ($unPaquete->equals($objPaquete) && $unPaquete->getCantidadDisponiblePlazas() >= $cantPer) {
                $paqueteDisponible = true;
            }
            $i++;
        }
        if ($paqueteDisponible) {
            $objPaquete->setCantidadDisponiblePlazas($objPaquete->getCantidadDisponiblePlazas() - $cantPer);
            $objCliente = new Cliente($tipoDoc, $numDoc);
            if ($esOnLine) {
                $objVenta = new VentaOnline(date("Y-m-d"), $objPaquete, $cantPer, $objCliente);
            }
            else {
                $objVenta = new VentaAgencia(date("Y-m-d"), $objPaquete, $cantPer, $objCliente);
            }
            $ventas = $this->getColObjVenta();
            $ventas[] = $objVenta;
            $this->setColObjVenta($ventas);

            $importeFinal = $objVenta->darImporteVenta();
        }
        return $importeFinal;
    }

    public function informarPaquetesTuristicos($fecha, $destino) {
        $paquetesCoincidentes = [];
        $paquetesTuristicos = $this->getColObjPaqueteTuristico();
        foreach ($paquetesTuristicos as $objPaqueteTuristico) {
            if ($objPaqueteTuristico->getFechaDesde() == $fecha && $objPaqueteTuristico->getObjDestino()->getNombre() == $destino) {
                $paquetesCoincidentes[] = $objPaqueteTuristico;
            }
        }
        return $paquetesCoincidentes;
    }

    public function paqueteMasEcomomico($fecha, $destino) {
        $objPaqueteMasEconomico = null;
        $precioMasBajo = PHP_INT_MAX; 
        $paquetesTuristicos = $this->informarPaquetesTuristicos($fecha, $destino);
        foreach ($paquetesTuristicos as $objPaquete) {
            $precioActual = $objPaquete->getObjDestino()->getPrecioPorDia() * $objPaquete->getCantidadDias();
            if ($precioActual<$precioMasBajo) {
                $precioMasBajo = $precioActual;
                $objPaqueteMasEconomico = $objPaquete;
            }
        }
        return $objPaqueteMasEconomico;
    }

    public function informarConsumoCliente($tipoDoc, $numDoc) {
        $paquetesConsumidos = [];
        $ventas = $this->getColObjVenta();
        foreach ($ventas as $objVenta) {
            if ($objVenta->getObjCliente()->getTipoDoc() == $tipoDoc && $objVenta->getObjCliente()->getNumDoc() == $numDoc) {
                $paquetesConsumidos[] = $objVenta;
            }
        }
        return $paquetesConsumidos;
    }

    public function filtrarVentasPorAnio($anio) {
        $ventasDelAnio = [];
        $ventas = $this->getColObjVenta();
        foreach ($ventas as $objVenta) {
            if ($objVenta->obtenerAnioDeVenta() == $anio) {
                $ventasDelAnio[] = $objVenta;
            }
        }
        return $ventasDelAnio;
    }

    private function contarVentasPorPaquete($ventasDelAnio) {
        $contadorVentas = [];
        $totalContadorVentas = count($contadorVentas);    
        foreach ($ventasDelAnio as $objVenta) {
            $objPaqueteTuristico = $objVenta->getObjPaqueteTuristico();
            $encontrado = false;         
            $indice = 0;
            while ($indice < $totalContadorVentas && !$encontrado) {
                $objPaqueteContador = $contadorVentas[$indice]['paquete'];
                if ($objPaqueteTuristico->equals($objPaqueteContador)) {
                    $contadorVentas[$indice]['cantidad']++;
                    $encontrado = true;
                }
                $indice++;
            }   
            if (!$encontrado) {
                $contadorVentas[] = [
                    'paquete' => $objPaqueteTuristico,
                    'cantidad' => 1
                ];
                $totalContadorVentas++; 
            }
        }
        return $contadorVentas;
    }

    private function seleccionarPaquetesMasVendidos($contadorVentas, $n) {
        $paquetesMasVendidos = [];
        $totalElementos = count($contadorVentas); 
        while ($n > 0 && $totalElementos > 0) {
            $maxCantidad = -9999;
            $indiceMax = 0;         
            for ($i = 0; $i < $totalElementos; $i++) {
                if ($contadorVentas[$i]['cantidad'] > $maxCantidad) {
                    $maxCantidad = $contadorVentas[$i]['cantidad'];
                    $indiceMax = $i;
                }
            }
            $paquetesMasVendidos[] = $contadorVentas[$indiceMax]['paquete'];
            for ($j = $indiceMax; $j < $totalElementos - 1; $j++) {
                $contadorVentas[$j] = $contadorVentas[$j + 1];
            }
            $totalElementos--;
            $n--;
        }
        return $paquetesMasVendidos;
    }
    
    public function informarPaquetesMasVendido($anio, $n) {
        $ventasDelAnio = $this->filtrarVentasPorAnio($anio);
        $contadorVentas = $this->contarVentasPorPaquete($ventasDelAnio);
        $paquetesMasVendidos = $this->seleccionarPaquetesMasVendidos($contadorVentas, $n);
        return $paquetesMasVendidos;
    }

    public function promedioVentasOnline() {
        $sumaVentas = 0;
        $numVentasOnline = 0;
        $coleccionVentas = $this->getColObjVenta();

        foreach ($coleccionVentas as $objVenta) {
            if ($objVenta instanceof VentaOnline) {
                $sumaVentas += $objVenta->darImporteVenta(); 
                $numVentasOnline++;
            }
        }
        $promedioVentas = $numVentasOnline > 0 ? $sumaVentas / $numVentasOnline : 0;
        return $promedioVentas;
    }

    public function promedioVentasAgencia() {
        $sumaVentas = 0;
        $numVentasAgencia = 0;
        $coleccionVentas = $this->getColObjVenta();

        foreach ($coleccionVentas as $objVenta) {
            if ($objVenta instanceof VentaAgencia) {
                $sumaVentas += $objVenta->darImporteVenta(); 
                $numVentasAgencia++;
            }
        }
        $promedioVentas = $numVentasAgencia > 0 ? $sumaVentas / $numVentasAgencia : 0;
        return $promedioVentas;
    }

    private function mostrarColeccion($coleccion) {
        $cadena = "";
        foreach ($coleccion as $elemento) {
            $cadena .= $elemento;
        }
        return $cadena;
    }

    public function __toString()
    {
        return "\nPaquetes turisticos:\n" . $this->mostrarColeccion($this->getColObjPaqueteTuristico()) . "\nVentas:\n" . $this->mostrarColeccion($this->getColObjVenta());
    }
}

?>