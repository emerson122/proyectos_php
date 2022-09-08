<?php

class SuccessMessages{
    //ERROR_CONTROLLER_METHODO_OPERACION 
    const SUCCESS_ADMIN_NEWCATEGORY_EXISTS = "018a81cb12b486224af890bcd8b39b1e"; //esta constante se tiene que encriptar

    private $successList = [];
    public function __construct() {
        $this->successList = [
            SuccessMessages::SUCCESS_ADMIN_NEWCATEGORY_EXISTS => 'El Nombre DE la Categoria procesado correctamente'
        ];
    }
    public function get($hash)
    {
        return $this->successList[$hash]; //obtener el texto dado el hash
    }

    public function existsKey($key)
    {
            if(array_key_exists($key,$this->successList)){
                return true;
            }else {
                return false;
            }
    }
}