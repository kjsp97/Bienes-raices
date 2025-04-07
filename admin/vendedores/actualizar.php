<?php
require __DIR__ . '/../../includes/app.php';

autentificacionAdmin();

use App\Vendedor;

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

$vendedor = Vendedor::find($id);

$errores = Vendedor::getErrors();

incluirTemplates('header');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $args = $_POST['vendedor'];
    $vendedor->sincronizar($args);
    
    $errores = $vendedor->validar();
    
    if (empty($errores)) {
        $vendedor->guardar();
    }
}

?>

<main class="contenedor seccion">
    <h1>Actualizacion de Vendedores</h1>
    <a href="/admin" class="boton-gris">Volver</a>

<?php 
    foreach ($errores as $error) { ?>
        <div class="aviso error">
            <p><?php echo $error ?></p>
        </div>
    <?php
}?>

    <form class="formulario contenedor contenido-centrado" method="POST">
        <?php include __DIR__ . '/../../includes/templates/formulario-vendedores.php';
        echo '<br />'?>

        <input type="submit" class="boton-verde" value="Actualizar">
    </form>

</main>

<?php 
incluirTemplates('footer');
?>
