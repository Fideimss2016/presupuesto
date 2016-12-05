<?php
	session_start();

	$clave 	= $_SESSION["clave"];
	$clave1 = $_SESSION["clave"];

	require('fpdf/fpdf.php');
	require('rotation.php');
	include "clases/variablesbd.php";

	$connect = mysql_connect("$host","$user","$passworks");
	mysql_select_db("$dbname",$connect);

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
			$this->MultiCell(354,4,'PRESUPUESTO DE INGRESOS EJERCICIO 2017',0,'C');
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

	$pdf = new PDF('L','mm','Legal');
	$pdf->AliasNbPages();
	$pdf->AddPage('L','Legal');
	$pdf->SetFont('Times','',12);

	$result = mysql_query("select desc_uops, desc_del from cat_delegaciones where clave=$clave", $connect);
	$totalregistros = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
		$desc_uops 	= $row['desc_uops'];
		$desc_del 	= $row['desc_del'];
	}

	$y=23;
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,"DELEGACION: " . $desc_del,0,'L');
	$y=$y+5;
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,"UNIDAD OPERATIVA: " . $desc_uops,0,'L');
	$pdf->SetFont('Arial','',5);
	$y=$y+10;
	$y1=$y+4;

	$pdf->SetFillColor(0,0,0); //color celda
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(51,51,51);

	$pdf->SetXY(5,$y);
	$pdf->MultiCell(10,8,"CLAVE",1,'C',1);
	$pdf->SetXY(15,$y);
	$pdf->MultiCell(37,8,"ACTIVIDAD",1,'C',1);
	$pdf->SetXY(52,$y);
	$pdf->MultiCell(16,4,"CUOTA",1,'C',1);
	$pdf->SetXY(52,$y1);
	$pdf->MultiCell(8,4,"DH",1,'C',1);
	$pdf->SetXY(60,$y1);
	$pdf->MultiCell(8,4,"NDH",1,'C',1);
	$pdf->SetXY(68,$y);

	$pdf->MultiCell(24,4,"ENERO",1,'C',1);
	$pdf->SetXY(68,$y1);
	$pdf->MultiCell(12,4,"Ingreso",1,'R',1);
	$pdf->SetXY(80,$y1);
	$pdf->MultiCell(6,4,"DH",1,'C',1);
	$pdf->SetXY(86,$y1);
	$pdf->MultiCell(6,4,"NDH",1,'C',1);
	$pdf->SetXY(92,$y);

	$pdf->MultiCell(24,4,"FEBRERO",1,'C',1);
	$pdf->SetXY(92,$y1);
	$pdf->MultiCell(12,4,"Ingreso",1,'C',1);
	$pdf->SetXY(104,$y1);
	$pdf->MultiCell(6,4,"DH",1,'C',1);
	$pdf->SetXY(110,$y1);
	$pdf->MultiCell(6,4,"NDH",1,'C',1);

	$pdf->SetXY(116,$y);
	$pdf->MultiCell(24,4,"MARZO",1,'C',1);
	$pdf->SetXY(116,$y1);
	$pdf->MultiCell(12,4,"Ingreso",1,'C',1);
	$pdf->SetXY(128,$y1);
	$pdf->MultiCell(6,4,"DH",1,'C',1);
	$pdf->SetXY(134,$y1);
	$pdf->MultiCell(6,4,"NDH",1,'C',1);

	$pdf->SetXY(140,$y);
	$pdf->MultiCell(24,4,"ABRIL",1,'C',1);
	$pdf->SetXY(140,$y1);
	$pdf->MultiCell(12,4,"Ingreso",1,'C',1);
	$pdf->SetXY(152,$y1);
	$pdf->MultiCell(6,4,"DH",1,'C',1);
	$pdf->SetXY(158,$y1);
	$pdf->MultiCell(6,4,"NDH",1,'C',1);

	$pdf->SetXY(164,$y);
	$pdf->MultiCell(24,4,"MAYO",1,'C',1);
	$pdf->SetXY(164,$y1);
	$pdf->MultiCell(12,4,"Ingreso",1,'C',1);
	$pdf->SetXY(176,$y1);
	$pdf->MultiCell(6,4,"DH",1,'C',1);
	$pdf->SetXY(182,$y1);
	$pdf->MultiCell(6,4,"NDH",1,'C',1);

	$pdf->SetXY(188,$y);
	$pdf->MultiCell(24,4,"JUNIO",1,'C',1);
	$pdf->SetXY(188,$y1);
	$pdf->MultiCell(12,4,"Ingreso",1,'C',1);
	$pdf->SetXY(200,$y1);
	$pdf->MultiCell(6,4,"DH",1,'C',1);
	$pdf->SetXY(206,$y1);
	$pdf->MultiCell(6,4,"NDH",1,'C',1);

	$pdf->SetXY(212,$y);
	$pdf->MultiCell(24,4,"JULIO",1,'C',1);
	$pdf->SetXY(212,$y1);
	$pdf->MultiCell(12,4,"Ingreso",1,'C',1);
	$pdf->SetXY(224,$y1);
	$pdf->MultiCell(6,4,"DH",1,'C',1);
	$pdf->SetXY(230,$y1);
	$pdf->MultiCell(6,4,"NDH",1,'C',1);

	$pdf->SetXY(236,$y);
	$pdf->MultiCell(24,4,"AGOSTO",1,'C',1);
	$pdf->SetXY(236,$y1);
	$pdf->MultiCell(12,4,"Ingreso",1,'C',1);
	$pdf->SetXY(248,$y1);
	$pdf->MultiCell(6,4,"DH",1,'C',1);
	$pdf->SetXY(254,$y1);
	$pdf->MultiCell(6,4,"NDH",1,'C',1);

	$pdf->SetXY(260,$y);
	$pdf->MultiCell(24,4,"SEPTIEMBRE",1,'C',1);
	$pdf->SetXY(260,$y1);
	$pdf->MultiCell(12,4,"Ingreso",1,'C',1);
	$pdf->SetXY(272,$y1);
	$pdf->MultiCell(6,4,"DH",1,'C',1);
	$pdf->SetXY(278,$y1);
	$pdf->MultiCell(6,4,"NDH",1,'C',1);

	$pdf->SetXY(284,$y);
	$pdf->MultiCell(24,4,"OCTUBRE",1,'C',1);
	$pdf->SetXY(284,$y1);
	$pdf->MultiCell(12,4,"Ingreso",1,'C',1);
	$pdf->SetXY(296,$y1);
	$pdf->MultiCell(6,4,"DH",1,'C',1);
	$pdf->SetXY(302,$y1);
	$pdf->MultiCell(6,4,"NDH",1,'C',1);

	$pdf->SetXY(308,$y);
	$pdf->MultiCell(24,4,"NOVIEMBRE",1,'C',1);
	$pdf->SetXY(308,$y1);
	$pdf->MultiCell(12,4,"Ingreso",1,'C',1);
	$pdf->SetXY(320,$y1);
	$pdf->MultiCell(6,4,"DH",1,'C',1);
	$pdf->SetXY(326,$y1);
	$pdf->MultiCell(6,4,"NDH",1,'C',1);

	$pdf->SetXY(332,$y);
	$pdf->MultiCell(22,4,"DICIEMBRE",1,'C',1);
	$pdf->SetXY(332,$y1);
	$pdf->MultiCell(10,4,"Ingreso",1,'C',1);
	$pdf->SetXY(342,$y1);
	$pdf->MultiCell(6,4,"DH",1,'C',1);
	$pdf->SetXY(348,$y1);
	$pdf->MultiCell(6,4,"NDH",1,'C',1);

	/*CONSULTA*/
	$colorfila 	= 0;
	$y 	= $y + 4;

	$result = mysql_query("select i.id_conse_ing, i.clave_act, i.id_tipo_pago, i.id_tipo_curso, i.fecha_ini, i.fecha_fin, i.cta_der, i.cta_noder, 
	(i.enero+i.febrero+i.marzo+i.abril+i.mayo+i.junio+i.julio+i.agosto+i.septiembre+i.octubre+i.noviembre+i.diciembre) as ingretot,
	(i.dh1+i.dh2+i.dh3+i.dh4+i.dh5+i.dh6+i.dh7+i.dh8+i.dh9+i.dh10+i.dh11+i.dh12) as totdh,
	(i.ndh1+i.ndh2+i.ndh3+i.ndh4+i.ndh5+i.ndh6+i.ndh7+i.ndh8+i.ndh9+i.ndh10+i.ndh11+i.ndh12) as totndh, i.enero, i.febrero, i.marzo, i.abril, i.mayo, i.junio, i.julio, i.agosto, i.septiembre, i.octubre, 
	i.noviembre, i.diciembre, i.dh1, i.dh2, i.dh3, i.dh4, i.dh5, i.dh6, i.dh7, i.dh8, i.dh9, i.dh10, i.dh11, i.dh12, i.ndh1, i.ndh2, i.ndh3, i.ndh4, i.ndh5, i.ndh6, i.ndh7, i.ndh8, i.ndh9, i.ndh10, 
	i.ndh11, i.ndh12, ci.clave_act as clact, ci.actividad, cti.desc_tipo_pago, ctc.desc_tipo_curso from ingresos i, cat_actividades_i ci, cat_tipo_pago_i cti, cat_tipo_curso_i ctc where clave=$clave and 
	ci.conse_act=i.conse_act and cti.id_tipo_pago=i.id_tipo_pago and ctc.id_tipo_curso=i.id_tipo_curso", $connect);
	
	$colorfila 	= 0;
	$totalregistros = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
		$id_conse_ing 		= $row['id_conse_ing'];
		$clave_act 			= $row['clave_act'];
		$id_tipo_pago 		= $row['id_tipo_pago'];
		$id_tipo_curso 		= $row['id_tipo_curso'];
		$fecha_ini 			= $row['fecha_ini'];
		$fecha_fin 			= $row['fecha_fin'];
		$cta_der 			= $row['cta_der'];
		$cta_noder 			= $row['cta_noder'];
		$ingretot 			= $row['ingretot'];
		$totdh 				= $row['totdh'];
		$totndh 			= $row['totndh'];
		$clact 				= $row['clact'];
		$actividad 			= $row['actividad'];
		$desc_tipo_pago 	= $row['desc_tipo_pago'];
		$desc_tipo_curso 	= $row['desc_tipo_curso'];
		$enero 				= $row['enero'];
		$febrero 			= $row['febrero'];
		$marzo 				= $row['marzo'];
		$abril 				= $row['abril'];
		$mayo 				= $row['mayo'];
		$junio 				= $row['junio'];
		$julio 				= $row['julio'];
		$agosto 			= $row['agosto'];
		$septiembre 		= $row['septiembre'];
		$octubre 			= $row['octubre'];
		$noviembre 			= $row['noviembre'];
		$diciembre 			= $row['diciembre'];
		$ndh1 				= $row['ndh1'];
		$ndh2 				= $row['ndh2'];
		$ndh3 				= $row['ndh3'];
		$ndh4 				= $row['ndh4'];
		$ndh5 				= $row['ndh5'];
		$ndh6 				= $row['ndh6'];
		$ndh7 				= $row['ndh7'];
		$ndh8 				= $row['ndh8'];
		$ndh9 				= $row['ndh9'];
		$ndh10 				= $row['ndh10'];
		$ndh11 				= $row['ndh11'];
		$ndh12 				= $row['ndh12'];
		$dh1 				= $row['dh1'];
		$dh2 				= $row['dh2'];
		$dh3 				= $row['dh3'];
		$dh4 				= $row['dh4'];
		$dh5 				= $row['dh5'];
		$dh6 				= $row['dh6'];
		$dh7 				= $row['dh7'];
		$dh8 				= $row['dh8'];
		$dh9 				= $row['dh9'];
		$dh10 				= $row['dh10'];
		$dh11 				= $row['dh11'];
		$dh12 				= $row['dh12'];

		if ($colorfila == 0)
		{
			$pdf->SetFillColor(255,255,255);
			$colorfila 	= 1;
			$val 		= 0;
		}
		else
		{
			$pdf->SetFillColor(239,239,239);
			$colorfila 	= 0;
			$val 		= 1;
		}

		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(0,0,0);
		$pdf->SetFont('Arial','',4);

		$y=$y+4;
		$pdf->SetXY(5,$y);
		$pdf->MultiCell(10,4,$clact,1,'C',$val);
		$pdf->SetXY(15,$y);
		$pdf->MultiCell(37,4,$actividad,1,'C',$val);
		$pdf->SetXY(52,$y);
		$pdf->MultiCell(8,4,number_format($cta_der,2),1,'C',$val);
		$pdf->SetXY(60,$y);
		$pdf->MultiCell(8,4,number_format($cta_noder,2),1,'C',$val);
		$pdf->SetXY(68,$y);

		$pdf->MultiCell(12,4,number_format($enero,2),1,'R',$val);
		$pdf->SetXY(80,$y);
		$pdf->MultiCell(6,4,$dh1,1,'C',$val);
		$pdf->SetXY(86,$y);
		$pdf->MultiCell(6,4,$ndh1,1,'C',$val);
		$pdf->SetXY(92,$y);

		$pdf->MultiCell(12,4,number_format($febrero,2),1,'C',$val);
		$pdf->SetXY(104,$y);
		$pdf->MultiCell(6,4,$dh2,1,'C',$val);
		$pdf->SetXY(110,$y);
		$pdf->MultiCell(6,4,$ndh2,1,'C',$val);

		$pdf->SetXY(116,$y);
		$pdf->MultiCell(12,4,number_format($marzo,2),1,'C',$val);
		$pdf->SetXY(128,$y);
		$pdf->MultiCell(6,4,$dh3,1,'C',$val);
		$pdf->SetXY(134,$y);
		$pdf->MultiCell(6,4,$ndh3,1,'C',$val);

		$pdf->SetXY(140,$y);
		$pdf->MultiCell(12,4,number_format($abril,2),1,'C',$val);
		$pdf->SetXY(152,$y);
		$pdf->MultiCell(6,4,$dh4,1,'C',$val);
		$pdf->SetXY(158,$y);
		$pdf->MultiCell(6,4,$ndh4,1,'C',$val);

		$pdf->SetXY(164,$y);
		$pdf->MultiCell(12,4,number_format($mayo,2),1,'C',$val);
		$pdf->SetXY(176,$y);
		$pdf->MultiCell(6,4,$dh5,1,'C',$val);
		$pdf->SetXY(182,$y);
		$pdf->MultiCell(6,4,$ndh5,1,'C',$val);

		$pdf->SetXY(188,$y);
		$pdf->MultiCell(12,4,number_format($junio,2),1,'C',$val);
		$pdf->SetXY(200,$y);
		$pdf->MultiCell(6,4,$dh6,1,'C',$val);
		$pdf->SetXY(206,$y);
		$pdf->MultiCell(6,4,$ndh6,1,'C',$val);

		$pdf->SetXY(212,$y);
		$pdf->MultiCell(12,4,number_format($julio,2),1,'C',$val);
		$pdf->SetXY(224,$y);
		$pdf->MultiCell(6,4,$dh7,1,'C',$val);
		$pdf->SetXY(230,$y);
		$pdf->MultiCell(6,4,$ndh7,1,'C',$val);

		$pdf->SetXY(236,$y);
		$pdf->MultiCell(12,4,number_format($agosto,2),1,'C',$val);
		$pdf->SetXY(248,$y);
		$pdf->MultiCell(6,4,$dh8,1,'C',$val);
		$pdf->SetXY(254,$y);
		$pdf->MultiCell(6,4,$ndh8,1,'C',$val);

		$pdf->SetXY(260,$y);
		$pdf->MultiCell(12,4,number_format($septiembre,2),1,'C',$val);
		$pdf->SetXY(272,$y);
		$pdf->MultiCell(6,4,$dh9,1,'C',$val);
		$pdf->SetXY(278,$y);
		$pdf->MultiCell(6,4,$ndh9,1,'C',$val);

		$pdf->SetXY(284,$y);
		$pdf->MultiCell(12,4,number_format($octubre,2),1,'C',$val);
		$pdf->SetXY(296,$y);
		$pdf->MultiCell(6,4,$dh10,1,'C',$val);
		$pdf->SetXY(302,$y);
		$pdf->MultiCell(6,4,$ndh10,1,'C',$val);

		$pdf->SetXY(308,$y);
		$pdf->MultiCell(12,4,number_format($noviembre,2),1,'C',$val);
		$pdf->SetXY(320,$y);
		$pdf->MultiCell(6,4,$dh11,1,'C',$val);
		$pdf->SetXY(326,$y);
		$pdf->MultiCell(6,4,$ndh11,1,'C',$val);

		$pdf->SetXY(332,$y);
		$pdf->MultiCell(10,4,number_format($diciembre,2),1,'C',$val);
		$pdf->SetXY(342,$y);
		$pdf->MultiCell(6,4,$dh12,1,'C',$val);
		$pdf->SetXY(348,$y);
		$pdf->MultiCell(6,4,$ndh12,1,'C',$val);

		$gtotdh 		+= $totdh;
		$gtotndh 		+= $totndh;
		$gdh1 			+= $dh1;
		$gndh1 			+= $ndh1;
		$gdh2 			+= $dh2;
		$gndh2 			+= $ndh2;
		$gdh3 			+= $dh3;
		$gndh3 			+= $ndh3;
		$gdh4 			+= $dh4;
		$gndh4 			+= $ndh4;
		$gdh5 			+= $dh5;
		$gndh5 			+= $ndh5;
		$gdh6 			+= $dh6;
		$gndh6 			+= $ndh6;
		$gdh7 			+= $dh7;
		$gndh7 			+= $ndh7;
		$gdh8 			+= $dh8;
		$gndh8 			+= $ndh8;
		$gdh9 			+= $dh9;
		$gndh9 			+= $ndh9;
		$gdh10 			+= $dh10;
		$gndh10 		+= $ndh10;
		$gdh11 			+= $dh11;
		$gndh11 		+= $ndh11;
		$gdh12 			+= $dh12;
		$gndh12 		+= $ndh12;
		$genero 		+= $enero;
		$gfebrero 		+= $febrero;
		$gmarzo 		+= $marzo;
		$gabril 		+= $abril;
		$gmayo 			+= $mayo;
		$gjunio 		+= $junio;
		$gjulio 		+= $julio;
		$gagosto 		+= $agosto;
		$gseptiembre 	+= $septiembre;
		$goctubre 		+= $octubre;
		$gnoviembre 	+= $noviembre;
		$gdiciembre 	+= $diciembre;
		$gingretot 		+= $ingretot;
	}//TERMINA WHILE

	$y=$y+4;

	$pdf->SetFillColor(0,0,0); //color celda
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(51,51,51);
	$pdf->SetFont('Arial','',5);

	$pdf->SetXY(52,$y);
	$pdf->MultiCell(16,4,"Totales",1,'R',1);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(12,4,number_format($genero,2),1,'R',1);
	$pdf->SetXY(80,$y);
	$pdf->MultiCell(6,4,$gdh1,1,'C',1);
	$pdf->SetXY(86,$y);
	$pdf->MultiCell(6,4,$gndh1,1,'C',1);

	$pdf->SetXY(92,$y);
	$pdf->MultiCell(12,4,number_format($gfebrero,2),1,'C',1);
	$pdf->SetXY(104,$y);
	$pdf->MultiCell(6,4,$gdh2,1,'C',1);
	$pdf->SetXY(110,$y);
	$pdf->MultiCell(6,4,$gndh2,1,'C',1);

	$pdf->SetXY(116,$y);
	$pdf->MultiCell(12,4,number_format($gmarzo,2),1,'C',1);
	$pdf->SetXY(128,$y);
	$pdf->MultiCell(6,4,$gdh3,1,'C',1);
	$pdf->SetXY(134,$y);
	$pdf->MultiCell(6,4,$gndh3,1,'C',1);

	$pdf->SetXY(140,$y);
	$pdf->MultiCell(12,4,number_format($gabril,2),1,'C',1);
	$pdf->SetXY(152,$y);
	$pdf->MultiCell(6,4,$gdh4,1,'C',1);
	$pdf->SetXY(158,$y);
	$pdf->MultiCell(6,4,$gndh4,1,'C',1);

	$pdf->SetXY(164,$y);
	$pdf->MultiCell(12,4,number_format($gmayo,2),1,'C',1);
	$pdf->SetXY(176,$y);
	$pdf->MultiCell(6,4,$gdh5,1,'C',1);
	$pdf->SetXY(182,$y);
	$pdf->MultiCell(6,4,$gndh5,1,'C',1);

	$pdf->SetXY(188,$y);
	$pdf->MultiCell(12,4,number_format($gjunio,2),1,'C',1);
	$pdf->SetXY(200,$y);
	$pdf->MultiCell(6,4,$gdh6,1,'C',1);
	$pdf->SetXY(206,$y);
	$pdf->MultiCell(6,4,$gndh6,1,'C',1);

	$pdf->SetXY(212,$y);
	$pdf->MultiCell(12,4,number_format($gjulio,2),1,'C',1);
	$pdf->SetXY(224,$y);
	$pdf->MultiCell(6,4,$gdh7,1,'C',1);
	$pdf->SetXY(230,$y);
	$pdf->MultiCell(6,4,$gndh7,1,'C',1);

	$pdf->SetXY(236,$y);
	$pdf->MultiCell(12,4,number_format($gagosto,2),1,'C',1);
	$pdf->SetXY(248,$y);
	$pdf->MultiCell(6,4,$gdh8,1,'C',1);
	$pdf->SetXY(254,$y);
	$pdf->MultiCell(6,4,$gndh8,1,'C',1);

	$pdf->SetXY(260,$y);
	$pdf->MultiCell(12,4,number_format($gseptiembre,2),1,'C',1);
	$pdf->SetXY(272,$y);
	$pdf->MultiCell(6,4,$gdh9,1,'C',1);
	$pdf->SetXY(278,$y);
	$pdf->MultiCell(6,4,$gndh9,1,'C',1);

	$pdf->SetXY(284,$y);
	$pdf->MultiCell(12,4,number_format($goctubre,2),1,'C',1);
	$pdf->SetXY(296,$y);
	$pdf->MultiCell(6,4,$gdh10,1,'C',1);
	$pdf->SetXY(302,$y);
	$pdf->MultiCell(6,4,$gndh10,1,'C',1);

	$pdf->SetXY(308,$y);
	$pdf->MultiCell(12,4,number_format($gnoviembre,2),1,'C',1);
	$pdf->SetXY(320,$y);
	$pdf->MultiCell(6,4,$gdh11,1,'C',1);
	$pdf->SetXY(326,$y);
	$pdf->MultiCell(6,4,$gndh11,1,'C',1);

	$pdf->SetXY(332,$y);
	$pdf->MultiCell(10,4,number_format($gdiciembre,2),1,'C',1);
	$pdf->SetXY(342,$y);
	$pdf->MultiCell(6,4,$gdh12,1,'C',1);
	$pdf->SetXY(348,$y);
	$pdf->MultiCell(6,4,$gndh12,1,'C',1);

	$y=$y+20;
	$y1=$y+4;

	$pdf->SetXY(5,$y);
	$pdf->MultiCell(10,8,"CLAVE",1,'C',1);
	$pdf->SetXY(15,$y);
	$pdf->MultiCell(37,8,"ACTIVIDAD",1,'C',1);
	$pdf->SetXY(52,$y);
	$pdf->MultiCell(40,8,"TIPO PAGO",1,'C',1);

	$pdf->SetXY(92,$y);
	$pdf->MultiCell(26,4,"USUARIOS TOTALES",1,'C',1);
	$pdf->SetXY(118,$y);
	$pdf->MultiCell(26,4,"INGRESO TOTAL",1,'C',1);
	$y=$y+4;
	$pdf->SetXY(92,$y);
	$pdf->MultiCell(13,4,"DH",1,'C',1);
	$pdf->SetXY(105,$y);
	$pdf->MultiCell(13,4,"NDH",1,'C',1);
	$pdf->SetXY(118,$y);
	$pdf->MultiCell(13,4,"POBLACION",1,'C',1);
	$pdf->SetXY(131,$y);
	$pdf->MultiCell(13,4,"INGRESO",1,'C',1);

	$pdf->SetFillColor(255,255,255); //color celda
	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);

	$y=$y+4;

	$result1 = mysql_query("select i.clave_act, i.fecha_ini, i.fecha_fin,
	(i.enero+i.febrero+i.marzo+i.abril+i.mayo+i.junio+i.julio+i.agosto+i.septiembre+i.octubre+i.noviembre+i.diciembre) as ingretot,
	(i.dh1+i.dh2+i.dh3+i.dh4+i.dh5+i.dh6+i.dh7+i.dh8+i.dh9+i.dh10+i.dh11+i.dh12) as totdh,
	(i.ndh1+i.ndh2+i.ndh3+i.ndh4+i.ndh5+i.ndh6+i.ndh7+i.ndh8+i.ndh9+i.ndh10+i.ndh11+i.ndh12) as totndh, ci.clave_act as clact, ci.actividad, ctp.desc_tipo_pago from ingresos i, cat_actividades_i ci, 
	cat_tipo_pago_i ctp where clave=$clave1 and ci.conse_act=i.conse_act and ctp.id_tipo_pago=i.id_tipo_pago", $connect);
	
	$colorfila = 0;
	$totalregistros = mysql_num_rows($result1);
	while($row = mysql_fetch_array($result1))
	{
		$clave_act 		= $row['clave_act'];
		$fecha_ini 		= $row['fecha_ini'];
		$fecha_fin 		= $row['fecha_fin'];
		$ingretot 		= $row['ingretot'];
		$totdh 			= $row['totdh'];
		$totndh 		= $row['totndh'];
		$clact 			= $row['clact'];
		$actividad 		= $row['actividad'];
		$desc_tipo_pago = $row['desc_tipo_pago'];

		$poblacion 		= $totdh + $totndh;

		if ($colorfila == 0)
		{
			$pdf->SetFillColor(255,255,255);
			$colorfila 	= 1;
			$val 		= 0;
		}
		else
		{
			$pdf->SetFillColor(239,239,239);
			$colorfila 	= 0;
			$val 		= 1;
		}

		$pdf->SetXY(5,$y);
		$pdf->MultiCell(10,4,$clact,1,'C',1);
		$pdf->SetXY(15,$y);
		$pdf->MultiCell(37,4,$actividad,1,'C',1);
		$pdf->SetXY(52,$y);
		$pdf->MultiCell(40,4,$desc_tipo_pago,1,'C',1);
		$pdf->SetXY(92,$y);
		$pdf->MultiCell(13,4,$totdh,1,'C',1);
		$pdf->SetXY(105,$y);
		$pdf->MultiCell(13,4,$totndh,1,'C',1);
		$pdf->SetXY(118,$y);
		$pdf->MultiCell(13,4,$poblacion,1,'C',1);
		$pdf->SetXY(131,$y);
		$pdf->MultiCell(13,4,$ingretot,1,'C',1);
		$y 	= $y + 4;

		$gtotdh 	+= $totdh;
		$gtotndh 	+= $totndh;
		$gpoblacion += $poblacion;
		$gingretot 	+= $ingretot;
	}

	$pdf->SetFillColor(0,0,0); //color celda
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(51,51,51);
	$pdf->SetFont('Arial','',5);

	$pdf->SetXY(5,$y);
	$pdf->MultiCell(87,4,"Totales",1,'R',1);
	$pdf->SetXY(92,$y);
	$pdf->MultiCell(13,4,$gtotdh,1,'C',1);
	$pdf->SetXY(105,$y);
	$pdf->MultiCell(13,4,$gtotndh,1,'C',1);
	$pdf->SetXY(118,$y);
	$pdf->MultiCell(13,4,$gpoblacion,1,'C',1);
	$pdf->SetXY(131,$y);
	$pdf->MultiCell(13,4,number_format($gingretot,2),1,'C',1);

	/*TERMINA CONSULTA*/
	mysql_free_result($result);
	$pdf->Output();
?>