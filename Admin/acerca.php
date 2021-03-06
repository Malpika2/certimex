﻿<!DOCTYPE html>
<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
   echo '<script>location.href = "../index.php"</script>';
   echo "Esta pagina es solo para usuarios registrados.<br>";
   echo "Bienvenido!".$_SESSION['username'].":L";
   echo "<br><a href='login.html'>Login</a>";
   echo "<br><br><a href='index.html'>Registrarme</a>";
exit;
}
session_write_close();?>

<html xmlns="">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CERTIMEX MODO ADMINISTRADOR</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CERTIMEX</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>Administrador</a>
                        </li>
                        <!-- <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a> -->
                        <!-- </li> -->
                        <li class="divider"></li>
                        <li><a href="../Procesos/logout.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
		
		
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="index.php"><i class="fa fa-dashboard"></i> Administrador</a>
                    </li>
					<li>
                        <a href="inicio.php"><i class="fa fa-desktop"></i>Inicio</a>
                    </li>
                    <li>
                        <a href="acerca.php" class="active-menu"><i class="fa fa-desktop"></i>Acerca de</a>
                    </li>
					<li>
                        <a href="servicios.php"><i class="fa fa-bar-chart-o"></i>Servicios</a>
                    </li>
                    <li>
                        <a href="procedimientos.php"><i class="fa fa-qrcode"></i>Procedimientos</a>
                    </li>
                    
                    <li>
                        <a href="noticias.php"><i class="fa fa-table"></i>Noticias</a>
                    </li>
                    <li>
                        <a href="directorio.php"><i class="fa fa-edit"></i> Directorio </a>
                    </li>
                    <li>
                        <a href="listaNegra.php"><i class="fa fa-edit"></i> Empresas No Autorizadas </a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                          <small> Editar informacion de la seccion "Acerca de CERTIMEX" </small>
                        </h1>
                    </div>
                </div> <!-- /. ROW  -->
					<form role="form" name="actInfo" enctype="multipart/form-data" method="post" action="../Procesos/actInfo.php">
						<div class="panel panel-info">
						<?php
							include("../Procesos/conexion.php");
							$consulta = "SELECT * FROM informacion";
							$resultado = $mysqli->query($consulta);
							$info=$resultado->fetch_assoc();
							
							echo "<div class=\"panel-heading col-md-12\">
										<label>Acerca de:</label></br>
										 <div class=\"row\">
											<input class=\"col-md-3\" name=\"tituloI\" value=\"$info[titulo]\"/>
											<div class=\"form-group col-md-6\">
												<label>Actualizar Imagen</label>
												<input type=\"file\" name=\"imagenI\"/>
											</div>
											<div class=\"form-group col-md-3\"><img src=\"../Imagenes/$info[url]\" width=\"150\"/> </div>
										</div>
								 </div>";
							echo "<div class=\"panel-body col-md-12\"> 
										<textarea class=\"col-md-12\" rows= \"10\" name=\"informacionI\"/>$info[informacion]</textarea>
								  </div>";
						?>
							<div class="panel-footer">
								<button type="submit" name="BtnAct" value="acerca" class="btn btn-default"><i class="fa fa-refresh"></i> Actualizar</button>
							</div>
						</div>
						
						<div class="panel panel-info">
						<?php
							$consulta = "SELECT * FROM historia";
							$resultado = $mysqli->query($consulta);
							$info=$resultado->fetch_assoc();
							
							echo "<div class=\"panel-heading col-md-12\">
									<label>Historia:</label></br>
									 <div class=\"row\">
									<input class=\"col-md-3\" name=\"tituloH\" value=\"$info[titulo]\"/>
									<div class=\"form-group col-md-6\">
											<label>Actualizar Imagen</label>
											<input type=\"file\" name=\"imagenH\"/>
									</div>
									<div class=\"form-group col-md-3\"><img src=\"../Imagenes/$info[url]\" width=\"150\"/> </div>
									</div>
								</div>";
							echo "<div class=\"panel-body col-md-12\"> <textarea class=\"col-md-12\" rows= \"10\" name=\"informacionH\"/>$info[informacion]</textarea></div>";
						?>
							<div class="panel-footer">
								<button type="submit" name="BtnAct" value="historia" class="btn btn-default"><i class="fa fa-refresh"></i> Actualizar</button>
							</div>
						</div>
						
						<div class="panel panel-info">
						<?php
							$consulta = "SELECT * FROM mision";
							$resultado = $mysqli->query($consulta);
							$info=$resultado->fetch_assoc();
							
							echo "<div class=\"panel-heading col-md-12\">
									<label>Misión:</label></br>
									 <div class=\"row\">
										<input class=\"col-md-3\" name=\"tituloM\" value=\"$info[titulo]\"/>
										<div class=\"form-group col-md-6\">
											<label>Actualizar Imagen</label>
											<input type=\"file\" name=\"imagenM\"/ >
										</div>
										<div class=\"form-group col-md-3\"><img src=\"../Imagenes/$info[url]\" width=\"150\"/> </div>
									</div>
								</div>";
							echo "<div class=\"panel-body col-md-12\"> <textarea class=\"col-md-12\" rows= \"10\" name=\"informacionM\"/>$info[informacion]</textarea></div>";
						?>
							<div class="panel-footer">
								<button type="submit" name="BtnAct" value="mision" class="btn btn-default"><i class="fa fa-refresh"></i> Actualizar</button>
							</div>
						</div>						
						<div class="panel panel-info">
						<?php
							$consulta = "SELECT * FROM vision";
							$resultado = $mysqli->query($consulta);
							$info=$resultado->fetch_assoc();
							
							echo "<div class=\"panel-heading col-md-12\">
									 <label>Visión:</label></br>
									 <div class=\"row\">
										 <input class=\"col-md-3\" name=\"tituloV\" value=\"$info[titulo]\"/>
										 <div class=\"form-group col-md-6\">
											 <label>Actualizar Imagen</label>
											 <input type=\"file\" name=\"imagenV\"/>
										 </div>
										 <div class=\"form-group col-md-3\"><img src=\"../Imagenes/$info[url]\" width=\"150\"/> </div>
									</div>
								</div>";
							echo "<div class=\"panel-body col-md-12\"> <textarea class=\"col-md-12\" rows= \"10\" name=\"informacionV\"/>$info[informacion]</textarea></div>";
						?>
							<div class="panel-footer">
								<button type="submit" name="BtnAct" value="vision" class="btn btn-default"><i class="fa fa-refresh"></i> Actualizar</button>
							</div>
						</div>
						
					</form>
				<footer><p></p></footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>