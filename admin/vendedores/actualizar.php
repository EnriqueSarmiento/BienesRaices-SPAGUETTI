<?php 
    //base de datos
    require '../../includes/app.php';

    use App\Vendedor;

    estaAutenticado();

    //validar id 
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    // EN CASO DE NO SER IN ID VALIDO REDIRECCIONAR
    if (!$id) {
        header('location: /admin'); 
    }

    //obtener el arreglo del vendedor
    $vendedor = Vendedor::find($id);

    //arreglo con mensajes de errores
    $errores = vendedor::getErrores();

    //ejecutar el codigo despues de que el usuario envia el formulario
    if ($_SERVER['REQUEST_METHOD']=== 'POST') {
       
        //Asignar los valores
        $args = $_POST['vendedor']; 
        //sincronizar los datos en memoria con lo que el usuario escribio
        $vendedor->sincronizar($args); 
        //validacion
        $errores = $vendedor->validar(); 
        //guardar informacion en la bd
        if (empty($errores)) {
            $vendedor->guardar();
        }

    }
 
    incluirTemplate('header');
?> 
    <main class="contenedor seccion">
        <h1>Actualizar Vendedor(a)</h1> 

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach ($errores as $error){; ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php }?>

        <form class="formulario" method="POST" >

            <!-- INCLUIR FORMULARIO -->
            <?php include '../../includes/templates/formulario_vendedores.php'; ?>

            <input type="submit" value="Actualizar Vendedor" class="boton boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>
