<?php
namespace figuras;

class Circulo extends Figura {

    private $diametro;

    public function __construct($diametro) {
        $this->diametro = $diametro;
    }

    public function getDiametro() {
        return $this->diametro;
    }

    public function getSuperficie() {
        $radio = $this->diametro / 2.0;
        return pi() * $radio * $radio;
    }

    public function getTipo() {
        return 'Circulo';
    }

}
