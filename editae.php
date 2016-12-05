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

$_SESSION['id_conse_egresos']=$_REQUEST['id_conse_egresos'];
$id_conse_egresos=$_SESSION["id_conse_egresos"];


$vale= "onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\"";

$celda="#1a1a1a";
$tabla="#666";

echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
echo "    <h3>Captura de Egresos del Presupuesto 2017</h3>";
echo "    <h2>Edici&oacute;n de Gastos</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b></b>Usted esta editando un gasto!";
echo "		</p>";

echo "		<div id=\"cajaareas\">";
echo "		<form action=\"inserta_edita_egreso.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";
			
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

			$result=mysql_query("select conse_act,clave_act,clave,clave_del,clave_uops,clave_par,id_par,origen_del_gasto,
										cantidad,unidad,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,
										noviembre,diciembre,total_gasto from egresos where clave='$clave' and id_conse_egresos=$id_conse_egresos", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
									$conse_act=$row['conse_act'];
									$clave_act=$row['clave_act'];
									$clave=$row['clave'];
									$clave_del=$row['clave_del'];
									$clave_uops=$row['clave_uops'];
									$clave_par=$row['clave_par'];
									$id_par=$row['id_par'];
									$origen_del_gasto=$row['origen_del_gasto'];
									$cantidad=$row['cantidad'];
									$unidad=$row['unidad'];
									$enero=$row['enero'];
									$febrero=$row['febrero'];
									$marzo=$row['marzo'];
									$abril=$row['abril'];
									$mayo=$row['mayo'];
									$junio=$row['junio'];
									$julio=$row['julio'];
									$agosto=$row['agosto'];
									$septiembre=$row['septiembre'];
									$octubre=$row['octubre'];
									$noviembre=$row['noviembre'];
									$diciembre=$row['diciembre'];
									$total_gasto=$row['total_gasto'];
								}

								$_SESSION["clave_act"]=$clave_act;
								$_SESSION["clave_par"]=$clave_par;

echo "		<table width=\"90%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"actividades\" class=\"spgrey\">Partida: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
			$result=mysql_query("select conse_partidas, clave_par, desc_par from cat_partidas_e where clave_par=$clave_par", $connect);

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
echo "		<td bgcolor=\"$celda\">";
	
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
echo "		</tr>";


echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"inicio\" class=\"spgrey\">Inicio: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"spblue\"><input type=\"text\" id=\"popupDatepicker\" name=\"inicio\" value=\"01-01-2017\" required></span>";
echo "		</td>";

echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"termino\" class=\"spgrey\">Termino: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"spblue\"><input type=\"text\" id=\"popupDatepickers\" name=\"termino\" value=\"31-12-2017\" required></span>";
echo "		</td>";
echo "		</tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\">Origen del gasto: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
echo "		<input type=\"text\" name=\"origen_del_gasto\" id=\"origen_del_gasto\" list=\"eventos\" size=\"100\"  onchange=\"javascript:this.value=this.value.toUpperCase();\" value=\"$origen_del_gasto\" required>";
echo "		<datalist id=\"eventos\">";


			$result=mysql_query("select distinct (origen_del_gasto) as origen_del_gasto from egresos", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$origen_del_gasto=$row['origen_del_gasto'];
								echo "<option value=\"$nom_evento\">";
								}

echo "		</datalist>";
echo "		</td>";

echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\">Cantidad solo numero: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"3\">";
echo "		<span class=\"spblue\"><input type=\"number\" id=\"cantidad\" name=\"cantidad\"  value=\"$cantidad\" required $vale></span>";
echo "		</td>";
echo "		</tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\">Unidad: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
echo "		<input type=\"text\" name=\"unidad\" id=\"unidad\" list=\"unidades\" size=\"50\"  onchange=\"javascript:this.value=this.value.toUpperCase();\" value=\"$unidad\">";
echo "		<datalist id=\"unidades\">";


			$results=mysql_query("select distinct (unidad) as unidad from egresos", $connect);

								$totalregistros=mysql_num_rows($results);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($results))
								{
								$unidad=$row['unidad'];
								echo "<option value=\"$unidad\">";
								}

echo "		</datalist>";
echo "		</td>";

echo "		<td bgcolor=\"$celda\" align=\"right\" colspan=\"2\">&nbsp;";
echo "		</td>";
echo "		</tr>";


			
echo "</table>";
echo "<br \>";

echo " <table width=\"90%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "   <tr>";
echo "<th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">ENERO</span></th>";
echo "<th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">FEBRERO</span></th>";
echo "<th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">MARZO</span></th>";
echo "<th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">ABRIL</span></th>";
echo "   </tr>";

echo "<tr>";
echo "<td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"enero\" name=\"enero\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required value=\"$enero\"></td>";
echo "<td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"febrero\" name=\"febrero\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"$febrero\"></td>";
echo "<td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"marzo\" name=\"marzo\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"$marzo\"></td>";
echo "<td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"abril\" name=\"abril\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"$abril\"></td>";
echo "</tr>";

echo "   <tr>";
echo "<th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">MAYO</span></th>";
echo "<th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">JUNIO</span></th>";
echo "<th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">JULIO</span></th>";
echo "<th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">AGOSTO</span></th>";
echo "   </tr>";

echo "<tr>";
echo "<td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"mayo\" name=\"mayo\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"$mayo\"></td>";
echo "<td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"junio\" name=\"junio\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"$junio\">";
echo "<td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"julio\" name=\"julio\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"$julio\"></td>";
echo "<td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"agosto\" name=\"agosto\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"$agosto\"></td>";
echo "</tr>";

echo "   <tr>";
echo "<th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">SEPTIEMBRE</span></th>";
echo "<th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">OCTUBRE</span></th>";
echo "<th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">NOVIEMBRE</span></th>";
echo "<th colspan=\"1\" scope=\"col\"><span class=\"spgreen\">DICIEMBRE</span></th>";
echo "   </tr>";

echo "<tr>";
echo "<td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"septiembre\" name=\"septiembre\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"$septiembre\"></td>";
echo "<td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"octubre\" name=\"octubre\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"$octubre\"></td>";
echo "<td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"noviembre\" name=\"noviembre\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"$noviembre\"></td>";
echo "<td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" id=\"diciembre\" name=\"diciembre\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\" size=\"10\" required  value=\"$diciembre\"></td>";
echo "</tr>";


echo "</table>";

echo "<br>";
echo "<input type=\"button\" value=\"atras\" onclick=\"history.go(-1)\" /> | <input type=\"submit\" value=\"Modificar gasto\" />";

echo "</form>";

echo "   	</div>";//cajaareas 
echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor



echo" </body>";
echo" </html>";

?>