<?php

session_start();
$clave=$_SESSION["clave"];

include "clases/variablesbd.php";

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
$consup=substr($clave,0,2);

echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"capturas.css\" >";

echo "<body>";

echo "<center><h1><font color=\"#000\">Resumen del Presupuesto de Ingresos - Egresos para el Ejercicio 2017</font></h1></center>";

echo "<center>";
echo "<table width=\"97%\" border=\"0\" bgcolor=\"#000\" cellpadding=\"1\" cellspacing=\"2\">";
echo"  <tr>";
echo"     <th bgcolor=$celda rowspan=\"3\" scope=\"col\"><span class=\"titulo_small\">UNIDAD OPERATIVA</span></th>";
echo"     <th bgcolor=$celda rowspan=\"3\" scope=\"col\"><span class=\"titulo_small\">INGRESOS</span></th>";
echo"     <th bgcolor=$celda colspan=\"8\" scope=\"col\"><span class=\"titulo_small\">EGRESOS</span></th>";
echo"   </tr>";
echo"   <tr>";
echo"     <td rowspan=\"2\" bgcolor=$celda align=\"center\"><p><span class=\"titulo_small\"><b>CAPITULO 1</b></span></p>";
echo"     <p><span class=\"titulo_small\">SERVICIOS PERSONALES</span></p></td>";
echo"     <td rowspan=\"2\" bgcolor=$celda align=\"center\"><p><span class=\"titulo_small\"><b>CAPITULOS 2</b></span></p>";
echo"     <p><span class=\"titulo_small\">BIENES DE CONSUMO</span></p></td>";
echo"     <td rowspan=\"2\" bgcolor=$celda align=\"center\"><span class=\"titulo_small\"><p><b>CAPITULO 3</b></span></p>";
echo"     <p><span class=\"titulo_small\">SERVICIOS GENERALES</span></p></td>";
echo"     <td colspan=\"2\" bgcolor=$celda align=\"center\"><span class=\"titulo_small\"><b>CAPITULO 4</b> CONSERVACION</span></td>";
echo"     <td colspan=\"2\" bgcolor=$celda align=\"center\"><span class=\"titulo_small\"><b>CAPITULO 5</b> INVERSION FISICA</span></td>";
echo"     <td rowspan=\"2\" bgcolor=$celda align=\"center\"><span class=\"titulo_small\">TOTAL</span></td>";
echo"   </tr>";
echo"   <tr>";
echo"     <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">4.1 MANTENIMIENTO DE INSTALACIONES</span></td>";
echo"     <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">4.2 MANTENIMIENTO DE EQUIPO</span></td>";
echo"     <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">5.1 OBRA PUBLICA</span></td>";
echo"     <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">5.2 EQUIPO DEPORTIVO</span></td>";
echo"   </tr>";

$colorfila=0;

$result=mysql_query("select distinct(vobo.clave) as clave, cd.desc_uops, cd.desc_del from vobo, cat_delegaciones cd where cd.clave=vobo.clave order by clave", $connect);
								
$totalregistros=mysql_num_rows($result);


while($row=mysql_fetch_array($result))
{
$desc_uops=$row['desc_uops'];
$desc_del=$row['desc_del'];
$clave=$row['clave'];



										$resulti=mysql_query("select sum(i.ingreso_total) as ingreso_total from ingresos i where clave=$clave", $connect);
										//echo "select sum(i.ingreso_total) as ingreso_total from ingresos i where clave=$clave";
										$totalregistros=mysql_num_rows($resulti);
										$valcolor==0;
										while($row=mysql_fetch_array($resulti))
										{
										$ingreso_total=$row['ingreso_total'];
										}
										
										
											
										$result1=mysql_query("SELECT SUM(total_gasto) as total_gasto_1 FROM egresos WHERE clave=$clave and id_par='01'", $connect);
										$totalregistros=mysql_num_rows($result1);
										while($row=mysql_fetch_array($result1))
										{
										$total_gasto_1=$row['total_gasto_1'];
										}
							
										$result2=mysql_query("SELECT SUM(total_gasto) as total_gasto_2 FROM egresos WHERE clave=$clave and id_par='02'", $connect);
										$totalregistros=mysql_num_rows($result2);
										while($row=mysql_fetch_array($result2))
										{
										$total_gasto_2=$row['total_gasto_2'];
										}
							
										$result3=mysql_query("SELECT SUM(total_gasto) as total_gasto_3 FROM egresos WHERE clave=$clave and id_par='03'", $connect);
										$totalregistros=mysql_num_rows($result3);
										while($row=mysql_fetch_array($result3))
										{
										$total_gasto_3=$row['total_gasto_3'];
										}
							
										$result41=mysql_query("SELECT SUM(total_gasto) as total_gasto_41 FROM egresos WHERE clave=$clave and clave_par='0401'", $connect);
										$totalregistros=mysql_num_rows($result41);
										while($row=mysql_fetch_array($result41))
										{
										$total_gasto_41=$row['total_gasto_41'];
										}
							
										$result42=mysql_query("SELECT SUM(total_gasto) as total_gasto_42 FROM egresos WHERE clave=$clave and clave_par='0402'", $connect);
										$totalregistros=mysql_num_rows($result42);
										while($row=mysql_fetch_array($result42))
										{
										$total_gasto_42=$row['total_gasto_42'];
										}
							
										$result51=mysql_query("SELECT SUM(total_gasto) as total_gasto_51 FROM egresos WHERE clave=$clave and clave_par='0501'", $connect);
										$totalregistros=mysql_num_rows($result51);
										while($row=mysql_fetch_array($result51))
										{
										$total_gasto_51=$row['total_gasto_51'];
										}
							
										$result52=mysql_query("SELECT SUM(total_gasto) as total_gasto_52 FROM egresos WHERE clave=$clave and clave_par='0502'", $connect);
										$totalregistros=mysql_num_rows($result52);
										while($row=mysql_fetch_array($result52))
										{
										$total_gasto_52=$row['total_gasto_52'];
										}
							
										$total=$total_gasto_1+$total_gasto_2+$total_gasto_3+$total_gasto_41+$total_gasto_42+$total_gasto_51+$total_gasto_52;
										$diferencia=$ingreso_total-$total;
							
							
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
							
										echo"   <tr>";
										echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">$desc_uops</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($ingreso_total,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gasto_1,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gasto_2,2) . "</span></td>";			
										echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gasto_3,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gasto_41,2) . "</span></td>";			
										echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gasto_42,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gasto_51,2) . "</span></td>";			
										echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gasto_52,2) . "</span></td>";
										echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total,2) . "</span></td>";									
										echo"   </tr>";
										
										$gingreso_total+=$ingreso_total;
										$gtotal_gasto_1+=$total_gasto_1;
										$gtotal_gasto_2+=$total_gasto_2;
										$gtotal_gasto_3+=$total_gasto_3;
										$gtotal_gasto_41+=$total_gasto_41;
										$gtotal_gasto_42+=$total_gasto_42;
										$gtotal_gasto_51+=$total_gasto_51;
										$gtotal_gasto_52+=$total_gasto_52;
										$gtotal+=$total;

								}//while clabe

										echo"   <tr>";
										echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">totales</span></td>";
										echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gingreso_total,2) . "</span></td>";
										echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal_gasto_1,2) . "</span></td>";
										echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal_gasto_2,2) . "</span></td>";			
										echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal_gasto_3,2) . "</span></td>";
										echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal_gasto_41,2) . "</span></td>";			
										echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal_gasto_42,2) . "</span></td>";
										echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal_gasto_51,2) . "</span></td>";			
										echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal_gasto_52,2) . "</span></td>";
										echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal,2) . "</span></td>";									
										echo"   </tr>";


echo "</table>";

echo "<br><br>";
echo "<table width=\"97%\">";


	echo "<tr><td align=\"center\"><a href=\"revision_pdf.php\" target=\"_blank\">Imprimir</a></td></tr>";

echo "</table>";

echo "</center>";
echo "</body>";
echo "</html>";
?>