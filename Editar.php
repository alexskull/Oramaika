<?php 


 $link = mysql_connect('localhost', 'root')
                    or die('No se pudo conectar: ' . mysql_error());
                    mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');



if (isset($_GET['Nlocalizador']) ) { 
	$Nlocalizador =  $_GET['Nlocalizador']; 
	if (isset($_POST['submitted'])) { 
		foreach($_POST AS $key => $value) { 
			$_POST[$key] = mysql_real_escape_string($value); 
		} 
		$sql = "UPDATE `reserva` SET  `fk_viaje_res` =  '{$_POST['fk_viaje_res']}' ,  `fk_usua_res` =  '{$_POST['fk_usua_res']}' ,  `fk_desti_res` =  '{$_POST['fk_desti_res']}' ,  `fecha_viaje` =  '{$_POST['fecha_viaje']}' ,  `fecha_operacion` =  '{$_POST['fecha_operacion']}' ,  `cant_ninos` =  '{$_POST['cant_ninos']}' ,  `cant_adultos` =  '{$_POST['cant_adultos']}' ,  `estatus` =  '{$_POST['estatus']}' ,  `desp_res` =  '{$_POST['desp_res']}'   WHERE `Nlocalizador` = '$Nlocalizador' "; 
		mysql_query($sql) or die(mysql_error()); 
		echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 
		echo "<a href='list.php'>Back To Listing</a>"; 
	} 
	$row = mysql_fetch_array ( mysql_query("SELECT * FROM reserva WHERE Nlocalizador = '$Nlocalizador' ")); 
?>

<form action='' method='POST'> 
<p><b>Fk Viaje Res:</b><br /><input type='text' name='fk_viaje_res' value='<?= stripslashes($row['fk_viaje_res']) ?>' /> 
<p><b>Fk Usua Res:</b><br /><input type='text' name='fk_usua_res' value='<?= stripslashes($row['fk_usua_res']) ?>' /> 
<p><b>Fk Desti Res:</b><br /><input type='text' name='fk_desti_res' value='<?= stripslashes($row['fk_desti_res']) ?>' /> 
<p><b>Fecha Viaje:</b><br /><input type='text' name='fecha_viaje' value='<?= stripslashes($row['fecha_viaje']) ?>' /> 
<p><b>Fecha Operacion:</b><br /><input type='text' name='fecha_operacion' value='<?= stripslashes($row['fecha_operacion']) ?>' /> 
<p><b>Cant Ninos:</b><br /><input type='text' name='cant_ninos' value='<?= stripslashes($row['cant_ninos']) ?>' /> 
<p><b>Cant Adultos:</b><br /><input type='text' name='cant_adultos' value='<?= stripslashes($row['cant_adultos']) ?>' /> 
<p><b>Estatus:</b><br /><input type='text' name='estatus' value='<?= stripslashes($row['estatus']) ?>' /> 
<p><b>Desp Res:</b><br /><input type='text' name='desp_res' value='<?= stripslashes($row['desp_res']) ?>' /> 
<p><input type='submit' value='Edit Row' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<?php } ?> 
