<?php

namespace figuras;

class FactoryFiguras implements IFactoryFiguras {

    public function crearFigura($tipo, $propiedades) {
        switch ($tipo) {
            case 'circulo':
                return new Circulo($propiedades['diametro']);
            case 'triangulo':
                return new Triangulo($propiedades['base'], $propiedades['altura']);
            case 'cuadrado':
                return new Cuadrado($propiedades['lado']);
            default:
                return null;
        }
    }

}
