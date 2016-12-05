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

/*
$consup=substr($clave,0,2);
$result=mysql_query("select cd.desc_uops, cd.desc_del from cat_delegaciones cd where clave like '$consup%'", $connect);
								
$totalregistros=mysql_num_rows($result);


while($row=mysql_fetch_array($result))
{
$desc_uops=$row['desc_uops'];
$desc_del=$row['desc_del'];
$clave=$row['clave'];
}
*/


// Creación del objeto de la clase heredada
$pdf = new PDF('L','mm','Legal');
$pdf->AliasNbPages();
$pdf->AddPage('L','Legal');
$pdf->SetFont('Times','',12);

$y=23;
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(5,$y);
//$pdf->MultiCell(285,4,"DELEGACION:" . $desc_del,0,'L');
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
//$pdf->Cell(63,150,"",1,'C',1);



$pdf->SetXY(68,$y);
$pdf->MultiCell(48,12,"INGRESOS",1,'C',1);
$pdf->SetXY(68,$y);
//$pdf->Cell(48,150,"",1,'C',1);


$pdf->SetXY(116,$y);
$pdf->MultiCell(224,4,"EGRESOS",1,'C',1);
$pdf->SetXY(116,$y);
//$pdf->Cell(224,150,"",1,'C',1);


$pdf->SetXY(116,$y1);
$pdf->MultiCell(28,4,"CAPITULO 1",1,'C',1);

$pdf->SetXY(116,$y2);
$pdf->MultiCell(28,4,"SERVICIOS PERSONALES",1,'C',1);
$pdf->SetXY(116,$y1);
//$pdf->Cell(26,146,"",1,'C',1);


$pdf->SetXY(142,$y1);
$pdf->MultiCell(28,4,"CAPITULO 2",1,'C',1);

$pdf->SetXY(142,$y2);
$pdf->MultiCell(28,4,"BIENES DE CONSUMO",1,'C',1);
$pdf->SetXY(142,$y1);
//$pdf->Cell(28,146,"",1,'C',1);


$pdf->SetXY(170,$y1);
$pdf->MultiCell(28,4,"CAPITULO 3",1,'C',1);
$pdf->SetXY(170,$y1);
//$pdf->Cell(28,146,"",1,'C',1);


$pdf->SetXY(170,$y2);
$pdf->MultiCell(28,4,"SERVICIOS GENERALES",1,'C',1);

$pdf->SetXY(198,$y1);
$pdf->MultiCell(56,4,"CAPITULO 4 CONSERVACION",1,'C',1);
$pdf->SetXY(198,$y1);
//$pdf->Cell(28,146,"",1,'C',1);

$pdf->SetXY(198,$y2);
$pdf->MultiCell(28,4,"4.1 MANT. DE INSTALACIONES",1,'C',1);

$pdf->SetXY(226,$y2);
$pdf->MultiCell(28,4,"4.2 MANT. DE EQUIPO",1,'C',1);
$pdf->SetXY(226,$y1);
//$pdf->Cell(28,146,"",1,'C',1);


$pdf->SetXY(254,$y1);
$pdf->MultiCell(56,4,"CAPITULO 5 INVERSION FISICA",1,'C',1);

$pdf->SetXY(254,$y2);
$pdf->MultiCell(28,4,"5.1 OBRA PUBLICA",1,'C',1);
$pdf->SetXY(254,$y1);
//$pdf->Cell(28,146,"",1,'C',1);


$pdf->SetXY(282,$y2);
$pdf->MultiCell(28,4,"5.2 EQUIPO DEPORTIVO",1,'C',1);
$pdf->SetXY(282,$y1);
//$pdf->Cell(28,146,"",1,'C',1);


$pdf->SetXY(310,$y1);
$pdf->MultiCell(30,8,"TOTAL",1,'C',1);
$pdf->SetXY(310,$y1);
//$pdf->Cell(30,146,"",1,'C',1);

//$result=mysql_query("select distinct(vobo.clave) as clave, cd.desc_uops, cd.desc_del from vobo, cat_delegaciones cd where vobo.clave like '$consup%' and cd.clave=vobo.clave order by clave", $connect);
$result=mysql_query("select distinct(vobo.clave) as clave, cd.desc_uops, cd.desc_del from vobo, cat_delegaciones cd where cd.clave=vobo.clave order by clave", $connect);
$totalregistros=mysql_num_rows($result);

$y=$y+8;
while($row=mysql_fetch_array($result))
{
$desc_uops=$row['desc_uops'];
$desc_del=$row['desc_del'];
$clave=$row['clave'];




			$resulti=mysql_query("select sum(i.ingreso_total) as ingreso_total from ingresos i where clave=$clave", $connect);
			$totalregistros=mysql_num_rows($resulti);
			$valcolor==0;
			while($row=mysql_fetch_array($resulti))
			{
			$ingreso_total=$row['ingreso_total'];
			$gingreso_total+=$ingreso_total;
			}
			
			$result1=mysql_query("SELECT SUM(gas_anual) as gas_anual FROM personal WHERE clave=$clave and clave_par like '01%'", $connect);
			$totalregistros=mysql_num_rows($result1);
			while($row=mysql_fetch_array($result1))
			{
			$gas_anual=$row['gas_anual'];
			$ggas_anual+=$gas_anual;					
			}

			$resultcap=mysql_query("SELECT SUM(total_gasto) as total_gasto_cap FROM egresos WHERE clave=$clave and id_par='01'", $connect);
			$totalregistros=mysql_num_rows($resultcap);
			while($row=mysql_fetch_array($resultcap))
			{
			$total_gasto_cap=$row['total_gasto_cap'];
			$gtotal_gasto_cap+=$total_gasto_cap;
			}
			//ECHO "SELECT SUM(total_gasto) as total_gasto_cap FROM egresos WHERE clave=$clave and id_par='01'";
			$cap1=$gas_anual+$total_gasto_cap;
			$gcap1=$ggas_anual+$gtotal_gasto_cap;

			$result2=mysql_query("SELECT SUM(total_gasto) as total_gasto_2 FROM egresos WHERE clave=$clave and id_par='02'", $connect);
			$totalregistros=mysql_num_rows($result2);
			while($row=mysql_fetch_array($result2))
			{
			$total_gasto_2=$row['total_gasto_2'];
			$gtotal_gasto_2+=$total_gasto_2;
			}

			$result3=mysql_query("SELECT SUM(total_gasto) as total_gasto_3 FROM egresos WHERE clave=$clave and id_par='03'", $connect);
			$totalregistros=mysql_num_rows($result3);
			while($row=mysql_fetch_array($result3))
			{
			$total_gasto_3=$row['total_gasto_3'];
			$gtotal_gasto_3+=$total_gasto_3;
			}

			$result41=mysql_query("SELECT SUM(total_gastoo) as total_gasto_41 FROM obras WHERE clave=$clave and clave_par='0401'", $connect);
			$totalregistros=mysql_num_rows($result41);
			while($row=mysql_fetch_array($result41))
			{
			$total_gasto_41=$row['total_gasto_41'];
			$gtotal_gasto_41+=$total_gasto_41;
			}
			
			$result42=mysql_query("SELECT SUM(total_gastoo) as total_gasto_42 FROM obras WHERE clave=$clave and clave_par='0402'", $connect);
			$totalregistros=mysql_num_rows($result42);
			while($row=mysql_fetch_array($result42))
			{
			$total_gasto_42=$row['total_gasto_42'];
			$gtotal_gasto_42+=$total_gasto_42;
			}
			
			$result51=mysql_query("SELECT SUM(total_gastoo) as total_gasto_51 FROM obras WHERE clave=$clave and clave_par='0501'", $connect);
			$totalregistros=mysql_num_rows($result51);
			while($row=mysql_fetch_array($result51))
			{
			$total_gasto_51=$row['total_gasto_51'];
			$gtotal_gasto_51+=$total_gasto_51;
			}
			
			$result52=mysql_query("SELECT SUM(total_gastoo) as total_gasto_52 FROM obras WHERE clave=$clave and clave_par='0502'", $connect);
			$totalregistros=mysql_num_rows($result52);
			while($row=mysql_fetch_array($result52))
			{
			$total_gasto_52=$row['total_gasto_52'];
			$gtotal_gasto_52+=$total_gasto_52;
			}

			$total=$cap1+$total_gasto_2+$total_gasto_3+$total_gasto_41+$total_gasto_42+$total_gasto_51+$total_gasto_52;
			$gtotal=$gcap1+$gtotal_gasto_2+$gtotal_gasto_3+$gtotal_gasto_41+$gtotal_gasto_42+$gtotal_gasto_51+$gtotal_gasto_52;

			$diferencia=$ingreso_total-$total;


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
$pdf->MultiCell(48,4,number_format($ingreso_total,2),1,'C',0);

$pdf->SetXY(116,$y);
$pdf->MultiCell(26,4,number_format($cap1,2),1,'C',0);

$pdf->SetXY(142,$y);
$pdf->MultiCell(28,4,number_format($total_gasto_2,2),1,'C',0);

$pdf->SetXY(170,$y);
$pdf->MultiCell(28,4,number_format($total_gasto_3,2),1,'C',0);

$pdf->SetXY(198,$y);
$pdf->MultiCell(28,4,number_format($total_gasto_41,2),1,'C',0);

$pdf->SetXY(226,$y);
$pdf->MultiCell(28,4,number_format($total_gasto_42,2),1,'C',0);

$pdf->SetXY(254,$y);
$pdf->MultiCell(28,4,number_format($total_gasto_51,2),1,'C',0);

$pdf->SetXY(282,$y);
$pdf->MultiCell(28,4,number_format($total_gasto_52,2),1,'C',0);


$pdf->SetXY(310,$y);
$pdf->MultiCell(30,4,number_format($total,2),1,'C',0);
}
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


mysql_free_result($result);

$pdf->Output();
?>