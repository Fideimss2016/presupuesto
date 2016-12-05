<?php
include "valida_seguridad.php";
include "clases/variablesbd.php";

include "datepickBasic.html";

echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\" >";


	//conexion a la base de datos
	$connect=mysql_connect("$host","$user","$passworks");

	//Seleccion de la base
	mysql_select_db("$dbname",$connect);

echo" <body>";
echo "<div id=\"contenedor\">";
echo "	<div id=\"contenido_cont\">";

$usuario_sistema=$_SESSION["usuario_sistema"];
$clave=$_SESSION["clave"];

$_SESSION['id_proyecto']=$_REQUEST['id_proyecto'];
$_SESSION['conse_partida']=$_REQUEST['conse_partida'];
$_SESSION['conse_act']=$_REQUEST['conse_act'];


$id_proyecto=$_SESSION["id_proyecto"];
$conse_partida=$_SESSION["conse_partida"];
$conse_act=$_SESSION["conse_act"];

$vale= "onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\"";

$celda="#1a1a1a";
$tabla="#666";

echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
echo "    <h3>Captura de Obra y Equipamiento Deportivo del Presupuesto 2017</h3>";
echo "    <h2>Registro de Gastos</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b>Paso 2</b> Complete los campos que a continuaci&oacute;n se detallan";
echo "		</p>";

echo "		<div id=\"cajaareas\">";
echo "		<form action=\"obra_2.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";
			
			$result=mysql_query("select desc_uops, desc_del, id_cuota from cat_delegaciones where clave='$clave'", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$desc_uops=$row['desc_uops'];
								$desc_del=$row['desc_del'];
								$id_cuota=$row['id_cuota'];
								}

echo "		<label for=\"uopsi\">Unidad Operativa: <b>$desc_uops</b></label><br><br>";

echo "		<table width=\"90%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"actividades\" class=\"spgrey\">Partida: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"3\">";
			$result=mysql_query("select conse_partidas, clave_par, desc_par from cat_partidas_e where conse_partidas=$conse_partida", $connect);

//echo "select conse_partidas, clave_par, desc_par from cat_partidas_e where conse_partidas=$conse_partida";


								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$conse_partidas=$row['conse_partidas'];
								$clave_par=$row['clave_par'];
								$desc_par=$row['desc_par'];
								}
								$_SESSION["conse_partidas"]=$conse_partidas;
								$_SESSION["clave_par"]=$clave_par;
								$_SESSION["desc_par"]=$desc_par;

echo "		<span class=\"spgreen\">&nbsp;$clave_par $desc_par</span></td></tr>";
echo "		<tr><td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"tipo_curso\" class=\"spgrey\">Concepto:</label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
	
			$result=mysql_query("select desc_proyecto from cat_proyectos_o where id_proyecto=$id_proyecto order by id_proyecto", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$desc_proyecto=$row['desc_proyecto'];
								}
								$_SESSION["desc_proyecto"]=$desc_proyecto;

echo "		<span class=\"spgreen\">&nbsp;$desc_proyecto</span></td>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"tipo_curso\" class=\"spgrey\">Actividad:</label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
	
			$result=mysql_query("select clave_act, actividad from cat_actividades_i where conse_act=$conse_act", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$clave_act=$row['clave_act'];
								$actividad=$row['actividad'];
								}
								$_SESSION["clave_act"]=$clave_act;
								$_SESSION["actividad"]=$actividad;

echo "		<span class=\"spgreen\">&nbsp;$actividad</span></td>";
echo "		</tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"inicio\" class=\"spgrey\">Inicio: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"spblue\"><input type=\"text\" id=\"popupDatepicker\" name=\"inicio\" value=\"01-01-2017\" required></span>";
echo "		</td>";

echo "		<td bgcolor=\"$celda\" align=\"right\" colspan=\"1\">";
echo "		<label for=\"termino\" class=\"spgrey\">Termino: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"spblue\"><input type=\"text\" id=\"popupDatepickers\" name=\"termino\" value=\"31-12-2017\" required></span>";
echo "		</td>";
echo "		</tr>";

/*
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\">Concepto: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"2\">";
echo "		<input type=\"text\" name=\"origen_del_gasto\" id=\"origen_del_gasto\" list=\"eventos\" size=\"100\"  onchange=\"javascript:this.value=this.value.toUpperCase();\" required>";
echo "		<datalist id=\"eventos\">";


			$result=mysql_query("select distinct (origen_del_gasto) as origen_del_gasto from obras", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$origen_del_gasto=$row['origen_del_gasto'];
								echo "<option value=\"$nom_evento\">";
								}

echo "		</datalist>";
echo "		</td>";
*/

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\">Cantidad solo numero: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"3\">";
echo "		<span class=\"spblue\"><input type=\"number\" id=\"cantidad\" name=\"cantidad\" required $vale placeholder=\"Capture cantidad\"></span>";
echo "		</td>";
echo "		</tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\">Unidad: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";

echo "		<select name=\"unidad\">";
			$result=mysql_query("select desc_unidades from cat_unidades order by desc_unidades", $connect);
			
								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$desc_unidades=$row['desc_unidades'];
								$clave_act=$row['clave_act'];
								$actividad=$row['actividad'];
								
								print("<option value=\"$desc_unidades\">$desc_unidades</option>");
								}

			echo"</select>";
echo "		</td>";

echo "		<td bgcolor=\"$celda\" align=\"right\" colspan=\"2\">&nbsp;";
echo "		</td>";
echo "		</tr>";



echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<label for=\"inicio\" class=\"spgrey\">Patida</label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<label for=\"inicio\" class=\"spgrey\">Monto De Inversion con IVA</label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"center\" colspan=\"3\">";
echo "		<label for=\"inicio\" class=\"spgrey\">Ejercicio Fiscal</label>";
echo "		</td>";
echo "		</tr>";

			//$hoy= date("Y-m-d H:s");
			//$anioo= substr($hoy,0,4);
echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<span class=\"spblue\">$clave_par</span>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<span class=\"spblue\"><input type=\"text\" name=\"inversion\" required $vale placeholder=\"Capture monto\"></span>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"center\" colspan=\"3\">";
echo "		<span class=\"spblue\">2017</span>";
echo "		</td></tr>";


echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"componentes\" class=\"spgrey\">Concepto del tipo de gasto:</label></td><td colspan=\"4\" bgcolor=\"$celda\">";
echo "
		<input type=\"checkbox\" name=\"c1\" value=\"1\"><span class=\"spgreen\">Mantenimiento de Equipo Deportivo</span>
		<br>
		<input type=\"checkbox\" name=\"c2\" value=\"2\"><span class=\"spgreen\">Proyecto Ejecutivo</span>
		<br>
		<input type=\"checkbox\" name=\"c3\" value=\"3\"><span class=\"spgreen\">Obra</span>
		<br>
		<input type=\"checkbox\" name=\"c4\" value=\"4\"><span class=\"spgreen\">Mantenimiento de Areas Deportivas</span>
		<br>
		<input type=\"checkbox\" name=\"c5\" value=\"5\"><span class=\"spgreen\">Adquisicion de Equipo Deportivo</span>
		<br>
		<input type=\"checkbox\" name=\"c6\" value=\"6\"><span class=\"spgreen\">Otros</span>&nbsp;&nbsp;<span class=\"spgreen\">Especifique</span>
		<input type=\"text\" name=\"otros\" placeholder=\"especique concepto\">
		

     ";	

echo "		</td></tr>";



if($clave_par=="0502")	
	{
		echo "		<tr>";
		echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"problematica\" class=\"spgrey\">Descripcion del concepto:</label></td>
			        <td colspan=\"4\" bgcolor=\"$celda\">
			        <textarea rows=\"5\" cols=\"80\" name=\"problematica\"  placeholder=\"caracteristicas del equipo requerido\"></textarea>";
		echo "		</td></tr>";
	}

else if($clave_par=="0402")	
	{
		echo "		<tr>";
		echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"problematica\" class=\"spgrey\">Descripcion del concepto:</label></td>
			        <td colspan=\"4\" bgcolor=\"$celda\">
			        <textarea rows=\"5\" cols=\"80\" name=\"problematica\"  placeholder=\"explique el servicio o mantenimiento que requieren los bienes\"></textarea>";
		echo "		</td></tr>";
	}

else
	{
		echo "		<tr>";
		echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"problematica\" class=\"spgrey\">Descripcion del concepto:</label></td>
			        <td colspan=\"4\" bgcolor=\"$celda\">
			        <textarea rows=\"5\" cols=\"80\" name=\"problematica\"  placeholder=\"explique que trabajos requieren realizarse, medidas o superficie del area\"></textarea>";
		echo "		</td></tr>";
	}


echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"objetivo\" class=\"spgrey\">Beneficios esperados:</label></td>
			<td colspan=\"4\" bgcolor=\"$celda\">
			<textarea rows=\"5\" cols=\"80\" name=\"objetivo\"  placeholder=\"resuma los beneficios que pretende obtener, con la inversion requerida\"></textarea>";
echo "		</td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"beneficios\" class=\"spgrey\">Recuperacion de la inversi&oacute;n:</label></td>
			<td colspan=\"4\" bgcolor=\"$celda\">
			<textarea rows=\"5\" cols=\"80\" name=\"beneficios\"  placeholder=\"una vez otorgado el apoyo economico, En cuanto tiempo considera que pueda recuperarse el monto de la inversion requerida?\"></textarea>";
echo "		</td></tr>";
			
echo "</table>";
echo "<br \>";

echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"history.back()\" /> | <input type=\"submit\" value=\"Continuar\" />";

echo "</form>";

echo "   	</div>";//cajaareas 
echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor



echo" </body>";
echo" </html>";

?>