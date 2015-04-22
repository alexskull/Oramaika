<!DOCTYPE HTML>
<link rel="stylesheet" href="css/lista.css" />
<head>
  <!-- Add jQuery library -->
    <!-- <script type="text/javascript" src="lib/jquery-1.8.2.min.js"></script> -->

    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="lib/jquery.mousewheel-3.0.6.pack.js"></script>

    <!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.3"></script>
    <link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.2" media="screen" />

    <!-- Add Button helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
    <script type="text/javascript" src="source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

    <!-- Add Thumbnail helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
    <script type="text/javascript" src="source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <!-- Add Media helper (this is optional) -->
    <script type="text/javascript" src="source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>

    <script type="text/javascript">
      $(document).ready(function() {

        $(".fancybox").fancybox({
          type : 'iframe',
          autoSize : false,
          beforeLoad : function() {
            this.width = 650;
            this.height = 450;
          }
        });

      });
    </script>
</head>
  <body>
<?php 
  $link = mysql_connect('localhost', 'root')
  or die('No se pudo conectar: '.mysql_error());
  mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
  //SELECT * FROM tabla1, tabla2 WHERE tabla1.id_tabla2=tabla2.id
  $S = "SELECT D.nom_desti, L.nom_lanc, R.fecha_viaje, R.estatus, R.Nlocalizador, U.ape_usa, U.nom_usa FROM reserva R
    JOIN desti D ON (R.fk_desti_res=D.id_desti)
    JOIN viaje V ON (R.fk_viaje_res=V.id_viaje)
    JOIN lanc L ON (V.fk__lanc_viaje=L.id_lanc)
    JOIN usua U ON (R.fk_usua_res=U.id_ci)";
  $resulS_S=mysql_query($S,$link);$i=1;
?>
<form method="GET" name="consulta" >
    <table>
      <thead>
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Destino</th>
        <th>Lancha</th>
        <th>Fecha viaje</th>
        <th>Estatus</th>
        <th>Eliminar</th>
        <th>Modificar</th>
      </tr>
      </thead>
      <tbody>
      <?php while($filap=mysql_fetch_array($resulS_S))
      {?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $filap['ape_usa']." ".$filap['nom_usa'];?></td>
        <td><?php echo $filap['nom_desti'];?></td>
        <td><?php echo $filap['nom_lanc'];?></td>
        <td><?php echo $filap['fecha_viaje'];?></td>
        <td><?php echo $filap['estatus'];?></td>
        <td><a href="Reserva_adm_eliminar.php?Nlocalizador=<?php echo $filap['Nlocalizador'];?>">Eliminar</a></td>
        <td><a class="fancybox fancybox.iframe" href="IframeEditarReservacion.php?Nlocalizador=<?php echo $filap['Nlocalizador'];?>">Modificar</a></td>
      </tr>
      <?php $i++;} ?>
      </tbody>
    </table>
  </form>
    <?php mysql_close($link); ?>
  </body>

</html>


                
                      
                  