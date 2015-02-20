<!DOCTYPE HTML>
<html>
<head>
<title>confirmaciion</title>
</head>
<body>
</body>
<?php 
session_start();

ob_end_clean();
require('fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->Image('css/images/logo.png', 10, 10, 60, 30);
$pdf->SetFont('Arial','B',15);
$pdf->SetXY(90,20);
$pdf->Cell(90,10,utf8_decode('Confirmación de Reservación'),0,0,'C');
$pdf->Ln(25);

$fkres=$_SESSION['id_loc'];

$link = mysql_connect('localhost', 'root')
		  	    or die('No se pudo conectar: ' . mysql_error());
		  		mysql_select_db('oramaika') or die('No se pudo seleccionar la base de datos');
		  		$query=mysql_query("SELECT u.nom_usa , u.ape_usa, d.id_desti,d.nom_desti,d.precio_desti , d.precio_desti , v.fk__lanc_viaje,d.Fk_desti_promo , v.id_viaje, l.id_lanc, l.nom_lanc, v.hora_salida, v.hora_retorno, r.fecha_viaje, r.cant_adultos, r.fk_usua_res, r.cant_ninos, r.Nlocalizador FROM reserva r
					JOIN viaje v on (r.fk_viaje_res=v.id_viaje)
					JOIN lanc l on (v.fk__lanc_viaje=l.id_lanc)
					JOIN usua u on (r.fk_usua_res=u.id_ci)
					JOIN desti d on (r.fk_desti_res=d.id_desti)
					Where r.Nlocalizador = '4fdabf3e20';"); 

		
		$row=mysql_fetch_assoc($query);
		$pdf->SetXY(90,20);
		$pdf->Cell(90,50,utf8_decode($row['nom_usa'].' '.$row['ape_usa']),0,0,'C');
		$pdf->SetXY(90,20);
		$pdf->Cell(90,70,utf8_decode($row['nom_desti']),0,0,'C');
		$pdf->SetXY(90,20);
		$pdf->Cell(90,90,utf8_decode($row['fecha_viaje']),0,0,'C');
		$pdf->SetXY(90,20);
		$pdf->Cell(90,110,utf8_decode($row['Nlocalizador']),0,0,'C');



		
	

$pdf->Output();
?>
</html>