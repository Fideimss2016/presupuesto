<?php
include "valida_seguridad.php";
include "clases/variablesbd.php";

include "datepickBasic.html";
include "funcion_fecha.php";
include "generameses.php";

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
$usu=$_SESSION["usu"];

$clave_act=$_SESSION["clave_act"];
$clave_par=$_SESSION["clave_par"];
$id_conse_egresos=$_SESSION["id_conse_egresos"];

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
if ($_POST["enero"]){$_SESSION['enero']=$_REQUEST['enero']; $enero=$_SESSION["enero"];} else{$_SESSION['enero']=0;}
if ($_POST["febrero"]){$_SESSION['febrero']=$_REQUEST['febrero']; $febrero=$_SESSION["febrero"];} else{$_SESSION['febrero']=0;}
if ($_POST["marzo"]){$_SESSION['marzo']=$_REQUEST['marzo']; $marzo=$_SESSION["marzo"];} else{$_SESSION['marzo']=0;}
if ($_POST["abril"]){$_SESSION['abril']=$_REQUEST['abril']; $abril=$_SESSION["abril"];} else{$_SESSION['abril']=0;}
if ($_POST["mayo"]){$_SESSION['mayo']=$_REQUEST['mayo']; $mayo=$_SESSION["mayo"];} else{$_SESSION['mayo']=0;}
if ($_POST["junio"]){$_SESSION['junio']=$_REQUEST['junio']; $junio=$_SESSION["junio"];} else{$_SESSION['junio']=0;}
if ($_POST["julio"]){$_SESSION['julio']=$_REQUEST['julio']; $julio=$_SESSION["julio"];} else{$_SESSION['julio']=0;}
if ($_POST["agosto"]){$_SESSION['agosto']=$_REQUEST['agosto']; $agosto=$_SESSION["agosto"];} else{$_SESSION['agosto']=0;}
if ($_POST["septiembre"]){$_SESSION['septiembre']=$_REQUEST['septiembre']; $septiembre=$_SESSION["septiembre"];} else{$_SESSION['septiembre']=0;}
if ($_POST["octubre"]){$_SESSION['octubre']=$_REQUEST['octubre']; $octubre=$_SESSION["octubre"];} else{$_SESSION['octubre']=0;}
if ($_POST["noviembre"]){$_SESSION['noviembre']=$_REQUEST['noviembre']; $noviembre=$_SESSION["noviembre"];} else{$_SESSION['noviembre']=0;}
if ($_POST["diciembre"]){$_SESSION['diciembre']=$_REQUEST['diciembre']; $diciembre=$_SESSION["diciembre"];} else{$_SESSION['diciembre']=0;}

$tabla="#666";
$celda="#1a1a1a";
$celda1="#666";

echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
echo "    <h3>Captura de Egresos del Presupuesto 2017</h3>";
echo "    <h2>Registro de Actividades</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b>Paso 4</b> Confirme datos";
echo "		</p>";

echo "		<div id=\"cajaareas\">";
echo "		<form action=\"egresos.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";

			$result=mysql_query("select desc_uops, desc_del, id_cuota from cat_delegaciones where clave='$clave'", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$desc_uops=$row['desc_uops'];
								$desc_del=$row['desc_del'];
								$id_cuota=$row['id_cuota'];
								}


			$result=mysql_query("select zona, cuota_der, cuota_noder from cuotas_i where id_cuota=$id_cuota", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$zona=$row['zona'];
								$cuota_der=$row['cuota_der'];
								$cuota_noder=$row['cuota_noder'];
								}



echo "		<label for=\"uopsi\">Unidad Operativa: <b>$desc_uops</b></label><br><br>";

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
echo "		</tr>";


echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"inicio\" class=\"spgrey\">Inicio: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"spblue\">01-01-2017</span>";
echo "		</td>";

echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"termino\" class=\"spgrey\">Termino: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"spblue\">31-12-2017</span>";
echo "		</td>";
echo "		</tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"horas\" class=\"spgrey\">Origen del gasto: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\"><span class=\"spblue\">$origen_del_gasto</span>";
echo "		</td>";

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
echo "</table>";
echo "<br \>";

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
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">C/U Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">Total Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">C/U Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">Total Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">C/U Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">Total Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">C/U Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">Total Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">C/U Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">Total Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">C/U Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">Total Mensual</span></th>";
echo "   </tr>";
$tenero=$enero;
$tfebrero=$febrero;
$tmarzo=$marzo;
$tabril=$abril;
$tmayo=$mayo;
$tjunio=$junio;
$tjulio=$julio;
$tagosto=$agosto;
$tseptiembre=$septiembre;
$toctubre=$octubre;
$tnoviembre=$noviembre;
$tdiciembre=$diciembre;
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($enero,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tenero,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($febrero,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tfebrero,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($marzo,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tmarzo,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($abril,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tabril,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($mayo,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tmayo,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($junio,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tjunio,2) . "</span></td>";
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
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">C/U Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">Total Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">C/U Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">Total Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">C/U Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">Total Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">C/U Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">Total Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">C/U Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">Total Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">C/U Mensual</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda\" scope=\"col\"><span class=\"spgreen\">Total Mensual</span></th>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($julio,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tjulio,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($agosto,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tagosto,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($septiembre,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tseptiembre,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($octubre,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($toctubre,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($noviembre,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tnoviembre,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($diciembre,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tdiciembre,2) . "</span></td>";
echo "   </tr>";
echo " </table>";

$gtotal=$tenero+$tfebrero+$tmarzo+$tabril+$tmayo+$tjunio+$tjulio+$tagosto+$tseptiembre+$toctubre+$tnoviembre+$tdiciembre;
 /*FIN SEGUNDO SEMESTRE*/
 echo "<br \>";
 /*RESUMEN*/
echo " <table width=\"30%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "   <tr>";
echo "     <th colspan=\"1\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Total de gasto</span></th>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($gtotal,2) . "</span></td>";
echo "   </tr>";
echo " </table>";


			$result=mysql_query("select max(id_conse_egresos) as consecueg from egresos where clave='$clave'", $connect);
			$totalregistros=mysql_num_rows($result);
			while($row=mysql_fetch_array($result))
			{
			$consecueg=$row['consecueg'];
			}
			$consec=$consecueg+1;
			$clave_del= substr($clave,0,2);
			$clave_uops= substr($clave,2,3);
			$feccaptura= date("Y-m-d H:s");
			$inicio1=date("Y-m-d",strtotime($inicio));
			$termino1=date("Y-m-d",strtotime($termino));
			$anio= substr($inicio1,0,4);
			$id_par=substr($clave_par,0,2);

/*inserta registro*/
					$cunitario=($gtotal/$cantidad);

$sqlUpdate = mysql_query("UPDATE egresos SET origen_del_gasto='$origen_del_gasto',cantidad=$cantidad,unidad='$unidad',
											enero=$enero,febrero=$febrero,marzo=$marzo,abril=$abril,mayo=$mayo,junio=$junio,
											julio=$julio,agosto=$agosto,septiembre=$septiembre,octubre=$octubre,noviembre=$noviembre,diciembre=$diciembre,
											total_gasto=$gtotal,cunitario=$cunitario
							  	 WHERE clave='$clave' and id_conse_egresos=$id_conse_egresos", $connect) or die(mysql_error());




						if($sqlUpdate){echo "<span class=\"spblue\">El registro se ha modificado satisfactoriamente!!!</span>";}
						else{echo "<span class=\"spred\">Error en la modificacion del registro!!!</span>";}

/*termina inserta registro*/

echo "<br \>";

echo "<input type=\"submit\" value=\"Regresar\" />";

echo "</form>";

echo "   	</div>";//cajaareas
echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor



echo" </body>";
echo" </html>";

?>