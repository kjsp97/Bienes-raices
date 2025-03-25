<?php 
require __DIR__ .'/src/includes/functions.php';
incluirTemplates('header');
?>

    <main class="contenido-centrado contenedor seccion">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.avif" type="image/avif">
            <img src="build/img/destacada.jpg" alt="Casa de lujo jpg" loading="lazy">
        </picture>
        <h2>Llene el formulario</h2>

        <section class="formulario">
            <form action="" class="personalF">
                <fieldset>
                    <legend>Informacion Personal</legend>
                    
                    <div class="type">
                        <label for="name">Nombre</label>
                        <input type="text" placeholder="Tu nombre" id="name">
                    </div>
                    <div class="type">
                        <label for="email">eMail</label>
                        <input type="email" placeholder="Tu eMail" id="email">
                    </div>
                    <div class="type">
                        <label for="movil">Movil</label>
                        <input type="tel" placeholder="Tu movil" id="movil">
                    </div>
                    <div class="type">
                        <label for="text1">Mensaje</label>
                        <textarea name="text1" id="text1"></textarea>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Informacion sobre la propiedad</legend>
                    
                    <div class="type">
                        <label for="select">Venta o compra</label>
                        <select id="select" id="">
                            <option value="" hidden>--Selecionar--</option>
                            <option value="">Compra</option>
                            <option value="">Venta</option>
                        </select>
                    </div>
                    <div class="type">
                        <label for="precio">Cantidad en euros</label>
                        <input type="number" step="any" placeholder="€€€" id="precio" min="0">
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Informacion sobre la Propiedad</legend>
                    
                    <p class="texto-form" for="name">Como desea ser contactado</p>
                    <div class="type">
                        <div class="contacto-form">
                            <label for="telefono-radio">Telefono</label>
                            <input type="radio" name="contacto_form" id="telefono-radio">
                            <label for="email-radio">eMail</label>
                            <input type="radio" name="contacto_form" id="email-radio" >
                        </div>
                    </div>

                    <p class="texto-form">Fecha y hora</p>
                    <div class="type">
                        <label for="date">Fecha</label>
                        <input type="date" id="date">
                    </div>
                    <div class="type">
                        <label for="time">Hora</label>
                        <input type="time" id="time" min="09:00" max="21:00">
                    </div>
                </fieldset>
                <div class="boton-gris-from">
                    <input type="submit" class="boton-gris" value="Enviar">
                </div>
            </form>
        </section>

    </main>

<?php 
incluirTemplates('footer');
?>