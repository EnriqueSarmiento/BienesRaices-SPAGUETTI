<?php 
    //base de datos
    require '../../includes/app.php';

    use App\Vendedor;

    estaAutenticado();

    // Consultar para obtener los vendedores
    $vendedores = Vendedor::all();

    //arreglo con mensajes de errores
    $errores = vendedor::getErrores();

    // LIMPIANDO VALORES DEL FORMULARIO
    $vendedor = new Vendedor;

    //ejecutar el codigo despues de que el usuario envia el formulario
    if ($_SERVER['REQUEST_METHOD']=== 'POST') {

        //creando una instancia de vendedor
        $vendedor = new Vendedor($_POST['vendedor']);

        //validar campos de formulario
        $errores = $vendedor->validar();

        if (empty($errores)) {

            $vendedor->guardar();
        }



    }
 
    incluirTemplate('header');
?> 
    <main class="contenedor seccion">
        <h1>Registrar Vendedor(a)</h1> 

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach ($errores as $error){; ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php }?>

        <form class="formulario" method="POST" action="/admin/vendedores/crear.php">

            <!-- INCLUIR FORMULARIO -->
            <?php include '../../includes/templates/formulario_vendedores.php'; ?>

            <input type="submit" value="Registrar Vendedor" class="boton boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>
