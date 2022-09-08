<?php

include_once 'includes/user.php';
include_once 'includes/user_session.php';


//VALIDAR SI HAY SESIONES Y DEPENDIENDO DE ESO REDIRIGIR AL USUARIO
$userSession = new UserSession();

$user = new User();

if (isset($_SESSION['user'])) {
    //validacion si hay seccion activa
    echo "Hay sesion";    
}elseif (isset($_POST['user']) && isset($_POST['passwd'])) {
    // validacion del usuario que se loguea
    // echo "Validacion de login";

    // mapear informacion
    $userForm = $_POST['user'];
    $passForm = $_POST['passwd'];

    
    if ($user->existenciadeusuario($userForm,$passForm)) {
       echo 'Usuario Correcto';
    }else {
        echo 'Nombre de usuario y/o contraseña incorrecta';
    }

}else {
    //redireccion si no hay seccion activa
    echo 'login';
    include_once 'vistas/login.php';
}

?>