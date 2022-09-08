<?php
// controlador base por medio del cual todos van a estar herendado
class Controller 
{
     function __construct() {
        $this->view = new View(); //aqui se indica que vista se quiere cargar
    }

    function loadModel($model)
    {
        // recibe el nombre del modelo y lo busca en la carpeta de modelos
        $url = 'models/' . $model . 'model.php';
        if (file_exists($url)) {
            //si el archivo existe lo mando a llamar
            require_once $url; //require once hace que se cargue solo una vez el archivo si ya esta cargardo no lo vuelve a bajar

            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }
    //existe post
    function existPOST($params)
    {
        foreach ($params as $param ) { //si un parametro no existe rechazar todo
            if (!isset($_POST[$param])) { //si no existe el parametro
                error_log('CONTROLLER::existPOST => NO EXISTE EL PARAMETRO' . $param);
                return false;
            }
        }
        return true;
    }
    //existe GET
    function existGET($params)
    {
        foreach ($params as $param ) { //si un parametro no existe rechazar todo
            if (!isset($_GET[$param])) { //si no existe el parametro
                error_log('CONTROLLER::existGET => NO EXISTE EL PARAMETRO' . $param);
                return false;
            }
        }
        return true;
    }

    function getGet($name)
    {
        return $_GET[$name];
    }
    
    function getPOST($name)
    {
        return $_GET[$name];
    }

    function redirect($ruta,$mensajes) //redireccionar y mandar mensajes correctamente 
    {
        $data = [];
        $params = '';

        foreach ($mensajes as $key => $mensaje) {
            array_push($data, $key . '=' . $mensaje);
        }
        $params = join('&',$data);
        if ($params != '') {
            $params = '?' . $params;
        }
        header('Location: ' . constant('URL') . $ruta . $params); //redirigir a los usuarios
    }
}

?>