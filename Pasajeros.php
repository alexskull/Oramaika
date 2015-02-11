 <?php 
  
 session_start();
    if ($_SESSION['ban']==false) 
    {
       ?><script type="text/javascript">
          window.location="Reservacion.php";
       </script><?php 
    }
    
 ?>

<!DOCTYPE HTML>
<html>
<head>
<title>Pasajeros</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<style type="text/css">
<!--
-->
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
									<li><a href="index_usa.php">Inicio</a></li>
                  <li class="current_page_item"><a href="Reservacion.php">Reservación</a></li>
                  <li ><a href="Modificacion_Reg.php">Perfil de Usuario</a></li>
                  <li><a href="Dex.php">Cerrar Sesión</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
	</div>
	<div id="page-wrapper" class="5grid-layout">
		<div id="content">
        <div class="post" align="left">
						<h2 align="center">Registro de Pasajeros</h2>  	
                <form method="POST" name="registrodeusa" >
                  <h12><p align="right">Adultos</p>  
                  <?php for ($i=1; $i <=$_SESSION['CA']; $i++) 
                  { 
                  ?>
                    <p>
                      <span class="Estilo1 Estilo2">Pasajero <?php echo $i; ?></span>
                      <input name="Cedula<?php echo $i; ?>" type="number" class="laR"  maxlength="9" required title="INGRESANDO LA CEDULA SIN CARACTERES ESPECIALES"  placeholder="Cedula" >
               	      <input name="Nombre<?php echo $i; ?>" type="text" class="laR"  maxlength="25" required title="INGRESANDO EL NOMBRE"  placeholder="Nombre">
                   	  <input name="Apellido<?php echo $i; ?>" type="text" class="laR"  maxlength="25" required title="INGRESANDO LOS APELLIDOS"  placeholder="Apellidos">
                   	</p>
           <?php } ?>
	                </h12>
                <br><br>
                  <h12>
                  <?php if ($_SESSION['CN']>0) {
                    ?><p align="right">Preferencial Niños y Adultos mayores de 60 años</p> <?php
                  } ?>
                     
                  <?php for ($i=1; $i <=$_SESSION['CN'] ; $i++) 
                  { 
                  ?>
                    <p>
                      <span class="Estilo1 Estilo2">Pasajero <?php echo $i; ?></span>
                      <input name="CedulaN<?php echo $i; ?>" type="number" class="laR"  maxlength="9"  title="INGRESANDO LA CEDULA SIN CARACTERES ESPECIALES"  placeholder="Cedula" >
                      <input name="NombreN<?php echo $i; ?>" type="text" class="laR"  maxlength="25" required title="INGRESANDO EL NOMBRE"  placeholder="Nombre">
                      <input name="ApellidoN<?php echo $i; ?>" type="text" class="laR"  maxlength="25" required title="INGRESANDO LOS APELLIDOS"  placeholder="Apellidos">
                    </p>
           <?php } ?>
                  <P><input  name="pas" id="res" value="RESERVAR" type="submit"  class="input-botonC"  ></P>  
                  </h12>
                </form>	           
						</div>
				</div>
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
if (isset($_POST['pas']))
{
	 	 $link = mysql_connect('localhost', 'root')
	   or die('No se pudo conectar: ' . mysql_error());
		  mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
      $fkres=$_SESSION['id_loc'];
      $tipo='Adulto';
      $bann1=$bann0=false;
      for ($i=1; $i <=$_SESSION['CA'] ; $i++) 
      { 
        $nombreA=$_POST['Nombre'.$i.''];
        $apellidoA=$_POST['Apellido'.$i.''];
        $cedulaA=$_POST['Cedula'.$i.''];

          mysql_query("INSERT INTO pasa
                 (fk_reserva,
                  cedula_pasa,
                  nom_pasa,
                  apellido_pasa,
                  tipo_pasa)
                  VALUES ('".$fkres."',
                          '".$cedulaA."',
                          '".$nombreA."',
                          '".$apellidoA."',
                          '".$tipo."')",$link);
           
          $my_error = mysql_error($link);
          if ($my_error) 
          {
               echo "<script type='text/javascript'>alert('AVISO: Error en la insercion de datos');</script>";
               $bann0=false;
          }
          else
          {
              $bann1=$bann0=true;
          }
      }
      $tipo='Preferencial';
      for ($i=1; $i <=$_SESSION['CN'] ; $i++) 
      { 
        $nombreN=$_POST['NombreN'.$i.''];
        $apellidoN=$_POST['ApellidoN'.$i.''];
        $cedulaN=$_POST['CedulaN'.$i.''];

          mysql_query("INSERT INTO pasa
                 (fk_reserva,
                  cedula_pasa,
                  nom_pasa,
                  apellido_pasa,
                  tipo_pasa)
                  VALUES ('".$fkres."',
                          '".$cedulaN."',
                          '".$nombreN."',
                          '".$apellidoN."',
                          '".$tipo."')",$link);
           
          $my_error = mysql_error($link);
          if ($my_error) 
          {
               echo "<script type='text/javascript'>alert('AVISO: Error en la insercion de datos');</script>";
               $bann1=false;
          }
          else
          {
               $bann1=true;
          }
      }
  		if ($bann0==true and $bann1==true) 
      {
          mysql_close($link); 
          $_SESSION['ban']=false;
          $_SESSION['CA']='0';
          $_SESSION['CN']='0';
          $_SESSION['id_loc']='0';
          echo "<script type='text/javascript'>alert('AVISO: Los pasajeros han sido agregados existosamente');</script>";   
          ?><script type="text/javascript">
          window.location="PDF.php";
          </script><?php 
      }     
      mysql_close($link);	 
}
?>
</html>