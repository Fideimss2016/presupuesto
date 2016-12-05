<?php
	session_start();

	$clave = $_SESSION["clave"];

	$usuario = $_SESSION["usu"];

	$colorfila = 0;
	$genero = 0;	$gfebrero = 0;	$gmarzo = 0;	$gabril = 0;	$gmayo = 0;	$gjunio = 0;	$gjulio = 0;	$gagosto = 0;	$gseptiembre = 0;	$goctubre = 0;	$gnoviembre = 0;	$gdiciembre = 0;
	$gingretot = 0;
	$genero1 = 0;	$gfebrero1 = 0;	$gmarzo1 = 0;	$gabril1 = 0;	$gmayo1 = 0;	$gjunio1 = 0;	$gjulio1 = 0;	$gagosto1 = 0;	$gseptiembre1 = 0;	$goctubre1 = 0;	$gnoviembre1 = 0;	$gdiciembre1 = 0;
	$gingretot1 = 0;
	$gingretotp_1 = 0;

	$genero_1 = 0;	$gfebrero_1 = 0;	$gmarzo_1 = 0;	$gabril_1 = 0;	$gmayo_1 = 0;	$gjunio_1 = 0;	$gjulio_1 = 0;	$gagosto_1 = 0;	$gseptiembre_1 = 0;	$goctubre_1 = 0;	$gnoviembre_1 = 0;	$gdiciembre_1 = 0;
	$gingretot_1 = 0;
	
	$genero_2 = 0;	$gfebrero_2 = 0;	$gmarzo_2 = 0;	$gabril_2 = 0;	$gmayo_2 = 0;	$gjunio_2 = 0;	$gjulio_2 = 0;	$gagosto_2 = 0;	$gseptiembre_2 = 0;	$goctubre_2 = 0;	$gnoviembre_2 = 0;	$gdiciembre_2 = 0;
	$gingretot_2 = 0;
	
	$genero_3 = 0;	$gfebrero_3 = 0;	$gmarzo_3 = 0;	$gabril_3 = 0;	$gmayo_3 = 0;	$gjunio_3 = 0;	$gjulio_3 = 0;	$gagosto_3 = 0;	$gseptiembre_3 = 0;	$goctubre_3 = 0;	$gnoviembre_3 = 0;	$gdiciembre_3 = 0;
	$gingretot_3 = 0;

	$genero_4 = 0;	$gfebrero_4 = 0;	$gmarzo_4 = 0;	$gabril_4 = 0;	$gmayo_4 = 0;	$gjunio_4 = 0;	$gjulio_4 = 0;	$gagosto_4 = 0;	$gseptiembre_4 = 0;	$goctubre_4 = 0;	$gnoviembre_4 = 0;	$gdiciembre_4 = 0;

	$genero_5 = 0;	$gfebrero_5 = 0;	$gmarzo_5 = 0;	$gabril_5 = 0;	$gmayo_5 = 0;	$gjunio_5 = 0;	$gjulio_5 = 0;	$gagosto_5 = 0;	$gseptiembre_5 = 0;	$goctubre_5 = 0;	$gnoviembre_5 = 0;	$gdiciembre_5 = 0;
	$gingretot_5 = 0;

	$genero_6 = 0;	$gfebrero_6 = 0;	$gmarzo_6 = 0;	$gabril_6 = 0;	$gmayo_6 = 0;	$gjunio_6 = 0;	$gjulio_6 = 0;	$gagosto_6 = 0;	$gseptiembre_6 = 0;	$goctubre_6 = 0;	$gnoviembre_6 = 0;	$gdiciembre_6 = 0;
	$gingretot_6 = 0;

	$status = 0;

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
				// Arial bold 15
				$this->SetFont('Arial','B',20);
				// Título
				$this->SetXY(1,5);
				$this->MultiCell(354,4,'Fideicomiso para el Desarrollo del Deporte',0,'C');
				$y = 15;
				$this->SetXY(1,$y);
				$this->SetFont('Arial','B',10);
				$this->MultiCell(354,4,'PRESUPUESTO DE EGRESOS EJERCICIO 2017',0,'C');
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
				$this->Image('cabeza2.jpg',5,1,40,18);
				// Arial bold 15
				$this->SetFont('Arial','B',20);
				// Título
				$this->SetXY(1,5);
				$this->MultiCell(354,4,'Fideicomiso para el Desarrollo del Deporte',0,'C');
				$y = 15;
				$this->SetXY(1,$y);
				$this->SetFont('Arial','B',10);
				$this->MultiCell(354,4,'PRESUPUESTO DE EGRESOS EJERCICIO 2017',0,'C');
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
	$pdf->SetFont('Times','',12);

	$result = mysql_query("select desc_uops, desc_del from cat_delegaciones where clave = '$clave'", $connect);
	$totalregistros = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
		$desc_uops = $row['desc_uops'];
		$desc_del = $row['desc_del'];
	}

	$y = 23;
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,"DELEGACION: " . $desc_del,0,'L');
	$y = $y + 5;
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,"UNIDAD OPERATIVA: " . $desc_uops,0,'L');

	$y = $y + 10;
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,".: SERVICIOS PERSONALES (INSTRUCTORES CR) :.",0,'L');

	$pdf->SetFont('Arial','',5);
	$y = $y + 5;
	$y1 = $y + 4;

	$pdf->SetFillColor(0,0,0); //color celda
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(51,51,51);

	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,4,"PARTIDA",1,'C',1);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(48,4,"ORIGEN DEL GASTO",1,'C',1);

	$pdf->SetXY(116,$y);
	$pdf->MultiCell(37,4,"ACTIVIDAD",1,'C',1);

	$pdf->SetXY(153,$y);
	$pdf->MultiCell(7,4,"CANT",1,'C',1);

	$pdf->SetXY(160,$y);
	$pdf->MultiCell(17,4,"UNIDAD",1,'C',1);

	$pdf->SetXY(177,$y);
	$pdf->MultiCell(12,4,"ENERO",1,'C',1);

	$pdf->SetXY(189,$y);
	$pdf->MultiCell(12,4,"FEBRERO",1,'C',1);

	$pdf->SetXY(201,$y);
	$pdf->MultiCell(12,4,"MARZO",1,'C',1);

	$pdf->SetXY(213,$y);
	$pdf->MultiCell(12,4,"ABRIL",1,'C',1);

	$pdf->SetXY(225,$y);
	$pdf->MultiCell(12,4,"MAYO",1,'C',1);

	$pdf->SetXY(237,$y);
	$pdf->MultiCell(12,4,"JUNIO",1,'C',1);

	$pdf->SetXY(249,$y);
	$pdf->MultiCell(12,4,"JULIO",1,'C',1);

	$pdf->SetXY(261,$y);
	$pdf->MultiCell(12,4,"AGOSTO",1,'C',1);

	$pdf->SetXY(273,$y);
	$pdf->MultiCell(14,4,"SEPTIEMBRE",1,'C',1);

	$pdf->SetXY(287,$y);
	$pdf->MultiCell(14,4,"OCTUBRE",1,'C',1);

	$pdf->SetXY(301,$y);
	$pdf->MultiCell(14,4,"NOVIEMBRE",1,'C',1);

	$pdf->SetXY(315,$y);
	$pdf->MultiCell(12,4,"DICIEMBRE",1,'C',1);

	$pdf->SetXY(327,$y);
	$pdf->MultiCell(12,4,"TOTALES",1,'C',1);

	$y = $y + 4;

	/*PERSONAL*/
/*
	$resultp = mysql_query("select p.id_conse_personal,p.clave_act,p.clave_par,p.cantidad,ci.actividad,cp.desc_par,
				p.conse_categoria,p.ene,p.feb,p.mar,p.abr,p.may,p.jun,p.jul,p.ago,p.sep,p.oct,p.nov,p.dic,cc.desc_categoria,cc.subtotal,p.status,p.meses
				from personal p, cat_actividades_i ci, cat_partidas_e cp, cat_categoria cc 
				where clave=$clave and p.clave_par='0101' and ci.clave_act=p.clave_act and cp.clave_par=p.clave_par and cc.conse_categoria=p.conse_categoria order by clave_par, id_conse_personal", $connect);
*/
	$resultp = mysql_query("select p.id_conse_personal,p.clave_act,p.clave_par,p.cantidad,ci.actividad,cp.desc_par,
				p.conse_categoria,p.ene,p.feb,p.mar,p.abr,p.may,p.jun,p.jul,p.ago,p.sep,p.oct,p.nov,p.dic,cc.desc_categoria,cc.subtotal,p.status,p.meses
				from personal p, cat_actividades_i ci, cat_partidas_e cp, cat_categoria cc 
				where clave = '$clave' and p.clave_par='0102' and ci.clave_act=p.clave_act and cp.clave_par=p.clave_par and cc.conse_categoria=p.conse_categoria order by clave_par, id_conse_personal", $connect);
	$totalregistros = mysql_num_rows($resultp);
	$valcolor = 0;
	while($row = mysql_fetch_array($resultp))
	{
		$id_conse_personal = $row['id_conse_personal'];
		$clave_act = $row['clave_act'];
		$clave_par = $row['clave_par'];
		$cantidad = $row['cantidad'];
		$actividad = $row['actividad'];
		$desc_par = $row['desc_par'];
		$ene = $row['ene'];
		$feb = $row['feb'];
		$mar = $row['mar'];
		$abr = $row['abr'];
		$may = $row['may'];
		$jun = $row['jun'];
		$jul = $row['jul'];
		$ago = $row['ago'];
		$sep = $row['sep'];
		$oct = $row['oct'];
		$nov = $row['nov'];
		$dic = $row['dic'];
		$desc_categoria = $row['desc_categoria'];
		$subtotal = $row['subtotal'];
		$status = $row['status'];			
		$meses = $row['meses'];			

		if($ene == 1){$enero = $subtotal;} else {$enero = 0;}
		if($feb == 1){$febrero = $subtotal;} else {$febrero = 0;}
		if($mar == 1){$marzo = $subtotal;} else {$marzo = 0;}
		if($abr == 1){$abril = $subtotal;} else {$abril = 0;}
		if($may == 1){$mayo = $subtotal;} else {$mayo = 0;}
		if($jun == 1){$junio = $subtotal;} else {$junio = 0;}
		if($jul == 1){$julio = $subtotal;} else {$julio = 0;}
		if($ago == 1){$agosto = $subtotal;} else {$agosto = 0;}
		if($sep == 1){$septiembre = $subtotal;} else {$septiembre = 0;}
		if($oct == 1){$octubre = $subtotal;} else {$octubre = 0;}
		if($nov == 1){$noviembre = $subtotal;} else {$noviembre = 0;}
		if($dic == 1){$diciembre = $subtotal;} else {$diciembre = 0;}
				
		$total_gastop = $enero + $febrero + $marzo + $abril + $mayo + $junio + $julio + $agosto + $septiembre + $octubre + $noviembre + $diciembre;
		if ($colorfila == 0)
		{
			$pdf->SetFillColor(255,255,255);
			$colorfila = 1;
			$val = 0;
		}
		else
		{
			$pdf->SetFillColor(239,239,239);
			$colorfila = 0;
			$val = 1;
		}

		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(0,0,0);
		$pdf->SetFillColor(255,255,255);
		/**resultados**/
		$pdf->SetFont('Arial','',4);

		$pdf->SetXY(5,$y);
		$pdf->Cell(63,6,"",1,'L',1);
		$pdf->SetXY(5,$y);
		$pdf->MultiCell(63,2,$clave_par . ' ' .$desc_par,0,'L',0);

		$pdf->SetXY(68,$y);
		$pdf->Cell(48,6,"",1,'L',1);
		$pdf->SetXY(68,$y);
		$pdf->MultiCell(48,2,$desc_categoria,0,'L',0);

		$pdf->SetXY(116,$y);
		$pdf->Cell(37,6,"",1,'L',1);
		$pdf->SetXY(116,$y);
		$pdf->MultiCell(37,2,$clave_act . ' ' .$actividad,0,'L',0);

		$pdf->SetFont('Arial','',4);

 		$pdf->SetXY(153,$y);
		$pdf->Cell(7,6,"",1,'C',1);
		$pdf->SetXY(153,$y);
		$pdf->MultiCell(7,4,$cantidad,0,'C',0);

		$pdf->SetXY(160,$y);
		$pdf->Cell(17,6,"",1,'C',1);
		$pdf->SetXY(160,$y);
		$pdf->MultiCell(17,4,"Meses",0,'C',0);

		$pdf->SetXY(177,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(177,$y);
		$pdf->MultiCell(12,4,number_format($enero,2),0,'C',0);

		$pdf->SetXY(189,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(189,$y);
		$pdf->MultiCell(12,4,number_format($febrero,2),0,'C',0);

		$pdf->SetXY(201,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(201,$y);
		$pdf->MultiCell(12,4,number_format($marzo,2),0,'C',0);

		$pdf->SetXY(213,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(213,$y);
		$pdf->MultiCell(12,4,number_format($abril,2),0,'C',0);

		$pdf->SetXY(225,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(225,$y);
		$pdf->MultiCell(12,4,number_format($mayo,2),0,'C',0);

		$pdf->SetXY(237,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(237,$y);
		$pdf->MultiCell(12,4,number_format($junio,2),0,'C',0);

		$pdf->SetXY(249,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(249,$y);
		$pdf->MultiCell(12,4,number_format($julio,2),0,'C',0);

		$pdf->SetXY(261,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(261,$y);
		$pdf->MultiCell(12,4,number_format($agosto,2),0,'C',0);

		$pdf->SetXY(273,$y);
		$pdf->Cell(14,6,"",1,'C',1);
		$pdf->SetXY(273,$y);
		$pdf->MultiCell(14,4,number_format($septiembre,2),0,'C',0);

		$pdf->SetXY(287,$y);
		$pdf->Cell(14,6,"",1,'C',1);
		$pdf->SetXY(287,$y);
		$pdf->MultiCell(14,4,number_format($octubre,2),0,'C',0);

		$pdf->SetXY(301,$y);
		$pdf->Cell(14,6,"",1,'C',1);
		$pdf->SetXY(301,$y);
		$pdf->MultiCell(14,4,number_format($noviembre,2),0,'C',0);

		$pdf->SetXY(315,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(315,$y);
		$pdf->MultiCell(12,4,number_format($diciembre,2),0,'C',0);

		$pdf->SetXY(327,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(327,$y);
		$pdf->MultiCell(12,4,number_format($total_gastop,2),0,'C',0);

		$genero += $enero;
		$gfebrero += $febrero;
		$gmarzo += $marzo;
		$gabril += $abril;
		$gmayo += $mayo;
		$gjunio += $junio;
		$gjulio += $julio;
		$gagosto += $agosto;
		$gseptiembre += $septiembre;
		$goctubre += $octubre;
		$gnoviembre += $noviembre;
		$gdiciembre += $diciembre;
		$gingretot += $total_gastop;

		$y = $y + 6;
		$y1 = $y + .5;

		if($y >= 190)
		{
			$y = 0;
			$y = 25;
			$pdf->AliasNbPages();
			$pdf->AddPage('L','Legal');
		}
	}

	$val = 1;
//	$pdf->SetFillColor(0,0,0); //color celda
//	$pdf->SetTextColor(255,255,255);
	$pdf->SetFillColor(255,255,255); //color celda
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(51,51,51);
	$pdf->SetFont('Arial','',4);


	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,4,"",1,'L',$val);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(48,4,"",1,'L',$val);

	$pdf->SetXY(116,$y);
	$pdf->MultiCell(37,4,"",1,'L',$val);

	$pdf->SetXY(153,$y);
	$pdf->MultiCell(7,4,"",1,'C',$val);

	$pdf->SetXY(160,$y);
	$pdf->MultiCell(17,4,"",1,'C',$val);

	$pdf->SetXY(177,$y);
	$pdf->MultiCell(12,4,number_format($genero,2),1,'C',$val);

	$pdf->SetXY(189,$y);
	$pdf->MultiCell(12,4,number_format($gfebrero,2),1,'C',$val);

	$pdf->SetXY(201,$y);
	$pdf->MultiCell(12,4,number_format($gmarzo,2),1,'C',$val);

	$pdf->SetXY(213,$y);
	$pdf->MultiCell(12,4,number_format($gabril,2),1,'C',$val);

	$pdf->SetXY(225,$y);
	$pdf->MultiCell(12,4,number_format($gmayo,2),1,'C',$val);

	$pdf->SetXY(237,$y);
	$pdf->MultiCell(12,4,number_format($gjunio,2),1,'C',$val);

	$pdf->SetXY(249,$y);
	$pdf->MultiCell(12,4,number_format($gjulio,2),1,'C',$val);

	$pdf->SetXY(261,$y);
	$pdf->MultiCell(12,4,number_format($gagosto,2),1,'C',$val);

	$pdf->SetXY(273,$y);
	$pdf->MultiCell(14,4,number_format($gseptiembre,2),1,'C',$val);

	$pdf->SetXY(287,$y);
	$pdf->MultiCell(14,4,number_format($goctubre,2),1,'C',$val);

	$pdf->SetXY(301,$y);
	$pdf->MultiCell(14,4,number_format($gnoviembre,2),1,'C',$val);

	$pdf->SetXY(315,$y);
	$pdf->MultiCell(12,4,number_format($gdiciembre,2),1,'C',$val);

	$pdf->SetXY(327,$y);
	$pdf->MultiCell(12,4,number_format($gingretot,2),1,'C',$val);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);


	/*0105*/

	$pdf->SetFont('Arial','B',10);

	$y=$y+10;
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,".: SERVICIOS PERSONALES (INSTRUCTORES DEL CVR) :.",0,'L');

	$pdf->SetFont('Arial','',5);
	$y=$y+5;
	$y1=$y+4;

	$pdf->SetFillColor(0,0,0); //color celda
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(51,51,51);

	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,4,"PARTIDA",1,'C',1);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(48,4,"ORIGEN DEL GASTO",1,'C',1);

	$pdf->SetXY(116,$y);
	$pdf->MultiCell(37,4,"ACTIVIDAD",1,'C',1);

	$pdf->SetXY(153,$y);
	$pdf->MultiCell(7,4,"CANT",1,'C',1);

	$pdf->SetXY(160,$y);
	$pdf->MultiCell(17,4,"UNIDAD",1,'C',1);

	$pdf->SetXY(177,$y);
	$pdf->MultiCell(12,4,"ENERO",1,'C',1);

	$pdf->SetXY(189,$y);
	$pdf->MultiCell(12,4,"FEBRERO",1,'C',1);

	$pdf->SetXY(201,$y);
	$pdf->MultiCell(12,4,"MARZO",1,'C',1);

	$pdf->SetXY(213,$y);
	$pdf->MultiCell(12,4,"ABRIL",1,'C',1);

	$pdf->SetXY(225,$y);
	$pdf->MultiCell(12,4,"MAYO",1,'C',1);

	$pdf->SetXY(237,$y);
	$pdf->MultiCell(12,4,"JUNIO",1,'C',1);

	$pdf->SetXY(249,$y);
	$pdf->MultiCell(12,4,"JULIO",1,'C',1);

	$pdf->SetXY(261,$y);
	$pdf->MultiCell(12,4,"AGOSTO",1,'C',1);

	$pdf->SetXY(273,$y);
	$pdf->MultiCell(14,4,"SEPTIEMBRE",1,'C',1);

	$pdf->SetXY(287,$y);
	$pdf->MultiCell(14,4,"OCTUBRE",1,'C',1);

	$pdf->SetXY(301,$y);
	$pdf->MultiCell(14,4,"NOVIEMBRE",1,'C',1);

	$pdf->SetXY(315,$y);
	$pdf->MultiCell(12,4,"DICIEMBRE",1,'C',1);

	$pdf->SetXY(327,$y);
	$pdf->MultiCell(12,4,"TOTALES",1,'C',1);

	$y = $y + 4;

	/*PERSONAL*/
	/*
	$resultp = mysql_query("select p.id_conse_personal,p.clave_act,p.clave_par,p.cantidad,ci.actividad,cp.desc_par,
				p.conse_categoria,p.ene,p.feb,p.mar,p.abr,p.may,p.jun,p.jul,p.ago,p.sep,p.oct,p.nov,p.dic,cc.desc_categoria,cc.subtotal,p.status,p.meses, p.gas_anual
				from personal p, cat_actividades_i ci, cat_partidas_e cp, cat_categoria cc 
				where clave='$clave' and p.clave_par='0105' and ci.clave_act=p.clave_act and cp.clave_par=p.clave_par and cc.conse_categoria=p.conse_categoria order by clave_par, id_conse_personal", $connect);
	*/
	$resultp = mysql_query("select p.id_conse_personal,p.clave_act,p.clave_par,p.cantidad,ci.actividad,cp.desc_par,
				p.conse_categoria,p.ene,p.feb,p.mar,p.abr,p.may,p.jun,p.jul,p.ago,p.sep,p.oct,p.nov,p.dic,cc.desc_categoria,cc.subtotal,p.status,p.meses, p.gas_anual
				from personal p, cat_actividades_i ci, cat_partidas_e cp, cat_categoria cc 
				where clave = '$clave' and p.clave_par = '0104' and ci.clave_act=p.clave_act and cp.clave_par=p.clave_par and cc.conse_categoria=p.conse_categoria order by clave_par, id_conse_personal", $connect);
	$totalregistros = mysql_num_rows($resultp);
	//if ($totalregistros > 0)			// MODIFICADO EL 19 DE FEBREROD DE 2016 HUMBERTO FRANCO
	//{
		$valcolor = 0;
		while($row = mysql_fetch_array($resultp))
		{
			$id_conse_personal = $row['id_conse_personal'];
			$clave_act = $row['clave_act'];
			$clave_par = $row['clave_par'];
			$cantidad = $row['cantidad'];
			$actividad = $row['actividad'];
			$desc_par = $row['desc_par'];
			$ene1 = $row['ene'];
			$feb1 = $row['feb'];
			$mar1 = $row['mar'];
			$abr1 = $row['abr'];
			$may1 = $row['may'];
			$jun1 = $row['jun'];
			$jul1 = $row['jul'];
			$ago1 = $row['ago'];
			$sep1 = $row['sep'];
			$oct1 = $row['oct'];
			$nov1 = $row['nov'];
			$dic1 = $row['dic'];
			$desc_categoria = $row['desc_categoria'];
			$subtotal = $row['subtotal'];
			$status = $row['status'];			
			$meses = $row['meses'];			
			$gas_anual = $row['gas_anual'];			

			if($ene1 == 1){$enero = $subtotal;} else {$enero = 0;}
			if($feb1 == 1){$febrero = $subtotal;} else {$febrero = 0;}
			if($mar1 == 1){$marzo = $subtotal;} else {$marzo = 0;}
			if($abr1 == 1){$abril = $subtotal;} else {$abril = 0;}
			if($may1 == 1){$mayo = $subtotal;} else {$mayo = 0;}
			if($jun1 == 1){$junio = $subtotal;} else {$junio = 0;}
			if($jul1 == 1){$julio = $subtotal;} else {$julio = 0;}
			if($ago1 == 1){$agosto = $subtotal;} else {$agosto = 0;}
			if($sep1 == 1){$septiembre = $subtotal;} else {$septiembre = 0;}
			if($oct1 == 1){$octubre = $subtotal;} else {$octubre = 0;}
			if($nov1 == 1){$noviembre = $subtotal;} else {$noviembre = 0;}
			if($dic1 == 1){$diciembre = $subtotal;} else {$diciembre = 0;}
					
			$total_gastop = $enero + $febrero + $marzo + $abril + $mayo + $junio + $julio + $agosto + $septiembre + $octubre + $noviembre + $diciembre;

			if ($colorfila == 0)
			{
				$pdf->SetFillColor(255,255,255);
				$colorfila = 1;
				$val = 0;
			}
			else
			{
				$pdf->SetFillColor(239,239,239);
				$colorfila = 0;
				$val = 1;
			}

			$pdf->SetTextColor(0,0,0);
			$pdf->SetDrawColor(51,51,51);
			/**resultados**/
			$pdf->SetFont('Arial','',4);

			$pdf->SetXY(5,$y);
			$pdf->Cell(63,6,"",1,'L',1);
			$pdf->SetXY(5,$y);
			$pdf->MultiCell(63,2,$clave_par . ' ' .$desc_par,0,'L',0);

			$pdf->SetXY(68,$y);
			$pdf->Cell(48,6,"",1,'L',1);
			$pdf->SetXY(68,$y);
			$pdf->MultiCell(48,2,$desc_categoria,0,'L',0);

			$pdf->SetXY(116,$y);
			$pdf->Cell(37,6,"",1,'L',1);
			$pdf->SetXY(116,$y);
			$pdf->MultiCell(37,2,$clave_act . ' ' .$actividad,0,'L',0);

			$pdf->SetFont('Arial','',4);

			$pdf->SetXY(153,$y);
			$pdf->Cell(7,6,"",1,'C',1);
			$pdf->SetXY(153,$y);
			$pdf->MultiCell(7,4,$cantidad,0,'C',0);

			$pdf->SetXY(160,$y);
			$pdf->Cell(17,6,"",1,'C',1);
			$pdf->SetXY(160,$y);
			$pdf->MultiCell(17,4,"Meses",0,'C',0);

			$pdf->SetXY(177,$y);
			$pdf->Cell(12,6,"",1,'C',1);
			$pdf->SetXY(177,$y);
			$pdf->MultiCell(12,4,number_format($enero,2),0,'C',0);

			$pdf->SetXY(189,$y);
			$pdf->Cell(12,6,"",1,'C',1);
			$pdf->SetXY(189,$y);
			$pdf->MultiCell(12,4,number_format($febrero,2),0,'C',0);

			$pdf->SetXY(201,$y);
			$pdf->Cell(12,6,"",1,'C',1);
			$pdf->SetXY(201,$y);
			$pdf->MultiCell(12,4,number_format($marzo,2),0,'C',0);

			$pdf->SetXY(213,$y);
			$pdf->Cell(12,6,"",1,'C',1);
			$pdf->SetXY(213,$y);
			$pdf->MultiCell(12,4,number_format($abril,2),0,'C',0);

			$pdf->SetXY(225,$y);
			$pdf->Cell(12,6,"",1,'C',1);
			$pdf->SetXY(225,$y);
			$pdf->MultiCell(12,4,number_format($mayo,2),0,'C',0);

			$pdf->SetXY(237,$y);
			$pdf->Cell(12,6,"",1,'C',1);
			$pdf->SetXY(237,$y);
			$pdf->MultiCell(12,4,number_format($junio,2),0,'C',0);

			$pdf->SetXY(249,$y);
			$pdf->Cell(12,6,"",1,'C',1);
			$pdf->SetXY(249,$y);
			$pdf->MultiCell(12,4,number_format($julio,2),0,'C',0);

			$pdf->SetXY(261,$y);
			$pdf->Cell(12,6,"",1,'C',1);
			$pdf->SetXY(261,$y);
			$pdf->MultiCell(12,4,number_format($agosto,2),0,'C',0);

			$pdf->SetXY(273,$y);
			$pdf->Cell(14,6,"",1,'C',1);
			$pdf->SetXY(273,$y);
			$pdf->MultiCell(14,4,number_format($septiembre,2),0,'C',0);

			$pdf->SetXY(287,$y);
			$pdf->Cell(14,6,"",1,'C',1);
			$pdf->SetXY(287,$y);
			$pdf->MultiCell(14,4,number_format($octubre,2),0,'C',0);

			$pdf->SetXY(301,$y);
			$pdf->Cell(14,6,"",1,'C',1);
			$pdf->SetXY(301,$y);
			$pdf->MultiCell(14,4,number_format($noviembre,2),0,'C',0);

			$pdf->SetXY(315,$y);
			$pdf->Cell(12,6,"",1,'C',1);
			$pdf->SetXY(315,$y);
			$pdf->MultiCell(12,4,number_format($diciembre,2),0,'C',0);

			$pdf->SetXY(327,$y);
			$pdf->Cell(12,6,"",1,'C',1);
			$pdf->SetXY(327,$y);
			$pdf->MultiCell(12,4,number_format($gas_anual,2),0,'C',0);

			$genero1 += $enero;
			$gfebrero1 += $febrero;
			$gmarzo1 += $marzo;
			$gabril1 += $abril;
			$gmayo1 += $mayo;
			$gjunio1 += $junio;
			$gjulio1 += $julio;
			$gagosto1 += $agosto;
			$gseptiembre1 += $septiembre;
			$goctubre1 += $octubre;
			$gnoviembre1 += $noviembre;
			$gdiciembre1 += $diciembre;
			$gingretot1 += $gas_anual;

			$y = $y + 6;
			$y1 = $y + .5;
			if($y >= 190)
			{
				$y = 0;
				$y = 25;
				$pdf->AliasNbPages();
				$pdf->AddPage('L','Legal');
			}
		}

		/***********************/
		$val = 1;
	//	$pdf->SetFillColor(0,0,0); //color celda
	//	$pdf->SetTextColor(255,255,255);
		$pdf->SetFillColor(255,255,255); //color celda
		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(51,51,51);
		$pdf->SetFont('Arial','',4);

		$pdf->SetXY(5,$y);
		$pdf->MultiCell(63,4,"",1,'L',$val);

		$pdf->SetXY(68,$y);
		$pdf->MultiCell(48,4,"",1,'L',$val);

		$pdf->SetXY(116,$y);
		$pdf->MultiCell(37,4,"",1,'L',$val);

		$pdf->SetXY(153,$y);
		$pdf->MultiCell(7,4,"",1,'C',$val);

		$pdf->SetXY(160,$y);
		$pdf->MultiCell(17,4,"",1,'C',$val);

		$pdf->SetXY(177,$y);
		$pdf->MultiCell(12,4,number_format($genero1,2),1,'C',$val);

		$pdf->SetXY(189,$y);
		$pdf->MultiCell(12,4,number_format($gfebrero1,2),1,'C',$val);

		$pdf->SetXY(201,$y);
		$pdf->MultiCell(12,4,number_format($gmarzo1,2),1,'C',$val);

		$pdf->SetXY(213,$y);
		$pdf->MultiCell(12,4,number_format($gabril1,2),1,'C',$val);

		$pdf->SetXY(225,$y);
		$pdf->MultiCell(12,4,number_format($gmayo1,2),1,'C',$val);

		$pdf->SetXY(237,$y);
		$pdf->MultiCell(12,4,number_format($gjunio1,2),1,'C',$val);

		$pdf->SetXY(249,$y);
		$pdf->MultiCell(12,4,number_format($gjulio1,2),1,'C',$val);

		$pdf->SetXY(261,$y);
		$pdf->MultiCell(12,4,number_format($gagosto1,2),1,'C',$val);

		$pdf->SetXY(273,$y);
		$pdf->MultiCell(14,4,number_format($gseptiembre1,2),1,'C',$val);

		$pdf->SetXY(287,$y);
		$pdf->MultiCell(14,4,number_format($goctubre1,2),1,'C',$val);

		$pdf->SetXY(301,$y);
		$pdf->MultiCell(14,4,number_format($gnoviembre1,2),1,'C',$val);

		$pdf->SetXY(315,$y);
		$pdf->MultiCell(12,4,number_format($gdiciembre1,2),1,'C',$val);

		$pdf->SetXY(327,$y);
		$pdf->MultiCell(12,4,number_format($gingretot1,2),1,'C',$val);
		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(0,0,0);
	//}		// MODIFICADO EL 19 DE FEBRERO DE 2016 HUMBERTO FRANCO

	$pdf->SetFont('Arial','B',10);

/*		//MODIFICADO EL 19 DE FEBRERO DE 2016 HUMBERTO FRANCO
	$y = $y + 10;
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,".: SERVICIOS PERSONALES (CAPACITACION) :.",0,'L');

	$pdf->SetFont('Arial','',5);
	$y = $y + 5;
	$y1 = $y + 4;

	$pdf->SetFillColor(0,0,0); //color celda
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(51,51,51);

	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,4,"PARTIDA",1,'C',1);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(48,4,"ORIGEN DEL GASTO",1,'C',1);

	$pdf->SetXY(116,$y);
	$pdf->MultiCell(37,4,"ACTIVIDAD",1,'C',1);

	$pdf->SetXY(153,$y);
	$pdf->MultiCell(7,4,"CANT",1,'C',1);

	$pdf->SetXY(160,$y);
	$pdf->MultiCell(17,4,"UNIDAD",1,'C',1);

	$pdf->SetXY(177,$y);
	$pdf->MultiCell(12,4,"ENERO",1,'C',1);

	$pdf->SetXY(189,$y);
	$pdf->MultiCell(12,4,"FEBRERO",1,'C',1);

	$pdf->SetXY(201,$y);
	$pdf->MultiCell(12,4,"MARZO",1,'C',1);

	$pdf->SetXY(213,$y);
	$pdf->MultiCell(12,4,"ABRIL",1,'C',1);

	$pdf->SetXY(225,$y);
	$pdf->MultiCell(12,4,"MAYO",1,'C',1);

	$pdf->SetXY(237,$y);
	$pdf->MultiCell(12,4,"JUNIO",1,'C',1);

	$pdf->SetXY(249,$y);
	$pdf->MultiCell(12,4,"JULIO",1,'C',1);

	$pdf->SetXY(261,$y);
	$pdf->MultiCell(12,4,"AGOSTO",1,'C',1);

	$pdf->SetXY(273,$y);
	$pdf->MultiCell(14,4,"SEPTIEMBRE",1,'C',1);

	$pdf->SetXY(287,$y);
	$pdf->MultiCell(14,4,"OCTUBRE",1,'C',1);

	$pdf->SetXY(301,$y);
	$pdf->MultiCell(14,4,"NOVIEMBRE",1,'C',1);

	$pdf->SetXY(315,$y);
	$pdf->MultiCell(12,4,"DICIEMBRE",1,'C',1);

	$pdf->SetXY(327,$y);
	$pdf->MultiCell(12,4,"TOTALES",1,'C',1);

	$y = $y + 4;

	///*PERSONAL

//	echo "select e.id_conse_egresos,e.clave_act,e.clave_par,e.cantidad,e.unidad,e.total_gasto,ci.actividad,cp.desc_par,
//	e.origen_del_gasto,e.enero,e.febrero,e.marzo,e.abril,e.mayo,e.junio,e.julio,e.agosto,e.septiembre,e.octubre,e.noviembre,e.diciembre
//	from egresos e, cat_actividades_i ci, cat_partidas_e cp 
//	where clave=$clave and ci.clave_act=e.clave_act and e.clave_par='0104' and cp.clave_par=e.clave_par  order by clave_par";

	$resultp = mysql_query("select e.id_conse_egresos,e.clave_act,e.clave_par,e.cantidad,e.unidad,e.total_gasto,ci.actividad,cp.desc_par,
				e.origen_del_gasto,e.enero,e.febrero,e.marzo,e.abril,e.mayo,e.junio,e.julio,e.agosto,e.septiembre,e.octubre,e.noviembre,e.diciembre
				from egresos e, cat_actividades_i ci, cat_partidas_e cp 
				where clave = '$clave' and ci.clave_act=e.clave_act and e.clave_par='0104' and cp.clave_par=e.clave_par  order by clave_par", $connect);
	$totalregistros = mysql_num_rows($resultp);
	$valcolor = 0;
	while($row = mysql_fetch_array($resultp))
	{
		$id_conse_egresos = $row['id_conse_egresos'];
		$clave_act = $row['clave_act'];
		$clave_par = $row['clave_par'];
		$cantidad = $row['cantidad'];
		$unidad = $row['unidad'];			
		$total_gasto = $row['total_gasto'];
		$actividad = $row['actividad'];
		$desc_par = $row['desc_par'];
		$status = $row['status'];
		$origen_del_gasto = $row['origen_del_gasto'];
		$enero = $row['enero'];
		$febrero = $row['febrero'];
		$marzo = $row['marzo'];
		$abril = $row['abril'];
		$mayo = $row['mayo'];
		$junio = $row['junio'];
		$julio = $row['julio'];
		$agosto = $row['agosto'];
		$septiembre = $row['septiembre'];
		$octubre = $row['octubre'];
		$noviembre = $row['noviembre'];
		$diciembre = $row['diciembre'];

		if ($colorfila == 0)
		{
			$pdf->SetFillColor(255,255,255);
			$colorfila = 1;
			$val = 0;
		}
		else
		{
			$pdf->SetFillColor(239,239,239);
			$colorfila = 0;
			$val = 1;
		}

		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(51,51,51);
		/**resultados**
		$pdf->SetFont('Arial','',4);

		$pdf->SetXY(5,$y);
		$pdf->Cell(63,6,"",1,'L',1);
		$pdf->SetXY(5,$y);
		$pdf->MultiCell(63,2,$clave_par . ' ' .$desc_par,0,'L',0);

		$pdf->SetXY(68,$y);
		$pdf->Cell(48,6,"",1,'L',1);
		$pdf->SetXY(68,$y);
		$pdf->MultiCell(48,2,$origen_del_gasto,0,'L',0);

		$pdf->SetXY(116,$y);
		$pdf->Cell(37,6,"",1,'L',1);
		$pdf->SetXY(116,$y);
		$pdf->MultiCell(37,2,$clave_act . ' ' .$actividad,0,'L',0);

		$pdf->SetFont('Arial','',4);

		$pdf->SetXY(153,$y);
		$pdf->Cell(7,6,"",1,'C',1);
		$pdf->SetXY(153,$y);
		$pdf->MultiCell(7,4,$cantidad,0,'C',0);

		$pdf->SetXY(160,$y);
		$pdf->Cell(17,6,"",1,'C',1);
		$pdf->SetXY(160,$y);
		$pdf->MultiCell(17,4,$unidad,0,'C',0);

		$pdf->SetXY(177,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(177,$y);
		$pdf->MultiCell(12,4,number_format($enero,2),0,'C',0);

		$pdf->SetXY(189,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(189,$y);
		$pdf->MultiCell(12,4,number_format($febrero,2),0,'C',0);

		$pdf->SetXY(201,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(201,$y);
		$pdf->MultiCell(12,4,number_format($marzo,2),0,'C',0);

		$pdf->SetXY(213,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(213,$y);
		$pdf->MultiCell(12,4,number_format($abril,2),0,'C',0);

		$pdf->SetXY(225,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(225,$y);
		$pdf->MultiCell(12,4,number_format($mayo,2),0,'C',0);

		$pdf->SetXY(237,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(237,$y);
		$pdf->MultiCell(12,4,number_format($junio,2),0,'C',0);

		$pdf->SetXY(249,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(249,$y);
		$pdf->MultiCell(12,4,number_format($julio,2),0,'C',0);

		$pdf->SetXY(261,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(261,$y);
		$pdf->MultiCell(12,4,number_format($agosto,2),0,'C',0);

		$pdf->SetXY(273,$y);
		$pdf->Cell(14,6,"",1,'C',1);
		$pdf->SetXY(273,$y);
		$pdf->MultiCell(14,4,number_format($septiembre,2),0,'C',0);

		$pdf->SetXY(287,$y);
		$pdf->Cell(14,6,"",1,'C',1);
		$pdf->SetXY(287,$y);
		$pdf->MultiCell(14,4,number_format($octubre,2),0,'C',0);

		$pdf->SetXY(301,$y);
		$pdf->Cell(14,6,"",1,'C',1);
		$pdf->SetXY(301,$y);
		$pdf->MultiCell(14,4,number_format($noviembre,2),0,'C',0);

		$pdf->SetXY(315,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(315,$y);
		$pdf->MultiCell(12,4,number_format($diciembre,2),0,'C',0);

		$pdf->SetXY(327,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(327,$y);
		$pdf->MultiCell(12,4,number_format($total_gasto,2),0,'C',0);

		$y = $y + 6;
		$y1 = $y + .5;

		$genero_1+=$enero;
		$gfebrero_1+=$febrero;
		$gmarzo_1+=$marzo;
		$gabril_1+=$abril;
		$gmayo_1+=$mayo;
		$gjunio_1+=$junio;
		$gjulio_1+=$julio;
		$gagosto_1+=$agosto;
		$gseptiembre_1+=$septiembre;
		$goctubre_1+=$octubre;
		$gnoviembre_1+=$noviembre;
		$gdiciembre_1+=$diciembre;
		$gingretotp_1+=$total_gasto;
		if($y>=190)
		{
			$y=0;
			$y=25;
			$pdf->AliasNbPages();
			$pdf->AddPage('L','Legal');
		}
	}

	$val=1;
//	$pdf->SetFillColor(0,0,0); //color celda
//	$pdf->SetTextColor(255,255,255);
	$pdf->SetFillColor(255,255,255); //color celda
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(51,51,51);
	$pdf->SetFont('Arial','',4);


	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,4,"",1,'L',$val);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(48,4,"",1,'L',$val);

	$pdf->SetXY(116,$y);
	$pdf->MultiCell(37,4,"",1,'L',$val);

	$pdf->SetXY(153,$y);
	$pdf->MultiCell(7,4,"",1,'C',$val);

	$pdf->SetXY(160,$y);
	$pdf->MultiCell(17,4,"",1,'C',$val);

	$pdf->SetXY(177,$y);
	$pdf->MultiCell(12,4,number_format($genero_1,2),1,'C',$val);

	$pdf->SetXY(189,$y);
	$pdf->MultiCell(12,4,number_format($gfebrero_1,2),1,'C',$val);

	$pdf->SetXY(201,$y);
	$pdf->MultiCell(12,4,number_format($gmarzo_1,2),1,'C',$val);

	$pdf->SetXY(213,$y);
	$pdf->MultiCell(12,4,number_format($gabril_1,2),1,'C',$val);

	$pdf->SetXY(225,$y);
	$pdf->MultiCell(12,4,number_format($gmayo_1,2),1,'C',$val);

	$pdf->SetXY(237,$y);
	$pdf->MultiCell(12,4,number_format($gjunio_1,2),1,'C',$val);

	$pdf->SetXY(249,$y);
	$pdf->MultiCell(12,4,number_format($gjulio_1,2),1,'C',$val);

	$pdf->SetXY(261,$y);
	$pdf->MultiCell(12,4,number_format($gagosto_1,2),1,'C',$val);

	$pdf->SetXY(273,$y);
	$pdf->MultiCell(14,4,number_format($gseptiembre_1,2),1,'C',$val);

	$pdf->SetXY(287,$y);
	$pdf->MultiCell(14,4,number_format($goctubre_1,2),1,'C',$val);

	$pdf->SetXY(301,$y);
	$pdf->MultiCell(14,4,number_format($gnoviembre_1,2),1,'C',$val);

	$pdf->SetXY(315,$y);
	$pdf->MultiCell(12,4,number_format($gdiciembre_1,2),1,'C',$val);

	$pdf->SetXY(327,$y);
	$pdf->MultiCell(12,4,number_format($gingretotp_1,2),1,'C',$val);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);
*/		// MODIFICADO EL 19 DE FEBRERO 2016 HUMBERTO FRANCO
	/*TERMINA PERSONAL*/

	/*$pdf->AliasNbPages();
	$pdf->AddPage('L','Legal');
	$pdf->SetFont('Times','',12);
	*/
	//for($i=1;$i<=40;$i++)
	    //$pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);

	/***************************************************************** EMPIEZA BIENES DE CONSUMO ********************************************************************/

	$pdf->AliasNbPages();
	$pdf->AddPage('L','Legal');
	$pdf->SetFont('Arial','B',10);
	$y=23;

	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,"DELEGACION: " . $desc_del,0,'L');
	$y=$y+5;
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,"UNIDAD OPERATIVA: " . $desc_uops,0,'L');

	$y=$y+10;
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,".: BIENES DE CONSUMO :.",0,'L');

	$pdf->SetFont('Arial','',5);
	$y=$y+5;
	$y1=$y+4;

	$pdf->SetFillColor(0,0,0); //color celda
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(51,51,51);

	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,4,"PARTIDA",1,'C',1);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(48,4,"ORIGEN DEL GASTO",1,'C',1);

	$pdf->SetXY(116,$y);
	$pdf->MultiCell(37,4,"ACTIVIDAD",1,'C',1);

	$pdf->SetXY(153,$y);
	$pdf->MultiCell(7,4,"CANT",1,'C',1);

	$pdf->SetXY(160,$y);
	$pdf->MultiCell(17,4,"UNIDAD",1,'C',1);

	$pdf->SetXY(177,$y);
	$pdf->MultiCell(12,4,"ENERO",1,'C',1);

	$pdf->SetXY(189,$y);
	$pdf->MultiCell(12,4,"FEBRERO",1,'C',1);

	$pdf->SetXY(201,$y);
	$pdf->MultiCell(12,4,"MARZO",1,'C',1);

	$pdf->SetXY(213,$y);
	$pdf->MultiCell(12,4,"ABRIL",1,'C',1);

	$pdf->SetXY(225,$y);
	$pdf->MultiCell(12,4,"MAYO",1,'C',1);

	$pdf->SetXY(237,$y);
	$pdf->MultiCell(12,4,"JUNIO",1,'C',1);

	$pdf->SetXY(249,$y);
	$pdf->MultiCell(12,4,"JULIO",1,'C',1);

	$pdf->SetXY(261,$y);
	$pdf->MultiCell(12,4,"AGOSTO",1,'C',1);

	$pdf->SetXY(273,$y);
	$pdf->MultiCell(14,4,"SEPTIEMBRE",1,'C',1);

	$pdf->SetXY(287,$y);
	$pdf->MultiCell(14,4,"OCTUBRE",1,'C',1);

	$pdf->SetXY(301,$y);
	$pdf->MultiCell(14,4,"NOVIEMBRE",1,'C',1);

	$pdf->SetXY(315,$y);
	$pdf->MultiCell(12,4,"DICIEMBRE",1,'C',1);

	$pdf->SetXY(327,$y);
	$pdf->MultiCell(12,4,"TOTALES",1,'C',1);

	$y=$y+4;


	$colorfila=0;
	$result=mysql_query("select e.id_conse_egresos, e.status, e.clave_act,e.clave_par,e.cantidad,e.unidad,e.total_gasto,ci.actividad,cp.desc_par,
				e.origen_del_gasto,e.enero,e.febrero,e.marzo,e.abril,e.mayo,e.junio,e.julio,e.agosto,e.septiembre,e.octubre,e.noviembre,e.diciembre
				from egresos e, cat_actividades_i ci, cat_partidas_e cp 
				where clave = '$clave' and ci.clave_act=e.clave_act and cp.clave_par=e.clave_par and e.id_par in ('02')  order by clave_par", $connect);
	$totalregistros=mysql_num_rows($result);
	$valcolor=0;
	while($row=mysql_fetch_array($result))
	{
		$id_conse_egresos=$row['id_conse_egresos'];
		$clave_act=$row['clave_act'];
		$clave_par=$row['clave_par'];
		$cantidad=$row['cantidad'];
		$unidad=$row['unidad'];			
		$total_gasto=$row['total_gasto'];
		$actividad=$row['actividad'];
		$desc_par=$row['desc_par'];
		$status=$row['status'];
		$origen_del_gasto=$row['origen_del_gasto'];
		$enero=$row['enero'];
		$febrero=$row['febrero'];
		$marzo=$row['marzo'];
		$abril=$row['abril'];
		$mayo=$row['mayo'];
		$junio=$row['junio'];
		$julio=$row['julio'];
		$agosto=$row['agosto'];
		$septiembre=$row['septiembre'];
		$octubre=$row['octubre'];
		$noviembre=$row['noviembre'];
		$diciembre=$row['diciembre'];
		if ($colorfila==0){$pdf->SetFillColor(255,255,255); $colorfila=1; $val=0;}
		else{$pdf->SetFillColor(239,239,239); $colorfila=0; $val=1;}

		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(51,51,51);
		/**resultados**/
		$pdf->SetFont('Arial','',4);

		$pdf->SetXY(5,$y);
		$pdf->Cell(63,6,"",1,'L',1);
		$pdf->SetXY(5,$y);
		$pdf->MultiCell(63,2,$clave_par . ' ' .$desc_par,0,'L',0);

		$pdf->SetXY(68,$y);
		$pdf->Cell(48,6,"",1,'L',1);
		$pdf->SetXY(68,$y);
		$pdf->MultiCell(48,2,$origen_del_gasto,0,'L',0);

		$pdf->SetXY(116,$y);
		$pdf->Cell(37,6,"",1,'L',1);
		$pdf->SetXY(116,$y);
		$pdf->MultiCell(37,2,$clave_act . ' ' .$actividad,0,'L',0);

		$pdf->SetXY(153,$y);
		$pdf->Cell(7,6,"",1,'C',1);
		$pdf->SetXY(153,$y);
		$pdf->MultiCell(7,4,$cantidad,0,'C',0);

		$pdf->SetXY(160,$y);
		$pdf->Cell(17,6,"",1,'C',1);
		$pdf->SetXY(160,$y);
		$pdf->MultiCell(17,2,$unidad,0,'C',0);

		$pdf->SetXY(177,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(177,$y);
		$pdf->MultiCell(12,4,number_format($enero,2),0,'C',0);

		$pdf->SetXY(189,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(189,$y);
		$pdf->MultiCell(12,4,number_format($febrero,2),0,'C',0);

		$pdf->SetXY(201,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(201,$y);
		$pdf->MultiCell(12,4,number_format($marzo,2),0,'C',0);

		$pdf->SetXY(213,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(213,$y);
		$pdf->MultiCell(12,4,number_format($abril,2),0,'C',0);

		$pdf->SetXY(225,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(225,$y);
		$pdf->MultiCell(12,4,number_format($mayo,2),0,'C',0);

		$pdf->SetXY(237,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(237,$y);
		$pdf->MultiCell(12,4,number_format($junio,2),0,'C',0);

		$pdf->SetXY(249,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(249,$y);
		$pdf->MultiCell(12,4,number_format($julio,2),0,'C',0);

		$pdf->SetXY(261,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(261,$y);
		$pdf->MultiCell(12,4,number_format($agosto,2),0,'C',0);

		$pdf->SetXY(273,$y);
		$pdf->Cell(14,6,"",1,'C',1);
		$pdf->SetXY(273,$y);
		$pdf->MultiCell(14,4,number_format($septiembre,2),0,'C',0);

		$pdf->SetXY(287,$y);
		$pdf->Cell(14,6,"",1,'C',1);
		$pdf->SetXY(287,$y);
		$pdf->MultiCell(14,4,number_format($octubre,2),0,'C',0);

		$pdf->SetXY(301,$y);
		$pdf->Cell(14,6,"",1,'C',1);
		$pdf->SetXY(301,$y);
		$pdf->MultiCell(14,4,number_format($noviembre,2),0,'C',0);

		$pdf->SetXY(315,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(315,$y);
		$pdf->MultiCell(12,4,number_format($diciembre,2),0,'C',0);

		$pdf->SetXY(327,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(327,$y);
		$pdf->MultiCell(12,4,number_format($total_gasto,2),0,'C',0);

		$y=$y+6;
		$y1=$y+.5;

		$genero_1+=$enero;
		$gfebrero_1+=$febrero;
		$gmarzo_1+=$marzo;
		$gabril_1+=$abril;
		$gmayo_1+=$mayo;
		$gjunio_1+=$junio;
		$gjulio_1+=$julio;
		$gagosto_1+=$agosto;
		$gseptiembre_1+=$septiembre;
		$goctubre_1+=$octubre;
		$gnoviembre_1+=$noviembre;
		$gdiciembre_1+=$diciembre;
		$gingretot_1+=$total_gasto;
		if($y>=190)
		{
			$y=0;
			$y=25;
			$pdf->AliasNbPages();
			$pdf->AddPage('L','Legal');
		}
	}

	$val=1;
//	$pdf->SetFillColor(0,0,0); //color celda
//	$pdf->SetTextColor(255,255,255);
	$pdf->SetFillColor(255,255,255); //color celda
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(51,51,51);
	$pdf->SetFont('Arial','',4);

	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,4,"",1,'L',$val);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(48,4,"",1,'L',$val);

	$pdf->SetXY(116,$y);
	$pdf->MultiCell(37,4,"",1,'L',$val);

	$pdf->SetXY(153,$y);
	$pdf->MultiCell(7,4,"",1,'C',$val);

	$pdf->SetXY(160,$y);
	$pdf->MultiCell(17,4,"",1,'C',$val);

	$pdf->SetXY(177,$y);
	$pdf->MultiCell(12,4,number_format($genero_1,2),1,'C',$val);

	$pdf->SetXY(189,$y);
	$pdf->MultiCell(12,4,number_format($gfebrero_1,2),1,'C',$val);

	$pdf->SetXY(201,$y);
	$pdf->MultiCell(12,4,number_format($gmarzo_1,2),1,'C',$val);

	$pdf->SetXY(213,$y);
	$pdf->MultiCell(12,4,number_format($gabril_1,2),1,'C',$val);

	$pdf->SetXY(225,$y);
	$pdf->MultiCell(12,4,number_format($gmayo_1,2),1,'C',$val);

	$pdf->SetXY(237,$y);
	$pdf->MultiCell(12,4,number_format($gjunio_1,2),1,'C',$val);

	$pdf->SetXY(249,$y);
	$pdf->MultiCell(12,4,number_format($gjulio_1,2),1,'C',$val);

	$pdf->SetXY(261,$y);
	$pdf->MultiCell(12,4,number_format($gagosto_1,2),1,'C',$val);

	$pdf->SetXY(273,$y);
	$pdf->MultiCell(14,4,number_format($gseptiembre_1,2),1,'C',$val);

	$pdf->SetXY(287,$y);
	$pdf->MultiCell(14,4,number_format($goctubre_1,2),1,'C',$val);

	$pdf->SetXY(301,$y);
	$pdf->MultiCell(14,4,number_format($gnoviembre_1,2),1,'C',$val);

	$pdf->SetXY(315,$y);
	$pdf->MultiCell(12,4,number_format($gdiciembre_1,2),1,'C',$val);

	$pdf->SetXY(327,$y);
	$pdf->MultiCell(12,4,number_format($gingretot_1,2),1,'C',$val);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);

	/***************************************************** TERMINA BIENES DE CONSUMO ***********************************************************/

	/***************************************************** EMPIEZA SERVICIOS GENERALES *********************************************************/

	$pdf->SetFont('Arial','B',10);

	$y=$y+10;
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,".: SERVICIOS GENERALES :.",0,'L');

	$pdf->SetFont('Arial','',5);
	$y=$y+5;
	$y1=$y+4;

	$pdf->SetFillColor(0,0,0); //color celda
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(51,51,51);

	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,4,"PARTIDA",1,'C',1);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(48,4,"ORIGEN DEL GASTO",1,'C',1);

	$pdf->SetXY(116,$y);
	$pdf->MultiCell(37,4,"ACTIVIDAD",1,'C',1);

	$pdf->SetXY(153,$y);
	$pdf->MultiCell(7,4,"CANT",1,'C',1);

	$pdf->SetXY(160,$y);
	$pdf->MultiCell(17,4,"UNIDAD",1,'C',1);

	$pdf->SetXY(177,$y);
	$pdf->MultiCell(12,4,"ENERO",1,'C',1);

	$pdf->SetXY(189,$y);
	$pdf->MultiCell(12,4,"FEBRERO",1,'C',1);

	$pdf->SetXY(201,$y);
	$pdf->MultiCell(12,4,"MARZO",1,'C',1);

	$pdf->SetXY(213,$y);
	$pdf->MultiCell(12,4,"ABRIL",1,'C',1);

	$pdf->SetXY(225,$y);
	$pdf->MultiCell(12,4,"MAYO",1,'C',1);

	$pdf->SetXY(237,$y);
	$pdf->MultiCell(12,4,"JUNIO",1,'C',1);

	$pdf->SetXY(249,$y);
	$pdf->MultiCell(12,4,"JULIO",1,'C',1);

	$pdf->SetXY(261,$y);
	$pdf->MultiCell(12,4,"AGOSTO",1,'C',1);

	$pdf->SetXY(273,$y);
	$pdf->MultiCell(14,4,"SEPTIEMBRE",1,'C',1);

	$pdf->SetXY(287,$y);
	$pdf->MultiCell(14,4,"OCTUBRE",1,'C',1);

	$pdf->SetXY(301,$y);
	$pdf->MultiCell(14,4,"NOVIEMBRE",1,'C',1);

	$pdf->SetXY(315,$y);
	$pdf->MultiCell(12,4,"DICIEMBRE",1,'C',1);

	$pdf->SetXY(327,$y);
	$pdf->MultiCell(12,4,"TOTALES",1,'C',1);

	$y=$y+4;

	$colorfila=0;
	$result=mysql_query("select e.id_conse_egresos, e.status, e.clave_act,e.clave_par,e.cantidad,e.unidad,e.total_gasto,ci.actividad,cp.desc_par,
				e.origen_del_gasto,e.enero,e.febrero,e.marzo,e.abril,e.mayo,e.junio,e.julio,e.agosto,e.septiembre,e.octubre,e.noviembre,e.diciembre
				from egresos e, cat_actividades_i ci, cat_partidas_e cp 
				where clave = '$clave' and ci.clave_act=e.clave_act and cp.clave_par=e.clave_par and e.clave_par like '03%' union
				select o.id_conse_obra as id_conse_egresos, o.status, o.clave_act, o.clave_par, o.cantidad, o.unidad, o.monto as total_gasto, ci.actividad,cp.desc_par, 
				o.origen_del_gasto, o.enero, o.febrero, o.marzo, o.abril, o.mayo, o.junio, o.julio, o.agosto, o.septiembre, o.octubre, o.noviembre, o.diciembre
				from obras o, cat_actividades_i ci, cat_partidas_e cp 
				where clave = '$clave' and ci.clave_act=o.clave_act and cp.clave_par=o.clave_par and o.clave_par like '03%'  order by clave_par", $connect);


	$totalregistros=mysql_num_rows($result);
	$valcolor = 0;
	while($row=mysql_fetch_array($result))
	{
		$id_conse_egresos=$row['id_conse_egresos'];
		$clave_act=$row['clave_act'];
		$clave_par=$row['clave_par'];
		$cantidad=$row['cantidad'];
		$unidad=$row['unidad'];			
		$total_gasto3=$row['total_gasto'];
		$actividad=$row['actividad'];
		$desc_par=$row['desc_par'];
		$status=$row['status'];
		$origen_del_gasto=$row['origen_del_gasto'];
		$enero3=$row['enero'];
		$febrero3=$row['febrero'];
		$marzo3=$row['marzo'];
		$abril3=$row['abril'];
		$mayo3=$row['mayo'];
		$junio3=$row['junio'];
		$julio3=$row['julio'];
		$agosto3=$row['agosto'];
		$septiembre3=$row['septiembre'];
		$octubre3=$row['octubre'];
		$noviembre3=$row['noviembre'];
		$diciembre3=$row['diciembre'];

		if ($colorfila==0){$pdf->SetFillColor(255,255,255); $colorfila=1; $val=0;}
		else{$pdf->SetFillColor(239,239,239); $colorfila=0; $val=1;}

		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(51,51,51);
		/**resultados**/
		$pdf->SetFont('Arial','',4);

		$pdf->SetXY(5,$y);
		$pdf->Cell(63,6,"",1,'L',1);
		$pdf->SetXY(5,$y);
		$pdf->MultiCell(63,2,$clave_par . ' ' .$desc_par,0,'L',0);

		$pdf->SetXY(68,$y);
		$pdf->Cell(48,6,"",1,'L',1);
		$pdf->SetXY(68,$y);
		$pdf->MultiCell(48,2,$origen_del_gasto,0,'L',0);

		$pdf->SetXY(116,$y);
		$pdf->Cell(37,6,"",1,'L',1);
		$pdf->SetXY(116,$y);
		$pdf->MultiCell(37,2,$clave_act . ' ' .$actividad,0,'L',0);

		$pdf->SetXY(153,$y);
		$pdf->Cell(7,6,"",1,'C',1);
		$pdf->SetXY(153,$y);
		$pdf->MultiCell(7,4,$cantidad,0,'C',0);

		$pdf->SetXY(160,$y);
		$pdf->Cell(17,6,"",1,'C',1);
		$pdf->SetXY(160,$y);
		$pdf->MultiCell(17,2,$unidad,0,'C',0);

		$pdf->SetXY(177,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(177,$y);
		$pdf->MultiCell(12,4,number_format($enero3,2),0,'C',0);

		$pdf->SetXY(189,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(189,$y);
		$pdf->MultiCell(12,4,number_format($febrero3,2),0,'C',0);

		$pdf->SetXY(201,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(201,$y);
		$pdf->MultiCell(12,4,number_format($marzo3,2),0,'C',0);

		$pdf->SetXY(213,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(213,$y);
		$pdf->MultiCell(12,4,number_format($abril3,2),0,'C',0);

		$pdf->SetXY(225,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(225,$y);
		$pdf->MultiCell(12,4,number_format($mayo3,2),0,'C',0);

		$pdf->SetXY(237,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(237,$y);
		$pdf->MultiCell(12,4,number_format($junio3,2),0,'C',0);

		$pdf->SetXY(249,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(249,$y);
		$pdf->MultiCell(12,4,number_format($julio3,2),0,'C',0);

		$pdf->SetXY(261,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(261,$y);
		$pdf->MultiCell(12,4,number_format($agosto3,2),0,'C',0);

		$pdf->SetXY(273,$y);
		$pdf->Cell(14,6,"",1,'C',1);
		$pdf->SetXY(273,$y);
		$pdf->MultiCell(14,4,number_format($septiembre3,2),0,'C',0);

		$pdf->SetXY(287,$y);
		$pdf->Cell(14,6,"",1,'C',1);
		$pdf->SetXY(287,$y);
		$pdf->MultiCell(14,4,number_format($octubre3,2),0,'C',0);

		$pdf->SetXY(301,$y);
		$pdf->Cell(14,6,"",1,'C',1);
		$pdf->SetXY(301,$y);
		$pdf->MultiCell(14,4,number_format($noviembre3,2),0,'C',0);

		$pdf->SetXY(315,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(315,$y);
		$pdf->MultiCell(12,4,number_format($diciembre3,2),0,'C',0);

		$pdf->SetXY(327,$y);
		$pdf->Cell(12,6,"",1,'C',1);
		$pdf->SetXY(327,$y);
		$pdf->MultiCell(12,4,number_format($total_gasto3,2),0,'C',0);

		$y=$y+6;
		$y1=$y+.5;

		$genero_3+=$enero3;
		$gfebrero_3+=$febrero3;
		$gmarzo_3+=$marzo3;
		$gabril_3+=$abril3;
		$gmayo_3+=$mayo3;
		$gjunio_3+=$junio3;
		$gjulio_3+=$julio3;
		$gagosto_3+=$agosto3;
		$gseptiembre_3+=$septiembre3;
		$goctubre_3+=$octubre3;
		$gnoviembre_3+=$noviembre3;
		$gdiciembre_3+=$diciembre3;
		$gingretot_3+=$total_gasto3;
		if($y>=190)
		{
			$y=0;
			$y=25;
			$pdf->AliasNbPages();
			$pdf->AddPage('L','Legal');
		}
	}

	$val=1;
	//$pdf->SetFillColor(0,0,0); //color celda
	//$pdf->SetTextColor(255,255,255);
	$pdf->SetFillColor(255,255,255); //color celda
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(51,51,51);
	$pdf->SetFont('Arial','',4);

	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,4,"",1,'L',$val);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(48,4,"",1,'L',$val);

	$pdf->SetXY(116,$y);
	$pdf->MultiCell(37,4,"",1,'L',$val);

	$pdf->SetXY(153,$y);
	$pdf->MultiCell(7,4,"",1,'C',$val);

	$pdf->SetXY(160,$y);
	$pdf->MultiCell(17,4,"",1,'C',$val);

	$pdf->SetXY(177,$y);
	$pdf->MultiCell(12,4,number_format($genero_3,2),1,'C',$val);

	$pdf->SetXY(189,$y);
	$pdf->MultiCell(12,4,number_format($gfebrero_3,2),1,'C',$val);

	$pdf->SetXY(201,$y);
	$pdf->MultiCell(12,4,number_format($gmarzo_3,2),1,'C',$val);

	$pdf->SetXY(213,$y);
	$pdf->MultiCell(12,4,number_format($gabril_3,2),1,'C',$val);

	$pdf->SetXY(225,$y);
	$pdf->MultiCell(12,4,number_format($gmayo_3,2),1,'C',$val);

	$pdf->SetXY(237,$y);
	$pdf->MultiCell(12,4,number_format($gjunio_3,2),1,'C',$val);

	$pdf->SetXY(249,$y);
	$pdf->MultiCell(12,4,number_format($gjulio_3,2),1,'C',$val);

	$pdf->SetXY(261,$y);
	$pdf->MultiCell(12,4,number_format($gagosto_3,2),1,'C',$val);

	$pdf->SetXY(273,$y);
	$pdf->MultiCell(14,4,number_format($gseptiembre_3,2),1,'C',$val);

	$pdf->SetXY(287,$y);
	$pdf->MultiCell(14,4,number_format($goctubre_3,2),1,'C',$val);

	$pdf->SetXY(301,$y);
	$pdf->MultiCell(14,4,number_format($gnoviembre_3,2),1,'C',$val);

	$pdf->SetXY(315,$y);
	$pdf->MultiCell(12,4,number_format($gdiciembre_3,2),1,'C',$val);

	$pdf->SetXY(327,$y);
	$pdf->MultiCell(12,4,number_format($gingretot_3,2),1,'C',$val);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);

	/***************************************************** TERMINA SERVICIOS GENERALES *********************************************************/


	/***************************************************** EMPIEZA AYUDAS SOCIALES (CONSERVACION) *********************************************************/

	$pdf->AliasNbPages();
	$pdf->AddPage('L','Legal');
	$pdf->SetFont('Arial','B',10);

	$y=23;
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,"DELEGACION: " . $desc_del,0,'L');
	$y=$y+5;
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,"UNIDAD OPERATIVA: " . $desc_uops,0,'L');

	$y=$y+10;
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,".: AYUDAS SOCIALES :.",0,'L');

	$pdf->SetFont('Arial','',5);
	$y=$y+5;
	$y1=$y+4;

	$pdf->SetFillColor(0,0,0); //color celda
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(51,51,51);

	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,4,"PARTIDA",1,'C',1);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(48,4,"ORIGEN DEL GASTO",1,'C',1);

	$pdf->SetXY(116,$y);
	$pdf->MultiCell(37,4,"ACTIVIDAD",1,'C',1);

	$pdf->SetXY(153,$y);
	$pdf->MultiCell(7,4,"CANT",1,'C',1);

	$pdf->SetXY(160,$y);
	$pdf->MultiCell(17,4,"UNIDAD",1,'C',1);

	$pdf->SetXY(177,$y);
	$pdf->MultiCell(12,4,"ENERO",1,'C',1);

	$pdf->SetXY(189,$y);
	$pdf->MultiCell(12,4,"FEBRERO",1,'C',1);

	$pdf->SetXY(201,$y);
	$pdf->MultiCell(12,4,"MARZO",1,'C',1);

	$pdf->SetXY(213,$y);
	$pdf->MultiCell(12,4,"ABRIL",1,'C',1);

	$pdf->SetXY(225,$y);
	$pdf->MultiCell(12,4,"MAYO",1,'C',1);

	$pdf->SetXY(237,$y);
	$pdf->MultiCell(12,4,"JUNIO",1,'C',1);

	$pdf->SetXY(249,$y);
	$pdf->MultiCell(12,4,"JULIO",1,'C',1);

	$pdf->SetXY(261,$y);
	$pdf->MultiCell(12,4,"AGOSTO",1,'C',1);

	$pdf->SetXY(273,$y);
	$pdf->MultiCell(14,4,"SEPTIEMBRE",1,'C',1);

	$pdf->SetXY(287,$y);
	$pdf->MultiCell(14,4,"OCTUBRE",1,'C',1);

	$pdf->SetXY(301,$y);
	$pdf->MultiCell(14,4,"NOVIEMBRE",1,'C',1);

	$pdf->SetXY(315,$y);
	$pdf->MultiCell(12,4,"DICIEMBRE",1,'C',1);

	$pdf->SetXY(327,$y);
	$pdf->MultiCell(12,4,"TOTALES",1,'C',1);

	$y=$y+4;


				$result=mysql_query("select e.id_conse_egresos, e.clave_act, e.clave_par, e.cantidad, e.unidad, e.total_gasto, ci.actividad, cp.desc_par,
				e.origen_del_gasto, e.enero, e.febrero, e.marzo, e.abril, e.mayo, e.junio, e.julio, e.agosto, e.septiembre, e.octubre, e.noviembre, e.diciembre
				from egresos e, cat_actividades_i ci, cat_partidas_e cp 
				where clave=$clave and e.clave_par in ('0401','0402') and ci.clave_act=e.clave_act and cp.clave_par=e.clave_par order by e.clave_par", $connect);

				$totalregistros=mysql_num_rows($result);
				$valcolor=0;
				while($row=mysql_fetch_array($result))
				{
				$id_conse_obra=$row['id_conse_obra'];
				$clave_act=$row['clave_act'];
				$clave_par=$row['clave_par'];
				$cantidad=$row['cantidad'];
				$unidad=$row['unidad'];			
				$total_gastoo=$row['total_gasto'];
				$actividad=$row['actividad'];
				$desc_par=$row['desc_par'];
				$status=$row['status'];
				$origen_del_gasto=$row['origen_del_gasto'];
				$enero=$row['enero'];
				$febrero=$row['febrero'];
				$marzo=$row['marzo'];
				$abril=$row['abril'];
				$mayo=$row['mayo'];
				$junio=$row['junio'];
				$julio=$row['julio'];
				$agosto=$row['agosto'];
				$septiembre=$row['septiembre'];
				$octubre=$row['octubre'];
				$noviembre=$row['noviembre'];
				$diciembre=$row['diciembre'];

				if ($colorfila==0){$pdf->SetFillColor(255,255,255); $colorfila=1; $val=0;}
				else{$pdf->SetFillColor(239,239,239); $colorfila=0; $val=1;}


										if($y>=190)
										{
											$y=0;
											$pdf->AliasNbPages();
											$pdf->AddPage('L','Letter');
											$y=25;
										
										
										
										}



	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(51,51,51);
	/**resultados**/
	$pdf->SetFont('Arial','',4);

	$pdf->SetXY(5,$y);
	$pdf->Cell(63,6,"",1,'L',1);
	$pdf->SetXY(5,$y1);
	$pdf->MultiCell(63,2,$clave_par . ' ' .$desc_par,0,'L',0);

	$pdf->SetXY(68,$y);
	$pdf->Cell(48,6,"",1,'L',1);
	$pdf->SetXY(68,$y1);
	$pdf->MultiCell(48,2,$origen_del_gasto,0,'L',0);

	$pdf->SetXY(116,$y);
	$pdf->Cell(37,6,"",1,'L',1);
	$pdf->SetXY(116,$y1);
	$pdf->MultiCell(37,2,$clave_act . ' ' .$actividad,0,'L',0);

	$pdf->SetXY(153,$y);
	$pdf->Cell(7,6,"",1,'C',1);
	$pdf->SetXY(153,$y1);
	$pdf->MultiCell(7,2,$cantidad,0,'C',0);

	$pdf->SetXY(160,$y);
	$pdf->Cell(17,6,"",1,'C',1);
	$pdf->SetXY(160,$y1);
	$pdf->MultiCell(17,2,$unidad,0,'C',0);

	$pdf->SetXY(177,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(177,$y1);
	$pdf->MultiCell(12,2,number_format($enero,2),0,'C',0);

	$pdf->SetXY(189,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(189,$y1);
	$pdf->MultiCell(12,2,number_format($febrero,2),0,'C',0);

	$pdf->SetXY(201,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(201,$y1);
	$pdf->MultiCell(12,2,number_format($marzo,2),0,'C',0);

	$pdf->SetXY(213,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(213,$y1);
	$pdf->MultiCell(12,2,number_format($abril,2),0,'C',0);

	$pdf->SetXY(225,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(225,$y1);
	$pdf->MultiCell(12,2,number_format($mayo,2),0,'C',0);

	$pdf->SetXY(237,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(237,$y1);
	$pdf->MultiCell(12,2,number_format($junio,2),0,'C',0);

	$pdf->SetXY(249,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(249,$y1);
	$pdf->MultiCell(12,2,number_format($julio,2),0,'C',0);

	$pdf->SetXY(261,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(261,$y1);
	$pdf->MultiCell(12,2,number_format($agosto,2),0,'C',0);

	$pdf->SetXY(273,$y);
	$pdf->Cell(14,6,"",1,'C',1);
	$pdf->SetXY(273,$y1);
	$pdf->MultiCell(14,2,number_format($septiembre,2),0,'C',0);

	$pdf->SetXY(287,$y);
	$pdf->Cell(14,6,"",1,'C',1);
	$pdf->SetXY(287,$y1);
	$pdf->MultiCell(14,2,number_format($octubre,2),0,'C',0);

	$pdf->SetXY(301,$y);
	$pdf->Cell(14,6,"",1,'C',1);
	$pdf->SetXY(301,$y1);
	$pdf->MultiCell(14,2,number_format($noviembre,2),0,'C',0);

	$pdf->SetXY(315,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(315,$y1);
	$pdf->MultiCell(12,2,number_format($diciembre,2),0,'C',0);

	$pdf->SetXY(327,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(327,$y1);
	$pdf->MultiCell(12,2,number_format($total_gastoo,2),0,'C',0);

	$y=$y+6;
	$y1=$y+.5;

	$genero_2+=$enero;
	$gfebrero_2+=$febrero;
	$gmarzo_2+=$marzo;
	$gabril_2+=$abril;
	$gmayo_2+=$mayo;
	$gjunio_2+=$junio;
	$gjulio_2+=$julio;
	$gagosto_2+=$agosto;
	$gseptiembre_2+=$septiembre;
	$goctubre_2+=$octubre;
	$gnoviembre_2+=$noviembre;
	$gdiciembre_2+=$diciembre;
	$gingretot_2+=$total_gastoo;

				if($y>=190)
				{
					$y=0;
					$y=25;
					$pdf->AliasNbPages();
					$pdf->AddPage('L','Legal');
				}

				}


	//$y=$y+4;
	$val=1;
//	$pdf->SetFillColor(0,0,0); //color celda
//	$pdf->SetTextColor(255,255,255);
	$pdf->SetFillColor(255,255,255); //color celda
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(51,51,51);
	$pdf->SetFont('Arial','',4);


	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,4,$y,1,'L',$val);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(48,4,"",1,'L',$val);

	$pdf->SetXY(116,$y);
	$pdf->MultiCell(37,4,"",1,'L',$val);

	$pdf->SetXY(153,$y);
	$pdf->MultiCell(7,4,"",1,'C',$val);

	$pdf->SetXY(160,$y);
	$pdf->MultiCell(17,4,"",1,'C',$val);

	$pdf->SetXY(177,$y);
	$pdf->MultiCell(12,4,number_format($genero_2,2),1,'C',$val);

	$pdf->SetXY(189,$y);
	$pdf->MultiCell(12,4,number_format($gfebrero_2,2),1,'C',$val);

	$pdf->SetXY(201,$y);
	$pdf->MultiCell(12,4,number_format($gmarzo_2,2),1,'C',$val);

	$pdf->SetXY(213,$y);
	$pdf->MultiCell(12,4,number_format($gabril_2,2),1,'C',$val);

	$pdf->SetXY(225,$y);
	$pdf->MultiCell(12,4,number_format($gmayo_2,2),1,'C',$val);

	$pdf->SetXY(237,$y);
	$pdf->MultiCell(12,4,number_format($gjunio_2,2),1,'C',$val);

	$pdf->SetXY(249,$y);
	$pdf->MultiCell(12,4,number_format($gjulio_2,2),1,'C',$val);

	$pdf->SetXY(261,$y);
	$pdf->MultiCell(12,4,number_format($gagosto_2,2),1,'C',$val);

	$pdf->SetXY(273,$y);
	$pdf->MultiCell(14,4,number_format($gseptiembre_2,2),1,'C',$val);

	$pdf->SetXY(287,$y);
	$pdf->MultiCell(14,4,number_format($goctubre_2,2),1,'C',$val);

	$pdf->SetXY(301,$y);
	$pdf->MultiCell(14,4,number_format($gnoviembre_2,2),1,'C',$val);

	$pdf->SetXY(315,$y);
	$pdf->MultiCell(12,4,number_format($gdiciembre_2,2),1,'C',$val);

	$pdf->SetXY(327,$y);
	$pdf->MultiCell(12,4,number_format($gingretot_2,2),1,'C',$val);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);


	/***************************************************** TERMINA AYUDAS SOCIALES (CONSERVACION) *********************************************************/



	/***************************************************** EMPIEZA INVERSION FISICA *********************************************************/

	$pdf->SetFont('Arial','B',10);

	$y=$y+10;
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,".: INVERSION FISICA :.",0,'L');

	$pdf->SetFont('Arial','',5);
	$y=$y+5;
	$y1=$y+4;

	$pdf->SetFillColor(0,0,0); //color celda
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(51,51,51);

	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,4,"PARTIDA",1,'C',1);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(48,4,"ORIGEN DEL GASTO",1,'C',1);

	$pdf->SetXY(116,$y);
	$pdf->MultiCell(37,4,"ACTIVIDAD",1,'C',1);

	$pdf->SetXY(153,$y);
	$pdf->MultiCell(7,4,"CANT",1,'C',1);

	$pdf->SetXY(160,$y);
	$pdf->MultiCell(17,4,"UNIDAD",1,'C',1);

	$pdf->SetXY(177,$y);
	$pdf->MultiCell(12,4,"ENERO",1,'C',1);

	$pdf->SetXY(189,$y);
	$pdf->MultiCell(12,4,"FEBRERO",1,'C',1);

	$pdf->SetXY(201,$y);
	$pdf->MultiCell(12,4,"MARZO",1,'C',1);

	$pdf->SetXY(213,$y);
	$pdf->MultiCell(12,4,"ABRIL",1,'C',1);

	$pdf->SetXY(225,$y);
	$pdf->MultiCell(12,4,"MAYO",1,'C',1);

	$pdf->SetXY(237,$y);
	$pdf->MultiCell(12,4,"JUNIO",1,'C',1);

	$pdf->SetXY(249,$y);
	$pdf->MultiCell(12,4,"JULIO",1,'C',1);

	$pdf->SetXY(261,$y);
	$pdf->MultiCell(12,4,"AGOSTO",1,'C',1);

	$pdf->SetXY(273,$y);
	$pdf->MultiCell(14,4,"SEPTIEMBRE",1,'C',1);

	$pdf->SetXY(287,$y);
	$pdf->MultiCell(14,4,"OCTUBRE",1,'C',1);

	$pdf->SetXY(301,$y);
	$pdf->MultiCell(14,4,"NOVIEMBRE",1,'C',1);

	$pdf->SetXY(315,$y);
	$pdf->MultiCell(12,4,"DICIEMBRE",1,'C',1);

	$pdf->SetXY(327,$y);
	$pdf->MultiCell(12,4,"TOTALES",1,'C',1);

	$y=$y+4;

	$status = 0;

				$result=mysql_query("select o.id_conse_obra,o.clave_act,o.clave_par,o.cantidad,o.unidad,o.total_gastoo,o.status,ci.actividad,cp.desc_par,
				o.origen_del_gasto,o.enero,o.febrero,o.marzo,o.abril,o.mayo,o.junio,o.julio,o.agosto,o.septiembre,o.octubre,o.noviembre,o.diciembre
				from obras o, cat_actividades_i ci, cat_partidas_e cp 
				where o.clave = '$clave' and o.clave_par in ('0501','0502') and ci.clave_act=o.clave_act and cp.clave_par=o.clave_par order by o.clave_par", $connect);

				$totalregistros=mysql_num_rows($result);
				$valcolor=0;
				while($row=mysql_fetch_array($result))
				{
				$id_conse_obra=$row['id_conse_obra'];
				$clave_act=$row['clave_act'];
				$clave_par=$row['clave_par'];
				$cantidad=$row['cantidad'];
				$unidad=$row['unidad'];			
				$total_gastoo5=$row['total_gastoo'];
				$actividad=$row['actividad'];
				$desc_par=$row['desc_par'];
				$status=$row['status'];
				$origen_del_gasto=$row['origen_del_gasto'];
				$enero5=$row['enero'];
				$febrero5=$row['febrero'];
				$marzo5=$row['marzo'];
				$abril5=$row['abril'];
				$mayo5=$row['mayo'];
				$junio5=$row['junio'];
				$julio5=$row['julio'];
				$agosto5=$row['agosto'];
				$septiembre5=$row['septiembre'];
				$octubre5=$row['octubre'];
				$noviembre5=$row['noviembre'];
				$diciembre5=$row['diciembre'];

				if ($colorfila==0){$pdf->SetFillColor(255,255,255); $colorfila=1; $val=0;}
				else{$pdf->SetFillColor(239,239,239); $colorfila=0; $val=1;}


										if($y>=190)
										{
											$y=0;
											$pdf->AliasNbPages();
											$pdf->AddPage('L','Letter');
											$y=25;
										
										
										
										}



	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(51,51,51);
	/**resultados**/
	$pdf->SetFont('Arial','',4);

	$pdf->SetXY(5,$y);
	$pdf->Cell(63,6,"",1,'L',1);
	$pdf->SetXY(5,$y1);
	$pdf->MultiCell(63,2,$clave_par . ' ' .$desc_par,0,'L',0);

	$pdf->SetXY(68,$y);
	$pdf->Cell(48,6,"",1,'L',1);
	$pdf->SetXY(68,$y1);
	$pdf->MultiCell(48,2,$origen_del_gasto,0,'L',0);

	$pdf->SetXY(116,$y);
	$pdf->Cell(37,6,"",1,'L',1);
	$pdf->SetXY(116,$y1);
	$pdf->MultiCell(37,2,$clave_act . ' ' .$actividad,0,'L',0);

	$pdf->SetXY(153,$y);
	$pdf->Cell(7,6,"",1,'C',1);
	$pdf->SetXY(153,$y1);
	$pdf->MultiCell(7,2,$cantidad,0,'C',0);

	$pdf->SetXY(160,$y);
	$pdf->Cell(17,6,"",1,'C',1);
	$pdf->SetXY(160,$y1);
	$pdf->MultiCell(17,2,$unidad,0,'C',0);

	$pdf->SetXY(177,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(177,$y1);
	$pdf->MultiCell(12,2,number_format($enero5,2),0,'C',0);

	$pdf->SetXY(189,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(189,$y1);
	$pdf->MultiCell(12,2,number_format($febrero5,2),0,'C',0);

	$pdf->SetXY(201,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(201,$y1);
	$pdf->MultiCell(12,2,number_format($marzo5,2),0,'C',0);

	$pdf->SetXY(213,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(213,$y1);
	$pdf->MultiCell(12,2,number_format($abril5,2),0,'C',0);

	$pdf->SetXY(225,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(225,$y1);
	$pdf->MultiCell(12,2,number_format($mayo5,2),0,'C',0);

	$pdf->SetXY(237,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(237,$y1);
	$pdf->MultiCell(12,2,number_format($junio5,2),0,'C',0);

	$pdf->SetXY(249,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(249,$y1);
	$pdf->MultiCell(12,2,number_format($julio5,2),0,'C',0);

	$pdf->SetXY(261,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(261,$y1);
	$pdf->MultiCell(12,2,number_format($agosto5,2),0,'C',0);

	$pdf->SetXY(273,$y);
	$pdf->Cell(14,6,"",1,'C',1);
	$pdf->SetXY(273,$y1);
	$pdf->MultiCell(14,2,number_format($septiembre5,2),0,'C',0);

	$pdf->SetXY(287,$y);
	$pdf->Cell(14,6,"",1,'C',1);
	$pdf->SetXY(287,$y1);
	$pdf->MultiCell(14,2,number_format($octubre5,2),0,'C',0);

	$pdf->SetXY(301,$y);
	$pdf->Cell(14,6,"",1,'C',1);
	$pdf->SetXY(301,$y1);
	$pdf->MultiCell(14,2,number_format($noviembre5,2),0,'C',0);

	$pdf->SetXY(315,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(315,$y1);
	$pdf->MultiCell(12,2,number_format($diciembre5,2),0,'C',0);

	$pdf->SetXY(327,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(327,$y1);
	$pdf->MultiCell(12,2,number_format($total_gastoo5,2),0,'C',0);

	$y=$y+6;
	$y1=$y+.5;

	$genero_5+=$enero5;
	$gfebrero_5+=$febrero5;
	$gmarzo_5+=$marzo5;
	$gabril_5+=$abril5;
	$gmayo_5+=$mayo5;
	$gjunio_5+=$junio5;
	$gjulio_5+=$julio5;
	$gagosto_5+=$agosto5;
	$gseptiembre_5+=$septiembre5;
	$goctubre_5+=$octubre5;
	$gnoviembre_5+=$noviembre5;
	$gdiciembre_5+=$diciembre5;
	$gingretot_5+=$total_gastoo5;

				if($y>=190)
				{
					$y=0;
					$y=25;
					$pdf->AliasNbPages();
					$pdf->AddPage('L','Legal');
				}

				}


	//$y=$y+4;
	$val=1;
//	$pdf->SetFillColor(0,0,0); //color celda
//	$pdf->SetTextColor(255,255,255);
	$pdf->SetFillColor(255,255,255); //color celda
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(51,51,51);
	$pdf->SetFont('Arial','',4);


	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,4,$y,1,'L',$val);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(48,4,"",1,'L',$val);

	$pdf->SetXY(116,$y);
	$pdf->MultiCell(37,4,"",1,'L',$val);

	$pdf->SetXY(153,$y);
	$pdf->MultiCell(7,4,"",1,'C',$val);

	$pdf->SetXY(160,$y);
	$pdf->MultiCell(17,4,"",1,'C',$val);

	$pdf->SetXY(177,$y);
	$pdf->MultiCell(12,4,number_format($genero_5,2),1,'C',$val);

	$pdf->SetXY(189,$y);
	$pdf->MultiCell(12,4,number_format($gfebrero_5,2),1,'C',$val);

	$pdf->SetXY(201,$y);
	$pdf->MultiCell(12,4,number_format($gmarzo_5,2),1,'C',$val);

	$pdf->SetXY(213,$y);
	$pdf->MultiCell(12,4,number_format($gabril_5,2),1,'C',$val);

	$pdf->SetXY(225,$y);
	$pdf->MultiCell(12,4,number_format($gmayo_5,2),1,'C',$val);

	$pdf->SetXY(237,$y);
	$pdf->MultiCell(12,4,number_format($gjunio_5,2),1,'C',$val);

	$pdf->SetXY(249,$y);
	$pdf->MultiCell(12,4,number_format($gjulio_5,2),1,'C',$val);

	$pdf->SetXY(261,$y);
	$pdf->MultiCell(12,4,number_format($gagosto_5,2),1,'C',$val);

	$pdf->SetXY(273,$y);
	$pdf->MultiCell(14,4,number_format($gseptiembre_5,2),1,'C',$val);

	$pdf->SetXY(287,$y);
	$pdf->MultiCell(14,4,number_format($goctubre_5,2),1,'C',$val);

	$pdf->SetXY(301,$y);
	$pdf->MultiCell(14,4,number_format($gnoviembre_5,2),1,'C',$val);

	$pdf->SetXY(315,$y);
	$pdf->MultiCell(12,4,number_format($gdiciembre_5,2),1,'C',$val);

	$pdf->SetXY(327,$y);
	$pdf->MultiCell(12,4,number_format($gingretot_5,2),1,'C',$val);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);


	/***************************************************** TERMINA INVERSION FISICA *********************************************************/



	/***************************************************** EMPIEZA INVERSION PUBLICA *********************************************************/

	$pdf->SetFont('Arial','B',10);

	$y=$y+10;
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,".: INVERSION PUBLICA :.",0,'L');

	$pdf->SetFont('Arial','',5);
	$y=$y+5;
	$y1=$y+4;

	$pdf->SetFillColor(0,0,0); //color celda
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(51,51,51);

	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,4,"PARTIDA",1,'C',1);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(48,4,"ORIGEN DEL GASTO",1,'C',1);

	$pdf->SetXY(116,$y);
	$pdf->MultiCell(37,4,"ACTIVIDAD",1,'C',1);

	$pdf->SetXY(153,$y);
	$pdf->MultiCell(7,4,"CANT",1,'C',1);

	$pdf->SetXY(160,$y);
	$pdf->MultiCell(17,4,"UNIDAD",1,'C',1);

	$pdf->SetXY(177,$y);
	$pdf->MultiCell(12,4,"ENERO",1,'C',1);

	$pdf->SetXY(189,$y);
	$pdf->MultiCell(12,4,"FEBRERO",1,'C',1);

	$pdf->SetXY(201,$y);
	$pdf->MultiCell(12,4,"MARZO",1,'C',1);

	$pdf->SetXY(213,$y);
	$pdf->MultiCell(12,4,"ABRIL",1,'C',1);

	$pdf->SetXY(225,$y);
	$pdf->MultiCell(12,4,"MAYO",1,'C',1);

	$pdf->SetXY(237,$y);
	$pdf->MultiCell(12,4,"JUNIO",1,'C',1);

	$pdf->SetXY(249,$y);
	$pdf->MultiCell(12,4,"JULIO",1,'C',1);

	$pdf->SetXY(261,$y);
	$pdf->MultiCell(12,4,"AGOSTO",1,'C',1);

	$pdf->SetXY(273,$y);
	$pdf->MultiCell(14,4,"SEPTIEMBRE",1,'C',1);

	$pdf->SetXY(287,$y);
	$pdf->MultiCell(14,4,"OCTUBRE",1,'C',1);

	$pdf->SetXY(301,$y);
	$pdf->MultiCell(14,4,"NOVIEMBRE",1,'C',1);

	$pdf->SetXY(315,$y);
	$pdf->MultiCell(12,4,"DICIEMBRE",1,'C',1);

	$pdf->SetXY(327,$y);
	$pdf->MultiCell(12,4,"TOTALES",1,'C',1);

	$y=$y+4;

	$status = 0;
	$result=mysql_query("select o.id_conse_obra,o.clave_act,o.clave_par,o.cantidad,o.unidad,o.monto as total_gastoo,o.status,ci.actividad,cp.desc_par,
				o.origen_del_gasto,o.enero,o.febrero,o.marzo,o.abril,o.mayo,o.junio,o.julio,o.agosto,o.septiembre,o.octubre,o.noviembre,o.diciembre
				from obras o, cat_actividades_i ci, cat_partidas_e cp 
				where clave=$clave and o.clave_par in ('0601','0602', '0603') and ci.clave_act=o.clave_act and cp.clave_par=o.clave_par order by o.clave_par", $connect);
	$totalregistros = mysql_num_rows($result);
	$valcolor = 0;
	while($row = mysql_fetch_array($result))
	{
		$id_conse_obra = $row['id_conse_obra'];
		$clave_act = $row['clave_act'];
		$clave_par = $row['clave_par'];
		$cantidad = $row['cantidad'];
		$unidad = $row['unidad'];			
		$total_gastoo6 = $row['total_gastoo'];
		$actividad = $row['actividad'];
		$desc_par = $row['desc_par'];
		$status = $row['status'];
		$origen_del_gasto = $row['origen_del_gasto'];
		$enero6 = $row['enero'];
		$febrero6 = $row['febrero'];
		$marzo6 = $row['marzo'];
		$abril6 = $row['abril'];
		$mayo6 = $row['mayo'];
		$junio6 = $row['junio'];
		$julio6 = $row['julio'];
		$agosto6 = $row['agosto'];
		$septiembre6 = $row['septiembre'];
		$octubre6 = $row['octubre'];
		$noviembre6 = $row['noviembre'];
		$diciembre6 = $row['diciembre'];
		if ($colorfila == 0){$pdf->SetFillColor(255,255,255); $colorfila = 1; $val = 0;}
		else{$pdf->SetFillColor(239,239,239); $colorfila = 0; $val = 1;}
		if($y>=190)
										{
											$y=0;
											$pdf->AliasNbPages();
											$pdf->AddPage('L','Letter');
											$y=25;
										
										
										
									}

	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(51,51,51);
	/**resultados**/
	$pdf->SetFont('Arial','',4);

	$pdf->SetXY(5,$y);
	$pdf->Cell(63,6,"",1,'L',1);
	$pdf->SetXY(5,$y1);
	$pdf->MultiCell(63,2,$clave_par . ' ' .$desc_par,0,'L',0);

	$pdf->SetXY(68,$y);
	$pdf->Cell(48,6,"",1,'L',1);
	$pdf->SetXY(68,$y1);
	$pdf->MultiCell(48,2,$origen_del_gasto,0,'L',0);

	$pdf->SetXY(116,$y);
	$pdf->Cell(37,6,"",1,'L',1);
	$pdf->SetXY(116,$y1);
	$pdf->MultiCell(37,2,$clave_act . ' ' .$actividad,0,'L',0);

	$pdf->SetXY(153,$y);
	$pdf->Cell(7,6,"",1,'C',1);
	$pdf->SetXY(153,$y1);
	$pdf->MultiCell(7,2,$cantidad,0,'C',0);

	$pdf->SetXY(160,$y);
	$pdf->Cell(17,6,"",1,'C',1);
	$pdf->SetXY(160,$y1);
	$pdf->MultiCell(17,2,$unidad,0,'C',0);

	$pdf->SetXY(177,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(177,$y1);
	$pdf->MultiCell(12,2,number_format($enero6,2),0,'C',0);

	$pdf->SetXY(189,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(189,$y1);
	$pdf->MultiCell(12,2,number_format($febrero6,2),0,'C',0);

	$pdf->SetXY(201,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(201,$y1);
	$pdf->MultiCell(12,2,number_format($marzo6,2),0,'C',0);

	$pdf->SetXY(213,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(213,$y1);
	$pdf->MultiCell(12,2,number_format($abril6,2),0,'C',0);

	$pdf->SetXY(225,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(225,$y1);
	$pdf->MultiCell(12,2,number_format($mayo6,2),0,'C',0);

	$pdf->SetXY(237,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(237,$y1);
	$pdf->MultiCell(12,2,number_format($junio6,2),0,'C',0);

	$pdf->SetXY(249,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(249,$y1);
	$pdf->MultiCell(12,2,number_format($julio6,2),0,'C',0);

	$pdf->SetXY(261,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(261,$y1);
	$pdf->MultiCell(12,2,number_format($agosto6,2),0,'C',0);

	$pdf->SetXY(273,$y);
	$pdf->Cell(14,6,"",1,'C',1);
	$pdf->SetXY(273,$y1);
	$pdf->MultiCell(14,2,number_format($septiembre6,2),0,'C',0);

	$pdf->SetXY(287,$y);
	$pdf->Cell(14,6,"",1,'C',1);
	$pdf->SetXY(287,$y1);
	$pdf->MultiCell(14,2,number_format($octubre6,2),0,'C',0);

	$pdf->SetXY(301,$y);
	$pdf->Cell(14,6,"",1,'C',1);
	$pdf->SetXY(301,$y1);
	$pdf->MultiCell(14,2,number_format($noviembre6,2),0,'C',0);

	$pdf->SetXY(315,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(315,$y1);
	$pdf->MultiCell(12,2,number_format($diciembre6,2),0,'C',0);

	$pdf->SetXY(327,$y);
	$pdf->Cell(12,6,"",1,'C',1);
	$pdf->SetXY(327,$y1);
	$pdf->MultiCell(12,2,number_format($total_gastoo6,2),0,'C',0);

	$y=$y+6;
	$y1=$y+.5;

	$genero_6 += $enero6;
	$gfebrero_6+=$febrero6;
	$gmarzo_6+=$marzo6;
	$gabril_6+=$abril6;
	$gmayo_6+=$mayo6;
	$gjunio_6+=$junio6;
	$gjulio_6+=$julio6;
	$gagosto_6+=$agosto6;
	$gseptiembre_6+=$septiembre6;
	$goctubre_6+=$octubre6;
	$gnoviembre_6+=$noviembre6;
	$gdiciembre_6+=$diciembre6;
	$gingretot_6+=$total_gastoo6;

				if($y>=190)
				{
					$y=0;
					$y=25;
					$pdf->AliasNbPages();
					$pdf->AddPage('L','Legal');
				}

				}


	//$y=$y+4;
	$val=1;
	$pdf->SetFillColor(255,255,255); //color celda
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(51,51,51);
	$pdf->SetFont('Arial','',4);


	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,4,$y,1,'L',$val);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(48,4,"",1,'L',$val);

	$pdf->SetXY(116,$y);
	$pdf->MultiCell(37,4,"",1,'L',$val);

	$pdf->SetXY(153,$y);
	$pdf->MultiCell(7,4,"",1,'C',$val);

	$pdf->SetXY(160,$y);
	$pdf->MultiCell(17,4,"",1,'C',$val);

	$pdf->SetXY(177,$y);
	$pdf->MultiCell(12,4,number_format($genero_6,2),1,'C',$val);

	$pdf->SetXY(189,$y);
	$pdf->MultiCell(12,4,number_format($gfebrero_6,2),1,'C',$val);

	$pdf->SetXY(201,$y);
	$pdf->MultiCell(12,4,number_format($gmarzo_6,2),1,'C',$val);

	$pdf->SetXY(213,$y);
	$pdf->MultiCell(12,4,number_format($gabril_6,2),1,'C',$val);

	$pdf->SetXY(225,$y);
	$pdf->MultiCell(12,4,number_format($gmayo_6,2),1,'C',$val);

	$pdf->SetXY(237,$y);
	$pdf->MultiCell(12,4,number_format($gjunio_6,2),1,'C',$val);

	$pdf->SetXY(249,$y);
	$pdf->MultiCell(12,4,number_format($gjulio_6,2),1,'C',$val);

	$pdf->SetXY(261,$y);
	$pdf->MultiCell(12,4,number_format($gagosto_6,2),1,'C',$val);

	$pdf->SetXY(273,$y);
	$pdf->MultiCell(14,4,number_format($gseptiembre_6,2),1,'C',$val);

	$pdf->SetXY(287,$y);
	$pdf->MultiCell(14,4,number_format($goctubre_6,2),1,'C',$val);

	$pdf->SetXY(301,$y);
	$pdf->MultiCell(14,4,number_format($gnoviembre_6,2),1,'C',$val);

	$pdf->SetXY(315,$y);
	$pdf->MultiCell(12,4,number_format($gdiciembre_6,2),1,'C',$val);

	$pdf->SetXY(327,$y);
	$pdf->MultiCell(12,4,number_format($gingretot_6,2),1,'C',$val);
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);


	/***************************************************** TERMINA INVERSION PUBLICA *********************************************************/



	//$pdf->AliasNbPages();
	//$pdf->AddPage('L','Legal');

	$pdf->AliasNbPages();
	$pdf->AddPage('L','Legal');
	$pdf->SetFont('Times','',12);
	//for($i=1;$i<=40;$i++)
	    //$pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);

		$result=mysql_query("select desc_uops, desc_del from cat_delegaciones where clave=$clave", $connect);

		$totalregistros=mysql_num_rows($result);
		//se recogen las consultas en un array y se muestran

			while($row=mysql_fetch_array($result))
			{
			$desc_uops=$row['desc_uops'];
			$desc_del=$row['desc_del'];
			}



	$y=23;
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,"DELEGACION: " . $desc_del,0,'L');
	$y=$y+5;
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,"UNIDAD OPERATIVA: " . $desc_uops,0,'L');

	$y=$y+10;
	$pdf->SetXY(5,$y);


	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,".: TOTAL GASTO :.",0,'L');

	$pdf->SetFont('Arial','B',8);
	$y=$y+5;
	$y1=$y+4;

	$pdf->SetFillColor(0,0,0); //color celda
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(51,51,51);

	$pdf->SetXY(5,$y);
	$pdf->MultiCell(83,4,"CAPITULO",1,'C',1);

	$pdf->SetXY(88,$y);
	$pdf->MultiCell(40,4,"GASTO",1,'C',1);

	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);
	/**resultados**/
	$pdf->SetFont('Arial','',8);
	$y=$y+4;
	$y1=$y+.5;
	$pdf->SetXY(5,$y);
	$pdf->Cell(83,4,"",1,'L',1);
	$pdf->SetXY(5,$y1);
	$pdf->MultiCell(83,4,"1. SERVICIOS PERSONALES",0,'L',0);
	$pdf->SetXY(88,$y);
	$pdf->Cell(40,4,"",1,'L',1);
	$pdf->SetXY(88,$y1);
	$totsp=$gingretot+$gingretot1+$gingretotp_1;
	$pdf->MultiCell(40,4,number_format($totsp,2),0,'R',0);

	$y=$y+4;
	$y1=$y+.5;
	$pdf->SetXY(5,$y);
	$pdf->Cell(83,4,"",1,'L',1);
	$pdf->SetXY(5,$y1);
	$pdf->MultiCell(83,4,"2. BIENES DE CONSUMO",0,'L',0);
	$pdf->SetXY(88,$y);
	$pdf->Cell(40,4,"",1,'L',1);
	$pdf->SetXY(88,$y1);
	$pdf->MultiCell(40,4,number_format($gingretot_1,2),0,'R',0);

	$y=$y+4;
	$y1=$y+.5;
	$pdf->SetXY(5,$y);
	$pdf->Cell(83,4,"",1,'L',1);
	$pdf->SetXY(5,$y1);
	$pdf->MultiCell(83,4,"3. SERVICIOS GENERALES",0,'L',0);
	$pdf->SetXY(88,$y);
	$pdf->Cell(40,4,"",1,'L',1);
	$pdf->SetXY(88,$y1);
	$pdf->MultiCell(40,4,number_format($gingretot_3,2),0,'R',0);


	$y=$y+4;
	$y1=$y+.5;
	$pdf->SetXY(5,$y);
	$pdf->Cell(83,4,"",1,'L',1);
	$pdf->SetXY(5,$y1);
	$pdf->MultiCell(83,4,"4. AYUDAS SOCIALES",0,'L',0);
	$pdf->SetXY(88,$y);
	$pdf->Cell(40,4,"",1,'L',1);
	$pdf->SetXY(88,$y1);
	$pdf->MultiCell(40,4,number_format($gingretot_2,2),0,'R',0);

	$y=$y+4;
	$y1=$y+.5;
	$pdf->SetXY(5,$y);
	$pdf->Cell(83,4,"",1,'L',1);
	$pdf->SetXY(5,$y1);
	$pdf->MultiCell(83,4,"5. INVERSION FISICA",0,'L',0);
	$pdf->SetXY(88,$y);
	$pdf->Cell(40,4,"",1,'L',1);
	$pdf->SetXY(88,$y1);
	$pdf->MultiCell(40,4,number_format($gingretot_5,2),0,'R',0);

	$y=$y+4;
	$y1=$y+.5;
	$pdf->SetXY(5,$y);
	$pdf->Cell(83,4,"",1,'L',1);
	$pdf->SetXY(5,$y1);
	$pdf->MultiCell(83,4,"6. OBRA PUBLICA",0,'L',0);
	$pdf->SetXY(88,$y);
	$pdf->Cell(40,4,"",1,'L',1);
	$pdf->SetXY(88,$y1);
	$pdf->MultiCell(40,4,number_format($gingretot_6,2),0,'R',0);

	$y=$y+4;
	$y1=$y+.5;

	$val=1;
	$pdf->SetFillColor(255,255,255); //color celda
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(51,51,51);
	$pdf->SetFont('Arial','B',8);

	$ggtotal = $gingretot + $gingretot1 + $gingretot_1 + $gingretot_2 + $gingretot_3 + $gingretot_5 + $gingretot_6 + $gingretotp_1;


	$pdf->SetXY(5,$y);
	$pdf->MultiCell(83,4,"TOTAL: ",1,'R',$val);
	$pdf->SetXY(88,$y);
	$pdf->MultiCell(40,4,number_format($ggtotal,2),1,'R',$val);


	$y=$y+100;
	$y1=$y+.5;
	$y2=$y-1;

				$clacon=substr($clave,0,2);


				$resultj=mysql_query("SELECT nombre_1,email_1,nombre_2,email_2,nombre_3,email_3 FROM jefes_mail WHERE clave like '$clacon%'", $connect);
				$totalregistros=mysql_num_rows($resultj);
				while($row=mysql_fetch_array($resultj))
				{
					$nombre_1=$row['nombre_1'];
					$email_1=$row['email_1'];
					$nombre_2=$row['nombre_2'];
					$email_2=$row['email_2'];
					$nombre_3=$row['nombre_3'];
					$email_3=$row['email_3'];
				}


				$resultj=mysql_query("SELECT nombre, ape_pat, ape_mat FROM usuarios WHERE clave = '$clave' and activo = 1", $connect);
				$totalregistros=mysql_num_rows($resultj);
				while($row=mysql_fetch_array($resultj))
				{
					$nombre=$row['nombre'];
					$ape_pat=$row['ape_pat'];
					$ape_mat=$row['ape_mat'];
				}


	$pdf->SetFont('Arial','',10);

	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);

	$pdf->Line(35,$y2,125,$y2);
	$pdf->Line(231,$y2,321,$y2);
	$pdf->SetXY(21,$y);
	$pdf->MultiCell(118,5,"Director de la Unidad Operativa",0,'C',0);
	$pdf->SetXY(217,$y);
	$pdf->MultiCell(118,5,"Jefe de Cultura Fisica y Deporte",0,'C',0);
	$y=$y+5;
	$pdf->SetXY(21,$y);
	$pdf->MultiCell(118,5,$nombre." ". $ape_pat . " " . $ape_mat ,0,'C',0);
	$pdf->SetXY(217,$y);
	$pdf->MultiCell(118,5,$nombre_3,0,'C',0);






	/*TERMINA CONSULTA*/

	mysql_free_result($result);

	$pdf->Output();
?>