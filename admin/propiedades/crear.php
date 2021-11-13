<?php 
    //base de datos
    require '../../includes/app.php';

    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image; 
    use App\Vendedor;

    estaAutenticado();

    // Consultar para obtener los vendedores
    $vendedores = Vendedor::all();

    //arreglo con mensajes de errores
    $errores = Propiedad::getErrores();

    // LIMPIANDO VALORES DEL FORMULARIO
    $propiedad = new Propiedad;

    //ejecutar el codigo despues de que el usuario envia el formulario
    if ($_SERVER['REQUEST_METHOD']=== 'POST') {
        
        $propiedad = new Propiedad($_POST['propiedad']);
        /** subida de archivos */
        // Generar un nombre unico
        $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

        //Setaer la Imagen
        //Realiza un rezise a la imagen con intervention
        if ($_FILES['propiedad']['tmp_name']['imagen']) {
            $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600); 
            $propiedad->setImagen($nombreImagen);
        }

        //Validar los datos 
        $errores = $propiedad->validar();

        if (empty($errores)){

            //crear carpeta para subir imagenes
            if (!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }
                
            //Subir imagen al servidor usando intervention
            $image->save( CARPETA_IMAGENES . $nombreImagen);

            // Guarda en la Base de Datos
            $propiedad->guardar();

            //Mensaje de exito o de error. 
        }

    }
 
    incluirTemplate('header');
?> 


    <main class="contenedor seccion">
        <h1>CREAR</h1> 

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach ($errores as $error){; ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php }?>


        <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">

            <!-- INCLUIR FORMULARIO -->

            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>
