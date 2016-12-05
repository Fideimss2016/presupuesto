<?php
	session_start();
//	include "valida_seguridad.php";
	include "clases/variablesbd.php";

	include "datepickBasic.html";
	include "funcion_fecha.php";
	include "generameses.php";
	include "generahoras.php";

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
	$conse_acts = $_SESSION["conse_acts"];
	$id_tipo_curso = $_SESSION["id_tipo_curso"];
	$id_tipo_pago = $_SESSION["id_tipo_pago"];
	$inicio = $_SESSION["inicio"];
	$termino = $_SESSION["termino"];
	$dias = $_SESSION["dias"];
	$horas = $_SESSION["horas"];
	$dif_mes = $_SESSION["dif_mes"];
	$montol = $_SESSION["montol"];


	if ($_POST["dh1"]){$_SESSION['dh1'] = $_REQUEST['dh1']; $dh1 = $_SESSION["dh1"];} else{$_SESSION['dh1'] = 0;}
	if ($_POST["dh2"]){$_SESSION['dh2'] = $_REQUEST['dh2']; $dh2 = $_SESSION["dh2"];} else{$_SESSION['dh2'] = 0;}
	if ($_POST["dh3"]){$_SESSION['dh3'] = $_REQUEST['dh3']; $dh3 = $_SESSION["dh3"];} else{$_SESSION['dh3'] = 0;}
	if ($_POST["dh4"]){$_SESSION['dh4'] = $_REQUEST['dh4']; $dh4 = $_SESSION["dh4"];} else{$_SESSION['dh4'] = 0;}
	if ($_POST["dh5"]){$_SESSION['dh5'] = $_REQUEST['dh5']; $dh5 = $_SESSION["dh5"];} else{$_SESSION['dh5'] = 0;}
	if ($_POST["dh6"]){$_SESSION['dh6'] = $_REQUEST['dh6']; $dh6 = $_SESSION["dh6"];} else{$_SESSION['dh6'] = 0;}
	if ($_POST["dh7"]){$_SESSION['dh7'] = $_REQUEST['dh7']; $dh7 = $_SESSION["dh7"];} else{$_SESSION['dh7'] = 0;}
	if ($_POST["dh8"]){$_SESSION['dh8'] = $_REQUEST['dh8']; $dh8 = $_SESSION["dh8"];} else{$_SESSION['dh8'] = 0;}
	if ($_POST["dh9"]){$_SESSION['dh9'] = $_REQUEST['dh9']; $dh9 = $_SESSION["dh9"];} else{$_SESSION['dh9'] = 0;}
	if ($_POST["dh10"]){$_SESSION['dh10'] = $_REQUEST['dh10']; $dh10 = $_SESSION["dh10"];} else{$_SESSION['dh10'] = 0;}
	if ($_POST["dh11"]){$_SESSION['dh11'] = $_REQUEST['dh11']; $dh11 = $_SESSION["dh11"];} else{$_SESSION['dh11'] = 0;}
	if ($_POST["dh12"]){$_SESSION['dh12'] = $_REQUEST['dh12']; $dh12 = $_SESSION["dh12"];} else{$_SESSION['dh12'] = 0;}

	$tabla = "#666";
	$celda = "#1a1a1a";
	$celda1 = "#666";

	echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
	echo "    <h3>Captura de Ingresos del Presupuesto 2017</h3>";
	echo "    <h2>Registro de Actividades</h2>";

	echo "		<p class=\"spwhite\">";
	echo "		<b>Paso 4</b> Confirme datos";
	echo "		</p>";

	echo "		<div id=\"cajaareas\">";
	echo "		<form action=\"inserta_ingresoso.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";
				
	$result = mysql_query("select desc_uops, desc_del, id_cuota from cat_delegaciones where clave='$clave'", $connect);
	$totalregistros = mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran
	while($row = mysql_fetch_array($result))
	{
		$desc_uops = $row['desc_uops'];
		$desc_del = $row['desc_del'];
		$id_cuota = $row['id_cuota'];
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

	echo "		<span class=\"spgreen\">&nbsp;$desc_tipo_pago</span></td>";
	if($conse_acts == 63)
	{
		$conse = $_SESSION['conse'];
		echo "		<td bgcolor=\"$celda\" align=\"right\">";
		echo "		<label for=\"tipo_curso\" class=\"spgrey\">Instalacion:</label>";
		echo "		</td>";
		echo "		<td bgcolor=\"$celda\">";
	
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
	else
	{
		echo "		<td colspan=\"2\" bgcolor=\"$celda\">&nbsp;</td>";
	}

	echo "		</tr>";

	echo "		<tr>";
	echo "		<td bgcolor=\"$celda\" align=\"right\">";
	echo "		<label for=\"actividades\" class=\"spgrey\">Duracion: </label>";
	echo "		</td>";
	echo "		<td bgcolor=\"$celda\">";
	echo "		<span class=\"spblue\">&nbsp;No Aplica</span>";
	echo "		</td>";

	$mes = substr($inicio,3,2);
	$mes1 = substr($nuevafecha,3,2);

	echo "		<td bgcolor=\"$celda\" align=\"right\">";
	echo "		<label for=\"actividades\" class=\"spgrey\">Ingreso Anual: </label>";
	echo "		</td>";
	echo "		<td bgcolor=\"$celda\">";
	echo "		<span class=\"white\">&nbsp;</span><span class=\"spblue\"> $". number_format($montol,2) . " pesos</span>
		 ";
	echo "		</td>";
	echo "		</tr>";

	echo "		<tr>";
	echo "		<td bgcolor=\"$celda\" align=\"right\">";
	echo "		<label for=\"inicio\" class=\"spgrey\">Inicio: </label>";
	echo "		</td>";
	echo "		<td bgcolor=\"$celda\">";
	echo "		<span class=\"spblue\">&nbsp;$inicio</span>";
	echo "		</td>";

	echo "		<td bgcolor=\"$celda\" align=\"right\">";
	echo "		<label for=\"actividades\" class=\"spgrey\">Termino: </label>";
	echo "		</td>";
	echo "		<td bgcolor=\"$celda\">";
	echo "		<span class=\"spblue\">&nbsp;$termino</span>";
	echo "		</td>";
	echo "		</tr>";

	echo "</table>";
	echo "<br \>";

	$dh1 = $_SESSION['dh1'];
	$dh2 = $_SESSION['dh2'];
	$dh3 = $_SESSION['dh3'];
	$dh4 = $_SESSION['dh4'];
	$dh5 = $_SESSION['dh5'];
	$dh6 = $_SESSION['dh6'];
	$dh7 = $_SESSION['dh7'];
	$dh8 = $_SESSION['dh8'];
	$dh9 = $_SESSION['dh9'];
	$dh10 = $_SESSION['dh10'];
	$dh11 = $_SESSION['dh11'];
	$dh12 = $_SESSION['dh12'];

	/*PRIMER SEMESTRE*/
	echo " <table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
	echo "   <tr>";
	echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Enero</span></th>";
	echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Febrero</span></th>";
	echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Marzo</span></th>";
	echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Abril</span></th>";
	echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Mayo</span></th>";
	echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Junio</span></th>";
	echo "   </tr>";
	echo "   <tr>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "   </tr>";
	echo "   <tr>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh1,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh2,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh3,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh4,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh5,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh6,2) . "</span></td>";
	echo "   </tr>";
	echo " </table>";
	 /*FIN PRIMER SEMESTRE*/
	 echo "<br \>";
	 /*SEGUNDO SEMESTRE*/
	echo " <table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
	echo "   <tr>";
	echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Julio</span></th>";
	echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Agosto</span></th>";
	echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Septiembre</span></th>";
	echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Octubre</span></th>";
	echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Noviembre</span></th>";
	echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Diciembre</span></th>";
	echo "   </tr>";
	echo "   <tr>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "   </tr>";
	echo "   <tr>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh7,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh8,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh9,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh10,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh11,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh12,2) . "</span></td>";
	echo "   </tr>";
	echo " </table>";
	 
	$dhgtotal = $dh1 + $dh2 + $dh3 + $dh4 + $dh5 + $dh6 + $dh7 + $dh8 + $dh9 + $dh10 + $dh11 + $dh12;

	 /*FIN SEGUNDO SEMESTRE*/

	echo "<br \>";
	 /*RESUMEN*/
	echo " <table width=\"30%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
	echo "   <tr>";
	echo "     <th colspan=\"1\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Total de ingresos</span></th>";
	echo "   </tr>";
	echo "   <tr>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "   </tr>";
	echo "   <tr>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dhgtotal,2) . "</span></td>";
	echo "   </tr>";
	echo " </table>";
	 
	if($dhgtotal > $montol)
	{
		echo "		<p class=\"spred\">";
		echo "		Error! el importe total es mayor al capturado como ingreso anual!!!";
		echo "		</p>";
	}
	else if($dhgtotal < $montol)
	{
		echo "		<p class=\"spred\">";
		echo "		Error! el importe total es menor al capturado como ingreso anual!!!";
		echo "		</p>";
	}
	else
	{
		echo "		<p class=\"spwhite\">";
		echo "		Si la informacion es correcta proceda a guardar el registro!";
		echo "		</p>";
		 /*FIN RESUMEN*/
		echo "<br \>";
		//echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"history.go(-1)\" /> | <input type=\"submit\" value=\"Registrar actividad\" />";
		echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"document.location ='ingresos.php'\" /> | <input type=\"submit\" value=\"Continuar\" />";
	}
	echo "</form>";

	echo "   	</div>";//cajaareas 
	echo "  </div>";//div contenido_cont
	echo "</div>";//div contenedor

	echo" </body>";
	echo" </html>";
?>