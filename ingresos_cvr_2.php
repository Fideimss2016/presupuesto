<?php
include "valida_seguridad.php";
include "clases/variablesbd.php";

include "datepickBasic.html";


$_SESSION['inicio']=$_REQUEST['inicio'];
$_SESSION['termino']=$_REQUEST['termino'];
$_SESSION['iniins']=$_REQUEST['iniins'];
$_SESSION['terins']=$_REQUEST['terins'];


$inicio=$_SESSION["inicio"];
$termino=$_SESSION["termino"];
$iniins=$_SESSION["iniins"];
$terins=$_SESSION["terins"];


list($dia,$mes,$year) = explode("-",$iniins);
$inik = mktime(0, 0, 0, $mes , $dia, $year);

list($diaf,$mesf,$yearf) = explode("-",$termino);
$fink = mktime(0, 0, 0, $mesf , $diaf, $yearf);

echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\" >";


	//conexion a la base de datos
	$connect=mysql_connect("$host","$user","$passworks");

	//Seleccion de la base
	mysql_select_db("$dbname",$connect);

echo" <body>";
echo "<div id=\"contenedor\">";
echo "	<div id=\"contenido_cont\">";


if($inik>$fink)
	{
	echo"<font color=\"#FF0000\" size=\"+1\"> Error!!! no se puede procesar su solicitud, la fecha de inicio $inicio no puede ser mayor a la fecha final $termino!!!</font>";
	}//IF FECHAS
else
	{
/*FECHAS CORRECTAS*/
include "funcion_fecha.php";
include "generameses.php";
//include "generahoras.php";
//include "generames.php";


$usuario_sistema=$_SESSION["usuario_sistema"];
$clave=$_SESSION["clave"];
$conse_acts=$_SESSION["conse_acts"];
$id_tipo_curso=$_SESSION["id_tipo_curso"];
$id_tipo_pago=$_SESSION["id_tipo_pago"];

$dias=0;
$horas=0;

$celda="#1a1a1a";
$tabla="#666666";

echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
echo "    <h3>Captura de Ingresos del Presupuesto 2017</h3>";
echo "    <h2>Registro de Actividades</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b>Paso 3</b> Complete los campos restantes";
echo "		</p>";


if($id_tipo_pago==3)
{
	$liga='ingresos_cc_cvr.php';
}

else{$liga='ingresos_3.php';}

echo "		<div id=\"cajaareas\">";
echo "		<form action=\"$liga\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";

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
echo "		<label for=\"actividades\" class=\"spgrey\">Actividad: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
			$result=mysql_query("select clave_act, actividad from cat_actividades_i where conse_act=$conse_acts", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$clave_act=$row['clave_act'];
								$actividad=$row['actividad'];
								}

echo "		<span class=\"spgreen\">&nbsp;$clave_act $actividad</span></td>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"tipo_curso\" class=\"spgrey\">Curso:</label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";

			$result=mysql_query("select id_tipo_curso, desc_tipo_curso,duracion from cat_tipo_curso_i where id_tipo_curso=$id_tipo_curso", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$id_tipo_curso=$row['id_tipo_curso'];
								$desc_tipo_curso=$row['desc_tipo_curso'];
								$duracion=$row['duracion'];
								}

echo "		<span class=\"spgreen\">&nbsp;$desc_tipo_curso</span></td>";
echo "		</tr>";


echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"tipo_curso\" class=\"spgrey\">Tipo de pago: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";

			$result=mysql_query("select id_tipo_pago, desc_tipo_pago from cat_tipo_pago_i where id_tipo_pago=$id_tipo_pago", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$id_tipo_pago=$row['id_tipo_pago'];
								$desc_tipo_pago=$row['desc_tipo_pago'];
								}


			if($id_tipo_pago==1)
			{
			$costo=80;
			$costo_1=80;
			$duracion="0";
			}
			else
			{
			$costo=$duracion*$cuota_der;
			$costo_1=$duracion*$cuota_noder;
			}

			$_SESSION["costo"]=$costo;
			$_SESSION["costo1"]=$costo1;


$CantidadDiasHabiles = Evalua(DiasHabiles($inicio,$termino));
//echo "estos son los dias habiles entre estas dos fechas: " .   $CantidadDiasHabiles;

echo "		<span class=\"spgreen\">&nbsp;$desc_tipo_pago</span></td>";
echo "		<td colspan=\"2\" bgcolor=\"$celda\">&nbsp;</td>";

echo "		</tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"actividades\" class=\"spgrey\">Duracion: </label>";
echo "		</td>";

echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
echo "		<span class=\"spblue\">&nbsp;$duracion hrs.</span>";
echo "		</td>";

$mes1= substr($terins,3,2);

/*muestra*/
//echo "<br> mes: " . $mes . " A " . $mes1 ;
$resmes=$mes1-$mes;
echo $totmes=$resmes+1;
$_SESSION['dif_mes']=$totmes;
//echo "<br> totmes: " . $totmes;
/**/
if($id_tipo_pago==3)
{
			echo "		<td bgcolor=\"$celda\" align=\"right\">";
			echo "		<label for=\"actividades\" class=\"spgrey\">Costo del curso completo: </label>";
			echo "		</td>";
			echo "		<td bgcolor=\"$celda\">";
			echo "		<span class=\"white\">&nbsp;Derechohabiente: </span><span class=\"spblue\"> $". number_format($costo,2) . " pesos</span>
						<span class=\"white\">&nbsp;&nbsp;No Derechohabiente: </span><span class=\"spblue\"> $". number_format($costo_1,2) . " pesos</span>
				 ";
			echo "		</td>";
			echo "		</tr>";
}

/*
echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"inicio\" class=\"spgrey\">Inscrpciones: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"3\">";
echo "		<span class=\"spgreen\"> del </span><span class=\"spblue\"> $iniins </span><span class=\"spgreen\"> al </span><span class=\"spblue\"> $terins</span>";
echo "		</td>";
echo "		</tr>";
*/

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"inicio\" class=\"spgrey\">Inicio del curso: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"spblue\">&nbsp;$inicio</span>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"actividades\" class=\"spgrey\">Terminodel curso: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"spblue\">&nbsp;$termino</span>";
echo "		</td>";
echo "		</tr>";

echo "</table>";
echo "<br \>";

echo "		<p class=\"spwhite\">";
echo "		capture numero de usuarios para cada uno de los meses en que se desarrollara el curso";
echo "		</p>";
$tablas = Meses($mes,$mes1);

echo $tablas;

echo "<br \>";

//echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"history.go(-1)\" /> | <input type=\"submit\" value=\"Continuar\" />";
echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"document.location ='ingresos.php'\" /> | <input type=\"submit\" value=\"Continuar\" />";

echo "</form>";

echo "   	</div>";//cajaareas

/**/
	}//ELSE FECHAS
echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor

echo" </body>";
echo" </html>";

?>