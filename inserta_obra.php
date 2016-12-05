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
$id_proyecto=$_SESSION["id_proyecto"];
$conse_partida=$_SESSION["conse_partida"];
$conse_act=$_SESSION["conse_act"];
$inversion=$_SESSION["inversion"];
$problematica=$_SESSION["problematica"];
$objetivo=$_SESSION["objetivo"];
$beneficios=$_SESSION["beneficios"];
$inicio=$_SESSION["inicio"];
$termino=$_SESSION["termino"];
$origen_del_gasto=$_SESSION["origen_del_gasto"];
$cantidad=$_SESSION["cantidad"];
$unidad=$_SESSION["unidad"];

$c1=$_SESSION["c1"];
$c2=$_SESSION["c2"];
$c3=$_SESSION["c3"];
$c4=$_SESSION["c4"];
$c5=$_SESSION["c5"];
$c6=$_SESSION["c6"];
$otros=$_SESSION["otros"];
$enero=$_SESSION["enero"];
$febrero=$_SESSION["febrero"];
$marzo=$_SESSION["marzo"];
$abril=$_SESSION["abril"];
$mayo=$_SESSION["mayo"];
$junio=$_SESSION["junio"];
$julio=$_SESSION["julio"];
$agosto=$_SESSION["agosto"];
$septiembre=$_SESSION["septiembre"];
$octubre=$_SESSION["octubre"];
$noviembre=$_SESSION["noviembre"];
$diciembre=$_SESSION["diciembre"];


$tabla="#666666";
$celda="#1a1a1a";
$celda1="#666666";

echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
echo "    <h3>Captura de Egresos del Presupuesto 2017</h3>";
echo "    <h2>Registro de Actividades</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b>Paso 4</b> Confirme datos";
echo "		</p>";

echo "		<div id=\"cajaareas\">";
echo "		<form action=\"obra.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";
			
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
echo "		<span class=\"spblue\">01-01-2017</span>";
echo "		</td>";

echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"termino\" class=\"spgrey\">Termino: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"spblue\">31-12-2017</span>";
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
echo "		<span class=\"spblue\">215</span>";
echo "		</td>";

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
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"problematica\" class=\"spgrey\">Descripcion del concepto::</label></td>
		<td colspan=\"3\" bgcolor=\"$celda\"><span class=\"spblue\">$problematica</span>";
echo "		</td></tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"objetivo\" class=\"spgrey\">Beneficios esperados:</label></td>
		<td colspan=\"3\" bgcolor=\"$celda\"><span class=\"spblue\">$objetivo</span>";
echo "		</td></tr>";


echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" valign=\"top\"><label for=\"beneficios\" class=\"spgrey\">Recuperacion de la inversi&oacute;n::</label></td>
		<td colspan=\"3\" bgcolor=\"$celda\"><span class=\"spblue\">$beneficios</span>";
echo "		</td></tr>";

echo "</table>";
echo "<br \>";

/*PRIMER SEMESTRE*/
echo " <table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "   <tr>";
echo "     <th colspan=\"1\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Enero</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Febrero</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Marzo</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Abril</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Mayo</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Junio</span></th>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($enero,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($febrero,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($marzo,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($abril,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($mayo,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($junio,2) . "</span></td>";
echo "   </tr>";
echo " </table>";
 /*FIN PRIMER SEMESTRE*/
 echo "<br \>";
 /*SEGUNDO SEMESTRE*/
echo " <table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "   <tr>";
echo "     <th colspan=\"1\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Julio</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Agosto</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Septiembre</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Octubre</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Noviembre</span></th>";
echo "     <th colspan=\"1\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Diciembre</span></th>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($julio,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($agosto,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($septiembre,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($octubre,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($noviembre,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($diciembre,2) . "</span></td>";
echo "   </tr>";
echo " </table>";
 
$gtotal=$enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$noviembre+$diciembre;
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
echo "<br \>";


			$result=mysql_query("select max(id_conse_obra) as consecueo from obras where clave='$clave'", $connect);
			$totalregistros=mysql_num_rows($result);
			while($row=mysql_fetch_array($result))
			{
			$consecueo=$row['consecueo'];
			}
			$consec=$consecueo+1;
			$clave_del= substr($clave,0,2);
			$clave_uops= substr($clave,2,3);
			$feccaptura= date("Y-m-d H:s");
			$anio= substr($feccaptura,0,4);
			
/*inserta registro*/


 $resultado = mysql_query("INSERT INTO obras (id_conse_obra,clave,clave_del,clave_uops,clave_par,clave_act,id_proyecto,tipo_proy,monto,anio_fiso,problematica,objetivo,beneficios,c1,c2,c3,c4,c5,c6,componentes,fecha_cap,id_usuario,status,vobo,cantidad,unidad,enero,febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,total_gastoo)
 VALUES($consec,'$clave','$clave_del','$clave_uops','$clave_par','$clave_act','$id_proyecto','$tipo_proy',$inversion,'2017','$problematica','$objetivo','$beneficios',$c1,$c2,$c3,$c4,$c5,$c6,'$otros','$feccaptura','$usu',0,0,$cantidad,'$unidad',$enero,$febrero,$marzo,$abril,$mayo,$junio,$julio,$agosto,$septiembre,$octubre,$noviembre,$diciembre,$gtotal)", $connect);

/*termina inserta registro*/
	
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