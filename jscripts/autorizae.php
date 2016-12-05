<?php
	session_start();
	$_SESSION['clave'] 	= $_REQUEST['clave'];
	$clave 				= $_SESSION["clave"];
	$tipo_usuario 		= $_SESSION["tipo_usuario"];
	include "clases/variablesbd.php";
	$connect 	= mysql_connect("$host","$user","$passworks");
	mysql_select_db("$dbname",$connect);

	$celda 		= "#222";
	$celda1 	= "#333";
	$celda2 	= "#555";
	$celdaf 	= "#fff";
	$celdaf1 	= "#F0F0F9";

	$usuario_sistema 	= $_SESSION['usuario_sistema'];

	echo "		<link rel=\"stylesheet\" type=\"text/css\" href=\"capturas.css\">";
	echo "		<body>";

	$result 	= mysql_query("select desc_uops, desc_del, id_cuota from cat_delegaciones where clave='$clave'", $connect);
	$totalregistros 	= mysql_num_rows($result);
	while($row=mysql_fetch_array($result))
	{
		$desc_uops 	= $row['desc_uops'];
		$desc_del 	= $row['desc_del'];
		$id_cuota 	= $row['id_cuota'];
	}

	echo "			<center><h4><font color=\"#000\">Detalle de actividades registradas en sistema $desc_uops</font></h4></center>";
	echo "			<center>";
	echo "				<table width=\"97%\" border=\"0\" bgcolor=\"#000\" cellpadding=\"1\" cellspacing=\"2\">";
	echo "					<tr>";
	echo "						<th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Capitulo</span></th>";
	echo "						<th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Partida</span></th>";
	echo "						<th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Origen del Gasto</span></th>";
	echo "						<th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Actividad</span></th>";
	echo "						<th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Cantidad</span></th>";
	echo "						<th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Unidad</span></th>";
	echo "						<th scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Enero</span></th>";
	echo "						<th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Febrero</span></th>";
	echo "						<th scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Marzo</span></th>";
	echo "						<th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Abril</span></th>";
	echo "						<th scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Mayo</span></th>";
	echo "						<th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Junio</span></th>";
	echo "						<th scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Julio</span></th>";
	echo "						<th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Agosto</span></th>";
	echo "						<th scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Septiembre</span></th>";
	echo "						<th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Octubre</span></th>";
	echo "						<th scope=\"col\" bgcolor=$celda1><span class=\"titulo_small\">Noviembre</span></th>";
	echo "						<th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Diciembre</span></th>";
	echo "						<th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Total</span></th>";
	echo "					</tr>";

	$colorfila 	= 0;
	$result = mysql_query("select e.id_conse_egresos,e.clave_act,e.clave_par,e.cantidad,e.unidad,e.total_gasto,ci.actividad,cp.desc_par, e.origen_del_gasto,e.enero,e.febrero,e.marzo,e.abril,e.mayo,
	e.junio,e.julio,e.agosto,e.septiembre,e.octubre,e.noviembre,e.diciembre from egresos e, cat_actividades_i ci, cat_partidas_e cp where clave=$clave and ci.clave_act=e.clave_act and 
	cp.clave_par=e.clave_par order by id_conse_egresos", $connect);
	$totalregistros = mysql_num_rows($result);
	$valcolor == 0;
	while($row=mysql_fetch_array($result))
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
		$origen_del_gasto 	= $row['origen_del_gasto'];
		$enero 				= $row['enero'];
		$febrero 			= $row['febrero'];
		$marzo 				= $row['marzo'];
		$abril 				= $row['abril'];
		$mayo 				= $row['mayo'];
		$junio 				= $row['junio'];
		$julio 				= $row['julio'];
		$agosto 			= $row['agosto'];
		$septiembre 		= $row['septiembre'];
		$octubre 			= $row['octubre'];
		$noviembre 			= $row['noviembre'];
		$diciembre 			= $row['diciembre'];

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

		echo "			<tr>";
		echo "				<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$clave_par</span></td>";
		echo "				<td align=\"left\" bgcolor=$color><span class=\"spgreen\">$desc_par</span></td>";
		echo "				<td align=\"left\" bgcolor=$color><span class=\"spgreen\">$origen_del_gasto</span></td>";
		echo "				<td align=\"left\" bgcolor=$color><span class=\"spgreen\">$clave_act $actividad</span></td>";
		echo "				<td align=\"center\" bgcolor=$color><span class=\"spgreen\">$cantidad</span></td>";
		echo "				<td align=\"left\" bgcolor=$color><span class=\"spgreen\">$unidad</span></td>";
		echo "				<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($enero,2) . "</span></td>";
		echo "				<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($febrero,2) . "</span></td>";
		echo "				<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($marzo,2) . "</span></td>";
		echo "				<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($abril,2) . "</span></td>";
		echo "				<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($mayo,2) . "</span></td>";
		echo "				<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($junio,2) . "</span></td>";
		echo "				<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($julio,2) . "</span></td>";
		echo "				<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($agosto,2) . "</span></td>";
		echo "				<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($septiembre,2) . "</span></td>";
		echo "				<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($octubre,2) . "</span></td>";
		echo "				<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($noviembre,2) . "</span></td>";
		echo "				<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($diciembre,2) . "</span></td>";
		echo "				<td align=\"center\" bgcolor=$color><span class=\"spgreen\"> " . number_format($total_gasto,2) . "</span></td>";
		echo "			</tr>";

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
		$gingretot 		+= $total_gasto;
	}

	echo "				<tr>";
	echo "					<td align=\"right\" bgcolor=$celda colspan=\"6\"><span class=\"titulo_small\">Totales: &nbsp;</span></td>";
	echo "					<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($genero,2) . "</span></td>";
	echo "					<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gfebrero,2) . "</span></td>";
	echo "					<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmarzo,2) . "</span></td>";
	echo "					<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gabril,2) . "</span></td>";
	echo "					<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gmayo,2) . "</span></td>";
	echo "					<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gjunio,2) . "</span></td>";
	echo "					<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gjulio,2) . "</span></td>";
	echo "					<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gagosto,2) . "</span></td>";
	echo "					<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gseptiembre,2) . "</span></td>";
	echo "					<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($goctubre,2) . "</span></td>";
	echo "					<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gnoviembre,2) . "</span></td>";
	echo "					<td align=\"center\" bgcolor=$celda2><span class=\"titulo_small\"> " . number_format($gdiciembre,2) . "</span></td>";
	echo "					<td align=\"center\" bgcolor=$celda><span class=\"titulo_small\"> " . number_format($gingretot,2) . "</span></td>";
	echo "				</tr>";
	echo "			</table>";
	echo "			<br><br>";
	echo "			<table width=\"97%\">";

	$result = mysql_query("select desc_uops, desc_del from cat_delegaciones where clave=$clave", $connect);
	$totalregistros = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
		$desc_uops 	= $row['desc_uops'];
		$desc_del 	= $row['desc_del'];
	}

	$sqlUpdate = mysql_query("UPDATE egresos SET status=3 where clave='$clave'", $connect) or die(mysql_error());
	if($sqlUpdate)
	{
		echo "El Plan Rector 2017 correspondiente al &Aacute;rea de Engresos ha sido autorizado!!!";
		$clacon 	= substr($clave,0,2);
		$result = mysql_query("select nombre, ape_pat, ape_mat, email from jefes where clave like '$clacon%' and activo=0", $connect);
		$totalregistros = mysql_num_rows($result);
		while($row = mysql_fetch_array($result))
		{
			$nombre 	= $row['nombre'];
			$ape_pat 	= $row['ape_pat'];
			$ape_mat 	= $row['ape_mat'];
			$email 		= $row['email'];
		}
			
		$jefe 			= "$nombre $ape_pat $ape_mat";
		$destinatario 	= "$email";

		$asunto = "Revision de Plan Rector 2017 - Ingresos";
		$cuerpo = "		<html>
							<head>
								<title> .:Plan Rector 2017:. </title>
							</head>
							<body>
								<h1>.:Plan Rector 2017:.</h1>
								<p>
									<b>$jefe</b>
									<br>
									<br>
									Le informo que he aprobado su Plan Rector 2017 correspoendiente al &Aacute;rea de Egresos de $desc_uops, ya pueden imprimir el programa autorizado, recolectar firmas y enviarlo a este fideicomiso.<br><br><b>C.P. Leticia Giles Olvera</b>
								</p>
							</body>
						</html>";

		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From: FIDEICOMISO PARA EL DESARROLLO DEL DEPORTE <fideimss@fideimss.org.mx>\r\n";
		$headers .= "Reply-To: fideimss@fideimss.org.mx\r\n";
		$headers .= "Cc: fideimss@fideimss.org.mx\r\n";
		mail($destinatario,$asunto,$cuerpo,$headers);
	}
	else
	{
		echo "<br>Error al enviar Presupuesto 2017!!!";
	}

	echo "			</table>";
	echo "		</center>";
	echo "	</body>";
	echo "</html>";
?>