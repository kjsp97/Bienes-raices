<?php
require __DIR__ .'/../includes/app.php';
autentificacionAdmin();
use App\Propiedad;
use App\Vendedor;

$propiedades = Propiedad::all();
$vendedores = Vendedor::all();

$id = $_GET['id']?? null;

incluirTemplates('header');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if ($id) {

        $tipo = $_POST['tipo'];

        if (validarTipoContenido($tipo)) {
            if ($tipo === 'propiedad') {
                $propiedad = Propiedad::find($id);
                $propiedad->deleteImage();
                $resultado = $propiedad->eliminar($id);

            } elseif($tipo === 'vendedor') {
                $vendedor = Vendedor::find($id);
                $resultado = $vendedor->eliminar($id);
            }

        }
    }
}


?>
<div class="aviso neutro">
    <?php 
    $mensaje = mostrarAviso(intval($id));
    if ($mensaje) { ?>
        <p> <?php echo s($mensaje); ?> </p>
    <?php } ?>
</div>


<main class="contenedor seccion">
    <h1>Administrador de DB</h1>
    <a href="/admin/propiedades/crear.php" class="boton boton-gris">Crear Propiedad</a>
    <a href="/admin/vendedores/crear.php" class="boton boton-gris">Crear Vendedor</a>
    <h2>Propiedades</h2>
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
                        <a href="/admin/propiedades/actualizar.php<?php echo '?id='. $propiedad->id; ?>" class="boton-verde">Actualizar</a>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo w-100" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php }?>

        </tbody>
    </table>

    <h2>Vendedores</h2>
    <table class="table-propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Movil</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendedores as $vendedor) {?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre . ' ' . $vendedor->apellido; ?></td>
                    <td><?php echo $vendedor->movil; ?></td>
                    <td>
                        <a href="/admin/vendedores/actualizar.php<?php echo '?id='. $vendedor->id; ?>" class="boton-verde">Actualizar</a>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo w-100" value="Eliminar">
                        </form>
                    </td>
                </tr>
            <?php }?>

        </tbody>
    </table>
</main>

<?php 
incluirTemplates('footer');
?>