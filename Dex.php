
<?php 
    session_start();
    $_SESSION["cedula"]=''; 
    $_SESSION["Nombre_usa"]='';
    $_SESSION["apellido_usa"]='';
    $_SESSION["telefono_h"]='';
    $_SESSION["telefono_c"]=''; 
    $_SESSION["fecha_registro"]='';
    $_SESSION["fecha_nacimi"]='';
    $_SESSION["email"]='';
    $_SESSION["direccion"]=''; 
    $_SESSION["pass"]='';
    $_SESSION["ban"]=false;
    session_destroy();
    header('Location: index.php');
   
?>
