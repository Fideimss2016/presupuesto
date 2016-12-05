<?php
session_start();

$clave=$_SESSION["clave"];
$clave1=$_SESSION["clave"];

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
			$this->Image('cabeza2.jpg',5,1,40,18);
			// Arial bold 15
			$this->SetFont('Arial','B',20);
			// Movernos a la derecha
			//$this->Cell(30);
			// Título
			$this->SetXY(1,5);
			$this->MultiCell(290,4,'Fideicomiso para el Desarrollo del Deporte',0,'C');
			$y=15;
			$this->SetXY(1,$y);
			$this->SetFont('Arial','B',10);
			//$this->MultiCell(354,4,'PRESUPUESTO DE INGRESOS EJERCICIO 2014',0,'C');
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
			// Movernos a la derecha
			//$this->Cell(30);
			// Título
			$this->SetXY(1,5);
			$this->MultiCell(277,4,'Fideicomiso para el Desarrollo del Deporte',0,'C');
			$y=15;
			$this->SetXY(1,$y);
			$this->SetFont('Arial','B',10);
			$this->MultiCell(277,4,'ESTUDIO COSTO BENEFICIO 
				OBRA, MANTENIMIENTO Y EQUIPAMIENTO',0,'C');
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


			$result=mysql_query("select o.id_conse_obra,o.id_proyecto,o.monto,o.clave_par, cpo.desc_proyecto, cpe.desc_par,o.problematica, o.objetivo, o.beneficios, o.status,o.c1,o.c2,o.c3,o.c4,o.c5,o.c6,o.componentes,o.anio_fiso,o.cantidad,o.unidad
			from obras o, cat_proyectos_o cpo, cat_partidas_e cpe
			where clave='$clave' and cpo.id_proyecto=o.id_proyecto and cpe.clave_par=o.clave_par order by id_conse_obra", $connect);

			$totalregistros=mysql_num_rows($result);
			$valcolor==0;
			while($row=mysql_fetch_array($result))
			{
			$id_conse_obra=$row['id_conse_obra'];
			$id_proyecto=$row['id_proyecto'];
			$monto=$row['monto'];
			$clave_par=$row['clave_par'];
			$desc_proyecto=$row['desc_proyecto'];
			$desc_par=$row['desc_par'];			
			$problematica=$row['problematica'];
			$objetivo=$row['objetivo'];
			$beneficios=$row['beneficios'];
			$status=$row['status'];
			$c1=$row['c1'];
			$c2=$row['c2'];
			$c3=$row['c3'];
			$c4=$row['c4'];
			$c5=$row['c5'];
			$c6=$row['c6'];
			$componentes=$row['componentes'];
			$anio_fiso=$row['anio_fiso'];
			$cantidad=$row['cantidad'];
			$unidad=$row['unidad'];

					$pdf->AddPage('L','Letter');
					$pdf->SetFont('Times','',12);

					$y=28;
					$pdf->SetFont('Arial','B',10);
					$pdf->SetXY(5,$y);
					$pdf->MultiCell(285,4,"DELEGACION: " . $desc_del,0,'L');
					$y=$y+5;
					$pdf->SetXY(5,$y);
					$pdf->MultiCell(285,4,"UNIDAD OPERATIVA: " . $desc_uops,0,'L');
					$pdf->SetFont('Arial','',9);




					/**cnsulta**/
					$y=$y+10;
					
					$pdf->SetFillColor(0,0,0); //color celda
					$pdf->SetTextColor(255,255,255);
					$pdf->SetDrawColor(51,51,51);
					
					$pdf->SetXY(5,$y);
					$pdf->MultiCell(45,4,"Tipo de Proyecto: ",1,'R',1);
					
					$pdf->SetFillColor(255,255,255); //color celda
					$pdf->SetTextColor(0,0,0);
					$pdf->SetDrawColor(51,51,51);
					
					$pdf->SetXY(55,$y);
					$pdf->MultiCell(220,4,$desc_par,1,'C',0);
					
					$y=$y+8;
					
					$pdf->SetFillColor(0,0,0); //color celda
					$pdf->SetTextColor(255,255,255);
					$pdf->SetDrawColor(51,51,51);
					
					$pdf->SetXY(5,$y);
					$pdf->MultiCell(45,4,"Concepto: ",1,'R',1);
					
					$pdf->SetFillColor(255,255,255); //color celda
					$pdf->SetTextColor(0,0,0);
					$pdf->SetDrawColor(51,51,51);
					
					$pdf->SetXY(55,$y);
					$pdf->MultiCell(220,4,$desc_proyecto,1,'C',0);
					
					$y=$y+8;
					
					$pdf->SetFillColor(0,0,0); //color celda
					$pdf->SetTextColor(255,255,255);
					$pdf->SetDrawColor(51,51,51);
					
					$pdf->SetXY(5,$y);
					$pdf->MultiCell(45,4,"Tipo de Gasto y Monto de Inversion: ",1,'R',1);
					
					$pdf->SetFillColor(255,255,255); //color celda
					$pdf->SetTextColor(0,0,0);
					$pdf->SetDrawColor(51,51,51);
					
					$pdf->SetXY(55,$y);
					$pdf->MultiCell(36,4,"PARTIDA",1,'C',0);
					$pdf->SetXY(91,$y);
					$pdf->MultiCell(37,4,"CANTIDAD",1,'C',0);
					$pdf->SetXY(128,$y);
					$pdf->MultiCell(73,4,"MONTO DE INVERSION",1,'C',0);
					$pdf->SetXY(201,$y);
					$pdf->MultiCell(74,4,"EJERCICIO FISCAL",1,'C',0);
					
					$y=$y+4;
					
					$pdf->SetXY(55,$y);
					$pdf->MultiCell(36,4,$clave_par,1,'C',0);
					$pdf->SetXY(91,$y);
					$pdf->MultiCell(37,4,$cantidad . " ". $unidad,1,'C',0);
					$pdf->SetXY(128,$y);
					$pdf->MultiCell(73,4,number_format($monto,2),1,'C',0);
					$pdf->SetXY(201,$y);
					$pdf->MultiCell(74,4,$anio_fiso,1,'C',0);
					
/**/
					$y=$y+8;
					
					$pdf->SetFillColor(0,0,0); //color celda
					$pdf->SetTextColor(255,255,255);
					$pdf->SetDrawColor(51,51,51);
					
					$pdf->SetXY(5,$y);
					$pdf->MultiCell(45,4,"Concepto del Tipo de Gasto: ",1,'R',1);
					
					$pdf->SetFillColor(255,255,255); //color celda
					$pdf->SetTextColor(0,0,0);
					$pdf->SetDrawColor(51,51,51);
					
					$pdf->SetXY(55,$y);
					$pdf->Cell(220,11,"",1,'C',1);
					
					$y=$y+1;

					if($c1!=0)
					{
					$pdf->SetXY(60,$y);
					$pdf->MultiCell(5,4,"X",1,'C',0);
					}
					else
					{
					$pdf->SetXY(60,$y);
					$pdf->MultiCell(5,4,"",1,'C',0);
					}



					$pdf->SetXY(65,$y);
					$pdf->MultiCell(60,4,"Mantenimiento de Equipo Deportivo",0,'L',0);
					if($c4!=0)
					{
					$pdf->SetXY(125,$y);
					$pdf->MultiCell(5,4,"X",1,'C',0);
					}
					else
					{
					$pdf->SetXY(125,$y);
					$pdf->MultiCell(5,4,"",1,'C',0);
					}
					$pdf->SetXY(130,$y);
					$pdf->MultiCell(73,4,"Mantenimiento de Areas Deportivas",0,'L',0);
					
					if($c2!=0)
					{
					$pdf->SetXY(203,$y);
					$pdf->MultiCell(5,4,"X",1,'C',0);
					}
					else
					{
					$pdf->SetXY(203,$y);
					$pdf->MultiCell(5,4,"",1,'C',0);
					}
					$pdf->SetXY(208,$y);
					$pdf->MultiCell(45,4,"Proyecto ejecutivo",0,'L',0);

					$y=$y+5;
					if($c5!=0)
					{
					$pdf->SetXY(60,$y);
					$pdf->MultiCell(5,4,"X",1,'C',0);
					}
					else
					{
					$pdf->SetXY(60,$y);
					$pdf->MultiCell(5,4,"",1,'C',0);
					}
					$pdf->SetXY(65,$y);
					$pdf->MultiCell(60,4,"Adquisicion de Equipo Deportivo",0,'L',0);
					
					if($c3!=0)
					{
					$pdf->SetXY(125,$y);
					$pdf->MultiCell(5,4,"X",1,'C',0);
					}
					else
					{
					$pdf->SetXY(125,$y);
					$pdf->MultiCell(5,4,"",1,'C',0);
					}
					$pdf->SetXY(130,$y);
					$pdf->MultiCell(73,4,"Obra",0,'L',0);
					if($c6!=0)
					{
					$pdf->SetXY(203,$y);
					$pdf->MultiCell(5,4,"X",1,'C',0);
					}
					else
					{
					$pdf->SetXY(203,$y);
					$pdf->MultiCell(5,4,"",1,'C',0);
					}
					$pdf->SetXY(208,$y);
					$pdf->MultiCell(130,4,"Otros ( " .$componentes. ")",0,'L',0);


/**/					
					$y=$y+9;
					
					$pdf->SetFillColor(0,0,0); //color celda
					$pdf->SetTextColor(255,255,255);
					$pdf->SetDrawColor(51,51,51);
					
					$pdf->SetXY(5,$y);
					$pdf->MultiCell(45,4,"Descripcion del Concepto: ",1,'R',1);
					$pdf->SetXY(55,$y);
					$pdf->Cell(220,25,"",1,'C',1);

					$pdf->SetFillColor(255,255,255); //color celda
					$pdf->SetTextColor(0,0,0);
					$pdf->SetDrawColor(51,51,51);
					
					$pdf->SetXY(55,$y);
					$pdf->MultiCell(220,4,$problematica,0,'J',0);
					
					$y=$y+28;
					
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
					
					$y=$y+30;
					
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
					/*TERMINA CONSULTA*/
			}

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


			$resultj=mysql_query("SELECT nombre, ape_pat, ape_mat FROM usuarios WHERE clave='$clave'", $connect);
			$totalregistros=mysql_num_rows($resultj);
			while($row=mysql_fetch_array($resultj))
			{
				$nombre=$row['nombre'];
				$ape_pat=$row['ape_pat'];
				$ape_mat=$row['ape_mat'];
			}


$y=$y+40;
$y1=$y+.5;
$y2=$y-1;
$pdf->SetFont('Arial','',10);

$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(0,0,0);

$pdf->Line(25,$y2,115,$y2);
$pdf->Line(160,$y2,250,$y2);
$pdf->SetXY(11,$y);
$pdf->MultiCell(118,5,"Director de la Unidad Operativa",0,'C',0);
$pdf->SetXY(145,$y);
$pdf->MultiCell(118,5,"Jefe de Cultura Fisica y Deporte",0,'C',0);
$y=$y+5;
$pdf->SetXY(11,$y);
$pdf->MultiCell(118,5,$nombre." ". $ape_pat . " " . $ape_mat ,0,'C',0);
$pdf->SetXY(145,$y);
$pdf->MultiCell(118,5,$nombre_3,0,'C',0);



mysql_free_result($result);

$pdf->Output();
?>