<?php

//importar errores
require_once 'controllers\errores.php';

class App
{
    /* este archivo carga y importa las direcciones dentro de la aplicacion web que se especifique y se redirige al usuario al
    controlador que corresponda dependiendo de los parametros que se ponga se va ir a cada uno de los cotroladores que
    a su vez los controladores van a solicitar datos en este caso de nuestra base de datos y van a presentar la vista dependiendo
    de lo que nosotros soliciemos va a presentar la vista al usuario*/

    // primero se construye el contructor
    public function __construct()
    {
        // realizar una pequeña validacion con una variable llamada url


        // 1. primero se valida si existe una url
        $url = isset($_GET['url']) ? $_GET['url'] : null; // si si existe  añadile ese valor a la variable
        /*
        la expresion $_GET['url'] viene desde el .htacces que capturo la url y la modifico asi como nosostros le indicamos
        la ultima linea del archivo .htacces me permite recortar la url y solo obtener los 2 ultimos nombres es despues dela /
        es decir esto /controlador/update
        */




        /* 2. dividir url por / para asi poder ir analizando hacia donde te diriges y asignarle a cada parte de las diagonales 
        un constructor y un controlador
        */

        $url = rtrim($url, '/'); //borrar la ultima diagonal que se encuentra en mi url

        $url = explode('/', $url); //meter la url en un arreglo que las separa cada que encuentre un / es decir url= ['localhost','phpmyadmin']

        // si no encuentras la url mandame al login
        if (empty($url[0])) {
            //mapear informacion
            error_log('APP::CONSTRUCT-> NO HAY CONTROLADOR ESPECIFICADO');

            //cargar controlador de login con su dirreccion
            $archivoController = 'controllers\login.php';


            //madar a llamar ese controlador
            require_once $archivoController;

            //cargar instancia de ese controlador
            $controller = new Login();
            //cargar el modelo de ese controlador
            $controller->loadModel('login');
            $controller->render();

            return false;
        }

        //si no viene vacio entoces vamos redirigir al usuario
        $archivoController = 'controllers/' . $url[0] . '.php'; //aqui al accionar y con el indice 0 va a redireccionar a lo que venga en la url que TIENE que ser el nombre del controldaro

        if (file_exists($archivoController)) {
            //el nombre del controlador viene en la variable entonces con esta linea lo requerimos
            require_once $archivoController;
            //se inicializa ese controlador
            $controller = new $url[0];
            $controller->loadModel($url[0]); //se carga el modelo y que tiene el mismo nombre que el controlado

            // apartir de aqui se redirige las acciones que se quieran hacer con el controlador
            if (isset($url[1])) {
                //validar si existe dentro de la clase
                if (method_exists($controller, $url[1])) {
                    //validar si xiste un tercer parametro
                    if (isset($url[2])) {
                        //no parametro 
                        $nparam = count($url) - 2; //si nparam es igual a 0 quiere decir que no hay parametros

                        $params = []; //arreglo vacio

                        //controlador para recorrer 
                        for ($i = 0; $i < $nparam; $i++) {
                            array_push($params, $url[$i] + 2);
                        }
                        $controller->{$url[1]}($params); //se le pasa  al controlador los parametros

                    } else {
                        //no tiene parametro, se manda a llamar\
                        //el metodo tal cual lo reciba
                        $controller->{$url[1]}(); //metodo dinamico para cargar controlador de solo un parametro es decir inicio/index
                    }
                } else {
                    //error, no existe el metodo
                    $controller = new Errores();
                }
            } else {
                //no hay metodo a cargar, se carga el metodo por default
                $controller->render();
            }
        } else {
            //no existe el archivo, mande error
            $controller = new Errores();
        }
    }
}
