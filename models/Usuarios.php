<?php

namespace models;

class Usuarios extends Table {

    static protected $tableName = 'usuarios';
    static protected $properties = array('codigousurio', 'usuario', 'clave', 'edad');
    static protected $primaryKey = array('codigousurio');
    protected $codigousurio;
    protected $usuario;
    protected $clave;
    protected $edad;
    protected $favoritos;
    protected $pagos;

    function getCodigousurio() {
        return $this->codigousurio;
    }

    function setCodigousurio($codigousurio) {
        $this->codigousurio = $codigousurio;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setUsuario($usuario) {
        if (strlen($usuario) < 1) {
            throw new DBException('Los usuarios no pueden tener un nombre de usuario vacío');
        }
        $this->usuario = $usuario;
    }

    function getClave() {
        return $this->clave;
    }

    function getEdad() {
        return $this->edad;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setEdad($edad) {
        if ($edad < 18) {
            throw new DBException('Los usuarios no pueden ser menores de edad');
        }
        $this->edad = $edad;
    }

}
