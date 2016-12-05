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

$_SESSION['id_conse_obra']=$_REQUEST['id_conse_obra'];
//$_SESSION['conse_partida']=$_REQUEST['conse_partida'];
//$_SESSION['conse_act']=$_REQUEST['conse_act'];

$id_conse_obra=$_SESSION["id_conse_obra"];
//$conse_partida=$_SESSION["conse_partida"];
//$conse_act=$_SESSION["conse_act"];

$vale= "onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\"";

$celda="#1a1a1a";
$tabla="#666";

echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
echo "    <h3>Captura de Obra y Equipamiento Deportivo del Presupuesto 2016</h3>";
echo "    <h2>Modificaci&oacute;n de Gastos</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b></b> Usted esta modificando gastos de obra!!!";
echo "		</p>";

echo "		<div id=\"cajaareas\">";
echo "		<form action=\"inserta_edita_obra.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";
			
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


			$result=mysql_query("select id_proyecto,clave_par,monto,anio_fiso,problematica,objetivo,componentes,beneficios,riesgos,c1,c2,c3,c4,c5,c6,
										origen_del_gasto,cantidad,unidad,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,
										diciembre,total_gastoo,clave_act
								 from obras		
								 where clave='$clave' and id_conse_obra=$id_conse_obra", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
									$clave_act=$row['clave_act'];
									$id_proyecto=$row['id_proyecto'];
									$clave_par=$row['clave_par'];
									$monto=$row['monto'];
									$anio_fiso=$row['anio_fiso'];
									$problematica=$row['problematica'];
									$objetivo=$row['objetivo'];
									$componentes=$row['componentes'];
									$beneficios=$row['beneficios'];
									$riesgos=$row['riesgos'];
									$fecha_cap=$row['fecha_cap'];
									$id_usuario=$row['id_usuario'];
									$vobo=$row['vobo'];
									$status=$row['status'];
									$observaciones=$row['observaciones'];
									$c1=$row['c1'];
									$c2=$row['c2'];
									$c3=$row['c3'];
									$c4=$row['c4'];
									$c5=$row['c5'];	
									$c6=$row['c6'];
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
									$total_gastoo=$row['total_gastoo'];
								}
								$_SESSION["id_proyecto"]=$id_proyecto;

echo "		<table width=\"90%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"actividades\" class=\"spgrey\">Partida: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"3\">";
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
	
			$result=mysql_query("select clave_act, actividad from cat_actividades_i where clave_act=$clave_act", $connect);

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
echo "		<span class=\"spblue\"><input type=\"text\" id=\"popupDatepicker\" name=\"inicio\" value=\"01-01-2016\" required></span>";
echo "		</td>";

echo "		<td bgcolor=\"$celda\" align=\"right\" colspan=\"1\">";
echo "		<label for=\"termino\" class=\"spgrey\">Termino: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"spblue\"><input type=\"text\" id=\"popupDatepickers\" name=\"termino\" value=\"31-12-2016\" required></span>";
echo "		</td>";
echo "		</tr>";

/*
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\">Origen del gasto: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
echo "		<input type=\"text\" name=\"origen_del_gasto\" id=\"origen_del_gasto\" list=\"eventos\" size=\"100\"  onchange=\"javascript:this.value=this.value.toUpperCase();\" required value=\"$origen_del_gasto\">";
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
echo "		<span class=\"spblue\"><input type=\"number\" id=\"cantidad\" name=\"cantidad\" required $vale value=\"$cantidad\"></span>";
echo "		</td>";
echo "		</tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\">Unidad: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
echo "		<input type=\"text\" name=\"unidad\" id=\"unidad\" list=\"unidades\" size=\"50\"  onchange=\"javascript:this.value=this.value.toUpperCase();\" value=\"$unidad\">";
echo "		<datalist id=\"unidades\">";


			$results=mysql_query("select distinct (unidad) as unidad from obras", $connect);

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



echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<label for=\"inicio\" class=\"spgrey\">Patida</label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<label for=\"inicio\" class=\"spgrey\">Monto De Inversion</label>";
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
echo "		<span class=\"spblue\"><input type=\"text\" name=\"inversion\" required $vale value=\"$monto\"></span>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"center\" colspan=\"3\">";
echo "		<span class=\"spblue\">2016</span>";
echo "		</td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"componentes\" class=\"spgrey\">Componentes:</label></td><td colspan=\"4\" bgcolor=\"$celda\">";

			if($c1==1)
			{
				echo"<input type=\"checkbox\" name=\"c1\"  value=\"1\" checked><span class=\"spgreen\">Dictamen</span><br>";
			}
			else
			{
				echo"<input type=\"checkbox\" name=\"c1\"  value=\"1\"><span class=\"spgreen\">Dictamen</span><br>";
			}

			if($c2==2)
			{
				echo"<input type=\"checkbox\" name=\"c2\" value=\"2\" checked><span class=\"spgreen\">Proyecto Ejecutivo</span><br>";
			}
			else
			{
				echo"<input type=\"checkbox\" name=\"c2\" value=\"2\"><span class=\"spgreen\">Proyecto Ejecutivo</span><br>";
			}

			if($c3==3)
			{
				echo"<input type=\"checkbox\" name=\"c3\" value=\"3\" checked><span class=\"spgreen\">Obra</span><br>";
			}
			else
			{
				echo"<input type=\"checkbox\" name=\"c3\" value=\"3\"><span class=\"spgreen\">Obra</span><br>";
			}

			if($c4==4)
			{
				echo"<input type=\"checkbox\" name=\"c4\" value=\"4\" checked><span class=\"spgreen\">Mantenimiento y/o conservaci&oacute;n</span><br>";
			}
			else
			{
				echo"<input type=\"checkbox\" name=\"c4\" value=\"4\"><span class=\"spgreen\">Mantenimiento y/o conservaci&oacute;n</span><br>";
			}

			if($c5==5)
			{
				echo"<input type=\"checkbox\" name=\"c5\" value=\"5\" checked><span class=\"spgreen\">Equipamiento</span><br>";
			}
			else
			{
				echo"<input type=\"checkbox\" name=\"c5\" value=\"5\"><span class=\"spgreen\">Equipamiento</span><br>";
			}

			if($c6==6)
			{
				echo"<input type=\"checkbox\" name=\"c6\" value=\"6\" checked><span class=\"spgreen\">Otros</span>&nbsp;<input type=\"text\" name=\"otros\" value=\"$componentes\">";
			}
			else
			{
				echo"<input type=\"checkbox\" name=\"c6\" value=\"6\"><span class=\"spgreen\">Otros</span>&nbsp;<input type=\"text\" name=\"otros\" value=\"$componentes\">";
			}

echo "		</td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"problematica\" class=\"spgrey\">Descripcion del concepto:</label></td><td colspan=\"4\" bgcolor=\"$celda\"><textarea rows=\"5\" cols=\"80\" name=\"problematica\">
$problematica</textarea>";
echo "		</td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"objetivo\" class=\"spgrey\">Objetivo:</label></td><td colspan=\"4\" bgcolor=\"$celda\"><textarea rows=\"5\" cols=\"80\" name=\"objetivo\">
$objetivo</textarea>";
echo "		</td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"beneficios\" class=\"spgrey\">Recuperacion de la inversi&oacute;n:</label></td><td colspan=\"4\" bgcolor=\"$celda\"><textarea rows=\"5\" cols=\"80\" name=\"beneficios\">
$beneficios</textarea>";
echo "		</td></tr>";
			
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

echo "<input type=\"button\" value=\"atras\" onclick=\"history.back()\" /> | <input type=\"submit\" value=\"continuar\" />";

echo "</form>";

echo "   	</div>";//cajaareas 
echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor



echo" </body>";
echo" </html>";

?>