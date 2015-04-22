

<?php  session_start();

    require_once('funciones/conectar.php');
    if (!isset($_GET['id_ci'])) 
    {
         ?>
        <script type="text/javascript">
            window.location="Usuario_adm_consultar.php";
        </script> 
        <?php 
    }
    else
    {
      $valor=$_GET['id_ci'];

    }
?>

<?php 
  $link = mysql_connect('localhost', 'root')
  or die('No se pudo conectar: '.mysql_error());
  mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
  //SELECT * FROM tabla1, tabla2 WHERE tabla1.id_tabla2=tabla2.id
  $S = "SELECT * FROM usua Where id_ci='".$valor."';";
  $resulS_S=mysql_query($S,$link);
  $filap=mysql_fetch_array($resulS_S);
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Crear Promoción</title>
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
<script language="javascript" src="js/jquery-1.2.6.min.js"></script>
<script>
        function printValue(sliderID, textbox) {
            var x = document.getElementById(textbox);
            var y = document.getElementById(sliderID);
            x.value = y.value;
        }

        window.onload = function() { printValue('slider1', 'rangeValue1'); }
    </script>
<script>
function restarFechas(fechaInicial, fechaFinal) {
var fech1 = document.getElementById(fechaInicial).value;
var fech2 = document.getElementById(fechaFinal).value;

if((Date.parse(fech1)) > (Date.parse(fech2))){
alert('La fecha inicial no puede ser mayor que la fecha final');
}
}
</script>
</head>
<body >
  <div id="page-wrapper" >
    <!-- inicio-->
    <div class="row">
      <div class="9u ">
        <div id="content" align="center">            
          
          <div class="post 3u" >

<form method="POST" name="registrodeusa" >
             	      <h12>
                     <p>
             	      	 	 <span class="Estilo2">Cedula: </span>
             	      	 	<input name="Cedula" type="number" readonly="readonly" class="laR" value="<?php echo $filap["id_ci"]; ?>" maxlength="9" required title="INGRESANDO LA CEDULA SIN CARACTERES ESPECIALES"  placeholder="Ej:10998998" >
 	      	    		   </p>
                     <p>
                      	<span class="Estilo1 Estilo2">Nombres (*)</span>
             	      	  	<input name="Nombre" type="text" class="laR"   value="<?php echo $filap["nom_usa"];?>" maxlength="25" required title="INGRESANDO EL NOMBRE"  placeholder="Ej:juan carlos">
     	      	    	</p>
                      <p>
                      	 <span class="Estilo1 Estilo2">Apellidos (*)</span>
             	      	  	<input name="Apellido" type="text" value="<?php echo $filap["ape_usa"]; ?>" class="laR"  maxlength="25" required title="INGRESANDO LOS APELLIDOS"  placeholder="Ej:perez perez">
     	      	    	</p>
           	      	<p>
                        <span class="Estilo1 Estilo2">Telefono Local (*)</span>
       	      	  	  	<input name="THabitacion" type="number" value="<?php echo $filap["tel_hab_usa"]; ?>" class="laR"  maxlength="14"  required title="INGRESANDO EL TELEFONO LOCAL CON CODIGO DE AREA"  placeholder="Ej:02763434455">
   	      	    	</p>
                      
                       <p>
                         <span class="Estilo1 Estilo2">Telefono Movil</span>
                         <input name="TCelular" type="number" value="<?php echo $filap["tel_cel_usa"]; ?>" class="laR"  maxlength="14"  title="INGRESANDO EL TELEFONO MOVIL CON "  placeholder="Ej:04247766555">
                        </p>
                       <p>
                       	<span class="Estilo1 Estilo2">Fecha de Nacimiento (*)</span>
             	      	  	<input name="Fnacimiento" value="<?php echo $filap["fecha_nac_usa"]; ?>" type="Date" readonly="readonly" class="laR"  >
     	      	    	</p>
     	      	    	<p>
                      	<span class="Estilo1 Estilo2">Estado (*)</span>
             	      	  	<input name="estado" type="text" class="laR"  maxlength="25" required title="INGRESANDO EL ESTADO"  placeholder="Ej:Tachira">
     	      	    	</p>
     	      	    	<p>
                      	<span class="Estilo1 Estilo2">Ciudad (*)</span>
             	      	  	<input name="ciudad" type="text" class="laR"  maxlength="25" required title="INGRESANDO LA CIUDAD"  placeholder="Ej:Sna Cristobal">
     	      	    	</p>
     	      	    	<p>
                      	<span class="Estilo1 Estilo2">Sector (*)</span>
             	      	  	<input name="sector" type="text" class="laR"  maxlength="25" required title="INGRESANDO EL SECTOR DONDE VIVE"  placeholder="Ej:Paramillo">
     	      	    	</p>
     	      	    	<p>
                       	<span class="Estilo1 Estilo2">E-Mail(*)</span>
             	      	  	<input name="Email" type="email" value="<?php echo $filap['email_usa']; ?>" readonly="readonly" class="laR" required pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="INGRESANDO EL TELEFONO LOCAL CON CODIGO DE AREA"  placeholder="Ej:juan@empresa.com">
     	      	    	</p>
                       <p>
                       	<span class="Estilo1 Estilo2">Contraseña (*)</span>
             	      	  	<input name="Contraseña1" type="password" class="laR"   title="INGRESANDO LA CONTRASEÑA" placeholder="Debe ser mayor de 6 caracteres">
     	      	    	</p>
                       <p>
                       	<span class="Estilo1 Estilo2">Confirmación de Contraseña (*)</span>
             	      	  	<input name="Contraseña2" type="password" class="laR"  title="INGRESANDO LA CONTRASEÑA" placeholder="Debe ser mayor de 6 caracteres">
     	      	    	</p>
                       <p><br>
         	      	      <input  name="Modifi" id="Modifi" value="MODIFICAR" type="submit"  class="input-botonC"  >
             	      	  
     	      	   </p> </h12>
             	  </form>	

                 </div>
          <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>      

        </div>
      </div>
    </div>
    <!-- Fin-->

  </div>
</div>
</body>

<?php 
if (isset($_POST['Modifi']))
{
    $password=$_POST['Contraseña1'];
    if (strlen($password) < 6) 
    {
        $ban=false;
        echo "<script type='text/javascript'>alert('AVISO: La contraseña es demasiado corta. Por favor, introduzca al menos 6 caracteres');</script>";  
    } 
    else
    {
        if ( $password != $_POST["Contraseña2"]) 
        {
           echo "<script type='text/javascript'>alert('AVISO: Las contraseñas no coinciden. Por favor, inténtelo de nuevo');</script>";
           $ban=false;
        }
        else
        {
           $ban=true;
        }
    }
    if ($ban==true) 
    {
        $link = mysql_connect('localhost', 'root')
        or die('No se pudo conectar: ' . mysql_error());
        mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
        //variables String
        $nombre=mysql_real_escape_string($_POST['Nombre']);
        $apellido=mysql_real_escape_string($_POST['Apellido']);
        $estado=mysql_real_escape_string($_POST['estado']);
        $ciudad=mysql_real_escape_string($_POST['ciudad']);
        $sector=mysql_real_escape_string($_POST['sector']);
        $clave=mysql_real_escape_string($_POST['Contraseña1']);
        //variable Number
        $telf_local=mysql_real_escape_string($_POST['THabitacion']);
        $telf_cel=mysql_real_escape_string($_POST['TCelular']);
        //Variables Date
        $direccion=$estado." ".$ciudad." ".$sector;  
        $ci=$_SESSION["cedula"];
        $sqlUpdate=mysql_query("UPDATE usua SET  nom_usa='$nombre',
                                        ape_usa='$apellido',
                                        tel_hab_usa='$telf_local',
                                        tel_cel_usa='$telf_cel',
                                        pass_usa='$clave',
                                        direc_usa='$direccion'
                                WHERE id_ci='$ci' ",$link);
          $my_error = mysql_error($link);
          if ($my_error) 
          {
               echo "<script type='text/javascript'>alert('AVISO: Error en la insercion de datos');</script>";
          } 
          else
          {
            echo "<script type='text/javascript'>alert('AVISO: Se han actualizado  sus datos y su sesion sera cerrada');</script>";
            mysql_close($link);
            ?><script type="text/javascript">
              window.location="Dex.php";
              </script>
            <?php
          }         
      }mysql_close($link);
  }
?>
</html>