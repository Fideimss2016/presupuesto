<?php
include "valida_seguridad.php";
include "clases/variablesbd.php";

include "datepickBasic.html";


$_SESSION['inicio']=$_REQUEST['inicio'];
$_SESSION['termino']=$_REQUEST['termino'];

$inicio=$_SESSION["inicio"];
$termino=$_SESSION["termino"];

list($dia,$mes,$year) = explode("-",$inicio);
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
include "generahoras.php";
include "generames.php";


$usuario_sistema=$_SESSION["usuario_sistema"];
$clave=$_SESSION["clave"];
$conse_acts=$_SESSION["conse_acts"];
$id_tipo_curso=$_SESSION["id_tipo_curso"];
$id_tipo_pago=$_SESSION["id_tipo_pago"];

if($id_tipo_pago==2)
{
$_SESSION['dias']=$_REQUEST['dias'];
$_SESSION['horas']=$_REQUEST['horas'];
$dias=$_SESSION["dias"];
$horas=$_SESSION["horas"];
}
else
{
$dias=0;
$horas=0;
}


$celda="#1a1a1a";
$tabla="#666";

echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
echo "    <h3>Captura de Ingresos del Presupuesto 2016</h3>";
echo "    <h2>Registro de Actividades</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b>Paso 3</b> Complete los campos restantes";
echo "		</p>";


if($conse_acts==64){$liga='ingresos_4.php';}
//else if($conse_acts==58 || $conse_acts==59 || $conse_acts==60 || $conse_acts==61 || $conse_acts==62 || $conse_acts==64 || $conse_acts==54 || $conse_acts==55 || $conse_acts==56  || $conse_acts==99 || $conse_acts==49 || $conse_acts==50 || $conse_acts==51 || $conse_acts==52 || $conse_acts==53)
else if($conse_acts==47 || $conse_acts==48 || $conse_acts==49 || $conse_acts==50 || $conse_acts==51 || $conse_acts==63 || $conse_acts==64 || $conse_acts==99)
{
	$liga='ingresos_5.php';
	$_SESSION['montol']=$_REQUEST['montol'];
	$montol=$_SESSION["montol"];
}

else if($id_tipo_pago==3)
{
	$liga='ingresos_cc.php';
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
			else if($id_tipo_pago==4 || $id_tipo_pago==99)
			{
			$costo=40;
			$costo_1=40;
			$duracion="0";
			}
			else if($id_tipo_pago==3)
			{
			$costo=$duracion*$cuota_der;
			$costo=round($costo);
			$costo_1=$duracion*$cuota_noder;
			$costo_1=round($costo);
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

if($id_tipo_pago==2)
{
	$semanascur=$duracion/($dias*$horas);
	$semanascur=round($semanascur,0);
	echo $semanascur;
	$tiempo='+'.$semanascur.' weeks';
	//echo "<br>" .$tiempo;

	$fecha = $inicio;
	$nuevafecha = strtotime ( $tiempo , strtotime ( $fecha ) ) ;
	$nuevafecha = date ( 'd-m-y' , $nuevafecha );

	$_SESSION['nuevafecha']=$nuevafecha;
	//echo "<br> nueva fecha " . $nuevafecha;
	//echo "<br>";
	$memes=Semanas($inicio,$termino);
	//echo "diferencia de semanas: " . $memes;
}

echo "		<span class=\"spgreen\">&nbsp;$desc_tipo_pago</span></td>";
			if($conse_acts==57)
			{
			$conse=$_SESSION['conse'];

			echo "		<td bgcolor=\"$celda\" align=\"right\">";
			echo "		<label for=\"tipo_curso\" class=\"spgrey\">Instalacion:</label>";
			echo "		</td>";
			echo "		<td bgcolor=\"$celda\">";

			$result=mysql_query("select conse, desc_nombre, normal, grupo from instalaciones where clave='$clave' and conse=$conse", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$conse=$row['conse'];
								$desc_nombre=$row['desc_nombre'];
								$normal=$row['normal'];
								$grupo=$row['grupo'];
								}

			echo "		<span class=\"spgreen\">&nbsp;$desc_nombre</span></td>";
			}

			else
			{
			echo "		<td colspan=\"2\" bgcolor=\"$celda\">&nbsp;</td>";
			}

echo "		</tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"actividades\" class=\"spgrey\">Duracion: </label>";
echo "		</td>";

			if($conse_acts==64)
			{
			echo "		<td bgcolor=\"$celda\">";
			echo "		<span class=\"spblue\">&nbsp;$horas hrs.</span>";
			echo "		</td>";
			}
			//else if($conse_acts==58 || $conse_acts==59 || $conse_acts==60 || $conse_acts==61 || $conse_acts==62 || $conse_acts==64 || $conse_acts==54 || $conse_acts==55 || $conse_acts==56  || $conse_acts==99 || $conse_acts==49 || $conse_acts==50 || $conse_acts==51 || $conse_acts==52 || $conse_acts==53)
			else if	($conse_acts==47 || $conse_acts==48 || $conse_acts==49 || $conse_acts==50 || $conse_acts==51 || $conse_acts==63 || $conse_acts==64 || $conse_acts==99)
			{
			echo "		<td bgcolor=\"$celda\">";
			echo "		<span class=\"spblue\">&nbsp;No aplica</span>";
			echo "		</td>";
			}
			else
			{
			echo "		<td bgcolor=\"$celda\">";
			echo "		<span class=\"spblue\">&nbsp;$duracion hrs.</span>";
			echo "		</td>";
			}

/*muestra*/
/*
echo "estos son los dias habiles entre estas dos fechas: " .   $CantidadDiasHabiles;
echo "<br>" .$tiempo;
echo "<br> nueva fecha " . $nuevafecha;
echo "<br>";

*/
//echo "diferencia de semanas: " . $memes;
$mes= substr($inicio,3,2);
if($id_tipo_pago==2)
{
			//if($conse_acts==63 || $conse_acts==57 || $conse_acts==58 || $conse_acts==59 || $conse_acts==60 || $conse_acts==61 || $conse_acts==62 || $conse_acts==64 || $conse_acts==54 || $conse_acts==55 || $conse_acts==56  || $conse_acts==99 || $conse_acts==49 || $conse_acts==50 || $conse_acts==51 || $conse_acts==52 || $conse_acts==53)
			if($conse_acts==47 || $conse_acts==48 || $conse_acts==49 || $conse_acts==50 || $conse_acts==51 || $conse_acts==63 || $conse_acts==64 || $conse_acts==99)
			{
			$mes1= substr($termino,3,2);
			}
			else
			{
			$mes1= substr($nuevafecha,3,2);
			}
}
else
{
	$mes1= substr($termino,3,2);
}

/*muestra*/
//echo "<br> mes: " . $mes . " A " . $mes1 ;
$resmes=$mes1-$mes;
$totmes=$resmes+1;
$_SESSION['dif_mes']=$totmes;
//echo "<br> totmes: " . $totmes;
/**/
if($id_tipo_pago==2)
{
			if($conse_acts==57)
			{
			$mensualidadesder=$horas*$normal;
			$mensualidadesnoder=$horas*$grupo;
			echo "		<td bgcolor=\"$celda\" align=\"right\">";
			echo "		<label for=\"actividades\" class=\"spgrey\">Costo por hora: </label>";
			echo "		</td>";
			echo "		<td bgcolor=\"$celda\">";
				echo "		<span class=\"white\">&nbsp;Derechohabiente: </span><span class=\"spblue\"> $". number_format($normal,2) . " pesos</span>
						<span class=\"white\">&nbsp;&nbsp;No Derechohabiente: </span><span class=\"spblue\"> $". number_format($grupo,2) . " pesos</span>
				 ";
			echo "		</td>";
			echo "		</tr>";
			}
			else if($conse_acts==58 || $conse_acts==59 || $conse_acts==60 || $conse_acts==61 || $conse_acts==62 || $conse_acts==64 || $conse_acts==54 || $conse_acts==55 || $conse_acts==56  || $conse_acts==99 || $conse_acts==49 || $conse_acts==50 || $conse_acts==51 || $conse_acts==52 || $conse_acts==53)
			{
			echo "		<td bgcolor=\"$celda\" align=\"right\">";
			echo "		<label for=\"actividades\" class=\"spgrey\">Ingreso Anual: </label>";
			echo "		</td>";
			echo "		<td bgcolor=\"$celda\">";
			echo "		<span class=\"white\"></span><span class=\"spblue\"> $". number_format($montol,2) . " pesos</span>";
			echo "		</td>";
			echo "		</tr>";
			}
			else
			{
			$mensualidadesder=$costo/$totmes;
			$mensualidadesnoder=$costo_1/$totmes;
			echo "		<td bgcolor=\"$celda\" align=\"right\">";
			echo "		<label for=\"actividades\" class=\"spgrey\">Costo del curso: </label>";
			echo "		</td>";
			echo "		<td bgcolor=\"$celda\">";
			echo "		<span class=\"white\">&nbsp;Derechohabiente: </span><span class=\"spblue\"> $". number_format($costo,2) . " pesos</span>
						<span class=\"white\">&nbsp;&nbsp;No Derechohabiente: </span><span class=\"spblue\"> $". number_format($costo_1,2) . " pesos</span>
				 ";
			echo "		</td>";
			echo "		</tr>";
			}
}

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
if($id_tipo_pago==2)
	{
			if($conse_acts==63 || $conse_acts==57 || $conse_acts==58 || $conse_acts==59 || $conse_acts==60 || $conse_acts==61 || $conse_acts==62 || $conse_acts==64)
			//if($conse_acts==47 || $conse_acts==48 || $conse_acts==49 || $conse_acts==50 || $conse_acts==51 || $conse_acts==63 || $conse_acts==64 || $conse_acts==99)
			{

			}
			else
			{
			echo "		<tr>";
			echo "		<td bgcolor=\"$celda\" align=\"right\" colspan=\"3\">";
			echo "		<label for=\"actividades\" class=\"spgrey\">Pago parcial: </label>";
			echo "		</td>";
			echo "		<td bgcolor=\"$celda\">";
			echo "		<span class=\"white\">&nbsp;Derechohabiente: </span><span class=\"spblue\"> $". number_format($mensualidadesder,2) . " pesos</span>
						<span class=\"white\">&nbsp;&nbsp;No Derechohabiente: </span><span class=\"spblue\"> $". number_format($mensualidadesnoder,2) . " pesos</span>
				 ";
			echo "		</td>";
			echo "		</tr>";
			}

	}

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"inicio\" class=\"spgrey\">Inicio: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"spblue\">&nbsp;$inicio</span>";
echo "		</td>";

echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"actividades\" class=\"spgrey\">Termino: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"spblue\">&nbsp;$termino</span>";
echo "		</td>";
echo "		</tr>";



			if($id_tipo_pago==2)
			{
				if($conse_acts==57)
				{
				echo "		<tr>";
				echo "		<td bgcolor=\"$celda\" align=\"right\">";
				echo "		<label for=\"actividades\" class=\"spgrey\">Horas x a&ntilde;o: </label>";
				echo "		</td>";
				echo "		<td bgcolor=\"$celda\" colspan=\"3\">";
				echo "		<span class=\"spblue\">&nbsp;$horas</span>";
				echo "		</td>";
				echo "		</tr>";
				}
				else if($conse_acts==58 || $conse_acts==59 || $conse_acts==60 || $conse_acts==61 || $conse_acts==62 || $conse_acts==64 || $conse_acts==54 || $conse_acts==55 || $conse_acts==56  || $conse_acts==99 || $conse_acts==49 || $conse_acts==50 || $conse_acts==51 || $conse_acts==52 || $conse_acts==53)
				{

				}

				else
				{
				echo "		<tr>";
				echo "		<td bgcolor=\"$celda\" align=\"right\">";
				echo "		<label for=\"actividades\" class=\"spgrey\">Dias x semana: </label>";
				echo "		</td>";
				echo "		<td bgcolor=\"$celda\">";
				echo "		<span class=\"spblue\">&nbsp;$dias</span>";
				echo "		</td>";

				echo "		<td bgcolor=\"$celda\" align=\"right\">";
				echo "		<label for=\"actividades\" class=\"spgrey\">Horas x dia: </label>";
				echo "		</td>";
				echo "		<td bgcolor=\"$celda\">";
				echo "		<span class=\"spblue\">&nbsp;$horas</span>";
				echo "		</td>";
				echo "		</tr>";
				}
			}
			else
			{
			}

echo "</table>";
echo "<br \>";

				if($conse_acts==57)
				{
				echo "		<p class=\"spwhite\">";
				echo "		capture numero de horas x mes ";
				echo "		</p>";
				$tablas = Horas($mes,$mes1);
				}
				else if($conse_acts==58 || $conse_acts==59 || $conse_acts==60 || $conse_acts==61 || $conse_acts==62 || $conse_acts==64 || $conse_acts==54 || $conse_acts==55 || $conse_acts==56  || $conse_acts==99 || $conse_acts==49 || $conse_acts==50 || $conse_acts==51 || $conse_acts==52 || $conse_acts==53)
				{
				echo "		<p class=\"spwhite\">";
				echo "		capture ingreso mensual que pretende obtener por este concepto";
				echo "		</p>";
				$tablas = Mes($mes,$mes1);
				}
				else
				{
				echo "		<p class=\"spwhite\">";
				echo "		capture numero de usuarios para cada uno de los meses en que se desarrollara el curso";
				echo "		</p>";
					if($semanascur>52)
					{
						echo "		<p class=\"spred\">";
						echo "		Error! revise su fecha de inicio, fecha de fin, asi como la cantidad de dias y horas capturadas";
						echo "		</p>";
					}
					else
					{
						$tablas = Meses($mes,$mes1);					
					}
					
				}

echo $tablas;

echo "<br \>";

//echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"history.go(-1)\" /> | <input type=\"submit\" value=\"Continuar\" />";
echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"history.back(-1)\" /> | <input type=\"submit\" value=\"Continuar\" />";
//echo ("<a href='javascript:history.back(1)'>Atrás</a>")

echo "</form>";

echo "   	</div>";//cajaareas

/**/
	}//ELSE FECHAS
echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor

echo" </body>";
echo" </html>";

?>