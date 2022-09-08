<?php

namespace App\Http\Controllers;

use App\Models\Comprobante;
use Illuminate\Http\Request;

class FirebasseController extends Controller
{
    public function index()
    {
        // $comproban = Comprobante::paginate(5);
        // return view('comprobante.index',compact('comproban'));
        return view('fireBD.index');
        
        //https://www.youtube.com/watch?v=_gRxLSWD4dw
    }
    public function crear()
    {
       
        return view('fireBD.crear');
    }
    public function insertarcurl(Request $request)
    {
        // $nombreimagen=$_FILES['comprobante']['name'];
        // $tipo_imagen=$_FILES['comprobante']['type'];
        // $tamano_imagen=$_FILES['comprobante']['size'];
        // $Cargarimagen=$_FILES['comprobante']['tmp_name'];
        // $imagen=fopen($Cargarimagen,'rb');
        // $binariosimagen=fread($imagen,$tamano_imagen);
        // $url="https://pruebas-b81db-default-rtdb.firebaseio.com/imagenes.png";

        // $ch= curl_init();
        //     curl_setopt($ch,CURLOPT_URL,$url);
        //     curl_setopt($ch,CURLOPT_POST,true);
        //     curl_setopt($ch,CURLOPT_POSTFIELDS,$binariosimagen);
        //     curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        //     // especificar que tipo de datos estoy mandando
        //     curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type: text/plain'));
        $fecha =$_POST['fecha'];
        var_dump($fecha);
        dump($fecha);
        // $resul = curl_exec($ch);
        // $json= json_decode($resul,true);
        // var_dump($json);
        // curl_close($ch);
    }
    public function insertarmodelo(Request $request)
    {
       $comprobante=$request->all();
        // $Cargarimagen=$_FILES['comprobante']['tmp_name'];
        // $imagen=fopen($Cargarimagen,'rb');
        // $comprobante['comprobante'] = "$imagen";


        // metodo 2
        //se capturan la iformacion de nuestra imagen nombre tipo y tamaño
        $nombreimagen=$_FILES['comprobante']['name'];
        $tipo_imagen=$_FILES['comprobante']['type'];
        $tamano_imagen=$_FILES['comprobante']['size'];
        $comprobante=$request->all();
        dump($nombreimagen,$tipo_imagen,$tamano_imagen);

        if($tamano_imagen<=1000000){
            if ($tipo_imagen=="image/jpeg" || $tipo_imagen=="image/jpg" || $tipo_imagen=="image/png" ) {
                $Cargarimagen=$_FILES['comprobante']['tmp_name'];
                $imagen=fopen($Cargarimagen,'rb');
                $comprobante['comprobante'] = "$imagen";
                // dump($imagen);
            }else {
                echo "el tamano es demasiado grande";
            }
        }

        //prueba 1
        // $imagen=fopen($Cargarimagen,'rb');
        // $comprobante['comprobante'] = "$imagen";
        // dump($comprobante);
        // var_dump($librodiario);
        // dump($librodiario,$nombre,$descripcion);

        
        Comprobante::create($comprobante);
        return redirect()->route('imagenget');
    }
}
