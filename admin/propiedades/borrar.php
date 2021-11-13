<?php 
    require '../../includes/app.php';
    $auth = estaAutenticado();

    if (!$auth) {
        header('location: /');
    }
    incluirTemplate('header');
?> 


    <main class="contenedor seccion">
        <h1>BORRAR</h1> 
    </main>

<?php 
    incluirTemplate('footer');
?>