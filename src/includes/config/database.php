<?php

function conectarDB() : mysqli{
    $db = mysqli_connect('localhost', 'root', '', 'bienesraices_crud');
    if (!$db) {
        echo 'Error de conexion';
        exit;
    }
    return $db;
}


// $sql = 'SELECT * FROM vendedores';
// $conexion = mysqli_query($db, $sql);
// mysqli_close($db);