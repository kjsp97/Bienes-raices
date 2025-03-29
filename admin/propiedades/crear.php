<?php 
require __DIR__ .'/../../includes/app.php';

use App\Propiedad;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

autentificacionAdmin();

$db = conectarDB(); 
incluirTemplates('header');

$sqlVendedores = 'SELECT * FROM vendedores';
$consulta = mysqli_query($db, $sqlVendedores);


$errores = Propiedad::getErrors();

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$parking = '';
$vendedor = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $propiedad = new Propiedad($_POST);
    
    $nombreImagen = md5(uniqid(rand(), true)) . '.jpeg';

    if ($_FILES['imagen']['tmp_name']) {
        $manager = new ImageManager(Driver::class);
        $imagen = $manager->read($_FILES['imagen']['tmp_name'])->cover(800, 600);
        $propiedad->getImage($nombreImagen);
    }

    $errores = $propiedad->validar();

    // debugear($errores);
    
    if (empty($errores)) {
        
        $carpetaImagenes = '../../imagenes/';

        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        $imagen->save($carpetaImagenes . $nombreImagen);

        $resultado = $propiedad->guardar();
        if ($resultado) {
            header('Location: /admin?valor=1');
        }
    }
    // debugear($propiedad);
    
    
    // debugear($_POST);
    // debugear($_FILES);

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
        <fieldset>
            <legend>Información General</legend>
            <div class="type">
                <label for="titulo">titulo:</label>
                <input id="titulo" name="titulo" type="text" placeholder="Titulo de la propiedad" value="<?php echo $propiedad->titulo?? ''; ?>">
            </div>
            <div class="type">
                <label for="precio">precio:</label>
                <input id="precio" name="precio" type="number" step="any" placeholder="Precio de la propiedad" min="1" max="99999999" value="<?php echo $precio; ?>">
            </div>
            <div class="type">
                <label for="imagen">imagen:</label>
                <input id="imagen" name="imagen" type="file" accept="image/jpeg, image/png">
            </div>
            <div class="type">
                <label for="descripcion">descripcion:</label>
                <textarea name="descripcion"><?php echo $descripcion; ?></textarea>
            </div>
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>
            <div class="type">
                <label for="habitaciones">habitaciones:</label>
                <input id="habitaciones" name="habitaciones" type="number" placeholder="Ej: 7" value="<?php echo $habitaciones; ?>">
            </div>
            <div class="type">
                <label for="wc">baños:</label>
                <input id="wc" name="wc" type="number" placeholder="Ej: 7" value="<?php echo $wc; ?>">
            </div>
            <div class="type">
                <label for="parking">parking:</label>
                <input id="parking" name="parking" type="number" placeholder="Ej: 7" value="<?php echo $parking; ?>">
            </div>

        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <div class="type">
                <select name="vendedor">
                    <option value="" hidden>--Seleccionar--</option>
                    <?php 
                    while ($row = mysqli_fetch_assoc($consulta)) { ?>
                        <option  <?php  echo $vendedor === $row['id'] ? 'selected' : ''; ?>  value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] .' '. $row['apellido'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </fieldset>

        <input type="submit" class="boton-verde" value="Enviar">
    </form>
</main>

<?php 
incluirTemplates('footer');
?>