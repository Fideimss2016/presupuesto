<?php
	session_start();

	$clave = $_SESSION["clave"];
	$clave1 = $_SESSION["clave"];
	$clave_del = substr($clave, 0, 2);
	require('fpdf/fpdf.php');
	require('rotation.php');

	include "clases/variablesbd.php";

	$connect = mysql_connect("$host","$user","$passworks");
	mysql_select_db("$dbname",$connect);
	$result = mysql_query("select jefe_i, jefe_o, jefe_e, jefe_p from vobo where clave=$clave", $connect);
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
			// Cabecera de página
			function Header()
			{
			    // Logo
			    $this->Image('cabeza2.jpg',5,1,40,18);

			    $this->SetFont('Arial','B',20);

				$this->SetXY(1,5);
			    $this->MultiCell(354,4,'Fideicomiso para el Desarrollo del Deporte',0,'C');
				$y=15;
				$this->SetXY(1,$y);
			    $this->SetFont('Arial','B',10);
			    $this->MultiCell(354,4,'Resumen del Presupuesto de Ingresos - Egresos para el Ejercicio 2017',0,'C');
			    // Salto de línea
			    $this->Ln(20);
/*
			    $this->SetFont('Arial','B',50);
			    $this->SetTextColor(255,192,203);
			    $this->RotatedText(120,160,'N o  a u t o r i z a d o',45);
*/			}

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
			    $this->Image('cabeza2.jpg',5,1,40,18);

			    $this->SetFont('Arial','B',20);

				$this->SetXY(1,5);
			    $this->MultiCell(354,4,'Fideicomiso para el Desarrollo del Deporte',0,'C');
				$y=15;
				$this->SetXY(1,$y);
			    $this->SetFont('Arial','B',10);
			    $this->MultiCell(354,4,'Resumen del Presupuesto de Ingresos - Egresos para el Ejercicio 2017',0,'C');
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
	$pdf = new PDF('L','mm','Legal');
	$pdf->AliasNbPages();
	$pdf->AddPage('L','Legal');

	$y=23;
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(5,$y);

	$pdf->SetFont('Arial','',5);
	$y=$y+10;
	$y1=$y+4;
	$y2=$y+8;

	$pdf->SetFillColor(0,0,0); //color celda
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(51,51,51);

	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,12,"UNIDAD OPERATIVA",1,'C',1);
	$pdf->SetXY(5,$y);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(18,12,"INGRESOS",1,'C',1);

	$pdf->SetXY(86,$y);
	$pdf->MultiCell(254,4,"EGRESOS",1,'C',1);

	$pdf->SetXY(86,$y1);
	$pdf->MultiCell(36,4,"CAPITULO 1",1,'C',1);

	$pdf->SetXY(86, $y2);
	$pdf->MultiCell(18,4, "0102", 1, 'C', 1);

	$pdf->SetXY(104, $y2);
	$pdf->MultiCell(18,4, "0104", 1, 'C', 1);

	$pdf->SetXY(122,$y1);
	$pdf->MultiCell(18,4,"CAPITULO 2",1,'C',1);

	$pdf->SetXY(122, $y2);
	$pdf->MultiCell(18, 4, "0203", 1, 'C', 1);

	$pdf->SetXY(140,$y1);
	$pdf->MultiCell(72,4,"CAPITULO 3",1,'C',1);
	
	$pdf->SetXY(140,$y2);
	$pdf->MultiCell(18, 4, "0302", 1, 'C', 1);

	$pdf->SetXY(158, $y2);
	$pdf->MultiCell(18, 4, "0311", 1, 'C', 1);

	$pdf->SetXY(176, $y2);
	$pdf->MultiCell(18, 4, "0312", 1, 'C', 1);

	$pdf->SetXY(194, $y2);
	$pdf->MultiCell(18, 4, "0318", 1, 'C', 1);

	$pdf->SetXY(212,$y1);
	$pdf->MultiCell(36,4,"CAPITULO 4",1,'C',1);

	$pdf->SetXY(212,$y2);
	$pdf->MultiCell(18,4,"0401",1,'C',1);

	$pdf->SetXY(230,$y2);
	$pdf->MultiCell(18,4,"0402",1,'C',1);

	$pdf->SetXY(248,$y1);
	$pdf->MultiCell(18,4,"CAPITULO 5",1,'C',1);

	$pdf->SetXY(248,$y2);
	$pdf->MultiCell(18,4,"0501",1,'C',1);

	$pdf->SetXY(266,$y1);
	$pdf->MultiCell(54,4,"CAPITULO 6",1,'C',1);

	$pdf->SetXY(266,$y2);
	$pdf->MultiCell(18,4,"0601",1,'C',1);

	$pdf->SetXY(284,$y2);
	$pdf->MultiCell(18,4,"0602",1,'C',1);

	$pdf->SetXY(302,$y2);
	$pdf->MultiCell(18,4,"0603",1,'C',1);

	$pdf->SetXY(320,$y1);
	$pdf->MultiCell(20,8,"TOTAL",1,'C',1);

	$result = mysql_query("select distinct(vobo.clave) as clave, cd.desc_uops, cd.desc_del from vobo, cat_delegaciones cd where cd.clave=vobo.clave and cd.clave = '$clave' order by clave", $connect);
	$totalregistros = mysql_num_rows($result);

	$gingreso_total = 0;
	$total_gasto_12 = 0;
	$total_gasto_14 = 0;
	$total_gasto_23 = 0;
	$total_gasto_32 = 0;
	$total_gasto_311 = 0;
	$total_gasto_312 = 0;
	$total_gasto_318 = 0;
	$total_gasto_41 = 0;
	$total_gasto_42 = 0;
	$total_gasto_51 = 0;
	$total_gasto_61 = 0;
	$total_gasto_62 = 0;
	$total_gasto_63 = 0;

	$gtotal_gasto_12 = 0;
	$gtotal_gasto_14 = 0;
	$gtotal_gasto_23 = 0;
	$gtotal_gasto_32 = 0;
	$gtotal_gasto_311 = 0;
	$gtotal_gasto_312 = 0;
	$gtotal_gasto_318 = 0;
	$gtotal_gasto_41 = 0;
	$gtotal_gasto_42 = 0;
	$gtotal_gasto_51 = 0;
	$gtotal_gasto_61 = 0;
	$gtotal_gasto_62 = 0;
	$gtotal_gasto_63 = 0;

	$gtotal = 0;

	$y = $y + 8;
	while($row = mysql_fetch_array($result))
	{
		$desc_uops = $row['desc_uops'];
		$desc_del = $row['desc_del'];
		$clave = $row['clave'];

		$resulti = mysql_query("select sum(i.ingreso_total) as ingreso_total from ingresos i where clave = '$clave'", $connect);
		$totalregistros = mysql_num_rows($resulti);
		$valcolor = 0;
		while($row = mysql_fetch_array($resulti))
		{
			$ingreso_total = $row['ingreso_total'];
			$gingreso_total += $ingreso_total;
		}

		$result1_2 = mysql_query("SELECT SUM(gas_anual) as total_gasto12 FROM personal WHERE clave = '$clave' and clave_par = '0102'", $connect);
		$totalregistros = mysql_num_rows($result1_2);
		while($row = mysql_fetch_array($result1_2))
		{
			$total_gasto_12 = $row['total_gasto12'];
		}

		$result1_4 = mysql_query("SELECT SUM(gas_anual) as total_gasto14 FROM personal WHERE clave = '$clave' and clave_par = '0104'", $connect);
		$totalregistros = mysql_num_rows($result1_4);
		while($row = mysql_fetch_array($result1_4))
		{
			$total_gasto_14 = $row['total_gasto14'];
		}
		
		$result2_3 = mysql_query("SELECT SUM(total_gasto) as total_gasto_23 FROM egresos WHERE clave = '$clave' and clave_par = '0203'", $connect);
		$totalregistros = mysql_num_rows($result2_3);
		while($row=mysql_fetch_array($result2_3))
		{
			$total_gasto_23 = $row['total_gasto_23'];
		}
								
		$result3_2 = mysql_query("SELECT SUM(total_gasto) as total_gasto_3 FROM egresos WHERE clave = '$clave' and clave_par = '0302'", $connect);
		$totalregistros = mysql_num_rows($result3_2);
		while($row=mysql_fetch_array($result3_2))
		{
			$total_gasto_32 = $row['total_gasto_3'];
		}

		$result311 = mysql_query("SELECT SUM(monto) as total_gasto_3 FROM obras WHERE clave = '$clave' and clave_par='0311'", $connect);
		$totalregistros = mysql_num_rows($result311);
		while($row=mysql_fetch_array($result311))
		{
			$total_gasto_311 = $row['total_gasto_3'];
		}

		$result312 = mysql_query("SELECT SUM(total_gasto) as total_gasto_3 FROM egresos WHERE clave = '$clave' and clave_par='0312'", $connect);
		$totalregistros = mysql_num_rows($result312);
		while($row=mysql_fetch_array($result312))
		{
			$total_gasto_312 = $row['total_gasto_3'];
		}

		$result318 = mysql_query("SELECT SUM(total_gasto) as total_gasto_3 FROM egresos WHERE clave = '$clave' and clave_par='0318'", $connect);
		$totalregistros = mysql_num_rows($result318);
		while($row=mysql_fetch_array($result318))
		{
			$total_gasto_318 = $row['total_gasto_3'];
		}

		$result41 = mysql_query("SELECT SUM(total_gasto) as total_gasto_41 FROM egresos WHERE clave='$clave' and clave_par='0401'", $connect);
		$totalregistros = mysql_num_rows($result41);
		while($row = mysql_fetch_array($result41))
		{
			$total_gasto_41 = $row['total_gasto_41'];
		}

		$result42 = mysql_query("SELECT SUM(total_gasto) as total_gasto_42 FROM egresos WHERE clave='$clave' and clave_par='0402'", $connect);
		$totalregistros = mysql_num_rows($result42);
		while($row = mysql_fetch_array($result42))
		{
			$total_gasto_42 = $row['total_gasto_42'];
		}

		$result51 = mysql_query("SELECT SUM(monto) as total_gasto_51 FROM obras WHERE clave='$clave' and clave_par='0501'", $connect);
		$totalregistros = mysql_num_rows($result51);
		while($row=mysql_fetch_array($result51))
		{
			$total_gasto_51 = $row['total_gasto_51'];
		}

		$result61 = mysql_query("select sum(total_gastoo) as total_gasto_61 from obras where clave = '$clave' and clave_par = '0601' and activo = 1", $connect);
		$totalregistros = mysql_num_rows($result61);
		while($row = mysql_fetch_array($result61))
		{
			$total_gasto_61 = $row['total_gasto_61'];
		}

		$result62 = mysql_query("select sum(total_gastoo) as total_gasto_62 from obras where clave = '$clave' and clave_par = '0602' and activo = 1", $connect);
		$totalregistros = mysql_num_rows($result62);
		while($row = mysql_fetch_array($result62))
		{
			$total_gasto_62 = $row['total_gasto_62'];
		}

		$result63 = mysql_query("select sum(total_gastoo) as total_gasto_63 from obras where clave = '$clave' and clave_par = '0603' and activo = 1", $connect);
		$totalregistros = mysql_num_rows($result63);
		while($row = mysql_fetch_array($result63))
		{
			$total_gasto_63 = $row['total_gasto_63'];
		}

		$total = $total_gasto_12 + $total_gasto_14 + $total_gasto_23 + $total_gasto_32 + $total_gasto_311 + $total_gasto_312 + $total_gasto_318 + $total_gasto_41 + $total_gasto_42 + $total_gasto_51 + $total_gasto_61 + $total_gasto_62 + $total_gasto_63;
		$diferencia = $ingreso_total - $total;

		$gtotal_gasto_12 += $total_gasto_12;
		$gtotal_gasto_14 += $total_gasto_14;
		$gtotal_gasto_23 += $total_gasto_23;
		$gtotal_gasto_32 += $total_gasto_32;
		$gtotal_gasto_311 += $total_gasto_311;
		$gtotal_gasto_312 += $total_gasto_312;
		$gtotal_gasto_318 += $total_gasto_318;
		$gtotal_gasto_41 += $total_gasto_41;
		$gtotal_gasto_42 += $total_gasto_42;
		$gtotal_gasto_51 += $total_gasto_51;
		$gtotal_gasto_61 += $total_gasto_61;
		$gtotal_gasto_62 += $total_gasto_62;
		$gtotal_gasto_63 += $total_gasto_63;

//		$total=$cap1+$total_gasto_2+$total_gasto_3+$total_gasto_41+$total_gasto_42+$total_gasto_51+$total_gasto_52;
		//$gtotal=$gcap1+$gtotal_gasto_2+$gtotal_gasto_3+$gtotal_gasto_41+$gtotal_gasto_42+$gtotal_gasto_51+$gtotal_gasto_52;

		$diferencia = $ingreso_total-$total;

		$gtotal = $gtotal_gasto_12 + $gtotal_gasto_14 + $gtotal_gasto_23 + $gtotal_gasto_32 + $gtotal_gasto_311 + $gtotal_gasto_312 + $gtotal_gasto_318 + $gtotal_gasto_41 + $gtotal_gasto_42 + $gtotal_gasto_51 + $gtotal_gasto_61 + $gtotal_gasto_62 + $gtotal_gasto_63;

	$pdf->SetFillColor(255,255,255); //color celda
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);

	$y=$y+4;

				if($y>=190)
				{
					$y=0;
					$y=25;
					$pdf->AliasNbPages();
					$pdf->AddPage('L','Legal');
				}



	$pdf->SetFont('Arial','',5);

	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,4,$desc_del ." - ".$desc_uops ." - " . $y,1,'L',0);

	$pdf->SetFont('Arial','',7);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(18,4,number_format($ingreso_total,2),1,'R',0);

	$pdf->SetXY(86,$y);
	$pdf->MultiCell(18,4,number_format($total_gasto_12,2),1,'R',0);

	$pdf->SetXY(104,$y);
	$pdf->MultiCell(18,4,number_format($total_gasto_14,2),1,'R',0);

	$pdf->SetXY(122,$y);
	$pdf->MultiCell(18,4,number_format($total_gasto_23,2),1,'R',0);

	$pdf->SetXY(140,$y);
	$pdf->MultiCell(18,4,number_format($total_gasto_32,2),1,'R',0);

	$pdf->SetXY(158,$y);
	$pdf->MultiCell(18,4,number_format($total_gasto_311,2),1,'R',0);

	$pdf->SetXY(176,$y);
	$pdf->MultiCell(18,4,number_format($total_gasto_312,2),1,'R',0);

	$pdf->SetXY(194,$y);
	$pdf->MultiCell(18,4,number_format($total_gasto_318,2),1,'R',0);

	$pdf->SetXY(212,$y);
	$pdf->MultiCell(18,4,number_format($total_gasto_41,2),1,'R',0);

	$pdf->SetXY(230,$y);
	$pdf->MultiCell(18,4,number_format($total_gasto_42,2),1,'R',0);

	$pdf->SetXY(248,$y);
	$pdf->MultiCell(18,4,number_format($total_gasto_51,2),1,'R',0);

	$pdf->SetXY(266,$y);
	$pdf->MultiCell(18,4,number_format($total_gasto_61,2),1,'R',0);

	$pdf->SetXY(284,$y);
	$pdf->MultiCell(18,4,number_format($total_gasto_62,2),1,'R',0);

	$pdf->SetXY(302,$y);
	$pdf->MultiCell(18,4,number_format($total_gasto_63,2),1,'R',0);

	$pdf->SetXY(320,$y);
	$pdf->MultiCell(20,4,number_format($total,2),1,'R',0);
	}
	$pdf->SetFillColor(255,255,255); //color celda
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(51,51,51);

	$y=$y+4;
	$pdf->SetXY(68,$y);
	$pdf->MultiCell(18,4,number_format($gingreso_total,2),1,'R',0);

	$pdf->SetXY(86,$y);
	$pdf->MultiCell(18,4,number_format($gtotal_gasto_12,2),1,'R',0);

	$pdf->SetXY(104,$y);
	$pdf->MultiCell(18,4,number_format($gtotal_gasto_14,2),1,'R',0);

	$pdf->SetXY(122,$y);
	$pdf->MultiCell(18,4,number_format($gtotal_gasto_23,2),1,'R',0);

	$pdf->SetXY(140,$y);
	$pdf->MultiCell(18,4,number_format($gtotal_gasto_32,2),1,'R',0);

	$pdf->SetXY(158,$y);
	$pdf->MultiCell(18,4,number_format($gtotal_gasto_311,2),1,'R',0);

	$pdf->SetXY(176,$y);
	$pdf->MultiCell(18,4,number_format($gtotal_gasto_312,2),1,'R',0);

	$pdf->SetXY(194,$y);
	$pdf->MultiCell(18,4,number_format($gtotal_gasto_318,2),1,'R',0);

	$pdf->SetXY(212,$y);
	$pdf->MultiCell(18,4,number_format($gtotal_gasto_41,2),1,'R',0);

	$pdf->SetXY(230,$y);
	$pdf->MultiCell(18,4,number_format($gtotal_gasto_42,2),1,'R',0);

	$pdf->SetXY(248,$y);
	$pdf->MultiCell(18,4,number_format($gtotal_gasto_51,2),1,'R',0);

	$pdf->SetXY(266, $y);
	$pdf->MultiCell(18, 4,number_format($gtotal_gasto_61, 2),1,'R',0);

	$pdf->SetXY(284, $y);
	$pdf->MultiCell(18, 4,number_format($gtotal_gasto_62, 2),1,'R',0);

	$pdf->SetXY(302, $y);
	$pdf->MultiCell(18, 4,number_format($gtotal_gasto_63, 2),1,'R',0);

	$pdf->SetXY(320,$y);
	$pdf->MultiCell(20,4,number_format($gtotal,2),1,'R',0);

	$pdf->SetFillColor(0,0,0); //color celda
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);
	$pdf->SetFont('Arial','',10);

	$y = $y + 100;
	$y2 = $y - 1;
	$connect = mysql_connect("$host","$user","$passworks");
	mysql_select_db("$dbname",$connect);
	$result = mysql_query("select nombre_1, nombre_2, nombre_3 from jefes_mail where clave like '$clave_del%'", $connect);
	$totalregistros = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
		$nombre_1 = $row['nombre_1'];
		$nombre_2 = $row['nombre_2'];
		$nombre_3 = $row['nombre_3'];
	}

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
	$y = $y + 5;
	$pdf->SetXY(1,$y);
	$pdf->MultiCell(118,5,$nombre_1,0,'C',0);
	$pdf->SetXY(119,$y);
	$pdf->MultiCell(118,5,$nombre_2,0,'C',0);
	$pdf->SetXY(237,$y);
	$pdf->MultiCell(118,5,$nombre_3,0,'C',0);


	mysql_free_result($result);

	$pdf->Output();
?>