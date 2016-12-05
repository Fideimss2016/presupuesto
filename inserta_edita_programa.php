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
$id_emp=$_SESSION["id_emp"];
$usu=$_SESSION["usu"];
$id_conse_programa=$_SESSION["id_conse_programa"];

$_SESSION['mes']=$_REQUEST['mes'];
$_SESSION['semana']=$_REQUEST['semana'];
$_SESSION['principiantes']=$_REQUEST['principiantes'];
$_SESSION['intermedios']=$_REQUEST['intermedios'];
$_SESSION['avanzados']=$_REQUEST['avanzados'];
$_SESSION['observaciones']=$_REQUEST['observaciones'];

$mes=$_SESSION["mes"];
$semana=$_SESSION["semana"];
$principiantes=$_SESSION["principiantes"];
$intermedios=$_SESSION["intermedios"];
$avanzados=$_SESSION["avanzados"];
$observaciones=$_SESSION["observaciones"];


$vale= "onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\"";

$celda="#1a1a1a";
$tabla="#666";

echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
echo "    <h3>Captura de Personal del Presupuesto 2017</h3>";
echo "    <h2>Programa de Trabajo</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b>Paso 1</b> Registre los datos que se solicitan";
echo "		</p>";

echo "		<div id=\"cajaareas\">";
echo "		<form action=\"programa_1.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";

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


if($mes==1){$desc_mes="Enero";}
if($mes==2){$desc_mes="Febrero";}
if($mes==3){$desc_mes="Marzo";}
if($mes==4){$desc_mes="Abril";}
if($mes==5){$desc_mes="Mayo";}
if($mes==6){$desc_mes="Junio";}
if($mes==7){$desc_mes="Julio";}
if($mes==8){$desc_mes="Agosto";}
if($mes==9){$desc_mes="Septiembre";}
if($mes==10){$desc_mes="Octubre";}
if($mes==11){$desc_mes="Noviembre";}
if($mes==12){$desc_mes="Diciembre";}




echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"tema\" class=\"spgrey\">Mes:</label></td>
			<td colspan=\"3\" bgcolor=\"$celda\"><span class=\"spgreen\">&nbsp;$desc_mes</span>";
echo "		</td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"objetivo\" class=\"spgrey\"><b>Semana:</b></label></td>
			<td colspan=\"3\" bgcolor=\"$celda\"><span class=\"spblue\">&nbsp;$semana</span></td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"tecnica\" class=\"spgrey\"><b>Actividad principiantes:</b></label></td>
			<td colspan=\"3\" bgcolor=\"$celda\"><span class=\"spgreen\">&nbsp;$principiantes</span></td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"material\" class=\"spgrey\"><b>Actividad intermedios:</b></label></td>
			<td colspan=\"3\" bgcolor=\"$celda\"><span class=\"spblue\">&nbsp;$intermedios</span></td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"docente\" class=\"spgrey\"><b>Actividad avanzados:</b></label></td>
			<td colspan=\"3\" bgcolor=\"$celda\"><span class=\"spgreen\">&nbsp;$avanzados</span></td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"usuario\" class=\"spgrey\"><b>Observaciones:</b></label></td>
			<td colspan=\"3\" bgcolor=\"$celda\"><span class=\"spblue\">&nbsp;$observaciones</span></td></tr>";

echo "		</table>";

echo "<br \>";
echo "<br \>";

		$sqlUpdate = mysql_query("UPDATE programa SET mes='$mes',semanas='$semana',principiantes='$principiantes',intermedios='$intermedios',
								 avanzados='$avanzados',observaciones='$observaciones'
							  	 WHERE clave='$clave' and id_emp=$id_emp and id_conse_programa=$id_conse_programa", $connect) or die(mysql_error());

						if($sqlUpdate){echo "<span class=\"spblue\">El programa se ha editado correctamente!!!</span>";}
						else{echo "<span class=\"spred\">Error en el registro del programa!!!</span>";}

						echo "		<br>";
								 echo "<a href=\"programa.php?id_emp=$id_emp&&clave=$clave\">Regresar</a>";


echo "</form>";

echo "   	</div>";//cajaareas
echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor



echo" </body>";
echo" </html>";

?>