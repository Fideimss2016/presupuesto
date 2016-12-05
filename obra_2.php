<?php
include "valida_seguridad.php";
include "clases/variablesbd.php";

include "datepickBasic.html";
include "funcion_fecha.php";
include "generameseso.php";


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
$id_proyecto=$_SESSION["id_proyecto"];
$conse_partida=$_SESSION["conse_partida"];
$conse_act=$_SESSION["conse_act"];


$_SESSION['inversion']=$_REQUEST['inversion'];
$_SESSION['problematica']=$_REQUEST['problematica'];
$_SESSION['objetivo']=$_REQUEST['objetivo'];
$_SESSION['beneficios']=$_REQUEST['beneficios'];

$inversion=$_SESSION["inversion"];
$problematica=$_SESSION["problematica"];
$objetivo=$_SESSION["objetivo"];
$beneficios=$_SESSION["beneficios"];

$_SESSION['inicio']=$_REQUEST['inicio'];
$_SESSION['termino']=$_REQUEST['termino'];
$_SESSION['origen_del_gasto']=$_REQUEST['origen_del_gasto'];
$_SESSION['cantidad']=$_REQUEST['cantidad'];
$_SESSION['unidad']=$_REQUEST['unidad'];

$inicio=$_SESSION["inicio"];
$termino=$_SESSION["termino"];
$origen_del_gasto=$_SESSION["origen_del_gasto"];
$cantidad=$_SESSION["cantidad"];
$unidad=$_SESSION["unidad"];

if ($_POST["c1"]){$_SESSION['c1']=$_REQUEST['c1']; $c1=$_SESSION["c1"];} else{$_SESSION['c1']=0;}
if ($_POST["c2"]){$_SESSION['c2']=$_REQUEST['c2']; $c2=$_SESSION["c2"];} else{$_SESSION['c2']=0;}
if ($_POST["c3"]){$_SESSION['c3']=$_REQUEST['c3']; $c3=$_SESSION["c3"];} else{$_SESSION['c3']=0;}
if ($_POST["c4"]){$_SESSION['c4']=$_REQUEST['c4']; $c4=$_SESSION["c4"];} else{$_SESSION['c4']=0;}
if ($_POST["c5"]){$_SESSION['c5']=$_REQUEST['c5']; $c5=$_SESSION["c5"];} else{$_SESSION['c5']=0;}
if ($_POST["c6"]){$_SESSION['c6']=$_REQUEST['c6']; $c6=$_SESSION["c6"];} else{$_SESSION['c6']=0;}
if ($_POST["otros"]){$_SESSION['otros']=$_REQUEST['otros']; $otros=$_SESSION["otros"];} else{$_SESSION['otros']=0;}

$tabla="#666";
$celda="#1a1a1a";
$celda1="#666";

echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
echo "    <h3>Captura de Obra y Equipamiento Deportivo del Presupuesto 2017</h3>";
echo "    <h2>Registro de Gastos</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b>Paso 3</b> Confirme datos";
echo "		</p>";

echo "		<div id=\"cajaareas\">";
echo "		<form action=\"obra_3.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";

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

echo "		<span class=\"spgreen\">&nbsp;$desc_proyecto</span></td>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"tipo_curso\" class=\"spgrey\">Actividad:</label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
	
			$resultn=mysql_query("select clave_act, actividad from cat_actividades_i where conse_act=$conse_act", $connect);

								$totalregistros=mysql_num_rows($resultn);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($resultn))
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
echo "		<span class=\"spblue\">01-01-2014</span>";
echo "		</td>";

echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"termino\" class=\"spgrey\">Termino: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"spblue\">31-12-2014</span>";
echo "		</td>";
echo "		</tr>";

/*
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\">Origen del gasto: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\"><span class=\"spblue\">$origen_del_gasto</span>";
echo "		</td>";
*/

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\">Cantidad solo numero: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"3\">";
echo "		<span class=\"spblue\">$cantidad</span>";
echo "		</td>";
echo "		</tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\">Unidad: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\"><span class=\"spblue\">$unidad</span>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"right\" colspan=\"2\">&nbsp;";
echo "		</td>";
echo "		</tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<label for=\"inicio\" class=\"spgrey\">Patida</label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"center\" colspan=\"2\">";
echo "		<label for=\"inicio\" class=\"spgrey\">Monto De Inversion con IVA</label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<label for=\"inicio\" class=\"spgrey\">Ejercicio Fiscal</label>";
echo "		</td>";
echo "		</tr>";

			//$hoy= date("Y-m-d H:s");
			//$anioo= substr($hoy,0,4);
echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<span class=\"spblue\">$clave_par</span>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"center\" colspan=\"2\">";
echo "		<span class=\"spblue\"> " . number_format($inversion,2) . "</span>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<span class=\"spblue\">2017</span>";
echo "		</td></tr>";

echo "		<tr>";
echo "	<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"objetivo\" class=\"spgrey\">Componentes:</label></td><td colspan=\"3\" bgcolor=\"$celda\">";

		if($c1!=0)
		{
		echo "<input type=\"checkbox\" name=\"c1\" checked disabled><span class=\"spgreen\">Mantenimiento de Equipo Deportivo</span><br>";
		}
		if($c2!=0)
		{
		echo "<input type=\"checkbox\" name=\"c2\" checked disabled><span class=\"spgreen\">Proyecto Ejecutivo</span><br>";
		}
		if($c3!=0)
		{
		echo "<input type=\"checkbox\" name=\"c3\" checked disabled><span class=\"spgreen\">Obra</span><br>";
		}
		if($c4!=0)
		{
		echo "<input type=\"checkbox\" name=\"c4\" checked disabled><span class=\"spgreen\">Mantenimiento de Areas Deportivas</span><br>";
		}
		if($c5!=0)
		{
		echo "<input type=\"checkbox\" name=\"c5\" checked disabled><span class=\"spgreen\">Adquisicion de Equipo Deportivo</span><br>";
		}
		if($c6!=0)
		{
		echo "<input type=\"checkbox\" name=\"6\" checked disabled><span class=\"spgreen\">Otros </span>&nbsp;&nbsp;&nbsp;<span class=\"spgrey\">($otros)</span>";
		}

echo "		</td></tr>";


echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"problematica\" class=\"spgrey\">Descripcion del concepto:</label></td>
		<td colspan=\"3\" bgcolor=\"$celda\"><span class=\"spblue\">$problematica</span>";
echo "		</td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"objetivo\" class=\"spgrey\">Beneficios esperados:</label></td>
		<td colspan=\"3\" bgcolor=\"$celda\"><span class=\"spblue\">$objetivo</span>";
echo "		</td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"beneficios\" class=\"spgrey\">Recuperacion de la inversi&oacute;n:</label></td>
		<td colspan=\"3\" bgcolor=\"$celda\"><span class=\"spblue\">$beneficios</span>";
echo "		</td></tr>";

echo "</table>";
echo "<br \>";

echo "<br \>";

echo "		<p class=\"spwhite\">";
echo "		capture el gasto de la inversi&oacute;n en el transcurso del a&ntilde;o ya sea en parcialidades o completo";
echo "		</p>";

$mes= substr($inicio,3,2);
$mes1= substr($termino,3,2);

$tablas = Meses($mes,$mes1);

echo $tablas; 

/*
echo "		<p class=\"spwhite\">";
echo "		Si la informacion es correcta proceda a guardar el registro!";
echo "		</p>";
*/
 
 /*FIN RESUMEN*/

echo "<br \>";

echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"history.back()\" /> | <input type=\"submit\" value=\"Continuar\" />";

echo "</form>";

echo "   	</div>";//cajaareas
echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor



echo" </body>";
echo" </html>";

?>