<?php

class ErrorMessages{
    //ERROR_CONTROLLER_METHODO_OPERACION 
    const ERROR_ADMIN_NEWCATEGORY_EXISTS = "ee0d0e295d31ff45e06c5fc81a12dc4e"; //esta constante se tiene que encriptar

    private $erroList = [];
    public function __construct() {
        $this->erroList = [
            ErrorMessages::ERROR_ADMIN_NEWCATEGORY_EXISTS => 'El Nombre DE la Categoria YA existe Intenta otravez'
        ];
    }

    public function get($hash)
    {
        return $this->erroList[$hash]; //obtener el texto dado el hash
    }

    public function existsKey($key)
    {
            if(array_key_exists($key,$this->erroList)){
                return true;
            }else {
                return false;
            }
    }
}