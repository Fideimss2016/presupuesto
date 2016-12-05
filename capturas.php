<?php
	session_start();
	$clave 			= $_SESSION["clave"];
	$tipo_usuario 	= $_SESSION["tipo_usuario"];

	include "clases/variablesbd.php";

	$connect = mysql_connect("$host","$user","$passworks");
	mysql_select_db("$dbname",$connect);

	$celda 		= "#222";
	$celda1 	= "#333";
	$celda2 	= "#555";
	$celdaf 	= "#fff";
	$celdaf1 	= "#F0F0F9";

	$usuario_sistema = $_SESSION['usuario_sistema'];

	echo "			<link rel=\"stylesheet\" type=\"text/css\" href=\"capturas.css\" >";
	echo "			<body>";

	$result = mysql_query("select desc_uops, desc_del, id_cuota from cat_delegaciones where clave='$clave'", $connect);
	$totalregistros = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
		$desc_uops 	= $row['desc_uops'];
		$desc_del 	= $row['desc_del'];
		$id_cuota 	= $row['id_cuota'];
	}

	echo "				<center><h4><font color=\"#000\">Detalle de actividades registradas en sistema $desc_uops</font></h4></center>";
	echo "				<center>";
	echo "					<table width=\"97%\" border=\"0\" bgcolor=\"#000\" cellpadding=\"1\" cellspacing=\"2\">";
	echo "						<tr>";
	echo "							<th rowspan=\"2\" bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Clave</span></th>";
	echo "							<th rowspan=\"2\" bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Actividad</span></th>";
	echo "							<th rowspan=\"2\" bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Tipo de pago</span></th>";
	echo "							<th colspan=\"2\" bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Cuota</span></th>";
	echo "							<th colspan=\"2\" scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Usuarios</span></th>";
	echo "							<th colspan=\"3\" scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Enero</span></th>";
	echo "							<th colspan=\"3\" scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Febrero</span></th>";
	echo "							<th colspan=\"3\" scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Marzo</span></th>";
	echo "							<th colspan=\"3\" scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Abril</span></th>";
	echo "							<th colspan=\"3\" scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Mayo</span></th>";
	echo "							<th colspan=\"3\" scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Junio</span></th>";
	echo "							<th colspan=\"3\" scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Julio</span></th>";
	echo "							<th colspan=\"3\" scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Agosto</span></th>";
	echo "							<th colspan=\"3\" scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Septiembre</span></th>";
	echo "							<th colspan=\"3\" scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Octubre</span></th>";
	echo "							<th colspan=\"3\" scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Noviembre</span></th>";
	echo "							<th colspan=\"3\" scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Diciembre</span></th>";
	echo "							<th colspan=\"2\" scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Ingreso total</span></th>";
	echo "						</tr>";
	echo "						<tr>";
	echo "							<td align=\"center\" bgcolor=$celda><span class=\"titulo_small\">DH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda><span class=\"titulo_small\">NDH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda><span class=\"titulo_small\">DH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda><span class=\"titulo_small\">NDH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">Ingreso</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">DH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">NDH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">Ingreso</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">DH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">NDH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">Ingreso</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">DH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">NDH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">Ingreso</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">DH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">NDH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">Ingreso</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">DH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">NDH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">Ingreso</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">DH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">NDH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">Ingreso</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">DH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">NDH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">Ingreso</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">DH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">NDH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">Ingreso</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">DH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">NDH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">Ingreso</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">DH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">NDH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">Ingreso</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">DH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">NDH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">Ingreso</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">DH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">NDH</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda><span class=\"titulo_small\">Ingreso</span></td>";
	echo "							<td align=\"center\" bgcolor=$celda><span class=\"titulo_small\">POB</span></td>";
	echo "						</tr>";

	$colorfila = 0;
	$result = mysql_query("select i.id_conse_ing, i.clave_act, i.id_tipo_pago, i.id_tipo_curso, i.fecha_ini, i.fecha_fin, i.cta_der, i.cta_noder,
	(i.enero+i.febrero+i.marzo+i.abril+i.mayo+i.junio+i.julio+i.agosto+i.septiembre+i.octubre+i.noviembre+i.diciembre) as ingretot,
	(i.dh1+i.dh2+i.dh3+i.dh4+i.dh5+i.dh6+i.dh7+i.dh8+i.dh9+i.dh10+i.dh11+i.dh12) as totdh,
	(i.ndh1+i.ndh2+i.ndh3+i.ndh4+i.ndh5+i.ndh6+i.ndh7+i.ndh8+i.ndh9+i.ndh10+i.ndh11+i.ndh12) as totndh, i.enero, i.febrero, i.marzo, i.abril, i.mayo, i.junio, i.julio, i.agosto, i.septiembre, i.octubre, 
	i.noviembre, i.diciembre, i.dh1, i.dh2, i.dh3, i.dh4, i.dh5, i.dh6, i.dh7, i.dh8, i.dh9, i.dh10, i.dh11, i.dh12, i.ndh1, i.ndh2, i.ndh3, i.ndh4, i.ndh5, i.ndh6, i.ndh7, i.ndh8, i.ndh9, i.ndh10, 
	i.ndh11, i.ndh12, ci.clave_act as clact, ci.actividad, cti.desc_tipo_pago, ctc.desc_tipo_curso from ingresos i, cat_actividades_i ci, cat_tipo_pago_i cti, cat_tipo_curso_i ctc where clave=$clave 
	and ci.conse_act=i.conse_act and cti.id_tipo_pago=i.id_tipo_pago and ctc.id_tipo_curso=i.id_tipo_curso order by i.id_conse_ing", $connect);
	$totalregistros = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
		$id_conse_ing 		=$row['id_conse_ing'];
		$clave_act 			=$row['clave_act'];
		$id_tipo_pago 		=$row['id_tipo_pago'];
		$id_tipo_curso 		=$row['id_tipo_curso'];
		$fecha_ini 			=$row['fecha_ini'];
		$fecha_fin 			=$row['fecha_fin'];
		$cta_der 			=$row['cta_der'];
		$cta_noder 			=$row['cta_noder'];
		$ingretot 			=$row['ingretot'];
		$totdh 				=$row['totdh'];
		$totndh 			=$row['totndh'];
		$clact 				=$row['clact'];
		$actividad 			=$row['actividad'];
		$desc_tipo_pago 	=$row['desc_tipo_pago'];
		$desc_tipo_curso 	=$row['desc_tipo_curso'];
		$enero 				=$row['enero'];
		$febrero 			=$row['febrero'];
		$marzo 				=$row['marzo'];
		$abril 				=$row['abril'];
		$mayo 				=$row['mayo'];
		$junio 				=$row['junio'];
		$julio 				=$row['julio'];
		$agosto 			=$row['agosto'];
		$septiembre 		=$row['septiembre'];
		$octubre 			=$row['octubre'];
		$noviembre 			=$row['noviembre'];
		$diciembre 			=$row['diciembre'];
		$ndh1 				=$row['ndh1'];
		$ndh2 				=$row['ndh2'];
		$ndh3 				=$row['ndh3'];
		$ndh4 				=$row['ndh4'];
		$ndh5 				=$row['ndh5'];
		$ndh6 				=$row['ndh6'];
		$ndh7 				=$row['ndh7'];
		$ndh8 				=$row['ndh8'];
		$ndh9 				=$row['ndh9'];
		$ndh10 				=$row['ndh10'];
		$ndh11 				=$row['ndh11'];
		$ndh12 				=$row['ndh12'];
		$dh1 				=$row['dh1'];
		$dh2 				=$row['dh2'];
		$dh3 				=$row['dh3'];
		$dh4 				=$row['dh4'];
		$dh5 				=$row['dh5'];
		$dh6 				=$row['dh6'];
		$dh7 				=$row['dh7'];
		$dh8 				=$row['dh8'];
		$dh9 				=$row['dh9'];
		$dh10 				=$row['dh10'];
		$dh11 				=$row['dh11'];
		$dh12 				=$row['dh12'];

		if ($colorfila == 0)
		{
			$color 		= "#efefef";
			$colorfila 	= 1;
		}
		else
		{
			$color 		= "#ffffff";
			$colorfila 	= 0;
		}

		$poblacion = $totdh + $totndh;
		echo "  				<tr>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$clact</span></td>";
		echo "    					<td align=\"left\" bgcolor=$color><span class=\"spgreen\">$actividad</span></td>";
		echo "    					<td align=\"left\" bgcolor=$color><span class=\"spgreen\">$desc_tipo_pago</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($cta_der,2) . "</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($cta_noder,2) . "</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$totdh</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$totndh</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($enero,2) . "</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh1</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh1</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($febrero,2) . "</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh2</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh2</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($marzo,2) . "</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh3</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh3</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($abril,2) . "</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh4</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh4</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($mayo,2) . "</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh5</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh5</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($junio,2) . "</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh6</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh6</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($julio,2) . "</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh7</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh7</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($agosto,2) . "</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh8</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh8</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($septiembre,2) . "</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh9</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh9</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($octubre,2) . "</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh10</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh10</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($noviembre,2) . "</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh11</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh11</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($diciembre,2) . "</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$dh12</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$ndh12</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($ingretot,2) . "</span></td>";
		echo "    					<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$poblacion</span></td>";
		echo "  				</tr>";

		$gtotdh 		+= $totdh;
		$gtotndh 		+= $totndh;
		$gdh1 			+= $dh1;
		$gndh1 			+= $ndh1;
		$gdh2 			+= $dh2;
		$gndh2 			+= $ndh2;
		$gdh3 			+= $dh3;
		$gndh3 			+= $ndh3;
		$gdh4 			+= $dh4;
		$gndh4 			+= $ndh4;
		$gdh5 			+= $dh5;
		$gndh5 			+= $ndh5;
		$gdh6 			+= $dh6;
		$gndh6 			+= $ndh6;
		$gdh7 			+= $dh7;
		$gndh7 			+= $ndh7;
		$gdh8 			+= $dh8;
		$gndh8 			+= $ndh8;
		$gdh9 			+= $dh9;
		$gndh9 			+= $ndh9;
		$gdh10 			+= $dh10;
		$gndh10 		+= $ndh10;
		$gdh11 			+= $dh11;
		$gndh11 		+= $ndh11;
		$gdh12 			+= $dh12;
		$gndh12 		+= $ndh12;
		$genero 		+= $enero;
		$gfebrero 		+= $febrero;
		$gmarzo 		+= $marzo;
		$gabril 		+= $abril;
		$gmayo 			+= $mayo;
		$gjunio 		+= $junio;
		$gjulio 		+= $julio;
		$gagosto 		+= $agosto;
		$gseptiembre 	+= $septiembre;
		$goctubre 		+= $octubre;
		$gnoviembre 	+= $noviembre;
		$gdiciembre 	+= $diciembre;
		$gingretot 		+= $ingretot;
		$gpoblacion 	+= $poblacion;
	}

	echo "  					<tr>";
	echo "    						<td align=\"right\" bgcolor=$celda colspan=\"5\"><span class=\"titulo_small\">Totales: &nbsp;</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda><span class=\"titulo_small\">$gtotdh</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda><span class=\"titulo_small\">$gtotndh</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($genero,2) . "</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gdh1</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gndh1</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gfebrero,2) . "</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gdh2</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gndh2</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmarzo,2) . "</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gdh3</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gndh3</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gabril,2) . "</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gdh4</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gndh4</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmayo,2) . "</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gdh5</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gndh5</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gjunio,2) . "</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gdh6</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gndh6</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gjulio,2) . "</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gdh7</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gndh7</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gagosto,2) . "</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gdh8</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gndh8</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gseptiembre,2) . "</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gdh9</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gndh9</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($goctubre,2) . "</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gdh10</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gndh10</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gnoviembre,2) . "</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gdh11</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\">$gndh11</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gdiciembre,2) . "</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gdh12</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\">$gndh12</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda><span class=\"titulo_small\"> " . number_format($gingretot,2) . "</span></td>";
	echo "    						<td align=\"center\" bgcolor=$celda><span class=\"titulo_small\">$gpoblacion</span></td>";
	echo "  					</tr>";
	echo "					</table>";
	echo "					<br><br>";
	echo "					<table width=\"97%\">";

	$_SESSION['revisa'] 	= $_REQUEST['revisa'];
	$revisa 				= $_SESSION['revisa'];

	if (isset($revisa))
	{
		/***FORMULARIO RESPUESTA***/
		$result = mysql_query("select desc_uops, desc_del from cat_delegaciones where clave=$clave", $connect);
		$totalregistros = mysql_num_rows($result);
		while($row = mysql_fetch_array($result))
		{
			$desc_uops 	= $row['desc_uops'];
			$desc_del 	= $row['desc_del'];
		}
		
		$sqlUpdate = mysql_query("UPDATE ingresos SET status=1 where clave='$clave'", $connect) or die(mysql_error());
		if($sqlUpdate)
		{
			echo "Su Plan Rector 2017 correspondiente al area de Ingresos ha sido enviado para revisi&oacute;n al jefe de oficina, espere comentarios y/o aprobaci&oacute;n del mismo apartir de este momento usted ya no puede realizar cambios en el mismo!!!";
			
			$clacon = substr($clave,0,2);
			$result = mysql_query("select nombre, ape_pat, ape_mat, email from jefes where clave like '$clacon%' and activo=1", $connect);
			$totalregistros = mysql_num_rows($result);
			while($row = mysql_fetch_array($result))
			{
				$nombre 	= $row['nombre'];
				$ape_pat 	= $row['ape_pat'];
				$ape_mat 	= $row['ape_mat'];
				$email 		= $row['email'];
			}
			
			$clacon = substr($clave,0,2);
			$resultj = mysql_query("SELECT nombre_1,email_1,nombre_2,email_2,nombre_3,email_3 FROM jefes_mail WHERE clave like '$clacon%'", $connect);
			$totalregistros = mysql_num_rows($resultj);
			while($row = mysql_fetch_array($resultj))
			{
				$nombre_1 	= $row['nombre_1'];
				$email_1 	= $row['email_1'];
				$nombre_2 	= $row['nombre_2'];
				$email_2 	= $row['email_2'];
				$nombre_3 	= $row['nombre_3'];
				$email_3 	= $row['email_3'];
			}
			
			$jefe 			= "$nombre $ape_pat $ape_mat";
			$destinatario 	= "$email";
			$asunto 		= "Revision de Plan Rector 2017 - Ingresos";
			$cuerpo 		= "		<html>
										<head>
											<title> .:Plan Rector 2017:. </title>
										</head>
										<body>
											<h1>.:Plan Rector 2017:.</h1>
											<p>
												<b>Jefe de Oficina de Deporte<br>$jefe</b><br><br> Le informo que el usuario ". $usuario_sistema ." de $desc_uops ha enviado una petici&oacute;n de revisi&oacute;n de Plan Rector 2017 correspondiente al &Aacute;rea de Ingresos del Fideicomiso para el Desarrollo del Deporte por parte de su Delegaci&oacute;n $desc_del,  Esperando sus comentarios y/o visto bueno del mismo. Una vez con se Vobo. deber&aacute; enviarlo a revisión por parte del personal del Fideicomiso para su validaci&oacute;n final<br><br>Este es un mensaje del sistema!
											</p>
										</body>
									</html>";
			$headers 		= "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= "From: FIDEICOMISO PARA EL DESARROLLO DEL DEPORTE <fideimss@fideimss.org.mx>\r\n";
			$headers .= "Reply-To: fideimss@fideimss.org.mx\r\n";
			$headers .= "Cc: fideimss@fideimss.org.mx, reynaldo.arias@fideimss.org.mx, $email_1, kenia.jaramillo@fideimss.org.mx\r\n";
			mail($destinatario,$asunto,$cuerpo,$headers);
		}
		else
		{
			echo "<br>Error al enviar CVR 2017!!!";
		}
		
		/***************************************************************************FIN FORMULARIO RESPUESTA********************************************************************************/
	}

	if($result != 0)
	{
		$result = mysql_query("select count(*) as numerosc,status from ingresos where clave=$clave", $connect);
		$totalregistros = mysql_num_rows($result);
		while($row = mysql_fetch_array($result))
		{
			$status 	= $row['status'];
			$numerosc 	= $row['numerosc'];
		}

		if($status == 0 && $numerosc != 0)
		{
			echo "				<form name='form1' action='".$_SERVER['PHP_SELF']."' method='POST'>";
// Código agregado el 17 de noviembre por HAFT //

			$PresupAnt = mysql_query("SELECT pto2013 FROM cat_delegaciones where clave = '$clave';", $connect);
			$totRegs = mysql_num_rows($PresupAnt);
			while ($dat = mysql_fetch_array($PresupAnt))
			{
				$presupuesto_anterior = $dat['pto2013'];
			}
			if ($gingretot > $presupuesto_anterior)
			{
				$diferencia = $gingretot - $presupuesto_anterior;
			}
			if ($diferencia <= 20 || $gingretot >= $presupuesto_anterior)
			{
				echo "					<tr>

											<td align=\"center\"><input name=\"revisa\" type=\"checkbox\" value=\"si\"> Enviar a revisi&oacute;n al Jefe de Oficina</td>
										</tr>";
				echo "					<tr>
											<td align=\"center\"><input type=\"submit\" value=\"continuar\" /></td>
										</tr>";
				echo "				</form>";
				echo "				<tr>
										<td align=\"center\"><a href=\"imprime_ingresos.php\">Imprimir</a></td>
									</tr>";
			}
			else
			{
				echo "				<tr>
										<td align=\"center\"><a href=\"imprime_ingresos.php\">Imprimir</a></td>
									</tr>";
			}
		}
		else if($status == 1 && $numerosc != 0)
		{
			echo "				<tr>
									<td align=\"center\">El Plan Rector 2017 correspondiente al area de Ingresos ya se ha enviado a revisi&oacute;n al jefe de oficina!!!</td>
								</tr>";
			echo "				<tr>
									<td align=\"center\"><a href=\"imprime_ingresos.php\">Imprimir</a></td>
								</tr>";
		}
		else if($status == 2 && $numerosc != 0)
		{
		echo "					<tr>
									<td align=\"center\">El Plan Rector 2017 correspondiente al area de Ingresos ya ha sido autorizado y enviado por el Jefe de Oficina a Fideimss a revisi&oacute;n!!!</td>
								</tr>";
		echo "					<tr>
									<td align=\"center\"><a href=\"imprime_ingresos.php\">Imprimir</a></td>
								</tr>";
		}
		else if($status == 3 && $numerosc != 0)
		{
		echo "					<tr>
									<td align=\"center\">El Plan Rector 2017 correspondiente al area de Ingresos ya ha sido autorizado!!!</td>
								</tr>";
		echo "					<tr>
									<td align=\"center\"><a href=\"imprime_ingresos.php\">Imprimir</a></td>
								</tr>";
		}
	}

	echo "					</table>";
	echo "				</center>";
	echo "			</body>";
	echo "		</html>";
?>