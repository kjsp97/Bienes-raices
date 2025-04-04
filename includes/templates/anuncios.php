<?php

use App\Propiedad;

$propiedades = Propiedad::all($limit);
// debug($propiedades);

?>

<div class="anuncios">
    <?php 
    foreach ($propiedades as $propiedad) { ?>
                <div class="anuncio">
                    <picture>
                        <img src="imagenes/<?php echo $propiedad->imagen;?>" alt="Casa de lujo jpg" loading="lazy">
                    </picture>
                <div class="anuncio__contenido">
                    <h3><?php echo $propiedad->titulo;?></h3>
                    <p><?php echo substr($propiedad->descripcion, 0, 95) . '...';?></p>
                    <p class="precio">€ <?php echo $propiedad->precio;?></p>
                    <ul class="anuncio__cantidad">
                        <li>
                            <img src="build/img/icono_wc.svg" alt="icono baño">
                            <p><?php echo $propiedad->wc;?></p>
                        </li>
                        <li>
                            <img src="build/img/icono_estacionamiento.svg" alt="icono coches">
                            <p><?php echo $propiedad->parking;?></p>
                        </li>
                        <li>
                            <img src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                            <p><?php echo $propiedad->habitaciones;?></p>
                        </li>
                    </ul>
                    <a class="boton-amarillo" href="anuncio.php?id=<?php echo $propiedad->id; ?>">Ver propiedad</a>
                </div>

            </div>
        <?php
            }
        ?>
    </div>