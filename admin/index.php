<?php
require __DIR__ .'/../includes/app.php';

$auth = autentificacionAdmin();
// print_r($_SESSION);
if (!$auth) {
    header('location: /');
}

$db = conectarDB();
incluirTemplates('header');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        $sqlimagen = "SELECT imagen FROM propiedades WHERE id = '{$id}' ";
        $consulta = mysqli_query($db, $sqlimagen);
        $resultadoimagen = mysqli_fetch_assoc($consulta);

        $carpetaImagenes = '../imagenes/';
        unlink($carpetaImagenes . $resultadoimagen['imagen']);
        

        $sqlborrar = "DELETE FROM propiedades WHERE id = {$id} ";

        $resultado = mysqli_query($db, $sqlborrar);
        if ($resultado) {
            header('location: /admin?valor=3');
        }
    }


    // var_dump($sqlborrar);
    
}
$sqlpropiedades = 'SELECT * FROM propiedades';

$consulta = mysqli_query($db, $sqlpropiedades);


$valor = $_GET['valor']?? null;
// echo '<pre>';
// print_r($valor);
// echo '</pre>';

?>
<div class="aviso correcto">
    <?php if ($valor === '1') { ?>
        <p> <?php echo 'Enivado Correctamente'; ?> </p>
    <?php } ?>
</div>
<div class="aviso correcto">
    <?php if ($valor === '2') { ?>
        <p> <?php echo 'Actualizado Correctamente'; ?> </p>
    <?php } ?>
</div>
<div class="aviso error">
    <?php if ($valor === '3') { ?>
        <p> <?php echo 'Eliminado Correctamente'; ?> </p>
    <?php } ?>
</div>
<main class="contenedor seccion">
    <h1>Administrador de DB</h1>
    <table class="table-propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($consulta)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['titulo']; ?></td>
                    <td class="contenedor-ti"><img src="/imagenes/<?php echo $row['imagen']; ?>" class="tabla-imagen"></td>
                    <td><?php echo $row['precio']; ?>€</td>
                    <td>
                        <a href="/admin/propiedades/actualizar.php<?php echo '?valor='. $row['id'] ?>"" class="boton-verde">Actualizar</a>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                            <input type="submit" class="boton-rojo w-100" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php }?>

        </tbody>
    </table>

    <a href="/admin/propiedades/crear.php" class="boton boton-gris">Crear Propiedad</a>
</main>

<?php 
mysqli_close($db);
incluirTemplates('footer');
?>