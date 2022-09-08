<?php

class Login extends Controller 
{
    function __construct() {
        //parientes de llama a constructor pade de controller
        parent::__construct();

        //detecta errores
        error_log('Login::construct ->inicio de Login');
    }

    function render()
    {
    //LOG DE ERRORES
    error_log('LOGIN::RENDER -> Carga el index de login');
    //    le digo que vista quiero cargar 
    $this->view->render('login/index');
    }
}
