<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Crear Registro</title>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
</head>
<body>
   <center>
      <h1>
         Asientos Contables
      </h1>
   </center>
   <hr>
   <br>
   <center>
   <h5>Comprobantes</h5></center>
   <form action="{{route('insertadorimg')}}" method="post" enctype="multipart/form-data">
      @csrf 
      <center>
      <label for="floatingSelect">
      <span class="input-group-text" id="addon-wrapping">ASIENTO LIBRO DIARIO:</span>
         <input type="text" class="form-control" name="libdiario" id='libdiario' placeholder="Ingrese el Asiento" aria-label="Recipient's username" aria-describedby="button-addon2">
      </label>
      <label for="floatingSelect">
      <span class="input-group-text" id="addon-wrapping">Nombre:</span>
         <input type="text" class="form-control" name="nombre" id='nombre' placeholder="Ingrese el nombre del comprobante" aria-label="Recipient's username" aria-describedby="button-addon2">
      </label>

      <label for="floatingSelect">
      <span class="input-group-text" id="addon-wrapping">fecha:</span>
         <input type="date" class="form-control" name="fecha" id='fecha' placeholder="Ingrese el nombre del comprobante" aria-label="Recipient's username" aria-describedby="button-addon2">
      </label>

      <label for="floatingSelect">
      <span class="input-group-text" id="addon-wrapping">Descripcion</span>
      <input type="text" class="form-control" name='descripcion'id="descripcion"placeholder="Ingrese descripcion" aria-label="Username" aria-describedby="addon-wrapping">
      </label>
      <input type="file" class="form-control" name="comprobante" id="comprobante">
  <label class="input-group-text" for="inputGroupFile02">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Comprobante de asiento de libro diario</label>
<br>
<br>
<div class="d-grid">

   <button class="btn btn-success" id="guardar" type="submit">Guardar</button>
<a type="button" class="btn btn-danger" href="{{route('verimagen')}}">Cancelar</a>

</div>
</center>

</form>
<div>
   <img id="imagenSeleccionada" src="" style="max-height: 300px;">
</div>

<!-- firebase -->
<script type="module">



//funcion de redimencionar
function RedimencionarImagen(srcData,width,height) {
   var imageObj = new Image(),
      canvas = document.createElement("canvas"),
      ctx    = canvas.getContext('2d'),
      xStart = 0,
      yStart = 0,
      aspectRadio,
      newWidth,
      newHeight;
   imageObj.src   = srcData;
   canvas.width   = width;
   aspectRadio = imageObj.height / imageObj.width;
   if(imageObj.height < imageObj.width){
      //horizontal
      aspectRadio = imageObj.width  /  imageObj.height;
      newHeight   = height,
      newWidth    = aspectRadio * height;
      xStart      = -(newWidth-width)/2;
   }else{
      //vertical
      newWidth    = width,
      newHeight   = aspectRadio * width;
      yStart      = -(newHeight - height)/2;
   }
   ctx.drawImage(imageObj,xStart,yStart,newWidth,newHeight);
   console.log('convertidad a base 64 correctamente');
   return canvas.toDataURL("image/jpeg",0.75);
}


  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.9.0/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyDBIuuImAn50Jx4I9YbRx2MCkMsELcewpE",
    authDomain: "pruebaenfirebase-f2be5.firebaseapp.com",
    databaseURL: "https://pruebaenfirebase-f2be5-default-rtdb.firebaseio.com",
    projectId: "pruebaenfirebase-f2be5",
    storageBucket: "pruebaenfirebase-f2be5.appspot.com",
    messagingSenderId: "975969620498",
    appId: "1:975969620498:web:92e56e4af39e14f21a7ecb",
    measurementId: "G-72WPZ87GHJ"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);


   //importar las cosas que necesito
import { getDatabase,ref,set,child,update,remove } from "https://www.gstatic.com/firebasejs/9.9.0/firebase-database.js";

const db = getDatabase();

//=======================================================References--------------------------------//
var librodiario = document.getElementById('libdiario');
var nombre = document.getElementById('nombre');
var descripcion = document.getElementById('descripcion');
var comprobante = document.getElementById('comprobante');
var guardar = document.getElementById('guardar');


//   codigo en jQuery
$('#comprobante').change(function () {
   if(this.files && this.files[0]){
      var Archivo = new FileReader();
      Archivo.onload=function(e){ 
      var ImagenPequenia= RedimencionarImagen(e.target.result,165,165);  //metodo que convierte los datos a base64 formato canvas
      // db.push({  
      //    urlLarge:e.target.result,
      //    url:ImagenPequenia
      // });
      //Visualizar imagen en la etiqueta imagenSeleccionada
      $('#imagenSeleccionada').attr('src',ImagenPequenia);
      console.log('vamos bien crack');
   };
   Archivo.readAsDataURL(this.files[0])
  }
});

//----------------------insertar datos en firebase----------------------//
function insertData(){
   set(ref(db,"imagenes/"+librodiario.value),{
      NameofStd: nombre.value,
      Libdia: librodiario.value,
      description: descripcion.value,
      Archiv: ImagenPequenia.value
   })
   .then((()=>{
      alert("los datos se ingresaron con estilo en la base de datos")
   }))
   .catch((error)=>{
      alert('ocurrio un error'+error)
   });
}
//declaracion de tablas
// var TablaDeBaseDatos = app.database().ref('imagenes');





</script>
</body>
</html>