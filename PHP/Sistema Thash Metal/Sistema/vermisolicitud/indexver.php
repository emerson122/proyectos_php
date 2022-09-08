<?php
$txtid = (isset($_POST['txtid']))?$_POST['txtid']:"";
$accion = (isset($_POST['ver']))?$_POST['ver']:"";


include ("../conexion/conexion.php");


    $Sentencia = $pdo->prepare("SELECT * FROM `solicitud` WHERE `id`=:id");
    $Sentencia -> bindParam(':id',$txtid);
    $Sentencia->execute();

    $Misolicitud= $Sentencia->fetchAll(PDO::FETCH_ASSOC);
    $numero = $Sentencia->rowCount();

    if($numero < 1){

        echo "NO EXISTE";
    }else{

        echo "SI EXISTE";
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
<body class="T">

<div class="container p-5 my-5 bg-dark text-white" >

<p>¿Es importante que mi titulo este acreditado?
Si tú planeas perseguir la educación superior después de la escuela secundaria, es importante que te fijes en el estado de acreditación de cada plan de estudio de la carrera a la que estás considerando  antes de solicitar el ingreso. Aqui puedes ver  el estado de acreditación de plan de estudio rápidamente en las bases de datos.</p>
    <form action="" method="post">
    <label for="" >Introduzca el id</label>
 <input class="form-control" type="text" name="txtid" value = "" placeholder="" id="txtid" requiere="">
 <br>
 <button class="btn btn-success" value="VER ESTADO" type="submit" name="ver">VER ESTADO</button>
 <br>
    </form>
</div>

<div class="">
<table class="table table-dark" class="table-striped">
    <thead>
        <tr>
            <th>ID de la solicitud</th>
            <th>Nombre de la universidad</th>
            <th>Estado de la solictud</th>
            
            
        </tr>
    </thead>

    <?php foreach($Misolicitud as $sol){?>
            
    <tr>
        <td><?php echo $sol['id']?></td>
        <td><?php echo $sol['Nombre_de_la_universidad']?></td>
        <td><?php echo $sol['Estado']?></td>
        
    </tr>
    <?php }?>
</table>
<a class="btn btn-danger" href="../solicitudes/index.php" target="_self">REGRESAR</a>
</div>
    
</body>
</html>