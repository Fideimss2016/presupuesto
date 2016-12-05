<?php
	session_start();

	$_SESSION['clave'] 	= $_REQUEST['clave'];
	$clave 				= $_SESSION["clave"];
	$tipo_usuario 		= $_SESSION["tipo_usuario"];

	include "clases/variablesbd.php";
	$connect = mysql_connect("$host","$user","$passworks");
	mysql_select_db("$dbname",$connect);

	$celda 		= "#222";
	$celda1 	= "#333";
	$celda2 	= "#555";
	$celdaf 	= "#fff";
	$celdaf1 	= "#F0F0F9";

	$usuario_sistema = $_SESSION['usuario_sistema'];

	echo "		<link rel=\"stylesheet\" type=\"text/css\" href=\"capturas.css\" >";
	echo "		<body>";
	
	$result = mysql_query("select desc_uops, desc_del, id_cuota from cat_delegaciones where clave='$clave'", $connect);
	$totalregistros = mysql_num_rows($result);
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
	echo "    					<th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Partida</span></th>";
	echo "    					<th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Tipo de proyecto</span></th>";
	echo "    					<th bgcolor=$celda scope=\"col\"><span class=\"titulo_small\">Inversi&oacute;n</span></th>";
	echo "    					<th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Problematica</span></th>";
	echo "    					<th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Objetivo</span></th>";
	echo "    					<th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Beneficios</span></th>";
	echo "    					<th scope=\"col\" bgcolor=$celda><span class=\"titulo_small\">Componentes</span></th>";
	echo "  				</tr>";

	$colorfila = 0;

	$result = mysql_query("select o.id_conse_obra,o.id_proyecto,o.monto,o.clave_par, cpo.desc_proyecto, cpe.desc_par,o.problematica, o.objetivo, o.beneficios, o.status,o.c1,o.c2,o.c3,o.c4,o.c5,o.c6,
	o.componentes from obras o, cat_proyectos_o cpo, cat_partidas_e cpe where clave='$clave' and cpo.id_proyecto=o.id_proyecto and cpe.clave_par=o.clave_par order by id_conse_obra", $connect);
	$totalregistros = mysql_num_rows($result);
	$valcolor == 0;
	while($row = mysql_fetch_array($result))
	{
		$id_conse_obra 	= $row['id_conse_obra'];
		$id_proyecto 	= $row['id_proyecto'];
		$monto 			= $row['monto'];
		$clave_par 		= $row['clave_par'];
		$desc_proyecto 	= $row['desc_proyecto'];
		$desc_par 		= $row['desc_par'];			
		$problematica 	= $row['problematica'];
		$objetivo 		= $row['objetivo'];
		$beneficios 	= $row['beneficios'];
		$status 		= $row['status'];
		$c1 			= $row['c1'];
		$c2 			= $row['c2'];
		$c3 			= $row['c3'];
		$c4 			= $row['c4'];
		$c5 			= $row['c5'];
		$c6 			= $row['c6'];
		$componentes 	= $row['componentes'];
				
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

		echo "  			<tr>";
		echo "    				<td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$clave_par $desc_par</span></td>";
		echo "    				<td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$desc_proyecto</span></td>";
		echo "    				<td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> " . number_format($monto,2) . "</span></td>";
		echo "    				<td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$problematica</span></td>";
		echo "    				<td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$objetivo</span></td>";
		echo "    				<td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$beneficios</span></td>";
		echo "    				<td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\"> ";
		
		if($c1 != 0)
		{
			echo "				<input type=\"checkbox\" checked disabled><span class=\"spgreen\">Dictamen</span><br>";
		}
		if($c2 != 0)
		{
			echo "				<input type=\"checkbox\" checked disabled><span class=\"spgreen\">Proyecto Ejecutivo</span><br>";
		}
		if($c3 != 0)
		{
			echo "				<input type=\"checkbox\" checked disabled><span class=\"spgreen\">Obra</span><br>";
		}
		if($c4 != 0)
		{
			echo "				<input type=\"checkbox\" checked disabled><span class=\"spgreen\">Mantenimiento y/o conservaci&oacute;n</span><br>";
		}
		if($c5 != 0)
		{
			echo "				<input type=\"checkbox\" checked disabled><span class=\"spgreen\">Equipamiento</span><br>";
		}
		if($c6 != 0)
		{
			echo "				<input type=\"checkbox\" checked disabled><span class=\"spgreen\">Otros </span>&nbsp;&nbsp;&nbsp;<span class=\"spgrey\">($componentes)</span>";
		}

		echo "					</span></td>";
		echo "  			</tr>";

		$gtotal 	+= $monto;
	}

	echo "					<tr>";
	echo "						<td align=\"right\" bgcolor=$celda1 colspan=\"2\"><span class=\"titulo_small\">Totales: &nbsp;</span></td>";
	echo "    					<td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gtotal,2) . "</span></td>";
	echo "    					<td align=\"center\" bgcolor=$celda1 colspan=\"4\"><span class=\"titulo_small\">&nbsp;</span></td>";
	echo "  				</tr>";
	echo "				</table>";
	echo "				<br><br>";
	echo "				<table width=\"97%\">";
	/***FORMULARIO RESPUESTA***/
	$result = mysql_query("select desc_uops, desc_del from cat_delegaciones where clave=$clave", $connect);
	$totalregistros = mysql_num_rows($result);
	while($row = mysql_fetch_array($result))
	{
		$desc_uops 	= $row['desc_uops'];
		$desc_del 	= $row['desc_del'];
	}
	
	$sqlUpdate = mysql_query("UPDATE obras SET status=3 where clave='$clave'", $connect) or die(mysql_error());
	if($sqlUpdate)
	{
		echo "El Plan Rector 2017 correspondiente al &Aacute;rea de obras ha sido aprobado!!!";
		$hoy = date("Y-m-d H:i:s");
		$sqlUpdate = mysql_query("UPDATE vobo SET jefe_o=1, fec_jefe_o='$hoy' where clave='$clave'", $connect) or die(mysql_error());
		
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

		$jefe 			= "$nombre $ape_pat $ape_mat";
		$destinatario 	= "leticia.giles@fideimss.org.mx";
		$asunto 		= "Revision de Plan Rector 2017 - Obras y Equipamiento";
		$cuerpo 		= "	<html>
								<head>
									<title> .:Plan Rector 2017:. </title>
								</head>
								<body>
									<h1>.:Plan Rector 2017:.</h1>
									<p>
										<b>C.P. Leticia Giles Olvera</b><br><br> Le informo que que he dado vobo a su Plan Rector 2017 correspoendiente al &Aacute;rea de Obras y Equipamiento de $desc_uops.<br><br><b>Arq. Macrina Bravo Bravo</b>
									</p>
								</body>
							</html>";
		$headers 		= "MIME-Version: 1.0\r\n";
		$headers 		.= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From: FIDEICOMISO PARA EL DESARROLLO DEL DEPORTE <fideimss@fideimss.org.mx>\r\n";
		$headers .= "Reply-To: fideimss@fideimss.org.mx\r\n";
		$headers .= "Cc: fideimss@fideimss.org.mx, martha.benitez@fideimss.org.mx\r\n";
		mail($destinatario,$asunto,$cuerpo,$headers);
	}
	else
	{
		echo "<br>Error al enviar Presupuesto 2017!!!";
	}
	/***************************************************************************FIN FORMULARIO RESPUESTA********************************************************************************/
	echo "				</table>";
	echo "			</center>";
	echo "		</body>";
	echo "	</html>";
?>