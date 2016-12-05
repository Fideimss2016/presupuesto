<?php
	session_start();

	$clave 	= $_SESSION["clave"];
	$clave1 = $_SESSION["clave"];

	require('fpdf/fpdf.php');
	require('rotation.php');
	include "clases/variablesbd.php";

	$connect = mysql_connect("$host","$user","$passworks");
	mysql_select_db("$dbname",$connect);
	$result = mysql_query("SELECT jefe_i, jefe_o, jefe_e, jefe_p from vobo where clave='$clave'", $connect);
	$totalregistros = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
		$jefe_i = $row['jefe_i'];
		$jefe_o = $row['jefe_o'];
		$jefe_e = $row['jefe_e'];
		$jefe_p = $row['jefe_p'];
	}

	if($jefe_i == 1 && $jefe_o == 1 && $jefe_e == 1 && $jefe_p == 1)
	{
		class PDF extends PDF_Rotate
		{
			function Header()
			{
				$this->Image('cabeza2.jpg',5,1,40,18);
				$this->SetFont('Arial','B',20);
				$this->SetXY(1,5);
				$this->MultiCell(354,4,'Fideicomiso para el Desarrollo del Deporte',0,'C');
				$y=15;
				$this->SetXY(1,$y);
				$this->SetFont('Arial','B',10);
				$this->MultiCell(354,4,'PRESUPUESTO DE INGRESOS - EGRESOS EJERCICIO 2017',0,'C');
				$this->Ln(20);
			}
			
			function Footer()
			{
				$this->SetY(-15);
				$this->SetFont('Arial','I',8);
				$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
			}
			
			function RotatedText($x, $y, $txt, $angle)
			{
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
			function Header()
			{
				$this->Image('cabeza2.jpg',5,1,40,18);
				$this->SetFont('Arial','B',20);
				$this->SetXY(1,5);
				$this->MultiCell(354,4,'Fideicomiso para el Desarrollo del Deporte',0,'C');
				$y=15;
				$this->SetXY(1,$y);
				$this->SetFont('Arial','B',10);
				$this->MultiCell(354,4,'PRESUPUESTO DE INGRESOS - EGRESOS EJERCICIO 2017',0,'C');
				$this->Ln(20);
			
				$this->SetFont('Arial','B',50);
				$this->SetTextColor(255,192,203);
				$this->RotatedText(120,160,'N o  a u t o r i z a d o',45);
			}
			
			function Footer()
			{
				$this->SetY(-15);
				$this->SetFont('Arial','I',8);
				$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
			}
			
			function RotatedText($x, $y, $txt, $angle)
			{
				$this->Rotate($angle,$x,$y);
				$this->Text($x,$y,$txt);
				$this->Rotate(0);
			}
		}
	}

	$result = mysql_query("select desc_del, desc_uops from cat_delegaciones where clave=$clave", $connect);
	$totalregistros = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
		$desc_uops 	= $row['desc_uops'];
		$desc_del 	= $row['desc_del'];
	}

	$pdf = new PDF('L','mm','Legal');
	$pdf->AliasNbPages();
	$pdf->AddPage('L','Legal');
	$pdf->SetFont('Times','',12);

	$y=23;
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,"DELEGACION: " . $desc_del,0,'L');
	$pdf->SetFont('Arial','',5);
	$y=$y+10;
	$y1=$y+4;
	$y2=$y+8;

	$pdf->SetFillColor(0,0,0); //color celda
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(51,51,51);

	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,12,"UNIDAD OPERATIVA",1,'C',1);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(48,12,"INGRESOS",1,'C',1);

	$pdf->SetXY(116,$y);
	$pdf->MultiCell(224,4,"EGRESOS",1,'C',1);

	$pdf->SetXY(116,$y1);
	$pdf->MultiCell(28,4,"CAPITULO 1",1,'C',1);

	$pdf->SetXY(116,$y2);
	$pdf->MultiCell(28,4,"SERVICIOS PERSONALES",1,'C',1);

	$pdf->SetXY(142,$y1);
	$pdf->MultiCell(28,4,"CAPITULO 2",1,'C',1);

	$pdf->SetXY(142,$y2);
	$pdf->MultiCell(28,4,"BIENES DE CONSUMO",1,'C',1);

	$pdf->SetXY(170,$y1);
	$pdf->MultiCell(28,4,"CAPITULO 3",1,'C',1);

	$pdf->SetXY(170,$y2);
	$pdf->MultiCell(28,4,"SERVICIOS GENERALES",1,'C',1);

	$pdf->SetXY(198,$y1);
	$pdf->MultiCell(56,4,"CAPITULO 4 CONSERVACION",1,'C',1);

	$pdf->SetXY(198,$y2);
	$pdf->MultiCell(28,4,"4.1 MANT. DE INSTALACIONES",1,'C',1);

	$pdf->SetXY(226,$y2);
	$pdf->MultiCell(28,4,"4.2 MANT. DE EQUIPO",1,'C',1);

	$pdf->SetXY(254,$y1);
	$pdf->MultiCell(56,4,"CAPITULO 5 INVERSION FISICA",1,'C',1);

	$pdf->SetXY(254,$y2);
	$pdf->MultiCell(28,4,"5.1 OBRA PUBLICA",1,'C',1);

	$pdf->SetXY(282,$y2);
	$pdf->MultiCell(28,4,"5.2 EQUIPO DEPORTIVO",1,'C',1);

	$pdf->SetXY(310,$y1);
	$pdf->MultiCell(30,8,"TOTAL",1,'C',1);

	$y=$y+4;

	$resulti = mysql_query("select sum(i.ingreso_total) as ingreso_total from ingresos i where clave=$clave", $connect);
	$totalregistros = mysql_num_rows($resulti);
	$valcolor = 0;
	while($row = mysql_fetch_array($resulti))
	{
		$ingreso_total 	= $row['ingreso_total'];
		$gingreso_total += $ingreso_total;
	}
				
	$result1 = mysql_query("SELECT SUM(gas_anual) as gas_anual FROM personal WHERE clave=$clave and clave_par like '01%'", $connect);
	$totalregistros = mysql_num_rows($result1);
	while($row = mysql_fetch_array($result1))
	{
		$gas_anual 	= $row['gas_anual'];
		$ggas_anual += $gas_anual;					
	}

	$resultcap = mysql_query("SELECT SUM(total_gasto) as total_gasto_cap FROM egresos WHERE clave=$clave and id_par='01'", $connect);
	$totalregistros = mysql_num_rows($resultcap);
	while($row = mysql_fetch_array($resultcap))
	{
		$total_gasto_cap 	= $row['total_gasto_cap'];
		$gtotal_gasto_cap 	+= $total_gasto_cap;
	}

	$cap1 	= $gas_anual + $total_gasto_cap;
	$gcap1 	= $ggas_anual + $gtotal_gasto_cap;

	$result2 = mysql_query("SELECT SUM(total_gasto) as total_gasto_2 FROM egresos WHERE clave=$clave and id_par='02'", $connect);
	$totalregistros = mysql_num_rows($result2);
	while($row = mysql_fetch_array($result2))
	{
		$total_gasto_2 	= $row['total_gasto_2'];
		$gtotal_gasto_2 += $total_gasto_2;
	}

	$result3 = mysql_query("SELECT SUM(total_gasto) as total_gasto_3 FROM egresos WHERE clave=$clave and id_par='03'", $connect);
	$totalregistros = mysql_num_rows($result3);
	while($row = mysql_fetch_array($result3))
	{
		$total_gasto_3 	= $row['total_gasto_3'];
		$gtotal_gasto_3 += $total_gasto_3;
	}

	$result41 = mysql_query("SELECT SUM(total_gastoo) as total_gasto_41 FROM obras WHERE clave=$clave and clave_par='0401'", $connect);
	$totalregistros = mysql_num_rows($result41);
	while($row = mysql_fetch_array($result41))
	{
		$total_gasto_41 	= $row['total_gasto_41'];
		$gtotal_gasto_41 	+= $total_gasto_41;
	}
				
	$result42 = mysql_query("SELECT SUM(total_gastoo) as total_gasto_42 FROM obras WHERE clave=$clave and clave_par='0402'", $connect);
	$totalregistros = mysql_num_rows($result42);
	while($row = mysql_fetch_array($result42))
	{
		$total_gasto_42 	= $row['total_gasto_42'];
		$gtotal_gasto_42 	+= $total_gasto_42;
	}
				
	$result51 = mysql_query("SELECT SUM(total_gastoo) as total_gasto_51 FROM obras WHERE clave=$clave and clave_par='0501'", $connect);
	$totalregistros = mysql_num_rows($result51);
	while($row = mysql_fetch_array($result51))
	{
		$total_gasto_51 	= $row['total_gasto_51'];
		$gtotal_gasto_51 	+= $total_gasto_51;
	}
				
	$result52 = mysql_query("SELECT SUM(total_gastoo) as total_gasto_52 FROM obras WHERE clave=$clave and clave_par='0502'", $connect);
	$totalregistros = mysql_num_rows($result52);
	while($row = mysql_fetch_array($result52))
	{
		$total_gasto_52 	= $row['total_gasto_52'];
		$gtotal_gasto_52 	+= $total_gasto_52;
	}

	$clacon = substr($clave,0,2);

	$resultj = mysql_query("SELECT nombre_1,email_1,nombre_2,email_2,nombre_3,email_3 FROM jefes_mail WHERE clave like '$clacon%'", $connect);
	$totalregistros = mysql_num_rows($resultj);
	while($row = mysql_fetch_array($resultj))
	{
		$nombre_1 	= $row['nombre_1'];
		$email_1 	= $row['email_1'];
		$nombre_2 	= $row['nombre_2'];
		$email_2 	= $row['email_2'];
		$nombre_3 	= $row['nombre_3'];
		$email_3 	= $row['email_3'];
	}

	$total 	= $cap1 + $total_gasto_2 + $total_gasto_3 + $total_gasto_41 + $total_gasto_42 + $total_gasto_51 + $total_gasto_52;
	$gtotal = $gcap1 + $gtotal_gasto_2 + $gtotal_gasto_3 + $gtotal_gasto_41 + $gtotal_gasto_42 + $gtotal_gasto_51 + $gtotal_gasto_52;

	$diferencia 	= $ingreso_total - $total;

	$pdf->SetFillColor(255,255,255); //color celda
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);

	$y=$y+5;

	$pdf->SetFont('Arial','',7);

	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,4,$desc_uops,1,'C',1);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(48,4,number_format($ingreso_total,2),1,'C',1);

	$pdf->SetXY(116,$y);
	$pdf->MultiCell(28,4,number_format($cap1,2),1,'C',1);

	$pdf->SetXY(142,$y);
	$pdf->MultiCell(28,4,number_format($total_gasto_2,2),1,'C',1);

	$pdf->SetXY(170,$y);
	$pdf->MultiCell(28,4,number_format($total_gasto_3,2),1,'C',1);

	$pdf->SetXY(198,$y);
	$pdf->MultiCell(28,4,number_format($total_gasto_41,2),1,'C',1);

	$pdf->SetXY(226,$y);
	$pdf->MultiCell(28,4,number_format($total_gasto_42,2),1,'C',1);

	$pdf->SetXY(254,$y);
	$pdf->MultiCell(28,4,number_format($total_gasto_51,2),1,'C',1);

	$pdf->SetXY(282,$y);
	$pdf->MultiCell(28,4,number_format($total_gasto_52,2),1,'C',1);


	$pdf->SetXY(310,$y);
	$pdf->MultiCell(30,4,number_format($total,2),1,'C',1);

	$pdf->SetFillColor(0,0,0); //color celda
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(51,51,51);

	$y=$y+4;
	$pdf->SetXY(68,$y);
	$pdf->MultiCell(48,4,number_format($gingreso_total,2),1,'C',1);

	$pdf->SetXY(116,$y);
	$pdf->MultiCell(28,4,number_format($gcap1,2),1,'C',1);

	$pdf->SetXY(142,$y);
	$pdf->MultiCell(28,4,number_format($gtotal_gasto_2,2),1,'C',1);

	$pdf->SetXY(170,$y);
	$pdf->MultiCell(28,4,number_format($gtotal_gasto_3,2),1,'C',1);

	$pdf->SetXY(198,$y);
	$pdf->MultiCell(28,4,number_format($gtotal_gasto_41,2),1,'C',1);

	$pdf->SetXY(226,$y);
	$pdf->MultiCell(28,4,number_format($gtotal_gasto_42,2),1,'C',1);

	$pdf->SetXY(254,$y);
	$pdf->MultiCell(28,4,number_format($gtotal_gasto_51,2),1,'C',1);

	$pdf->SetXY(282,$y);
	$pdf->MultiCell(28,4,number_format($gtotal_gasto_52,2),1,'C',1);

	$pdf->SetXY(310,$y);
	$pdf->MultiCell(30,4,number_format($gtotal,2),1,'C',1);

	$pdf->SetFillColor(0,0,0); //color celda
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);
	$pdf->SetFont('Arial','',10);

	$y=$y+100;
	$y2=$y-1;

	$pdf->SetXY(10,$y);
	$pdf->Line(15,$y2,105,$y2);
	$pdf->Line(133,$y2,223,$y2);
	$pdf->Line(251,$y2,341,$y2);
	$pdf->SetXY(1,$y);
	$pdf->MultiCell(118,5,"Jefe de Servicios de Prestaciones Economicas y Sociales",0,'C',0);
	$pdf->SetXY(119,$y);
	$pdf->MultiCell(118,5,"Jefe del Departamento de Prestaciones Sociales",0,'C',0);
	$pdf->SetXY(237,$y);
	$pdf->MultiCell(118,5,"Jefe de Oficina de Cultura Fisica y Deporte ",0,'C',0);
	$y=$y+5;
	$pdf->SetXY(1,$y);
	$pdf->MultiCell(118,5,$nombre_1,0,'C',0);
	$pdf->SetXY(119,$y);
	$pdf->MultiCell(118,5,$nombre_2,0,'C',0);
	$pdf->SetXY(237,$y);
	$pdf->MultiCell(118,5,$nombre_3,0,'C',0);

	mysql_free_result($result);

	$pdf->Output();
?>