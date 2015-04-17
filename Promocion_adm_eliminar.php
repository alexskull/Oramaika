<?php 
    if (!isset($_GET['abc'])) 
    {
         ?>
        <script type="text/javascript">
            window.location="Promocion_adm_consultar.php";
        </script> 
        <?php 
    }
    else
    {
      $valor=$_GET['abc'];
      $link = mysql_connect('localhost', 'root')
      or die('No se pudo conectar: '.mysql_error());
      mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
        mysql_query("DELETE from promo WHERE id_promo='".$valor."'");
        mysql_close($link); ?>
        <script type="text/javascript">
            window.location="Promocion_adm_consultar.php";
        </script> 
        <?php

    }
?>