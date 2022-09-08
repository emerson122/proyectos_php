<?php


class UserSession {

    // inicializar sesion de php
    public function __construct()
    {
        session_start();
    }

    // generar sesion con el usuario que se logue
    public function setCurrent($user)
    {
       $_SESSION['user']=$user;
    }

    // devolver la sesion que se genero del usuario que se logueo
    public function getCurrentUser()
    {
       return $_SESSION['user'];
    }

    public function closeSession()
    {
        // borra los valores de las sesiones 
        session_unset(); 
        session_destroy();
    }


}
    


?>