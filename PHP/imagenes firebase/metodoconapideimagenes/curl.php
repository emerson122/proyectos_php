<?php
    // se guardan las url en una variable 
    $key="58f696e9d49a18b05ca9eb6fbdc3dfe1";
    $url="https://api.imgbb.com/1/upload";

    // se recuperan los datos del formulario 
    $nombre= $_POST['titulo'];
    $expiracion= $_POST['expiracion'];
    //este es el archivp
    $archivo = $_FILES['imagen'];


    //este metodo es para ajuntar todo posible mente no es necesario con firebase
    //conversion de imagen a base64 
    $contenido = file_get_contents($archivo['tmp_name']);
    // convertir a base 64
    $base64 = base64_encode($contenido);

    //este metodo es para ajuntar todo posible mente no es necesario con firebase 
    $post = "key=".urlencode($key)."&image=".urlencode($base64)."&name=".urlencode($nombre)."&expiration=".urlencode($expiracion);
    //se inicializa curl
    $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $resul = curl_exec($ch);

    $json= json_decode($resul,true);

    var_dump($json);
    curl_close($ch); 
?>
