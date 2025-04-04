<fieldset>
            <legend>Datos</legend>
            <div class="type">
                <label for="nombre">Nombre:</label>
                <input id="nombre" name="vendedor[nombre]" type="text" placeholder="Nombre del vendedor" value="<?php echo s($vendedor->nombre); ?>">
            </div>
            <div class="type">
                <label for="apellido">Apellidos:</label>
                <input id="apellido" name="vendedor[apellido]" type="text" placeholder="Apellidos del vendedor" value="<?php echo s($vendedor->apellido); ?>">
            </div>
</fieldset>

<fieldset>
            <legend>Extra</legend>
            <div class="type">
                <label for="movil">Movil:</label>
                <input id="movil" name="vendedor[movil]" type="tel" placeholder="Movil del vendedor" value="<?php echo s($vendedor->movil); ?>">
            </div>
</fieldset>