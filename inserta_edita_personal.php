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
$conse_act=$_SESSION["conse_act"];
$conse_partida=$_SESSION["conse_partida"];
$conse_categoria=$_SESSION["conse_categoria"];
$usu=$_SESSION["usu"];


$_SESSION['presentacion']=$_REQUEST['presentacion'];
$_SESSION['objetivo']=$_REQUEST['objetivo'];
$_SESSION['ambito']=$_REQUEST['ambito'];
$_SESSION['nombre']=$_REQUEST['nombre'];
$_SESSION['ape_pat']=$_REQUEST['ape_pat'];
$_SESSION['ape_mat']=$_REQUEST['ape_mat'];
$presentacion=$_SESSION["presentacion"];
$objetivo=$_SESSION["objetivo"];
$ambito=$_SESSION["ambito"];
$nombre=$_SESSION["nombre"];
$ape_pat=$_SESSION["ape_pat"];
$ape_mat=$_SESSION["ape_mat"];
$desc_categoria=$_SESSION["desc_categoria"];
$honorarios=$_SESSION["honorarios"];
$subtotal=$_SESSION["subtotal"];

if ($_POST["m1"]){$_SESSION['m1']=$_REQUEST['m1']; $m1=$_SESSION["m1"];} else{$m1=0;}
if ($_POST["m2"]){$_SESSION['m2']=$_REQUEST['m2']; $m2=$_SESSION["m2"];} else{$m2=0;}
if ($_POST["m3"]){$_SESSION['m3']=$_REQUEST['m3']; $m3=$_SESSION["m3"];} else{$m3=0;}
if ($_POST["m4"]){$_SESSION['m4']=$_REQUEST['m4']; $m4=$_SESSION["m4"];} else{$m4=0;}
if ($_POST["m5"]){$_SESSION['m5']=$_REQUEST['m5']; $m5=$_SESSION["m5"];} else{$m5=0;}
if ($_POST["m6"]){$_SESSION['m6']=$_REQUEST['m6']; $m6=$_SESSION["m6"];} else{$m6=0;}
if ($_POST["m7"]){$_SESSION['m7']=$_REQUEST['m7']; $m7=$_SESSION["m7"];} else{$m7=0;}
if ($_POST["m8"]){$_SESSION['m8']=$_REQUEST['m8']; $m8=$_SESSION["m8"];} else{$m8=0;}
if ($_POST["m9"]){$_SESSION['m9']=$_REQUEST['m9']; $m9=$_SESSION["m9"];} else{$m9=0;}
if ($_POST["m10"]){$_SESSION['m10']=$_REQUEST['m10']; $m10=$_SESSION["m10"];} else{$m10=0;}
if ($_POST["m11"]){$_SESSION['m11']=$_REQUEST['m11']; $m11=$_SESSION["m11"];} else{$m11=0;}
if ($_POST["m12"]){$_SESSION['m12']=$_REQUEST['m12']; $m12=$_SESSION["m12"];} else{$m12=0;}

$meses=$m1+$m2+$m3+$m4+$m5+$m6+$m7+$m8+$m9+$m10+$m11+$m12;

$vale= "onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\"";

$celda="#1a1a1a";
$tabla="#666";

echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
echo "    <h3>Captura de Personal del Presupuesto 2017</h3>";
echo "    <h2>Registro de Personal</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b>Paso 3</b> Registro de Personal";
echo "		</p>";

echo "		<div id=\"cajaareas\">";
echo "		<form action=\"personal.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";

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
echo "		<span class=\"spgreen\">&nbsp;$desc_categoria</span></td>";
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
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
echo "		<span class=\"spblue\"><input type=\"text\" id=\"popupDatepickers\" name=\"termino\" value=\"31-12-2017\" required></span>";
echo "		</td>";

echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"termino\" class=\"spgrey\">Honorarios: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
echo "		<span class=\"spblue\"> &nbsp;" . number_format($subtotal,2) . "</span>";
echo "		</td>";

echo "		</tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\">Nombre: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
echo "		<span class=\"spblue\"> &nbsp;$nombre</span>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\">Apellido paterno: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
echo "		<span class=\"spblue\"> &nbsp;$ape_pat</span>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\">Apellido materno: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
echo "		<span class=\"spblue\"> &nbsp;$ape_mat</span>";
echo "		</td>";
echo "		</tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"presentacion\" class=\"spgrey\">Presentaci&oacute;n:</label></td><td colspan=\"5\" bgcolor=\"$celda\"><span class=\"spgreen\"> &nbsp;$presentacion</span>";
echo "		</td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"objetivo\" class=\"spgrey\">Objetivo General:</label></td><td colspan=\"5\" bgcolor=\"$celda\"><span class=\"spblue\">&nbsp;$objetivo</span>";
echo "		</td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"ambito\" class=\"spgrey\">&Aacute;mbito de Aplicaci&oacute;n:</label></td><td colspan=\"5\" bgcolor=\"$celda\"><span class=\"spgreen\">&nbsp;$ambito</span>";
echo "		</td></tr>";

echo "</table>";
echo "<br \>";

			$gas_anual=$meses*$subtotal;
			$sqlUpdate = mysql_query("UPDATE personal SET nombre='$nombre',ape_pat='$ape_pat',ape_mat='$ape_mat',presentacion='$presentacion',objetivo_gral='$objetivo',aplicacion='$ambito',
											 meses=$meses,ene=$m1,feb=$m2,mar=$m3,abr=$m4,may=$m5,jun=$m6,jul=$m7,ago=$m8,sep=$m9,oct=$m10,nov=$m11,dic=$m12,gas_anual=$gas_anual
							  	 WHERE clave='$clave' and id_emp=$id_emp", $connect) or die(mysql_error());




						if($sqlUpdate){echo "<span class=\"spblue\">El registro se ha modificado satisfactoriamente!!!</span>";}
						else{echo "<span class=\"spred\">Error en la modificacion del registro!!!</span>";}

echo "<br \>";
echo "<input type=\"submit\" value=\"Regresar\" />";

echo "</form>";

echo "   	</div>";//cajaareas
echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor



echo" </body>";
echo" </html>";

?>