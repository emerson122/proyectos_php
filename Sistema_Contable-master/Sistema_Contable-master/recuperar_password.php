<?php
    session_start();
    require('conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Index</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
        function enviar_notificacion() {
        //Ingresamos un mensaje a mostrar
        var mensaje = confirm("¿Desea enviar el mensaje al administrador para el cambio de contraseña?");
        //Detectamos si el usuario acepto el mensaje
        if (mensaje) {
        alert("¡Se envio la notificacion exitosamente!");
        }
        //Detectamos si el usuario denegó el mensaje
        else {
        alert("¡Se cancelo la !");
        }
        }
</script>

  </head>

  <body>

      <?php

      $consul="SELECT * FROM entidad";
      $rrr=mysqli_query($con,$consul);
      if(mysqli_num_rows($rrr)==0)
      {

      ?>
          <table width="100%">
            <tr>
              <td width="98%"></td>
              <td>
                <form  action="primer_registro.php" method="post">
                  <div>
                    <input name="entrar" class="btn btn-theme btn-block" href="primer_registro.php" type="submit" value="Primera vez en el sistema">
                  </div>
                </form>
              </td>
            </tr>
          </table>


      <?php
      }
      ?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">

		      <form class="form-login" action="./sesion_password.php" method="post">
		        <h2 class="form-login-heading">¿Olvidaste tu contraseña?</h2>
		        <div class="login-wrap">
		        	<label>Ingresa tu nombre de Usuario </label>
		            <input name="usuario" type="text" class="form-control" placeholder="Usuario" autofocus>
		            <br>
		            <label>Ingresa tu carnet de identidad</label>
		            <input name="contra" type="text" class="form-control" placeholder="carnet">
                <br>
                <br>
                 <button class="btn btn-primary " href="index.php"> Enviar notificacion</button>
                 <button class="btn btn-danger " href="index.php" ></i> Cancelar</button>
		        </div>
		      </form>
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/fondo_mostaza.jpg", {speed: 500});
    </script>



  </body>
</html>
