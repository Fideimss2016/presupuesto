<?php
	session_start();

	$clave = $_SESSION["clave"];

	include "clases/variablesbd.php";

	//conexion a la base de datos
	$connect = mysql_connect("$host","$user","$passworks");
	//Seleccion de la base
	mysql_select_db("$dbname",$connect);

	$celda = "#222222";
	$celda1 = "#333333";
	$celda2 = "#555555";
	$celdaf = "#ffffff";
	$celdaf1 = "#F0F0F9";

	$usuario_sistema = $_SESSION['usuario_sistema'];
	$consup = substr($clave,0,2);

	echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"capturas.css\" >";

	echo "<body>";

	echo "<center><h1><font color=\"#000\">Resumen del Presupuesto de Ingresos - Egresos para el Ejercicio 2017</font></h1></center>";

	echo "<center>";
	echo "<table width=\"97%\" border=\"0\" bgcolor=\"#000\" cellpadding=\"1\" cellspacing=\"2\">";
	echo"  <tr>";
	echo"     <th bgcolor=$celda rowspan=\"3\" scope=\"col\"><span class=\"titulo_small\">DELEGACION</span></th>";
	echo"     <th bgcolor=$celda rowspan=\"3\" scope=\"col\"><span class=\"titulo_small\">UNIDAD OPERATIVA</span></th>";
	echo"     <th bgcolor=$celda rowspan=\"3\" scope=\"col\"><span class=\"titulo_small\">INGRESOS</span></th>";
	echo"     <th bgcolor=$celda colspan=\"13\" scope=\"col\"><span class=\"titulo_small\">EGRESOS</span></th>";
	echo"     <th bgcolor=$celda rowspan=\"3\" scope=\"col\"><span class=\"titulo_small\">TOTAL</span></th>";
	echo"   </tr>";
	echo"   <tr>";
	echo"     <td colspan=\"2\" bgcolor=$celda align=\"center\"><p><span class=\"titulo_small\"><b>CAPITULO 1</b></span></td>";
	echo"     <td colspan=\"1\" bgcolor=$celda align=\"center\"><p><span class=\"titulo_small\"><b>CAPITULO 2</b></span></td>";
	echo"     <td colspan=\"4\" bgcolor=$celda align=\"center\"><span class=\"titulo_small\"><b>CAPITULO 3</b></span></td>";
	echo"     <td colspan=\"2\" bgcolor=$celda align=\"center\"><span class=\"titulo_small\"><b>CAPITULO 4</b></span></td>";
	echo"     <td colspan=\"1\" bgcolor=$celda align=\"center\"><span class=\"titulo_small\"><b>CAPITULO 5</b></span></td>";
	echo"     <td colspan=\"3\" bgcolor=$celda align=\"center\"><span class=\"titulo_small\"><b>CAPITULO 6</b></span></td>";
	echo"   </tr>";
	echo"   <tr>";
	echo"     <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">0102</span></td>";
	echo"     <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">0104</span></td>";
	echo"     <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">0203</span></td>";
	echo"     <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">0302</span></td>";
	echo"     <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">0311</span></td>";
	echo"     <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">0312</span></td>";
	echo"     <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">0318</span></td>";
	echo"	  <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">0401</span></td>";
	echo"     <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">0402</span></td>";
	echo"     <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">0501</span></td>";
	echo"     <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">0601</span></td>";
	echo"     <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">0602</span></td>";
	echo"     <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">0603</span></td>";
	echo"   </tr>";

	$colorfila = 0;

	$result = mysql_query("select distinct(vobo.clave) as clave, cd.desc_uops, cd.desc_del from vobo, cat_delegaciones cd where vobo.clave like '$consup%' and cd.clave=vobo.clave order by clave", $connect);
									
	$totalregistros = mysql_num_rows($result);

	$basei = "ingresos";
	$basee = "egresos";
	$baseo = "obras";
	$basep = "personal";

	while($row = mysql_fetch_array($result))
	{
		$desc_uops = $row['desc_uops'];
		$desc_del = $row['desc_del'];
		$clave = $row['clave'];

		$resulti = mysql_query("select sum(i.ingreso_total) as ingreso_total from ingresos i where clave='$clave'", $connect);
		$totalregistros = mysql_num_rows($resulti);
		$valcolor = 0;
		while($row = mysql_fetch_array($resulti))
		{
			$ingreso_total = $row['ingreso_total'];
		}
											
		$resulti = mysql_query("select sum(i.ingreso_total) as ingreso_total from $basei i where clave = '$clave'", $connect);
		$totalregistros = mysql_num_rows($resulti);
		$valcolor = 0;
		while($row = mysql_fetch_array($resulti))
		{
			$ingreso_total = $row['ingreso_total'];
		}
														
		$result1 = mysql_query("SELECT SUM(gas_anual) as gas_anual0101 FROM $basep WHERE clave = '$clave' and clave_par = '0102'", $connect);
		$totalregistros = mysql_num_rows($result1);
		while($row = mysql_fetch_array($result1))
		{
			$total_gasto_1_0102 = $row['gas_anual0101'];
		}

		$result1 = mysql_query("SELECT SUM(gas_anual) as gas_anual0104 FROM $basep WHERE clave = '$clave' and clave_par = '0104'", $connect);
		$totalregistros = mysql_num_rows($result1);
		while($row = mysql_fetch_array($result1))
		{
			$total_gasto_1_0104 = $row['gas_anual0104'];
		}

		$result23 = mysql_query("SELECT SUM(total_gasto) as total_gasto_2_0203 FROM $basee WHERE clave = '$clave' and clave_par = '0203'", $connect);
		$totalregistros = mysql_num_rows($result23);
		while($row = mysql_fetch_array($result23))
		{
			$total_gasto_2_0203 = $row['total_gasto_2_0203'];
		}

		$result32 = mysql_query("SELECT SUM(total_gasto) as total_gasto_3_0302 FROM $basee WHERE clave = '$clave' and clave_par = '0302'", $connect);
		$totalregistros = mysql_num_rows($result32);
		while($row = mysql_fetch_array($result32))
		{
			$total_gasto_3_0302 = $row['total_gasto_3_0302'];
		}

		$result311 = mysql_query("SELECT SUM(total_gastoo) as total_gasto_3_0311 FROM $baseo WHERE clave = '$clave' and clave_par = '0311'", $connect);
		$totalregistros = mysql_num_rows($result311);
		while($row = mysql_fetch_array($result311))
		{
			$total_gasto_3_0311 = $row['total_gasto_3_0311'];
		}

		$result318 = mysql_query("SELECT SUM(total_gasto) as total_gasto_3_0318 FROM $basee WHERE clave = '$clave' and clave_par = '0318'", $connect);
		$totalregistros = mysql_num_rows($result318);
		while($row = mysql_fetch_array($result318))
		{
			$total_gasto_3_0318 = $row['total_gasto_3_0318'];
		}

		$result41 = mysql_query("SELECT SUM(total_gasto) as total_gasto_41 FROM $basee WHERE clave = '$clave' and clave_par = '0401'", $connect);
		$totalregistros = mysql_num_rows($result41);
		while($row = mysql_fetch_array($result41))
		{
			$total_gasto_41 = $row['total_gasto_41'];
		}
										
		$result42 = mysql_query("SELECT SUM(total_gasto) as total_gasto_42 FROM $basee WHERE clave = '$clave' and clave_par = '0402'", $connect);
		$totalregistros = mysql_num_rows($result42);
		while($row=mysql_fetch_array($result42))
		{
			$total_gasto_42=$row['total_gasto_42'];
		}
										
		$result51 = mysql_query("SELECT SUM(total_gastoo) as total_gasto_51 FROM $baseo WHERE clave = '$clave' and clave_par = '0501'", $connect);
		$totalregistros = mysql_num_rows($result51);
		while($row = mysql_fetch_array($result51))
		{
			$total_gasto_51 = $row['total_gasto_51'];
		}

		$result61 = mysql_query("SELECT SUM(total_gastoo) as total_gasto_61 FROM $baseo WHERE clave = '$clave' and clave_par = '0601'", $connect);
		$totalregistros = mysql_num_rows($result61);
		while($row = mysql_fetch_array($result61))
		{
			$total_gasto_61 = $row['total_gasto_61'];
		}

		$result62 = mysql_query("SELECT SUM(total_gastoo) as total_gasto_62 from $baseo where clave = '$clave' and clave_par = '0602'", $connect);
		$totalregistros = mysql_num_rows($result62);
		while($row = mysql_fetch_array($result62))
		{
			$total_gasto_62 = $row['total_gasto_62'];
		}

		$result63 = mysql_query("SELECT SUM(total_gastoo) as total_gasto_63 from $baseo where clave = '$clave' and clave_par = '0603'", $connect);
		$totalregistros = mysql_num_rows($result63);
		while($row = mysql_fetch_array($result63))
		{
			$total_gasto_63 = $row['total_gasto_63'];
		}

		if ($colorfila == 0)
		{
			$color = "#efefef";
			$colorfila = 1;
		}
		else
		{
			$color = "#ffffff";
			$colorfila = 0;
		}
										
		$total = $total_gasto_1_0102 + $total_gasto_1_0104 + $total_gasto_2_0203 + $total_gasto_3_0302 + $total_gasto_3_0311 + $total_gasto_3_0312 + $total_gasto_3_0318  + $total_gasto_41 + $total_gasto_42 + $total_gasto_51 + $total_gasto_61 + $total_gasto_62 + $total_gasto_63;
		$diferencia = $ingreso_total - $total;

		if ($colorfila == 0)
		{
			$color = "#efefef";
			$colorfila = 1;
		}
		else
		{
			$color = "#ffffff";
			$colorfila = 0;
		}

		echo"   <tr>";
		echo"     <td bgcolor=\"$color\" align=\"left\"><span class=\"spgreen\">$desc_del</span></td>";
		echo"     <td bgcolor=\"$color\" align=\"left\"><span class=\"spgreen\">$desc_uops</span></td>";
				echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($ingreso_total,2) . "</span></td>";
				echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_1_0102,2) . "</span></td>";
				echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_1_0104,2) . "</span></td>";

				echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_2_0203,2) . "</span></td>";

				echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_3_0302,2) . "</span></td>";
				echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_3_0311,2) . "</span></td>";
				echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_3_0312,2) . "</span></td>";
				echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_3_0318,2) . "</span></td>";
				
				echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_41,2) . "</span></td>";
				echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_42,2) . "</span></td>";

				echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_51,2) . "</span></td>";
				
				echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_61,2) . "</span></td>";
				echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_62,2) . "</span></td>";
				echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total_gasto_63,2) . "</span></td>";
				echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($total,2) . "</span></td>";									
				echo"   </tr>";
											
				$gingreso_total += $ingreso_total;
				$gtotal_gasto_1_0102 += $total_gasto_1_0102;
				$gtotal_gasto_1_0104 += $total_gasto_1_0104;

				$gtotal_gasto_2_0203 += $total_gasto_2_0203;

				$gtotal_gasto_3_0302 += $total_gasto_3_0302;
				$gtotal_gasto_3_0311 += $total_gasto_3_0311;
				$gtotal_gasto_3_0312 += $total_gasto_3_0312;
				$gtotal_gasto_3_0318 += $total_gasto_3_0318;

				$gtotal_gasto_41 += $total_gasto_41;
				$gtotal_gasto_42 += $total_gasto_42;

				$gtotal_gasto_52 += $total_gasto_51;
				$gtotal_gasto_61 += $total_gasto_61;
				$gtotal_gasto_62 += $total_gasto_62;
				$gtotal_gasto_63 += $total_gasto_63;
				$gtotal += $total;
			}//while clabe

			echo"   <tr>";
			echo"     <td bgcolor=\"$color\" align=\"right\" colspan='2'><span class=\"spgreen\">GRAN TOTAL</span></td>";
			echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gingreso_total,2) . "</span></td>";
			echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_1_0102,2) . "</span></td>";
			echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_1_0104,2) . "</span></td>";

			echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_2_0203,2) . "</span></td>";

			echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_3_0302,2) . "</span></td>";
			echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_3_0311,2) . "</span></td>";
			echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_3_0312,2) . "</span></td>";
			echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_3_0318,2) . "</span></td>";

			echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_41,2) . "</span></td>";
			echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_42,2) . "</span></td>";

			echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_51,2) . "</span></td>";
			echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_61,2) . "</span></td>";
			echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_62,2) . "</span></td>";
			echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal_gasto_63,2) . "</span></td>";
			echo"     <td bgcolor=\"$color\" align=\"right\"><span class=\"spgreen\">" . number_format($gtotal,2) . "</span></td>";									
			echo"   </tr>";

	echo "</table>";

	echo "<br><br>";
	echo "<table width=\"97%\">";


		echo "<tr><td align=\"center\"><a href=\"revision_pdfx.php\" target=\"_blank\">Imprimir</a></td></tr>";

	echo "</table>";

	echo "</center>";
	echo "</body>";
	echo "</html>";
?>