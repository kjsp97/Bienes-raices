<?php

namespace App;

class ActiveRecord {
    protected static $db;
    protected static $tabla = '';
    protected static $errores = [];


    public function guardar(){
        if (!is_null($this->id)) {
            $this->actualizar();
        }else{
            $this->crear();
        }
    }
    

    public function crear() {
        $atributos = $this->sanitizar();
        $atributosKeys = join(" ," ,array_keys($atributos));
        $atributosValues = join("' , '", array_values($atributos));

        $query = "INSERT INTO " . static::$tabla . " ($atributosKeys) VALUES ('$atributosValues')";
        $resultado = self::$db->query($query);
        if ($resultado) {
            header('Location: /admin?id=1');
        }
    }

    public function actualizar(){
        $atributos = $this->sanitizar();
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}= '{$value}' ";
        }
        $query = "UPDATE " . static::$tabla . " SET ". join(', ', $valores) . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1 ";
        $resultado = self::$db->query($query);
        if ($resultado) {
            header('Location: /admin?id=2');
        }
    }

    public function eliminar($id){
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($id) . " LIMIT 1 ";
        $resultado = self::$db->query($query);
        if ($resultado) {
            header('Location: /admin?id=3');
        }
    }
    
    public static function setDB($database){
        self::$db = $database;
    }
    
    public function atributos() {
        $atributos = [];
        foreach (static::$columnaDB as $columna) {
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
        return static::$errores;
    }

    public function validar(){
        static::$errores = [];
        return static::$errores;
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

    public static function all($limit = null) {
        // debug(static::$tabla);
        $query = 'SELECT * FROM ' . static::$tabla . ($limit !==null? ' LIMIT ' . intval($limit) : '');
        return self::consultarQuery($query);
    }

    public static function consultarQuery($query) {
        $resultado = self::$db->query($query);
        $array = [];
        while ($row = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($row);
        }
        $resultado->free();
        return $array;
    }

    public static function crearObjeto($row) {
        $objeto = new static;
        foreach ($row as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    public static function find($id){
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = '{$id}' ";
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