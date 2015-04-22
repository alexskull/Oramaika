 <?php  session_start();?>
 <?php
    require_once('funciones/conectar.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Reservaciones</title>
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
								  	<li><a href="#">USUARIO: <?php echo $_SESSION['Nombre_usa']; echo " "; echo $_SESSION['apellido_usa']; ?></a></li>
                  <li ><a href="index_usa.php">Inicio</a></li>
                  <li ><a href="Promocion.php">Promociones</a></li>
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
		<!-- inicio-->
		<?php 
    if(isset($_GET["PromoID"])){

      $PromoID=$_GET["PromoID"];

            $link = mysql_connect('localhost', 'root')
          or die('No se pudo conectar: ' . mysql_error());
        mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
        $query=mysql_query("SELECT * FROM desti WHERE Fk_desti_promo='$PromoID';");   
            $my_error = mysql_error($link); 
            if ($my_error) 
            {
                echo "<script type='text/javascript'>alert('AVISO: Existen problemas con la conexión');</script>";
            }

    }else{
			$link = mysql_connect('localhost', 'root')
	  	    or die('No se pudo conectar: ' . mysql_error());
	  		mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
	  		$query=mysql_query("SELECT * FROM desti");  
            $my_error = mysql_error($link); 
            if ($my_error) 
            {
                echo "<script type='text/javascript'>alert('AVISO: Existen problemas con la conexión');</script>";
            }
      }
			while($row=mysql_fetch_assoc($query)) 
	        {
		?>
		<div class="row">
			<div class="3u">
				<div id="sidebar2">
					<section>
						<br><br><br><br><br><br>
						<a href="#"><img src="images/destinos/<?php echo $row['id_desti']?>.png" alt="" class="img-alignleft"></a>	
						<div class="sbox2">
						</div>
					</section>
				</div>
			</div>
			<div class="9u mobileUI-main-content">
				<div id="content">						
					<h2 align="right"> 
						<?php echo $row['nom_desti'];?><br><?php echo $row['precio_desti']." Bs";?></h2>
					<section>
						<div class="post" align="left">
						<section>
             	  			<form method="POST" name="registrodeusa" >
             	      			<h12>
                            <details class="Ocultar"> <select name="variable"> <option value=<?php echo $row['id_desti'];  ?>> <?php echo $row['id_desti'];  ?></option></select></details>
                              
                              <p>
             	      	 	 			<span class="Estilo2">Promoción: </span>
		             	      	 	  	
			                            <?php
                                            
                                            $consul_Promo="SELECT * from promo where id_promo=".$row['Fk_desti_promo']."";
                                            $resulS_consul_promo=mysql_query($consul_Promo,$link);
                                            while($fila=mysql_fetch_array($resulS_consul_promo))
                                            { 
                                        ?>
                                      			<span class="Estilo1 Estilo2"><?php echo $fila['nom_promo']; ?></span>                                              
                                        <?php
                                                if ($fila['id_promo']>'1' ) 
                                                {
                                        ?>
                                                	<br><p>
								                      	<span class="Estilo1 Estilo2">Descuento del <?php echo $fila['PorcentajeDes']; ?></span>
								                      	<br>
								                      	<span class="Estilo1 Estilo2"><?php echo $fila['desp_promo']; ?></span>	
								     	      	    </p>
								     	      	   
                                        <?php
                                                }
                                                $consul_lanc="SELECT * from lanc ";
                                            	$resulS_consul_lanc=mysql_query($consul_lanc,$link);
                                        ?> 
                                        <br><P>
                                            	<select name="lanc" class="laM" required>
                                                <option value="0"> Elija Lanche hora de salida y hora de llegada</option>
                                        <?php
                                            	while($flanc=mysql_fetch_array($resulS_consul_lanc))
                                            	{ 

                                            		$consul_viaje="SELECT * from viaje where fk__lanc_viaje=".$flanc['id_lanc']." AND fk_desti_viaje=".$row['id_desti']."";
                                            		$resulS_consul_viaje=mysql_query($consul_viaje,$link);
                                            		if($fviaje=mysql_fetch_array($resulS_consul_viaje))
                                            		{	
                                            			if($fviaje['estatus_viaje']=='Activo' and $fviaje['id_viaje']>'0' )
                                            			{
                                         ?>
	                                            			<option class="laM" value=<?php echo $fviaje['id_viaje'];?>>
	                                            				Lancha: <?php echo $flanc['nom_lanc'];?>
	                                            				(Hora Salida: <?php echo $fviaje['hora_salida'];?>
	                                            				Hora Retorno: <?php echo $fviaje['hora_retorno'];?>)
	                                            			</option> 
                                        <?php
                                        				}
                                        				
	                                            	}
	                                            }
	                                    ?>
                                            </select> 
                                            </P>
                                            <P>
                                            	<span class="Estilo2">Fecha de Viaje</span>
                                              <?php 
                                              $fechaini=date("Y-m-j");
                                              $nuevafecha = strtotime ( '6 day' , strtotime ( $fechaini ) ) ;
                                              $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
                                                         ?>
                                            	<input  name="fecha_viaje" min=<?php echo $nuevafecha; ?> id="fecha_viaje"  type="Date"  class="laR" required >
                                            </P>
                                             
                                             <p><span class="Estilo2">Cantidad de adultos: </span>
		                                        <select name="Nadualtos" class="laR" required>
												<?php
			                                            for ($i=1; $i <16 ; $i++) 
			                                            { 
			                                    ?>
			                                    			<option Value=<?php echo $i;?>><?php echo $i;?></option>
			                                    <?php
			                                            }
		                                        ?> 
		                                    </select>
                                            </p>

                                            <p><span class="Estilo2">Cantidad de niños o adultos mayores a 60: </span>
		                                        <select name="Nninos" class="laR" required>
												<?php
			                                            for ($i=0; $i <5 ; $i++) 
			                                            { 
			                                    ?>
			                                    			<option Value=<?php echo $i;?>><?php echo $i;?></option>
			                                    <?php
			                                            }
		                                        ?> 
                                            </select>
                                        	</p>
                                            <br>
                                            <P><input  name="res" id="res" value="RESERVAR" type="submit"  class="input-botonC"  ></P>  
                                        <?php  
			                   				} 
                                        ?>
         	      	 				</p>	   			
     	      	    			</h12>
             	  			</form>	
              			</section>
						</div>
					</section>
				</div>
			</div>
		</div>
		<!-- Fin-->
<?php } mysql_close($link);?>

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