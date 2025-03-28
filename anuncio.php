<?php 
require __DIR__ .'/includes/app.php';
$db = conectarDB();
incluirTemplates('header');

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
if ($id) {
    $sql = "SELECT * FROM propiedades WHERE id = {$id}";
    $consulta = mysqli_query($db, $sql);
    $propiedad = mysqli_fetch_assoc($consulta);
    // print_r($consulta);
}else{
    header('location: /');
}
if (!$consulta->num_rows) {
    header('location: /');
}
?>

    <main class="contenido-centrado contenedor seccion">
        <h1><?php echo $propiedad['titulo'];?></h1>
            <picture>
                <!-- <source srcset="build/img/destacada.webp" type="image/webp">
                <source srcset="build/img/destacada.avif" type="image/avif"> -->
                <img src="imagenes/<?php echo $propiedad['imagen'];?>" alt="Casa de lujo jpg" loading="lazy">
            </picture>
            <div class="anuncio__contenido">
                <p class="precio centrar">€ <?php echo $propiedad['precio'];?></p>
                <ul class="anuncio__cantidad">
                    <li>
                        <img src="build/img/icono_wc.svg" alt="icono baño">
                        <p><?php echo $propiedad['wc'];?></p>
                    </li>
                    <li>
                        <img src="build/img/icono_estacionamiento.svg" alt="icono coches">
                        <p><?php echo $propiedad['parking'];?></p>
                    </li>
                    <li>
                        <img src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                        <p><?php echo $propiedad['habitaciones'];?></p>
                    </li>
                </ul>
                <p><?php echo $propiedad['descripcion'];?></p>
            </div>
    </main>

<?php 
incluirTemplates('footer');
?>