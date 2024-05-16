<?php

class Cliente {
    private $tipoDoc;
    private $numDoc;

    public function __construct($tipoDoc, $numDoc)
    {
        $this->tipoDoc = $tipoDoc;
        $this->numDoc = $numDoc;
    }

    public function getTipoDoc() {
        return $this->tipoDoc;
    }
    public function getNumDoc() {
        return $this->numDoc;
    }

    public function setTipoDoc($tipoDoc) {
        $this->tipoDoc = $tipoDoc;
    }
    public function setNumDoc($numDoc) {
        $this->numDoc = $numDoc;
    }

    public function __toString()
    {
        return "Tipo de documento: " . $this->getTipoDoc() . "\nNúmero de documento: " . $this->getNumDoc() . "\n";
    }

}

?>