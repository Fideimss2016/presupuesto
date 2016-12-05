<?php
	session_start();
	$_SESSION['clave']=$_REQUEST['clave'];
	$clave = $_SESSION["clave"];
	$tipo_usuario = $_SESSION["tipo_usuario"];

	$desc_uops = "";
	$desc_del = "";

	$gmonto0311 = 0;
	$gmonto0501 = 0;
	$gmonto0601 = 0;
	$gmonto0602 = 0;
	$gmonto0603 = 0;
	$monto0311 = 0;
	$monto0501 = 0;
	$monto0601 = 0;
	$monto0602 = 0;
	$monto0603 = 0;

	include "clases/variablesbd.php";

	$aux = "<?php\n";
	$aux = $aux."header(\"Content-type: application/vnd.ms-excel\");\n";
	$aux = $aux."header(\"Content-Disposition: attachment; filename=excel.xls\");\n";
	$aux = $aux."?>\n";
	$file = fopen('excel1.php',"w+");
	if ($file)
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

	$result = mysql_query("select desc_uops, desc_del from cat_delegaciones where clave = '$clave'", $connect);
	$totalregistros = mysql_num_rows($result);
	while ($row = mysql_fetch_array($result))
	{
		$desc_uops = $row['desc_uops'];
		$desc_del = $row['desc_del'];
	}

	$celda = "#222";
	$celda1 = "#333";
	$celda2 = "#555";
	$celdaf = "#fff";
	$celdaf1 = "#F0F0F9";

	$usuario_sistema = $_SESSION['usuario_sistema'];

	echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"capturas.css\" >";
	echo "<body>";
	echo 	"<center><h1><font color=\"#000\">Detalle de gastos registrados en sistema $desc_uops</font></h1></center>";
	$aux =	"<center><h4><font color=\"#000\">Detalle de gastos registradas en sistema $desc_uops</font></h4></center>";


	echo "<center>";
	echo "<table width=\"97%\" border=\"0\" bgcolor=\"#000\" cellpadding=\"0\" cellspacing=\"1\">";
	echo "  <tr>";
	echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Delegacion</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">UOPSI</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Concepto</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Cantidad</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Unidad</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0311</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0501</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0601</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0602</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">0603</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">TOTAL</span></th>";
	echo "  </tr>";

	$aux=$aux."<center>";
	$aux=$aux."<table width=\"97%\" border=\"0\" bgcolor=\"#000000\" cellpadding=\"0\" cellspacing=\"1\">";
	$aux=$aux."<tr>";
	$aux=$aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">Delegacion</span></th>";
	$aux=$aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">UOPSI</span></th>";
	$aux=$aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">Concepto</span></th>";
	$aux=$aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">Cantidad</span></th>";
	$aux=$aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">Unidad</span></th>";
	$aux=$aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0311</span></th>";
	$aux=$aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0501</span></th>";
	$aux=$aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0601</span></th>";
	$aux=$aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0602</span></th>";
	$aux=$aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">0603</span></th>";
	$aux=$aux."<th scope=\"col\" bgcolor=\"#efefef\"><span class=\"titulo_small\">TOTAL</span></th>";
	$aux=$aux."</tr>";

	$colorfila = 0;
	$result = mysql_query("select count(*) as cuantos from obras o where o.clave='$clave'", $connect);
	$totalregistros = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
		$cuantos = $row['cuantos'];
	}
	$cuantos = $cuantos + 1;
	//$result = mysql_query("select o.id_conse_obra,o.id_proyecto,cd.desc_uops, cd.desc_del from obras o, cat_delegaciones cd where o.clave='$clave' and cd.clave=o.clave order by id_conse_obra", $connect);
	$result = mysql_query("select o.id_conse_obra, e.tipo_equipo_requerido_trabajo as proyecto, cd.desc_uops, cd.desc_del from obras o left join cat_tipo_equipo_requerido_trabajos e on e.tipo_equipo_id = o.tipo_equipo_id 
		inner join cat_delegaciones cd on cd.clave = o.clave where o.clave = '$clave' order by o.clave_par", $connect);
	$totalregistros = mysql_num_rows($result);
	$valcolor = 0;
	while($row = mysql_fetch_array($result))
	{
		$id_conse_obra = $row['id_conse_obra'];
		$proyecto = $row['proyecto'];
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

		echo 		"  <tr>";
		echo 		"    <td align=\"center\" bgcolor=$color valign=\"middle\" rowspan=\"$cuantos\"><span class=\"spgreen\">$desc_del</span></td>";
		echo 		"    <td align=\"center\" bgcolor=$color valign=\"middle\" rowspan=\"$cuantos\"><span class=\"spgreen\">$desc_uops</span></td>";
		echo 		"    <td align=\"left\" bgcolor=$color valign=\"top\" colspan=\"8\"><span class=\"spgreen\"></span></td>";
		echo 		"  </tr>";

		$aux=$aux.	"  <tr>";
		$aux=$aux.	"    <td align=\"center\" bgcolor=$color valign=\"middle\" rowspan=\"$cuantos\"><span class=\"spgreen\">$desc_del</span></td>";
		$aux=$aux.	"    <td align=\"center\" bgcolor=$color valign=\"middle\" rowspan=\"$cuantos\"><span class=\"spgreen\">$desc_uops</span></td>";
		$aux=$aux.	"    <td align=\"left\" bgcolor=$color valign=\"top\" colspan=\"8\"><span class=\"spgreen\"></span></td>";
		$aux=$aux.	"  </tr>";

		//$result = mysql_query("select o.monto as monto0311, o.origen_del_gasto, o.cantidad, o.unidad from obras o where o.clave='$clave' and clave_par='0311'", $connect);
		$result = mysql_query("select o.monto as monto0311, e.tipo_equipo_requerido_trabajo as origen_del_gasto, o.cantidad, o.unidad from obras o left join cat_tipo_equipo_requerido_trabajos e 
			on e.tipo_equipo_id = o.tipo_equipo_id where o.clave='$clave' and clave_par='0311'", $connect);

		$totalregistros = mysql_num_rows($result);
		$valcolor = 0;
		while($row = mysql_fetch_array($result))
		{
			$monto0311 = $row['monto0311'];
			$origen_del_gasto = $row['origen_del_gasto'];
			$cantidad = $row['cantidad'];
			$unidad = $row['unidad'];

			echo 		"  <tr>";
			echo 		"    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$origen_del_gasto</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0311,2) . "</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"  </tr>";

			$gmonto0311 += $monto0311;

			$aux = $aux."  <tr>";
			$aux = $aux."    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$origen_del_gasto</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0311,2) . "</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."  </tr>";
		}

		$result = mysql_query("select o.monto as monto0501, e.tipo_equipo_requerido_trabajo as origen_del_gasto, o.cantidad, o.unidad from obras o left join cat_tipo_equipo_requerido_trabajos e 
			on e.tipo_equipo_id = o.tipo_equipo_id where o.clave='$clave' and clave_par='0501'", $connect);
		$totalregistros = mysql_num_rows($result);
		$valcolor = 0;
		while($row = mysql_fetch_array($result))
		{
			$monto0501 = $row['monto0501'];
			$origen_del_gasto = $row['origen_del_gasto'];
			$cantidad = $row['cantidad'];
			$unidad = $row['unidad'];

			echo 		"  <tr>";
			echo 		"    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$origen_del_gasto</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0501,2) . "</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"  </tr>";
			
			$gmonto0501 += $monto0501;

			$aux = $aux."  <tr>";
			$aux = $aux."    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$origen_del_gasto</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0501,2) . "</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."  </tr>";
		}

		$result = mysql_query("select o.monto as monto0601, e.tipo_equipo_requerido_trabajo as origen_del_gasto, o.cantidad, o.unidad from obras o left join cat_tipo_equipo_requerido_trabajos e 
			on e.tipo_equipo_id = o.tipo_equipo_id where o.clave='$clave' and clave_par='0601'", $connect);
		$totalregistros = mysql_num_rows($result);
		$valcolor = 0;
		while($row = mysql_fetch_array($result))
		{
			$monto0601 = $row['monto0601'];
			$origen_del_gasto = $row['origen_del_gasto'];
			$cantidad = $row['cantidad'];
			$unidad = $row['unidad'];

			echo 		"  <tr>";
			echo 		"    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$origen_del_gasto</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0601,2) . "</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"  </tr>";

			$gmonto0601 += $monto0601;

			$aux = $aux."  <tr>";
			$aux = $aux."    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$origen_del_gasto</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0601,2) . "</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."  </tr>";
		}

		$result = mysql_query("select o.monto as monto0602, e.tipo_equipo_requerido_trabajo as origen_del_gasto, o.cantidad, o.unidad from obras o left join cat_tipo_equipo_requerido_trabajos e 
			on e.tipo_equipo_id = o.tipo_equipo_id where o.clave='$clave' and clave_par='0602'", $connect);
		$totalregistros = mysql_num_rows($result);
		$valcolor = 0;
		while($row = mysql_fetch_array($result))
		{
			$monto0602 = $row['monto0602'];
			$origen_del_gasto = $row['origen_del_gasto'];
			$cantidad = $row['cantidad'];
			$unidad = $row['unidad'];

			echo 		"  <tr>";
			echo 		"    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$origen_del_gasto</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0602,2) . "</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"  </tr>";

			$gmonto0602 += $monto0602;

			$aux = $aux."  <tr>";
			$aux = $aux."    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$origen_del_gasto</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0602,2) . "</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."  </tr>";
		}

		$result = mysql_query("select o.monto as monto0603, e.tipo_equipo_requerido_trabajo as origen_del_gasto, o.cantidad, o.unidad from obras o left join cat_tipo_equipo_requerido_trabajos e 
			on e.tipo_equipo_id = o.tipo_equipo_id where o.clave='$clave' and clave_par='0603'", $connect);
		$totalregistros = mysql_num_rows($result);
		$valcolor = 0;
		while($row = mysql_fetch_array($result))
		{
			$monto0603 = $row['monto0603'];
			$origen_del_gasto = $row['origen_del_gasto'];
			$cantidad = $row['cantidad'];
			$unidad = $row['unidad'];

			echo 		"  <tr>";
			echo 		"    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$origen_del_gasto</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0603,2) . "</span></td>";
//			echo 		"    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			echo 		"  </tr>";

			$gmonto0603 += $monto0603;

			$aux = $aux."  <tr>";
			$aux = $aux."    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$origen_del_gasto</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto0603,2) . "</span></td>";
//			$aux = $aux."    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">&nbsp;</span></td>";
			$aux = $aux."  </tr>";
		}

		//$gtotal += $montot;
		$gtotal = $monto0311 + $monto0501 + $monto0601 + $monto0602 + $monto0603;
	}			

	$gmontot = $gmonto0311 + $gmonto0501 + $gmonto0601 + $gmonto0602 + $gmonto0603;


	echo 		"  <tr>";
	echo 		"    <td align=\"right\" bgcolor=$celda1 colspan=\"5\"><span class=\"titulo_small\">Totales: &nbsp;</span></td>";
	echo 		"    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0311,2) . "</span></td>";
	echo 		"    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0501,2) . "</span></td>";
	echo 		"    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0601,2) . "</span></td>";
	echo 		"    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0602,2) . "</span></td>";
	echo 		"    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmonto0603,2) . "</span></td>";
	echo 		"    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmontot,2) . "</span></td>";
	echo 		"  </tr>";

	$aux = $aux."  <tr>";
	$aux = $aux."    <td align=\"right\" bgcolor=\"#efefef\" colspan=\"5\"><span class=\"titulo_small\">Totales: &nbsp;</span></td>";
	$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0311,2) . "</span></td>";
	$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0501,2) . "</span></td>";
	$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0601,2) . "</span></td>";	
	$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0602,2) . "</span></td>";
	$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmonto0603,2) . "</span></td>";	
	$aux = $aux."    <td align=\"center\" bgcolor=\"#efefef\"><span class=\"titulo_small\"> " . number_format($gmontot,2) . "</span></td>";
	$aux = $aux."  </tr>";


	echo "</table>";

	$aux = $aux."</table>";
	fwrite($file,"$aux \n");
	fclose($file);

	print("<tr><td bgcolor=\"#efefef\" ><span class=\"textoformulario\"><b>Proceso Completo&nbsp;<a href=\"excel1.php\" class=\"small_link\">Abrir archivo</a></td></tr>");

	echo "</center>";
	echo "</body>";
	echo "</html>";
?>