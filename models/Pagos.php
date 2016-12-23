<?php

namespace models;

class Pagos extends Table {

    static protected $tableName = 'pagos';
    static protected $properties = array('codigopago', 'importe', 'fecha');
    static protected $primaryKey = array('codigopago');
    protected $codigopago;
    protected $importe;
    protected $fecha;
    protected $usuario;

    function getCodigopago() {
        return $this->codigopago;
    }

    function getImporte() {
        return $this->importe;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setCodigopago($codigopago) {
        $this->codigopago = $codigopago;
    }

    function setImporte($importe) {
        if ($importe <= 0) {
            throw new DBException('El importe debe ser mayor a cero');
        }
        $this->importe = $importe;
    }

    function setFecha($fecha) {
        $fmt = 'YMd';
        if (date($fmt) != date_format($fecha, $fmt)) {
            throw new DBException('La fecha no puede ser anterior al día de hoy');
        }
        $this->fecha = $fecha;
    }

}
