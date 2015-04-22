 <?php  session_start();?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/5grid/core.css" />
    <link rel="stylesheet" href="css/5grid/core-desktop.css" />
    <link rel="stylesheet" href="css/5grid/core-1200px.css" />
    <link rel="stylesheet" href="css/5grid/core-noscript.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-desktop.css" />
    <link rel="stylesheet" href="css/least.min.css" />
		<title>Modificar Reserva</title>
	</head>
	<body>
			<div id="copyright">
			<?php

			if(isset($_GET["Nlocalizador"])){

	     		$Nlocalizador=$_GET["Nlocalizador"];

				$link = mysql_connect('localhost', 'root')
		  	    or die('No se pudo conectar: ' . mysql_error());
		  		mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
		  		$query=mysql_query("SELECT d.id_desti,d.nom_desti,d.precio_desti , d.precio_desti , v.fk__lanc_viaje,d.Fk_desti_promo , v.id_viaje, l.id_lanc, l.nom_lanc, v.hora_salida, v.hora_retorno, r.fecha_viaje, r.cant_adultos, r.fk_usua_res, r.cant_ninos, r.Nlocalizador FROM reserva r
					JOIN viaje v on (r.fk_viaje_res=v.id_viaje)
					JOIN lanc l on (v.fk__lanc_viaje=l.id_lanc)
					JOIN usua u on (r.fk_usua_res=u.id_ci)
					JOIN desti d on (r.fk_desti_res=d.id_desti)
					Where r.Nlocalizador = '$Nlocalizador';");  

		  	}
	            $my_error = mysql_error($link); 
            if ($my_error) 
            {
                echo "<script type='text/javascript'>alert('AVISO: Existen problemas con la conexión');</script>";
            }




            while($row=mysql_fetch_assoc($query)) 
	        {
	        	/*
	        	Pendiente
	        	*/
	        	$cedulausa=$row['fk_usua_res'];
	        	$cad=$row['Nlocalizador']; 
	        	$_SESSION['cant_ninos_antes']=$row['cant_ninos'];
	        	$_SESSION['cant_adultos_antes']=$row['cant_adultos'];
				/*
	        	Pendiente
	        	*/
		?>
		
		
			
										
					<h2 align="center"><?php echo $row['nom_desti'];?><br><?php echo $row['precio_desti']." Bs";?>
						
					
					
						
             	  			<form method="POST" name="registrodeusa" >
             	      			
                            <details style="display:none"; ><br> 
                            	<select name="variable"> 
                            		<option value=<?php echo $row['id_desti'];  ?>> <?php echo $row['id_desti'];  ?></option>
                            	</select>
                            </details>
                              
                              <p>
             	      	 	 			
		             	      	 	  	
			                            <?php
                                            
                                            $consul_Promo="SELECT * from promo where id_promo=".$row['Fk_desti_promo']."";
                                            $resulS_consul_promo=mysql_query($consul_Promo,$link);
                                            while($fila=mysql_fetch_array($resulS_consul_promo))
                                            { 
                                        ?><span class="Registro">Promoción: </span> 
                                      			<span ><?php echo $fila['nom_promo']; ?></span>
                                      			                                             
                                        <?php
                                                if ($fila['id_promo']>'1' ) 
                                                {
                                        ?>
                                                	<br><p>
								                      	<span >Descuento del <?php echo $fila['PorcentajeDes']; ?></span>
								                      	<br>
								                      	<span ><?php echo $fila['desp_promo']; ?></span>	
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
                                            				if($row['id_viaje']==$fviaje['id_viaje']){
                                         ?>
		                                            			<option class="laR" value=<?php echo $fviaje['id_viaje'];?> selected>
		                                            				Lancha: <?php echo $flanc['nom_lanc'];?>
		                                            				(Hora Salida: <?php echo $fviaje['hora_salida'];?>
		                                            				Hora Retorno: <?php echo $fviaje['hora_retorno'];?>)
		                                            			</option> 
                                        <?php
                                        					}
                                        					else{
                                        						?>
                                        						<option class="laR" value=<?php echo $fviaje['id_viaje'];?> selected>
	                                            				Lancha: <?php echo $flanc['nom_lanc'];?>
	                                            				(Hora Salida: <?php echo $fviaje['hora_salida'];?>
	                                            				Hora Retorno: <?php echo $fviaje['hora_retorno'];?>)
	                                            				</option> 

                                        						<?php
                                        					}
                                        				}
                                        				
	                                            	}
	                                            }
	                                    ?>
                                            </select> 
                                            <br>
                                            </P>
                                            <br>
                                            <P>
                                            	<span>Fecha de Viaje</span>  <br>
                                              <?php 
                                              $fechaini=date("Y-m-j");
                                              $nuevafecha = strtotime ( '6 day' , strtotime ( $fechaini ) ) ;
                                              $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
                                                         ?>
                                            	<input  name="fecha_viaje" min=<?php echo $nuevafecha; ?> id="fecha_viaje"  type="Date"  class="laR" required value="<?php echo $row['fecha_viaje'];?>" >
                                            </P>
                                            <br>
                                             
                                             <p><span class="">Cantidad de adultos: </span> <br>
		                                        <select name="Nadualtos" class="laR" required>
												<?php
			                                            for ($i=1; $i <16 ; $i++) 
			                                            { 
			                                   				if($i==$row['cant_adultos']){ 

			                                   			?>	
			                                    			<option Value=<?php echo $i;?> selected><?php echo $i;?></option>
			                                    <?php
			                                            	}else{
			                                            		?>
			                                            		<option Value=<?php echo $i;?>><?php echo $i;?></option>
			                                            	<?php
			                                            	}
			                                        	}
		                                        ?> 

		                                    </select>

                                            </p>
                                            <br>

                                            <p><span class="">Cantidad de niños o adultos mayores a 60: </span><br>
		                                        <select name="Nninos" class="laR" required>
												<?php
			                                            for ($i=0; $i <5 ; $i++) 
			                                            { 
			                                   				if($i==$row['cant_ninos']){ 

			                                   			?>	
			                                    			<option Value=<?php echo $i;?> selected><?php echo $i;?></option>
			                                    <?php
			                                            	}else{
			                                            		?>
			                                            		<option Value=<?php echo $i;?>><?php echo $i;?></option>
			                                            	<?php
			                                            	}
			                                        	}
		                                        ?> 
                                            </select>
                                        	</p>
                                        	
                                            <br>
                                            <P><input  name="res" id="res" value="Modificar" type="submit"  class="input-botonC"  ></P>  
                                        <?php  
			                   				} 
                                        ?>
         	      	 				</p>	   			
     	      	    			
             	  			</form>	
              			
					
				
			
		
		<!-- Fin-->
							<?php } mysql_close($link);?>

       

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
      
      $estatus='Iniciado';
      
     if($viajeid=='0')
     {
        echo "<script type='text/javascript'>alert('AVISO: Debe seleccionar un viaje y hora de salida y retorno');</script>";
     }
     else
     {

        $link = mysql_connect('localhost', 'root')
        or die('No se pudo conectar: ' . mysql_error());
        mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
        
		$sql = "UPDATE `reserva` SET  `fk_viaje_res` =  '".$viajeid."' ,  `fk_usua_res` =  '".$cedulausa."' ,  `fk_desti_res` =  '".$destino."' ,  `fecha_viaje` =  '".$f_viaje."' ,  `fecha_operacion` =  '".$fr."' ,  `cant_ninos` =  '".$cninos."' ,  `cant_adultos` =  '".$cadultos."',  `estatus` =  '".$estatus."'   WHERE `Nlocalizador` = '$cad' "; 
		mysql_query($sql,$link) ; 
		echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 


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
          if($_SESSION['cant_ninos_antes']!=$cninos || $_SESSION['cant_adultos_antes']!=$cadultos){
           ?>
            <script type="text/javascript">
              window.location="IframePasajeros.php";
            </script>
          <?php 
          }
        }
     }
   }
?>


</html>