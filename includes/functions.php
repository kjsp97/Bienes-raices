<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCTIONS_URL', __DIR__ . '/functions.php');


function incluirTemplates(string $name, bool $inicio = false, bool $login = false) {
    include TEMPLATES_URL . "/{$name}.php";
}


function autentificacionAdmin() {
    session_start();
    if (!$_SESSION['login']) {
        header('location: /');
    }
}

function debugear($variable) {
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