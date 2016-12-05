<?php
	echo" 		<link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\" >";
	$connect = mysql_connect("$host","$user","$passworks");
	mysql_select_db("$dbname",$connect);
	echo"		<body>";

	$clave 	= $_SESSION["clave"];
	$celda 	= "#1a1a1a";
	$tabla 	= "#666";
	$celda1 = "#666";

	echo "			<span class=\"spwhite\"><b>A continuaci&oacute;n se muestra su personal registrado</b></span>";
	echo "				<table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
	echo "					<tr>";
	echo "						<th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Personal</th>";
	echo "						<th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Categoria</th>";
	echo "						<th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Actividad</th>";
	echo "						<th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Metas</th>";
	echo "						<th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Plan de Trabajo</th>";
	echo "						<th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Cronograma de Trabajo</th>";
	echo "						<th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Status</th>";
	echo "					</tr>";

	$result = mysql_query("select p.conse_categoria,p.id_emp,p.clave_act,p.clave_par, cpe.desc_par, p.status, cai.actividad, cc.desc_categoria, p.nombre, p.ape_pat, p.ape_mat,p.id_conse_personal
	from personal p, cat_partidas_e cpe, cat_actividades_i cai, cat_categoria cc where clave='$clave' and cpe.clave_par=p.clave_par and cai.clave_act=p.clave_act and cc.conse_categoria=p.conse_categoria 
	order by conse_categoria", $connect);
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

		echo "  			<tr>";
		echo "					<td bgcolor=\"$celda\"><span class=$color>$nombre $ape_pat $ape_mat</span></td>";
		echo "					<td bgcolor=\"$celda\"><span class=$color>$desc_categoria</span></td>";
		echo "					<td bgcolor=\"$celda\"><span class=$color>$actividad $status_meta</span></td>";

		$resultm = mysql_query("select m.status as status_meta from metas m where clave='$clave' and m.id_emp=$id_emp", $connect);
		$totalregistros = mysql_num_rows($resultm);
		$valcolor == 0;
		while($row = mysql_fetch_array($resultm))
		{
			$status_meta = $row['status_meta'];
		}
		
		if($status_meta == 4)
		{
			echo "				<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"capturado\" target=\"_blank\"><img src=\"capturado.png\" width=\"20\" height=\"20\" /></a></span></td>";
		}
		else
		{
			echo "				<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"metas.php?id_emp=$id_emp&&clave=$clave\" title=\"capturar metas\"><img src=\"capturar.png\" width=\"20\" height=\"20\" /></a></span></td>";
		}
		
		echo "					<td bgcolor=\"$celda\"><span class=$color>&nbsp;</span></td>";
		echo "					<td bgcolor=\"$celda\"><span class=$color>&nbsp;</span></td>";

		if($status == 0)
		{
			echo "				<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"personal.php?elimina=SI&&id_conse_personal=$id_conse_personal&&clave=$clave\" title=\"eliminar registro\"><img src=\"tache.png\" width=\"20\" height=\"20\" /></a></span></td>";
		}
		else if($status == 1)
		{
			echo "				<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
		}
		else if($status == 2)
		{
			echo "				<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" />	</a></span></td>";
		}
		else if($status == 3)
		{
			echo "				<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"programa aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
		}
		
		echo "				</tr>";
		
		$gtotal += $monto;
	}

	echo "				</table>";
	echo "				<br>";

	if($result != 0)
	{
		echo "			<center><a href=\"capturasp.php\" class=\"spwhite\" target=\"_blank\">ver detalle de capturas</a></center>";
	}

	echo"			</body>";
	echo"		</html>";
?>