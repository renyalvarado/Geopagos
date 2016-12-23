<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /*
         * Los registros muertos tanto de favoritos, como de pagos, se deberían
         * verificar al guardar los registros en base de datos. Para ello deben
         * colocarse las claves foráneas y capturar las excepciones SQL que tengan
         * como texto el nombre de la clave foránea creada. Si se intenta validar
         * antes usando un select antes de actualizar la propiedad en el objecto 
         * de todas formas existe una posibilidad que luego ese registro ese elimine.
         * Es por eso que recomendaría hacerlo exclusívamente por BD. El resto del 
         * ejemplo es un intento burdo de crear una especie de ORM. En el mundo real 
         * hubiera utilizado un framework tipo Laravel para hacer ésto.
         */
        spl_autoload_register(function ($class_name) {
            include str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';
        });
        try {
            $usuario = new models\Usuarios();
            $usuario->setCodigousurio('123456');
            $usuario->setUsuario('renyalvarado');
            $usuario->setEdad(33);
            echo $usuario->save() . '<br/>';
            echo models\Usuarios::findByPrimaryKey(array('codigousuario' => 123456)) . '<br/>';
        } catch (\models\DBException $dbe) {
            echo $dbe->getMessage();
        }

        $factoryFiguras = new \figuras\FactoryFiguras();
        $figuras = array();
        $figuras[] = $factoryFiguras->crearFigura('circulo', 
                                                  array('diametro' => 1));
        $figuras[] = $factoryFiguras->crearFigura('cuadrado', 
                                                  array('lado' => 5));
        $figuras[] = $factoryFiguras->crearFigura('triangulo', 
                                                  array('base' => 2, 
                                                        'altura' => 3));
        foreach ($figuras as $figura) {
            echo "Figura: " . $figura->getTipo() . '<br/>';
            echo "Superficie: " . $figura->getSuperficie() . '<br/>';
            echo "Altura: " . $figura->getAltura() . '<br/>';
            echo "Base: " . $figura->getBase() . '<br/>';
            echo "Diametro: " . $figura->getDiametro() . '<br/><br/>';
        }
        ?>
    </body>
</html>
