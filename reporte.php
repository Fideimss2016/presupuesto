<?php

session_start();
$clave=$_SESSION["clave"];

include "clases/variablesbd.php";

$aux="<?\n";
$aux=$aux."header(\"Content-type: application/vnd.ms-excel\");\n";
$aux=$aux."header(\"Content-Disposition: attachment; filename=excel.xls\");\n";
$aux=$aux."?>\n";
$file = fopen('excel1.php',"w+");
if ( $file )
{

}
else
{
  die( "fopen failed for $filename" ) ;
}
if (fwrite($file,"$aux \n") === FALSE)
{
  echo "No se puede escribir al archivo ($file)";
  exit;
}

	//conexion a la base de datos
	$connect=mysql_connect("$host","$user","$passworks");

	//Seleccion de la base
	mysql_select_db("$dbname",$connect);

$celda="#222222";
$celda1="#333333";
$celda2="#555555";
$celdaf="#ffffff";
$celdaf1="#F0F0F9";


//$_SESSION['usuario_sistema']="$nombre $ape_pat $ape_mat";
$usuario_sistema=$_SESSION['usuario_sistema'];

echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"capturas.css\" >";

echo "<body>";

echo "<center>";
echo "<table width=\"97%\" border=\"0\" cellpadding=\"1\" cellspacing=\"2\">";
echo"  <tr>";
echo"    <td>Seleccione el a&ntilde;o a reportar: <br><a href='reporte.php?id=2014'>2014</a><br><a href='reporte.php?id=2015'>2015</a><br><a href='reporte.php?id=2016'>2016</a><br><a href='reporte.php?id=2017'>2017</a></td>";
echo"  </tr>";
echo "</table>";
echo "</center>";

if (!isset($_REQUEST['id']))
{

}
else
{

$anio=$_REQUEST['id'];


$aux="<center><h1><font color=\"#000000\">Reporte del presupuesto por partidas Presupuestales de Ejercicio $anio</font></h1></center>";
echo "<center><h1><font color=\"#000\">Reporte del presupuesto por partidas Presupuestales de Ejercicio $anio</font></h1></center>";

echo "<center>";
echo "<table width=\"97%\" border=\"0\" bgcolor=\"#000\" cellpadding=\"1\" cellspacing=\"2\">";
echo"  <tr>";
echo"    <th rowspan='4' scope='col' bgcolor=$celda><span class='titulo_small'>DELEGACION</span></th>";
echo"    <th rowspan='4' scope='col' bgcolor=$celda><span class='titulo_small'>UNIDAD OPERATIVA</span></th>";
echo"    <th rowspan='4' scope='col' bgcolor=$celda><span class='titulo_small'>INGRESOS</span></th>";
echo"    <th colspan='14' scope='col' bgcolor=$celda><span class='titulo_small'>EGRESOS</span></th>";
echo"    <th rowspan='4' scope='col' bgcolor=$celda><span class='titulo_small'>TOTAL</span></th>";
echo"  </tr>";
echo"  <tr>";
echo"    <td colspan='3' bgcolor=$celda><div align='center'><span class='titulo_small'>CAPITULO 1</span></div></td>";
echo"    <td colspan='2' bgcolor=$celda><div align='center'><span class='titulo_small'>CAPITULO 2</span></div></td>";
echo"    <td colspan='5' bgcolor=$celda><div align='center'><span class='titulo_small'>CAPITULO 3</span></div></td>";
echo"    <td colspan='2' bgcolor=$celda><div align='center'><span class='titulo_small'>CAPITULO 4</span></div></td>";
echo"    <td colspan='2' bgcolor=$celda><div align='center'><span class='titulo_small'>CAPITULO 5</span></div></td>";
echo"  </tr>";
echo"  <tr>";
echo"    <td colspan='3' bgcolor=$celda><div align='center'><span class='titulo_small'>SERVICIOS GENERALES</span></div></td>";
echo"    <td colspan='2' bgcolor=$celda><div align='center'><span class='titulo_small'>BIENES DE CONSUMO</span></div></td>";
echo"    <td colspan='5' bgcolor=$celda><div align='center'><span class='titulo_small'>SERVICIOS GENERALES</span></div></td>";
echo"    <td colspan='2' bgcolor=$celda><div align='center'><span class='titulo_small'>CONSERVACION</span></div></td>";
echo"    <td colspan='2' bgcolor=$celda><div align='center'><span class='titulo_small'>INVERSION FISICA</span></div></td>";
echo"  </tr>";
echo"  <tr>";
echo"    <td bgcolor=$celda><div align='center'><span class='titulo_small'>0101</span></div></td>";
echo"    <td bgcolor=$celda><div align='center'><span class='titulo_small'>0104</span></div></td>";
echo"    <td bgcolor=$celda><div align='center'><span class='titulo_small'>0105</span></div></td>";
echo"    <td bgcolor=$celda><div align='center'><span class='titulo_small'>0201</span></div></td>";
echo"    <td bgcolor=$celda><div align='center'><span class='titulo_small'>0202</span></div></td>";
echo"    <td bgcolor=$celda><div align='center'><span class='titulo_small'>0301</span></div></td>";
echo"    <td bgcolor=$celda><div align='center'><span class='titulo_small'>0302</span></div></td>";
echo"    <td bgcolor=$celda><div align='center'><span class='titulo_small'>0303</span></div></td>";
echo"    <td bgcolor=$celda><div align='center'><span class='titulo_small'>0305</span></div></td>";
echo"    <td bgcolor=$celda><div align='center'><span class='titulo_small'>0317</span></div></td>";
echo"    <td bgcolor=$celda><div align='center'><span class='titulo_small'>0401</span></div></td>";
echo"    <td bgcolor=$celda><div align='center'><span class='titulo_small'>0402</span></div></td>";
echo"    <td bgcolor=$celda><div align='center'><span class='titulo_small'>0501</span></div></td>";
echo"    <td bgcolor=$celda><div align='center'><span class='titulo_small'>0502</span></div></td>";
echo"  </tr>";

$aux=$aux."<center>";
$aux=$aux."<table width=\"100%\" border=\"1\" bgcolor=\"#000000\">";
$aux=$aux."  <tr>";
$aux=$aux."    <th rowspan='4' scope='col' bgcolor=$celda><font color='#efefef'>DELEGACION</font></th>";
$aux=$aux."    <th rowspan='4' scope='col' bgcolor=$celda><font color='#efefef'>UNIDAD OPERATIVA</font></th>";
$aux=$aux."    <th rowspan='4' scope='col' bgcolor=$celda><font color='#efefef'>INGRESOS</font></th>";
$aux=$aux."    <th colspan='14' scope='col' bgcolor=$celda><font color='#efefef'>EGRESOS</font></th>";
$aux=$aux."    <th rowspan='4' scope='col' bgcolor=$celda><font color='#efefef'>TOTAL</font></th>";
$aux=$aux."  </tr>";
$aux=$aux."  <tr>";
$aux=$aux."    <td colspan='3' bgcolor=$celda><div align='center'><font color='#efefef'>CAPITULO 1</font></div></td>";
$aux=$aux."    <td colspan='2' bgcolor=$celda><div align='center'><font color='#efefef'>CAPITULO 2</font></div></td>";
$aux=$aux."    <td colspan='5' bgcolor=$celda><div align='center'><font color='#efefef'>CAPITULO 3</font></div></td>";
$aux=$aux."    <td colspan='2' bgcolor=$celda><div align='center'><font color='#efefef'>CAPITULO 4</font></div></td>";
$aux=$aux."    <td colspan='2' bgcolor=$celda><div align='center'><font color='#efefef'>CAPITULO 5</font></div></td>";
$aux=$aux."  </tr>";
$aux=$aux."  <tr>";
$aux=$aux."    <td colspan='3' bgcolor=$celda><div align='center'><font color='#efefef'>SERVICIOS GENERALES</font></div></td>";
$aux=$aux."    <td colspan='2' bgcolor=$celda><div align='center'><font color='#efefef'>BIENES DE CONSUMO</font></div></td>";
$aux=$aux."    <td colspan='5' bgcolor=$celda><div align='center'><font color='#efefef'>SERVICIOS GENERALES</font></div></td>";
$aux=$aux."    <td colspan='2' bgcolor=$celda><div align='center'><font color='#efefef'>CONSERVACION</font></div></td>";
$aux=$aux."    <td colspan='2' bgcolor=$celda><div align='center'><font color='#efefef'>INVERSION FISICA</font></div></td>";
$aux=$aux."  </tr>";
$aux=$aux."  <tr>";
$aux=$aux."    <td bgcolor=$celda><div align='center'><font color='#efefef'>0101</font></div></td>";
$aux=$aux."    <td bgcolor=$celda><div align='center'><font color='#efefef'>0104</font></div></td>";
$aux=$aux."    <td bgcolor=$celda><div align='center'><font color='#efefef'>0105</font></div></td>";
$aux=$aux."    <td bgcolor=$celda><div align='center'><font color='#efefef'>0201</font></div></td>";
$aux=$aux."    <td bgcolor=$celda><div align='center'><font color='#efefef'>0201</font></div></td>";
$aux=$aux."    <td bgcolor=$celda><div align='center'><font color='#efefef'>0301</font></div></td>";
$aux=$aux."    <td bgcolor=$celda><div align='center'><font color='#efefef'>0302</font></div></td>";
$aux=$aux."    <td bgcolor=$celda><div align='center'><font color='#efefef'>0303</font></div></td>";
$aux=$aux."    <td bgcolor=$celda><div align='center'><font color='#efefef'>0305</font></div></td>";
$aux=$aux."    <td bgcolor=$celda><div align='center'><font color='#efefef'>0317</font></div></td>";
$aux=$aux."    <td bgcolor=$celda><div align='center'><font color='#efefef'>0401</font></div></td>";
$aux=$aux."    <td bgcolor=$celda><div align='center'><font color='#efefef'>0402</font></div></td>";
$aux=$aux."    <td bgcolor=$celda><div align='center'><font color='#efefef'>0501</font></div></td>";
$aux=$aux."    <td bgcolor=$celda><div align='center'><font color='#efefef'>0502</font></div></td>";
$aux=$aux."  </tr>";

if($anio=='2014')
{
	$basei='ingresos_2013';
	$basee='egresos_2013';
	$baseo='obras_2013';
	$basep='personal_2013';
	$vob='vobo_2013';
}

else if($anio=='2015')
{
	$basei='ingresos_2015';
	$basee='egresos_2015';
	$baseo='obras_2015';
	$basep='personal_2015';
	$vob='vobo_2015';
}

else if($anio=='2016') 
{
	$basei='ingresos_2016';
	$basee='egresos_2016';
	$baseo='obras_2016';
	$basep='personal_2016';
	$vob='vobo_2016';
}

else if($anio=='2017') 
{
	$basei='ingresos';
	$basee='egresos';
	$baseo='obras';
	$basep='personal';
	$vob='vobo';
}

$colorfila=0;

//$result=mysql_query("select distinct(vobo.clave) as clave, cd.desc_uops, cd.desc_del from vobo, cat_delegaciones cd where cd.clave=vobo.clave order by clave", $connect);
$result=mysql_query("select distinct(v.clave) as clave, cd.desc_uops, cd.desc_del from $vob v, cat_delegaciones cd where cd.clave=v.clave order by clave", $connect);
								
$totalregistros=mysql_num_rows($result);
			

							while($row=mysql_fetch_array($result))
							{
							$desc_uops=$row['desc_uops'];
							$desc_del=$row['desc_del'];
							$clave=$row['clave'];

										//echo "SELECT SUM(gas_anual) as gas_anual0101 FROM $basep WHERE clave=$clave and clave_par='0101'";

										$resulti=mysql_query("select sum(i.ingreso_total) as ingreso_total from $basei i where clave=$clave", $connect);
										//echo "select sum(i.ingreso_total) as ingreso_total from ingresos i where clave=$clave";
										$totalregistros=mysql_num_rows($resulti);
										$valcolor==0;
										while($row=mysql_fetch_array($resulti))
										{
										$ingreso_total=$row['ingreso_total'];
										}
											
										$result1=mysql_query("SELECT SUM(gas_anual) as gas_anual0101 FROM $basep WHERE clave=$clave and clave_par='0101'", $connect);
										$totalregistros=mysql_num_rows($result1);
										while($row=mysql_fetch_array($result1))
										{
										$gas_anual0101=$row['gas_anual0101'];
										}

										$result1=mysql_query("SELECT SUM(gas_anual) as gas_anual0104 FROM $basep WHERE clave=$clave and clave_par='0104'", $connect);
										$totalregistros=mysql_num_rows($result1);
										while($row=mysql_fetch_array($result1))
										{
										$gas_anual0104=$row['gas_anual0104'];
										}

										$result1=mysql_query("SELECT SUM(gas_anual) as gas_anual0105 FROM $basep WHERE clave=$clave and clave_par='0105'", $connect);
										$totalregistros=mysql_num_rows($result1);
										while($row=mysql_fetch_array($result1))
										{
										$gas_anual0105=$row['gas_anual0105'];
										}

										$result2=mysql_query("SELECT SUM(total_gasto) as total_gasto_2_0201 FROM $basee WHERE clave=$clave and clave_par='0201'", $connect);
										$totalregistros=mysql_num_rows($result2);
										while($row=mysql_fetch_array($result2))
										{
										$total_gasto_2_0201=$row['total_gasto_2_0201'];
										}

										$result2=mysql_query("SELECT SUM(total_gasto) as total_gasto_2_0202 FROM $basee WHERE clave=$clave and clave_par='0202'", $connect);
										$totalregistros=mysql_num_rows($result2);
										while($row=mysql_fetch_array($result2))
										{
										$total_gasto_2_0202=$row['total_gasto_2_0202'];
										}

										$result3=mysql_query("SELECT SUM(total_gasto) as total_gasto_3_0301 FROM $basee WHERE clave=$clave and clave_par='0301'", $connect);
										$totalregistros=mysql_num_rows($result3);
										while($row=mysql_fetch_array($result3))
										{
										$total_gasto_3_0301=$row['total_gasto_3_0301'];
										}

										$result3=mysql_query("SELECT SUM(total_gasto) as total_gasto_3_0302 FROM $basee WHERE clave=$clave and clave_par='0302'", $connect);
										$totalregistros=mysql_num_rows($result3);
										while($row=mysql_fetch_array($result3))
										{
										$total_gasto_3_0302=$row['total_gasto_3_0302'];
										}

										$result3=mysql_query("SELECT SUM(total_gasto) as total_gasto_3_0303 FROM $basee WHERE clave=$clave and clave_par='0303'", $connect);
										$totalregistros=mysql_num_rows($result3);
										while($row=mysql_fetch_array($result3))
										{
										$total_gasto_3_0303=$row['total_gasto_3_0303'];
										}

										$result3=mysql_query("SELECT SUM(total_gasto) as total_gasto_3_0305 FROM $basee WHERE clave=$clave and clave_par='0305'", $connect);
										$totalregistros=mysql_num_rows($result3);
										while($row=mysql_fetch_array($result3))
										{
										$total_gasto_3_0305=$row['total_gasto_3_0305'];
										}

										$result3=mysql_query("SELECT SUM(total_gasto) as total_gasto_3_0317 FROM $basee WHERE clave=$clave and clave_par='0317'", $connect);
										$totalregistros=mysql_num_rows($result3);
										while($row=mysql_fetch_array($result3))
										{
										$total_gasto_3_0317=$row['total_gasto_3_0317'];
										}

										$result41=mysql_query("SELECT SUM(total_gastoo) as total_gasto_41 FROM $baseo WHERE clave=$clave and clave_par='0401'", $connect);
										$totalregistros=mysql_num_rows($result41);
										while($row=mysql_fetch_array($result41))
										{
										$total_gasto_41=$row['total_gasto_41'];
										}
							
										$result42=mysql_query("SELECT SUM(total_gastoo) as total_gasto_42 FROM $baseo WHERE clave=$clave and clave_par='0402'", $connect);
										$totalregistros=mysql_num_rows($result42);
										while($row=mysql_fetch_array($result42))
										{
										$total_gasto_42=$row['total_gasto_42'];
										}
							
										$result51=mysql_query("SELECT SUM(total_gastoo) as total_gasto_51 FROM $baseo WHERE clave=$clave and clave_par='0501'", $connect);
										$totalregistros=mysql_num_rows($result51);
										while($row=mysql_fetch_array($result51))
										{
										$total_gasto_51=$row['total_gasto_51'];
										}
							
										$result52=mysql_query("SELECT SUM(total_gastoo) as total_gasto_52 FROM $baseo WHERE clave=$clave and clave_par='0502'", $connect);
										$totalregistros=mysql_num_rows($result52);
										while($row=mysql_fetch_array($result52))
										{
										$total_gasto_52=$row['total_gasto_52'];
										}

										if ($colorfila==0)
										{
											$color= "#efefef";
											$colorfila=1;
										}
										else
										{
											$color="#ffffff";
											$colorfila=0;
										}
							
										$total=$gas_anual0101+$gas_anual0104+$gas_anual0105+$total_gasto_2_0201+$total_gasto_2_0202+$total_gasto_3_0301+$total_gasto_3_0302+$total_gasto_3_0303+$total_gasto_3_0305+$total_gasto_3_0317+$total_gasto_41+$total_gasto_42+$total_gasto_51+$total_gasto_52;

										echo"   <tr>";
										echo"     <td bgcolor=\"$color\" align=\"left\"><span class=\"spgreen\">$desc_del</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"left\"><span class=\"spgreen\">$desc_uops</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($ingreso_total,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gas_anual0101,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gas_anual0104,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gas_anual0105,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_2_0201,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_2_0202,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_3_0301,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_3_0302,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_3_0303,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_3_0305,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_3_0317,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_41,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_42,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_51,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_52,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total,2) . "</span></td>";									
										echo"   </tr>";

										$aux=$aux."   <tr>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"left\"><span class=\"spgreen\">$desc_del</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"left\"><span class=\"spgreen\">$desc_uops</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($ingreso_total,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gas_anual0101,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gas_anual0104,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gas_anual0105,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_2_0201,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_2_0202,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_3_0301,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_3_0302,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_3_0303,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_3_0305,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_3_0317,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_41,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_42,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_51,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_52,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total,2) . "</span></td>";									
										$aux=$aux."   </tr>";


										$gingreso_total+=$ingreso_total;
										$ggas_anual0101+=$gas_anual0101;
										$ggas_anual0104+=$gas_anual0104;
										$ggas_anual0105+=$gas_anual0105;
										$gtotal_gasto_2_0201+=$total_gasto_2_0201;
										$gtotal_gasto_2_0202+=$total_gasto_2_0202;
										$gtotal_gasto_3_0301+=$total_gasto_3_0301;
										$gtotal_gasto_3_0302+=$total_gasto_3_0302;
										$gtotal_gasto_3_0303+=$total_gasto_3_0303;
										$gtotal_gasto_3_0305+=$total_gasto_3_0305;
										$gtotal_gasto_3_0317+=$total_gasto_3_0317;
										$gtotal_gasto_41+=$total_gasto_41;
										$gtotal_gasto_42+=$total_gasto_42;
										$gtotal_gasto_51+=$total_gasto_51;
										$gtotal_gasto_52+=$total_gasto_52;
										$gtotal+=$total;

								}//while clabe


										echo"   <tr>";
										echo"     <td bgcolor=\"$color\" align=\"right\" colspan='2'><span class=\"spgreen\">GRAN TOTAL</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gingreso_total,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($ggas_anual0101,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($ggas_anual0104,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($ggas_anual0105,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_2_0201,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_2_0202,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_3_0301,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_3_0302,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_3_0303,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_3_0305,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_3_0317,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_41,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_42,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_51,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_52,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal,2) . "</span></td>";									
										echo"   </tr>";

										$aux=$aux."   <tr>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\" colspan='2'><span class=\"spgreen\">GRAN TOTAL</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gingreso_total,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($ggas_anual0101,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($ggas_anual0104,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($ggas_anual0105,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_2_0201,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_2_0202,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_3_0301,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_3_0302,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_3_0303,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_3_0305,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_3_0317,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_41,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_42,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_51,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_52,2) . "</span></td>";
										$aux=$aux."     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal,2) . "</span></td>";									
										$aux=$aux."   </tr>";


echo "</table>";
$aux=$aux."</table>";

fwrite($file,"$aux \n");
fclose($file);

echo "<br><br>";
echo "<table width=\"97%\">";


	echo "<tr><td align=\"center\"><a href=\"excel1.php\" target=\"_blank\">Enviar a Excel</a></td></tr>";

echo "</table>";

echo "</center>";


}


echo "</body>";
echo "</html>";
?>