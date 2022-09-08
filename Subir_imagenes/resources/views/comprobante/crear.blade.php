<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Crear Registro</title>
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
   <form action="{{route('insertador')}}" method="post" enctype="multipart/form-data">
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
      <span class="input-group-text" id="addon-wrapping">Descripcion</span>
      <input type="text" class="form-control" name='descripcion'id="descripcion"placeholder="Ingrese descripcion" aria-label="Username" aria-describedby="addon-wrapping">
      </label>
      <input type="file" class="form-control" name="comprobante" id="comprobante" onchange="previewImage(1);" >
  <label class="input-group-text" for="inputGroupFile02">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Comprobante de asiento de libro diario</label>
<br>
<br>
<div class="d-grid">

   <button class="btn btn-success" type="submit">Guardar</button>
<a type="button" class="btn btn-danger" href="{{route('origen')}}">Cancelar</a>

</div>
</center>

</form>
<div>
   <img id="imagenSeleccionada" src="" style="max-height: 300px;">
</div>

<script>
function previewImage(nb) {        
    var reader = new FileReader();         
    reader.readAsDataURL(document.getElementById('comprobante'+nb).files[0]);         
    reader.onload = function (e) {             
        document.getElementById('imagenSeleccionada'+nb).src = e.target.result;         
    };     
}

</script>
</body>
</html>