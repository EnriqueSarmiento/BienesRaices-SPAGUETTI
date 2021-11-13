<?php

define('TEMPLATES_URL',__DIR__ . '/templates');
define('FUNCIONES_URL',__DIR__ . 'funciones.php');
define ('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');

function incluirTemplate($nombre, $inicio = false){
    include  TEMPLATES_URL . "/${nombre}.php";

}

function estaAutenticado() {
     session_start();

    if (!$_SESSION['login']){
        header('location: /');
    }
}

function debuguear($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}
//escapa / sanitizar el HTML
function s($html) : string {
    $s=htmlspecialchars($html);

    return $s;
}

//Validar que es id es de vendedores o de propiedades
function validarTipoContenido($tipo){
    $tipos = ['propiedad', 'vendedor'];

    return in_array($tipo, $tipos);
}

//mensaje de alerta
function mostrarNotificacion($resultado){
    $mensaje = ''; 
    switch ($resultado) {
        case 1:
            $mensaje = 'Creado Correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado Correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado Correctamente';
            break;

        default:
            $mensaje = false; 
            break;
    }

    return $mensaje; 
}