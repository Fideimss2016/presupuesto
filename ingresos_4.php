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

	if(isset($_SESSION['usuario_sistema'])){$usuario_sistema = $_SESSION["usuario_sistema"];}
	if(isset($_SESSION['clave'])){$clave = $_SESSION["clave"];}
	if(isset($_SESSION['conse_acts'])){$conse_acts = $_SESSION["conse_acts"];}
	if(isset($_SESSION['id_tipo_curso'])){$id_tipo_curso = $_SESSION["id_tipo_curso"];}
	if(isset($_SESSION['id_tipo_pago'])){$id_tipo_pago = $_SESSION["id_tipo_pago"];}
	if(isset($_SESSION['inicio'])){$inicio = $_SESSION["inicio"];}
	if(isset($_SESSION['termino'])){$termino = $_SESSION["termino"];}
	if(isset($_SESSION['dias'])){$dias = $_SESSION["dias"];}
	if(isset($_SESSION['horas'])){$horas = $_SESSION["horas"];}
	if(isset($_SESSION['dif_mes'])){$dif_mes = $_SESSION["dif_mes"];}

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
	echo "		<form action=\"inserta_ingresosi.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";
				
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
		
	$result = mysql_query("select id_tipo_curso, desc_tipo_curso,duracion from cat_tipo_curso_i where id_tipo_curso = $id_tipo_curso", $connect);
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
		
	$result = mysql_query("select id_tipo_pago, desc_tipo_pago from cat_tipo_pago_i where id_tipo_pago = $id_tipo_pago", $connect);
	$totalregistros = mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran
	while($row = mysql_fetch_array($result))
	{
		$id_tipo_pago = $row['id_tipo_pago'];
		$desc_tipo_pago = $row['desc_tipo_pago'];
	}

	echo "		<span class=\"spgreen\">&nbsp;$desc_tipo_pago</span></td>";

	//if($conse_acts == 57)
	if($conse_acts == 64)
	{
		$conse = $_SESSION['conse'];
				
		echo "		<td bgcolor=\"$celda\" align=\"right\">";
		echo "		<label for=\"tipo_curso\" class=\"spgrey\">Instalacion:</label>";
		echo "		</td>";
		echo "		<td bgcolor=\"$celda\">";
		
		$result = mysql_query("select conse, desc_nombre, normal, grupo from instalaciones where clave = '$clave' and conse = $conse", $connect);
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
	echo "		<span class=\"spblue\">&nbsp;$horas hrs.</span>";
	echo "		</td>";

	$mes = substr($inicio,3,2);
	$mes1 = substr($nuevafecha,3,2);

	$mensualidadesder = $horas * $normal;
	$mensualidadesnoder = $horas * $grupo;
	echo "		<td bgcolor=\"$celda\" align=\"right\">";
	echo "		<label for=\"actividades\" class=\"spgrey\">Costo por hora: </label>";
	echo "		</td>";
	echo "		<td bgcolor=\"$celda\">";
	echo "		<span class=\"white\">&nbsp;Derechohabiente: </span><span class=\"spblue\"> $". number_format($normal,2) . " pesos</span>
		 ";
	echo "		</td>";
	echo "		</tr>";

	echo "		<tr>";
	echo "		<td bgcolor=\"$celda\" align=\"right\" colspan=\"3\">";
	echo "		<label for=\"actividades\" class=\"spgrey\">Total del numero de horas: </label>";
	echo "		</td>";
	echo "		<td bgcolor=\"$celda\">";
	echo "		<span class=\"white\">&nbsp;Derechohabiente: </span><span class=\"spblue\"> $". number_format($mensualidadesder,2) . " pesos</span>
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

	$tot1 = $dh1 * $normal;
	$tot2 = $dh2 * $normal;
	$tot3 = $dh3 * $normal;
	$tot4 = $dh4 * $normal;
	$tot5 = $dh5 * $normal;
	$tot6 = $dh6 * $normal;
	$tot7 = $dh7 * $normal;
	$tot8 = $dh8 * $normal;
	$tot9 = $dh9 * $normal;
	$tot10 = $dh10 * $normal;
	$tot11 = $dh11 * $normal;
	$tot12 = $dh12 * $normal;

	/*PRIMER SEMESTRE*/
	echo " <table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
	echo "   <tr>";
	echo "     <th colspan=\"2\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Enero</span></th>";
	echo "     <th colspan=\"2\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Febrero</span></th>";
	echo "     <th colspan=\"2\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Marzo</span></th>";
	echo "     <th colspan=\"2\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Abril</span></th>";
	echo "     <th colspan=\"2\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Mayo</span></th>";
	echo "     <th colspan=\"2\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Junio</span></th>";
	echo "   </tr>";
	echo "   <tr>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
	echo "   </tr>";
	echo "   <tr>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot1,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot1\" class=\"spblue\">$dh1</a></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot2,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot2\" class=\"spblue\">$dh2</a></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot3,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot3\" class=\"spblue\">$dh3</a></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot4,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$ntot4\" class=\"spblue\">$dh4</a></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot5,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot5\" class=\"spblue\">$dh5</a></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot6,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot6\" class=\"spblue\">$dh6</a></td>";
	echo "   </tr>";
	echo " </table>";
	 /*FIN PRIMER SEMESTRE*/
	 echo "<br \>";
	 /*SEGUNDO SEMESTRE*/
	echo " <table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
	echo "   <tr>";
	echo "     <th colspan=\"2\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Julio</span></th>";
	echo "     <th colspan=\"2\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Agosto</span></th>";
	echo "     <th colspan=\"2\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Septiembre</span></th>";
	echo "     <th colspan=\"2\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Octubre</span></th>";
	echo "     <th colspan=\"2\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Noviembre</span></th>";
	echo "     <th colspan=\"2\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Diciembre</span></th>";
	echo "   </tr>";
	echo "   <tr>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
	echo "   </tr>";
	echo "   <tr>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot7,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot7\" class=\"spblue\">$dh7</a></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot8,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot8\" class=\"spblue\">$dh8</a></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot9,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot9\" class=\"spblue\">$dh9</a></a></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot10,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot10\" class=\"spblue\">$dh10</a></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot11,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot11\" class=\"spblue\">$dh11</a></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot12,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot12\" class=\"spblue\">$dh12</a></td>";
	echo "   </tr>";
	echo " </table>";
	 
	$gtotal = $tot1 + $tot2 + $tot3 + $tot4 + $tot5 + $tot6 + $tot7 + $tot8+$tot9+$tot10+$tot11+$tot12;
	$dhgtotal = $dh1 + $dh2 + $dh3 + $dh4 + $dh5 + $dh6 + $dh7 + $dh8 + $dh9 + $dh10 + $dh11 + $dh12;

	/*FIN SEGUNDO SEMESTRE*/

	echo "<br \>";
	/*RESUMEN*/
	echo " <table width=\"30%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
	echo "   <tr>";
	echo "     <th colspan=\"2\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Total de ingresos y poblacion beneficiada</span></th>";
	echo "   </tr>";
	echo "   <tr>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
	echo "   </tr>";
	echo "   <tr>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($gtotal,2) . "</span></td>";
	echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot7\" class=\"spblue\">$dhgtotal</a></td>";
	echo "   </tr>";
	echo " </table>";

	if($horas == $dhgtotal)
	{
		echo "		<p class=\"spwhite\">";
		echo "		Si la informacion es correcta proceda a guardar el registro!";
		echo "		</p>";

		 /*FIN RESUMEN*/

		echo "<br \>";

		//echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"history.go(-1)\" /> | <input type=\"submit\" value=\"Registrar actividad\" />";
		echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"document.location ='ingresos.php'\" /> | <input type=\"submit\" value=\"Continuar\" />";
	}
	else
	{
		echo "		<p class=\"spwhite\">";
		echo "		El numero de horas no corresponde!";
		echo "		</p>";

		 /*FIN RESUMEN*/
		 echo "<br \>";

		echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"history.go(-1)\" />";
	}
	echo "</form>";

	echo "   	</div>";//cajaareas 
	echo "  </div>";//div contenido_cont
	echo "</div>";//div contenedor

	echo" </body>";
	echo" </html>";
?>