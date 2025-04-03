<?php

use App\Propiedad;

require __DIR__ .'/../../includes/app.php';
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;


autentificacionAdmin();

$db = conectarDB();
incluirTemplates('header');
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

$propiedad = Propiedad::find($id);
// debug($propiedad->imagen);

$errores = Propiedad::getErrors();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $args = $_POST['propiedad'];

    $propiedad->sincronizar($args);
    
    $nombreImagen = md5(uniqid(rand(), true)) . '.jpeg';
    
    if ($_FILES['propiedad']['tmp_name']['imagen']) {
        $manager = new ImageManager(Driver::class);
        $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
        $propiedad->setImage($nombreImagen);
    }
    
    $errores = $propiedad->validar();
    
    if (empty($errores)) {
        
        if (isset($imagen)) {
            if (!is_dir(FUNCTIONS_IMAGENES)) {
                mkdir(FUNCTIONS_IMAGENES);
            }
            $imagen->save(FUNCTIONS_IMAGENES . $nombreImagen);
        }

        $resultado = $propiedad->actualizar();
        if ($resultado) {
            header('Location: /admin?id=2');
        }


    }  



    // debug($propiedad);

        



    // $query = "UPDATE propiedades SET titulo = '{$titulo}', precio = '{$precio}', imagen = '{$nombreImagen}', descripcion = '{$descripcion}', habitaciones = '{$habitaciones}', wc = '{$wc}', parking = '{$parking}', vendedor = '{$vendedor}' WHERE ID = '$id' ";

    // $resultado = mysqli_query($db, $query);

    // if ($resultado) {
    //     header("Location: /admin?id=2");
    // }

}?>

<main class="contenedor seccion">
    <h1>Actualizar Propiedades</h1>
    <a href="/admin" class="boton-gris">Volver</a>

    <?php 
    foreach ($errores as $error) { ?>
        <div class="aviso error">
            <p><?php echo $error ?></p>
        </div>
    <?php
    }?>

    <form class="formulario contenedor contenido-centrado" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/../../includes/templates/formulario-propiedades.php';
        echo '<br />'?>

        <input type="submit" class="boton-verde" value="Actualizar">
    </form>
</main>

<?php 
incluirTemplates('footer');
?>