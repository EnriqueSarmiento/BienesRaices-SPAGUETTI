<?php 

    require 'includes/app.php';
    incluirTemplate('header');

?> 

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1> 

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpeg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="imagen nosotros">
                </picture>
            </div>
                <div class="texto-nosotros">
                    <blockquote>
                        25 Años de experiencia
                    </blockquote>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, obcaecati enim perferendis odio sunt, modi cum quia error alias, nulla distinctio et voluptatem nemo ipsum necessitatibus saepe quae id ipsa?Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum, nostrum, voluptatem aliquam laboriosam ducimus, quisquam eius nam dolor voluptate doloribus possimus inventore alias quaerat eligendi obcaecati facere libero tempore tempora.lore Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae aliquam nobis quia facilis modi voluptatum, assumenda obcaecati quidem excepturi aut consectetur sunt, est beatae porro minima consequatur. Accusantium, officia consectetur!</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora mollitia esse omnis consectetur quidem aliquam nesciunt facilis veniam fuga dolorem suscipit impedit animi tenetur nisi nemo non temporibus, nostrum voluptatum. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae ex facilis minima omnis accusantium consectetur laboriosam ratione, saepe dolorum. Corrupti debitis sapiente necessitatibus recusandae sit error autem nam mollitia molestias!</p>
                
                </div>
            
        </div>

    </main>

    <section class="contenedor seccion">
        <h1>Mas Sobre Nosotros</h1> 
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dignissimos aut ex, aspernatur consequatur voluptates minus quisquam recusandae numquam cumque dicta amet, voluptatibus asperiores ab consequuntur, accusantium obcaecati molestias labore.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dignissimos aut ex, aspernatur consequatur voluptates minus quisquam recusandae numquam cumque dicta amet, voluptatibus asperiores ab consequuntur, accusantium obcaecati molestias labore.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dignissimos aut ex, aspernatur consequatur voluptates minus quisquam recusandae numquam cumque dicta amet, voluptatibus asperiores ab consequuntur, accusantium obcaecati molestias labore.</p>
            </div>

        </div>

    </section>

<?php 
    incluirTemplate('footer');
?>