<?php
	include "valida_seguridad.php";
	include "clases/variablesbd.php";
	echo"		<link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\" >";

	echo "		<body>";
	echo "			<div id=\"contenedor\">";
	echo "				<div id=\"contenido_cont\">";

	$usuario_sistema=$_SESSION["usuario_sistema"];
//	$clave=$_SESSION["clave"];
	$tipo_usuario=$_SESSION["tipo_usuario"];
/*
$clave = "99000";
$usuario_sistema = 'Humberto Franco';
$tipo_usuario 	= 'JD3';
*/
	echo "					<div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
	echo "					<h3>Captura Presupuesto 2017</h3>";
	echo "					<p class=\"spwhite\">";
	echo "						<b>Resumen de Capturas en el Sistema de Presupuesto 2017</b>";
	echo "					</p>";
	echo "					<div id=\"cajaareas\">";

	$connect=mysql_connect("$host","$user","$passworks");
	mysql_select_db("$dbname",$connect);
//	echo "		<body>";

	$celda 	= "#1a1a1a";
	$tabla 	= "#666";
	$celda1 = "#666";
	$c1 	= "#333333";

//	$consup=substr($clave,0,2);

	if($tipo_usuario=='JD1')
	{
		/*INGRESOS*/
		echo "						<h2>Ingresos</h2>";
		echo "						<table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";

		$result = mysql_query("SELECT distinct(i.clave_del),cd.desc_del from ingresos i,cat_delegaciones cd where i.clave_del=cd.clave_del order by i.clave_del", $connect);
		$totalregistros = mysql_num_rows($result);
		while($row = mysql_fetch_array($result))
		{
			$clave_del 	= $row['clave_del'];
			$desc_del 	= $row['desc_del'];

			echo "						<tr><th scope=\"col\" bgcolor=\"$c1\" colspan=\"4\" align=\"left\"><span class=\"spgrey\">&nbsp;<b>$desc_del</b></th></tr>";

			$result1 = mysql_query("SELECT i.clave, sum(i.ingreso_total) as ingretot, i.status, cd.desc_uops, cd.pto2013 from ingresos i ,cat_delegaciones cd where i.clave_del=$clave_del and cd.clave=i.clave group by clave,status order by clave", $connect);
			$totalregistros = mysql_num_rows($result1);

			echo "						<tr>
											<td bgcolor=\"$celda\" align=\"left\"><span class=\"white\">Unidad Operativa</span></td>
										    <td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Presupuesto 2017</span></td>
										    <td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Ingreso</span></td>
										    <td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Status</span></td>
										</tr>";

			while($row = mysql_fetch_array($result1))
			{
				$clave 		= $row['clave'];
				$ingretot 	= $row['ingretot'];
				$status 	= $row['status'];
				$desc_uops 	= $row['desc_uops'];
				$pto2013 	= $row['pto2013'];

				$ingretot 	= round($ingretot,2);

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

				echo "					<tr>
											<td bgcolor=\"$celda\" align=\"left\"><span class=\"$color\">$clave $desc_uops </span><a href=\"vcapturas.php?clave=$clave\" class=\"grey\" target=\"_blank\">ver detalle</a> |
				  								<a href=\"ver_detalle_ingresos.php?clave=$clave\" class=\"grey\" target=\"_blank\">ver capturas</a></td>
			      							<td bgcolor=\"$celda\" align=\"center\"><span class=\"$color\"> " .number_format($pto2013,2) . "</span></td>
			      							<td bgcolor=\"$celda\" align=\"center\"><span class=\"$color\"> " .number_format($ingretot,2) . "</span></td>";
				if($status == 0)
				{
					echo "					<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"capturando registros\"><img src=\"capturando.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
				else if($status == 1)
				{
					echo "					<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
				else if($status == 2)
				{
					echo "					<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" />	</a></span></td>";
				}
				else if($status == 3)
				{
					echo "					<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"program aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
			    echo "					</tr>";
			}
		}

		echo "						</table>";

	/*TERMINA INGRESOS*/
	}//IF
	else if($tipo_usuario == 'JD2')
	{
		/*EGRESOS*/
		echo "						<h2>Egresos</h2>";
		echo "						<table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";

		$result = mysql_query("SELECT distinct(e.clave_del),cd.desc_del from egresos e,cat_delegaciones cd where e.clave_del=cd.clave_del order by e.clave_del", $connect);
		$totalregistros = mysql_num_rows($result);
		while($row = mysql_fetch_array($result))
		{
			$clave_del 	= $row['clave_del'];
			$desc_del 	= $row['desc_del'];

			echo "						<tr><th scope=\"col\" bgcolor=\"$c1\" colspan=\"3\" align=\"left\"><span class=\"spgrey\">&nbsp;<b>$desc_del</b></th></tr>";

			$result1 = mysql_query("SELECT e.clave, sum(e.total_gasto) as total_gasto, e.status, cd.desc_uops from egresos e ,cat_delegaciones cd where e.clave_del=$clave_del and cd.clave=e.clave group by clave,status order by clave", $connect);
			$totalregistros = mysql_num_rows($result1);

			echo "						<tr>
											<td bgcolor=\"$celda\" align=\"left\"><span class=\"white\">Unidad Operativa</span></td>
											<td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Egreso</span></td>
											<td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Status</span></td>
										</tr>";

			while($row = mysql_fetch_array($result1))
			{
				$clave 			= $row['clave'];
				$total_gasto 	= $row['total_gasto'];
				$status 		= $row['status'];
				$desc_uops 		= $row['desc_uops'];

				$total_gasto 	= round($total_gasto,2);

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

				echo "					<tr>
											<td bgcolor=\"$celda\" align=\"left\"><span class=\"$color\">$clave $desc_uops </span><a href=\"vcapturase.php?clave=$clave\" class=\"grey\" target=\"_blank\">ver detalle</a> |
												<a href=\"ver_detalle_egresos.php?clave=$clave\" class=\"grey\" target=\"_blank\">ver capturas</a></td>
											<td bgcolor=\"$celda\" align=\"center\"><span class=\"$color\"> " .number_format($total_gasto,2) . "</span></td>";
				if($status == 0)
				{
					echo "					<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"capturando registros\"><img src=\"capturando.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
				else if($status == 1)
				{
					echo "					<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
				else if($status == 2)
				{
					echo "					<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" />	</a></span></td>";
				}
				else if($status == 3)
				{
					echo "					<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"program aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
				echo "					</tr>";
			}
		}

		echo "						</table>";
	/*TERMINA EGRESOS*/
	}//IF
	else if($tipo_usuario == 'JD3')
	{
		/*OBRA*/
		echo "							<h2>Obra</h2>";
		echo "							<table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";

		$result = mysql_query("SELECT distinct(o.clave_del),cd.desc_del from obras o,cat_delegaciones cd where o.clave_del=cd.clave_del order by o.clave_del", $connect);
		$totalregistros = mysql_num_rows($result);
		while($row = mysql_fetch_array($result))
		{
			$clave_del 	= $row['clave_del'];
			$desc_del 	= $row['desc_del'];

			echo "							<tr><th scope=\"col\" bgcolor=\"$c1\" colspan=\"3\" align=\"left\"><span class=\"spgrey\">&nbsp;<b>$desc_del</b></th></tr>";

/*			$result1 = mysql_query("SELECT o.clave, sum(o.monto) as monto, o.status, cd.desc_uops from obras o ,cat_delegaciones cd where o.clave_del='$clave_del' and cd.clave=o.clave group by o.clave,o.status order by o.clave", $connect);
*/
			$result1 = mysql_query("SELECT o.id_conse_obra, o.clave, sum( o.monto ) AS monto, o.status, cd.desc_uops, a.ruta, a.nombre_archivo, a.nombre_original FROM obras o, cat_delegaciones cd, archivos a	WHERE o.clave_del = '$clave_del' AND cd.clave = o.clave AND a.id_conse_obra = o.id_conse_obra and a.activo=1 GROUP BY o.clave, o.status, a.nombre_archivo", $connect);
			$totalregistros = mysql_num_rows($result1);

			echo "							<tr>
												<td bgcolor=\"$celda\" align=\"left\"><span class=\"white\">Unidad Operativa</span></td>
												<td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Gasto Obra</span></td>
												<td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Status</span></td>
											</tr>";

			while($row = mysql_fetch_array($result1))
			{
				$clave 				= $row['clave'];
				$monto 				= $row['monto'];
				$status 			= $row['status'];
				$desc_uops 			= $row['desc_uops'];

				$ruta 				= $row['ruta'];
				$nombre_archivo 	= $row['nombre_archivo'];
				$nombre_original 	= $row['nombre_original'];
				$nombre_original 	= utf8_encode("$nombre_original");

				$id_obra 		= $row['id_conse_obra'];


				$monto 		= round($monto,2);

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

				$qryFotos = mysql_query("SELECT count(*) as total from fotos where activo = 1 and id_conse_obra=$id_obra", $connect);
				$totFotRg = mysql_num_rows($qryFotos);
				while ($datFot = mysql_fetch_array($qryFotos))
				{
					$tot_Fotos = $datFot['total'];
				}
				echo "						<tr>
												<td bgcolor=\"$celda\" align=\"left\">
													<span class=\"$color\">$clave $desc_uops </span>
													<a href=\"vcapturasox.php?clave=$clave\" class=\"grey\" target=\"_blank\">ver detalle</a> |
													<a href=\"ver_detalle_obra.php?clave=$clave\" class=\"grey\" target=\"_blank\">ver capturas</a> | 
													<a href=\"$ruta$nombre_archivo\" target=\"_blank\" class=\"grey\" name=\"lnk_archivo\">ver documento de presupuesto</a> |
													<a href=\"cargar_fotos.php?id=$id_obra&&clave=$clave\" target=\"_self\" class=\"grey\" name=\"lnk_fotos\">ver fotos ($tot_Fotos)</a>
												</td>
												<td bgcolor=\"$celda\" align=\"center\"><span class=\"$color\"> " .number_format($monto,2) . "</span></td>";
				if($status == 0)
				{
					echo "						<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"capturando registros\"><img src=\"capturando.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
				else if($status == 1)
				{
					echo "					<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
				else if($status == 2)
				{
					echo "					<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" />	</a></span></td>";
				}
				else if($status == 3)
				{
					echo "					<td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"program aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}

				echo "					</tr>";

			}
		}

	echo "								</table>";
	/*TERMINA OBRA*/
	}


	else if($tipo_usuario=='JD4' || $tipo_usuario=='SUP')
	{
	/*PERSONAL*/
	echo "    <h2>PERSONAL</h2>";
	echo "<table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";


	$result=mysql_query("select distinct(p.clave_del),cd.desc_del from personal p,cat_delegaciones cd where p.clave_del=cd.clave_del order by p.clave_del", $connect);
	$totalregistros=mysql_num_rows($result);

	while($row=mysql_fetch_array($result))
	{
	$clave_del=$row['clave_del'];
	$desc_del=$row['desc_del'];

	echo "<tr><th scope=\"col\" bgcolor=\"$c1\" colspan=\"3\" align=\"left\"><span class=\"spgrey\">&nbsp;<b>$desc_del</b></th></tr>";

		//ECHO  "select p.clave, sum(p.gas_anual) as gas_anual, p.status, cd.desc_uops from personal p ,cat_delegaciones cd where p.clave_del='$clave_del' and cd.clave=p.clave group by p.clave order by p.clave";
		$result1=mysql_query("select p.clave, sum(p.gas_anual) as gas_anual, p.status, cd.desc_uops from personal p ,cat_delegaciones cd where p.clave_del='$clave_del' and cd.clave=p.clave group by p.clave order by p.clave", $connect);
		$totalregistros=mysql_num_rows($result1);

		echo "<tr>
		      <td bgcolor=\"$celda\" align=\"left\"><span class=\"white\">Unidad Operativa</span></td>
		      <td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Gasto Personal</span></td>
		      <td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Status</span></td>
		      </tr>";


		while($row=mysql_fetch_array($result1))
		{
		$clave=$row['clave'];
		$gas_anual=$row['gas_anual'];
		$status=$row['status'];
		$desc_uops=$row['desc_uops'];

		$monto=round($monto,2);

		if($valcolor==0)
		{$color="spgreen"; $valcolor=1;}
		else
		{$color="spblue"; $valcolor=0;}


		echo "<tr>
		      <td bgcolor=\"$celda\" align=\"left\"><span class=\"$color\">$clave $desc_uops </span><a href=\"vcapturasp.php?clave=$clave\" class=\"grey\" target=\"_blank\">ver detalle</a> |
			  <a href=\"ver_detalle_personal.php?clave=$clave\" class=\"grey\" target=\"_blank\">ver capturas</a></td>
		      <td bgcolor=\"$celda\" align=\"center\"><span class=\"$color\"> " .number_format($gas_anual,2) . "</span></td>";

			if($status==0 || $status==10)
				{
				echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"capturando registros\"><img src=\"capturando.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
					else if($status==1)
					{
					echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
					}
				else if($status==2)
					{
					echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" />	</a></span></td>";
					}
				else if($status==3 || $status==5)
					{
					echo "    <td bgcolor=\"$celda\" align=\"center\"><span class=$color><a href=\"\"  title=\"program aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
					}
		      echo "</tr>";
		}
	}

	echo "</table>";
	/*TERMINA PERSONAL*/
	}





	echo "   	</div>";//cajaareas

	echo "<br>";

	echo "  </div>";//div contenido_cont
	echo "</div>";//div contenedor



	echo" </body>";
	echo" </html>";
?>