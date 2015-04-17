<?php
    require_once('funciones/conectar.php');
    session_start();
    
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Oramaika</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<noscript>
<link rel="stylesheet" href="css/5grid/core.css" />
<link rel="stylesheet" href="css/5grid/core-desktop.css" />
<link rel="stylesheet" href="css/5grid/core-1200px.css" />
<link rel="stylesheet" href="css/5grid/core-noscript.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/style-desktop.css" />
<link rel="stylesheet" href="css/slider.css" />
<link rel="stylesheet" href="css/slider-2.css" />
</noscript>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none"></script>
<script src="js/jquery-1.7.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/cufon-yui.js"></script>
    <script src="js/vegur_400.font.js"></script>
    <script src="js/Vegur_bold_700.font.js"></script>
    <script src="js/cufon-replace.js"></script>
    <script src="js/tms-0.4.x.js"></script>
    <script src="js/jquery.jqtransform.js"></script>
    <script src="js/FF-cash.js"></script>
    <script>
		$(document).ready(function(){
			$('.form-1').jqTransform();					   	
			$('.slider')._TMS({
				show:0,
				pauseOnHover:true,
				prevBu:'.prev',
				nextBu:'.next',
				playBu:false,
				duration:1000,
				preset:'fade',
				pagination:true,
				pagNums:false,
				slideshow:7000,
				numStatus:false,
				_SESSION['ban']ners:false,
				wait_SESSION['ban']nerAnimation:false,
				progressBar:false
			})		
		});
	</script>
</head><body>
<div id="wrapper">
	<div id="header-wrapper">
		<header id="header">
			<div class="5grid-layout">
				<div class="row">
					<div class="12u" id="logo"> <!-- Logo -->
						<h1>&nbsp;</h1>
						<p>&nbsp;</p>
					
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
				  </div>
				</div>
			</div>
			<div class="5grid-layout">
				<div class="row">
					<div class="12u" id="menu">
						<div id="menu-wrapper">
							<nav class="mobileUI-site-nav">
								<ul>
									<li class="current_page_item"><a href="index.php">Inicio</a></li>
									<li><a href="Nosotros.html">Nosotros</a></li>
									<li><a href="Destinos.html">Destinos</a></li>
									<li><a href="Galeria.html">Galeria</a></li>
									<li><a href="Contactanos.html">Contactanos</a></li>
                                    <li><a href="Registrate.php">Registrate</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
	</div>
    
	<div id="page-wrapper" class="5grid-layout">
		<div class="5grid-layout">
			
				<div class="12u">
					<div id="_SESSION['ban']ner">		
                            <div class="slider">
                                <ul class="items">
                                    <li><img src="images/s01.jpg" alt="" /></li>
                                </ul>
                                <a href="#" class="prev"></a><a href="#" class="next"></a>
                            </div>	
                       
                        </div>
                       
                        <div class="12u">
							<section>
                            	<form name="con" id="con" method="POST">
                           		  <p>
                                   	  <input name="Usuario" type="Email"  placeholder=" E-Mail" required type="text" class="input-field" id="Usuario"  size="20" maxlength="100" >
                                   	  <input name="Contrase" placeholder=" Contraseña" required type="password" class="input-field" id="label2"  size="20" maxlength="20">
                                   	  <input name="Iniciar" value="INICIAR"type="submit" tabindex="4" class="input-boton" >
                                  </p>
                            	</form>	
                            </section>
                       </div>
				</div>
		</div>
		<div class="5grid-layout">
			<div class="row">
				<div class="6u">
					<div id="content">
						<section>
							<div class="post">
								<h2>Promociones Vacacionales</h2>
								<p><a href="#"><img src="images/pics02.jpg" alt="" class="img-alignleft"></a>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, legimus senserit definiebas an eos. Eu sit tincidunt incorrupte definitionem, vis mutat affert percipit cu, eirmod consectetuer signiferumque eu per. In usu latine equidem dolores. Quo no falli viris intellegam, ut fugit veritus placerat per.</p>
                                <p>&nbsp;</p>
                                <p>
Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos debet libris consulatu. No mei ferri graeco dicunt, ad cum veri accommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore. Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas qualisque. Eos vocibus deserunt quaestio ei</p><p>&nbsp;</p>
								<p>Lorem ipsum ad his scripta blandit partiendo, eum fastidii accumsan euripidis in, eum liber hendrerit an. Qui ut wisi vocibus suscipiantur, quo dicit ridens inciderint id. Quo mundi lobortis reformidans eu, legimus senserit definiebas an eos. Eu sit tincidunt incorrupte definitionem, vis mutat affert percipit cu, eirmod consectetuer signiferumque eu per. In usu latine equidem dolores. Quo no falli viris intellegam, ut fugit veritus placerat per.</p>
                                <p>&nbsp;</p>
                                <p>
Ius id vidit volumus mandamus, vide veritus democritum te nec, ei eos debet libris consulatu. No mei ferri graeco dicunt, ad cum veri accommodare. Sed at malis omnesque delicata, usu et iusto zzril meliore. Dicunt maiorum eloquentiam cum cu, sit summo dolor essent te. Ne quodsi nusquam legendos has, ea dicit voluptua eloquentiam pro, ad sit quas qualisque. Eos vocibus deserunt quaestio ei</p>
								
							</div>
						</section>
					</div>
				</div>
				<div class="3u" id="sidebar1">
					<section>
						<h2>Paquetes</h2>
						<ul class="style1">
							<li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
							<li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                            <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                            <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                            <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                            <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                            <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                            <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                            <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                            <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                            <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                            <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                            <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                            <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                            <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                            <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                            <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
						</ul>
					</section>
					
				</div>
				<div class="3u">
					<div id="sidebar2">
						<section>
							<div class="sbox1">
								<h2>Consejos</h2>
									<ul class="style1">
                                        <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                                        <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                                        <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                                        <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                                        <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                                        <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                                        <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                                        <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                                        <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                                        <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                                        <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                                        <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                                        <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                                        <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                                        <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                                        <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                                        <li><a href="#">Lorem ipsum ad his scripta blandit</a></li>
                                    </ul>
                        		</div>	
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div id="copyright" class="5grid-layout">
	<section>
		<p>&copy;2014 Oramaika   | Diseño:  Ing. Software UNET</p>
        <p><a href="https://www.facebook.com/embarcadero.chichirivicheedofalcon">FACEBOOK: Embarcadero Oramaika</a></p>
	</section>
</div>
</body>
<?php
        
        if ( isset ( $_POST [ 'Iniciar' ]))
        {
	        $link = mysql_connect('localhost', 'root')
		    or die('No se pudo conectar: ' . mysql_error());
			mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
	        $login=mysql_real_escape_string($_POST['Usuario']);
             
            $pass =mysql_real_escape_string($_POST['Contrase']);
            $query=mysql_query("SELECT * FROM usua WHERE email_usa LIKE '".$login."' and pass_usa='".$pass."' ");  
            $my_error = mysql_error($link); 
            if ($my_error) 
            {
                echo "<script type='text/javascript'>alert('AVISO: Usuario o Contraseña Invalida');</script>";
            }
            $_SESSION['ban']=false;
			while($row=mysql_fetch_assoc($query)) 
	        {
	        	
	            $_SESSION["cedula"]= $row["id_ci"]; 
	            $_SESSION["Nombre_usa"]= $row["nom_usa"];
	            $_SESSION["apellido_usa"]= $row["ape_usa"];
	            $_SESSION["telefono_h"]= $row["tel_hab_usa"];
	            $_SESSION["telefono_c"]= $row["tel_cel_usa"]; 
	            $_SESSION["fecha_registro"]= $row["fecha_reg_usa"];
	            $_SESSION["fecha_nacimi"]= $row["fecha_nac_usa"];
	            $_SESSION["email"]= $row["email_usa"];
	            $_SESSION["direccion"]= $row["direc_usa"]; 
	            $_SESSION["pass"]= $row["pass_usa"];
	            
	            
	        	
	        	$_SESSION['ban']=true; 
	        	
	        }
	        if($_SESSION['ban']==false)
	        {
	        	echo "<script type='text/javascript'>alert('AVISO: Usuario y Contraseña Invalida');</script>";
	        }   
            mysql_close($link);   
            if ($_SESSION['ban']==true) 
            {
                 ?><script type="text/javascript">
					window.location="index_usa.php";
					</script><?php 
            }     
        }
   
    ?>
</html>