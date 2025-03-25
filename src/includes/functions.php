<?php

require __DIR__ . '/app.php';

function incluirTemplates(string $name, bool $inicio = false, $login = false) {
    include TEMPLATES_URL . "/{$name}.php";
}


function autentificacionAdmin() : bool {
    session_start();
    $auth = $_SESSION['login'];
    if ($auth) {
        return true;
    }
    return false;
}
