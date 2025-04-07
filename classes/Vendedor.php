<?php

namespace App;

class Vendedor extends ActiveRecord{
    protected static $tabla = 'vendedores';
    protected static $columnaDB = ['id','nombre','apellido','movil'];


    public $id;
    public $nombre;
    public $apellido;
    public $movil;

    function __construct($args = [])
    {
        $this->id = $args['id']?? null;
        $this->nombre = $args['nombre']?? '';
        $this->apellido = $args['apellido']?? '';
        $this->movil = $args['movil']?? '';
    }

    public function validar(){
        if (!$this->nombre) {
            self::$errores[] = 'Nombre es obligatorio.';
        }
        if (!$this->apellido) {
            self::$errores[] = 'Apellidos son obligatorios.';
        }
        if (!$this->movil) {
            self::$errores[] = 'Movil es obligatorio.';
        }
        if ($this->movil && !preg_match('/^\d{9}$/', $this->movil)) {
            self::$errores[] = 'Formato no valido.';
        }
        
        return self::$errores;
    }
}