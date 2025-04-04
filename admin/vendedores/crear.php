<?php
require __DIR__ . '/../../includes/app.php';

autentificacionAdmin();

use App\Vendedor;

$vendedor = new Vendedor;

$errores = Vendedor::getErrors();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $vendedor = new Vendedor($_POST['vendedor']);
    
    $errores = $vendedor->validar();

    if (empty($errores)) {
        $vendedor->guardar();
    }

    
}


incluirTemplates('header');
?>

<main class="contenedor seccion">
    <h1>Registro de Vendedores</h1>
    <a href="/admin" class="boton-gris">Volver</a>

<?php 
    foreach ($errores as $error) { ?>
        <div class="aviso error">
            <p><?php echo $error ?></p>
        </div>
    <?php
}?>

    <form class="formulario contenedor contenido-centrado" method="POST" action="/admin/vendedores/crear.php">
        <?php include __DIR__ . '/../../includes/templates/formulario-vendedores.php';
        echo '<br />'?>

        <input type="submit" class="boton-verde" value="Enviar">
    </form>

</main>

<?php 
incluirTemplates('footer');
?>
