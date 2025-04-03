<fieldset>
            <legend>Información General</legend>
            <div class="type">
                <label for="titulo">titulo:</label>
                <input id="titulo" name="propiedad[titulo]" type="text" placeholder="Titulo de la propiedad" value="<?php echo s($propiedad->titulo); ?>">
            </div>
            <div class="type">
                <label for="precio">precio:</label>
                <input id="precio" name="propiedad[precio]" type="number" step="any" placeholder="Precio de la propiedad" min="1" max="99999999" value="<?php echo s($propiedad->precio); ?>">
            </div>
            <div class="type">
                <label for="imagen">imagen:</label>
                <input id="imagen" name="propiedad[imagen]" type="file" accept="image/jpeg, image/png">
            </div>  
                <?php if ($propiedad->imagen) {?>
                <img src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen no subida" class="img-small">
                <?php }?>
                <div class="type">
                <label for="descripcion">descripcion:</label>
                <textarea name="propiedad[descripcion]"><?php echo s($propiedad->descripcion); ?></textarea>
            </div>
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>
            <div class="type">
                <label for="habitaciones">habitaciones:</label>
                <input id="habitaciones" name="propiedad[habitaciones]" type="number" placeholder="Ej: 7" value="<?php echo s($propiedad->habitaciones); ?>">
            </div>
            <div class="type">
                <label for="wc">baños:</label>
                <input id="wc" name="propiedad[wc]" type="number" placeholder="Ej: 7" value="<?php echo s($propiedad->wc); ?>">
            </div>
            <div class="type">
                <label for="parking">parking:</label>
                <input id="parking" name="propiedad[parking]" type="number" placeholder="Ej: 7" value="<?php echo s($propiedad->parking); ?>">
            </div>

        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>

        </fieldset>
