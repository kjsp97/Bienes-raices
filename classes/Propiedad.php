<?php

namespace App;




class Propiedad {
    protected static $db;

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
        $this->id = $args['id']?? '';
        $this->titulo = $args['titulo']?? '';
        $this->precio = $args['precio']?? '';
        $this->imagen = $args['imagen']?? 'imagen.jpeg';
        $this->descripcion = $args['descripcion']?? '';
        $this->habitaciones = $args['habitaciones']?? '';
        $this->wc = $args['wc']?? '';
        $this->parking = $args['parking']?? '';
        $this->creacion = date('Y/m/d');
        $this->vendedor = $args['vendedor']?? '';
    }

    public function guardar() {
        $query = "INSERT INTO propiedades (titulo, precio, imagen,descripcion, habitaciones, wc, parking, creacion, vendedor) VALUES ('$this->titulo', '$this->precio', '$this->imagen','$this->descripcion', '$this->habitaciones', '$this->wc', '$this->parking', '$this->creacion', '$this->vendedor')";
        // $resultado = self::$db->query($query);
    }
    
    public static function setDB($database){
        self::$db = $database;
    }
    


}
