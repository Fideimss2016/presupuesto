<?php
	session_start();
	$tipo_usuario = $_SESSION["tipo_usuario"];

	include ("clases/variablesbd.php");

	$aux = "<?\n";
	$aux = $aux."header(\"Content-type: application/vnd.ms-excel\");\n";
	$aux = $aux."header(\"Content-Disposition: attachment; filename=excel.xls\");\n";
	$aux = $aux."?>\n";
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

	$connect = mysql_connect("$host","$user","$passworks");
	mysql_select_db("$dbname",$connect);

	$celda = "#222";
	$celda1 = "#333";
	$celda2 = "#555";
	$celdaf = "#fff";
	$celdaf1 = "#F0F0F9";

	$usuario_sistema = $_SESSION['usuario_sistema'];

	echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"capturas.css\" >";
	echo" <meta http-equiv=\"content-type\" content=\"text/html;charset=utf-8\" />";
	echo "<body>";
	echo 	"<center><h1><font color=\"#000\">Detalle de gastos registrados en sistema</font></h1></center>";
	$aux = 	"<center><h4><font color=\"#000\">Detalle de gastos registrados en sistema</font></h4></center>";

	echo 	"<table width=\"97%\" border=\"0\" bgcolor=\"#000\" cellpadding=\"0\" cellspacing=\"1\">";
	echo 	"  <tr>";
	echo 	"    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Delegacion</span></th>";
	echo 	"    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">UOPSI</span></th>";
	echo 	"    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0102</span></th>";
	echo 	"    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0104</span></th>";
	echo 	"    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0203</span></th>";
	echo 	"    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0302</span></th>";
	echo 	"    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0311</span></th>";
	echo 	"    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0312</span></th>";
	echo 	"    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0318</span></th>";
	echo 	"    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0401</span></th>";
	echo 	"    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0402</span></th>";
	echo 	"    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0501</span></th>";
	echo 	"    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0601</span></th>";
	echo 	"    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0602</span></th>";
	echo 	"    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0603</span></th>";
	echo 	"    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">TOTAL</span></th>";
	echo 	"  </tr>";

	$aux = $aux."<table width=\"100%\" border=\"0\" bgcolor=\"#000000\" cellpadding=\"0\" cellspacing=\"1\">";
	$aux = $aux."<tr>";
	$aux = $aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">Delegacion</span></th>";
	$aux = $aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">UOPSI</span></th>";
	$aux = $aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0102</span></th>";
	$aux = $aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0104</span></th>";
	$aux = $aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0203</span></th>";
	$aux = $aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0302</span></th>";
	$aux = $aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0311</span></th>";
	$aux = $aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0312</span></th>";
	$aux = $aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0318</span></th>";
	$aux = $aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0401</span></th>";
	$aux = $aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0402</span></th>";
	$aux = $aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0501</span></th>";
	$aux = $aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0601</span></th>";
	$aux = $aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0602</span></th>";
	$aux = $aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0603</span></th>";
	$aux = $aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">TOTAL</span></th>";
	$aux = $aux."</tr>";

	$colorfila = 0;

	$resulttot = mysql_query("SELECT DISTINCT (clave_del) FROM obras ORDER BY clave_del", $connect);
	$totalregistrostot = mysql_num_rows($resulttot);
	while($row = mysql_fetch_array($resulttot))
	{ //empieza conteo de clave_del
		$clave_del = $row['clave_del'];
		$gmonto0102 = 0;	$tgmonto0102 = 0;
		$gmonto0104 = 0;	$tgmonto0104 = 0;
		$gmonto0203 = 0;	$tgmonto0203 = 0;
		$gmonto0302 = 0;	$tgmonto0302 = 0;
		$gmonto0311 = 0;	$tgmonto0311 = 0;
		$gmonto0312 = 0;	$tgmonto0312 = 0;
		$gmonto0318 = 0;	$tgmonto0318 = 0;
		$gmonto0401 = 0;	$tgmonto0401 = 0;
		$gmonto0402 = 0;	$tgmonto0402 = 0;
		$gmonto0501 = 0;	$tgmonto0501 = 0;
		$gmonto0601 = 0;	$tgmonto0601 = 0;
		$gmonto0602 = 0;	$tgmonto0602 = 0;
		$gmonto0603 = 0;	$tgmonto0603 = 0;
		$cuantos = 0;
		$cuantos_egr = 0;
		$cuantos_per = 0;
		$montot = 0;
		$gtotal = 0;

		//$resulttot1 = mysql_query("SELECT DISTINCT (clave) FROM obras WHERE clave_del = '$clave_del' ORDER BY clave", $connect);
		$resulttot1 = mysql_query("SELECT DISTINCT (clave) FROM vobo WHERE clave like '$clave_del%' ORDER BY clave", $connect);
		$totalregistrostot1 = mysql_num_rows($resulttot1);
		while($row = mysql_fetch_array($resulttot1))
		{ //empieza conteo de clave_del
			$clave = $row['clave'];
			//$result = mysql_query("SELECT COUNT(clave_del) as tre FROM obras WHERE clave_del = '$clave_del'", $connect);
			$result = mysql_query("SELECT COUNT(clave) as tre FROM vobo WHERE clave = '$clave'", $connect);
			$totalregistros = mysql_num_rows($result);
			while($row = mysql_fetch_array($result))
			{
				$tre = $row['tre'];
			}

			//$result = mysql_query("select o.id_conse_obra,o.id_proyecto,cd.desc_uops, cd.desc_del from obras o, cat_delegaciones cd where o.clave = '$clave' and cd.clave=o.clave order by id_conse_obra", $connect);
			$result = mysql_query("select v.clave, d.desc_del, d.desc_uops from vobo v left join cat_delegaciones d on d.clave = v.clave where v.clave = '$clave'  order by clave", $connect);
			$totalregistros = mysql_num_rows($result);
			$valcolor = 0;
			while($row = mysql_fetch_array($result))
			{ //datos
				//$id_conse_obra = $row['id_conse_obra'];
				//$id_proyecto = $row['id_proyecto'];
				$desc_uops = $row['desc_uops'];
				$desc_del = $row['desc_del'];
				if ($colorfila == 0)
				{
					$color = "#ffffff";
					$colorfila = 1;
				}
				else
				{
					$color = "#efefef";
					$colorfila = 0;
				}
				echo "  <tr>";
				echo "    <td align=\"center\" bgcolor=$color valign=\"middle\" rowspan=\"2\"><span class=\"spgreen\">$desc_del</span></td>";
				echo "    <td align=\"center\" bgcolor=$color valign=\"middle\" rowspan=\"2\"><span class=\"spgreen\">$desc_uops</span></td>";
				echo "    <td align=\"left\" bgcolor=$color valign=\"top\" colspan=\"14\"><span class=\"spgreen\"></span></td>";
				echo "  </tr>";
								
				$aux = $aux."  <tr>";
				$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"middle\" rowspan=\"2\"><span class=\"spgreen\">$desc_del</span></td>";
				$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"middle\" rowspan=\"2\"><span class=\"spgreen\">$desc_uops</span></td>";
				$aux = $aux."    <td align=\"left\" bgcolor=$color valign=\"top\" colspan=\"14\"><span class=\"spgreen\"></span></td>";
				$aux = $aux."  </tr>";
			
				$result = mysql_query("SELECT SUM(gas_anual) as monto0102 FROM personal WHERE clave = '$clave' and clave_par = '0102'", $connect);
				$totalregistros = mysql_num_rows($result);
				$valcolor = 0;
				while($row = mysql_fetch_array($result))
				{
					$monto0102 = $row['monto0102'];
					$gmonto0102 += $monto0102;
				}

				$result = mysql_query("SELECT SUM(gas_anual) as monto0104 FROM personal WHERE clave = '$clave' and clave_par = '0104'", $connect);
				$totalregistros = mysql_num_rows($result);
				$valcolor = 0;
				while($row = mysql_fetch_array($result))
				{
					$monto0104 = $row['monto0104'];
					$gmonto0104 += $monto0104;
				}

				$result = mysql_query("SELECT SUM(total_gasto) as monto0203 FROM egresos WHERE clave = '$clave' and clave_par = '0203'", $connect);
				$totalregistros = mysql_num_rows($result);
				$valcolor = 0;
				while($row = mysql_fetch_array($result))
				{
					$monto0203 = $row['monto0203'];
					$gmonto0203 += $monto0203;
				}

				$result = mysql_query("SELECT SUM(total_gasto) as monto0302 FROM egresos WHERE clave = '$clave' and clave_par = '0302'", $connect);
				$totalregistros = mysql_num_rows($result);
				$valcolor = 0;
				while($row = mysql_fetch_array($result))
				{
					$monto0302 = $row['monto0302'];
					$gmonto0302 += $monto0302;
				}

				$result = mysql_query("select sum(o.monto) as monto0311 from obras o where o.clave = '$clave' and clave_par = '0311'", $connect);
				$totalregistros = mysql_num_rows($result);
				$valcolor = 0;
				while($row = mysql_fetch_array($result))
				{
					$monto0311 = $row['monto0311'];
					$gmonto0311 += $monto0311;
				}
			
				$result = mysql_query("SELECT SUM(total_gasto) as monto0312 FROM egresos WHERE clave = '$clave' and clave_par = '0312'", $connect);
				$totalregistros = mysql_num_rows($result);
				$valcolor = 0;
				while($row = mysql_fetch_array($result))
				{
					$monto0312 = $row['monto0312'];
					$gmonto0312 += $monto0312;
				}

				$result = mysql_query("SELECT SUM(total_gasto) as monto0318 FROM egresos WHERE clave = '$clave' and clave_par = '0318'", $connect);
				$totalregistros = mysql_num_rows($result);
				$valcolor = 0;
				while($row = mysql_fetch_array($result))
				{
					$monto0318 = $row['monto0318'];
					$gmonto0318 += $monto0318;
				}

				$result = mysql_query("SELECT SUM(total_gasto) as monto0401 FROM egresos WHERE clave = '$clave' and clave_par = '0401'", $connect);
				$totalregistros = mysql_num_rows($result);
				$valcolor = 0;
				while($row = mysql_fetch_array($result))
				{
					$monto0401 = $row['monto0401'];
					$gmonto0401 += $monto0401;
				}

				$result = mysql_query("SELECT SUM(total_gasto) as monto0402 FROM egresos WHERE clave = '$clave' and clave_par = '0402'", $connect);
				$totalregistros = mysql_num_rows($result);
				$valcolor = 0;
				while($row = mysql_fetch_array($result))
				{
					$monto0402 = $row['monto0402'];
					$gmonto0402 += $monto0402;
				}
				
				$result = mysql_query("select sum(o.monto) as monto0501 from obras o  where o.clave = '$clave' and clave_par = '0501'", $connect);
				$totalregistros = mysql_num_rows($result);
				$valcolor = 0;
				while($row = mysql_fetch_array($result))
				{
					$monto0501 = $row['monto0501'];
					$gmonto0501 += $monto0501;
				}
			
				$result = mysql_query("select sum(o.monto) as monto0601 from obras o where o.clave = '$clave' and clave_par = '0601'", $connect);
				$totalregistros = mysql_num_rows($result);
				$valcolor = 0;
				while($row = mysql_fetch_array($result))
				{
					$monto0601 = $row['monto0601'];
					$gmonto0601 += $monto0601;
				}
			
				$result = mysql_query("select sum(o.monto) as monto0602 from obras o where o.clave = '$clave' and clave_par = '0602'", $connect);
				$totalregistros = mysql_num_rows($result);
				$valcolor = 0;
				while($row = mysql_fetch_array($result))
				{
					$monto0602 = $row['monto0602'];
					$gmonto0602 += $monto0602;
				}
				
				$result = mysql_query("select sum(o.monto) as monto0603 from obras o where o.clave = '$clave' and clave_par = '0603'", $connect);
				$totalregistros = mysql_num_rows($result);
				$valcolor = 0;
				while($row = mysql_fetch_array($result))
				{
					$monto0603 = $row['monto0603'];
					$gmonto0603 += $monto0603;
				}

				echo "  <tr>";
				echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0102,2) . "</span></td>";
				echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0104,2) . "</span></td>";
				echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0203,2) . "</span></td>";
				echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0302,2) . "</span></td>";
				echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0311,2) . "</span></td>";
				echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0312,2) . "</span></td>";
				echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0318,2) . "</span></td>";
				echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0401,2) . "</span></td>";
				echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0402,2) . "</span></td>";
				echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0501,2) . "</span></td>";
				echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0601,2) . "</span></td>";
				echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0602,2) . "</span></td>";
				echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0603,2) . "</span></td>";
				echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
				echo "  </tr>";
								
				$aux = $aux."  <tr>";
				$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0102,2) . "</span></td>";
				$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0104,2) . "</span></td>";
				$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0203,2) . "</span></td>";
				$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0302,2) . "</span></td>";
				$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0311,2) . "</span></td>";
				$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0312,2) . "</span></td>";
				$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0318,2) . "</span></td>";
				$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0401,2) . "</span></td>";
				$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0402,2) . "</span></td>";
				$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0501,2) . "</span></td>";
				$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0601,2) . "</span></td>";
				$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0602,2) . "</span></td>";
				$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0603,2) . "</span></td>";
				$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
				$aux = $aux."  </tr>";

				$gtotal += $montot;
			}
			
			$gmontot = $gmonto0102 + $gmonto0104 + $gmonto0203 + $gmonto0302 + $gmonto0311 + $gmonto0312 + $gmonto0318 + $gmonto0401 + $gmonto0402 + $gmonto0501 + $gmonto0601 + $gmonto0602 + $gmonto0603;

				
		}// termina clave
		echo "  <tr>";
		echo "    <td align=\"right\" bgcolor=$celda1 colspan=\"2\"><span class=\"titulo_small\">Subtotales: &nbsp;</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0102,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0104,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0203,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0302,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0311,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0312,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0318,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0401,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0402,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0501,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0601,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0602,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0603,2) . "</span></td>";
		echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmontot,2) . "</span></td>";
		echo "  </tr>";
			
		$aux = $aux."  <tr>";
		$aux = $aux."    <td align=\"right\" bgcolor=\"#efefef\" colspan=\"2\"><span class=\"titulo_small\">Subtotales: &nbsp;</span></td>";
		$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0102,2) . "</span></td>";
		$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0104,2) . "</span></td>";
		$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0203,2) . "</span></td>";
		$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0302,2) . "</span></td>";
		$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0311,2) . "</span></td>";
		$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0312,2) . " </span></td>";
		$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0318,2) . "</span></td>";
		$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0401,2) . " </span></td>";
		$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0402,2) . " </span></td>";
		$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0501,2) . "</span></td>";
		$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0601,2) . "</span></td>";
		$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0602,2) . "</span></td>";
		$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0603,2) . "</span></td>";
		$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmontot,2) . "</span></td>";
		$aux = $aux."  </tr>";

		
		$tgmonto0102 = $tgmonto0102 + $gmonto0102;
		$tgmonto0104 = $tgmonto0104 + $gmonto0104;
		$tgmonto0203 = $tgmonto0203 + $gmonto0203;
		$tgmonto0302 = $tgmonto0302 + $gmonto0302;
		$tgmonto0311 = $tgmonto0311 + $gmonto0311;
		$tgmonto0312 = $tgmonto0312 + $gmonto0312;
		$tgmonto0318 = $tgmonto0318 + $gmonto0318;
		$tgmonto0401 = $tgmonto0401 + $gmonto0401;
		$tgmonto0402 = $tgmonto0402 + $gmonto0402;
		$tgmonto0501 = $tgmonto0501 + $gmonto0501;
		$tgmonto0601 = $tgmonto0601 + $gmonto0601;
		$tgmonto0602 = $tgmonto0602 + $gmonto0602;
		$tgmonto0603 = $tgmonto0603 + $gmonto0603;

		$tgmontot  = $tgmonto0102 + $tgmonto0104 + $tgmonto0203 + $tgmonto0302 + $tgmonto0311 + $tgmonto0312 + $tgmonto0318 + $tgmonto0401 + $tgmonto0402 + $tgmonto0501 + $tgmonto0601 + $tgmonto0602 + $tgmonto0603;
	
	}// termina clave_del
/*
	echo "  <tr>";
	echo "    <td align=\"right\" bgcolor=$celda1 colspan=\"2\"><span class=\"titulo_small\">Gran Total: &nbsp;</span></td>";
	echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0102,2) . "</span></td>";
	echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0104,2) . "</span></td>";
	echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0203,2) . "</span></td>";
	echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0302,2) . "</span></td>";
	echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0311,2) . "</span></td>";
	echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0312,2) . "</span></td>";
	echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0318,2) . "</span></td>";
	echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0401,2) . "</span></td>";
	echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0402,2) . "</span></td>";
	echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0501,2) . "</span></td>";
	echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0601,2) . "</span></td>";
	echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0602,2) . "</span></td>";
	echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmonto0603,2) . "</span></td>";
	echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($tgmontot,2) . "</span></td>";
	echo "  </tr>";
	echo "</table>";
		
	$aux = $aux."  <tr>";
	$aux = $aux."    <td align=\"right\" bgcolor=\"#efefef\" colspan=\"2\"><span class=\"titulo_small\">Gran Total: &nbsp;</span></td>";
	$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0102,2) . "</span></td>";
	$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0104,2) . "</span></td>";
	$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0203,2) . "</span></td>";
	$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0302,2) . "</span></td>";
	$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0311,2) . "</span></td>";
	$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0312,2) . "</span></td>";
	$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0318,2) . "</span></td>";
	$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0401,2) . "</span></td>";
	$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0402,2) . "</span></td>";
	$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0501,2) . "</span></td>";
	$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0601,2) . "</span></td>";
	$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0602,2) . "</span></td>";
	$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmonto0603,2) . "</span></td>";
	$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($tgmontot,2) . "</span></td>";
	$aux = $aux."  </tr>";
	$aux = $aux."</table>";
*/
	fwrite($file,"$aux \n");
	fclose($file);
	print("<table>");
	print("<tr>");
	print("<td bgcolor=\"#efefef\" ><span class=\"textoformulario\"><b>Proceso Completo&nbsp;<a href=\"excel1.php\" class=\"small_link\">Abrir archivo</a></td>");
	print("</tr>");
	print("</table>");
	//echo "</center>";
	echo "</body>";
	echo "</html>";
?>