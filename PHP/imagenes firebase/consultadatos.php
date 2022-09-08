<?php
$url="https://pruebas-b81db-default-rtdb.firebaseio.com/presupuesto.json";


// este es curl 
$ch= curl_init(); //inicializar curl

// asignar opciones a curl
curl_setopt($ch,CURLOPT_URL,$url);

// CURLOPT_RETURNTRANSFER DICE QUE LO QUE DEVUELVA LA URL SI LO ESTOY ACEPTANDO
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);


// recibiendo el resultado tras ejecutar curl
$response =  curl_exec($ch);
curl_close($ch); 


//validar datos en patalla es como el dump en laravel
// print_r($response);

$data= json_decode($response,true);

foreach ($data as $key => $value) {
   echo $data[$key]['concepto']."<br>"."--".$data[$key]["Subtotal"]."<br>";
}

?>