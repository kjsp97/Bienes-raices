<?php 
require __DIR__ .'/src/includes/functions.php';
incluirTemplates('header');
?>

    <main class="contenido-centrado contenedor seccion">
        <h1>Guía para la dcoración de tu hogar</h1>
        <article>
            <picture>
                <source srcset="build/img/destacada2.webp" type="image/webp">
                <source srcset="build/img/destacada2.avif" type="image/avif">
                <img src="build/img/destacada2.jpg" alt="Terraza blog 1" loading="lazy">
            </picture>
                <div class="blog-descripcion">
                    <p>Escrito el :<span> 20/10/2024</span> por: <span>Admin</span></p>
                </div>
                <p>Cras tempus tellus nisi, sed rutrum felis faucibus at. Duis dui dolor, consectetur at diam eu, varius porttitor erat. Suspendisse placerat, dolor rutrum congue condimentum, justo risus finibus orci, vitae euismod nibh nunc et urna. Donec lorem erat, pharetra non vulputate vitae, feugiat eget eros. Vivamus eget risus eu purus suscipit ultrices. Donec sed euismod dolor. Cras efficitur sit amet velit in fermentum. Donec sed diam accumsan, rhoncus nisl quis, lobortis diam. Etiam venenatis quam eu lacus cursus varius. Nulla posuere massa odio, eget mollis turpis dictum vel. Sed vel leo vel mauris facilisis tristique nec ac quam. Pellentesque condimentum arcu mauris, venenatis porttitor urna vestibulum nec. Praesent elementum sodales mi non dapibus. Suspendisse placerat urna erat, a ultricies est aliquam dignissim. Suspendisse et enim ut velit hendrerit dapibus. Sed vehicula molestie feugiat. Vivamus cursus placerat magna sit amet egestas. Nunc vulputate, ipsum sed hendrerit imperdiet, quam dolor lobortis leo, ut condimentum nulla augue sed lacus. In hac habitasse platea dictumst. Praesent venenatis ut massa eu varius. Nunc malesuada metus sapien, eget sagittis urna porttitor eu. Maecenas placerat dolor at tempus aliquam. Vivamus et massa condimentum, laoreet turpis et, ultrices justo. Sed rhoncus, dolor at varius dignissim, turpis enim rutrum libero, lobortis sollicitudin erat mauris eget ante. Donec quis augue nibh.</p>
                <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin blandit enim purus, a pretium ante rutrum a. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer accumsan tortor id eros vestibulum vestibulum non et urna.</p>
    
        </article>
    </main>

<?php 
incluirTemplates('footer');
?>