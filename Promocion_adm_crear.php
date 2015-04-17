<?php  session_start();?>
 <?php
    require_once('funciones/conectar.php');
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
            <form method="POST" name="registrodeusa" enctype="multipart/form-data">
            <br><P><h2> Crear Promoción</h2>
              <span  class="Estilo2">Nombre de promoción (*)</span><br>
              <input  name="Npromo"  type="text"  class="laR" required ><br>

              <span class="Estilo2">Inicio de la promoción (*)</span><br>
              <input  name="fecha1" min=<?php echo $fechaini=date("Y-m-j"); ?>  id="fecha1"  type="Date"  class="laR" required ><br>
              <span class="Estilo2">Fin de la promoción (*)</span><br>
              <input  name="fecha2" type="Date" id="fecha2"   class="laR" required >  <br>
              <span class="Estilo2">Cargar imagen</span><br>
              <span class="laR">
                 
                  <input type="file" class="laR" name="imagen"><br>
              </span><br>
            
              <span  class="Estilo2">Descuento (*) %</span><br>
              <input type="range" id ="slider1"  onchange="printValue('slider1','rangeValue1')" name="rango" min="5" max="90" class="laR" required> <br>
              <input  name="va" id="rangeValue1" type="text" readonly  align="center" class="laR" required ><br>
              <span class="Estilo2">Descripción (*)</span><br>
              <textarea name="texto"class="laM" rows="10" cols="50" required></textarea><br>
              <input  name="res" id="res" value="Crear promoción" type="submit" onclick="restarFechas('fecha1','fecha2')" class="input-botonC"  >
               </h12>
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
if (isset($_POST['res']))
{
      $nomp= mysql_real_escape_string($_POST["Npromo"]); 
      $fini= $_POST["fecha1"];
      $ffin= $_POST["fecha2"];
      $ran= mysql_real_escape_string($_POST["va"]."%"); 
      $desp= mysql_real_escape_string($_POST["texto"]);
      $esta=mysql_real_escape_string("Activo");
      $ruta="phppot_uploads";
      $archivo = $_FILES["imagen"]["tmp_name"]; 
      $nombreArchivo  = $_FILES["imagen"]["name"];
      move_uploaded_file($archivo,$ruta."/".$nombreArchivo);
      $ruta=$ruta."/".$nombreArchivo; 
      if ($fini<$ffin) 
      {
        $link = mysql_connect('localhost', 'root')
        or die('No se pudo conectar: '.mysql_error());
        mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
        mysql_query("INSERT INTO promo
                  (nom_promo,
                   fec_ini_promo,
                   fec_fin_promo,
                   desp_promo,
                   PorcentajeDes,
                   estado_promo,
                   imagen)
                             VALUES 
                             ('".$nomp."',
                              '".$fini."',
                              '".$ffin."',
                              '".$desp."',
                              '".$ran."',
                              '".$esta."',
                              '".$ruta."')",$link);  
        $my_error = mysql_error($link); 
        mysql_close($link);
        if ($my_error) 
        {
            echo "<script type='text/javascript'>alert('AVISO: Existen problemas con la reservacion intente nuevamente');</script>";
        }
      }
   }
?>
</html>