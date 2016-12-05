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
echo "    <h2>Plan de Trabajo</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b>Paso 1</b> Registre los datos que se solicitan";
echo "		</p>";

echo "		<div id=\"cajaareas\">";
echo "		<form action=\"plan_1.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";
			
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


$_SESSION['elimina']=$_REQUEST['elimina'];
$elimina=$_SESSION['elimina'];


if (isset($elimina)) {
$_SESSION['id_empel']=$_REQUEST['id_empel'];
$_SESSION['claveel']=$_REQUEST['claveel'];
$_SESSION['conse_plan']=$_REQUEST['conse_plan'];
$id_empel=$_SESSION['id_empel'];
$claveel=$_SESSION['claveel'];
$conse_plan=$_SESSION['conse_plan'];

$sqlEliminar = mysql_query("DELETE FROM plan WHERE id_emp=$id_empel and clave='$claveel' and conse_plan=$conse_plan", $connect) or die(mysql_error());
	if($sqlEliminar)
	{
	echo "<span class=\"spred\">Registro eliminado</span><br>";
	}
	else
	{
	echo "<span class=\"spred\">Error al eliminar el registro!!!</span><br>";
	}	
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
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"tema\" class=\"spgrey\"><b>Tema:</b></label></td><td colspan=\"3\" bgcolor=\"$celda\"><textarea rows=\"3\" cols=\"80\" name=\"tema\">
Escriba una breve descripci&oacute;n...
</textarea>";
echo "		</td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"objetivo\" class=\"spgrey\"><b>Objetivo Particular:</b></label></td><td colspan=\"3\" bgcolor=\"$celda\"><textarea rows=\"3\" cols=\"80\" name=\"objpar\">
Escriba una breve descripci&oacute;n...
</textarea>";
echo "		</td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"tecnica\" class=\"spgrey\"><b>T&eacute;cnica:</b></label></td><td colspan=\"3\" bgcolor=\"$celda\"><textarea rows=\"3\" cols=\"80\" name=\"tecnica\">
Escriba una breve descripci&oacute;n...
</textarea>";
echo "		</td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"material\" class=\"spgrey\"><b>Material:</b></label></td><td colspan=\"3\" bgcolor=\"$celda\"><textarea rows=\"3\" cols=\"80\" name=\"material\">
Escriba una breve descripci&oacute;n...
</textarea>";
echo "		</td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"docente\" class=\"spgrey\"><b>Actividades Docente:</b></label></td><td colspan=\"3\" bgcolor=\"$celda\"><textarea rows=\"3\" cols=\"80\" name=\"docente\">
Escriba una breve descripci&oacute;n...
</textarea>";
echo "		</td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"usuario\" class=\"spgrey\"><b>Actividades Usuario:</b></label></td><td colspan=\"3\" bgcolor=\"$celda\"><textarea rows=\"3\" cols=\"80\" name=\"usuario\">
Escriba una breve descripci&oacute;n...
</textarea>";
echo "		</td></tr>";


echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\"><b>No. de Sesiones:</b></label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
echo "		<input type=\"number\" name=\"sesion\" id=\"sesion\" size=\"10\" required $vale>";
echo "		</td>";

echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\"><b>Horas por sesi&oacute;n:</b></label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"3\">";
echo "		<span class=\"spblue\"><input type=\"number\" id=\"horases\" name=\"horases\" required $vale></span>";
echo "		</td>";
echo "		</tr>";

echo "		</table>";
echo "<br \>";
echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"history.go(-1)\" /> | <input type=\"submit\" value=\"Siguiente\" />";

echo "<br \>";
echo "<br \>";

echo "		<table width=\"90%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "  <tr>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\"><b>Tema</b></th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\"><b>Objetivo Particular</b></th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\"><b>T&eacute;cnica Did&aacute;ctica</b></th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\"><b>Instalaci&oacute;n / material did&aacute;ctico</b></th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\"><b>Act. Docente</b></th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\"><b>Act. Usuario</b></th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\"><b>No. de Sesiones</b></th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\"><b>Hrs. por Sesi&oacute;n</b></th>";
echo "    <th rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=\"spgrey\"><b>Status</b></th>";
echo "  </tr>";


			$resultc=mysql_query("select conse_plan,tema,objpar,tecnica,material,docente,usuario,sesiones,horasxsesion from plan where clave='$clave' and id_emp=$id_emp order by conse_plan", $connect);
								$totalregistros=mysql_num_rows($resultc);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($resultc))
								{
								$conse_plan=$row['conse_plan'];	
								$tema=$row['tema'];
								$objpar=$row['objpar'];
								$tecnica=$row['tecnica'];
								$material=$row['material'];
								$docente=$row['docente'];
								$usuario=$row['usuario'];
								$sesiones=$row['sesiones'];
								$horasxsesion=$row['horasxsesion'];

								if($valcolor==0)
								{$color="spgreen"; $valcolor=1;}
								else
								{$color="spblue"; $valcolor=0;}

								echo "  <tr>";
								echo "    <td rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=$color>$tema</span></td>";
								echo "    <td rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=$color>$objpar</span></td>";
								echo "    <td rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=$color>$tecnica</span></td>";
								echo "    <td rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=$color>$material</span></td>";
								echo "    <td rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=$color>$docente</span></td>";
								echo "    <td rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\"><span class=$color>$usuario</span></td>";
								echo "    <td rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\" align=\"center\"><span class=$color>$sesiones</span></td>";
								echo "    <td rowspan=\"1\" scope=\"col\" bgcolor=\"$celda\" align=\"center\"><span class=$color>$horasxsesion</span></td>";
								echo "    <td bgcolor=\"$celda\" align=\"center\">
										  <span class=$color>
										  <a href=\"plan.php?elimina=SI&&id_empel=$id_emp&&claveel=$clave&&conse_plan=$conse_plan&&id_emp=$id_emp\" title=\"eliminar registro\"><img src=\"tache.png\" width=\"20\"  height=\"20\" /></a>
										   | 
										   <a href=\"editaplan.php?clave=$clave&&id_emp=$id_emp&&conse_plan=$conse_plan\" title=\"editar\"><img src=\"capturando.png\" width=\"20\" height=\"20\" /></a>
										  </span></td>";
								echo "  </tr>";

								}

echo "		</table>";





echo "</form>";

echo "   	</div>";//cajaareas 
echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor



echo" </body>";
echo" </html>";

?>