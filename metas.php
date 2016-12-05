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

$_SESSION['id_emp']=$_REQUEST['id_emp'];
$id_emp=$_SESSION["id_emp"];

$vale= "onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\"";

$celda="#1a1a1a";
$tabla="#666";

echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
echo "    <h3>Captura de Personal del Presupuesto 2017</h3>";
echo "    <h2>Registro de Metas</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b>Paso 1</b> Registre los datos que se solicitan";
echo "		</p>";

echo "		<div id=\"cajaareas\">";
echo "		<form action=\"metas_1.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";
			
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

			$resultp=mysql_query("select nombre,ape_pat,ape_mat,clave_act,clave_par,conse_categoria,ene,feb,mar,abr,may,jun,jul,ago,sep,oct,nov,dic from personal where clave='$clave' and id_emp=$id_emp", $connect);

								$totalregistros=mysql_num_rows($resultp);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($resultp))
								{
								$nombre=$row['nombre'];
								$ape_pat=$row['ape_pat'];
								$ape_mat=$row['ape_mat'];
								$clave_act=$row['clave_act'];
								$clave_par=$row['clave_par'];
								$conse_categoria=$row['conse_categoria'];
								$ene=$row['ene'];
								$feb=$row['feb'];
								$mar=$row['mar'];
								$abr=$row['abr'];
								$may=$row['may'];
								$jun=$row['jun'];
								$jul=$row['jul'];
								$ago=$row['ago'];
								$sep=$row['sep'];
								$oct=$row['oct'];
								$nov=$row['nov'];
								$dic=$row['dic'];
								}



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

echo "		<span class=\"spgreen\">&nbsp;$clave_act $actividad</span></td>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"tipo_curso\" class=\"spgrey\">Categor&iacute;a:</label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
	
			$result=mysql_query("select desc_categoria, subtotal from cat_categoria where conse_categoria=$conse_categoria", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$desc_categoria=$row['desc_categoria'];
								$subtotal=$row['subtotal'];
								}
								$_SESSION["desc_categoria"]=$desc_categoria;
								$_SESSION["subtotal"]=$subtotal;

echo "		<span class=\"spgreen\">&nbsp;$desc_categoria</span></td>";

echo "		</tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"inicio\" class=\"spgrey\">Instructor: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"spblue\">$nombre $ape_pat $ape_mat</span>";
echo "		</td>";

echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"termino\" class=\"spgrey\">Honorarios: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"3\">";
echo "		<span class=\"spblue\"> &nbsp;" . number_format($subtotal,2) . "</span>";
echo "		</td>";
echo "		</tr>";

echo "</table>";
echo "<br \>";
echo "		<table width=\"90%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<label for=\"actividades\" class=\"spgrey\"><b>Mes</b></label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<label for=\"actividades\" class=\"spgrey\"><b>Horas por mes</b></label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<label for=\"actividades\" class=\"spgrey\"><b>Derechohabientes</b></label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<label for=\"actividades\" class=\"spgrey\"><b>No Derechohabientes</b></label>";
echo "		</td>";
echo "		</tr>";

if($ene==1){$enero=$subtotal;
echo "		<tr><td bgcolor=\"$celda\" align=\"center\"><label for=\"actividades\" class=\"spwhite\">Enero</label></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"h1\" id=\"h1\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"dh1\" id=\"dh1\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"ndh1\" id=\"ndh1\" size=\"10\" required $vale></td></tr>";}else{}

if($feb==1){$febrero=$subtotal;
echo "		<tr><td bgcolor=\"$celda\" align=\"center\"><label for=\"actividades\" class=\"spwhite\">Febrero</label></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"h2\" id=\"h2\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"dh2\" id=\"dh2\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"ndh2\" id=\"ndh2\" size=\"10\" required $vale></td></tr>";}else{}

if($mar==1){$marzo=$subtotal;
echo "		<tr><td bgcolor=\"$celda\" align=\"center\"><label for=\"actividades\" class=\"spwhite\">Marzo</label></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"h3\" id=\"h3\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"dh3\" id=\"dh3\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"ndh3\" id=\"ndh3\" size=\"10\" required $vale></td></tr>";}else{}

if($abr==1){$abril=$subtotal;
echo "		<tr><td bgcolor=\"$celda\" align=\"center\"><label for=\"actividades\" class=\"spwhite\">Abril</label></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"h4\" id=\"h4\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"dh4\" id=\"dh4\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"ndh4\" id=\"ndh4\" size=\"10\" required $vale></td></tr>";}else{}

if($may==1){$mayo=$subtotal;
echo "		<tr><td bgcolor=\"$celda\" align=\"center\"><label for=\"actividades\" class=\"spwhite\">Mayo</label></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"h5\" id=\"h5\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"dh5\" id=\"dh5\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"ndh5\" id=\"ndh5\" size=\"10\" required $vale></td></tr>";}else{}

if($jun==1){$junio=$subtotal;
echo "		<tr><td bgcolor=\"$celda\" align=\"center\"><label for=\"actividades\" class=\"spwhite\">Junio</label></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"h6\" id=\"h6\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"dh6\" id=\"dh6\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"ndh6\" id=\"ndh6\" size=\"10\" required $vale></td></tr>";}else{}

if($jul==1){$julio=$subtotal;
echo "		<tr><td bgcolor=\"$celda\" align=\"center\"><label for=\"actividades\" class=\"spwhite\">Julio</label></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"h7\" id=\"h7\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"dh7\" id=\"dh7\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"ndh7\" id=\"ndh7\" size=\"10\" required $vale></td></tr>";}else{}

if($ago==1){$agosto=$subtotal;
echo "		<tr><td bgcolor=\"$celda\" align=\"center\"><label for=\"actividades\" class=\"spwhite\">Agosto</label></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"h8\" id=\"h8\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"dh8\" id=\"dh8\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"ndh8\" id=\"ndh8\" size=\"10\" required $vale></td></tr>";}else{}

if($sep==1){$septiembre=$subtotal;
echo "		<tr><td bgcolor=\"$celda\" align=\"center\"><label for=\"actividades\" class=\"spwhite\">Septiembre</label></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"h9\" id=\"h9\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"dh9\" id=\"dh9\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"ndh9\" id=\"ndh9\" size=\"10\" required $vale></td></tr>";}else{}

if($oct==1){$octubre=$subtotal;
echo "		<tr><td bgcolor=\"$celda\" align=\"center\"><label for=\"actividades\" class=\"spwhite\">Octubre</label></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"h10\" id=\"h10\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"dh10\" id=\"dh10\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"ndh10\" id=\"ndh10\" size=\"10\" required $vale></td></tr>";}else{}

if($nov==1){$noviembre=$subtotal;
echo "		<tr><td bgcolor=\"$celda\" align=\"center\"><label for=\"actividades\" class=\"spwhite\">Noviembre</label></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"h11\" id=\"h11\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"dh11\" id=\"dh11\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"ndh11\" id=\"ndh11\" size=\"10\" required $vale></td></tr>";}else{}

if($dic==1){$diciembre=$subtotal;
echo "		<tr><td bgcolor=\"$celda\" align=\"center\"><label for=\"actividades\" class=\"spwhite\">Diciembre</label></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"h12\" id=\"h12\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"dh12\" id=\"dh12\" size=\"10\" required $vale></td><td bgcolor=\"$celda\" align=\"center\"><input type=\"text\" name=\"ndh12\" id=\"ndh12\" size=\"10\" required $vale></td></tr>";}else{}


echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"objetivo\" class=\"spgrey\">Estrategias:</label></td><td colspan=\"3\" bgcolor=\"$celda\"><textarea rows=\"5\" cols=\"80\" name=\"estrategias\">
Escriba una breve descripci&oacute;n...
</textarea>";
echo "		</td></tr>";



echo "		</table>";
echo "<br \>";
echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"history.go(-1)\" /> | <input type=\"submit\" value=\"Siguiente\" />";

echo "</form>";

echo "   	</div>";//cajaareas 
echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor



echo" </body>";
echo" </html>";

?>