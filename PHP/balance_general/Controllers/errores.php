<?php

class Errores extends Controller{
     function __construct() {
        //MANDAR A LLAMAR AL CONSTRUCTOR PADRE
        parent::__construct();
        error_log('Errores::constructores->inicio de errores');
    }

    function render()
    {
        error_log('Error::render -> error a cargar la vista');
        $this->view->render('errores\index');
    }
}