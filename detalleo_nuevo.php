<?php
	session_start();
	include ("config.inc.php");
//	header ('content-type: text/html; charset=utf-8');
//	echo "		<link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\" >";

	$connect = mysql_connect($dbhost,$dbuser,$dbpass);
	mysql_select_db($dbname,$connect);
	
	echo"		<body>";

	$celda 		= "#1a1a1a";
	$tabla 		= "#666";
	$celda1 	= "#666";
	$colorfila 	= 0;
	$color 		= 0;
	$monto 		= 0;
	$gtotal 	= 0;

	$col_head 	= "#2989b9";

	if(isset($_REQUEST['clave'])){$clave = $_REQUEST["clave"];}
	if(isset($_SESSION['usu'])){$usuario = $_SESSION["usu"];}

	if (isset($_REQUEST['elimina']))
	{
		$_SESSION['id_conse_obra'] = $_REQUEST['id_conse_obra'];
		$id_conse_obra = $_SESSION['id_conse_obra'];
		$sqlEliminar = mysql_query("DELETE FROM obras WHERE id_conse_obra = $id_conse_obra and clave='$clave'", $connect) or die(mysql_error());
		//$sqlEliminar = mysql_query("update obras set activo = 0 WHERE id_conse_obra=$id_conse_obra and clave='$clave'", $connect) or die(mysql_error());
		if($sqlEliminar)
		{
			echo "<span class=\"spgreen\">Registro eliminado</span><br>";
		}
		else
		{
			echo "<span class=\"spred\">Error al eliminar el registro!!!</span><br>";
		}	
	}

	echo "			<span class=\"spwhite\"><h3><b>A continuaci&oacute;n se muestran sus proyectos registrados</b></h3></span>";
	echo "				<table width=\"100%\" border=\"0\" bgcolor=\"$celda\" cellpadding=\"1\" cellspacing=\"1\">";
	echo "					<tr>";
	echo "						<th rowspan=\"1\" scope=\"col\" bgcolor=\"#fff\"><font color=\"#2989b9\">Partida Tipo de Proyecto</font></th>";
	echo "						<th rowspan=\"1\" scope=\"col\" bgcolor=\"#fff\"><font color=\"#2989b9\">Gasto/Bien</font></th>";
	echo "						<th rowspan=\"1\" scope=\"col\" bgcolor=\"#fff\"><font color=\"#2989b9\">Equipo/Trabajo/Servicio</font></th>";
	echo "						<th rowspan=\"1\" scope=\"col\" bgcolor=\"#fff\"><font color=\"#2989b9\">Curso</font></th>";
	echo "						<th rowspan=\"1\" scope=\"col\" bgcolor=\"#fff\"><font color=\"#2989b9\">Descripcion</font></th>";
	echo "						<th rowspan=\"1\" scope=\"col\" bgcolor=\"#fff\"><font color=\"#2989b9\">Documento del proyecto</font></th>";
	echo "						<th rowspan=\"1\" scope=\"col\" bgcolor=\"#fff\"><font color=\"#2989b9\">Imagenes</font></th>";
	echo "						<th rowspan=\"1\" scope=\"col\" bgcolor=\"#fff\"><font color=\"#2989b9\">Total de usuarios</font></th>";
	echo "						<th rowspan=\"1\" scope=\"col\" bgcolor=\"#fff\"><font color=\"#2989b9\">Total de ingresos</font></th>";
	echo "						<th rowspan=\"1\" scope=\"col\" bgcolor=\"#fff\"><font color=\"#2989b9\">&nbsp</font></th>";
	echo "					</tr>";

	/*		MODIFICADO POR HAFT DIC-11-2015
				$result=mysql_query("select o.id_conse_obra,o.id_proyecto,o.monto,o.clave_par, cpo.desc_proyecto, cpe.desc_par, o.status
				from obras o, cat_proyectos_o cpo, cat_partidas_e cpe
				where clave='$clave' and cpo.id_proyecto=o.id_proyecto and cpe.clave_par=o.clave_par order by id_conse_obra", $connect);
	*/
	/*
	$result = mysql_query("select o.tipo_proyecto_id, o.tipo_gasto_id, p.clave_par, p.desc_par, g.tipo_gasto, e.tipo_equipo_requerido_trabajo from obras o, cat_partidas_e p, cat_tipo_gasto g, 
	cat_tipo_equipo_requerido_trabajos e where p.conse_partidas = o.tipo_proyecto_id and g.partida_e_id = p.conse_partidas and g.tipo_gasto_id = o.tipo_gasto_id and e.tipo_gasto_id = g.tipo_gasto_id
	and e.tipo_equipo_id = o.tipo_equipo_id and o.activo = 1 and clave = '$clave' order by p.clave_par, p.desc_par, g.tipo_gasto, e.tipo_equipo_requerido_trabajo");
	*/
	/*
	$result = mysql_query("select o.id_conse_obra, o.clave_par, p.desc_par, g.tipo_gasto, te.tipo_equipo_requerido_trabajo, ac.actividad, o.observaciones, o.total_usuarios, o.total_ingresos, 
		o.status FROM obras o, cat_partidas_e p, cat_tipo_gasto g, cat_tipo_equipo_requerido_trabajos te, cat_actividades_i ac where o.activo = 1 and o.clave ='$clave' and 
		p.conse_partidas = o.tipo_proyecto_id and g.tipo_gasto_id = o.tipo_gasto_id and te.tipo_equipo_id = o.tipo_equipo_id and ac.conse_act = o.curso_id 
		order by o.clave_par", $connect);
	*/

/*	//MODIFICADO EL 12 DE OCTUBRE DE 2016 POR HAFT PARA INCLUIR INFO DE ARCHIVO DE PRESUPUESTO O COTIZACIÓN
	$result = mysql_query("select o.id_conse_obra, o.clave_par, p.desc_par, g.tipo_gasto, te.tipo_equipo_requerido_trabajo, ac.actividad, o.observaciones, o.total_usuarios, o.total_ingresos, o.status 
		FROM obras o left join cat_partidas_e p on p.conse_partidas = o.tipo_proyecto_id left join cat_tipo_gasto g on g.tipo_gasto_id = o.tipo_gasto_id left join cat_tipo_equipo_requerido_trabajos te 
		on te.tipo_equipo_id = o.tipo_equipo_id left join cat_actividades_i ac on ac.conse_act = o.curso_id where o.activo = 1 and o.clave = '$clave' order by o.clave_par", $connect);
*/
	$result = mysql_query("select o.id_conse_obra, o.clave_par, p.desc_par, g.tipo_gasto, te.tipo_equipo_requerido_trabajo, ac.actividad, a.ruta, a.nombre_archivo, a.nombre_original, o.observaciones, 
	o.total_usuarios, o.total_ingresos, o.status FROM obras o left join cat_partidas_e p on p.conse_partidas = o.tipo_proyecto_id left join cat_tipo_gasto g on g.tipo_gasto_id = o.tipo_gasto_id
	left join cat_tipo_equipo_requerido_trabajos te on te.tipo_equipo_id = o.tipo_equipo_id left join cat_actividades_i ac on ac.conse_act = o.curso_id 
	left join archivos a on a.id_conse_obra = o.id_conse_obra where o.activo = 1 and a.activo = 1 and o.clave = '$clave' order by o.clave_par",$connect);

	$ruta 				= "";
	$nombre_archivo 	= "";
	$nombre_original 	= "";

	$totalregistros = mysql_num_rows($result);
	$valcolor = 0;
	while($row = mysql_fetch_array($result))
	{
		$id_conse_obra 					= $row['id_conse_obra'];
		$id 							= $id_conse_obra;
		$clave_par 						= $row['clave_par'];
		$desc_par 						= utf8_encode($row['desc_par']);
		$tipo_gasto 					= utf8_encode($row['tipo_gasto']);
		$tipo_equipo_requerido_trabajo 	= utf8_encode($row['tipo_equipo_requerido_trabajo']);
		$actividad 						= utf8_encode($row['actividad']);
		$observaciones 					= $row['observaciones'];
		$total_usuarios 				= $row['total_usuarios'];
		$total_ingresos 				= number_format($row['total_ingresos'], 2, '.', ',');
		$status 						= $row['status'];

		$ruta 							= $row['ruta'];
		$nombre_archivo 				= $row['nombre_archivo'];
		$nombre_archivo 				= "$nombre_archivo";
		$nombre_original 				= $row['nombre_original'];

		if ($colorfila == 0)
		{
		   	$color = "#efefef";
		   	$colorfila = 1;
		}
		else
		{
		   	$color = "#fff";
		   	$colorfila = 0;
	    }

		if($valcolor == 0)
		{
			$color = "spgreen";
			$valcolor = 1;
		}
		else
		{
			$color = "spblue";
			$valcolor = 0;
		}

		/* CODIGO AGREGADO EL 12 DE OCTUBRE DE 2016 POR HAFT */
		$_SESSION["usuario"] = $usuario;

		$resfot = mysql_query("select count(*) as total from fotos where activo = 1 and id_conse_obra=$id", $connect) or die ("No se puede realizar la consulta. ".mysql_error());
		$totfot = mysql_num_rows($resfot);
		while ($data = mysql_fetch_array($resfot))
		{
			$tot_fotos = $data['total'];
		}

		echo "  <tr>";
		echo "    <td bgcolor=\"#fff\"><font color='#196f3d'>$clave_par $desc_par</font></td>";
		echo "    <td bgcolor=\"#fff\"><font color='#196f3d'>$tipo_gasto</font></td>";
		echo "	  <td bgcolor=\"#fff\"><font color='#196f3d'>$tipo_equipo_requerido_trabajo</font></td>";
		echo "	  <td bgcolor=\"#fff\"><font color='#196f3d'>$actividad</font></td>";
		echo "    <td bgcolor=\"#fff\"><font color='#196f3d'>$observaciones</font></td>";
		echo " 	  <td bgcolor=\"#fff\"><font color='#196f3d'><a href=\"$ruta$nombre_archivo\" target=\"_blank\" name=\"lnk_archivo\">$nombre_original</a></font></td>";
		echo "	  <td bgcolor=\"#fff\"><font color='#196f3d'><center><a href=\"cargar_fotos.php?id=$id_conse_obra&&clave=$clave\" target=\"_self\" name=\"lnk_fotos\">$tot_fotos</center></a></font></td>";
		echo "    <td bgcolor=\"#fff\"><span text-align=\"right\" class='#196f3d'>$total_usuarios</font></td>";
		echo "    <td bgcolor=\"#fff\"><span text-align=\"right\" class='#196f3d'>$total_ingresos</font></td>";

		if($status == 0)
		{
			echo "    	<td bgcolor=\"#fff\" align=\"center\">
							<font color='#196f3d'>
								<a href=\"detalleo_nuevo.php?elimina=SI&&id_conse_obra=$id_conse_obra&&clave=$clave\" title=\"eliminar registro\"><img src=\"tache.png\" width=\"20\" height=\"20\" /></a>
								| 
								<a href=\"edita_obra_nuevo.php?clave=$clave&&id_conse_obra=$id_conse_obra\" title=\"editar\"><img src=\"capturando.png\" width=\"20\" height=\"20\" /></a> 
						  	</font>
						</td>";
		}
		else if($status==1)
		{
			echo "    	<td bgcolor=\"#fff\" align=\"center\">
							<font color='#196f3d'>
								<a href=\"\" title=\"programa en revision\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a>
							</font>
						</td>";
		}
		else if($status==2)
		{
			echo "    	<td bgcolor=\"#fff\" align=\"center\">
							<font color='#196f3d'>
								<a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" /></a>
							</font>
						</td>";
		}
		else if($status==3)
		{
			echo "    	<td bgcolor=\"#fff\" align=\"center\">
							<font color='#196f3d'>
								<a href=\"\"  title=\"programa aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a>
							</font>
						</td>";
		}

		echo "  </tr>";
		$gtotal+=$monto;
	}

	$result = mysql_query("select sum(o.total_ingresos) as total FROM obras o, cat_partidas_e p, cat_tipo_gasto g, cat_tipo_equipo_requerido_trabajos te, cat_actividades_i ac 
		where o.activo = 1 and o.clave ='$clave' and p.conse_partidas = o.tipo_proyecto_id and g.tipo_gasto_id = o.tipo_gasto_id and te.tipo_equipo_id = o.tipo_equipo_id and ac.conse_act = o.curso_id 
		order by o.clave_par", $connect);
	$totalregistros = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
		$gtotal = $row['total'];
	}

	echo "  <tr>";
	echo "    <td bgcolor='#fff' colspan=\"6\" align=\"right\"><font color='#196f3d'>Total: &nbsp;</font></td>";
	echo "    <td bgcolor='#fff' align=\"center\"><font color='#196f3d'> " . number_format($gtotal,2) . "</font></td>";
	echo "	  <td bgcolor='#fff' colspan=\"1\"><font color='#196f3d'>&nbsp</font></td>";
	echo "  </tr>";
	echo "</table>";
	echo "<br>";

	echo "<center><a href=\"capturaso_nuevo.php\" class=\"spwhite\" target=\"_blank\">ver detalle de capturas</a></center>";

	echo" </body>";
	echo" </html>";
?>