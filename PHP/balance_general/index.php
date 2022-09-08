<?php
    // habilitar todos los errores para que se puedan mostrar en mi aplicacion
   error_reporting(E_ALL); //motor de errores o excepciones, si se usa E_ALL son todos los errores que surjan

   ini_set('ignore_repeated_errors',TRUE);
   ini_set('display_errors',FALSE);
   ini_set('log_errors',TRUE);
   ini_set('error_log',"/xampp/htdocs/PHP/balance_general/logs/php-error.log");
   error_log("inicio de aplicacion web");


   //archivos de base de datos
   require_once 'libs/database.php';
   //clases de los mensajes 
   require_once 'classes/errormessages.php';
   require_once 'classes/successmessages.php';
   //archivos controladores
   require_once 'libs/controller.php';
   //archivos modelos
   require_once 'libs/view.php';
   //archivos base para que funcione 
   require_once 'libs/app.php';

   //archivo de configuraciones
   require_once 'config/config.php';
   

   //esto hace que automaticamente se ejecute el constructor de libs/app
   $app = new App();

?>