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
$conse_act=$_SESSION["conse_act"];
$conse_partida=$_SESSION["conse_partida"];
$inicio=$_SESSION["inicio"];
$termino=$_SESSION["termino"];
$origen_del_gasto=$_SESSION["origen_del_gasto"];
$cantidad=$_SESSION["cantidad"];
$unidad=$_SESSION["unidad"];
$usu=$_SESSION["usu"];


$enero=$_SESSION['enero'];
$febrero=$_SESSION['febrero'];
$marzo=$_SESSION['marzo'];
$abril=$_SESSION['abril'];
$mayo=$_SESSION['mayo'];
$junio=$_SESSION['junio'];
$julio=$_SESSION['julio'];
$agosto=$_SESSION['agosto'];
$septiembre=$_SESSION['septiembre'];
$octubre=$_SESSION['octubre'];
$noviembre=$_SESSION['noviembre'];
$diciembre=$_SESSION['diciembre'];

$conse=$_SESSION['conse'];



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
					$cunitario=($gtotal/12)/$cantidad;
					$resultado = mysql_query("INSERT INTO egresos (id_conse_egresos,conse_act,clave_act,clave,clave_del,clave_uops,clave_par,id_par,origen_del_gasto,cantidad,unidad,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total_gasto,cunitario,anio_fise,fecha_cap,id_usuario,vobo,observaciones,status) 
					VALUES ($consec,$conse_act,'$clave_act','$clave','$clave_del','$clave_uops','$clave_par','$id_par','$origen_del_gasto',$cantidad,'$unidad',$tenero,$tfebrero,$tmarzo,$tabril,$tmayo,$tjunio,$tjulio,$tagosto,$tseptiembre,$toctubre,$tnoviembre,$tdiciembre,$gtotal,$cunitario,'$anio','$feccaptura','$usu',0,0,0)", $connect);

/*termina inserta registro*/

/*
echo "INSERT INTO egresos (id_conse_egresos,conse_act,clave_act,clave,clave_del,clave_uops,clave_par,origen_del_gasto,cantidad,unidad,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total_gasto,anio_fise,fecha_cap,id_usuario,vobo,observaciones) 
					VALUES ($consec,$conse_act,'$clave_act','$clave','$clave_del','$clave_uops','$clave_par','$origen_del_gasto',$cantidad,'$unidad',$enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre,$gtotal,'$anio','$feccaptura','$usu',0,0)";
*/
			
					
						if($resultado){echo "<span class=\"spblue\">El gasto se ha registrado satisfactoriamente!!!</span>";}
						else{echo "<span class=\"spred\">Error en el registro de la actividad!!!</span>";}
echo "<br \>";

echo "<input type=\"submit\" value=\"Capturar otro gasto\" />";

echo "</form>";

echo "   	</div>";//cajaareas 
echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor



echo" </body>";
echo" </html>";

?>