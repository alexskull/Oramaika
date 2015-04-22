 <?php  session_start();
        error_reporting(0);
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<link href="css/Inscribir.css" rel="stylesheet" type="text/css"/>


		<title>Modificar Reserva</title>
	</head>
	<body>
			<div class="CajaInscripciones">
				<?php
				
				$link = mysql_connect('localhost', 'root')
		  	    or die('No se pudo conectar: ' . mysql_error());
		  	    mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
		  	    $my_error = mysql_error($link); 

            	if ($my_error) 
            	{
                	echo "<script type='text/javascript'>alert('AVISO: Existen problemas con la conexión');</script>";
            	}
            	$fkres=$_SESSION['id_loc'];

            	$query=mysql_query("SELECT * FROM `pasa` WHERE fk_reserva='$fkres';");

            	
	        	$_SESSION['A']=0;
	        	$cant_adult_antes=$_SESSION['cant_adultos_antes'];
	        	$cant_ni_antes=$_SESSION['cant_ninos_antes'];
				
				?>
				 <form method="POST" name="registrodeusa" >
                  <h12><p align="right">Adultos</p>  
                  <?php 
 					$_SESSION['cont1']=0;
 					$contPasaTotales=1;

                  while($row=mysql_fetch_assoc($query)) 
                  { 
                  	if($row['tipo_pasa']=='Adulto'){
                  ?>
	                    <p>
	                      <span >Pasajero <?php echo $contPasaTotales; ?></span> <br>
	                      <input value="<?php echo $row['id_pasa']; ?>" name="idpasajeroA<?php echo $_SESSION['cont1']; ?>" type="hidden">
	                      <input value="<?php echo $row['cedula_pasa'];?>" name="Cedula<?php echo $row['id_pasa']; ?>" type="number" class="InputsRegistro"  maxlength="9" required title="INGRESANDO LA CEDULA SIN CARACTERES ESPECIALES"  placeholder="Cedula" >
	               	      <input value="<?php echo $row['nom_pasa'];?>" name="Nombre<?php echo $row['id_pasa']; ?>" type="text" class="InputsRegistro"  maxlength="25" required title="INGRESANDO EL NOMBRE"  placeholder="Nombre">
	                   	  <input value="<?php echo $row['apellido_pasa'];?>" name="Apellido<?php echo $row['id_pasa']; ?>" type="text" class="InputsRegistro"  maxlength="25" required title="INGRESANDO LOS APELLIDOS"  placeholder="Apellidos">
	                   	<br>
	                   	</p>
           
           		<?php 
           			$_SESSION['cont1']++;
           			$contPasaTotales++;
           			}
           		  $_SESSION['cont2']=0;
           		  }
           		  	while($_SESSION['CA']>$cant_adult_antes){
           		  ?>
           		  	
           		  	<p>
                      <span >Pasajero <?php echo $contPasaTotales; ?></span> <br>
                      <input  name="Cedula<?php echo $_SESSION['A']; ?>" type="number" class="InputsRegistro"  maxlength="9" required title="INGRESANDO LA CEDULA SIN CARACTERES ESPECIALES"  placeholder="Cedula" >
               	      <input  name="Nombre<?php echo $_SESSION['A']; ?>" type="text" class="InputsRegistro"  maxlength="25" required title="INGRESANDO EL NOMBRE"  placeholder="Nombre">
                   	  <input  name="Apellido<?php echo $_SESSION['A']; ?>" type="text" class="InputsRegistro"  maxlength="25" required title="INGRESANDO LOS APELLIDOS"  placeholder="Apellidos">
                   	<br>
                   	</p>

           		  <?php	
           		  	$cant_adult_antes++;
           		  	$_SESSION['A']++;	
           		  	$contPasaTotales++;
           		  	}
           		  ?>
	                </h12>
                <br><br>
                  <h12>
                  <?php 
                   $_SESSION['N']=0;
                  	if ($_SESSION['CN']>0) {
                    ?><p align="right">Preferencial Niños y Adultos mayores de 60 años</p> <?php
                   
                  } ?>

                  <?php
                    $query=mysql_query("SELECT * FROM `pasa` WHERE fk_reserva='$fkres';");
                  ?>

                  <?php while ($row=mysql_fetch_assoc($query)) 
                  { 
                  	if($row['tipo_pasa']=='Preferencial'){
                  
                  ?>
                    <p>
                      <span class="Estilo1 Estilo2">Pasajero <?php echo $contPasaTotales; ?></span><br>
                      <input value="<?php echo $row['id_pasa']; ?>" name="idpasajeroN<?php echo $_SESSION['cont2']; ?>" type="hidden">
                      <input value="<?php echo $row['cedula_pasa'];?>" name="CedulaN<?php echo $row['id_pasa']; ?>" type="number" class="InputsRegistro"  maxlength="9"  title="INGRESANDO LA CEDULA SIN CARACTERES ESPECIALES"  placeholder="Cedula" >
                      <input value="<?php echo $row['nom_pasa'];?>" name="NombreN<?php echo $row['id_pasa']; ?>" type="text" class="InputsRegistro"  maxlength="25" required title="INGRESANDO EL NOMBRE"  placeholder="Nombre">
                      <input value="<?php echo $row['apellido_pasa'];?>" name="ApellidoN<?php echo $row['id_pasa']; ?>" type="text" class="InputsRegistro"  maxlength="25" required title="INGRESANDO LOS APELLIDOS"  placeholder="Apellidos">
                    	<br>
                    </p>
           <?php 			$_SESSION['cont2']++;
           					$contPasaTotales++;
       					}
       					
       					}

       				while($_SESSION['CN']>$cant_ni_antes){

					?>
                    <p>
                      <span class="Estilo1 Estilo2">Pasajero <?php echo $cant_ni_antes; ?></span><br>
                      <input name="CedulaN<?php echo $_SESSION['N']; ?>" type="number" class="InputsRegistro"  maxlength="9"  title="INGRESANDO LA CEDULA SIN CARACTERES ESPECIALES"  placeholder="Cedula" >
                      <input name="NombreN<?php echo $_SESSION['N']; ?>" type="text" class="InputsRegistro"  maxlength="25" required title="INGRESANDO EL NOMBRE"  placeholder="Nombre">
                      <input name="ApellidoN<?php echo $_SESSION['N']; ?>" type="text" class="InputsRegistro"  maxlength="25" required title="INGRESANDO LOS APELLIDOS"  placeholder="Apellidos">
                    	<br>
                    </p>
           			<?php 
           			$cant_ni_antes++;
           			$_SESSION['N']++;
           			$contPasaTotales++;
       				}

           ?>
                  <P><input  name="pas" id="res" value="Modificar" type="submit"  class="Boton"  ></P>  
                  </h12>
                </form>	 


			</div>		
	</body>

<?php 
if (isset($_POST['pas']))
{

		$fkres=$_SESSION['id_loc'];
      	$tipo='Adulto';
      	$bann1=$bann0=false;

	 	$link = mysql_connect('localhost', 'root') or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');

     	for ($i=0; $i < $_SESSION['cont1'] ; $i++) { 

     		$idpasajeroA=$_POST['idpasajeroA'.$i.''];
     		$nombreA=$_POST['Nombre'.$idpasajeroA.''];
       		$apellidoA=$_POST['Apellido'.$idpasajeroA.''];
        	$cedulaA=$_POST['Cedula'.$idpasajeroA.''];

     		$sql = "UPDATE `pasa` SET  `fk_reserva` =  '".$fkres."' ,  `cedula_pasa` =  '".$cedulaA."' ,  `nom_pasa` =  '".$nombreA."',  `apellido_pasa` =  '".$apellidoA."' ,  `tipo_pasa` =  '".$tipo."'    WHERE `id_pasa` = '$idpasajeroA' "; 
     		mysql_query($sql,$link) ; 
			echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 


        	$my_error = mysql_error($link); 

     	}

      
      for ($i=0; $i <$_SESSION['A'] ; $i++) 
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


      for ($i=0; $i < $_SESSION['cont2'] ; $i++) { 

     		$idpasajeroN=$_POST['idpasajeroN'.$i.''];
     		$nombreA=$_POST['Nombre'.$idpasajeroN.''];
       		$apellidoA=$_POST['Apellido'.$idpasajeroN.''];
        	$cedulaA=$_POST['Cedula'.$idpasajeroN.''];

     		$sql = "UPDATE `pasa` SET  `fk_reserva` =  '".$fkres."' ,  `cedula_pasa` =  '".$cedulaA."' ,  `nom_pasa` =  '".$nombreA."',  `apellido_pasa` =  '".$apellidoA."' ,  `tipo_pasa` =  '".$tipo."'    WHERE `id_pasa` = '$idpasajeroA' "; 
     		mysql_query($sql,$link) ; 
			echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 


        	$my_error = mysql_error($link); 

     	}


      for ($i=0; $i <$_SESSION['N'] ; $i++) 
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
  		if ($bann0==true && $bann1==true) 
      {
          mysql_close($link); 
          $_SESSION['ban']=false;
          $_SESSION['CA']='0';
          $_SESSION['CN']='0';
          $_SESSION['id_loc']='0';
          $_SESSION['cont1']=0;
          $_SESSION['cont2']=0;
          $_SESSION['A']=0;
          $_SESSION['N']=0;

          echo "<script type='text/javascript'>alert('AVISO: Los pasajeros han sido agregados existosamente');</script>";   
          ?><SCRIPT LANGUAGE=javascript>
             window.history.go(-2);
            </SCRIPT> <?php 
      }     
      mysql_close($link);	 
}
?>

</html>