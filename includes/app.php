<?php

require __DIR__ . '/functions.php';
require __DIR__ . '/config/database.php';
require __DIR__ . '/../vendor/autoload.php';

use App\Propiedades;

$propiedad = new Propiedades;

var_dump($propiedad);