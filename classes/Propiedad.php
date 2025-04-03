<?php

namespace App;

class Propiedad {
    protected static $db;
    protected static $columnaDB = ['id','titulo','precio','imagen','descripcion','habitaciones','wc','parking','creacion','vendedor'];
    protected static $errores = [];

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
        $this->vendedor = $args['vendedor']?? '1';
    }

    public function guardar(){
        if (!is_null($this->id)) {
            return $this->actualizar();
        }else{
            return $this->crear();
        }
    }
    

    public function crear() {
        $atributos = $this->sanitizar();
        $atributosKeys = join(" ," ,array_keys($atributos));
        $atributosValues = join("' , '", array_values($atributos));

        $query = "INSERT INTO propiedades ($atributosKeys) VALUES ('$atributosValues')";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function actualizar(){
        $atributos = $this->sanitizar();
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}= '{$value}' ";
        }
        $query = "UPDATE propiedades SET ". join(', ', $valores) . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1 ";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public function eliminar($id){
        $query = "DELETE FROM propiedades WHERE id = " . self::$db->escape_string($id) ;
        $resultado = self::$db->query($query);
        return $resultado;
    }
    
    public static function setDB($database){
        self::$db = $database;
    }
    
    public function atributos() {
        $atributos = [];
        foreach (self::$columnaDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizar (){
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    public static function getErrors(){
        return self::$errores;
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
            self::$errores[] = 'Seleccionar vendedor.';
        }
        if (!$this->imagen) {
            self::$errores[] = 'Imagen obligatoria.';
        }

        return self::$errores;
    }

    public function setImage($imagen) {
        if (!is_null($this->id)) {
            $this->deleteImage();
        }

        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    public function deleteImage() {
        $existeArchivo = file_exists(FUNCTIONS_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(FUNCTIONS_IMAGENES . $this->imagen);
        }
    }

    public static function all() {
        $query = 'SELECT * FROM propiedades';
        return self::consultarQuery($query);
    }

    public static function consultarQuery($query) {
        $resultado = self::$db->query($query);
        $array = [];
        while ($row = $resultado->fetch_assoc()) {
            $array[] = self::crearObjeto($row);
        }
        $resultado->free();
        return $array;
    }

    public static function crearObjeto($row) {
        $objeto = new self;
        foreach ($row as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    public static function find($id){
        $query = "SELECT * FROM propiedades WHERE id = '{$id}' ";
        $consulta = self::consultarQuery($query);
        return array_shift($consulta);
    }

    public function sincronizar($args = []) {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
