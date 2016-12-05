<?php
	session_start();

	if(isset($_SESSION['clave']))
	{
		$clave = $_SESSION["clave"];
	}

	require('fpdf/fpdf.php');
	require('rotation.php');
	include "clases/variablesbd.php";

	$connect = mysql_connect($host,"$user","$passworks");
	mysql_select_db("$dbname",$connect);
	$result = mysql_query("select jefe_i, jefe_o, jefe_e, jefe_p from vobo where clave='$clave'", $connect);
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
				// Movernos a la derecha
				// Título
				$this->SetXY(1,5);
				$this->MultiCell(290,4,'Fideicomiso para el Desarrollo del Deporte',0,'C');
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
			//function Header($titulo)
			function Header()
			{
				// Logo
				$this->Image('cabeza2.jpg',5,1,40,18);
				// Arial bold 15
				$this->SetFont('Arial','B',20);
				// Movernos a la derecha

				// Título
				$this->SetXY(1,5);
				$this->MultiCell(277,4,'Fideicomiso para el Desarrollo del Deporte',0,'C');
				$y=15;
				$this->SetXY(1,$y);
				$this->SetFont('Arial','B',10);

				//$this->MultiCell(277, 4, 'ESTUDIO COSTO OPERACION ');
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
					
	$result = mysql_query("select desc_uops, desc_del from cat_delegaciones where clave = '$clave'", $connect);
	$totalregistros = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
		$desc_uops = $row['desc_uops'];
		$desc_del = $row['desc_del'];
	}
	/*
	$result = mysql_query("select o.id_conse_obra,o.id_proyecto,o.monto,o.clave_par, cpo.desc_proyecto, cpe.desc_par,o.problematica, o.objetivo, o.beneficios, o.status,o.c1,o.c2,o.c3,o.c4,o.c5,o.c6,o.componentes,o.anio_fiso,o.cantidad,o.unidad
				from obras o, cat_proyectos_o cpo, cat_partidas_e cpe
				where clave='$clave' and cpo.id_proyecto=o.id_proyecto and cpe.clave_par=o.clave_par order by id_conse_obra", $connect);
	*/
	/*
	$result = mysql_query("select o.id_conse_obra, o.monto, o.clave_par, o.observaciones as desc_proyecto, p.desc_par, b.beneficio as beneficios, o.status, o.c1, o.c2, o.c3, o.c4, o.c5, o.c6, o.anio_fiso, o.unidad, 
		o.cantidad from obras o, cat_partidas_e p, cat_beneficios b where o.clave = '$clave' and p.conse_partidas = o.tipo_proyecto_id and b.beneficio_id = o.beneficio_id and o.activo = 1 order by o.clave_par", $connect);
	$totalregistros = mysql_num_rows($result);
	*/
	$valcolor = 0;

	$result = mysql_query("select d.desc_del, d.desc_uops, p.desc_par, o.clave_par, g.tipo_gasto, e.tipo_equipo_requerido_trabajo, o.observaciones as descripcion, o.clave_act, o.actividad_id,
		o.cantidad, o.unidad, o.monto, b.beneficio, o.periodo, ca.actividad as curso, o.num_grupos, o.usuarios_grupo, o.total_usuarios, o.total_cursos, o.ingresos_inscripcion, 
		o.cuotas_recuperacion, o.uso_espacio, o.total_ingresos from obras o left join cat_delegaciones d on d.clave = o.clave left join cat_partidas_e p on p.clave_par = o.clave_par
		left join cat_tipo_gasto g on g.tipo_gasto_id = o.tipo_gasto_id left join cat_tipo_equipo_requerido_trabajos e on e.tipo_equipo_id = o.tipo_equipo_id left join 
		cat_beneficios b on b.beneficio_id = o.beneficio_id left join cat_actividades_i ca on ca.conse_act = o.curso_id where o.clave = '$clave' order by o.clave, o.clave_par", $connect);
	$totalregs = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
/*
		$result1 = mysql_query("select desc_par from cat_partidas_e where clave_par = '$clavepar'", $connect);
		$totalregistros = mysql_num_rows($result1);
		while ($row1 = mysql_fetch_array($result1))
		{
			$desc_par = htmlentities($row1['desc_par']);
		}
		echo strtoupper(htmlentities($desc_par));
*/
		$desc_del = $row['desc_del'];
		$desc_uops = $row['desc_uops'];
		$desc_par = $row['desc_par'];
		$clave_par = $row['clave_par'];
		$tipo_gasto = $row['tipo_gasto'];
		$tipo_equipo = $row['tipo_equipo_requerido_trabajo'];
		//$actividad = $row['actividad'];
		$clave_act = $row['clave_act'];
		$actividad_id = $row['actividad_id'];
		$descripcion = $row['descripcion'];
		$cantidad = $row['cantidad'];
		$unidad = $row['unidad'];
		$monto = $row['monto'];
		$beneficio = $row['beneficio'];
		$periodo = $row['periodo'];
		$curso = $row['curso'];
		$num_grupos = $row['num_grupos'];
		$usuarios_grupo = $row['usuarios_grupo'];
		$total_usuarios = $row['total_usuarios'];
		$total_cursos = $row['total_cursos'];
		$ingresos_inscripcion = $row['ingresos_inscripcion'];
		$cuotas_recuperacion = $row['cuotas_recuperacion'];
		$uso_espacio = $row['uso_espacio'];
		$total_ingresos = $row['total_ingresos'];

		$pdf->AddPage('L','Letter');
		$pdf->SetFont('Arial','B',12);

		$y = 15;
		$pdf->SetXY(5, $y);
		$pdf->MultiCell(280,4,"ESTUDIO COSTO OPERACION",0,'C');
		$y = $y + 4;

		$pdf->SetXY(5,$y);
		$pdf->MultiCell(280,4,strtoupper($desc_par),0,'C');

/*
		$y = 25;
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->SetXY(5, $y);
		$pdf->MultiCell(285, 4, $desc_par, 0, 'C');
*/
		$y = 28;
		$pdf->SetFont('Arial','B',10);
		$pdf->SetXY(5,$y);
		$pdf->MultiCell(285,4,"DELEGACION: " . $desc_del,0,'L');
		$y = $y + 5;
		$pdf->SetXY(5,$y);
		$pdf->MultiCell(285,4,"UNIDAD OPERATIVA: " . $desc_uops,0,'L');
		$pdf->SetFont('Arial','',9);

		/**consulta**/
		$y = $y + 10;

		$pdf->SetFillColor(0,0,0); //color celda
		$pdf->SetTextColor(255,255,255);
		$pdf->SetDrawColor(51,51,51);
		
		$pdf->SetXY(5,$y);
		$pdf->MultiCell(28,4,"Tipo de Proyecto: ",1,'R',1);
						
		$pdf->SetFillColor(255,255,255); //color celda
		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(51,51,51);
		
		$pdf->SetFont('Arial','B',9);
		$pdf->SetXY(35,$y);
		$pdf->MultiCell(100,4,$desc_par,1,'C',1);
		
		$pdf->SetFillColor(0,0,0); //color celda
		$pdf->SetTextColor(255,255,255);
		$pdf->SetDrawColor(51,51,51);

		$pdf->SetXY(137,$y);
		$pdf->MultiCell(15,4,"Partida: ",1,'R',1);

		$pdf->SetFillColor(255,255,255); //color celda
		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(51,51,51);

		$pdf->SetFont('Arial', 'B',9);
		$pdf->SetXY(154, $y);
		$pdf->MultiCell(12, 4, $clave_par, 1, 'C', 1);

		$pdf->SetFillColor(0,0,0); //color celda
		$pdf->SetTextColor(255,255,255);
		$pdf->SetDrawColor(51,51,51);

		$pdf->SetXY(168,$y);
		if($clave_par == "0311" || $clave_par == "0601" || $clave_par == "0602" || $clave_par == "0603")
		{
			$pdf->MultiCell(25,4,"Tipo de gasto: ",1,'R',1);
		}
		else if($clave_par == "0501")
		{
			$pdf->MultiCell(25, 4,"Tipo de bien: ",1,'R',1);
		}

		$pdf->SetFillColor(255,255,255); //color celda
		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(51,51,51);

		$pdf->SetFont('Arial', 'B',9);
		$pdf->SetXY(195, $y);
		$pdf->MultiCell(80, 4, $tipo_gasto, 1, 'C', 1);

		$y = $y + 12;
		
		$pdf->SetFillColor(0,0,0); //color celda
		$pdf->SetTextColor(255,255,255);
		$pdf->SetDrawColor(51,51,51);
		
		$pdf->SetXY(5,$y);
		if($clave_par == "0311")
		{
			$pdf->MultiCell(32,4,"Servicio requerido: ",1,'R',1);
		}
		else if($clave_par == "0501")
		{
			$pdf->MultiCell(32,4,"Equipo requerido: ",1,'R',1);
		}
		else if($clave_par == "0601" || $clave_par == "0602" || $clave_par == "0603")
		{
			$pdf->MultiCell(32,4,"Tipo de trabajo: ",1,'R',1);
		}



		$pdf->SetFillColor(255,255,255); //color celda
		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(51,51,51);
		
		$pdf->SetFont('Arial','B',9);
		$pdf->SetXY(39,$y);
		$pdf->MultiCell(70,4,$tipo_equipo,1,'C',1);

		$pdf->SetFillColor(0,0,0); //color celda
		$pdf->SetTextColor(255,255,255);
		$pdf->SetDrawColor(51,51,51);
		
		$pdf->SetXY(111,$y);
		$pdf->MultiCell(18,4,"Cantidad: ",1,'R',1);

		$pdf->SetFillColor(255,255,255); //color celda
		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(51,51,51);
		
		$pdf->SetFont('Arial','B',9);
		$pdf->SetXY(131,$y);
		$pdf->MultiCell(10,4,$cantidad,1,'C',1);

		$pdf->SetFillColor(0,0,0); //color celda
		$pdf->SetTextColor(255,255,255);
		$pdf->SetDrawColor(51,51,51);
		
		$pdf->SetXY(143,$y);
		$pdf->MultiCell(16,4,"Unidad: ",1,'R',1);

		$pdf->SetFillColor(255,255,255); //color celda
		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(51,51,51);
		
		$pdf->SetFont('Arial','B',9);
		$pdf->SetXY(161,$y);
		$pdf->MultiCell(25,4,$unidad,1,'C',1);

		$pdf->SetFillColor(0,0,0); //color celda
		$pdf->SetTextColor(255,255,255);
		$pdf->SetDrawColor(51,51,51);
		
		$pdf->SetXY(188,$y);
		if($clave_par == "0311")
		{
			$pdf->MultiCell(32,4,"Tipo de equipo: ",1,'R',1);
		}
		else if($clave_par == "0501")
		{
			$pdf->MultiCell(32,4,"Actividad beneficiada: ",1,'R',1);
		}
		else if($clave_par == "0601" || $clave_par == "0602" || $clave_par == "0603")
		{
			$pdf->MultiCell(32,4,"Area deportiva: ",1,'R',1);
		}

		$actividad = "";
		if ($clave_par == "0311" || $clave_par == "0601" || $clave_par == "0602" || $clave_par == "0603")
		{
			$res_act = mysql_query("select actividad from cat_act_equipo_area where actividad_id = '$actividad_id'", $connect);
			$total_results = mysql_num_rows($res_act);
			while($res = mysql_fetch_array($res_act))
			{
				$actividad = $res['actividad'];
			}
		}
		else if ($clave_par == "0501")
		{
			$res_act = mysql_query("select actividad from cat_actividades_i where clave_act = '$clave_act'", $connect);
			$total_results = mysql_num_rows($res_act);
			while($res = mysql_fetch_array($res_act))
			{
				$actividad = $res['actividad'];
			}
		}

		$pdf->SetFillColor(255,255,255); //color celda
		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(51,51,51);
		
		$pdf->SetFont('Arial','B',9);
		$pdf->SetXY(222,$y);
		$pdf->MultiCell(53,4,$actividad,1,'C',1);

		$y = $y + 16;
		
		$pdf->SetFillColor(0,0,0); //color celda
		$pdf->SetTextColor(255,255,255);
		$pdf->SetDrawColor(51,51,51);

		$pdf->SetXY(5,$y);
		$pdf->MultiCell(25,4,"Descripcion: ",1,'R',1);

		$pdf->SetFillColor(255,255,255); //color celda
		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(51,51,51);
		
		$pdf->SetFont('Arial','B',9);
		$pdf->SetXY(32,$y);
		$descripcion = iconv('UTF-8', 'windows-1252', $descripcion);
		$pdf->MultiCell(243,4,substr($descripcion,0,126),1,'L',1);

		$y = $y + 8;

		$pdf->SetFillColor(0,0,0); //color celda
		$pdf->SetTextColor(255,255,255);
		$pdf->SetDrawColor(51,51,51);
		
		$pdf->SetXY(5,$y);
		$pdf->MultiCell(16,4,"Monto: ",1,'R',1);

		$pdf->SetFillColor(255,255,255); //color celda
		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(51,51,51);
		
		$pdf->SetFont('Arial','B',9);
		$pdf->SetXY(23,$y);
		$pdf->MultiCell(30,4,number_format($monto,2),1,'R',1);

		$pdf->SetFillColor(0,0,0); //color celda
		$pdf->SetTextColor(255,255,255);
		$pdf->SetDrawColor(51,51,51);
		
		$pdf->SetXY(55,$y);
		$pdf->MultiCell(20,4,"Beneficio: ",1,'R',1);

		$pdf->SetFillColor(255,255,255); //color celda
		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(51,51,51);
		
		$pdf->SetFont('Arial','B',9);
		$pdf->SetXY(77,$y);
		$pdf->MultiCell(80,4,$beneficio,1,'C',1);

		$pdf->SetFillColor(0,0,0); //color celda
		$pdf->SetTextColor(255,255,255);
		$pdf->SetDrawColor(51,51,51);
		
		$y = $y + 8;

		$pdf->SetXY(5,$y);
		$pdf->MultiCell(45,4,"Periodo de recuperacion: ",1,'R',1);

		$pdf->SetFillColor(255,255,255); //color celda
		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(51,51,51);
		
		$pdf->SetFont('Arial','B',9);
		$pdf->SetXY(52,$y);
		$periodo = iconv('UTF-8', 'windows-1252', $periodo);
		$pdf->MultiCell(223,4,$periodo,1,'C',1);

		/**/
		$y = $y + 16;
						
		$pdf->SetFillColor(0,0,0); //color celda
		$pdf->SetTextColor(255,255,255);
		$pdf->SetDrawColor(51,51,51);
		
		$pdf->SetXY(5,$y);
		$pdf->MultiCell(30,8,"Cursos",1,'C',1);

		$pdf->SetDrawColor(51,51,51);
					
		$pdf->SetXY(40,$y);
		$pdf->MultiCell(30,8,"No. de grupos",1,'C',1);
		
		$pdf->SetDrawColor(51,51,51);

		$pdf->SetXY(75,$y);
		$pdf->MultiCell(30,4,"No. de usuarios por grupo",1,'C',1);
						
		$pdf->SetDrawColor(51,51,51);

		$pdf->SetXY(110,$y);
		$pdf->MultiCell(30,8,"Total de usuarios",1,'C',1);
		

		if($ingresos_inscripcion != 0 || $cuotas_recuperacion != 0 || $uso_espacio != 0 || $total_ingresos != 0)
		{
			$pdf->SetXY(145,$y);
			$pdf->MultiCell(25,4,"Ingresos por inscripcion",1,'C',1);

			$pdf->SetDrawColor(51,51,51);
						
			$pdf->SetXY(175,$y);
			$pdf->MultiCell(30,4,"Ingresos cuotas de recuperacion",1,'C',1);

			$pdf->SetDrawColor(51,51,51);

			$pdf->SetXY(210,$y);
			$pdf->MultiCell(30,4,"Ingresos por uso de espacios",1,'C',1);
							
			$pdf->SetDrawColor(51,51,51);

			$pdf->SetXY(245,$y);
			$pdf->MultiCell(30,8,"Total de ingresos",1,'C',1);
		}				
		
		/**/					
		$y = $y + 8;
						
		$pdf->SetFillColor(255,255,255); //color celda
		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(51,51,51);
		
		$pdf->SetXY(5,$y);
		$pdf->MultiCell(30,4,$curso,1,'C',1);

		$pdf->SetDrawColor(51,51,51);
					
		$pdf->SetXY(40,$y);
		$pdf->MultiCell(30,4,$num_grupos,1,'C',1);

		$pdf->SetDrawColor(51,51,51);

		$pdf->SetXY(75,$y);
		$pdf->MultiCell(30,4,$usuarios_grupo,1,'C',1);
						
		$pdf->SetDrawColor(51,51,51);

		$pdf->SetXY(110,$y);
		$pdf->MultiCell(30,4,$total_usuarios,1,'C',1);

		if($ingresos_inscripcion != 0 || $cuotas_recuperacion != 0 || $uso_espacio != 0 || $total_ingresos != 0)
		{
			$pdf->SetXY(145,$y);
			$pdf->MultiCell(25,4,number_format($ingresos_inscripcion,2),1,'R',1);

			$pdf->SetDrawColor(51,51,51);
						
			$pdf->SetXY(175,$y);
			$pdf->MultiCell(30,4,number_format($cuotas_recuperacion,2),1,'R',1);

			$pdf->SetDrawColor(51,51,51);

			$pdf->SetXY(210,$y);
			$pdf->MultiCell(30,4,number_format($uso_espacio,2),1,'R',1);
							
			$pdf->SetDrawColor(51,51,51);

			$pdf->SetXY(245,$y);
			$pdf->MultiCell(30,4,number_format($total_ingresos,2),1,'R',1);
		}
		/*			
		$y = $y + 28;
						
		$pdf->SetFillColor(0,0,0); //color celda
		$pdf->SetTextColor(255,255,255);
		$pdf->SetDrawColor(51,51,51);
						
		$pdf->SetXY(5,$y);
		$pdf->MultiCell(45,4,"Beneficios esperados: ",1,'R',1);
		$pdf->SetXY(55,$y);
		$pdf->Cell(220,20,"",1,'C',1);
						
		$pdf->SetFillColor(255,255,255); //color celda
		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(51,51,51);
						
		$pdf->SetFont('Arial','',7);

		$pdf->SetXY(55,$y);
		$pdf->MultiCell(220,4,$objetivo,0,'J',0);
		*/		
		//$y = $y + 30;
		/*
		$y = $y + 58;
						
		$pdf->SetFillColor(0,0,0); //color celda
		$pdf->SetTextColor(255,255,255);
		$pdf->SetDrawColor(51,51,51);
						
		$pdf->SetXY(5,$y);
		$pdf->MultiCell(45,4,"Recuperacion de la Inversion: ",1,'R',1);
		$pdf->SetXY(55,$y);
		$pdf->Cell(220,20,"",1,'C',1);
					
		$pdf->SetFillColor(255,255,255); //color celda
		$pdf->SetTextColor(0,0,0);
		$pdf->SetDrawColor(51,51,51);
					
		$pdf->SetXY(55,$y);
		$pdf->MultiCell(220,4,$beneficios,0,'J',0);
		*/
			/*TERMINA CONSULTA*/
	}

	$clacon = substr($clave,0,2);
	$resultj = mysql_query("SELECT nombre_1,email_1,nombre_2,email_2,nombre_3,email_3 FROM jefes_mail WHERE clave like '$clacon%'", $connect);
	$totalregistros = mysql_num_rows($resultj);
	while($row = mysql_fetch_array($resultj))
	{
		$nombre_1 = $row['nombre_1'];
		$email_1 = $row['email_1'];
		$nombre_2 = $row['nombre_2'];
		$email_2 = $row['email_2'];
		$nombre_3 = $row['nombre_3'];
		$email_3 = $row['email_3'];
	}
	$resultj = mysql_query("SELECT nombre, ape_pat, ape_mat FROM usuarios WHERE clave='$clave'", $connect);
	$totalregistros = mysql_num_rows($resultj);
	while($row = mysql_fetch_array($resultj))
	{
		$nombre = $row['nombre'];
		$ape_pat = $row['ape_pat'];
		$ape_mat = $row['ape_mat'];
	}

	$y = $y + 40;
	$y1 = $y + .5;
	$y2 = $y - 1;
	$pdf->SetFont('Arial','',10);

	$pdf->SetTextColor(0,0,0);
	$pdf->SetDrawColor(0,0,0);

	$pdf->Line(25,$y2,115,$y2);
	$pdf->Line(160,$y2,250,$y2);
	$pdf->SetXY(11,$y);
	$pdf->MultiCell(118,5,"Director de la Unidad Operativa",0,'C',0);
	$pdf->SetXY(145,$y);
	$pdf->MultiCell(118,5,"Jefe de Cultura Fisica y Deporte",0,'C',0);
	
	$y = $y + 5;
	$pdf->SetXY(11,$y);
	$pdf->MultiCell(118,5,$nombre." ". $ape_pat . " " . $ape_mat ,0,'C',0);
	$pdf->SetXY(145,$y);
	$pdf->MultiCell(118,5,$nombre_3,0,'C',0);
	mysql_free_result($result);
	$pdf->Output();
?>