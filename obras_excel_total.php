<?php

session_start();
$tipo_usuario=$_SESSION["tipo_usuario"];

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

$celda="#222";
$celda1="#333";
$celda2="#555";
$celdaf="#fff";
$celdaf1="#F0F0F9";


//$_SESSION['usuario_sistema']="$nombre $ape_pat $ape_mat";
$usuario_sistema=$_SESSION['usuario_sistema'];

echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"capturas.css\" >";

echo "<body>";

echo "<center><h1><font color=\"#000\">Detalle de gastos registrados en sistema $desc_uops</font></h1></center>";
$aux="<center><h4><font color=\"#000\">Detalle de gastos registradas en sistema</font></h4></center>";


echo "<center>";
echo "<table width=\"97%\" border=\"0\" bgcolor=\"#000\" cellpadding=\"0\" cellspacing=\"1\">";
echo "  <tr>";
echo "    <th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Delegacion</span></th>";
echo "    <th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">UOPSI</span></th>";
echo "    <th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Descripcion del concepto</span></th>";
echo "    <th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Cantidad</span></th>";
echo "    <th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Unidad</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">4.1 MANTO. A INST.</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">4.2 MANTO. EQ. DEPVO.</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">5.1 OBRA</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">5.2 EQ. DEPVO.</span></th>";
echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">TOTAL</span></th>";
echo "  </tr>";

$aux=$aux."<center>";
$aux=$aux."<table width=\"97%\" border=\"0\" bgcolor=\"#000000\" cellpadding=\"0\" cellspacing=\"1\">";
$aux=$aux."<tr>";
$aux=$aux."<th bgcolor=\"#efefef\" scope=\"col\"><span class=\"titulo_small\">Delegacion</span></th>";
$aux=$aux."<th bgcolor=\"#efefef\" scope=\"col\"><span class=\"titulo_small\">UOPSI</span></th>";
$aux=$aux."<th bgcolor=\"#efefef\" scope=\"col\"><span class=\"titulo_small\">Descripcion del concepto</span></th>";
$aux=$aux."<th bgcolor=\"#efefef\" scope=\"col\"><span class=\"titulo_small\">Cantidad</span></th>";
$aux=$aux."<th bgcolor=\"#efefef\" scope=\"col\"><span class=\"titulo_small\">Unidad</span></th>";
$aux=$aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">4.1 MANTO. A INST.</span></th>";
$aux=$aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">4.2 MANTO. EQ. DEPVO.</span></th>";
$aux=$aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">5.1 OBRA</span></th>";
$aux=$aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">5.2 EQ. DEPVO.</span></th>";
$aux=$aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">TOTAL</span></th>";
$aux=$aux."</tr>";

$colorfila=0;


/**/		
			//echo "SELECT DISTINCT (clave_del) FROM obras ORDER BY clave_del";
			$resulttot=mysql_query("SELECT DISTINCT (clave_del) FROM obras ORDER BY clave_del", $connect);
			$totalregistrostot=mysql_num_rows($resulttot);
			while($row=mysql_fetch_array($resulttot))
			{ //empieza conteo de clave_del
			$clave_del=$row['clave_del'];


				$gmonto0401=0;
				$gmonto0402=0;
				$gmonto0501=0;
				$gmonto0502=0;


				//echo "SELECT DISTINCT (clave) FROM obras WHERE clave_del='$clave_del' ORDER BY clave";		
				$resulttot1=mysql_query("SELECT DISTINCT (clave) FROM obras WHERE clave_del='$clave_del' ORDER BY clave", $connect);
				$totalregistrostot1=mysql_num_rows($resulttot1);
				while($row=mysql_fetch_array($resulttot1))
				{ //empieza conteo de clave_del
				$clave=$row['clave'];

	

					$result=mysql_query("SELECT COUNT(clave) as tre
										 FROM obras
										 WHERE clave_del='$clave_del'", $connect);
		
					$totalregistros=mysql_num_rows($result);
					while($row=mysql_fetch_array($result))
					{
					$tre=$row['tre'];
					}

/**/
					$result=mysql_query("select count(*) as cuantos
					from obras o
					where o.clave='$clave'", $connect);
		
					$totalregistros=mysql_num_rows($result);
					while($row=mysql_fetch_array($result))
					{
					$cuantos=$row['cuantos'];
					}
					$cuantos=$cuantos+1;
		
					$result=mysql_query("select o.id_conse_obra,o.id_proyecto,cd.desc_uops, cd.desc_del
					from obras o, cat_delegaciones cd
					where o.clave='$clave' and cd.clave=o.clave order by id_conse_obra", $connect);
		
					$totalregistros=mysql_num_rows($result);
					$valcolor==0;
					while($row=mysql_fetch_array($result))
					{ //datos
					$id_conse_obra=$row['id_conse_obra'];
					$id_proyecto=$row['id_proyecto'];
					$desc_uops=$row['desc_uops'];
					$desc_del=$row['desc_del'];
					
							if ($colorfila==0)
							{
								$color= "#ffffff";
								$colorfila=1;
							}
							else
							{
								$color="#efefef";
								$colorfila=0;
							}
		
							echo "  <tr>";
							echo "    <td align=\"center\" bgcolor=$color valign=\"middle\" rowspan=\"$cuantos\"><span class=\"spgreen\">$desc_del</span></td>";
							echo "    <td align=\"center\" bgcolor=$color valign=\"middle\" rowspan=\"$cuantos\"><span class=\"spgreen\">$desc_uops</span></td>";
							echo "    <td align=\"left\" bgcolor=$color valign=\"top\" colspan=\"8\"><span class=\"spgreen\"></span></td>";
							echo "  </tr>";
							
							$aux=$aux."  <tr>";
							$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"middle\" rowspan=\"$cuantos\"><span class=\"spgreen\">$desc_del</span></td>";
							$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"middle\" rowspan=\"$cuantos\"><span class=\"spgreen\">$desc_uops</span></td>";
							$aux=$aux."    <td align=\"left\" bgcolor=$color valign=\"top\" colspan=\"8\"><span class=\"spgreen\"></span></td>";
							$aux=$aux."  </tr>";
		
							$result=mysql_query("select o.monto as monto0401, o.problematica, o.cantidad, o.unidad
												 from obras o
												 where o.clave='$clave' and clave_par='0401'", $connect);
				
							$totalregistros=mysql_num_rows($result);
							$valcolor==0;
							while($row=mysql_fetch_array($result))
							{
								$monto0401=$row['monto0401'];
								$problematica=$row['problematica'];
								$cantidad=$row['cantidad'];
								$unidad=$row['unidad'];
			
								echo "  <tr>";
								echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$problematica</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0401,2) . "</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								echo "  </tr>";
								$gmonto0401+=$monto0401;
								
								$aux=$aux."  <tr>";
								$aux=$aux."    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$problematica</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0401,2) . "</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								$aux=$aux."  </tr>";
							}
		
							$result=mysql_query("select o.monto as monto0402, o.problematica, o.cantidad, o.unidad
												 from obras o
												 where o.clave='$clave' and clave_par='0402'", $connect);
				
							$totalregistros=mysql_num_rows($result);
							$valcolor==0;
							while($row=mysql_fetch_array($result))
							{
							$monto0402=$row['monto0402'];
							$problematica=$row['problematica'];
							$cantidad=$row['cantidad'];
							$unidad=$row['unidad'];
		
								echo "  <tr>";
								echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$problematica</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0402,2) . "</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								echo "  </tr>";
								$gmonto0402+=$monto0402;
								
								$aux=$aux."  <tr>";
								$aux=$aux."    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$problematica</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0402,2) . "</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								$aux=$aux."  </tr>";
							}
		
		
							$result=mysql_query("select o.monto as monto0501, o.problematica, o.cantidad, o.unidad
												 from obras o
												 where o.clave='$clave' and clave_par='0501'", $connect);
				
							$totalregistros=mysql_num_rows($result);
							$valcolor==0;
							while($row=mysql_fetch_array($result))
							{
							$monto0501=$row['monto0501'];
							$problematica=$row['problematica'];
							$cantidad=$row['cantidad'];
							$unidad=$row['unidad'];
		
								echo "  <tr>";
								echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$problematica</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0501,2) . "</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								echo "  </tr>";
		
								$gmonto0501+=$monto0501;
		
								$aux=$aux."  <tr>";
								$aux=$aux."    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$problematica</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0501,2) . "</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								$aux=$aux."  </tr>";
							}
		
		
							$result=mysql_query("select o.monto as monto0502, o.problematica, o.cantidad, o.unidad
												 from obras o
												 where o.clave='$clave' and clave_par='0502'", $connect);
				
							$totalregistros=mysql_num_rows($result);
							$valcolor==0;
							while($row=mysql_fetch_array($result))
							{
							$monto0502=$row['monto0502'];
							$problematica=$row['problematica'];
							$cantidad=$row['cantidad'];
							$unidad=$row['unidad'];
		
								echo "  <tr>";
								echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$problematica</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0502,2) . "</span></td>";
								echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								echo "  </tr>";
								
								$gmonto0502+=$monto0502;
								
								$aux=$aux."  <tr>";
								$aux=$aux."    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$problematica</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0502,2) . "</span></td>";
								$aux=$aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
								$aux=$aux."  </tr>";
							}
		
		
								$gtotal+=$montot;
					}			
		
		$gmontot=$gmonto0401+$gmonto0402+$gmonto0501+$gmonto0502;
		
				}// termina clave		
		echo "  <tr>";
		echo "    <td align=\"right\" bgcolor=$celda1 colspan=\"5\"><span class=\"titulo_small\">Totales: &nbsp;</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0401,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0402,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0501,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0502,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmontot,2) . "</span></td>";
		echo "  </tr>";
		
		$aux=$aux."  <tr>";
		$aux=$aux."    <td align=\"right\" bgcolor=\"#efefef\" colspan=\"5\"><span class=\"titulo_small\">Totales: &nbsp;</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0401,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0402,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0501,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0502,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmontot,2) . "</span></td>";
		$aux=$aux."  </tr>";

		$tgmonto0401+=$gmonto0401;
		$tgmonto0402+=$gmonto0402;
		$tgmonto0501+=$gmonto0501;
		$tgmonto0502+=$gmonto0502;				

		$tgmontot=$tgmonto0401+$tgmonto0402+$tgmonto0501+$tgmonto0502;

			}// termina clave_del


		echo "  <tr>";
		echo "    <td align=\"right\" bgcolor=$celda1 colspan=\"5\"><span class=\"titulo_small\">Gran Total: &nbsp;</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0401,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0402,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0501,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0502,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmontot,2) . "</span></td>";
		echo "  </tr>";
		
		$aux=$aux."  <tr>";
		$aux=$aux."    <td align=\"right\" bgcolor=\"#efefef\" colspan=\"5\"><span class=\"titulo_small\">Gran Total: &nbsp;</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0401,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0402,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0501,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0502,2) . "</span></td>";
		$aux=$aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmontot,2) . "</span></td>";
		$aux=$aux."  </tr>";


echo "</table>";

$aux=$aux."</table>";
fwrite($file,"$aux \n");
fclose($file);

print("<tr><td bgcolor=\"#efefef\" ><span class=\"textoformulario\"><b>Proceso Completo&nbsp;<a href=\"excel1.php\" class=\"small_link\">Abrir archivo</a></td></tr>");

echo "</center>";
echo "</body>";
echo "</html>";
?>