<?php
session_start();
//manejamos en sesion el nombre del usuario que se ha logeado
if (!isset($_SESSION["usuario"])){
    header("location:index.php?nologin=false");
    
}
require('conexion.php');

$_SESSION["usuario"];

$id_empleado_usuario= htmlentities($_GET['id_empleado_usuario']);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Administrador</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
  </head>
 
  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b>SISTEMA CONTABLE</b></a>
            
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="index.php">Cerrar Sesion</a></li>
              </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
    <ul class="sidebar-menu" id="nav-accordion"><br>
        <h5 class="centered">Usuario: <?php echo $_SESSION["usuario"]; ?></h5>
        <li class="mt">
            <a  href="principal_administrador.php">
                <i class="fa fa-home">    </i>
                <span>Inicio  </span>
            </a>
        </li>

        <li class="sub-menu">
            <a class="active" href="javascript:;" >
                  <i class="fa fa-users"></i>
                  <span>Usuarios</span>
              </a>
              <ul class="sub">
                  <li><a  href="nuevo_usuario.php"><i class="fa fa-user"></i>Nuevo Usuario</a></li>
                  <li class="active"><a  href="lista_usuario.php"><i class="fa fa-list-ol"></i>Lista de USuarios</a></li>
              </ul>
          </li>

          <li class="sub-menu">
              <a href="javascript:;" >
                  <i class="fa fa-list-alt"></i>
                  <span>Cuentas</span>
              </a>
              <ul class="sub">
                  <li><a  href="nueva_cuenta.php">Nueva Cuenta</a></li>
                  <li><a  href="lista_cuenta.php">Lista de Cuentas</a></li>
              </ul>
          </li>
          <li class="sub-menu">
              <a href="datos_entidad.php" >
                  <i class="fa fa-th"></i>
                  <span>Datos Entidad</span>
              </a>
          </li>
          <li class="sub-menu">
              <a href="anadir_gestion.php" >
                  <i class="fa fa-th"></i>
                  <span>A??adir Gestion</span>
              </a>
          </li>
    </ul>
</div>  
      </aside>
     

</section>


<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Usuario</h3>
      <!-- page start-->
              <section class="panel">
                  <div class="panel-body">
                            
                      <h4 class="mb"><i class="fa fa-angle-right"></i><a href="lista_usuario.php"> Lista de Usuarios</a> &emsp;<i class="fa fa-angle-right"></i> Eliminar Usuario </h4>
                      <form class="form-horizontal style-form" method="POST">
                      <table >
                        <tr>
                          <td width="8%"></td>
                          <td width="40%">

                          <?php 
                            $sql =mysqli_query($con,"SELECT * FROM empleado_usuario WHERE id_empleado_usuario='".$id_empleado_usuario."' LIMIT 1");
                            $row = mysqli_fetch_assoc($sql);

                            $datos_usuario=mysqli_query($con,"SELECT a.* FROM usuario a, empleado_usuario b WHERE a.id_usuario=b.id_usuario and b.id_empleado_usuario=$id_empleado_usuario");
                            $rows = mysqli_fetch_assoc($datos_usuario);
                          ?>
                      
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Codigo:&emsp; </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" disabled="true" name="id_usuario_cod" value="<?=$rows['id_usuario']?>">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nombre:&emsp; </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" disabled="true" name="nombre_usuario" value="<?=$rows['nombre_usuario']?>">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Apellido Paterno:&emsp; </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" disabled="true" name="ap_paterno_usuario" value="<?=$rows['ap_paterno_usuario']?>">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Apellido Materno:&emsp; </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" disabled="true" name="ap_materno_usuario" value="<?=$rows['ap_materno_usuario']?>">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">CI:&emsp; </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" disabled="true" name="ci_usuario" value="<?=$rows['ci_usuario']?>">
                              </div>
                          </div>
                          </td> 
                          <td width="10%">
                          </td>
                          <td width="40%"> 
                            &emsp;
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Usuario:&emsp; </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="user" value="<?=$row['user']?>">
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Cargo:&emsp; </label>
                              <div class="col-sm-10">
                                <?php
                                $dato_cargo=mysqli_query($con,"SELECT a.cargo as cargo from empleado a, empleado_usuario b where a.id_empleado=b.id_empleado and b.id_empleado_usuario='$id_empleado_usuario'");
                                $rowcargo=mysqli_fetch_assoc($dato_cargo);
                                ?>
                                  <input type="text" class="form-control" name="cargo" value="<?=$rowcargo['cargo']?>">
                              </div>
                          </div><br>
                          <?php
                            $dato_estado=mysqli_query($con,"SELECT estado from empleado_usuario where id_empleado_usuario='$id_empleado_usuario'");
                            $rowsss = mysqli_fetch_assoc($dato_estado);
                            if($rowsss['estado']=='ACTIVO') 
                            { 
                                ?>
                                &emsp;<input type="submit" class="btn btn-success" name="desactivar_usuario" value="Desactivar Usuario">
                                &emsp;
                                <?php
                            } 
                            else
                            {
                                ?>
                                &emsp;<input type="submit" class="btn btn-success" name="activar_usuario" value="Activar Usuario">
                                &emsp;
                                <?php
                            }
                          ?>
                          &emsp;<input type="submit"  class="btn btn-danger"  name="cancelar" value="Cancelar">
                          </td>
                        </tr>
                      </table>
                        <?php
                        if(isset($_POST['desactivar_usuario'])) 
                        { 
                            $sql =("UPDATE empleado_usuario SET estado='NO ACTIVO' WHERE id_empleado_usuario='$id_empleado_usuario'");
                            mysqli_query($con,$sql) or die(mysqli_error());

                            $msg = "Persona desactivada correctamente";
                            print "<script>alert('$msg'); window.location='lista_usuario.php';</script>";

                        } 
                        else
                        {
                          if(isset($_POST['activar_usuario'])) 
                        { 
                          
                            $sql =("UPDATE empleado_usuario SET estado='ACTIVO' WHERE id_empleado_usuario='$id_empleado_usuario'");
                            mysqli_query($con,$sql) or die(mysqli_error());

                            $msg = "Persona activada correctamente";
                            print "<script>alert('$msg'); window.location='lista_usuario.php';</script>";

                        } 
                        }
                        if(isset($_POST['cancelar'])) 
                        { 
                          print "<script> window.location='lista_usuario.php';</script>";
                        }
                      ?>
                      </form>
                  </div>
              </section>
          </aside>
      </div>
  </section>
</section>
      <!--main content end-->
  


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
  <script src="assets/js/zabuto_calendar.js"></script>  
  
  
  <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>
