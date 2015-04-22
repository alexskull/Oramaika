<?php
function desreserva()
{
	 $fechaini=date("Y-m-j"); 
	$link = mysql_connect('localhost', 'root')
	or die('No se pudo conectar: ' . mysql_error());
	mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
	$lox=mysql_query("SELECT * FROM reserva WHERE fecha_viaje<'".$fechaini."' AND estatus!='pago'  "); 
	while($rowx=mysql_fetch_assoc($lox))
	{
		 mysql_query("UPDATE reserva SET
                  	estatus='cancelado'
                    WHERE Nlocalizador='".$rowx['Nlocalizador']."'",$link); 
	} 

    $my_error = mysql_error($link);

}
?>