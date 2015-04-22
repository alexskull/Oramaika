<?php session_start();
if (isset($_GET['emi'])) 
{
  $emi=$_GET['emi'];
  
} 
$link = mysql_connect('localhost', 'root')
or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
$estatus="SELECT * FROM reserva WHERE Nlocalizador='$emi' and estatus='Pago'";
$resulS_estatus=mysql_query($estatus,$link);
if (mysql_num_rows($resulS_estatus)==1) 
{
    echo "<script type='text/javascript'>alert('AVISO: El pago ya fue efectuado');</script>";
    mysql_close($link);
    ?><script type="text/javascript">
        window.location="index_usa.php";
    </script><?php
}
mysql_close($link);
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Pago de Reservación</title>
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
									<li ><a href="#">USUARIO: <?php echo $_SESSION['Nombre_usa']; echo " "; echo $_SESSION['apellido_usa']; ?></a></li>
                  <li class="current_page_item"><a href="index_usa.php">Inicio</a></li>
                  <li ><a href="Promocion.php">Promociones</a></li>
                  <li><a href="Reservacion.php">Reservación</a></li>
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
		<div class="row">
			<div class="3u">
				<div id="sidebar2">
					<section>
						<a href="#"><img src="images/rp.jpg" alt="" class="img-alignleft"></a>	
						<div class="sbox2">
						</div>
					</section>
				</div>
			</div>
			<div class="9u mobileUI-main-content">
				<div id="content">
					<section>
						<div class="post" align="left">
							<h2 align="right">Pago de Reservación</h2>
						  	<section>
               	  <form method="POST" name="registrodeusa" >
           	      	<h12>
                      <h2>
                        
                      </h2>
                      <p>
                        <?php if (isset($_GET['usu'])) 
                        {
                          ?>
                              Usuario: <?php echo $_GET['usu']; ?><br>
                          <?php
                        } ?>
                      </p>
                      <p>
                        <?php if (isset($_GET['ci'])) 
                        {
                          ?>
                              Cedula: <?php echo $_GET['ci']; ?><br>
                          <?php
                        } ?>
                      </p>
                      <p>
                        <?php if (isset($_GET['emi'])) 
                        {
                         $emi=$_GET['emi'];
                          ?>
                             N° Localizador: <?php echo $_GET['emi']; ?><br>
                          <?php
                        } ?>
                      </p>
                       <p>
                        <?php if (isset($_GET['via'])) 
                        {
                          ?>
                             Fecha de Viaje: <?php echo $_GET['via']; ?><br>
                          <?php
                        } ?>
                      </p>
                       <p>
                        <?php if (isset($_GET['lan'])) 
                        {
                          ?>
                             Lancha: <?php echo $_GET['lan']; ?><br>
                          <?php
                        } ?>
                      </p><br>
                      <p>
                        <span class="Estilo1 Estilo2">Banco (*)</span>
                        <select class="laR" name="banco">
                           <option value="0">Seleccione el Banco</option>
                           <option value="Banco de Venezuela">Banco de Venezuela</option>
                           <option value="Banesco">Banesco</option>
                           <option value="Mercantil">Mercantil</option>
                           <option value="BBVA">BBVA</option>
                           <option value="Sofitasa">Sofitasa</option>
                           <option value="100% Banco">100% Banco</option>
                           <option value="Banco Industrial">Banco Industrial</option>
                           <option value="BOD">BOD</option>
                           <option value="Banco Bicentenario">Banco Bicentenario</option>
                        </select>
                      </p>
                      <p>
                        <span class="Estilo1 Estilo2">Número de deposito (*)</span>
                        <input name="Ndeposito" type="number" class="laR"  required title="INGRESANDO EL NÚMERO DE DEPOSITO"  >
                      </p>
                      <p>
                        <span class="Estilo1 Estilo2">Fecha de deposito (*)</span>
                        <?php 
                          $f1=$_SESSION['re_opracion']; 
                          $f2=date('Y-m-j'); 
                        ?>
                        <input name="Fdeposito" min=<?php echo $f1; ?> max=<?php echo $f2;?> type="date" class="laR"   required title="INGRESANDO LA FECHA DE DEPOSITO" >
                      </p>
                      <p>
               	      	 	<span class="Estilo2">Monto(*)</span>
               	      	 	<input name="mon" type="number" class="laR" min="3"  required title="INGRESANDO EL MONTO "   >
   	      	    		 </p>
                     <p>
           	      	   <input  name="pago" value="Confirmar Pago" type="submit"  class="input-botonC"  >
               	     </p> 
                   </h12>
               	  </form>	
               </section>
						</div>
					</section>
				</div>
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
if (isset($_POST['pago']))
{
	 if ($_POST['banco']!='0')
   {  
      $nombrebanco=mysql_real_escape_string($_POST['banco']);
      $nbanco=mysql_real_escape_string($_POST['Ndeposito']);
      $mont=$_POST['mon'];
      $fpago=$_POST['Fdeposito'];

      $link = mysql_connect('localhost', 'root')
      or die('No se pudo conectar: ' . mysql_error());
      mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
      echo  $nbanco;
      $consul_banca="SELECT * FROM banca WHERE numero='".$nbanco."'";
      $resulS_banca=mysql_query($consul_banca,$link);

      if (mysql_num_rows($resulS_banca)==1) 
      {
         mysql_query("INSERT INTO pago
                 (fk_pa_reser,
                  monto,
                  num_deposito,
                  banco,
                  Fecha_deposito)
                  VALUES ('".$emi."',
                      '".$mont."',
                      '".$nbanco."',
                      '".$nombrebanco."',
                      '".$fpago."')",$link);
          $my_error = mysql_error($link);
          if ($my_error) 
          {
               echo "<script type='text/javascript'>alert('AVISO: Error en la insercion de datos');</script>";
          }
          else
          {
            $sqlUpdate=mysql_query("UPDATE reserva SET  
                                           estatus='Pago'
                                    WHERE Nlocalizador='$emi' ",$link);
            $consul_bancaresdele="DELETE FROM banca WHERE numero='".$nbanco."'";
             mysql_query($consul_bancaresdele,$link);
            mysql_close($link);
            echo "<script type='text/javascript'>alert('AVISO: Su pago se ha realizado existosamente');</script>";
            ?><script type="text/javascript">
                window.location="index_usa.php";
            </script><?php 
          } 
      }
      else
      {
        echo "<script type='text/javascript'>alert('AVISO: Debe Ingresar numero valido de deposito ');</script>";
      }
   }
   else
   {
      echo "<script type='text/javascript'>alert('AVISO: Debe seleccionar un banco');</script>";
   }
   mysql_close($link);
}
?>
</html>