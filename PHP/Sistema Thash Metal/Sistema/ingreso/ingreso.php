
<?php
 if(isset($_POST["btnLogin"])){

    include ("../conexion/conexion.php");


    $txtCodigo=  ($_POST['txtCodigo']);
    $txtUser=  ($_POST['txtUser']);
    
    $SQL = $pdo->prepare("SELECT * FROM `usuario` WHERE `user`=:user AND `password`=:codigo");

    $SQL ->bindParam(":codigo",$txtCodigo,PDO::PARAM_STR);
    $SQL ->bindParam(":user",$txtUser,PDO::PARAM_STR);

    $SQL->execute();




    $numero = $SQL->rowCount();

    if($numero < 1){

        echo "NO EXISTE";
    }else{

        header("Location:../Admin/index.php");
    }



        
 

    

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
<form class="form-inline justify-content-center flex-column flex-md-row my-3" action="ingreso.php" method="post">

<label   for="" >USUARIO</label>
 <input class="form-control" type="text" name="txtUser" value ="" placeholder=" " id="txtUser" requiere="">
 <br>
     
 <label   for="" >PASSWORD</label>
 <input class="form-control" type="password" name="txtCodigo" value ="" placeholder=" " id="txtCodigo" requiere="">
 <br>

 <button class="btn btn-primary" value="LOGIN" type="submit" name="btnLogin">INGRESAR</button>
 <a class="btn btn-danger" href="../Login/index.php" target="_self">REGRESAR</a>

</form>

</div>
</body>
</html>