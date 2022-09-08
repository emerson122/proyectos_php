<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <div class="d-grid gap-2">
  <a type="button" href="{{route('creador')}}" class="btn btn-primary">Ingresar Comprobante |+|</a>
  <br>
  <br>
  <br>
  <table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Asiento libro diario</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Comprobante</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
     
    <tr>
      <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td> 
           <img src="/imagen/" width="20%"> 
        </td>
        <td>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <a type="button" class="btn btn-warning" href="{{route('editor')">Editar</a>
            - boton borrar 
            <form action="{{route('exterminador')" method="post" class="formEliminar">
                @csrf 
                @method('DELETE')
                <a type="submit" class="btn btn-danger" >Eliminar</a>
            </form>
        <div>
        </td>
    </tr>
   
    </tbody>
  </table>
</body>
</html>