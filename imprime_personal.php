<?php
	session_start();

	$clave 			= $_SESSION["clave"];
	$clave1 		= $_SESSION["clave"];
	$usuario 		= $_SESSION["usu"];

	$valcolor 		= 0;
	$colorfila 		= 0;
	$ghonorarios 	= 0;
	$giva 			= 0;
	$gsubtotal 		= 0;
	$gretisr 		= 0;
	$gretiva 		= 0;
	$gneto 			= 0;
	$ganual 		= 0;

	require('fpdf/fpdf.php');
	require('rotation.php');

	include "clases/variablesbd.php";

	$connect = mysql_connect("$host","$user","$passworks");
	mysql_select_db("$dbname",$connect);
	$result = mysql_query("select jefe_i, jefe_o, jefe_e, jefe_p from vobo where clave='$clave'", $connect);
	$totalregistros = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
		$jefe_i 	= $row['jefe_i'];
		$jefe_o 	= $row['jefe_o'];
		$jefe_e 	= $row['jefe_e'];
		$jefe_p 	= $row['jefe_p'];
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
				$this->MultiCell(290,4,'Fideicomiso para el Desarrollo del Deporte',0,'C');
				$y = 15;
				$this->SetXY(1,$y);
				$this->SetFont('Arial','B',10);
				$this->MultiCell(290,4,'PRESUPUESTO DE PERSONAL 2017',0,'C');
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
				$this->MultiCell(290,4,'Fideicomiso para el Desarrollo del Deporte',0,'C');
				$y = 15;
				$this->SetXY(1,$y);
				$this->SetFont('Arial','B',10);
				$this->MultiCell(290,4,'PRESUPUESTO DE PERSONAL EJERCICIO 2017',0,'C');
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

	$pdf = new PDF('L','mm','Letter');
	$pdf->AliasNbPages();
	$pdf->AddPage('L','Letter');
	$pdf->SetFont('Times','',12);

	$result = mysql_query("select desc_uops, desc_del from cat_delegaciones where clave=$clave", $connect);
	$totalregistros = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
		$desc_uops 	= $row['desc_uops'];
		$desc_del 	= $row['desc_del'];
	}

	$y 	= 23;
	$pdf->SetFont('Arial','B',10);
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,"DELEGACION: " . $desc_del,0,'L');
	$y 	= $y + 5;
	$pdf->SetXY(5,$y);
	$pdf->MultiCell(285,4,"UNIDAD OPERATIVA: " . $desc_uops,0,'L');
	$pdf->SetFont('Arial','',5);
	$y 	= $y + 10;
	$y1 = $y + 4;

	$pdf->SetFillColor(0,0,0); //color celda
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(51,51,51);

	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,4,"NOMBRE",1,'C',1);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(30,4,"CATEGORIA REQUERIDA",1,'C',1);

	$pdf->SetXY(98,$y);
	$pdf->MultiCell(37,4,"ACTIVIDAD",1,'C',1);

	$pdf->SetXY(135,$y);
	$pdf->MultiCell(17,4,"HONORARIOS",1,'C',1);

	$pdf->SetXY(152,$y);
	$pdf->MultiCell(17,4,"IVA",1,'C',1);

	$pdf->SetXY(169,$y);
	$pdf->MultiCell(17,4,"SUBTOTAL",1,'C',1);

	$pdf->SetXY(186,$y);
	$pdf->MultiCell(17,4,"RETENIDO ISR",1,'C',1);

	$pdf->SetXY(203,$y);
	$pdf->MultiCell(17,4,"RETENIDO IVA",1,'C',1);

	$pdf->SetXY(220,$y);
	$pdf->MultiCell(17,4,"TOTAL X MES",1,'C',1);

	$pdf->SetXY(237,$y);
	$pdf->MultiCell(17,4,"TOTAL ANUAL",1,'C',1);

	$pdf->SetXY(254,$y);
	$pdf->MultiCell(17,4,"CONTRATO",1,'C',1);

	/*PERSONAL*/
	$resultp = mysql_query("select p.id_conse_personal, p.clave_act, p.clave_par, p.cantidad, ci.actividad, cp.desc_par, p.conse_categoria, cc.desc_categoria, p.status, p.meses, p.nombre, p.ape_pat, p.ape_mat, cc.honorarios, cc.iva, cc.subtotal, cc.retisr, cc.retiva, cc.neto, p.gas_anual, p.cvr from personal p, cat_actividades_i ci, cat_partidas_e cp, cat_categoria cc where clave = '$clave' and ci.clave_act = p.clave_act and cp.clave_par = p.clave_par and cc.conse_categoria = p.conse_categoria order by clave_par, id_conse_personal", $connect);
	$totalregistros = mysql_num_rows($resultp);
	$valcolor = 0;
	while($row = mysql_fetch_array($resultp))
	{
		$id_conse_personal 	= $row['id_conse_personal'];
		$clave_act 			= $row['clave_act'];
		$clave_par 			= $row['clave_par'];
		$cantidad 			= $row['cantidad'];
		$actividad 			= $row['actividad'];
		$desc_par 			= $row['desc_par'];
		$desc_categoria 	= $row['desc_categoria'];
		$status 			= $row['status'];			
		$meses 				= $row['meses'];
		$nombre 			= $row['nombre'];
		$ape_pat 			= $row['ape_pat'];
		$ape_mat 			= $row['ape_mat'];			
		$honorarios 		= $row['honorarios'];
		$iva 				= $row['iva'];
		$subtotal 			= $row['subtotal'];
		$retisr 			= $row['retisr'];
		$retiva 			= $row['retiva'];
		$neto 				= $row['neto'];			
		$gas_anual 			= $row['gas_anual'];
		$cvr 				= $row['cvr'];

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
		$anual 	= $meses * $subtotal;
	
		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(0,0,0);
		/**resultados**/
		$pdf->SetFont('Arial','',5);
		$y 	= $y + 4;

		if($y >= 190)
		{
			$y 	= 0;
			$y 	= 25;
			$pdf->AliasNbPages();
			$pdf->AddPage('L','Letter');
		}

		$pdf->SetXY(5,$y);
		$pdf->MultiCell(63,4,$nombre . ' ' .$ape_pat . ' ' . $ape_mat,1,'L',$val);

		$pdf->SetXY(68,$y);
		$pdf->MultiCell(30,4,$desc_categoria,1,'L',$val);

		$pdf->SetXY(98,$y);
		$pdf->MultiCell(37,2,$clave_act . ' ' .$actividad,1,'L',$val);

		$pdf->SetXY(135,$y);
		$pdf->MultiCell(17,4,number_format($honorarios,2),1,'C',$val);

		$pdf->SetXY(152,$y);
		$pdf->MultiCell(17,4,number_format($iva,2),1,'C',$val);

		$pdf->SetXY(169,$y);
		$pdf->MultiCell(17,4,number_format($subtotal,2),1,'C',$val);

		$pdf->SetXY(186,$y);
		$pdf->MultiCell(17,4,number_format($retisr,2),1,'C',$val);

		$pdf->SetXY(203,$y);
		$pdf->MultiCell(17,4,number_format($retiva,2),1,'C',$val);

		$pdf->SetXY(220,$y);
		$pdf->MultiCell(17,4,number_format($neto,2),1,'C',$val);

		if($cvr == 1)
		{
			$pdf->SetXY(237,$y);
			$pdf->MultiCell(17,4,number_format($gas_anual,2),1,'C',$val);
			$anual 	= $gas_anual;
		}
		else
		{
			$pdf->SetXY(237,$y);
			$pdf->MultiCell(17,4,number_format($anual,2),1,'C',$val);
		}

		$pdf->SetXY(254,$y);
		$pdf->MultiCell(17,4,$meses . " Meses",1,'C',1);

		$ghonorarios 	+= $honorarios;
		$giva 			+= $iva;
		$gsubtotal 		+= $subtotal;
		$gretisr 		+= $retisr;
		$gretiva 		+= $retiva;
		$gneto 			+= $neto;
		$ganual 		+= $anual;
	}

	/*TERMINA PERSONAL*/

	$y 		= $y + 4;
	$val 	= 1;
	$pdf->SetFillColor(0,0,0); //color celda
	$pdf->SetTextColor(255,255,255);
	$pdf->SetDrawColor(51,51,51);
	$pdf->SetFont('Arial','',4);

	$pdf->SetXY(5,$y);
	$pdf->MultiCell(63,4,"",1,'L',$val);

	$pdf->SetXY(68,$y);
	$pdf->MultiCell(30,4,"",1,'L',$val);

	$pdf->SetXY(98,$y);
	$pdf->MultiCell(37,4,"",1,'L',$val);

	$pdf->SetXY(135,$y);
	$pdf->MultiCell(17,4,number_format($ghonorarios,2),1,'C',$val);

	$pdf->SetXY(152,$y);
	$pdf->MultiCell(17,4,number_format($giva,2),1,'C',$val);

	$pdf->SetXY(169,$y);
	$pdf->MultiCell(17,4,number_format($gsubtotal,2),1,'C',$val);

	$pdf->SetXY(186,$y);
	$pdf->MultiCell(17,4,number_format($gretisr,2),1,'C',$val);

	$pdf->SetXY(203,$y);
	$pdf->MultiCell(17,4,number_format($gretiva,2),1,'C',$val);

	$pdf->SetXY(220,$y);
	$pdf->MultiCell(17,4,number_format($gneto,2),1,'C',$val);

	$pdf->SetXY(237,$y);
	$pdf->MultiCell(17,4,number_format($ganual,2),1,'C',$val);

	$pdf->SetXY(254,$y);
	$pdf->MultiCell(17,4,"",1,'C',1);

	/*TERMINA CONSULTA*/

	$clacon 	= substr($clave,0,2);
	$resultj 	= mysql_query("SELECT nombre_1,email_1,nombre_2,email_2,nombre_3,email_3 FROM jefes_mail WHERE clave like '$clacon%'", $connect);
	$totalregistros = mysql_num_rows($resultj);
	while($row 	= mysql_fetch_array($resultj))
	{
		$nombre_1 	= $row['nombre_1'];
		$email_1 	= $row['email_1'];
		$nombre_2 	= $row['nombre_2'];
		$email_2 	= $row['email_2'];
		$nombre_3 	= $row['nombre_3'];
		$email_3 	= $row['email_3'];
	}

	$resultj 	= mysql_query("SELECT nombre, ape_pat, ape_mat FROM usuarios WHERE clave = '$clave' and activo = 1", $connect);
	$totalregistros = mysql_num_rows($resultj);
	while($row 	= mysql_fetch_array($resultj))
	{
		$nombre_dir 	= $row['nombre'];
		$ape_pat_dir 	= $row['ape_pat'];
		$ape_mat_dir 	= $row['ape_mat'];
	}

	$y 		= $y + 30;
	$y1 	= $y + .5;
	$y2 	= $y - 1;
	$pdf->SetFont('Arial','',10);

	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);

	$pdf->Line(25,$y2,115,$y2);
	$pdf->Line(160,$y2,250,$y2);
	$pdf->SetXY(11,$y);
	$pdf->MultiCell(118,5,"Director de la Unidad Operativa",0,'C',0);
	$pdf->SetXY(145,$y);
	$pdf->MultiCell(118,5,"Jefe de Cultura Fisica y Deporte",0,'C',0);
	$y 	= $y + 5;
	$pdf->SetXY(11,$y);
	$pdf->MultiCell(118,5,$nombre_dir." ". $ape_pat_dir." ".$ape_mat_dir,0,'C',0);
	$pdf->SetXY(145,$y);
	$pdf->MultiCell(118,5,$nombre_3,0,'C',0);

	mysql_free_result($result);

	$pdf->Output();
?>