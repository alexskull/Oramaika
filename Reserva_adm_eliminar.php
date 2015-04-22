<?php 
    if (isset($_GET["Nlocalizador"])) 
    {

      
       $locaN= $_GET["Nlocalizador"];
       $link = mysql_connect('localhost', 'root')
        or die('No se pudo conectar: ' . mysql_error());
        mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
       

       $consul_resses="DELETE FROM reserva WHERE Nlocalizador ='".$locaN."'";
       $resulS_resses=mysql_query($consul_resses,$link);
       $my_error = mysql_error($link); 
       if ($my_error) 
       {

          echo "<script type='text/javascript'>alert('AVISO: No se puede eliminar reservación problemas de conexión');</script>";
       
       }

       $consul_resses="DELETE FROM pasa WHERE fk_reserva ='".$locaN."'";
       $resulS_resses=mysql_query($consul_resses,$link);
       $my_error = mysql_error($link); 
       if ($my_error) 
       {
          echo "<script type='text/javascript'>alert('AVISO: No se puede eliminar pasajeros problemas de conexión');</script>";
       }

       mysql_close($link);
       ?><script type="text/javascript">
              window.location="Reserva_adm_modificar.php";
          </script><?php  
    }
   
    
    
?>