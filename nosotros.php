<?php 
require __DIR__ .'/includes/app.php';
incluirTemplates('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="contenedor nosotros-informacion">
            <picture>
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.avif" type="image/avif">
                <img src="build/img/nosotros.jpg" alt="Imagen estudio" loading="lazy">
            </picture>
            <section>
                <h4>25 Años de Experiencia</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, cum dolore ratione voluporem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, cum dolore ratione voluporem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, cum dolore ratione voluporem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, cum dolore ratione voluporem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, cum dolore ratione voluptatibus obcaecati molestias, placeat quod omnis unde dolor ea vitae eos tempore ipsam amet, reprehenderit id dolorum temporibus.</p>
            </section>

        </div>

        <section class="contenedor seccion">
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
        </section>

    </main>

<?php 
incluirTemplates('footer');
?>