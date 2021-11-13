<?php

require '../../includes/app.php';

use App\Propiedad;
use App\Vendedor; 
use Intervention\Image\ImageManagerStatic as Image; 

    estaAutenticado();

    //validar que sea un ID valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('Location: /admin');
    }
     
    //consultar para obtener los datos de propiedades
    $propiedad = Propiedad::find($id);
        
    // Consultar para obtener los vendedores
    $vendedores = Vendedor::all();

    //arreglo con mensajes de errores
    $errores = Propiedad::getErrores();

    //ejecutar el codigo despues de que el usuario envia el formulario
    if ($_SERVER['REQUEST_METHOD']=== 'POST') {
        //Asignar los atributos
        $args = $_POST['propiedad'];

        $propiedad->sincronizar($args);

        //validar
        $errores = $propiedad->validar();

        /** subida de archivos */
        // Generar un nombre unico
        $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

        //Setaer la Imagen
        //Realiza un rezise a la imagen con intervention
        if ($_FILES['propiedad']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600); 
            $propiedad->setImagen($nombreImagen);
        }

        if (empty($errores)){
            //almacenar la imagen en disco duro
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image->save(CARPETA_IMAGENES . $nombreImagen);           
            }
            $propiedad->guardar(); 
        }
    }
    incluirTemplate('header');
?> 


    <main class="contenedor seccion">
        <h1>ACTUALIZAR</h1> 

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach ($errores as $error){; ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php }?>


        <form class="formulario" method="POST"  enctype="multipart/form-data">

            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>