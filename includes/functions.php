<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCTIONS_URL', __DIR__ . '/functions.php');
define('FUNCTIONS_IMAGENES', __DIR__ . '/../imagenes/');


function incluirTemplates(string $name, bool $inicio = false, bool $login = false) {
    include TEMPLATES_URL . "/{$name}.php";
}

function autentificacionAdmin() {
    session_start();
    if (!$_SESSION['login']) {
        header('location: /');
    }
}

function debug($variable) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
exit;
}

function printr($variable) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
exit;
}

function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function validarTipoContenido($tipo){
    $tipos = ['vendedor', 'propiedad'];
    return in_array($tipo, $tipos);
}

function mostrarAviso($id) {
    $aviso = '';
    switch ($id) {
        case '1':
            $aviso = 'Enivado Correctamente'; 
            break;
        case '2':
            $aviso = 'Actualizado Correctamente'; 
            break;
        case '3':
            $aviso = 'Eliminado Correctamente'; 
            break;
        default:
            $aviso = false;
            break;
    }
    return $aviso;
}