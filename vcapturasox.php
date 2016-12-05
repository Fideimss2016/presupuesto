<?php
	session_start();

	$_SESSION['clave'] = $_REQUEST['clave'];
	$clave = $_SESSION["clave"];

//	$clave = $_REQUEST['clave'];

	$tipo_usuario = $_SESSION["tipo_usuario"];

	include "clases/variablesbd.php";

	//conexion a la base de datos
	$connect = mysql_connect("$host","$user","$passworks");
	//Seleccion de la base
	mysql_select_db("$dbname",$connect);

	$celda = "#222";
	$celda1 = "#333";
	$celda2 = "#555";
	$celdaf = "#fff";
	$celdaf1 = "#F0F0F9";
	$gtotal = 0;
	$vobo = 0;

	$usuario_sistema = $_SESSION['usuario_sistema'];

	echo" <meta http-equiv=\"content-type\" content=\"text/html;charset=utf-8\" />";
	echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"capturas.css\" >";
	echo "<body>";
	$result = mysql_query("select desc_uops, desc_del, id_cuota from cat_delegaciones where clave='$clave'", $connect);
	$totalregistros = mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran
	while($row = mysql_fetch_array($result))
	{
		$desc_uops = $row['desc_uops'];
		$desc_del = $row['desc_del'];
		$id_cuota = $row['id_cuota'];
	}

	echo "<center><h4><font color=\"#000\">Detalle de actividades registradas en sistema $desc_uops</font></h4></center>";

	echo "<center>";
	echo "<table width=\"97%\" border=\"0\" bgcolor=\"#000\" cellpadding=\"1\" cellspacing=\"2\">";
	echo "  <tr>";
	echo "    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Partida Tipo de proyecto</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Gasto/Bien</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Equipo/Trabajo/Servicio</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Actividad/Tipo de equipo/Area</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Curso</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Descripcion</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Cantidad</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Unidad</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Monto de inversion</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Beneficio</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Usuarios</span></th>";
	echo "    <th scope=\"col\" bgcolor=$celda2><span class=\"titulo_small\">Ingresos</span></th>";
	echo "  </tr>";

	$colorfila = 0;

	/*
	$result = mysql_query("select o.id_conse_obra,o.id_proyecto,o.monto,o.clave_par, cpo.desc_proyecto, cpe.desc_par,o.problematica, o.objetivo, o.beneficios, o.status,o.c1,o.c2,o.c3,o.c4,o.c5,o.c6,o.componentes, o.origen_del_gasto
		from obras o, cat_proyectos_o cpo, cat_partidas_e cpe
		where clave = '$clave' and cpo.id_proyecto=o.id_proyecto and cpe.clave_par=o.clave_par order by id_conse_obra", $connect);
	*/

	$result = mysql_query("select o.clave_par, tp.desc_par, tg.tipo_gasto, te.tipo_equipo_requerido_trabajo, ta.actividad, c.actividad as curso, o.observaciones, o.cantidad, o.unidad, o.monto, b.beneficio, o.periodo, o.total_usuarios, 
		o.total_ingresos from obras o left join cat_partidas_e tp on tp.clave_par = o.clave_par left join cat_tipo_gasto tg on tg.tipo_gasto_id = o.tipo_gasto_id left join cat_actividades_i c on c.conse_act = o.curso_id left join cat_tipo_equipo_requerido_trabajos te on 
		te.tipo_equipo_id = o.tipo_equipo_id left join cat_act_equipo_area ta on ta.actividad_id = o.actividad_id left join cat_beneficios b on b.beneficio_id = o.beneficio_id where o.clave ='$clave' order by o.clave_par", $connect);
	$totalregistros = mysql_num_rows($result);
	$valcolor = 0;
	while($row = mysql_fetch_array($result))
	{
		$clave_par = $row['clave_par'];
		$tipo_proyecto = $row['desc_par'];
		$tipo_gasto = $row['tipo_gasto'];
		$tipo_equipo_requerido_trabajo = $row['tipo_equipo_requerido_trabajo'];
		$actividad = $row['actividad'];
		$curso = $row['curso'];
		$observaciones = $row['observaciones'];
		$cantidad = $row['cantidad'];
		$unidad = $row['unidad'];
		$monto = $row['monto'];
		$beneficio = $row['beneficio'];
		$periodo = $row['periodo'];
		$total_usuarios = $row['total_usuarios'];
		$total_ingresos = $row['total_ingresos'];
		$gtotal += $monto;
		
		$color = "#efefef";
/*
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
*/
	    //$tipo_proyecto = htmlentities($tipo_proyecto);
		echo "  <tr>";
		echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$clave_par $tipo_proyecto</span></td>";
		echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_gasto</span></td>";
		echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$tipo_equipo_requerido_trabajo</span></td>";
		echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$actividad</span></td>";
		echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$curso</span></td>";
		echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$observaciones</span></td>";
		echo "    <td align=\"right\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$cantidad</span></td>";
		echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$unidad</span></td>";
		echo "    <td align=\"right\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$monto</span></td>";
		echo "    <td align=\"left\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$beneficio</span></td>";
		echo "    <td align=\"center\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$total_usuarios</span></td>";
		echo "    <td align=\"right\" bgcolor=$color valign=\"top\"><span class=\"spgreen\">$total_ingresos</span></td>";
		echo "	  </span></td>";
		echo "  </tr>";
	}			

	echo "  <tr>";
	echo "    <td align=\"right\" bgcolor=$celda1 colspan=\"7\"><span class=\"titulo_small\">Totales: &nbsp;</span></td>";
	echo "    <td align=\"center\" bgcolor=$celda1><span class=\"titulo_small\"> " . number_format($gtotal,2) . "</span></td>";
	echo "    <td align=\"center\" bgcolor=$celda1 colspan=\"3\"><span class=\"titulo_small\">&nbsp;</span></td>";
	echo "  </tr>";

	echo "</table>";

	echo "<br><br>";
	echo "<table width=\"97%\">";

	$_SESSION['vobo']=$_REQUEST['vobo'];
	$vobo=$_SESSION['vobo'];

	if (isset($vobo)) 
	{
		//echo "DEFINIDA $clave";

		/***FORMULARIO RESPUESTA***/

		$result = mysql_query("select desc_uops, desc_del from cat_delegaciones where clave='$clave'", $connect);
		$totalregistros = mysql_num_rows($result);
		//se recogen las consultas en un array y se muestran
		while($row = mysql_fetch_array($result))
		{
			$desc_uops = $row['desc_uops'];
			$desc_del = $row['desc_del'];
		}

		$sqlUpdate = mysql_query("UPDATE obras SET status=2 where clave='$clave'", $connect) or die(mysql_error());
		if($sqlUpdate)
		{							
			echo "Su Plan Rector 2017 correspondiente al area de Obra y Equipamiento ha sido enviado para revisi&oacute;n, espere comentarios y/o visto bueno del mismo!!!";
			$hoy = date("Y-m-d H:i:s");
			$sqlUpdate = mysql_query("UPDATE vobo SET obra=1,fec_obra='$hoy' where clave='$clave'", $connect) or die(mysql_error());

			$clacon = substr($clave,0,2);
			$result = mysql_query("select nombre, ape_pat, ape_mat from jefes where clave like '$clacon%' and activo=0", $connect);

			$totalregistros = mysql_num_rows($result);
			//se recogen las consultas en un array y se muestran
			while($row = mysql_fetch_array($result))
			{
				$nombre = $row['nombre'];
				$ape_pat = $row['ape_pat'];
				$ape_mat = $row['ape_mat'];
			}

			$jefe = "$nombre $ape_pat $ape_mat";

			$destinatario = "macrina.bravo@fideimss.org.mx";
			$asunto = "Revision de Plan Rector 2017 - Obras";

			$cuerpo = "
			<html>
				<head>
				   <title> .:Plan Rector 2017:. </title>
				</head>
				<body>
					<h1>.:Plan Rector 2017:.</h1>
						<p>
							<b> Arq. Macrina Bravo Bravo </b><br><br> Le informo que el usuario ". $jefe ." Jefe de Ofcina de Deporte ha aprobado el Plan Rector 2017 correspondiente al Area de Obras y Equipamiento de $desc_uops por lo que a enviado solicitud de visto bueno del mismo.<br><br><b>Este es un mensaje del sistema</b>
						</p>
				</body>
			</html>
			";

			//para el envío en formato HTML
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=utf8\r\n";

			//dirección del remitente
			$headers .= "From: FIDEICOMISO PARA EL DESARROLLO DEL DEPORTE <fideimss@fideimss.org.mx>\r\n";

			//dirección de respuesta, si queremos que sea distinta que la del remitente
			$headers .= "Reply-To: fideimss@fideimss.org.mx\r\n";

			//ruta del mensaje desde origen a destino
			//$headers .= "Return-path: holahola@desarrolloweb.com\r\n";

			//direcciones que recibián copia
			$headers .= "Cc: macrina.bravo@fideimss.org.mx\r\n";

			//direcciones que recibirán copia oculta
			$headers .= "Bcc: maricela.jimenez@imss.gob.mx, martha.benitez@fideimss.org.mx\r\n";

			mail($destinatario,$asunto,$cuerpo,$headers);
		}
		else
		{
			echo "<br>Error al enviar Presupuesto 2017!!!";
		}

		/***************************************************************************FIN FORMULARIO RESPUESTA********************************************************************************/	
	}
	
	if($result != 0)
	{
		$result = mysql_query("select count(*) as numerosc,status from obras where clave='$clave'", $connect);
		$totalregistros = mysql_num_rows($result);
		//se recogen las consultas en un array y se muestran
		while($row = mysql_fetch_array($result))
		{
			$status = $row['status'];
			$numerosc = $row['numerosc'];
		}
					
		if($status == 0 && $numerosc != 0)
		{
			echo "<tr><td align=\"center\">El Plan Rector 2017 sigue en status de captura!!!</td></tr>";
			echo "<tr><td align=\"center\"><a href=\"imprime_obras_nuevo.php\">Imprimir</a></td></tr>";
		}
		else if($status == 1 && $numerosc != 0)
		{
			if($tipo_usuario == 'ADM' || $tipo_usuario == 'CON')
			{
				echo "<form name='form1' action='".$_SERVER['PHP_SELF']."' method='POST'>";
				//echo "<tr><td align=\"center\"><input name=\"vobo\" type=\"checkbox\" value=\"si\"> Autorizar y Enviar a Fideimss para Autorizacion | <a href=\"imprime_obrasx.php\">Imprimir</a> | <a href=\"vcapturasol.php?clave=$clave\">Liberar Sistema para realizar cambios</a></td></tr>";
				echo "<tr><td align=\"center\"><input name=\"vobo\" type=\"checkbox\" value=\"si\"> Autorizar y Enviar a Fideimss para Autorizacion | <a href=\"vcapturasol.php?clave=$clave\">Liberar Sistema para realizar cambios</a></td></tr>";
				echo "<input type=\"hidden\" name=\"clave\" value=\"$clave\">";
				echo "<tr><td align=\"center\"><input type=\"submit\" value=\"continuar\" /></td></tr>";
				echo "</form>";
			}
			else
			{
				echo "<tr><td align=\"center\">El Plan Rector 2017 este en proceso de revision por el jefe de oficina!!!</td></tr>";
				echo "<tr><td align=\"center\"><a href=\"imprime_obras_nuevo.php\">Imprimir</a></td></tr>";
			}
		}
		else if($status == 2 && $numerosc != 0)
		{
			if($tipo_usuario == 'JD3')
			{
				echo "<form name='form1' action='autorizao.php' method='POST'>";
				echo "<tr><td align=\"center\"><input name=\"vobo\" type=\"checkbox\" value=\"si\"> Autorizar Programa | <a href=\"imprime_obras_nuevo.php\">Imprimir</a> | <a href=\"vcapturasol.php?clave=$clave\">Liberar Sistema para realizar cambios</a></td></tr>";
				echo "<input type=\"hidden\" name=\"clave\" value=\"$clave\">";
				echo "<tr><td align=\"center\"><input type=\"submit\" value=\"continuar\" /></td></tr>";
				echo "</form>";
			}
			else
			{
				echo "<tr><td align=\"center\">El Plan Rector 2017 ha sido autorizado por el Jefe de Oficina y ha sido enviado al personal de Fideimss para autorizacion!!!</td></tr>";
				echo "<tr><td align=\"center\"><a href=\"imprime_obras_nuevo.php\">Imprimir</a></td></tr>";
			}
		}
		else if($status == 3 && $numerosc != 0)
		{
			echo "<tr><td align=\"center\">El Plan Rector 2017 correspondiente al area de Obras y Equipamiento ya ha sido autorizado!!!</td></tr>";
			echo "<tr><td align=\"center\"><a href=\"imprime_obras_nuevo.php\">Imprimir</a></td></tr>";
		}
	}
	echo "</table>";

	echo "</center>";
	echo "</body>";
	echo "</html>";
?>