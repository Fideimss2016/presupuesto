<?php
	session_start();
	if(isset($_SESSION['clave'])){$clave = $_SESSION["clave"];}

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

	//$_SESSION['usuario_sistema']="$nombre $ape_pat $ape_mat";
	$usuario_sistema = $_SESSION['usuario_sistema'];

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
	echo"     <td bgcolor=$celda rowspan=\"3\" scope=\"col\"><span class=\"titulo_small\">TOTAL</span></td>";
	echo"   </tr>";
	echo"   <tr>";
	echo"     <td colspan=\"2\" bgcolor=$celda align=\"center\"><p><span class=\"titulo_small\"><b>CAPITULO 1</b></span></p></td>";
	echo"     <td rowspan=\"1\" bgcolor=$celda align=\"center\"><p><span class=\"titulo_small\"><b>CAPITULO 2</b></span></p></td>";
	echo"     <td colspan=\"4\" bgcolor=$celda align=\"center\"><p><span class=\"titulo_small\"><b>CAPITULO 3</b></span></p></td>";
	echo"	  <td colspan=\"2\" bgcolor=$celda align=\"center\"><p><span class=\"titulo_small\"><b>CAPITULO 4</b></span></p></td>";
	echo"     <td rowspan=\"1\" bgcolor=$celda align=\"center\"><p><span class=\"titulo_small\"><b>CAPITULO 5</b></span></p></td>";
	echo"     <td colspan=\"3\" bgcolor=$celda align=\"center\"><p><span class=\"titulo_small\"><b>CAPITULO 6</b></span></p></td>";
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
	echo"	  <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">0402</span></td>";
	echo"     <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">0501</span></td>";
	echo"     <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">0601</span></td>";
	echo"     <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">0602</span></td>";
	echo"     <td bgcolor=$celda align=\"center\"><span class=\"titulo_small\">0603</span></td>";
	echo"   </tr>";

	$colorfila = 0;

	$result = mysql_query("select distinct(vobo.clave) as clave, cd.desc_uops, cd.desc_del from vobo, cat_delegaciones cd where cd.clave=vobo.clave and vobo.clave = '$clave' order by clave", $connect);
									
	$totalregistros = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
		$desc_uops = $row['desc_uops'];
		$desc_del = $row['desc_del'];
		$clave = $row['clave'];

		$resulti = mysql_query("select sum(i.ingreso_total) as ingreso_total from ingresos i where clave='$clave'", $connect);
		$totalregistros = mysql_num_rows($resulti);
		$valcolor = 0;
		while($row=mysql_fetch_array($resulti))
		{
			$ingreso_total = $row['ingreso_total'];
//			echo "Ingreso total " . $ingreso_total;
		}
											
		$result1_2 = mysql_query("SELECT SUM(gas_anual) as total_gasto12 FROM personal WHERE clave = '$clave' and clave_par = '0102'", $connect);
		$totalregistros = mysql_num_rows($result1_2);
		while($row = mysql_fetch_array($result1_2))
		{
			$total_gasto_12 = $row['total_gasto12'];
//			echo "Ingreso 12 " . $total_gasto_12;
		}

		$result1_4 = mysql_query("SELECT SUM(gas_anual) as total_gasto14 FROM personal WHERE clave = '$clave' and clave_par = '0104'", $connect);
		$totalregistros = mysql_num_rows($result1_4);
		while($row = mysql_fetch_array($result1_4))
		{
			$total_gasto_14 = $row['total_gasto14'];
//			echo "Ingreso 14 " . $total_gasto_14;
		}

/*
		$resultcap = mysql_query("SELECT SUM(total_gasto) as total_gasto_cap FROM egresos WHERE clave='$clave' and id_par='01'", $connect);
		$totalregistros = mysql_num_rows($resultcap);
		while($row = mysql_fetch_array($resultcap))
		{
			$total_gasto_cap = $row['total_gasto_cap'];
		}
		//ECHO "SELECT SUM(total_gasto) as total_gasto_cap FROM egresos WHERE clave=$clave and id_par='01'";
		$cap1 = $gas_anual + $total_gasto_cap;
*/

		$result2_3 = mysql_query("SELECT SUM(total_gasto) as total_gasto_23 FROM egresos WHERE clave = '$clave' and clave_par = '0203'", $connect);
		$totalregistros = mysql_num_rows($result2_3);
		while($row=mysql_fetch_array($result2_3))
		{
			$total_gasto_23 = $row['total_gasto_23'];
//			echo "Ingreso 23 " . $total_gasto_23;
		}
								
		$result3_2 = mysql_query("SELECT SUM(total_gasto) as total_gasto_3 FROM egresos WHERE clave = '$clave' and clave_par = '0302'", $connect);
		$totalregistros = mysql_num_rows($result3_2);
		while($row=mysql_fetch_array($result3_2))
		{
			$total_gasto_32 = $row['total_gasto_3'];
//			echo "Ingreso 32 " . $total_gasto_32;
		}

		$result311 = mysql_query("SELECT SUM(monto) as total_gasto_3 FROM obras WHERE clave = '$clave' and clave_par='0311'", $connect);
		$totalregistros = mysql_num_rows($result311);
		while($row=mysql_fetch_array($result311))
		{
			$total_gasto_311 = $row['total_gasto_3'];
//			echo "Ingreso 311 " . $total_gasto_31;
		}

		$result312 = mysql_query("SELECT SUM(total_gasto) as total_gasto_3 FROM egresos WHERE clave = '$clave' and clave_par='0312'", $connect);
		$totalregistros = mysql_num_rows($result312);
		while($row=mysql_fetch_array($result312))
		{
			$total_gasto_312 = $row['total_gasto_3'];
//			echo "Ingreso 312 " . $total_gasto_312;
		}

		$result318 = mysql_query("SELECT SUM(total_gasto) as total_gasto_3 FROM egresos WHERE clave = '$clave' and clave_par='0318'", $connect);
		$totalregistros = mysql_num_rows($result318);
		while($row=mysql_fetch_array($result318))
		{
			$total_gasto_318 = $row['total_gasto_3'];
//			echo "Ingreso 318 " . $total_gasto_318;
		}

		$result41 = mysql_query("SELECT SUM(total_gasto) as total_gasto_41 FROM egresos WHERE clave='$clave' and clave_par='0401'", $connect);
		$totalregistros = mysql_num_rows($result41);
		while($row = mysql_fetch_array($result41))
		{
			$total_gasto_41 = $row['total_gasto_41'];
//			echo "Ingreso 41 " . $total_gasto_41;
		}

		$result42 = mysql_query("SELECT SUM(total_gasto) as total_gasto_42 FROM egresos WHERE clave='$clave' and clave_par='0402'", $connect);
		$totalregistros = mysql_num_rows($result42);
		while($row = mysql_fetch_array($result42))
		{
			$total_gasto_42 = $row['total_gasto_42'];
//			echo "Ingreso 42 " . $total_gasto_42;
		}

		$result51 = mysql_query("SELECT SUM(monto) as total_gasto_51 FROM obras WHERE clave='$clave' and clave_par='0501'", $connect);
		$totalregistros = mysql_num_rows($result51);
		while($row=mysql_fetch_array($result51))
		{
			$total_gasto_51 = $row['total_gasto_51'];
//			echo "Ingreso 51 " . $total_gasto_51;
		}
/*								
								
		$result51 = mysql_query("SELECT SUM(total_gastoo) as total_gasto_51 FROM obras WHERE clave=$clave and clave_par='0501'", $connect);
		$totalregistros = mysql_num_rows($result51);
		while($row=mysql_fetch_array($result51))
		{
			$total_gasto_51 = $row['total_gasto_51'];
		}
								
		$result52 = mysql_query("SELECT SUM(total_gastoo) as total_gasto_52 FROM obras WHERE clave=$clave and clave_par='0502'", $connect);
		$totalregistros = mysql_num_rows($result52);
		while($row = mysql_fetch_array($result52))
		{
			$total_gasto_52 = $row['total_gasto_52'];
		}
*/		

		$result61 = mysql_query("select sum(total_gastoo) as total_gasto_61 from obras where clave = '$clave' and clave_par = '0601' and activo = 1", $connect);
		$totalregistros = mysql_num_rows($result61);
		while($row = mysql_fetch_array($result61))
		{
			$total_gasto_61 = $row['total_gasto_61'];
//			echo "Ingreso 61 " . $total_gasto_61;
		}

		$result62 = mysql_query("select sum(total_gastoo) as total_gasto_62 from obras where clave = '$clave' and clave_par = '0602' and activo = 1", $connect);
		$totalregistros = mysql_num_rows($result62);
		while($row = mysql_fetch_array($result62))
		{
			$total_gasto_62 = $row['total_gasto_62'];
//			echo "Ingreso 62 " . $total_gasto_62;
		}

		$result63 = mysql_query("select sum(total_gastoo) as total_gasto_63 from obras where clave = '$clave' and clave_par = '0603' and activo = 1", $connect);
		$totalregistros = mysql_num_rows($result63);
		while($row = mysql_fetch_array($result63))
		{
			$total_gasto_63 = $row['total_gasto_63'];
//			echo "Ingreso 63 " . $total_gasto_63;
		}

		//$total=$total_gasto_1+$total_gasto_2+$total_gasto_3+$total_gasto_41+$total_gasto_42+$total_gasto_51+$total_gasto_52;
		//$total = $cap1 + $total_gasto_2 + $total_gasto_3 + $total_gasto_41 + $total_gasto_42 + $total_gasto_51 + $total_gasto_61 + $total_gasto_62 + $total_gasto_63;
		$total = $total_gasto_12 + $total_gasto_14 + $total_gasto_23 + $total_gasto_32 + $total_gasto_311 + $total_gasto_312 + $total_gasto_318 + $total_gasto_41 + $total_gasto_42 + $total_gasto_51 + $total_gasto_61 + $total_gasto_62 + $total_gasto_63;
		$diferencia = $ingreso_total - $total;
								
		if ($colorfila==0)
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
		echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">$desc_del</span></td>";
		echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">$desc_uops</span></td>";
		echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($ingreso_total,2) . "</span></td>";
//		echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($cap1,2) . "</span></td>";
		echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gasto_12,2) . "</span></td>";
		echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gasto_14,2) . "</span></td>";
		echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gasto_23,2) . "</span></td>";			
		echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gasto_32,2) . "</span></td>";
		echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gasto_311,2) . "</span></td>";
		echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gasto_312,2) . "</span></td>";
		echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gasto_318,2) . "</span></td>";
		echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gasto_41,2) . "</span></td>";
		echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gasto_42,2) . "</span></td>";
		echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gasto_51,2) . "</span></td>";			
		echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gasto_61,2) . "</span></td>";
		echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gasto_62,2) . "</span></td>";
		echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total_gasto_63,2) . "</span></td>";
		echo"     <td bgcolor=\"$color\" align=\"center\"><span class=\"spgreen\">" . number_format($total,2) . "</span></td>";
		echo"   </tr>";
											
		$gingreso_total += $ingreso_total;
		$gtotal_gasto_12 += $total_gasto_12;
		$gtotal_gasto_14 += $total_gasto_14;
		//$ggas_anual += $gas_anual;
		//$cgas_anual += $cap1;
		//$gtotal_gasto_2 += $total_gasto_2;
		$gtotal_gasto_23 += $total_gasto_23;
		//$gtotal_gasto_3 += $total_gasto_3;
		$gtotal_gasto_32 += $total_gasto_32;
		$gtotal_gasto_311 += $total_gasto_311;
		$gtotal_gasto_312 += $total_gasto_312;
		$gtotal_gasto_318 += $total_gasto_318;
		$gtotal_gasto_41 += $total_gasto_41;
		$gtotal_gasto_42 += $total_gasto_42;
		$gtotal_gasto_51 += $total_gasto_51;
		$gtotal_gasto_61 += $total_gasto_61;
		$gtotal_gasto_62 += $total_gasto_62;
		$gtotal_gasto_63 += $total_gasto_63;
		$gtotal += $total;

	}//while clabe

	echo"   <tr>";
	echo"     <td bgcolor=\"$celda\" align=\"right\" colspan=\"2\"><span class=\"titulo_small\">Totales:&nbsp;</span></td>";
	echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gingreso_total,2) . "</span></td>";
//	echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($cgas_anual,2) . "</span></td>";
//	echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($cap1,2) . "</span></td>";
	echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal_gasto_12,2) . "</span></td>";
	echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal_gasto_14,2) . "</span></td>";
	echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal_gasto_23,2) . "</span></td>";			
	echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal_gasto_32,2) . "</span></td>";
	echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal_gasto_311,2) . "</span></td>";
	echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal_gasto_312,2) . "</span></td>";
	echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal_gasto_318,2) . "</span></td>";
	echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal_gasto_41,2) . "</span></td>";			
	echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal_gasto_42,2) . "</span></td>";			
	echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal_gasto_51,2) . "</span></td>";			
	echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal_gasto_61,2) . "</span></td>";
	echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal_gasto_62,2) . "</span></td>";
	echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal_gasto_63,2) . "</span></td>";
	echo"     <td bgcolor=\"$celda\" align=\"center\"><span class=\"titulo_small\">" . number_format($gtotal,2) . "</span></td>";									
	echo"   </tr>";
	echo "</table>";
	echo "<br><br>";
	echo "<table width=\"97%\">";
	//echo "<tr><td align=\"center\"><a href=\"revision_pdf_judX.php\" target=\"_blank\">Imprimir</a></td></tr>";
	echo "<tr><td align=\"center\"><a href=\"revision_pdf_cssx.php\" target=\"_blank\">Imprimir</a></td></tr>";
	echo "</table>";
	echo "</center>";
	echo "</body>";
	echo "</html>";
?>