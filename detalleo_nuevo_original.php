<?php
	include ("config.inc.php");
header ('content-type: text/html; charset=utf-8');
echo " <link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\" >";

	//conexion a la base de datos
	$connect=mysql_connect($dbhost,$dbuser,$dbpass);
	mysql_set_charset('utf8');

	//Seleccion de la base
	mysql_select_db($dbname,$connect);

echo" <body>";

$clave=$_SESSION["clave"];

$celda="#1a1a1a";
$tabla="#666";
$celda1="#666";

/*$clave = '99000';*/
echo "<span class=\"spwhite\"><b>A continuaci&oacute;n se muestran sus proyectos registrados</b></span>";


echo "<table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "  <tr>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Partida Tipo de Proyecto</th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Gasto/Bien</th>";
echo "	  <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Equipo/Trabajo/Servicio</th>";
echo "	  <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Curso</th>";
echo "	  <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Observaciones</th>";
echo "	  <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Total de usuarios</th>";
echo "	  <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Total de ingresos</th>";
echo "  </tr>";

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
$result = mysql_query("SELECT o.clave_par, p.desc_par, g.tipo_gasto, te.tipo_equipo_requerido_trabajo, ac.actividad, o.observaciones, o.total_usuarios, o.total_ingresos 
	FROM obras o, cat_partidas_e p, cat_tipo_gasto g, cat_tipo_equipo_requerido_trabajos te, cat_actividades_i ac 
	where o.activo = 1 and o.clave ='$clave' and p.conse_partidas = o.tipo_proyecto_id and g.tipo_gasto_id = o.tipo_gasto_id and te.tipo_equipo_id = o.tipo_equipo_id and ac.conse_act = o.curso_id 
	order by o.clave_par", $connect);

$totalregistros=mysql_num_rows($result);
$valcolor==0;
while($row=mysql_fetch_array($result))
{
/*
	$id_conse_obra=$row['id_conse_obra'];
	$id_proyecto=$row['id_proyecto'];
	$monto=$row['monto'];
	$clave_par=$row['clave_par'];
	$desc_proyecto=$row['desc_proyecto'];
	$desc_par=$row['desc_par'];			
	$status=$row['status'];			
*/
	$clave_par = 						htmlentities($row['clave_par']);
	$desc_par = 						htmlentities($row['desc_par']);
	$tipo_gasto = 						htmlentities($row['tipo_gasto']);
	$tipo_equipo_requerido_trabajo = 	htmlentities($row['tipo_equipo_requerido_trabajo']);
	$actividad = 						htmlentities($row['actividad']);
	$observaciones = 					htmlentities($row['observaciones']);
	$total_usuarios = 					htmlentities($row['total_usuarios']);
	$total_ingresos = 					number_format(htmlentities($row['total_ingresos']), 2, '.', ',');

	if ($colorfila==0)
	{
	   	$color= "#efefef";
	   	$colorfila=1;
	}
	else
	{
	   	$color="#fff";
	   	$colorfila=0;
    }

	if($valcolor==0)
	{
		$color="spgreen"; $valcolor=1;
	}
	else
	{
		$color="spblue"; $valcolor=0;
	}


	echo "  <tr>";
	echo "    <td bgcolor=\"$celda\"><span class=$color>$clave_par $desc_par</span></td>";
	echo "    <td bgcolor=\"$celda\"><span class=$color>$tipo_gasto</span></td>";
	echo "	  <td bgcolor=\"$celda\"><span class=$color>$tipo_equipo_requerido_trabajo</span></td>";
	echo "	  <td bgcolor=\"$celda\"><span class=$color>$actividad</span></td>";
	echo "    <td bgcolor=\"$celda\"><span class=$color>$observaciones</span></td>";
	echo "    <td bgcolor=\"$celda\"><span text-align=\"right\" class=$color>$total_usuarios</span></td>";
	echo "    <td bgcolor=\"$celda\"><span text-align=\"right\" class=$color>$total_ingresos</span></td>";
/*
	//echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color> " . number_format($monto,2) . "</span></td>";

	if($status==0)
	{
		echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"obra.php?elimina=SI&&id_conse_obra=$id_conse_obra&&clave=$clave\" title=\"eliminar registro\"><img src=\"tache.png\" width=\"20\" height=\"20\" /></a>
					   | 
					  <a href=\"edita_obra.php?clave=$clave&&id_conse_obra=$id_conse_obra\" title=\"editar\"><img src=\"capturando.png\" width=\"20\" height=\"20\" /></a> 
					  </span></td>";
	}
	else if($status==1)
	{
		echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
	}
	else if($status==2)
	{
		echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" />	</a></span></td>";
	}
	else if($status==3)
	{
		echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"program aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
	}

	echo "  </tr>";
	$gtotal+=$monto;
	*/
}

$result = mysql_query("SELECT sum(o.total_ingresos) as total FROM obras o, cat_partidas_e p, cat_tipo_gasto g, cat_tipo_equipo_requerido_trabajos te, cat_actividades_i ac 
	where o.activo = 1 and o.clave ='$clave' and p.conse_partidas = o.tipo_proyecto_id and g.tipo_gasto_id = o.tipo_gasto_id and te.tipo_equipo_id = o.tipo_equipo_id and ac.conse_act = o.curso_id 
	order by o.clave_par", $connect);
$totalregistros = mysql_num_rows($result);
while($row=mysql_fetch_array($result))
{
	$gtotal = $row['total'];
}

echo "  <tr>";
echo "    <td bgcolor=\"$celda\" colspan=\"6\" align=\"right\"><span class=\"$color\">Total: &nbsp;</span></td>";
echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=\"$color\"> " . number_format($gtotal,2) . "</span></td>";
echo "  </tr>";
echo "</table>";
echo "<br>";

/*
echo "<table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";

echo "<tr><td><span class=\"spwhite\"><b>&nbsp;BIENES DE CONSUMO / SERVICIOS GENERALES</b></span></td></tr>";

echo "  <tr>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Partida</th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Actividad</th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Cantidad</th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Unidad</th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Egreso</th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\">Movimientos</th>";
echo "  </tr>";


			$result=mysql_query("select e.id_conse_egresos,e.clave_act,e.clave_par,e.cantidad,e.unidad,e.total_gasto,ci.actividad,cp.desc_par,e.status
			from egresos e, cat_actividades_i ci, cat_partidas_e cp where clave=$clave and ci.clave_act=e.clave_act and cp.clave_par=e.clave_par and e.clave_par='0201' order by clave_par", $connect);

			$totalregistros=mysql_num_rows($result);
			$valcolor==0;
			while($row=mysql_fetch_array($result))
			{
			$id_conse_egresos=$row['id_conse_egresos'];
			$clave_act=$row['clave_act'];
			$clave_par=$row['clave_par'];
			$cantidad=$row['cantidad'];
			$unidad=$row['unidad'];			
			$total_gasto=$row['total_gasto'];
			$actividad=$row['actividad'];
			$desc_par=$row['desc_par'];
			$status=$row['status'];

	if ($colorfila==0)
	{
	   	$color= "#efefef";
	   	$colorfila=1;
	}
	else
	{
	   	$color="#fff";
	   	$colorfila=0;
    }



			if($valcolor==0)
			{$color="spgreen"; $valcolor=1;}
			else
			{$color="spblue"; $valcolor=0;}


			echo "  <tr>";
			echo "    <td bgcolor=\"$celda\"><span class=$color>$clave_par $desc_par</span></td>";
			echo "    <td bgcolor=\"$celda\"><span class=$color>$clave_act $actividad</span></td>";
			echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color>$cantidad</span></td>";
			echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color>$unidad</span></td>";
			echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color> " . number_format($total_gasto,2) . "</span></td>";


				if($status==0)
				{
			echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"egresos.php?elimina=SI&&id_conse_egresos=$id_conse_egresos&&clave=$clave\" title=\"eliminar registro\"><img src=\"tache.png\" width=\"20\" height=\"20\" /></a>
					   | 
					  <a href=\"editae.php?clave=$clave&&id_conse_egresos=$id_conse_egresos\" title=\"editar\"><img src=\"capturando.png\" width=\"20\" height=\"20\" /></a> 
					  </span></td>";
				}
				else if($status==1)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
			else if($status==2)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" />	</a></span></td>";
				}
			else if($status==3)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"program aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
	
		echo "  </tr>";
			$gtotal_e+=$total_gasto;
			}

			echo "  <tr>";
			echo "    <td bgcolor=\"$celda\" colspan=\"4\" align=\"right\"><span class=\"$color\">Total: &nbsp;</span></td>";
			echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=\"$color\"> " . number_format($gtotal_e,2) . "</span></td>";
			echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=\"$color\">&nbsp;</span></td>";
			echo "  </tr>";

echo "</table>";
echo "<br>";
*/
/*
if($result!=0)
{
echo "<center><a href=\"capturaso.php\" class=\"spwhite\" target=\"_blank\">ver detalle de capturas</a></center>";
}
*/
echo" </body>";
echo" </html>";

?>