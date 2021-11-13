<?php 
    require 'includes/app.php';
    $db = conectarDB();
    
    //autenticar el usuario
    $errores =[];
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // echo '<pre>';
        // var_dump($_POST);
        // echo '</pre>';
        
        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if (!$email){
            $errores[] = "El email es obligatorio o no es valido";
        }
        if (!$password) {
            $errores[] = "El Password es obligatorio";
        }

        // echo '<pre>';
        // var_dump($errores);
        // echo '</pre>';
        
        if (empty($errores)){

            //revisar si el usuario existe un usuario
            $query = " SELECT * FROM usuarios WHERE email = '${email}' ";
            $resultado = mysqli_query($db, $query);

            // var_dump($resultado);
            
            
             if ( $resultado -> num_rows ) {
                 //validar que la contrasena sea correcta
                 $usuario = mysqli_fetch_assoc($resultado);
                //  var_dump($usuario);

                 //verificar si el password es correcto o no.
                 $auth = password_verify($password, $usuario['password']);

                 if ($auth) {
                     // El usuario esta autenticado
                    session_start();

                    //llenar el arreglo de la sesion
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true; 


                    header('location: /admin');
                    


                 }else{
                     $errores[] = "El Password es incorrecto";
                 }

             }else{
                 $errores[] = "El Usuario no existe";
             }


        }


    }

    //incluye el header 
    incluirTemplate('header');

?> 


    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1> 

        <?php foreach ($errores as $error): ?>

            <div class="alerta error">
                <?php echo $error; ?>
            </div>

        <?php endforeach; ?>

        <form class="formulario" method="POST" novalidate>
        <fieldset>
                <legend>Email y Password</legend>

                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Correo Electronico" id="email">

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Tu Password" id="password" >

            </fieldset>

            <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
        
        </form>

    </main>

 <?php 
    incluirTemplate('footer');
?>