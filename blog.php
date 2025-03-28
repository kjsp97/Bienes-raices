<?php 
require __DIR__ .'/includes/app.php';
incluirTemplates('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h3>Blog</h3>
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

            <article class="blog-entrada">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.avif" type="image/avif">
                    <img src="build/img/blog3.jpg" alt="Terraza blog 1" loading="lazy">
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
                    <source srcset="build/img/blog4.webp" type="image/webp">
                    <source srcset="build/img/blog4.avif" type="image/avif">
                    <img src="build/img/blog4.jpg" alt="Terraza blog 1" loading="lazy">
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
    </main>

<?php 
incluirTemplates('footer');
?>