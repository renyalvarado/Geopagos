<?php

namespace figuras;

class Cuadrado extends Figura {
    private $lado;
    public function __construct($lado) {
        $this->lado = $lado;
    }
    
    public function getBase() {
        return $this->lado;
    }

    public function getAltura() {
        return $this->lado;
    }

    public function getSuperficie() {
        return $this->lado * $this->lado;
    }

    public function getTipo() {
        return 'Cuadrado';
    }
}
