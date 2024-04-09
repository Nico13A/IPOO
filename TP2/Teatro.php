<?php

class Teatro {
    private $nombreTeatro;
    private $direccionTeatro;
    private $funciones;

    public function __construct($nombre, $direccion, $arregloDeObjetosFunciones)
    {
        $this->nombreTeatro = $nombre;
        $this->direccionTeatro = $direccion;
        $this->funciones = $arregloDeObjetosFunciones;
    }

    public function getNombreTeatro() {
        return $this->nombreTeatro;
    }
    public function getDireccionTeatro() {
        return $this->direccionTeatro;
    }
    public function getFunciones() {
        return $this->funciones;
    }

    public function setNombreTeatro($nombre) {
        $this->nombreTeatro = $nombre;
    }
    public function setDireccionTeatro($direccion) {
        $this->direccionTeatro = $direccion;
    }
    public function setFunciones($funciones) {
        $this->funciones = $funciones;
    }
    public function setFuncionNombre($funcion, $nombreNuevo) {
        $funciones = $this->getFunciones();
        $funcionesModificadas = [];
        foreach ($funciones as $unaFuncion) {
            if ($funcion->getNombreFuncion() === $unaFuncion->getNombreFuncion()) {
                $unaFuncion->setNombreFuncion($nombreNuevo);
            }
            $funcionesModificadas[] = $unaFuncion;
        }
        $this->setFunciones($funcionesModificadas);
    }
    public function setFuncionPrecio($funcion, $precio) {
        $funciones = $this->getFunciones();
        $funcionesModificadas = [];
        foreach ($funciones as $unaFuncion) {
            if ($funcion->getNombreFuncion() === $unaFuncion->getNombreFuncion()) {
                $unaFuncion->setPrecioFuncion($precio);
            }
            $funcionesModificadas[] = $unaFuncion;
        }
        $this->setFunciones($funcionesModificadas);
    }

    public function seSolapan($nuevaFuncion, $coleccionFunciones) {
        $horarioInicioNueva = $nuevaFuncion->getHoraInicio();
        $horarioFinNueva = $nuevaFuncion->calcularHorarioFin();
        $contador = 0;
        $seSolapa = false;
        while ($contador < count($coleccionFunciones) && !$seSolapa) {
            $funcionExistente = $coleccionFunciones[$contador];
            $horarioInicioExistente = $funcionExistente->getHoraInicio();
            $horarioFinExistente = $funcionExistente->calcularHorarioFin();
            if ($horarioInicioNueva < $horarioFinExistente && $horarioFinNueva > $horarioInicioExistente) {
                $seSolapa = true;
            }
            $contador++;
        }
        return $seSolapa;
    }

    public function agregarFuncion($nombre, $horarioInicio, $duracion, $precio) {
        $funciones = $this->getFunciones();
        $nuevaFuncion = new Funcion($nombre, $horarioInicio, $duracion, $precio);
        if (count($funciones) === 0) {
            $this->setFunciones([$nuevaFuncion]);
        }
        else {
            if (!$this->seSolapan($nuevaFuncion, $funciones)) {
                $funciones[] = $nuevaFuncion;
                $this->setFunciones($funciones);
            }
        }
    }

    public function __toString()
    {
        return "\nNombre del teatro: " . $this->getNombreTeatro() . "\nDirección del teatro: " . $this->getDireccionTeatro() . "\nFunciones:\n" . $this->mostrarFunciones();
    }

    public function mostrarFunciones() {
        $cadena = "";
        foreach ($this->getFunciones() as $funcion) {
            $cadena .= $funcion;
        }
        return $cadena;
    }

}

?>