<?php

// importar base de datos
include_once 'db.php';
// validar usuario
class User extends DB
{
    private $nombre;
    private $username;

    public function existenciadeusuario($user,$pass)
    {
       $md5passw = md5($pass);

       $query = $this->connect()->prepare('SELECT 1 ');

       $query->execute(['user'=> $user,'pass' => $md5passw]);

       if ($query->rowCount()) {  //rowCount valida si devuelve filas la base de datos
        return true;
       }else {
       return false;
       }
    }

    public function setUser($user)
    {
       $query = $this->connect()->prepare('SELECT * FROM USUARIOS WHERE username = :user');
       $query->execute(['user' => $user]);
       
       foreach ($query as $currentUser) {
        $this->nombre =$currentUser['nombre'];
        $this->nombre =$currentUser['username'];
       }
    }
    public function getNombre()
    {
       return $this->nombre;
    }
}

?>