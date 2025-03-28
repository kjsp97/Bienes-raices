<?php 
require __DIR__ .'/includes/app.php';
incluirTemplates('header', true);

?>

    <main class="contenedor seccion">
        <h2>Más Sobre Nosotros</h2>
        <section class="informacion">
            <div class="informacion__icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Protegemos tus datos y operaciones con tecnología avanzada, compromiso ético y medidas robustas para garantizar tu tranquilidad.</p>
                </div>
            <div class="informacion__icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Con nuestra inmobiliaria, obtendrás las mejores oportunidades, maximizarás tus ganancias y ahorrarás tiempo gracias a nuestras soluciones eficientes.</p>
            </div>
            <div class="informacion__icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A tiempo</h3>
                <p>Con nuestra inmobiliaria, simplificamos cada proceso para que encuentres o vendas tu propiedad rápidamente y sin complicaciones.</p>
            </div>

        </section>
    </main>
    <section class="seccion contenedor">
        <h2>Casas y Departamentos en Venta</h2>
        <?php
        $limit = 3;
        include __DIR__ . '/includes/templates/anuncios.php';
        ?>

        <div class="vermas" >
            <a class="boton-verde" href="anuncios.php">Ver más</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
        <a class="boton-amarillo-dos" href="contacto.php">Contáctanos</a>

    </section>

    <div class="contenedor seccion final">
        
        <section class="nuestroBlog">
            <h3>Nuestro Blog</h3>
            <div class="blog">
                <article class="blog-entrada">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.avif" type="image/avif">
                        <img src="build/img/blog1.jpg" alt="Terraza blog 1" loading="lazy">
                    </picture>
                    <div class="blog-descripcion">
                        <a href="entrada.php">
                            <h4>Terraza en el techo de tu casa</h4>
                            <div>
                                <p>Escrito el :<span> 20/10/2024</span> por: <span>Admin</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet adipisiciit amet adipisicing elit. Aut iure quam dolor.</p>
                        </a>
            
                    </div>
                </article>
                
                <article class="blog-entrada">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.avif" type="image/avif">
                        <img src="build/img/blog2.jpg" alt="Terraza blog 1" loading="lazy">
                    </picture>
                    <div class="blog-descripcion">
                        <a href="entrada.php">
                            <h4>Guía para la dcoración de tu hogar</h4>
                            <div>
                                <p>Escrito el :<span> 20/10/2024</span> por: <span>Admin</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet adipisiciit amet adipisicing elit. Aut iure quam dolor.</p>
                        </a>
                    </div>
                </article>
            </div>

        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimoniales-entrada">
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atencion y la casa que me ofrecieron cumple con todas mis expectativas.
                    <cite>-Elon Musk</cite>
                </blockquote>
            </div>
        </section>
    </div>

<?php 
incluirTemplates('footer');
?>