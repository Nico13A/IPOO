<?php

class Teatro {
    private $nombreTeatro;
    private $direccionTeatro;
    private $funciones;

    public function __construct($nombre, $direccion, $funciones)
    {
        $this->nombreTeatro = $nombre;
        $this->direccionTeatro = $direccion;
        $this->funciones = $funciones;
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
    public function setFuncionNombre($indice, $nombre) {
        if (isset($this->getFunciones()[$indice])) {
            $this->funciones[$indice]["nombre"] = $nombre;
        }
    }
    public function setFuncionPrecio($indice, $precio) {
        if (isset($this->getFunciones()[$indice])) {
            $this->funciones[$indice]["precio"] = $precio;
        }
    }

    public function __toString()
    {
        return "Nombre del teatro: " . $this->getNombreTeatro() . "\nDirección del teatro: " . $this->getDireccionTeatro() . "\nFunciones: " . $this->mostrarFunciones();
    }

    public function mostrarFunciones() {
        $cadena = "";
        foreach ($this->getFunciones() as $funcion) {
            $cadena .= "\n  " . $funcion["nombre"] . " - Precio: " . $funcion["precio"];
        }
        return $cadena;
    }

}

?>