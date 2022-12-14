<?php
session_start();
//manejamos en sesion el nombre del usuario que se ha logeado
if (!isset($_SESSION["usuario"])){
    header("location:index.php?nologin=false");

}
$_SESSION["usuario"];
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
            <a href="principal_administrador.php">
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
                  <li class=""><a  href="nuevo_usuario.php"><i class="fa fa-user"></i>Nuevo Usuario</a></li>
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
<section id="main-content">
    <section class="wrapper">
      <h3><i class="fa fa-angle-right"></i> Usuario</h3>
                  <div class="col-md-12">
                      <div class="content-panel">
                        <form action="" method="post">
                          <table class="table table-bordered table-striped table-condensed">
                            <h4><i class="fa fa-angle-right"></i> Lista de Usuarios</h4>
                            &emsp;<label>Buscar por nombre de usuario:  </label> &emsp;
                            <form action="" method="post">
                              <input style="padding: 5px" type="text" value="Buscar..." onfocus="if (this.value == 'Buscar...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Buscar...';}" />
                              <input class="btn btn-primary" type="button" value="Buscar" />
                            </form>
                            <hr>
                              <thead >
                              <tr>
                                  <td>Codigo</th>
                                  <td class="hidden-phone"> Nombre</th>
                                  <td> Ap. Paterno</th>
                                  <td> Ap. Materno</th>
                                  <td> CI</th>
                                  <td colspan="2"> Cargo</th>
                                  <td style="background:#b8dbb5;"> Estado</th>
                                  <td> Usuario</th>
                                  <td width="150px"> Opciones</th>
                              </tr>
                              </thead>
                              <tbody>
                                <?php
                                  require('conexion.php');
                                  $resultado=mysqli_query($con,"SELECT * FROM empleado_usuario");
                                  while ($row = mysqli_fetch_assoc($resultado)) {?>
                                  <tr>
                                      <td><a href=""><?php echo $row['id_empleado_usuario'];?></a></td>
                                      <?php
                                      $idemp=$row['id_empleado_usuario'];
                                      $polo=mysqli_query($con,"SELECT a.* FROM usuario a, empleado_usuario b where b.id_usuario=a.id_usuario and b.id_empleado_usuario='$idemp'");
                                      $rowo = mysqli_fetch_assoc($polo)
                                      ?>
                                      <td><?php echo $rowo['nombre_usuario'];?></td>
                                      <td><?php echo $rowo['ap_paterno_usuario'];?></td>
                                      <td><?php echo $rowo['ap_materno_usuario'];?></td>
                                      <td><?php echo $rowo['ci_usuario'];?></td>
                                      <td width="8%">
                                      <?php
                                        $id_usuario=$row['id_usuario'];
                                        $id_empleado_usuario=$row['id_empleado_usuario'];
                                        $r=mysqli_query($con,"SELECT a.* from empleado a, empleado_usuario b, usuario c where a.id_empleado=b.id_empleado and b.id_usuario=c.id_usuario and b.id_empleado_usuario='$id_empleado_usuario'");
                                        $rows = mysqli_fetch_assoc($r);
                                        echo $rows['cargo'];
                                      ?></td>
                                      <td width="5%">
                                      <a class="btn btn-warning btn-xs" type="submit"  name="agregar_cargo" href="agregar_cargo.php?id_usuario=<?=$id_usuario?>"><i class="fa fa-plus">Agregar</i></a>
                                      </td>
                                      <td style="background:#b8dbb5;"> <?php echo $row['estado'];?></td>
                                      <td><?php echo $row['user'];?></td>
                                      <td>
                                          <a class="btn btn-primary btn-xs" type="submit" name="editar_usuario" href="editar_usuario.php?id_usuario=<?=$id_usuario?>"><i class="fa fa-pencil"> Editar</i></a>


                                          <?php
                                            if($row['estado']=='ACTIVO')
                                            {
                                                ?>
                                                <a class="btn btn-danger btn-xs" type="submit"  name="eliminar_usuario" href="eliminar_usuario.php?id_empleado_usuario=<?=$id_empleado_usuario?>"><i class="fa fa-ban"> Desactivar</i></a>
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <a class="btn btn-danger btn-xs" type="submit"  name="eliminar_usuario" href="eliminar_usuario.php?id_empleado_usuario=<?=$id_empleado_usuario?>"><i class="fa fa-ban"> Activar</i></a>
                                                <?php
                                            }
                                          ?>



                                      </td>
                                  </tr>
                                <?php



                                  }
                                ?>
                              </tbody>
                          </table>






                          </form>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
    </section><!--/wrapper -->
</section><!-- /MAIN CONTENT -->

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
