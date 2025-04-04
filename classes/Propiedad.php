<?php

namespace App;

class Propiedad extends ActiveRecord{
    protected static $tabla = 'propiedades';
    protected static $columnaDB = ['id','titulo','precio','imagen','descripcion','habitaciones','wc','parking','creacion','vendedor'];


    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $parking;
    public $creacion;
    public $vendedor;

    function __construct($args = [])
    {
        $this->id = $args['id']?? null;
        $this->titulo = $args['titulo']?? '';
        $this->precio = $args['precio']?? '';
        $this->imagen = $args['imagen']?? '';
        $this->descripcion = $args['descripcion']?? '';
        $this->habitaciones = $args['habitaciones']?? '';
        $this->wc = $args['wc']?? '';
        $this->parking = $args['parking']?? '';
        $this->creacion = date('Y/m/d');
        $this->vendedor = $args['vendedor']?? '';
    }

    public function validar(){
        if (!$this->titulo) {
            self::$errores[] = 'Titulo es obligatorio.';
        }
        if (!$this->precio) {
            self::$errores[] = 'Precio es obligatorio.';
        }
        if (strlen($this->descripcion) < 50) {
            self::$errores[] = 'Descripcion debe ser mayor a 50 caracteres.';
        }
        if (!$this->habitaciones) {
            self::$errores[] = 'Numero de habitaciones obligatorio.';
        }
        if (!$this->wc) {
            self::$errores[] = 'Numero de wc obligatorio.';
        }
        if (!$this->parking) {
            self::$errores[] = 'Numero de parkings obligatorio.';
        }
        if (!$this->vendedor) {
            self::$errores[] = 'Seleccionar vendedor!';
        }
        if (!$this->imagen) {
            self::$errores[] = 'Imagen obligatoria.';
        }

        return self::$errores;
    }
}
