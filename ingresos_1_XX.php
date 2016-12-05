<?php
	session_start();
	//include "valida_seguridad.php";
	include "clases/variablesbd.php";
	include "datepickBasic.html";

	echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\" >";


	//conexion a la base de datos
	$connect = mysql_connect("$host","$user","$passworks");

	//Seleccion de la base
	mysql_select_db("$dbname",$connect);

	echo" <body>";
	echo "<div id=\"contenedor\">";
	echo "	<div id=\"contenido_cont\">";

	$usuario_sistema = $_SESSION["usuario_sistema"];
	$clave = $_SESSION["clave"];

	$_SESSION['conse_acts'] = $_REQUEST['conse_acts'];
	$_SESSION['id_tipo_curso'] = $_REQUEST['id_tipo_curso'];
	$_SESSION['id_tipo_pago'] = $_REQUEST['id_tipo_pago'];

	$conse_acts = $_SESSION["conse_acts"];
	$id_tipo_curso = $_SESSION["id_tipo_curso"];
	$id_tipo_pago = $_SESSION["id_tipo_pago"];
	$vale = "onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\"";

	$celda = "#1a1a1a";
	$tabla = "#666";

	echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
	echo "    <h3>Captura de Ingresos del Presupuesto 2017</h3>";
	echo "    <h2>Registro de Actividades</h2>";

	echo "		<p class=\"spwhite\">";
	echo "		<b>Paso 2</b> Complete los campos que a continuaci&oacute;n se detallan";
	echo "		</p>";

	echo "		<div id=\"cajaareas\">";
	echo "		<form action=\"ingresos_2.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";

	$result = mysql_query("select desc_uops, desc_del, id_cuota from cat_delegaciones where clave='$clave'", $connect);
	$totalregistros = mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran
	while($row = mysql_fetch_array($result))
	{
		$desc_uops = $row['desc_uops'];
		$desc_del = $row['desc_del'];
		$id_cuota = $row['id_cuota'];
	}

	$result = mysql_query("select zona, cuota_der, cuota_noder from cuotas_i where id_cuota = $id_cuota", $connect);
	$totalregistros = mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran
	while($row = mysql_fetch_array($result))
	{
		$zona = $row['zona'];
		$cuota_der = $row['cuota_der'];
		$cuota_noder = $row['cuota_noder'];
	}
	echo "		<label for=\"uopsi\">Unidad Operativa: <b>$desc_uops</b></label><br><br>";
	echo "		<table width=\"90%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
	echo "		<tr>";
	echo "		<td bgcolor=\"$celda\" align=\"right\">";
	echo "		<label for=\"actividades\" class=\"spgrey\">Actividad: </label>";
	echo "		</td>";
	echo "		<td bgcolor=\"$celda\">";
	$result = mysql_query("select clave_act, actividad from cat_actividades_i where conse_act=$conse_acts", $connect);
	$totalregistros = mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran
	while($row = mysql_fetch_array($result))
	{
		$clave_act = $row['clave_act'];
		$actividad = $row['actividad'];
	}
	$_SESSION["clave_act"] = $clave_act;
	$_SESSION["actividad"] = $actividad;

	echo "		<span class=\"spgreen\">&nbsp;$clave_act $actividad</span></td>";
	echo "		<td bgcolor=\"$celda\" align=\"right\">";
	echo "		<label for=\"tipo_curso\" class=\"spgrey\">Curso:</label>";
	echo "		</td>";
	echo "		<td bgcolor=\"$celda\">";

	$result = mysql_query("select id_tipo_curso, desc_tipo_curso,duracion from cat_tipo_curso_i where id_tipo_curso=$id_tipo_curso", $connect);
	$totalregistros = mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran
	while($row = mysql_fetch_array($result))
	{
		$id_tipo_curso = $row['id_tipo_curso'];
		$desc_tipo_curso = $row['desc_tipo_curso'];
		$duracion = $row['duracion'];
	}
	echo "		<span class=\"spgreen\">&nbsp;$desc_tipo_curso</span></td>";
	echo "		</tr>";
	echo "		<tr>";
	echo "		<td bgcolor=\"$celda\" align=\"right\">";
	echo "		<label for=\"tipo_curso\" class=\"spgrey\">Tipo de pago: </label>";
	echo "		</td>";
	echo "		<td bgcolor=\"$celda\">";

	$result = mysql_query("select id_tipo_pago, desc_tipo_pago from cat_tipo_pago_i where id_tipo_pago=$id_tipo_pago", $connect);
	$totalregistros = mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran
	while($row = mysql_fetch_array($result))
	{
		$id_tipo_pago = $row['id_tipo_pago'];
		$desc_tipo_pago = $row['desc_tipo_pago'];
	}
	if($id_tipo_pago == 1)
	{
		$costo = 80;
		$costo_1 = 80;
		$duracion = "0";
	}
	else if($id_tipo_pago == 4 || $id_tipo_pago == 99)
	{
		$costo = 40;
		$costo_1 = 40;
		$duracion = "0";
	}
	else
	{
		$costo = $duracion * $cuota_der;
		$costo_1 = $duracion * $cuota_noder;
	}
	$_SESSION["costo"] = $costo;
	$_SESSION["costo_1"] = $costo_1;
	
	echo "		<span class=\"spgreen\">&nbsp;$desc_tipo_pago</span></td>";
	//Uso de Instalaciones id 64
	if($conse_acts == 64)
	{
		$_SESSION['conse'] = $_REQUEST['conse'];
		$conse = $_SESSION['conse'];

		echo "		<td bgcolor=\"$celda\" align=\"right\">";
		echo "		<label for=\"tipo_curso\" class=\"spgrey\">Instalacion:</label>";
		echo "		</td>";
		echo "		<td bgcolor=\"$celda\">";

		//echo "select conse, desc_nombre, normal, grupo from instalaciones where clave='$clave' and conse=$conse";
		$result = mysql_query("select conse, desc_nombre, normal, grupo from instalaciones where clave='$clave' and conse=$conse", $connect);
		$totalregistros = mysql_num_rows($result);
		//se recogen las consultas en un array y se muestran
		while($row = mysql_fetch_array($result))
		{
			$conse = $row['conse'];
			$desc_nombre = $row['desc_nombre'];
			$normal = $row['normal'];
			$grupo = $row['grupo'];
		}

		echo "		<span class=\"spgreen\">&nbsp;$desc_nombre</span></td>";
	}

	//else if($conse_acts==58 || $conse_acts==59 || $conse_acts==60 || $conse_acts==61 || $conse_acts==62 || $conse_acts==64 || $conse_acts==54 || $conse_acts==55 || $conse_acts==56  || $conse_acts==99 || $conse_acts==49 || $conse_acts==50 || $conse_acts==51 || $conse_acts==52 || $conse_acts==53)
	else if($conse_acts == 47 || $conse_acts == 48 || $conse_acts == 49 || $conse_acts == 50 || $conse_acts == 51 || $conse_acts == 63 || $conse_acts == 64 || $conse_acts == 99)
	{
		echo "		<td bgcolor=\"$celda\" align=\"right\">";
		echo "		<label for=\"tipo_curso\" class=\"spgrey\">&nbsp;</label>";
		echo "		</td>";
		echo "		<td bgcolor=\"$celda\"><span class=\"spgreen\">&nbsp;</span></td>";
	}
	else
	{
		echo "		<td colspan=\"2\" bgcolor=\"$celda\">&nbsp;</td>";
	}
	echo "		</tr>";

	//uso de instalaciones id 64
	if($conse_acts == 64)
	{
		echo "		<tr>";
		echo "		<td bgcolor=\"$celda\" align=\"right\">";
		echo "		<label for=\"actividades\" class=\"spgrey\">Duracion: </label>";
		echo "		</td>";
		echo "		<td bgcolor=\"$celda\">";
		echo "		<span class=\"spblue\">&nbsp;$duracion hrs.</span>";
		echo "		</td>";
		echo "		<td bgcolor=\"$celda\" align=\"right\">";
		echo "		<label for=\"actividades\" class=\"spgrey\">Costo por hora: </label>";
		echo "		</td>";
		echo "		<td bgcolor=\"$celda\">";
		echo "		<span class=\"white\">&nbsp;Derechohabiente: </span><span class=\"spblue\"> $". number_format($normal,2) . " pesos</span>
							<span class=\"white\">&nbsp;&nbsp;No Derechohabiente: </span><span class=\"spblue\"> $". number_format($grupo,2) . " pesos</span>";
		echo "		</td>";
		echo "		</tr>";

		echo "		<tr><td bgcolor=\"$celda\" colspan=\"4\"><br><p class=\"spwhite\" align=\"center\"><b>Para Uso de Instalaciones marque del 01 de enero al 31 de diciembre</b></p></td></tr>";
	}
	//else if($conse_acts==54 || $conse_acts==55 || $conse_acts==56 || $conse_acts==58 || $conse_acts==59 || $conse_acts==60 || $conse_acts==61 || $conse_acts==62 || $conse_acts==64  || $conse_acts==99 || $conse_acts==49 || $conse_acts==50 || $conse_acts==51 || $conse_acts==52 || $conse_acts==53)
	//LIGAS, TORNEOS Y USO DE INSTALACIONES Y ESPACIOS
	else if($conse_acts == 47 || $conse_acts == 48 || $conse_acts == 49 || $conse_acts == 50 || $conse_acts == 51 || $conse_acts == 63 || $conse_acts == 64 || $conse_acts == 99)
	{
		//echo "		<tr><td bgcolor=\"$celda\" colspan=\"4\"><br><p class=\"spwhite\" align=\"center\"><b>Para Ligas Deportivas, Torneo de Invitacion y Gimnasia Laboral marque del 01 de enero al 31 de diciembre</b></p></td></tr>";
		echo "		<tr><td bgcolor=\"$celda\" colspan=\"4\"><br><p class=\"spwhite\" align=\"center\"><b>Para Ligas Deportivas, Torneo de Invitacion y Uso de Instalaciones y Espacios  marque del 01 de enero al 31 de diciembre</b></p></td></tr>";
	}
	else
	{
		echo "		<tr>";
		echo "		<td bgcolor=\"$celda\" align=\"right\">";
		echo "		<label for=\"actividades\" class=\"spgrey\">Duracion: </label>";
		echo "		</td>";
		echo "		<td bgcolor=\"$celda\">";
		echo "		<span class=\"spblue\">&nbsp;$duracion hrs.</span>";
		echo "		</td>";
		echo "		<td bgcolor=\"$celda\" align=\"right\">";
		echo "		<label for=\"actividades\" class=\"spgrey\">Costo del curso: </label>";
		echo "		</td>";
		echo "		<td bgcolor=\"$celda\">";
		echo "		<span class=\"white\">&nbsp;Derechohabiente: </span><span class=\"spblue\"> $". number_format($costo,2) . " pesos</span>
					<span class=\"white\">&nbsp;&nbsp;No Derechohabiente: </span><span class=\"spblue\"> $". number_format($costo_1,2) . " pesos</span>";
		echo "		</td>";
		echo "		</tr>";
	}

	//if($conse_acts == 63 || $conse_acts == 57 || $conse_acts == 58 || $conse_acts == 59 || $conse_acts == 60 || $conse_acts == 61 || $conse_acts == 62 || $conse_acts == 64 || $conse_acts == 54 || $conse_acts == 55 || $conse_acts == 56  || $conse_acts == 99 || $conse_acts == 49 || $conse_acts == 50 || $conse_acts == 51 || $conse_acts == 52 || $conse_acts == 53)
	else if($tip == 1 || $tip == 2 || $tip == 3 || $tip == 4 || $tip == 5 || $tip == 6 || $tip == 7 || $tip == 8 || $tip == 9 || $tip == 10 || $tip == 11 || $tip == 12 || $tip == 14 || $tip == 15 || $tip == 16 || $tip == 17 || $tip == 18 || $tip == 19 || $tip == 20 || $tip == 21 || $tip == 22 || $tip == 23 || $tip == 24 || $tip == 25 || $tip == 26 || $tip == 27 || $tip == 28 || $tip == 29 || $tip == 30 || $tip == 31 || $tip == 32 || $tip == 33 || $tip == 34 || $tip == 35 || $tip == 36 || $tip == 37 || $tip == 38 || $tip == 39 || $tip == 40 || $tip == 41 || $tip == 42 || $tip == 43 || $tip == 44 || $tip == 45 || $tip == 46 || $tip == 52 || $tip == 53 || $tip == 54 || $tip == 55 || $tip == 56 || $tip == 57 || $tip == 58 || $tip == 59 || $tip == 60 || $tip == 61 || $tip == 62 || $tip == 65 || $tip == 66 || $tip == 68)
	{
		echo "		<tr>";
		echo "		<td bgcolor=\"$celda\" align=\"right\">";
		echo "		<label for=\"inicio\" class=\"spgrey\">Inicio del curso: </label>";
		echo "		</td>";
		echo "		<td bgcolor=\"$celda\">";
		echo "		<span class=\"spblue\"><input type=\"text\" id=\"popupDatepicker\" name=\"inicio\" value=\"01-01-2017\"></span>";
		echo "		</td>";
					
		echo "		<td bgcolor=\"$celda\" align=\"right\">";
		echo "		<label for=\"termino\" class=\"spgrey\">Termino del curso: </label>";
		echo "		</td>";
		echo "		<td bgcolor=\"$celda\">";
		echo "		<span class=\"spblue\"><input type=\"text\" id=\"popupDatepickers\" name=\"termino\" value=\"31-12-2017\"></span>";
		echo "		</td>";
		echo "		</tr>";
	}
	else
	{
		echo "		<tr>";
		echo "		<td bgcolor=\"$celda\" align=\"right\">";
		echo "		<label for=\"inicio\" class=\"spgrey\">Inicio del curso: </label>";
		echo "		</td>";
		echo "		<td bgcolor=\"$celda\">";
		echo "		<span class=\"spblue\"><input type=\"text\" id=\"popupDatepicker\" name=\"inicio\" required></span>";
		echo "		</td>";
					
		echo "		<td bgcolor=\"$celda\" align=\"right\">";
		echo "		<label for=\"termino\" class=\"spgrey\">Termino del curso: </label>";
		echo "		</td>";
		echo "		<td bgcolor=\"$celda\">";
		echo "		<span class=\"spblue\"><input type=\"text\" id=\"popupDatepickers\" name=\"termino\" required></span>";
		echo "		</td>";
		echo "		</tr>";
	}
					
	if($id_tipo_pago == 2)
	{
		//uso de instalaciones id 64
		if($conse_acts == 64)
		{
			echo "		<tr>";
			echo "		<td bgcolor=\"$celda\" align=\"right\">";
			echo "		<label for=\"horas\" class=\"spgrey\">Horas x a&ntilde;o: </label>";
			echo "		</td>";
			echo "		<td bgcolor=\"$celda\" colspan=\"3\">";
			echo "		<span class=\"spblue\"><input type=\"number\" id=\"horas\" name=\"horas\" min=\"1\" max=\"50\" required $vale></span>";
			echo "		</td>";
			echo "		</tr>";
			echo "		<input type=\"hidden\" id=\"dias\" name=\"dias\" value=\"1\">";
		}
		//else if($conse_acts==58 || $conse_acts==59 || $conse_acts==60 || $conse_acts==61 || $conse_acts==62 || $conse_acts==64 || $conse_acts==54 || $conse_acts==55 || $conse_acts==56  || $conse_acts==99 || $conse_acts==49 || $conse_acts==50 || $conse_acts==51 || $conse_acts==52 || $conse_acts==53)
		else if($conse_acts == 47 || $conse_acts == 48 || $conse_acts == 49 || $conse_acts == 50 || $conse_acts == 51 || $conse_acts == 63 || $conse_acts == 64 || $conse_acts == 99)
		{
			echo "		<tr>";
			echo "		<td bgcolor=\"$celda\" align=\"right\">";
			echo "		<label for=\"horas\" class=\"spgrey\">Ingreso Anual</label>";
			echo "		</td>";
			echo "		<td bgcolor=\"$celda\" colspan=\"3\">";
			echo "		<span class=\"spblue\"><input type=\"text\" id=\"montol\" name=\"montol\" required $vale></span>";
			echo "		</td>";
			echo "		</tr>";
			echo "		<input type=\"hidden\" id=\"dias\" name=\"dias\" value=\"1\">";
			echo "		<input type=\"hidden\" id=\"horas\" name=\"horas\" value=\"1\">";
		}
		else
		{
			echo "		<tr>";
			echo "		<td bgcolor=\"$celda\" align=\"right\">";
			echo "		<label for=\"dias\" class=\"spgrey\">Dias x semana: </label>";
			echo "		</td>";
			echo "		<td bgcolor=\"$celda\">";
			echo "		<span class=\"spblue\"><input type=\"number\" id=\"dias\" name=\"dias\" min=\"1\" max=\"5\" required $vale></span>";
			echo "		</td>";

			echo "		<td bgcolor=\"$celda\" align=\"right\">";
			echo "		<label for=\"horas\" class=\"spgrey\">Horas x dia: </label>";
			echo "		</td>";
			echo "		<td bgcolor=\"$celda\">";
			echo "		<span class=\"spblue\"><input type=\"number\" id=\"horas\" name=\"horas\" min=\"1\" max=\"5\" required $vale></span>";
			echo "		</td>";
			echo "		</tr>";
		}
	}

	echo "</table>";
	echo "<br \>";

	//echo "<a href=\"javascript:history.back()\">atras</a> | <input type=\"button\" value=\"atras\" onclick=\"history.go(-1)\" /> | <input type=\"submit\" value=\"continuar\" />";
	echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"history.go(-1)\" /> | <input type=\"submit\" value=\"Continuar\" />";
	echo "</form>";

	echo "   	</div>";//cajaareas
	echo "  </div>";//div contenido_cont
	echo "</div>";//div contenedor

	echo" </body>";
	echo" </html>";
?>