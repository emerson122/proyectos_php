<?php





include ("../conexion/conexion.php");



    
    $Sentencia = $pdo->prepare("SELECT * FROM `solicitud`");
    $Sentencia->execute();
    
    $Misolicitud= $Sentencia->fetchAll(PDO::FETCH_ASSOC);



    $accion = (isset($_POST['txtAceptar']))?$_POST['txtAceptar']:"";
    $accion = (isset($_POST['txtCancelar']))?$_POST['txtCancelar']:"";
    

    if(isset($_POST["txtAceptar"])){

       
        $txtid =  ($_POST['txtid']);
       
        
        $SQL = $pdo->prepare("UPDATE solicitud SET Estado = 'ACEPTADO' WHERE id=:id ");
    
        $SQL ->bindParam(":id",$txtid);
        
        $SQL->execute();

    }


    if(isset($_POST["txtCancelar"])){
       
        $txtid =  ($_POST['txtid']);
        $SQL = $pdo->prepare("UPDATE solicitud SET Estado = 'CANCELADO' WHERE id=:id ");
    
        $SQL ->bindParam(":id",$txtid);
        
        $SQL->execute();
    }
  

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CERTIFICADOS</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"/>
 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="../styles/estilos.css">
</head>
 
 <body>

    <div class="container p-5 my-5 bg-dark text-white"> 
<form action="" method="post">

<label for="" class="h4"> Solicitudes recibidas</label>

 <br>
     
</form>
    </div>

    <div>
    <table class="table table-dark" class="table-striped">
    <thead>
        <tr>
            <th>ID de la solicitud</th>
            <th>Nombre de la universidad</th>
            <th>Email</th>
            <th>Pagina web</th>
            <th>Nombre Archivo</th>
            <th>Estado de la solictud</th>
            
            
            
        </tr>
    </thead>

    <?php foreach($Misolicitud as $sol){?>
            
    <tr>
        <td><?php echo $sol['id']?></td>
        <td><?php echo $sol['Nombre_de_la_universidad']?></td>
        <td><?php echo $sol['Email']?></td>
        <td><?php echo $sol['Pagina_web_de_la_universidad']?></td>
        <td><?php echo $sol['Archivo_solicitud']?></td>
        <td><?php echo $sol['Estado']?></td>
        
    </tr>
    <?php }?>
</table>
    </div>

    <div  class="container p-5 my-5 bg-dark text-white" >
        <form action="" method="post">

        <label for="" >Introduzca el id de la solicitud a aceptar o cancelar</label>
 <input class="form-control" type="text" name="txtid" value = "" placeholder="" id="txtid" requiere="">
 <br>
 <button class="btn btn-success" value="ACEPTAR" type="submit" name="txtAceptar">ACEPTADO</button>
 

 <button class="btn btn-success" value="CANCELAR" type="submit" name="txtCancelar">CANCELADO</button>
 
 <a class="btn btn-danger" href="../ingreso/ingreso.php" target="_self">REGRESAR</a>
        </form>
       
    </div>
    
</body>
</html>