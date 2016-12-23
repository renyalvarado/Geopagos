<?php

namespace models;

abstract class Table {
    static protected $tableName;
    static protected $properties;
    static protected $primaryKey;
    
    public static function findByPrimaryKey($primaryKey) {
        $tableName = static::$tableName;
        $properties = static::$properties;
        $columns = implode(', ', $properties);
        $conditions = array();
        foreach($primaryKey as $column => $value) {
            switch (gettype($value)) {
                case 'string':
                    $condition = "$column = '$value'";
                    break;
                case 'NULL':
                    $condition = "$column IS NULL";
                    break;
                default:
                    $condition = "$column = $value";
            }
            $conditions[] = $condition;
        }
        $sql = "SELECT $columns FROM $tableName ";
        if (count($conditions) > 0) {
            $conditionsSQL = implode(', ', $conditions);
            $sql = "$sql WHERE $conditionsSQL";
        }  
        return $sql;
    }
    
    public function save() {
        $class = get_class($this);
        $tableName = $class::$tableName;
        $properties = $class::$properties;
        $func = function($property) {
            $value = $this->$property;
            $valueType = gettype($value);
            switch ($valueType) {
                case 'string':
                    $value = "'$value'";
                    break;
                case 'NULL':
                    $value = 'NULL';
                    break;
            }
            return $value;
        };
        $columns = implode(', ', $properties);
        $values = implode(', ', array_map($func, $properties));
        return "INSERT INTO $tableName ($columns) VALUES ($values);";
    }

}
