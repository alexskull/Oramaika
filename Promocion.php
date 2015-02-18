 <?php  session_start();?>
 <?php
    require_once('funciones/conectar.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Promoción</title>
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
								  	<li><a href="index_usa.php">Inicio</a></li>
                    <li class="current_page_item" ><a href="Promocion.php">Promociones</a></li>
                  	<li ><a href="Reservacion.php">Reservación</a></li>
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
    <?php 
        $link = mysql_connect('localhost', 'root')
        or die('No se pudo conectar: ' . mysql_error());
        mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
        $consul_Promo="SELECT * from promo";
        $resulS_consul_promo=mysql_query($consul_Promo,$link);
        $my_error = mysql_error($link); 
        if ($my_error) 
        {
            echo "<script type='text/javascript'>alert('AVISO: Existen problemas con la conexión');</script>";
        }
        while($fila=mysql_fetch_array($resulS_consul_promo)) 
        {
          if ($fila['id_promo']>1) 
          {

   
    ?>
     <form method="POST" name="Promos" action="Reservacion.php?PromoID=<?php echo $fila['id_promo']?>" >
      <div class="row">
        <div class="3u">
          <div id="sidebar2">
            <section><br>
               <a ><img src="images/Promo<?php echo $fila['id_promo']?>.png" alt="" class="img-alignleft"></a>
               <div class="sbox2">
               </div>
            </section>
          </div>
        </div>
          <div class="9u mobileUI-main-content">
            <div id="content"><br><br>
              <h2 align="right">promocion: <?php echo $fila['nom_promo'];?><br>
                <br>Descuento del - <?php echo $fila['PorcentajeDes']."";?></h2>
                <div class="post" align="left">
                  <section>
                    <h12>    
                      <p>
                        <span class="Estilo2"><?php echo $fila['desp_promo']; ?><br> todos nuesros precios incluyen IVA validosegun condiciones. <br><br>
                          valido desde <?php echo $fila['fec_ini_promo']; ?> hasta <?php echo $fila['fec_fin_promo']; ?> </span>    
                      </p>
                      <P><input  name="PromoBoton" id="res" value="RESERVAR" type="submit"  class="input-botonC"  ></P>           
                    </h12>
                  </section>
                </div>
              </div>
            </div>  
      </div>
    </form>
    <?php
          }
       } mysql_close($link);
    ?>
	</div>
</div>
<div id="copyright" class="5grid-layout">
	<section>
		<p>&copy;2014 Oramaika   | Diseño:  Ing. Software UNET</p>
        <p><a href="https://www.facebook.com/embarcadero.chichirivicheedofalcon">FACEBOOK: Embarcadero Oramaika</a></p>
	</section>
</div>
</body>
</html>

                  
                   
                     
                    
                
            