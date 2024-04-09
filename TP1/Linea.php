<?php

class Linea {

    private $pA;
    private $pB;
    private $pC;
    private $pD;

    public function __construct($pA, $pB, $pC, $pD)
    {
        $this->pA = $pA;
        $this->pB = $pB;
        $this->pC = $pC;
        $this->pD = $pD;
    }

    public function get_pA() {
        return $this->pA;
    }
    public function get_pB() {
        return $this->pB;
    }
    public function get_pC() {
        return $this->pC;
    }
    public function get_pD() {
        return $this->pD;
    }

    public function set_pA($puntoA) {
        $this->pA = $puntoA;
    }
    public function set_pB($puntoB) {
        $this->pB = $puntoB;
    }
    public function set_pC($puntoC) {
        $this->pC = $puntoC;
    }
    public function set_pD($puntoD) {
        $this->pD = $puntoD;
    }

    public function mueveDerecha($distancia) {
        $this->set_pA(["x" => $this->get_pA()["x"] + $distancia, "y" => $this->get_pA()["y"]]);
        $this->set_pB(["x" => $this->get_pB()["x"] + $distancia, "y" => $this->get_pB()["y"]]);
        $this->set_pC(["x" => $this->get_pC()["x"] + $distancia, "y" => $this->get_pC()["y"]]);
        $this->set_pD(["x" => $this->get_pD()["x"] + $distancia, "y" => $this->get_pD()["y"]]);
    }

    public function mueveIzquierda($distancia) {
        $this->set_pA(["x" => $this->get_pA()["x"] - $distancia, "y" => $this->get_pA()["y"]]);
        $this->set_pB(["x" => $this->get_pB()["x"] - $distancia, "y" => $this->get_pB()["y"]]);
        $this->set_pC(["x" => $this->get_pC()["x"] - $distancia, "y" => $this->get_pC()["y"]]);
        $this->set_pD(["x" => $this->get_pD()["x"] - $distancia, "y" => $this->get_pD()["y"]]);
    }

    public function mueveArriba($distancia) {
        $this->set_pA(["x" => $this->get_pA()["x"], "y" => $this->get_pA()["y"] + $distancia]);
        $this->set_pB(["x" => $this->get_pB()["x"], "y" => $this->get_pB()["y"] + $distancia]);
        $this->set_pC(["x" => $this->get_pC()["x"], "y" => $this->get_pC()["y"] + $distancia]);
        $this->set_pD(["x" => $this->get_pD()["x"], "y" => $this->get_pD()["y"] + $distancia]);
    }

    public function mueveAbajo($distancia) {
        $this->set_pA(["x" => $this->get_pA()["x"], "y" => $this->get_pA()["y"] - $distancia]);
        $this->set_pB(["x" => $this->get_pB()["x"], "y" => $this->get_pB()["y"] - $distancia]);
        $this->set_pC(["x" => $this->get_pC()["x"], "y" => $this->get_pC()["y"] - $distancia]);
        $this->set_pD(["x" => $this->get_pD()["x"], "y" => $this->get_pD()["y"] - $distancia]);
    }

    public function __toString()
    {
        //return "Puntos por donde pasa la línea:\n(" . $this->get_pA() . ", " . $this->get_pB() . ")\n(" . $this->get_pC() . ", " . $this->get_pD() . ")\n";
        return "Puntos por donde pasa la línea:\n(" . $this->get_pA()["x"] . ", " . $this->get_pA()["y"] . ")\n(" . $this->get_pB()["x"] . ", " . $this->get_pB()["y"] . ")\n(" . $this->get_pC()["x"] . ", " . $this->get_pC()["y"] . ")\n(" . $this->get_pD()["x"] . ", " . $this->get_pD()["y"] . ")\n";
    }

}

?>