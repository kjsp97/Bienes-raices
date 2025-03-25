<?php
require __DIR__ . '/../config/database.php';

$db = conectarDB();

$sqlpropiedades = "SELECT * FROM propiedades LIMIT {$limit} ";
$consulta = mysqli_query($db, $sqlpropiedades);
// echo '<pre>';
// print_r(mysqli_fetch_assoc($consulta));
// echo '</pre>';

?>

<div class="anuncios">
    <?php
            while ($row = mysqli_fetch_assoc($consulta)) { ?>
                <div class="anuncio">
                    <picture>
                        <img src="imagenes/<?php echo $row['imagen'];?>" alt="Casa de lujo jpg" loading="lazy">
                    </picture>
                <div class="anuncio__contenido">
                    <h3><?php echo $row['titulo'];?></h3>
                    <p><?php echo substr($row['descripcion'], 0, 95) . '...';?></p>
                    <p class="precio">€ <?php echo $row['precio'];?></p>
                    <ul class="anuncio__cantidad">
                        <li>
                            <img src="build/img/icono_wc.svg" alt="icono baño">
                            <p><?php echo $row['wc'];?></p>
                        </li>
                        <li>
                            <img src="build/img/icono_estacionamiento.svg" alt="icono coches">
                            <p><?php echo $row['parking'];?></p>
                        </li>
                        <li>
                            <img src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                            <p><?php echo $row['habitaciones'];?></p>
                        </li>
                    </ul>
                    <a class="boton-amarillo" href="anuncio.php?id=<?php echo $row['id'] ?>">Ver propiedad</a>
                </div>

            </div>
        <?php
            }
        ?>
    </div>