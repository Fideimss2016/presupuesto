<?php
session_start();

$clave=$_SESSION["clave"];
$clave1=$_SESSION["clave"];

//$_SESSION['id_emp']=$_REQUEST['id_emp'];
$id_emp=$_SESSION["id_emp"];

//$_SESSION['id_conse_programa']=$_REQUEST['id_conse_programa'];
//$id_conse_programa=$_SESSION["id_conse_programa"];

require('fpdf/fpdf.php');
require('rotation.php');


include "clases/variablesbd.php";

	//conexion a la base de datos
	$connect=mysql_connect("$host","$user","$passworks");

	//Seleccion de la base
	mysql_select_db("$dbname",$connect);



				$result=mysql_query("select jefe_i, jefe_o, jefe_e, jefe_p from vobo where clave='$clave'", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$jefe_i=$row['jefe_i'];
								$jefe_o=$row['jefe_o'];
								$jefe_e=$row['jefe_e'];
								$jefe_p=$row['jefe_p'];
								}

if($jefe_i==1 && $jefe_o==1 && $jefe_e==1 && $jefe_p==1)
{

	class PDF extends PDF_Rotate
	{
	// Cabecera de página
		function Header()
		{
			// Logo
			//$this->Image('cabeza2.jpg',5,1,40,18);
			// Arial bold 15
			$this->SetFont('Arial','B',20);
			// Movernos a la derecha
			//$this->Cell(30);
			// Título
			$this->SetXY(1,5);
			//$this->MultiCell(354,4,'Fideicomiso para el Desarrollo del Deporte',0,'C');
			$y=15;
			$this->SetXY(1,$y);
			$this->SetFont('Arial','B',10);

			// Salto de línea
			$this->Ln(20);
		
		}
		
		// Pie de página
		function Footer()
		{
			// Posición: a 1,5 cm del final
			$this->SetY(-15);
			// Arial italic 8
			$this->SetFont('Arial','I',8);
			// Número de página
			$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
		}
		
		function RotatedText($x, $y, $txt, $angle)
		{
			//Text rotated around its origin
			$this->Rotate($angle,$x,$y);
			$this->Text($x,$y,$txt);
			$this->Rotate(0);
		}
	
	}
}

else
{
	class PDF extends PDF_Rotate
	{
	// Cabecera de página
		function Header()
		{
			// Logo
			//$this->Image('cabeza2.jpg',5,1,40,18);
			// Arial bold 15
			$this->SetFont('Arial','B',20);
			// Movernos a la derecha
			//$this->Cell(30);
			// Título
			$this->SetXY(1,5);
			//$this->MultiCell(354,4,'Fideicomiso para el Desarrollo del Deporte',0,'C');
			$y=15;
			$this->SetXY(1,$y);
			$this->SetFont('Arial','B',10);

			// Salto de línea
			$this->Ln(20);
		
			$this->SetFont('Arial','B',50);
			$this->SetTextColor(255,192,203);
			$this->RotatedText(120,160,'N o  a u t o r i z a d o',45);
		}
		
		// Pie de página
		function Footer()
		{
			// Posición: a 1,5 cm del final
			$this->SetY(-15);
			// Arial italic 8
			$this->SetFont('Arial','I',8);
			// Número de página
			$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
		}
		
		function RotatedText($x, $y, $txt, $angle)
		{
			//Text rotated around its origin
			$this->Rotate($angle,$x,$y);
			$this->Text($x,$y,$txt);
			$this->Rotate(0);
		}
	
	}
}


					// Creación del objeto de la clase heredada
					$pdf = new PDF('L','mm','Letter');
					$pdf->AliasNbPages();
				
						$result=mysql_query("select desc_uops, desc_del from cat_delegaciones where clave=$clave", $connect);
					
						$totalregistros=mysql_num_rows($result);
							while($row=mysql_fetch_array($result))
							{
							$desc_uops=$row['desc_uops'];
							$desc_del=$row['desc_del'];
							}

			$resultp=mysql_query("select nombre,ape_pat,ape_mat,clave_act,clave_par,conse_categoria,ene,feb,mar,abr,may,jun,jul,ago,sep,oct,nov,dic,presentacion,objetivo_gral,aplicacion
								  from personal 
								  where clave='$clave' and id_emp=$id_emp", $connect);

								$totalregistros=mysql_num_rows($resultp);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($resultp))
								{
								$nombre=$row['nombre'];
								$ape_pat=$row['ape_pat'];
								$ape_mat=$row['ape_mat'];
								$clave_act=$row['clave_act'];
								$clave_par=$row['clave_par'];
								$conse_categoria=$row['conse_categoria'];
								$ene=$row['ene'];
								$feb=$row['feb'];
								$mar=$row['mar'];
								$abr=$row['abr'];
								$may=$row['may'];
								$jun=$row['jun'];
								$jul=$row['jul'];
								$ago=$row['ago'];
								$sep=$row['sep'];
								$oct=$row['oct'];
								$nov=$row['nov'];
								$dic=$row['dic'];
								$presentacion=$row['presentacion'];
								$objetivo_gral=$row['objetivo_gral'];
								$aplicacion=$row['aplicacion'];
								}			
			
			$result=mysql_query("select clave_act, actividad from cat_actividades_i where clave_act=$clave_act", $connect);

								$totalregistros=mysql_num_rows($result);
								while($row=mysql_fetch_array($result))
								{
								$clave_act=$row['clave_act'];
								$actividad=$row['actividad'];
								}


			$result=mysql_query("select desc_categoria, subtotal from cat_categoria where conse_categoria=$conse_categoria", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$desc_categoria=$row['desc_categoria'];
								$subtotal=$row['subtotal'];
								}

			
					$pdf->AddPage('P','Letter');
					$pdf->SetFont('Times','',12);

					$y=20;

					/**cnsulta**/
					
					$pdf->SetFillColor(0,0,0); //color celda
					$pdf->SetTextColor(255,255,255);
					$pdf->SetDrawColor(51,51,51);
					
					$pdf->SetFont('Arial','B',25);

					$pdf->SetXY(17,$y);
					$pdf->MultiCell(180,20,"PLAN Y PROGRAMA DE TRABAJO 2017",1,'C',1);
					
					$pdf->SetFillColor(255,255,255); //color celda
					$pdf->SetTextColor(0,0,0);
					$pdf->SetDrawColor(51,51,51);
				
					$y=$y+35;
					$pdf->SetFont('Arial','B',23);
					$pdf->SetXY(1,$y);
					$pdf->MultiCell(214,4, $nombre ." " . $ape_pat . " " . $ape_mat . " ",0,'C');
					$y=$y+10;
					$pdf->SetFont('Arial','B',18);
					$pdf->SetXY(1,$y);
					$pdf->MultiCell(214,4, $actividad,0,'C');

					$y=$y+15;

					$pdf->SetFont('Arial','B',20);

					$pdf->SetXY(1,$y);
					$pdf->MultiCell(214,4, $desc_del ,0,'C');
					$y=$y+10;
					$pdf->SetXY(1,$y);
					$pdf->MultiCell(214,4, $desc_uops,0,'C');

					//$y=$y+30;
					$y=$y+20;

					$pdf->SetFont('Arial','B',12);
					$pdf->SetFillColor(255,255,255); //color celda
					$pdf->SetTextColor(0,0,0);
					$pdf->SetDrawColor(51,51,51);


					$pdf->SetXY(10,$y);
					$pdf->MultiCell(45,4,"PRESENTACION",0,'L',0);

					$y=$y+5;
					//$pdf->SetFont('Arial','I',10);
					$pdf->SetFont('Arial','I',8);
					$pdf->SetXY(10,$y);
					//$pdf->MultiCell(200,5,$presentacion,0,'J',0);
					$pdf->MultiCell(200,3,$presentacion,0,'J',0);

					$y=$y+30;
					$pdf->SetFont('Arial','B',12);
					$pdf->SetXY(10,$y);
					$pdf->MultiCell(100,4,"OBJETIVO GENERAL",0,'L',0);

					$y=$y+5;
					$pdf->SetFont('Arial','I',10);
					$pdf->SetXY(10,$y);
					$pdf->MultiCell(200,5,$objetivo_gral,0,'J',0);

					$y=$y+30;
					$pdf->SetFont('Arial','B',12);
					$pdf->SetXY(10,$y);
					$pdf->MultiCell(100,4,"AMBITO DE APLICACION",0,'L',0);

					$y=$y+5;
					$pdf->SetFont('Arial','I',10);
					$pdf->SetXY(10,$y);
					$pdf->MultiCell(200,5,$aplicacion,0,'J',0);

					$y=0;
					$pdf->AliasNbPages();
					$pdf->AddPage('P','Letter');
					
					$pdf->SetFillColor(255,255,255); //color celda
					$pdf->SetTextColor(0,0,0);
					$pdf->SetDrawColor(51,51,51);

					$y=$y+30;
					$pdf->SetFont('Arial','B',12);
					$pdf->SetXY(1,$y);
					$pdf->MultiCell(214,4,"METAS DE ATENCION A USUARIOS",0,'C',0);

					$y=$y+15;

					$pdf->SetFillColor(0,0,0); //color celda
					$pdf->SetTextColor(255,255,255);
					$pdf->SetDrawColor(51,51,51);

					$pdf->SetFont('Arial','',8);
				
					$pdf->SetXY(15,$y);
					$pdf->MultiCell(20,8,"MES",1,'C',1);
					
					$pdf->SetXY(35,$y);
					$pdf->MultiCell(50,4,"DERECHOHABIENTES",1,'C',1);
					$pdf->SetXY(85,$y);
					$pdf->MultiCell(50,4,"NO DERECHOHABIENTES",1,'C',1);
					$pdf->SetXY(135,$y);
					$pdf->MultiCell(30,8,"USUARIOS",1,'C',1);
					$pdf->SetXY(165,$y);
					$pdf->MultiCell(30,8,"INGRESOS",1,'C',1);


					$y=$y+4;
					$pdf->SetXY(35,$y);
					$pdf->MultiCell(25,4,"CANTIDAD",1,'C',1);
					$pdf->SetXY(60,$y);
					$pdf->MultiCell(25,4,"IMPORTE",1,'C',1);
					$pdf->SetXY(85,$y);
					$pdf->MultiCell(25,4,"CANTIDAD",1,'C',1);
					$pdf->SetXY(110,$y);
					$pdf->MultiCell(25,4,"IMPORTE",1,'C',1);
					


			$result=mysql_query("SELECT id_conse_metas,id_emp,clave,clave_del,clave_uops,cta_der,cta_noder,
										 enero,dh1,ndh1,horas1,febrero,dh2,ndh2,horas2,marzo,dh3,ndh3,horas3,abril,dh4,ndh4,horas4,mayo,dh5,ndh5,horas5,
								         junio,dh6,ndh6,horas6,julio,dh7,ndh7,horas7,agosto,dh8,ndh8,horas8,septiembre,dh9,ndh9,horas9,octubre,dh10,ndh10,horas10,
								         noviembre,dh11,ndh11,horas11,diciembre,dh12,ndh12,horas12,total_gastop,fecha_cap,id_usuario,vobo,status,estrategia
								   FROM metas 
								   WHERE id_emp=$id_emp and clave='$clave'", $connect);

			$totalregistros=mysql_num_rows($result);
			$valcolor==0;
			while($row=mysql_fetch_array($result))
			{
				$id_conse_metas=$row['id_conse_metas'];
				$id_emp=$row['id_emp'];
				$clave=$row['clave'];
				$clave_del=$row['clave_del'];
				$clave_uops=$row['clave_uops'];
				$cuota_der=$row['cta_der'];
				$cuota_noder=$row['cta_noder'];
				$enero=$row['enero'];
				$dh1=$row['dh1'];
				$ndh1=$row['ndh1'];
				$horas1=$row['horas1'];
				$febrero=$row['febrero'];
				$dh2=$row['dh2'];
				$ndh2=$row['ndh2'];
				$horas2=$row['horas2'];
				$marzo=$row['marzo'];
				$dh3=$row['dh3'];
				$ndh3=$row['ndh3'];
				$horas3=$row['horas3'];
				$abril=$row['abril'];
				$dh4=$row['dh4'];
				$ndh4=$row['ndh4'];
				$horas4=$row['horas4'];
				$mayo=$row['mayo'];
				$dh5=$row['dh5'];
				$ndh5=$row['ndh5'];
				$horas5=$row['horas5'];
				$junio=$row['junio'];
				$dh6=$row['dh6'];
				$ndh6=$row['ndh6'];
				$horas6=$row['horas6'];
				$julio=$row['julio'];
				$dh7=$row['dh7'];
				$ndh7=$row['ndh7'];
				$horas7=$row['horas7'];
				$agosto=$row['agosto'];
				$dh8=$row['dh8'];
				$ndh8=$row['ndh8'];
				$horas8=$row['horas8'];
				$septiembre=$row['septiembre'];
				$dh9=$row['dh9'];
				$ndh9=$row['ndh9'];
				$horas9=$row['horas9'];
				$octubre=$row['octubre'];
				$dh10=$row['dh10'];
				$ndh10=$row['ndh10'];
				$horas10=$row['horas10'];
				$noviembre=$row['noviembre'];
				$dh11=$row['dh11'];
				$ndh11=$row['ndh11'];
				$horas11=$row['horas11'];
				$diciembre=$row['diciembre'];
				$dh12=$row['dh12'];
				$ndh12=$row['ndh12'];
				$horas12=$row['horas12'];
				$total_gastop=$row['total_gastop'];
				$fecha_cap=$row['fecha_cap'];
				$id_usuario=$row['id_usuario'];
				$vobo=$row['vobo'];
				$status=$row['status'];
				$estrategia=$row['estrategia'];
			}


$tdh1=$cuota_der*$horas1*$dh1;$tndh1=$cuota_noder*$horas1*$ndh1;$usu1=$dh1+$ndh1;$ting1=$tdh1+$tndh1;
$tdh2=$cuota_der*$horas2*$dh2;$tndh2=$cuota_noder*$horas2*$ndh2;$usu2=$dh2+$ndh2;$ting2=$tdh2+$tndh2;
$tdh3=$cuota_der*$horas3*$dh3;$tndh3=$cuota_noder*$horas3*$ndh3;$usu3=$dh3+$ndh3;$ting3=$tdh3+$tndh3;
$tdh4=$cuota_der*$horas4*$dh4;$tndh4=$cuota_noder*$horas4*$ndh4;$usu4=$dh4+$ndh4;$ting4=$tdh4+$tndh4;
$tdh5=$cuota_der*$horas5*$dh5;$tndh5=$cuota_noder*$horas5*$ndh5;$usu5=$dh5+$ndh5;$ting5=$tdh5+$tndh5;
$tdh6=$cuota_der*$horas6*$dh6;$tndh6=$cuota_noder*$horas6*$ndh6;$usu6=$dh6+$ndh6;$ting6=$tdh6+$tndh6;
$tdh7=$cuota_der*$horas7*$dh7;$tndh7=$cuota_noder*$horas7*$ndh7;$usu7=$dh7+$ndh7;$ting7=$tdh7+$tndh7;
$tdh8=$cuota_der*$horas8*$dh8;$tndh8=$cuota_noder*$horas8*$ndh8;$usu8=$dh8+$ndh8;$ting8=$tdh8+$tndh8;
$tdh9=$cuota_der*$horas9*$dh9;$tndh9=$cuota_noder*$horas9*$ndh9;$usu9=$dh9+$ndh9;$ting9=$tdh9+$tndh9;
$tdh10=$cuota_der*$horas10*$dh10;$tndh10=$cuota_noder*$horas10*$ndh10;$usu10=$dh10+$ndh10;$ting10=$tdh10+$tndh10;
$tdh11=$cuota_der*$horas11*$dh11;$tndh11=$cuota_noder*$horas11*$ndh11;$usu11=$dh11+$ndh11;$ting11=$tdh11+$tndh11;
$tdh12=$cuota_der*$horas12*$dh12;$tndh12=$cuota_noder*$horas12*$ndh12;$usu12=$dh12+$ndh12;$ting12=$tdh12+$tndh12;

					$pdf->SetFillColor(255,255,255); //color celda
					$pdf->SetTextColor(0,0,0);
					$pdf->SetDrawColor(51,51,51);

					$y=$y+4;
					$pdf->SetFont('Arial','',7);

					$pdf->SetXY(15,$y);
					$pdf->MultiCell(20,4,"ENERO",1,'C',1);
					$pdf->SetXY(35,$y);
					$pdf->MultiCell(25,4,$dh1,1,'C',1);
					$pdf->SetXY(60,$y);
					$pdf->MultiCell(25,4,number_format($tdh1,2),1,'C',1);
					$pdf->SetXY(85,$y);
					$pdf->MultiCell(25,4,$ndh1,1,'C',1);
					$pdf->SetXY(110,$y);
					$pdf->MultiCell(25,4,number_format($tndh1,2),1,'C',1);
					$pdf->SetXY(135,$y);
					$pdf->MultiCell(30,4,$usu1,1,'C',1);
					$pdf->SetXY(165,$y);
					$pdf->MultiCell(30,4,number_format($ting1,2),1,'C',1);

					$y=$y+4;
					$pdf->SetXY(15,$y);
					$pdf->MultiCell(20,4,"FEBERRO",1,'C',1);
					$pdf->SetXY(35,$y);
					$pdf->MultiCell(25,4,$dh2,1,'C',1);
					$pdf->SetXY(60,$y);
					$pdf->MultiCell(25,4,number_format($tdh2,2),1,'C',1);
					$pdf->SetXY(85,$y);
					$pdf->MultiCell(25,4,$ndh2,1,'C',1);
					$pdf->SetXY(110,$y);
					$pdf->MultiCell(25,4,number_format($tndh2,2),1,'C',1);
					$pdf->SetXY(135,$y);
					$pdf->MultiCell(30,4,$usu2,1,'C',1);
					$pdf->SetXY(165,$y);
					$pdf->MultiCell(30,4,number_format($ting2,2),1,'C',1);

					$y=$y+4;
					$pdf->SetXY(15,$y);
					$pdf->MultiCell(20,4,"MARZO",1,'C',1);
					$pdf->SetXY(35,$y);
					$pdf->MultiCell(25,4,$dh3,1,'C',1);
					$pdf->SetXY(60,$y);
					$pdf->MultiCell(25,4,number_format($tdh3,2),1,'C',1);
					$pdf->SetXY(85,$y);
					$pdf->MultiCell(25,4,$ndh3,1,'C',1);
					$pdf->SetXY(110,$y);
					$pdf->MultiCell(25,4,number_format($tndh3,2),1,'C',1);
					$pdf->SetXY(135,$y);
					$pdf->MultiCell(30,4,$usu3,1,'C',1);
					$pdf->SetXY(165,$y);
					$pdf->MultiCell(30,4,number_format($ting3,2),1,'C',1);

					$y=$y+4;
					$pdf->SetXY(15,$y);
					$pdf->MultiCell(20,4,"ABRIL",1,'C',1);
					$pdf->SetXY(35,$y);
					$pdf->MultiCell(25,4,$dh4,1,'C',1);
					$pdf->SetXY(60,$y);
					$pdf->MultiCell(25,4,number_format($tdh4,2),1,'C',1);
					$pdf->SetXY(85,$y);
					$pdf->MultiCell(25,4,$ndh4,1,'C',1);
					$pdf->SetXY(110,$y);
					$pdf->MultiCell(25,4,number_format($tndh4,2),1,'C',1);
					$pdf->SetXY(135,$y);
					$pdf->MultiCell(30,4,$usu4,1,'C',1);
					$pdf->SetXY(165,$y);
					$pdf->MultiCell(30,4,number_format($ting4,2),1,'C',1);

					$y=$y+4;
					$pdf->SetXY(15,$y);
					$pdf->MultiCell(20,4,"MAYO",1,'C',1);
					$pdf->SetXY(35,$y);
					$pdf->MultiCell(25,4,$dh5,1,'C',1);
					$pdf->SetXY(60,$y);
					$pdf->MultiCell(25,4,number_format($tdh5,2),1,'C',1);
					$pdf->SetXY(85,$y);
					$pdf->MultiCell(25,4,$ndh5,1,'C',1);
					$pdf->SetXY(110,$y);
					$pdf->MultiCell(25,4,number_format($tndh5,2),1,'C',1);
					$pdf->SetXY(135,$y);
					$pdf->MultiCell(30,4,$usu5,1,'C',1);
					$pdf->SetXY(165,$y);
					$pdf->MultiCell(30,4,number_format($ting5,2),1,'C',1);

					$y=$y+4;
					$pdf->SetXY(15,$y);
					$pdf->MultiCell(20,4,"JUNIO",1,'C',1);
					$pdf->SetXY(35,$y);
					$pdf->MultiCell(25,4,$dh6,1,'C',1);
					$pdf->SetXY(60,$y);
					$pdf->MultiCell(25,4,number_format($tdh6,2),1,'C',1);
					$pdf->SetXY(85,$y);
					$pdf->MultiCell(25,4,$ndh6,1,'C',1);
					$pdf->SetXY(110,$y);
					$pdf->MultiCell(25,4,number_format($tndh6,2),1,'C',1);
					$pdf->SetXY(135,$y);
					$pdf->MultiCell(30,4,$usu6,1,'C',1);
					$pdf->SetXY(165,$y);
					$pdf->MultiCell(30,4,number_format($ting6,2),1,'C',1);

					$y=$y+4;
					$pdf->SetXY(15,$y);
					$pdf->MultiCell(20,4,"JULIO",1,'C',1);
					$pdf->SetXY(35,$y);
					$pdf->MultiCell(25,4,$dh7,1,'C',1);
					$pdf->SetXY(60,$y);
					$pdf->MultiCell(25,4,number_format($tdh7,2),1,'C',1);
					$pdf->SetXY(85,$y);
					$pdf->MultiCell(25,4,$ndh7,1,'C',1);
					$pdf->SetXY(110,$y);
					$pdf->MultiCell(25,4,number_format($tndh7,2),1,'C',1);
					$pdf->SetXY(135,$y);
					$pdf->MultiCell(30,4,$usu7,1,'C',1);
					$pdf->SetXY(165,$y);
					$pdf->MultiCell(30,4,number_format($ting7,2),1,'C',1);

					$y=$y+4;
					$pdf->SetXY(15,$y);
					$pdf->MultiCell(20,4,"AGOSTO",1,'C',1);
					$pdf->SetXY(35,$y);
					$pdf->MultiCell(25,4,$dh8,1,'C',1);
					$pdf->SetXY(60,$y);
					$pdf->MultiCell(25,4,number_format($tdh8,2),1,'C',1);
					$pdf->SetXY(85,$y);
					$pdf->MultiCell(25,4,$ndh8,1,'C',1);
					$pdf->SetXY(110,$y);
					$pdf->MultiCell(25,4,number_format($tndh8,2),1,'C',1);
					$pdf->SetXY(135,$y);
					$pdf->MultiCell(30,4,$usu8,1,'C',1);
					$pdf->SetXY(165,$y);
					$pdf->MultiCell(30,4,number_format($ting8,2),1,'C',1);

					$y=$y+4;
					$pdf->SetXY(15,$y);
					$pdf->MultiCell(20,4,"SEPTIEMBRE",1,'C',1);
					$pdf->SetXY(35,$y);
					$pdf->MultiCell(25,4,$dh9,1,'C',1);
					$pdf->SetXY(60,$y);
					$pdf->MultiCell(25,4,number_format($tdh9,2),1,'C',1);
					$pdf->SetXY(85,$y);
					$pdf->MultiCell(25,4,$ndh9,1,'C',1);
					$pdf->SetXY(110,$y);
					$pdf->MultiCell(25,4,number_format($tndh9,2),1,'C',1);
					$pdf->SetXY(135,$y);
					$pdf->MultiCell(30,4,$usu9,1,'C',1);
					$pdf->SetXY(165,$y);
					$pdf->MultiCell(30,4,number_format($ting9,2),1,'C',1);

					$y=$y+4;
					$pdf->SetXY(15,$y);
					$pdf->MultiCell(20,4,"OCTUBRE",1,'C',1);
					$pdf->SetXY(35,$y);
					$pdf->MultiCell(25,4,$dh10,1,'C',1);
					$pdf->SetXY(60,$y);
					$pdf->MultiCell(25,4,number_format($tdh10,2),1,'C',1);
					$pdf->SetXY(85,$y);
					$pdf->MultiCell(25,4,$ndh10,1,'C',1);
					$pdf->SetXY(110,$y);
					$pdf->MultiCell(25,4,number_format($tndh10,2),1,'C',1);
					$pdf->SetXY(135,$y);
					$pdf->MultiCell(30,4,$usu10,1,'C',1);
					$pdf->SetXY(165,$y);
					$pdf->MultiCell(30,4,number_format($ting10,2),1,'C',1);

					$y=$y+4;
					$pdf->SetXY(15,$y);
					$pdf->MultiCell(20,4,"NOVIEMBRE",1,'C',1);
					$pdf->SetXY(35,$y);
					$pdf->MultiCell(25,4,$dh11,1,'C',1);
					$pdf->SetXY(60,$y);
					$pdf->MultiCell(25,4,number_format($tdh11,2),1,'C',1);
					$pdf->SetXY(85,$y);
					$pdf->MultiCell(25,4,$ndh11,1,'C',1);
					$pdf->SetXY(110,$y);
					$pdf->MultiCell(25,4,number_format($tndh11,2),1,'C',1);
					$pdf->SetXY(135,$y);
					$pdf->MultiCell(30,4,$usu11,1,'C',1);
					$pdf->SetXY(165,$y);
					$pdf->MultiCell(30,4,number_format($ting11,2),1,'C',1);

					$y=$y+4;
					$pdf->SetXY(15,$y);
					$pdf->MultiCell(20,4,"DICIEMBRE",1,'C',1);
					$pdf->SetXY(35,$y);
					$pdf->MultiCell(25,4,$dh12,1,'C',1);
					$pdf->SetXY(60,$y);
					$pdf->MultiCell(25,4,number_format($tdh12,2),1,'C',1);
					$pdf->SetXY(85,$y);
					$pdf->MultiCell(25,4,$ndh12,1,'C',1);
					$pdf->SetXY(110,$y);
					$pdf->MultiCell(25,4,number_format($tndh12,2),1,'C',1);
					$pdf->SetXY(135,$y);
					$pdf->MultiCell(30,4,$usu12,1,'C',1);
					$pdf->SetXY(165,$y);
					$pdf->MultiCell(30,4,number_format($ting12,2),1,'C',1);

					$y=$y+15;
					$pdf->SetFont('Arial','B',12);
					$pdf->SetXY(10,$y);
					$pdf->MultiCell(100,4,"ESTRATEGIAS",0,'L',0);

					$y=$y+5;
					$pdf->SetFont('Arial','I',10);
					$pdf->SetXY(10,$y);
					$pdf->MultiCell(200,5,$estrategia,0,'J',0);
					
					$y=0;
					$pdf->AliasNbPages();
					$pdf->AddPage('L','Letter');

					$y=$y+15;
					$pdf->SetFont('Arial','B',12);
					$pdf->SetXY(1,$y);
					$pdf->MultiCell(275,4,"PLAN DE TRABAJO 2017",0,'C',0);

					$y=$y+15;

					$pdf->SetFillColor(0,0,0); //color celda
					$pdf->SetTextColor(255,255,255);
					$pdf->SetDrawColor(51,51,51);

					$pdf->SetFont('Arial','',8);
				
					$pdf->SetXY(5,$y);
					$pdf->MultiCell(35,8,"TEMA",1,'C',1);
					$pdf->SetXY(40,$y);
					$pdf->MultiCell(50,8,"OBJETIVO PARTICULAR",1,'C',1);
					$pdf->SetXY(90,$y);
					$pdf->MultiCell(50,8,"TECNICA DIDACTICA",1,'C',1);
					$pdf->SetXY(140,$y);
					$pdf->MultiCell(50,8,"INSTALACIONES/MAT. DIDACTICO",1,'C',1);
					$pdf->SetXY(190,$y);
					$pdf->MultiCell(50,4,"ACTIVIDADES",1,'C',1);
					$pdf->SetXY(240,$y);
					$pdf->MultiCell(15,4,"SESION #",1,'C',1);
					$pdf->SetXY(255,$y);
					$pdf->MultiCell(15,4,"HRS. X SESION",1,'C',1);

					$y=$y+4;
					$pdf->SetXY(190,$y);
					$pdf->MultiCell(25,4,"DOCENTE",1,'C',1);
					$pdf->SetXY(215,$y);
					$pdf->MultiCell(25,4,"USUARIO",1,'C',1);


					$pdf->SetFont('Arial','',5);
					$y=$y+4;
					$pdf->SetFillColor(255,255,255); //color celda
					$pdf->SetTextColor(0,0,0);
					$pdf->SetDrawColor(51,51,51);

			$resultc=mysql_query("select conse_plan,tema,objpar,tecnica,material,docente,usuario,sesiones,horasxsesion from plan where clave='$clave' and id_emp=$id_emp order by conse_plan", $connect);
								$totalregistros=mysql_num_rows($resultc);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($resultc))
								{
								$conse_plan=$row['conse_plan'];	
								$tema=$row['tema'];
								$objpar=$row['objpar'];
								$tecnica=$row['tecnica'];
								$material=$row['material'];
								$docente=$row['docente'];
								$usuario=$row['usuario'];
								$sesiones=$row['sesiones'];
								$horasxsesion=$row['horasxsesion'];

									if($y>=178)
									{
											$y=0;
											$pdf->AliasNbPages();
											$pdf->AddPage('L','Letter');
						
											$y=$y+15;
											$pdf->SetFont('Arial','B',12);
											$pdf->SetXY(1,$y);
											$pdf->MultiCell(275,4,"PLAN DE TRABAJO 2017",0,'C',0);
						
											$y=$y+15;
						
											$pdf->SetFillColor(0,0,0); //color celda
											$pdf->SetTextColor(255,255,255);
											$pdf->SetDrawColor(51,51,51);
						
											$pdf->SetFont('Arial','',8);
										
											$pdf->SetXY(5,$y);
											$pdf->MultiCell(35,8,"TEMA",1,'C',1);
											$pdf->SetXY(40,$y);
											$pdf->MultiCell(50,8,"OBJETIVO PARTICULAR",1,'C',1);
											$pdf->SetXY(90,$y);
											$pdf->MultiCell(50,8,"TECNICA DIDACTICA",1,'C',1);
											$pdf->SetXY(140,$y);
											$pdf->MultiCell(50,8,"INSTALACIONES/MAT. DIDACTICO",1,'C',1);
											$pdf->SetXY(190,$y);
											$pdf->MultiCell(50,4,"ACTIVIDADES",1,'C',1);
											$pdf->SetXY(240,$y);
											$pdf->MultiCell(15,4,"SESION #",1,'C',1);
											$pdf->SetXY(255,$y);
											$pdf->MultiCell(15,4,"HRS. X SESION",1,'C',1);
						
											$y=$y+4;
											$pdf->SetXY(190,$y);
											$pdf->MultiCell(25,4,"DOCENTE",1,'C',1);
											$pdf->SetXY(215,$y);
											$pdf->MultiCell(25,4,"USUARIO",1,'C',1);
						
						
											$pdf->SetFont('Arial','',5);
											$y=$y+4;
											$pdf->SetFillColor(255,255,255); //color celda
											$pdf->SetTextColor(0,0,0);
											$pdf->SetDrawColor(51,51,51);
									}


								$pdf->SetXY(5,$y);
								$pdf->Cell(35,15,"",1,'L',1);
								$pdf->SetXY(5,$y);
								$pdf->MultiCell(35,3,$tema,0,'L',0);
								$pdf->SetXY(40,$y);
								$pdf->Cell(50,15,"",1,'L',1);
								$pdf->SetXY(40,$y);
								$pdf->MultiCell(50,3,$objpar,0,'L',0);
								$pdf->SetXY(90,$y);
								$pdf->Cell(50,15,"",1,'L',1);
								$pdf->SetXY(90,$y);
								$pdf->MultiCell(50,3,$tecnica,0,'L',0);
								$pdf->SetXY(140,$y);
								$pdf->Cell(50,15,"",1,'L',1);
								$pdf->SetXY(140,$y);
								$pdf->MultiCell(50,3,$material,0,'L',0);
								$pdf->SetXY(190,$y);
								$pdf->Cell(25,15,"",1,'L',1);
								$pdf->SetXY(190,$y);
								$pdf->MultiCell(25,3,$docente,0,'L',0);
								$pdf->SetXY(215,$y);
								$pdf->Cell(25,15,"",1,'L',1);
								$pdf->SetXY(215,$y);
								$pdf->MultiCell(25,3,$usuario,0,'L',0);
								$pdf->SetXY(240,$y);
								$pdf->Cell(15,15,"",1,'L',1);
								$pdf->SetXY(240,$y);
								$pdf->MultiCell(15,3,$sesiones,0,'C',0);
								$pdf->SetXY(255,$y);
								$pdf->Cell(15,15,"",1,'L',1);
								$pdf->SetXY(255,$y);
								$pdf->MultiCell(15,3,$horasxsesion,0,'C',0);
								$y=$y+15;
								}

					$y=0;
					$pdf->AliasNbPages();
					$pdf->AddPage('L','Letter');

					$y=$y+15;
					$pdf->SetFont('Arial','B',12);
					$pdf->SetXY(1,$y);
					$pdf->MultiCell(275,4,"PROGRAMA DE TRABAJO 2017",0,'C',0);

					$y=$y+15;

					$pdf->SetFillColor(0,0,0); //color celda
					$pdf->SetTextColor(255,255,255);
					$pdf->SetDrawColor(51,51,51);

					$pdf->SetFont('Arial','',8);
				
					$pdf->SetXY(5,$y);
					$pdf->MultiCell(15,8,"MES",1,'C',1);
					$pdf->SetXY(20,$y);
					$pdf->MultiCell(15,8,"SEMANA",1,'C',1);
					$pdf->SetXY(35,$y);
					$pdf->MultiCell(200,4,"ACTIVIDAD POR NIVEL",1,'C',1);
					$pdf->SetXY(235,$y);
					$pdf->MultiCell(40,8,"OBSERVACIONES",1,'C',1);

										$y=$y+4;
										$pdf->SetXY(35,$y);
										$pdf->MultiCell(70,4,"FASE COGNITIVA",1,'C',1);
										$pdf->SetXY(105,$y);
										$pdf->MultiCell(70,4,"FASE ASOCIATIVA",1,'C',1);
										$pdf->SetXY(175,$y);
										$pdf->MultiCell(60,4,"FASE AUTONOMICA",1,'C',1);

					$pdf->SetFont('Arial','',5);
					$y=$y+4;
					$pdf->SetFillColor(255,255,255); //color celda
					$pdf->SetTextColor(0,0,0);
					$pdf->SetDrawColor(51,51,51);
			$resultc=mysql_query("select id_conse_programa,mes,semanas,principiantes,intermedios,avanzados,observaciones from programa where clave='$clave' and id_emp=$id_emp order by mes, id_conse_programa", $connect);
								$totalregistros=mysql_num_rows($resultc);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($resultc))
								{
								$mes=$row['mes'];
								$semanas=$row['semanas'];
								$principiantes=$row['principiantes'];
								$intermedios=$row['intermedios'];
								$avanzados=$row['avanzados'];
								$observaciones=$row['observaciones'];
								$id_conse_programa=$row['id_conse_programa'];

								if($valcolor==0)
								{$color="spgreen"; $valcolor=1;}
								else
								{$color="spblue"; $valcolor=0;}

								if($mes==1){$desc_mes="Enero";}
								if($mes==2){$desc_mes="Febrero";}
								if($mes==3){$desc_mes="Marzo";}
								if($mes==4){$desc_mes="Abril";}
								if($mes==5){$desc_mes="Mayo";}
								if($mes==6){$desc_mes="Junio";}
								if($mes==7){$desc_mes="Julio";}
								if($mes==8){$desc_mes="Agosto";}
								if($mes==9){$desc_mes="Septiembre";}
								if($mes==10){$desc_mes="Octubre";}
								if($mes==11){$desc_mes="Noviembre";}
								if($mes==12){$desc_mes="Diciembre";}
								
								
									if($y>=178)
									{
										$y=0;
										$pdf->AliasNbPages();
										$pdf->AddPage('L','Letter');
										$y=$y+15;
										$pdf->SetFont('Arial','B',12);
										$pdf->SetXY(1,$y);
										$pdf->MultiCell(275,4,"PROGRAMA DE TRABAJO 2017",0,'C',0);
					
										$y=$y+15;
					
										$pdf->SetFillColor(0,0,0); //color celda
										$pdf->SetTextColor(255,255,255);
										$pdf->SetDrawColor(51,51,51);
					
										$pdf->SetFont('Arial','',8);
									
										$pdf->SetXY(5,$y);
										$pdf->MultiCell(15,8,"MES",1,'C',1);
										$pdf->SetXY(20,$y);
										$pdf->MultiCell(15,8,"SEMANA",1,'C',1);
										$pdf->SetXY(35,$y);
										$pdf->MultiCell(200,4,"ACTIVIDAD POR NIVEL",1,'C',1);
										$pdf->SetXY(235,$y);
										$pdf->MultiCell(40,8,"OBSERVACIONES",1,'C',1);
					
										$y=$y+4;
										$pdf->SetXY(35,$y);
										$pdf->MultiCell(70,4,"FASE COGNITIVA",1,'C',1);
										$pdf->SetXY(105,$y);
										$pdf->MultiCell(70,4,"FASE ASOCIATIVA",1,'C',1);
										$pdf->SetXY(175,$y);
										$pdf->MultiCell(60,4,"FASE AUTONOMICA",1,'C',1);
					
										$pdf->SetFont('Arial','',5);
										$y=$y+4;
										$pdf->SetFillColor(255,255,255); //color celda
										$pdf->SetTextColor(0,0,0);
										$pdf->SetDrawColor(51,51,51);
									
									}
								
								
								
									$pdf->SetXY(5,$y);
									$pdf->Cell(15,25,"",1,'L',1);
									$pdf->SetXY(5,$y);
									$pdf->MultiCell(15,3,$desc_mes,0,'C',0);
									$pdf->SetXY(20,$y);
									$pdf->Cell(15,25,"",1,'L',1);
									$pdf->SetXY(20,$y);
									$pdf->MultiCell(15,3,$semanas,0,'L',0);
									$pdf->SetXY(35,$y);
									$pdf->Cell(70,25,"",1,'L',1);
									$pdf->SetXY(35,$y);
									$pdf->MultiCell(70,3,$principiantes,0,'L',0);
									$pdf->SetXY(105,$y);
									$pdf->Cell(70,25,"",1,'L',1);
									$pdf->SetXY(105,$y);
									$pdf->MultiCell(70,3,$intermedios,0,'L',0);
									$pdf->SetXY(175,$y);
									$pdf->Cell(60,25,"",1,'L',1);
									$pdf->SetXY(175,$y);
									$pdf->MultiCell(60,3,$avanzados,0,'L',0);
									$pdf->SetXY(235,$y);
									$pdf->Cell(40,25,"",1,'L',1);
									$pdf->SetXY(235,$y);
									$pdf->MultiCell(40,3,$observaciones,0,'L',0);
				
									$y=$y+25;
								
								}



					$pdf->SetFillColor(0,0,0); //color celda
					$pdf->SetTextColor(255,255,255);
					$pdf->SetDrawColor(51,51,51);

					
			
mysql_free_result($result);

$pdf->Output();
?>