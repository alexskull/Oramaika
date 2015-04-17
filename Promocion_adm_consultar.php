<!DOCTYPE HTML>
<link rel="stylesheet" href="css/lista.css" />
</head>
  <body>
<?php 
  $link = mysql_connect('localhost', 'root')
  or die('No se pudo conectar: '.mysql_error());
  mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
  //SELECT * FROM tabla1, tabla2 WHERE tabla1.id_tabla2=tabla2.id
  $S="SELECT * FROM  promo ORDER by fec_fin_promo ASC";
  $resulS_S=mysql_query($S,$link);$i=1;
?>
<form method="GET" name="consulta" >
    <table>
      <thead>
      <tr>
        <th>#</th>
        <th>Promoción</th>
        <th>Descripción</th>
        <th>Descuento</th>
        <th>Estado</th>
        <th>Inicialización</th>
        <th>Finalización</th>
        <th>Eliminar</th>
        <th>Modificar</th>
      </tr>
      </thead>
      <tbody>
      <?php while($filap=mysql_fetch_array($resulS_S))
      {?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $filap['nom_promo'];?></td>
        <td><?php echo $filap['desp_promo'];?></td>
        <td><?php echo $filap['PorcentajeDes'];?></td>
        <td><?php echo $filap['estado_promo'];?></td>
        <td><?php echo $filap['fec_ini_promo'];?></td>
        <td><?php echo $filap['fec_fin_promo'];?></td>
        <td><a href="Promocion_adm_eliminar.php?abc=<?php echo $filap['id_promo'];?>">Eliminar</a></td>
        <td><a href="Promocion_adm_modificar.php?abc=<?php echo $filap['id_promo'];?>">Modificar</a></td>
      </tr>
      <?php $i++;} ?>
      </tbody>
    </table>
  </form>
    <?php mysql_close($link); ?>
  </body>
</html>


                
                      
                  
 
           