<?php
	function conectar($host, $user, $clav)
	{
		$link = mysql_connect($host, $user, $clav)
	    or die('No se pudo conectar: ' . mysql_error());
		mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
		return $link;
	}
	function cambiarFormatoFecha($fecha)
	{ 
    	list($anio,$mes,$dia)=explode("-",$fecha); 
    	return $dia."-".$mes."-".$anio; 
	}
	function generar_clave($longitud)
	{ 
       $cadena="[^A-Z0-9]"; 
       return substr(eregi_replace($cadena, "", md5(rand())) . 
       eregi_replace($cadena, "", md5(rand())) . 
       eregi_replace($cadena, "", md5(rand())), 
       0, $longitud); 
	} 

?>