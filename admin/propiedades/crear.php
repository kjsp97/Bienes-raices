<?php 
require __DIR__ .'/../../includes/app.php';

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

autentificacionAdmin();

incluirTemplates('header');

$propiedad = new Propiedad;
$vendedores = Vendedor::all();

$errores = Propiedad::getErrors();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $propiedad = new Propiedad($_POST['propiedad']);

    $nombreImagen = md5(uniqid(rand(), true)) . '.jpeg';
    
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $manager = new ImageManager(Driver::class);
        $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
        $propiedad->setImage($nombreImagen);
    }

    $errores = $propiedad->validar();
    
    if (empty($errores)) {

        if (!is_dir(FUNCTIONS_IMAGENES)) {
            mkdir(FUNCTIONS_IMAGENES);
        }

        $imagen->save(FUNCTIONS_IMAGENES . $nombreImagen);
        $propiedad->guardar();
    }    
}
?>

<main class="contenedor seccion">
    <h1>Creador de Propiedades</h1>
    <a href="/admin" class="boton-gris">Volver</a>

<?php 
    foreach ($errores as $error) { ?>
        <div class="aviso error">
            <p><?php echo $error ?></p>
        </div>
    <?php
}?>

    <form class="formulario contenedor contenido-centrado" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
        <?php include __DIR__ . '/../../includes/templates/formulario-propiedades.php';
        echo '<br />'?>

        <input type="submit" class="boton-verde" value="Enviar">
    </form>

</main>

<?php 
incluirTemplates('footer');
?>