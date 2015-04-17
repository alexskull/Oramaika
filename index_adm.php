 <?php  session_start();?>
 <?php
    require_once('funciones/conectar.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Inicio</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<style type="text/css">
</style>
<noscript>
<link rel="stylesheet" href="css/5grid/core.css" />
<link rel="stylesheet" href="css/5grid/core-desktop.css" />
<link rel="stylesheet" href="css/5grid/core-1200px.css" />
<link rel="stylesheet" href="css/5grid/core-noscript.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/style-desktop.css" />
<link rel="stylesheet" href="css/least.min.css" />
</noscript>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.lazyload.min.js"></script>
<script src="js/least.min.js?03072013"></script>
<script src="js/prism.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none&amp;mobileUI.openerWidth=52"></script>
</head><body class="twocolumn2">
<div id="wrapper">
	<div id="header-wrapper">
		<header id="header">
			<div class="5grid-layout">
				<div class="row">
					<div class="12u" id="logo"> <!-- Logo -->
						<h1>&nbsp;</h1>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
				  </div>
				</div>
			</div>
			<div class="5grid-layout">
				<div class="row">
					<div class="12u" id="menu">
						<div id="menu-wrapper">
							<nav class="mobileUI-site-nav">
								<ul>
                  <li><a href="#" align="right"> <h2 align="right">USUARIO: <?php echo $_SESSION['Nombre_usa']; echo " "; echo $_SESSION['apellido_usa']; ?></h2></a></li>
                    <li class="current_page_item"><a href="index_adm.php">Inicio</a></li>
                    <li ><a href="Promocion_adm.php">Adm. promociones</a></li>
                  	<li ><a href="Reservacion.php">Adm. Reservaciones </a></li>
                  	<li ><a href="Modificacion_Reg.php">Adm.Usuarios</a></li>
                    <li ><a href="Modificacion_Reg.php">Adm.Destinos</a></li>
                  	<li><a href="Dex.php">Desconectar</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
	</div>
	<div id="page-wrapper" class="5grid-layout">
		<!-- inicio-->


	</div>
</div>
<div id="copyright" class="5grid-layout">
	<section>
		<p>&copy;2014 Oramaika   | Diseño:  Ing. Software UNET</p>
        <p><a href="https://www.facebook.com/embarcadero.chichirivicheedofalcon">FACEBOOK: Embarcadero Oramaika</a></p>
	</section>
</div>
</body>
<?php 
if (isset($_POST['res']))
{
      $_SESSION['ban']=false;
    	$viajeid= $_POST["lanc"]; 
      $destino= $_POST['variable'];
      $f_viaje= $_POST["fecha_viaje"];
      $fr=Date("Y-m-j");
      $cadultos= $_POST["Nadualtos"]; 
      $cninos= $_POST["Nninos"];
      $cedulausa=$_SESSION['cedula'];
      $estatus='Iniciado';
      $cad=generar_clave(10); 
     if($viajeid=='0')
     {
        echo "<script type='text/javascript'>alert('AVISO: Debe seleccionar un viaje y hora de salida y retorno');</script>";
     }
     else
     {

        $link = mysql_connect('localhost', 'root')
        or die('No se pudo conectar: ' . mysql_error());
        mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
        mysql_query("INSERT INTO reserva 
          (fk_viaje_res,
           fk_usua_res,
           fk_desti_res,
           fecha_viaje,
           fecha_operacion,
           cant_ninos,
           cant_adultos,
           estatus,
           Nlocalizador)
                     VALUES 
                     ('".$viajeid."',
                      '".$cedulausa."',
                      '".$destino."',
                      '".$f_viaje."',
                      '".$fr."',
                      '".$cninos."',
                      '".$cadultos."',
                      '".$estatus."',
                      '".$cad."')",$link);  
        $my_error = mysql_error($link); 
        mysql_close($link);

        if ($my_error) 
        {
            echo "<script type='text/javascript'>alert('AVISO: Existen problemas con la reservacion intente nuevamente');</script>";
        }
        else
        {
          $_SESSION['ban']=true;
          $_SESSION['CA']=$cadultos;
          $_SESSION['CN']=$cninos;
          $_SESSION['id_loc']=$cad;
          ?><script type="text/javascript">
          window.location="Pasajeros.php";
          </script><?php 
        }
     }
   }
?>
</html>