<?php
	echo "		<link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\" >";
	$connect = mysql_connect("$host","$user","$passworks");
	mysql_select_db("$dbname",$connect);

	echo "		<body>";

	$clave 	= $_SESSION["clave"];
	$celda 	= "#1a1a1a";
	$tabla 	= "#666";
	$celda1 = "#666";

	echo "			<table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
	echo "				<tr>";
	echo "					<th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Partida</th>";
	echo "					<th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Actividad</th>";
	echo "					<th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Cantidad</th>";
	echo "					<th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Unidad</th>";
	echo "					<th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Egreso</th>";
	echo "					<th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Movimientos</th>";
	echo "				</tr>";

	//PERSONAL//
	$result = mysql_query("select p.conse_categoria,p.id_emp,p.clave_act,p.clave_par, cpe.desc_par, p.status, cai.actividad, cc.desc_categoria, p.nombre, p.ape_pat, p.ape_mat,p.id_conse_personal,
	p.cantidad,cc.neto,p.meses from personal p, cat_partidas_e cpe, cat_actividades_i cai, cat_categoria cc where clave='$clave' and cpe.clave_par=p.clave_par and cai.clave_act=p.clave_act and 
	cc.conse_categoria=p.conse_categoria order by conse_categoria", $connect);

	$totalregistros = mysql_num_rows($result);
	$valcolor == 0;
	while($row = mysql_fetch_array($result))
	{
		$conse_categoria 	= $row['conse_categoria'];
		$id_emp 			= $row['id_emp'];
		$clave_act 			= $row['clave_act'];
		$clave_par 			= $row['clave_par'];
		$conse_categoria 	= $row['conse_categoria'];
		$desc_par 			= $row['desc_par'];			
		$status 			= $row['status'];			
		$actividad 			= $row['actividad'];			
		$desc_categoria 	= $row['desc_categoria'];						
		$nombre 			= $row['nombre'];
		$ape_pat 			= $row['ape_pat'];
		$ape_mat 			= $row['ape_mat'];
		$id_conse_personal 	= $row['id_conse_personal'];
		$cantidad 			= $row['cantidad'];
		$neto 				= $row['neto'];
		$meses 				= $row['meses'];			
		$gas 				= $meses * $neto;

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

		echo "			<tr>";
		echo "				<td bgcolor=\"$celda\"><span class=$color>$desc_par</span></td>";
		echo "				<td bgcolor=\"$celda\"><span class=$color>$actividad</span></td>";
		echo "				<td bgcolor=\"$celda\"><span class=$color>$cantidad</span></td>";
		echo "				<td bgcolor=\"$celda\"><span class=$color>$desc_categoria</span></td>";
		echo "				<td bgcolor=\"$celda\"><span class=$color>" . number_format($gas,2) . "</span></td>";

		if($status == 0)
		{
			echo "			<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"personal.php?elimina=SI&&id_conse_personal=$id_conse_personal&&clave=$clave\" title=\"eliminar registro\"><img src=\"tache.png\" width=\"20\" height=\"20\" /></a></span></td>";
		}
		else if($status == 1)
		{
			echo "			<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
		}
		else if($status == 2)
		{
			echo "			<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" />	</a></span></td>";
		}
		else if($status == 3)
		{
			echo "			<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"program aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
		}

		echo "			</tr>";
		$gtotal 	+= $gas;
	}
	/*TERMINA PERSONAL*/

	/*EGRESOS*/
	$result = mysql_query("select e.id_conse_egresos,e.clave_act,e.clave_par,e.cantidad,e.unidad,e.total_gasto,ci.actividad,cp.desc_par,e.status from egresos e, cat_actividades_i ci, cat_partidas_e cp 
	where clave=$clave and ci.clave_act=e.clave_act and cp.clave_par=e.clave_par order by clave_par", $connect);
	$totalregistros = mysql_num_rows($result);
	$valcolor == 0;
	while($row = mysql_fetch_array($result))
	{
		$id_conse_egresos 	= $row['id_conse_egresos'];
		$clave_act 			= $row['clave_act'];
		$clave_par 			= $row['clave_par'];
		$cantidad 			= $row['cantidad'];
		$unidad 			= $row['unidad'];			
		$total_gasto 		= $row['total_gasto'];
		$actividad 			= $row['actividad'];
		$desc_par 			= $row['desc_par'];
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
		
		echo "			<tr>";
		echo "				<td bgcolor=\"$celda\"><span class=$color>$clave_par $desc_par</span></td>";
		echo "				<td bgcolor=\"$celda\"><span class=$color>$clave_act $actividad</span></td>";
		echo "				<td bgcolor=\"$celda\" align=\"center\"><span class=$color>$cantidad</span></td>";
		echo "				<td bgcolor=\"$celda\" align=\"center\"><span class=$color>$unidad</span></td>";
		echo "				<td bgcolor=\"$celda\" align=\"center\"><span class=$color> " . number_format($total_gasto,2) . "</span></td>";

		if($status == 0)
		{
			echo "			<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"egresos.php?elimina=SI&&id_conse_egresos=$id_conse_egresos&&clave=$clave\" title=\"eliminar registro\"><img src=\"tache.png\" width=\"20\" height=\"20\" /></a></span></td>";
		}
		else if($status == 1)
		{
			echo "			<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
		}
		else if($status == 2)
		{
			echo "			<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" />	</a></span></td>";
		}
		else if($status == 3)
		{
			echo "			<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"program aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
		}
		
		echo "			</tr>";
		$gtotal 	+= $total_gasto;
	}
	/*TERMINA EGRESOS*/
	/*OBRAS*/
	$resulto = mysql_query("select o.id_conse_obra,o.clave_act,o.clave_par,o.cantidad,o.unidad,o.total_gastoo,ci.actividad,cp.desc_par,o.status from obras o, cat_actividades_i ci, cat_partidas_e cp 
	where clave=$clave and ci.clave_act=o.clave_act and cp.clave_par=o.clave_par order by clave_par", $connect);
	$totalregistroso = mysql_num_rows($resulto);
	$valcolor == 0;
	while($row = mysql_fetch_array($resulto))
	{
		$id_conse_obra 	= $row['id_conse_obra'];
		$clave_act 		= $row['clave_act'];
		$clave_par 		= $row['clave_par'];
		$cantidad 		= $row['cantidad'];
		$unidad 		= $row['unidad'];			
		$total_gastoo 	= $row['total_gastoo'];
		$actividad 		= $row['actividad'];
		$desc_par 		= $row['desc_par'];
		$status 		= $row['status'];

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
		echo "				<td bgcolor=\"$celda\"><span class=$color>$clave_par $desc_par</span></td>";
		echo "				<td bgcolor=\"$celda\"><span class=$color>$clave_act $actividad</span></td>";
		echo "				<td bgcolor=\"$celda\" align=\"center\"><span class=$color>$cantidad</span></td>";
		echo "				<td bgcolor=\"$celda\" align=\"center\"><span class=$color>$unidad</span></td>";
		echo "				<td bgcolor=\"$celda\" align=\"center\"><span class=$color> " . number_format($total_gastoo,2) . "</span></td>";

		if($status == 0)
		{
			echo "			<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"capturando registros\"><img src=\"capturando.png\" width=\"20\" height=\"20\" /></span></td>";
		}
		else if($status == 1)
		{
			echo "			<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
		}
		else if($status == 2)
		{
			echo "			<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" />	</a></span></td>";
		}
		else if($status == 3)
		{
			echo "			<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"programa aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
		}
		
		echo "			</tr>";
		$gtotalo 	+= $total_gastoo;
	}
	/*TERMINA OBRAS*/

	$ggtotal 	= $gtotal + $gtotalo;
	echo "				<tr>";
	echo "					<td bgcolor=\"$celda\" colspan=\"4\" align=\"right\"><span class=\"$color\">Total: &nbsp;</span></td>";
	echo "					<td bgcolor=\"$celda\" align=\"center\"><span class=\"$color\"> " . number_format($ggtotal,2) . "</span></td>";
	echo "					<td bgcolor=\"$celda\" align=\"center\"><span class=\"$color\">&nbsp;</span></td>";
	echo "				 </tr>";
	echo "			</table>";
	echo "			<br>";
	
	if($result != 0)
	{
		echo "		<center><a href=\"capturase.php\" class=\"spwhite\" target=\"_blank\">ver detalle de capturas</a></center>";
	}
	echo"		</body>";
	echo"	</html>";
?>