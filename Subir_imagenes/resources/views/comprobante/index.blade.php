<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Comprobante</title>
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
    @foreach($comproban as $comprobante)
    <tr>
        <td>{{$comprobante->id}}</td>
        <td>{{$comprobante->libdiario}}</td>
        <td>{{$comprobante->nombre}}</td>
        <td>{{$comprobante->descripcion}}</td>
        <td>
            <img src="/imagen/{{$comprobante->comprobante}}" width="20%">
        </td>
        <td>
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <a type="button" class="btn btn-warning" href="{{route('editor',$comprobante->id)}}">Editar</a>

            <!-- boton borrar -->
            <form action="{{route('exterminador',$comprobante->id)}}" method="post" class="formEliminar">
                @csrf 
                @method('DELETE')
                <a type="submit" class="btn btn-danger" >Eliminar</a>
            </form>
        <div>
        </td>
    </tr>
    @endforeach
    </tbody>
  </table>
  <div>
    {!! $comproban->links()!!}
  </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    (function(){
        'use strict'
        //debemos crear la clase formeliminar
        var forms=document.querySelectorAll('.formEliminar')
Array.prototype.slice.call(forms)
  .forEach(function(form){
    form.addEventListener('submit',function(event){ 
        event.preventDefault()
        event.stopPropagation()
        Swal.fire({
  title: 'Confirmar la Eliminacion del registro?',
  icon: 'info',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Confirmar'
}).then((result) => {
  if (result.isConfirmed) {
    this.submit();
    Swal.fire(
      'Eliminado!',
      'Se elimino Correctamente.',
      'success'
    )
  }
})
 
    }, false)
    })
})()
</script>
</body>
</html>