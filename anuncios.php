<?php 
require __DIR__ .'/includes/app.php';
incluirTemplates('header');

?>

    <main class="contenedor seccion">
        <h1>Casas y Departamentos en Venta</h1>
        <section class="seccion contenedor">
        <?php
        $limit = 6;
        include __DIR__ . '/includes/templates/anuncios.php';
        ?>
        </section>
    </main>

<?php 
incluirTemplates('footer');
?>