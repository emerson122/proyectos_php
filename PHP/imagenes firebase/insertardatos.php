<?php
$data= '{"concepto":"Prueba 26/7/2022","Subtotal":"500","ID":"1"}';
$url="https://pruebas-b81db-default-rtdb.firebaseio.com/presupuesto.json";

// este es curl 
$ch= curl_init(); //inicializar curl

// asignar opciones a curl
curl_setopt($ch,CURLOPT_URL,$url);

// CURLOPT_RETURNTRANSFER DICE QUE LO QUE DEVUELVA LA URL SI LO ESTOY ACEPTANDO
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

// metodo por el cual voy a enviar los datos en este caso POST
curl_setopt($ch,CURLOPT_POST,1);

// que datos voy a enviar por post eso hace pistfields
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);

// especificar que tipo de datos estoy mandando
curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type: text/plain'));


// recibiendo el resultado tras ejecutar curl
$response =  curl_exec($ch);

// validar

//curl_errno es igual al numero del error
if (curl_errno($ch)){
    echo 'Error:'.curl_errno($ch);
}else{
    echo "Ya inserto crack";
}
curl_close($ch); 
?>

