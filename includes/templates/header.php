<?php
if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login']?? false;
// var_dump($auth);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes y Raices</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body class="<?php echo $login? 'page': ''; ?>">
    <header class="header <?php echo $inicio? 'inicio': ''?>">
        <div class="contenedor contenido-header">

            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo de bienes Raices" class="logo">
                </a>
                <div class="menu-barra">
                    <img class="icono-menu" src="/build/img/barras.svg" alt="barra navegacion">
                </div>

                <nav class="navegacion">
                    <a href="nosotros.php">Nosotros</a>
                    <a href="anuncios.php">Anuncios</a>
                    <a href="blog.php">Blog</a>
                    <a href="contacto.php">Contacto</a>
                    <a href="<?php echo !$auth? '/login.php': '/logout.php'?>"><?php echo !$auth? 'conectarse': 'cerrar sesion'?></a>
                    <a href="#">
                        <img src="/build/img/dark-mode.svg" alt="luna dark-mode">
                    </a>
                </nav>

            </div>
            
            <?php echo $inicio? '<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>': ''?>
        </div>
    </header>