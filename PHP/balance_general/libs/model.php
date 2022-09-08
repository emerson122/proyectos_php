<?php
//este modelo implementara la conexion a la base de datos

//incluir metodos para realizar acciones como insetar actualizar borrar
include_once 'libs/imodel.php';

class Model
{
    function __construct()
    {
        $this->db - new Database();
    }

    function query($query)
    {
        return $this->db->connect()->query($query); //esta funcion regresa la conexion a la base de datos y ejecutara el codigo  de mysql que se le meta en la variable
    }

    function prepare($query)
    {
        return $this->db->connect()->prepare($query);
    }
}
?>