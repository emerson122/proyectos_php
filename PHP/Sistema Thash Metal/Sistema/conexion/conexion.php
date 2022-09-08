<?php

$servidor = "mysql:dbname=empresa;host=127.0.0.1";
$usuario = "root";

$password="";

try{
    $pdo = new PDO($servidor,$usuario,$password);
    echo"Conectado.......";

}catch(PDOException $error){


    echo"CONEXION FALLIDA".$error->getMessage();



}




?>