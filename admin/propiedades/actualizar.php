<?php 
require __DIR__ .'/../../includes/app.php';


autentificacionAdmin();

$db = conectarDB();
incluirTemplates('header');
$valor = $_GET['valor'];
$valor = filter_var($valor, FILTER_VALIDATE_INT);


$sqlPropiedades = "SELECT * FROM propiedades WHERE ID = '{$valor}' ";
$consulta = mysqli_query($db, $sqlPropiedades);
$propiedad = mysqli_fetch_assoc($consulta);

$sqlVendedores = "SELECT * FROM vendedores";
$consulta_vendedor = mysqli_query($db, $sqlVendedores);

$errores = [];

$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$parking = $propiedad['parking'];
$vendedor = $propiedad['vendedor'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    // exit;
    
    // echo '<pre>';
    // var_dump($_FILES);
    // echo '</pre>';

    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $parking = mysqli_real_escape_string($db, $_POST['parking']);
    $vendedor = mysqli_real_escape_string($db, $_POST['vendedor']);
    $creacion = date('Y/m/d');
    $imagen = $_FILES['imagen'];

    // echo '<pre>';
    // var_dump($imagen);
    // echo '</pre>';
    // exit;

    if (!$titulo) {
        $errores[] = 'Titulo es obligatorio.';
    }
    if (!$precio) {
        $errores[] = 'Precio es obligatorio.';
    }
    if (strlen($descripcion) < 50) {
        $errores[] = 'Descripcion debe ser mayor a 50 caracteres.';
    }
    if (!$habitaciones) {
        $errores[] = 'Numero de habitaciones obligatorio.';
    }
    if (!$wc) {
        $errores[] = 'Numero de wc obligatorio.';
    }
    if (!$parking) {
        $errores[] = 'Numero de parkings obligatorio.';
    }
    if (!$vendedor) {
        $errores[] = 'Seleccionar vendedor.';
    }

    $medida = 40000 * 1024;
    if ($imagen['size'] > $medida) {
        $errores[] = 'Imagen muy pesada, máx 40MB.';
    }
    
    // echo '<pre>';
    // var_dump($errores);
    // echo '</pre>';
  
    if (!$errores) {
        $carpetaImagenes = '../../imagenes/';

        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        $nombreImagen = '';
        if ($imagen['name']) {
            unlink($carpetaImagenes . $propiedad['imagen']);
            $nombreImagen = md5(uniqid(rand(), true)) . '.jpeg';
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
        } else {
            $nombreImagen = $propiedad['imagen'];
        }
        
        $query = "UPDATE propiedades SET titulo = '{$titulo}', precio = '{$precio}', imagen = '{$nombreImagen}', descripcion = '{$descripcion}', habitaciones = '{$habitaciones}', wc = '{$wc}', parking = '{$parking}', vendedor = '{$vendedor}' WHERE ID = '$valor' ";

        $resultado = mysqli_query($db, $query);
    
        if ($resultado) {
            header("Location: /admin?valor=2");
        }
    }
}?>

<main class="contenedor seccion">
    <h1>Actualizar Propiedades</h1>
    <a href="/admin" class="boton-gris">Volver</a>

    <form class="formulario contenedor contenido-centrado" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>
            <div class="type">
                <label for="titulo">titulo:</label>
                <input id="titulo" name="titulo" type="text" placeholder="Titulo de la propiedad" value="<?php echo $titulo; ?>">
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
                    while ($row = mysqli_fetch_assoc($consulta_vendedor)) { ?>
                        <option <?php  echo $vendedor == $row['id'] ? 'selected' : ''; ?>  value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] .' '. $row['apellido'] ?></option>
                        <?php } ?>
                </select>
            </div>
        </fieldset>

        <input type="submit" class="boton-verde" value="Actualizar">
    </form>
</main>

<?php 
incluirTemplates('footer');
?>