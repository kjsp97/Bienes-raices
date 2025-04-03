<?php
require __DIR__ .'/../includes/app.php';
autentificacionAdmin();
use App\Propiedad;

$propiedades = Propiedad::all();
// debug($propiedades);


$id = $_GET['id']?? null;


incluirTemplates('header');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = $_POST['id'];
    
    if ($id) {

        $propiedad = Propiedad::find($id);
        $propiedad->deleteImage();
        $resultado = $propiedad->eliminar($id);
            
        if ($resultado) {
            header('Location: /admin?id=3');
        }
        
    }
}

?>
<div class="aviso correcto">
    <?php if ($id === '1') { ?>
        <p> <?php echo 'Enivado Correctamente'; ?> </p>
    <?php } ?>
</div>
<div class="aviso correcto">
    <?php if ($id === '2') { ?>
        <p> <?php echo 'Actualizado Correctamente'; ?> </p>
    <?php } ?>
</div>
<div class="aviso error">
    <?php if ($id === '3') { ?>
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
            <?php foreach ($propiedades as $propiedad) {?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td class="contenedor-ti"><img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="tabla-imagen"></td>
                    <td><?php echo $propiedad->precio; ?>€</td>
                    <td>
                        <a href="/admin/propiedades/actualizar.php<?php echo '?id='. $propiedad->id; ?>"" class="boton-verde">Actualizar</a>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
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