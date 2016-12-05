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

$_SESSION['conse_act']=$_REQUEST['conse_act'];
$_SESSION['conse_partida']=$_REQUEST['conse_partida'];
$_SESSION['conse_categoria']=$_REQUEST['conse_categoria'];


$instructor=$_SESSION["instructor"];
//echo "instructor: $instructor";
$conse_act=$_SESSION["conse_act"];
$conse_partida=$_SESSION["conse_partida"];
$conse_categoria=$_SESSION["conse_categoria"];
$vale= "onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\"";

$celda="#1a1a1a";
$tabla="#666";

echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
echo "    <h3>Captura de Personal del Presupuesto 2017</h3>";
echo "    <h2>Registro de Personal</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b>Paso 2</b> Complete los campos que a continuaci&oacute;n se detallan";
echo "		</p>";

echo "		<div id=\"cajaareas\">";
echo "		<form action=\"inserta_personal.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";
			
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
echo "		<td bgcolor=\"$celda\">";
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

echo "		<span class=\"spgreen\">&nbsp;$clave_par $desc_par</span></td>";
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

echo "		<span class=\"spgreen\">&nbsp;$clave_act $actividad</span></td>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"tipo_curso\" class=\"spgrey\">Categor&iacute;a:</label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
	
			$result=mysql_query("select desc_categoria, honorarios, subtotal from cat_categoria where conse_categoria=$conse_categoria", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$desc_categoria=$row['desc_categoria'];
								$honorarios=$row['honorarios'];
								$subtotal=$row['subtotal'];
								}
								$_SESSION["desc_categoria"]=$desc_categoria;
								$_SESSION["honorarios"]=$honorarios;
								$_SESSION["subtotal"]=$subtotal;

echo "		<span class=\"spgreen\">&nbsp;$desc_categoria</span></td>";

echo "		</tr>";


echo "		<tr>";


if($instructor==1)
{
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"inicio\" class=\"spgrey\">Inicio: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"spblue\"><input type=\"text\" id=\"popupDatepicker\" name=\"inicio\" value=\"01-01-2017\" required></span>";
echo "		</td>";

echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"termino\" class=\"spgrey\">Termino: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
echo "		<span class=\"spblue\"><input type=\"text\" id=\"popupDatepickers\" name=\"termino\" value=\"31-12-2017\" required></span>";
echo "		</td>";

echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"termino\" class=\"spgrey\">Honorarios: </label>";
echo "		</td>";
}
else if($instructor==44)
{
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"inicio\" class=\"spgrey\">Inicio: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"spblue\"><input type=\"text\" id=\"popupDatepicker\" name=\"inicio\" value=\"01-06-2017\" required></span>";
echo "		</td>";

echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"termino\" class=\"spgrey\">Termino: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
echo "		<span class=\"spblue\"><input type=\"text\" id=\"popupDatepickers\" name=\"termino\" value=\"31-08-2017\" required></span>";
echo "		</td>";

echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"termino\" class=\"spgrey\">Honorarios: </label>";
echo "		</td>";
}

if($instructor==1)
{
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
echo "		<span class=\"spblue\"> &nbsp;" . number_format($subtotal,2) . "</span>";
echo "		</td>";
}
else if($instructor==44)
{
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
echo "		<input type=\"number\" name=\"subtotals\" id=\"subtotals\" size=\"20\" required>";
echo "		</td>";
}

echo "		</tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\">Nombre: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
echo "		<input type=\"text\" name=\"nombre\" id=\"nombre\" size=\"50\" onchange=\"javascript:this.value=this.value.toUpperCase();\" required>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\">Apellido paterno: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
echo "		<input type=\"text\" name=\"ape_pat\" id=\"ape_pat\" size=\"50\" onchange=\"javascript:this.value=this.value.toUpperCase();\" required>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\">Apellido materno: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
echo "		<input type=\"text\" name=\"ape_mat\" id=\"ape_mat\" size=\"50\" onchange=\"javascript:this.value=this.value.toUpperCase();\" required>";
echo "		</td>";
echo "		</tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\">Meses de contrato: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"5\">";
//echo "		<input type=\"text\" name=\"meses\" id=\"meses\" size=\"5\" required $vale>";

if($instructor==1)
{
echo "
			<input type=\"checkbox\" name=\"m1\"  value=\"1\"><span class=\"spgreen\">Enero</span>&nbsp;
			<input type=\"checkbox\" name=\"m2\"  value=\"1\"><span class=\"spgreen\">Febrero</span>&nbsp;
			<input type=\"checkbox\" name=\"m3\"  value=\"1\"><span class=\"spgreen\">Marzo</span>&nbsp;
			<input type=\"checkbox\" name=\"m4\"  value=\"1\"><span class=\"spgreen\">Abril</span>&nbsp;
			<input type=\"checkbox\" name=\"m5\"  value=\"1\"><span class=\"spgreen\">Mayo</span>&nbsp;
			<input type=\"checkbox\" name=\"m6\"  value=\"1\"><span class=\"spgreen\">Junio</span>&nbsp;
			<input type=\"checkbox\" name=\"m7\"  value=\"1\"><span class=\"spgreen\">Julio</span>&nbsp;
			<input type=\"checkbox\" name=\"m8\"  value=\"1\"><span class=\"spgreen\">Agosto</span>&nbsp;
			<input type=\"checkbox\" name=\"m9\"  value=\"1\"><span class=\"spgreen\">Septiembre</span>&nbsp;
			<input type=\"checkbox\" name=\"m10\" value=\"1\"><span class=\"spgreen\">Octubre</span>&nbsp;
			<input type=\"checkbox\" name=\"m11\" value=\"1\"><span class=\"spgreen\">Noviembre</span>&nbsp;
			<input type=\"checkbox\" name=\"m12\" value=\"1\"><span class=\"spgreen\">Diciembre</span>
";
}
else if($instructor==44)
{
echo "
			<input type=\"checkbox\" name=\"m6\"  value=\"1\"><span class=\"spgreen\">Junio</span>&nbsp;
			<input type=\"checkbox\" name=\"m7\"  value=\"1\"><span class=\"spgreen\">Julio</span>&nbsp;
			<input type=\"checkbox\" name=\"m8\"  value=\"1\"><span class=\"spgreen\">Agosto</span>&nbsp;
";
}

echo "		</td>";
echo "		</tr>";


echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"presentacion\" class=\"spgrey\">Presentaci&oacute;n:</label></td><td colspan=\"5\" bgcolor=\"$celda\"><textarea rows=\"5\" cols=\"80\" name=\"presentacion\" placeholder=\"Escriba una breve descripci&oacute;n...\"></textarea>";
echo "		</td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"objetivo\" class=\"spgrey\">Objetivo General:</label></td><td colspan=\"5\" bgcolor=\"$celda\"><textarea rows=\"5\" cols=\"80\" name=\"objetivo\" placeholder=\"Escriba una breve descripci&oacute;n...\"></textarea>";
echo "		</td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"ambito\" class=\"spgrey\">&Aacute;mbito de Aplicaci&oacute;n:</label></td><td colspan=\"5\" bgcolor=\"$celda\"><textarea rows=\"5\" cols=\"80\" name=\"ambito\" placeholder=\"Escriba una breve descripci&oacute;n...\"></textarea>";
echo "		</td></tr>";


/*
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\">Cantidad solo numero: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"3\">";
echo "		<span class=\"spblue\"><input type=\"number\" id=\"cantidad\" name=\"cantidad\" required $vale></span>";
echo "		</td>";
*/

echo "</table>";
echo "<br \>";

echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"history.go(-1)\" /> | <input type=\"submit\" value=\"Guardar registro\" />";

echo "</form>";

echo "   	</div>";//cajaareas 
echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor



echo" </body>";
echo" </html>";

?>