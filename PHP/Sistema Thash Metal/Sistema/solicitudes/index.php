<?php




$txtNombre = (isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtEmail = (isset($_POST['txtEmail']))?$_POST['txtEmail']:"";
$txtPagina = (isset($_POST['txtPagina']))?$_POST['txtPagina']:"";
$txtArchivo = (isset($_FILES['txtArchivo']["name"]))?$_FILES['txtArchivo']:"";

$accion = (isset($_POST['accion']))?$_POST['accion']:"";

include ("../conexion/conexion.php");
if(($txtNombre=="") OR ($txtEmail=="") OR ($txtPagina=="") OR($txtArchivo=="")){
    echo 'CAMPOS VACIOS';
    $accion ="";
    
 
        }
switch($accion){

           case "btnENVIAR SOLICITUD";
            $sentencia = $pdo->prepare( "INSERT INTO solicitud(Nombre_de_la_universidad,Email,Pagina_web_de_la_universidad,Archivo_solicitud) VALUES(:Nombre_de_la_universidad,:Email,:Pagina_web_de_la_universidad,:Archivo_solicitud)");
           
            $sentencia -> bindParam(':Nombre_de_la_universidad',$txtNombre);
            $sentencia -> bindParam(':Email',$txtEmail);
            $sentencia -> bindParam(':Pagina_web_de_la_universidad',$txtPagina);

            $fecha = new DateTime();
            $nombreArchivo = ($txtArchivo!="")?$fecha->getTimestamp()."_".$_FILES["txtArchivo"]["name"]:"Solitud1.docx";

            $tmpArchivo = $_FILES["txtArchivo"]["tmp_name"];
            if($tmpArchivo!=" "){
            move_uploaded_file($tmpArchivo,"../Documentosx/".$nombreArchivo);

            }

            $sentencia -> bindParam(':Archivo_solicitud',$nombreArchivo);

            $sentencia->execute();

            echo '<script>alert("SOLICITUD ENVIADA")</script>';
            
    
           break;


}


/*$Sentencia = $pdo->prepare("SELECT * FROM `solicitud` WHERE `id`=1");
$Sentencia->execute();
$Misolicitud= $Sentencia->fetchAll(PDO::FETCH_ASSOC);

print_r($Misolicitud);*/

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


    
    <div class="container p-5 my-5 bg-dark text-white"  >

    <h1>??Qu?? es la acreditaci??n?</h1>
<p>La acreditaci??n es esencialmente un sello de aprobaci??n, el que reciben las universidades que sostienen niveles acad??micos altos. Una plan de estudios acreditado se presenta para ser evaluada por sus pares, el en proceso se evaluan sus normas de admisi??n, su declaraci??n de objetivos, su ??tica, la reputaci??n de su facultad y su rigor acad??mico.</p>
        <h2> ACREDITACION DE CARRERAS UNIVERSITARIAS</h2>
        <h3>Descargue archivo word para poner las firmas correspondientes y en el cual pondra el plan de estudio </h3>
        <a href="/sistema/archivo/solicitud-acreditacion.docx" download="Solicitud acreditacion">
            Descargar Archivo
        </a>
        
        
 <form class="form-inline justify-content-center flex-column flex-md-row my-3" method="post" action="" enctype="multipart/form-data">
    
 <label  for="" >Nombre de la universidad</label>
     <input class="form-control" type="text" name="txtNombre" value = "<?php echo $txtNombre;?>" placeholder="Nombre Universidad" id="txtNombre" requiere="">
     <br>
     
 <label   for="" >Correo</label>
 <input class="form-control" type="text" name="txtEmail" value ="<?php echo $txtEmail;?>" placeholder="Introduza correo" id="txtEmail" requiere="">
 <br>

 <label for="" >Pagina web de la universidad</label>
 <input class="form-control" type="text" name="txtPagina" value="<?php echo $txtPagina;?>" placeholder="Pagina WEB" id="txtPagina" requiere="">
 <br>

 <label for="" >Archivo de la solictud con las firmas</label>
 <input class="form-control" type="file" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" name="txtArchivo" value="<?php echo $txtArchivo;?>" placeholder="" id="txtArchivo" requiere="">
 <br>


<button class="btn btn-primary" value="btnENVIAR SOLICITUD" type="submit" name="accion">ENVIAR SOLICITUD</button>





</form>
<a class="btn btn-danger" href="../Login/index.php" target="_self">REGRESAR</a>
<br/>
<br/>
<a href="../vermisolicitud/indexver.php" target="_self">VER PROCESO DE LA SOLICITUD</a>


</div>



</body>



    

</html>