<?php

class Cuadrado {
    
    private $vertices;

    public function __construct($vertice1, $vertice2, $vertice3, $vertice4)
    {
        $this->vertices = ["Vértice superior izquierdo" => $vertice1, "Vértice superior derecho" => $vertice2, "Vértice inferior derecho" => $vertice3, "Vértice inferior izquierdo" => $vertice4];
    }

    public function getVertices() {
        return $this->vertices;
    }

    public function setVertices($vertices) {
        $this->vertices = $vertices;
    }

    public function darLongitudDelCuadrado() {
        $unVertice = $this->getVertices()["Vértice superior izquierdo"]['x'];
        $otroVertice = $this->getVertices()["Vértice superior derecho"]['x'];
        return abs($unVertice - $otroVertice);
    }

    public function area() {
        $longitudDelCuadrado = $this->darLongitudDelCuadrado();
        return $longitudDelCuadrado * $longitudDelCuadrado;
    }

    public function desplazar($punto) {
        //Obtengo el valor x e y del punto pasado por parámetro.
        $desplazoX = $punto["x"];
        $desplazoY = $punto["y"];
        
        //Obtengo el valor x e y del vértice inferior izquierdo.
        $verticeInferiorIzquierdoX = $this->getVertices()["Vértice inferior izquierdo"]["x"];
        $verticeInferiorIzquierdoY = $this->getVertices()["Vértice inferior izquierdo"]["y"];

        //Desplazamiento.
        $dx = $desplazoX - $verticeInferiorIzquierdoX;
        $dy = $desplazoY - $verticeInferiorIzquierdoY;

        //Inicializo un array para luego setear los vertices.
        $nuevosVertices = [];

        foreach ($this->getVertices() as $nombre => $vertice) {
            $nuevosVertices[$nombre] = [
                'x' => $vertice['x'] + $dx,
                'y' => $vertice['y'] + $dy
            ];
        }

        $this->setVertices($nuevosVertices);
    }

    public function aumentarTamanio($tamanio) {
        $nuevosVertices = [];
        foreach ($this->getVertices() as $nombre => $vertice) {
            $nuevosVertices[$nombre] = [
                'x' => $vertice['x'] + $tamanio,
                'y' => $vertice['y'] + $tamanio
            ];
        }
        $this->setVertices($nuevosVertices);
    }

    public function __toString()
    {
        $representacion = "";
        foreach ($this->getVertices() as $nombre => $vertice) {
            $representacion .= $nombre . ": (" . $vertice['x'] . ", " . $vertice['y'] . ")\n";
        }
        return $representacion;
    }

    public function __destruct()
    {
        echo $this . "Instancia destruida, no hay referencias a este objeto.\n";
    }

}

?>