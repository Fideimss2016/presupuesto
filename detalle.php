<?php
//	echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\" >";
	$connect = mysql_connect("$host","$user","$passworks");
	mysql_select_db("$dbname",$connect);
	echo "		<body>";

	$clave 	= $_SESSION["clave"];
	$celda 	= "#1a1a1a";
	$tabla 	= "#666";
	$celda1 = "#666";

	echo "			<table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
	echo "  			<tr>";
	echo "    				<th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Actividad</th>";
	echo "    				<th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Tipo de pago</th>";
	echo "    				<th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Tipo de curso</th>";
	echo "    				<th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Inicio</th>";
	echo "    				<th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Fin</th>";
	echo "    				<th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Cuota Derechohabiente</th>";
	echo "    				<th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Cuota   no derechohabiente</th>";
	echo "    				<th colspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Poblacion</th>";
	echo "    				<th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Ingresos</th>";
	echo "    				<th rowspan=\"2\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Movimientos</th>";
	echo "  			</tr>";
	echo "  			<tr>";
	echo "    				<td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">DH</span></td>";
	echo "    				<td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">NDH</span></td>";
	echo "  			</tr>";

	$result = mysql_query("select i.id_conse_ing, i.clave_act, i.id_tipo_pago, i.id_tipo_curso, i.fecha_ini, i.fecha_fin, i.cta_der, i.cta_noder,
	(i.enero+i.febrero+i.marzo+i.abril+i.mayo+i.junio+i.julio+i.agosto+i.septiembre+i.octubre+i.noviembre+i.diciembre) as ingretot,
	(i.dh1+i.dh2+i.dh3+i.dh4+i.dh5+i.dh6+i.dh7+i.dh8+i.dh9+i.dh10+i.dh11+i.dh12) as totdh,
	(i.ndh1+i.ndh2+i.ndh3+i.ndh4+i.ndh5+i.ndh6+i.ndh7+i.ndh8+i.ndh9+i.ndh10+i.ndh11+i.ndh12) as totndh, ci.clave_act as clact, ci.actividad, cti.desc_tipo_pago, ctc.desc_tipo_curso, i.status
	from ingresos i, cat_actividades_i ci, cat_tipo_pago_i cti, cat_tipo_curso_i ctc where clave=$clave and ci.conse_act=i.conse_act and cti.id_tipo_pago=i.id_tipo_pago and 
	ctc.id_tipo_curso=i.id_tipo_curso order by id_conse_ing", $connect);

	$totalregistros = mysql_num_rows($result);
	$valcolor = 0;
	while($row = mysql_fetch_array($result))
	{
		$id_conse_ing 		= $row['id_conse_ing'];
		$clave_act 			= $row['clave_act'];
		$id_tipo_pago 		= $row['id_tipo_pago'];
		$id_tipo_curso 		= $row['id_tipo_curso'];
		$fecha_ini 			= $row['fecha_ini'];			
		$fecha_fin 			= $row['fecha_fin'];
		$cta_der 			= $row['cta_der'];
		$cta_noder 			= $row['cta_noder'];
		$ingretot 			= $row['ingretot'];			
		$totdh 				= $row['totdh'];
		$totndh 			= $row['totndh'];
		$clact 				= $row['clact'];
		$actividad 			= $row['actividad'];
		$desc_tipo_pago 	= $row['desc_tipo_pago'];
		$desc_tipo_curso 	= $row['desc_tipo_curso'];
		$status 			= $row['status'];

		if ($colorfila == 0)
		{
			$color 		= "#efefef";
			$colorfila 	= 1;
		}
		else
		{
			$color 		= "#fff";
			$colorfila 	= 0;
		}

		if($valcolor == 0)
		{
			$color 		= "spgreen";
			$valcolor 	= 1;
		}
		else
		{
			$color 		= "spblue";
			$valcolor 	= 0;
		}

		echo "  		<tr>";
		echo "    			<td bgcolor=\"$celda\"><span class=$color>$clact $actividad</span></td>";
		echo "    			<td bgcolor=\"$celda\"><span class=$color>$desc_tipo_pago</span></td>";
		echo "    			<td bgcolor=\"$celda\"><span class=$color>$desc_tipo_curso</span></td>";
		echo "    			<td bgcolor=\"$celda\" align=\"center\"><span class=$color>$fecha_ini</span></td>";
		echo "    			<td bgcolor=\"$celda\" align=\"center\"><span class=$color>$fecha_fin</span></td>";
		echo "    			<td bgcolor=\"$celda\" align=\"center\"><span class=$color> " . number_format($cta_der,2) . "</span></td>";
		echo "    			<td bgcolor=\"$celda\" align=\"center\"><span class=$color> " . number_format($cta_noder,2) . "</span></td>";
		echo "    			<td bgcolor=\"$celda\" align=\"center\"><span class=$color>$totdh</span></td>";
		echo "    			<td bgcolor=\"$celda\" align=\"center\"><span class=$color>$totndh</span></td>";
		echo "    			<td bgcolor=\"$celda\" align=\"center\"><span class=$color> " . number_format($ingretot,2) . "</span></td>";

		if($status == 0)
		{
			echo "    		<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"ingresos.php?elimina=SI&&id_conse_ing=$id_conse_ing&&clave=$clave\" title=\"eliminar registro\"><img src=\"tache.png\" width=\"20\" height=\"20\" /></a></span></td>";
		}
		else if($status == 1)
		{
			echo "    		<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision por el jefe de oficina\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
		}
		else if($status == 2)
		{
			echo "    		<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" />	</a></span></td>";
		}
		else if($status == 3)
		{
			echo "    		<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"program aprobado\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
		}

		echo "  		</tr>";
		$gtotal += $ingretot;
	}

	$result = mysql_query("select pto2013 from cat_delegaciones where clave='$clave'", $connect);
	$totalregistros = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
		$pto2013 = $row['pto2013'];
	}

	echo "				<tr>";
	echo "					<td bgcolor=\"$celda\" colspan=\"9\" align=\"right\"><span class=\"$color\">Total Presupuesto 2017: &nbsp;</span></td>";
	echo "					<td bgcolor=\"$celda\" align=\"center\"><span class=\"$color\"> " . number_format($gtotal,2) . "</span></td>";
	echo "					<td bgcolor=\"$celda\" align=\"center\"><span class=\"$color\">&nbsp;</span></td>";
	echo "				</tr>";
	echo "			</table>";
	echo "			<br>";
	if($result != 0)
	{
		echo "		<center><a href=\"capturas.php\" class=\"spwhite\" target=\"_blank\">ver detalle de capturas</a></center>";
	}

	echo" 		</body>";
	echo" 	</html>";
?>