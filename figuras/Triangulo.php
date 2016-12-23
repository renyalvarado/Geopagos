<?php
namespace figuras;

class Triangulo extends Figura {

    private $base;
    private $altura;

    public function __construct($base, $altura) {
        $this->base = $base;
        $this->altura = $altura;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function getBase() {
        return $this->base;
    }
    
    public function getSuperficie() {
        return $this->base * $this->altura / 2.0;
    }

    public function getTipo() {
        return 'Triangulo';
    }

}
