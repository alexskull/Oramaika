 <?php  session_start();?>
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
<link rel="stylesheet" href="css/style-desktop1.css" />

<link rel="stylesheet" href="css/least.min.css" />
</noscript>


<script src="js/jquery.min.js"></script>
<script src="js/jquery.lazyload.min.js"></script>
<script src="js/least.min.js?03072013"></script>
<script src="js/prism.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none&amp;mobileUI.openerWidth=52"></script>



<!-- Add jQuery library -->
    <!-- <script type="text/javascript" src="lib/jquery-1.8.2.min.js"></script> -->

    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="lib/jquery.mousewheel-3.0.6.pack.js"></script>

    <!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.3"></script>
    <link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.2" media="screen" />

    <!-- Add Button helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
    <script type="text/javascript" src="source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

    <!-- Add Thumbnail helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
    <script type="text/javascript" src="source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <!-- Add Media helper (this is optional) -->
    <script type="text/javascript" src="source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>

    <script type="text/javascript">
      $(document).ready(function() {

        $(".fancybox").fancybox({
          type : 'iframe',
          autoSize : false,
          beforeLoad : function() {
            this.width = 650;
            this.height = 450;
          }
        });

      });
    </script>


</head>

<body class="twocolumn2">
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
                  <li ></li><li></li><li></li><li></li><li class="current_page_item"><a href="index_usa.php">Inicio</a></li>
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
    <div id="content">
        <div class="post" >
            <h2 align="center">Estatus de Reservaciones y pagos</h2>   
               <h12>
                 <?php 
                 $cedula=$_SESSION['cedula'];
                    $link = mysql_connect('localhost', 'root')
                    or die('No se pudo conectar: ' . mysql_error());
                    mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');

                    $consul_re="SELECT * FROM reserva WHERE fk_usua_res =".$cedula." ORDER BY fecha_operacion DESC";
                    $resulS_consul_re=mysql_query($consul_re,$link);
                    if (mysql_num_rows($resulS_consul_re)==0)
                    {
                ?>
                        <p><h3  aling="center">AVISO: No se tienen Reservaciones</h3> </p>
                <?php
                    }
                    ?> <div class="pintar LaM" >


                      <div  id="menu" >
                          <h12>
                            <ul >
                              <li class="Menu" style="padding-left: 120px"><h12> <a >Destino</a></h12></li>
                              <li class="Menu"><h12> <a >Lancha</a></h12></li>
                              <li class="Menu"><h12> <a >Salida - Retorno</a></h12></li>
                              <li class="Menu"><h12> <a >Viaje</a></h12></li>
                              <li class="Menu"><h12> <a >Estado</a></h12></li>
                            </ul>
                          </h12>
                        </div>
                     </div>
<br>



                    <?php
                    while($refi=mysql_fetch_array($resulS_consul_re))
                    { 
                ?>
                      <div class="pintar laM" align="right">
                          <div  id="menu" align="right">
                          <h12>
                           <?php 
                               $consul_destire="SELECT * FROM desti WHERE id_desti =".$refi['fk_desti_res']."";
                               $resulS_destire=mysql_query($consul_destire,$link);
                               $destire=mysql_fetch_array($resulS_destire);

                               $consul_viajere="SELECT * FROM viaje WHERE id_viaje =".$refi['fk_viaje_res']."";
                               $resulS_viajere=mysql_query($consul_viajere,$link);
                               $viajere=mysql_fetch_array($resulS_viajere);

                               $consul_lanre="SELECT * FROM lanc WHERE id_lanc =".$viajere['fk__lanc_viaje']."";
                               $resulS_lanre=mysql_query($consul_lanre,$link);
                               $lanre=mysql_fetch_array($resulS_lanre);

                               $_SESSION['re_viaje']=$refi['fecha_viaje'];
                               $_SESSION['re_opracion']=$refi['fecha_operacion'];
                               $_SESSION['relocalizador']=$refi['Nlocalizador'];
                               $_SESSION['desnom']=$destire['nom_desti'];
                               $_SESSION['desprecio']=$destire['precio_desti'];
                               $_SESSION['viasalida']=$viajere['hora_salida'];
                               $_SESSION['viaretorno']=$viajere['hora_retorno'];
                               $_SESSION['lannom']=$lanre['nom_lanc'];
                               $_SESSION['lanlan']=$lanre['lanchero'];
                           ?>
                           
                            <ul align="right">
                              <li><h12> <a><?php echo $destire['nom_desti']; ?></a></h12></li>
                              <li><a><?php echo $lanre['nom_lanc']; ?> </a></li>
                              <li ><a><?php echo $viajere['hora_salida'] ?> - <?php echo $viajere['hora_retorno'] ?></a></li>
                              <li><a > <?php echo $refi['fecha_viaje']; ?></a></li>
                              <li><a > <?php echo $refi['estatus']; ?></a></li>
                             <?php 
                                  $estatus="SELECT * FROM reserva WHERE Nlocalizador='".$refi['Nlocalizador']."' and estatus='Pago'";
                                  $resulS_estatus=mysql_query($estatus,$link);
                                  if (mysql_num_rows($resulS_estatus)==1) 
                                  {
                                      ?><li class="Modificadores"><a>Pago</a></li><?php
                                      
                                  }
                                  else
                                  {
                                    ?> <li class="Modificadores"><a href="Pago.php?usu=<?php echo $_SESSION['Nombre_usa']; echo " "; echo $_SESSION['apellido_usa']; ?>&ci=<?php echo $cedula;?>&emi=<?php echo $_SESSION['relocalizador'];?>&via=<?php echo $_SESSION['re_viaje'];?>&lan=<?php echo $_SESSION['lannom']; echo " Salida:"; echo $_SESSION['viasalida']; echo " Retorno:"; echo $_SESSION['viaretorno'];?>">Pago</a></li>
                                    <?php
                                     
                                  }  
                              ?>
                              <li class="Modificadores"><a class="fancybox fancybox.iframe" href="IframeEditarReservacion.php?Nlocalizador=<?php echo $refi['Nlocalizador'];?>">Modificar</a></li>
                              <?php 
                                  $estatus="SELECT * FROM reserva WHERE Nlocalizador='".$refi['Nlocalizador']."' and estatus='Pago'";
                                  $resulS_estatus=mysql_query($estatus,$link);
                                  if (mysql_num_rows($resulS_estatus)==1) 
                                  {
                                      ?><li class="Modificadores"><a>Cancelar</a></li><?php
                                      
                                  }
                                  else
                                  {
                                    ?> <li class="Modificadores"><a href="cancelar.php?localizador=<?php echo $refi['Nlocalizador'];?>">Cancelar</a></li>
                                    <?php
                                     
                                  }  
                              ?>
                              
                              
                            </ul>
                         
                          </h12>
                          </div>
                       
                      </div>
                        
                <?php 
                    }
                    mysql_close($link);
                 ?> 
                 </h12>
                            
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
</html>