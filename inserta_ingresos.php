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
$conse_acts=$_SESSION["conse_acts"];
$id_tipo_curso=$_SESSION["id_tipo_curso"];
$id_tipo_pago=$_SESSION["id_tipo_pago"];
$inicio=$_SESSION["inicio"];
$termino=$_SESSION["termino"];
$dias=$_SESSION["dias"];
$horas=$_SESSION["horas"];
$dif_mes=$_SESSION["dif_mes"];
$usu=$_SESSION["usu"];

$dh1=$_SESSION['dh1'];
$dh2=$_SESSION['dh2'];
$dh3=$_SESSION['dh3'];
$dh4=$_SESSION['dh4'];
$dh5=$_SESSION['dh5'];
$dh6=$_SESSION['dh6'];
$dh7=$_SESSION['dh7'];
$dh8=$_SESSION['dh8'];
$dh9=$_SESSION['dh9'];
$dh10=$_SESSION['dh10'];
$dh11=$_SESSION['dh11'];
$dh12=$_SESSION['dh12'];

$ndh1=$_SESSION['ndh1'];
$ndh2=$_SESSION['ndh2'];
$ndh3=$_SESSION['ndh3'];
$ndh4=$_SESSION['ndh4'];
$ndh5=$_SESSION['ndh5'];
$ndh6=$_SESSION['ndh6'];
$ndh7=$_SESSION['ndh7'];
$ndh8=$_SESSION['ndh8'];
$ndh9=$_SESSION['ndh9'];
$ndh10=$_SESSION['ndh10'];
$ndh11=$_SESSION['ndh11'];
$ndh12=$_SESSION['ndh12'];



$tabla="#666";
$celda="#1a1a1a";
$celda1="#666";

echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
echo "    <h3>Captura de Ingresos del Presupuesto 2017</h3>";
echo "    <h2>Registro de Actividades</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b>Paso 4</b> Confirme datos";
echo "		</p>";

echo "		<div id=\"cajaareas\">";
echo "		<form action=\"ingresos.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";

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
echo "		<td bgcolor=\"$celda\" colspan=\"3\">";

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
			$duracion="-";
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
			$costo_1=$duracion*$cuota_noder;
			}
			else
			{
			$costo=$duracion*$cuota_der;
			$costo_1=$duracion*$cuota_noder;
			}

			$_SESSION["costo"]=$costo;
			$_SESSION["costo1"]=$costo1;


echo "		<span class=\"spgreen\">&nbsp;$desc_tipo_pago</span></td>";
echo "		</tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"actividades\" class=\"spgrey\">Duracion: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"spblue\">&nbsp;$duracion hrs.</span>";
echo "		</td>";

//echo "estos son los dias habiles entre estas dos fechas: " .   $CantidadDiasHabiles;
//echo "<br>" .$tiempo;
//echo "<br> nueva fecha " . $nuevafecha;
//echo "<br>";
//echo "diferencia de semanas: " . $memes;


$mes= substr($inicio,3,2);
$mes1= substr($nuevafecha,3,2);
//echo "<br> mes: " . $mes . " " . $mes1 ;
//$resmes=$mes1-$mes;
//$totmes=$resmes+1;
//echo "<br> totmes: " . $dif_mes;

			if($id_tipo_pago==1 || $id_tipo_pago==4 || $id_tipo_pago==99 || $id_tipo_pago==3)
			{
			$mensualidadesder=$costo;
			$mensualidadesnoder=$costo_1;
			}
			else
			{
			$mensualidadesder=$costo/$dif_mes;
			$mensualidadesnoder=$costo_1/$dif_mes;
			}


			if($id_tipo_pago==1)
			{

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
			else if($id_tipo_pago==3)
			{

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
			else
			{
			echo "		<td bgcolor=\"$celda\" align=\"right\">";
			echo "		<label for=\"actividades\" class=\"spgrey\">Costo del curso: </label>";
			echo "		</td>";
			echo "		<td bgcolor=\"$celda\">";
			echo "		<span class=\"white\">&nbsp;Derechohabiente: </span><span class=\"spblue\"> $". number_format($costo,2) . " pesos</span>
						<span class=\"white\">&nbsp;&nbsp;No Derechohabiente: </span><span class=\"spblue\"> $". number_format($costo_1,2) . " pesos</span>
				 ";
			echo "		</td>";
			echo "		</tr>";

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
			else
			{

			}

echo "</table>";
echo "<br \>";

$tot1=$dh1*$mensualidadesder;
$ntot1=$ndh1*$mensualidadesnoder;
$pob1=$tot1+$ntot1;
$tot2=$dh2*$mensualidadesder;
$ntot2=$ndh2*$mensualidadesnoder;
$pob2=$tot2+$ntot2;
$tot3=$dh3*$mensualidadesder;
$ntot3=$ndh3*$mensualidadesnoder;
$pob3=$tot3+$ntot3;
$tot4=$dh4*$mensualidadesder;
$ntot4=$ndh4*$mensualidadesnoder;
$pob4=$tot4+$ntot4;
$tot5=$dh5*$mensualidadesder;
$ntot5=$ndh5*$mensualidadesnoder;
$pob5=$tot5+$ntot5;
$tot6=$dh6*$mensualidadesder;
$ntot6=$ndh6*$mensualidadesnoder;
$pob6=$tot6+$ntot6;
$tot7=$dh7*$mensualidadesder;
$ntot7=$ndh7*$mensualidadesnoder;
$pob7=$tot7+$ntot7;
$tot8=$dh8*$mensualidadesder;
$ntot8=$ndh8*$mensualidadesnoder;
$pob8=$tot8+$ntot8;
$tot9=$dh9*$mensualidadesder;
$ntot9=$ndh9*$mensualidadesnoder;
$pob9=$tot9+$ntot9;
$tot10=$dh10*$mensualidadesder;
$ntot10=$ndh10*$mensualidadesnoder;
$pob10=$tot10+$ntot10;
$tot11=$dh11*$mensualidadesder;
$ntot11=$ndh11*$mensualidadesnoder;
$pob11=$tot11+$ntot11;
$tot12=$dh12*$mensualidadesder;
$ntot12=$ndh12*$mensualidadesnoder;
$pob12=$tot12+$ntot12;

$pob1=round($pob1);
$pob2=round($pob2);
$pob3=round($pob3);
$pob4=round($pob4);
$pob5=round($pob5);
$pob6=round($pob6);
$pob7=round($pob7);
$pob8=round($pob8);
$pob9=round($pob9);
$pob10=round($pob10);
$pob11=round($pob11);
$pob12=round($pob12);

/*PRIMER SEMESTRE*/
echo " <table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "   <tr>";
echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Enero</span></th>";
echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Febrero</span></th>";
echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Marzo</span></th>";
echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Abril</span></th>";
echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Mayo</span></th>";
echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Junio</span></th>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"2\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"2\"><span class=\"spgrey\">Poblacion</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"2\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"2\"><span class=\"spgrey\">Poblacion</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"2\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"2\"><span class=\"spgrey\">Poblacion</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"2\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"2\"><span class=\"spgrey\">Poblacion</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"2\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"2\"><span class=\"spgrey\">Poblacion</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"2\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"2\"><span class=\"spgrey\">Poblacion</span></td>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">DH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">NDH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">DH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">NDH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">DH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">NDH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">DH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">NDH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">DH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">NDH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">DH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">NDH</span></td>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($pob1,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot1\" class=\"spblue\">$dh1</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$ntot1\" class=\"spblue\">$ndh1</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($pob2,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot2\" class=\"spblue\">$dh2</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$ntot2\" class=\"spblue\">$ndh2</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($pob3,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot3\" class=\"spblue\">$dh3</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$ntot3\" class=\"spblue\">$ndh3</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($pob4,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$ntot4\" class=\"spblue\">$dh4</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot4\" class=\"spblue\">$ndh4</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($pob5,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot5\" class=\"spblue\">$dh5</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$ntot5\" class=\"spblue\">$ndh5</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($pob6,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot6\" class=\"spblue\">$dh6</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$ntot6\" class=\"spblue\">$ndh6</a></td>";
echo "   </tr>";
echo " </table>";
 /*FIN PRIMER SEMESTRE*/
 echo "<br \>";
 /*SEGUNDO SEMESTRE*/
echo " <table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "   <tr>";
echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Julio</span></th>";
echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Agosto</span></th>";
echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Septiembre</span></th>";
echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Octubre</span></th>";
echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Noviembre</span></th>";
echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Diciembre</span></th>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"2\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"2\"><span class=\"spgrey\">Poblacion</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"2\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"2\"><span class=\"spgrey\">Poblacion</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"2\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"2\"><span class=\"spgrey\">Poblacion</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"2\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"2\"><span class=\"spgrey\">Poblacion</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"2\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"2\"><span class=\"spgrey\">Poblacion</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"2\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"2\"><span class=\"spgrey\">Poblacion</span></td>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">DH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">NDH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">DH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">NDH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">DH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">NDH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">DH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">NDH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">DH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">NDH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">DH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">NDH</span></td>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($pob7,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot7\" class=\"spblue\">$dh7</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$ntot7\" class=\"spblue\">$ndh7</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($pob8,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot8\" class=\"spblue\">$dh8</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$ntot8\" class=\"spblue\">$ndh8</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($pob9,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot9\" class=\"spblue\">$dh9</a></a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$ntot9\" class=\"spblue\">$ndh9</a></a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($pob10,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot10\" class=\"spblue\">$dh10</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$ntot10\" class=\"spblue\">$ndh10</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($pob11,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot11\" class=\"spblue\">$dh11</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$ntot11\" class=\"spblue\">$ndh11</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($pob12,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot12\" class=\"spblue\">$dh12</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$ntot12\" class=\"spblue\">$ndh12</a></td>";
echo "   </tr>";
echo " </table>";

$gtotal=$pob1+$pob2+$pob3+$pob4+$pob5+$pob6+$pob7+$pob8+$pob9+$pob10+$pob11+$pob12;
$dhgtotal=$dh1+$dh2+$dh3+$dh4+$dh5+$dh6+$dh7+$dh8+$dh9+$dh10+$dh11+$dh12;
$ndhgtotal=$ndh1+$ndh2+$ndh3+$ndh4+$ndh5+$ndh6+$ndh7+$ndh8+$ndh9+$ndh10+$ndh11+$ndh12;

$gtotal=round($gtotal);


 /*FIN SEGUNDO SEMESTRE*/

 echo "<br \>";
 /*RESUMEN*/
echo " <table width=\"30%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "   <tr>";
echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Total de ingresos y poblacion beneficiada</span></th>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"2\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"2\"><span class=\"spgrey\">Poblacion</span></td>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">DH</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spgrey\">NDH</span></td>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($gtotal,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot7\" class=\"spblue\">$dhgtotal</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$ntot7\" class=\"spblue\">$ndhgtotal</a></td>";
echo "   </tr>";
echo " </table>";

 /*FIN RESUMEN*/



			$result=mysql_query("select max(id_conse_ing) as consecu from ingresos where clave='$clave'", $connect);
			$totalregistros=mysql_num_rows($result);
			while($row=mysql_fetch_array($result))
			{
			$consecu=$row['consecu'];
			}
			$consec=$consecu+1;
			//echo "$consec";
			$clave_del= substr($clave,0,2);
			$clave_uops= substr($clave,2,3);
			$nuevafecha= $_SESSION['nuevafecha'];
			$feccaptura= date("Y-m-d");
			$inicio1=date("Y-m-d",strtotime($inicio));
			$termino1=date("Y-m-d",strtotime($termino));
			$anio= substr($inicio1,0,4);

			//echo "inicio1: $inicio1 termino1: $termino1 fec_captura: $feccaptura";
			//echo "$clave_del $clave_uops";
/*inserta registro*/

					if($id_tipo_pago==2)
					{
					$resultado = mysql_query("INSERT INTO ingresos (id_conse_ing,clave,clave_del,clave_uops,conse_act,clave_act,id_tipo_pago,id_tipo_curso,fecha_ini,fecha_fin,fecha_cal_sis,anio_fisi,enero,dh1,ndh1,febrero,dh2,ndh2,marzo,dh3,ndh3,abril,dh4,ndh4,mayo,dh5,ndh5,junio,dh6,ndh6,julio,dh7,ndh7,agosto,dh8,ndh8,septiembre,dh9,ndh9,octubre,dh10,ndh10,noviembre,dh11,ndh11,diciembre,dh12,ndh12,cta_der,cta_noder,ingreso_total,fecha_cap,id_usuario,vobo,status)
					VALUES ($consec,'$clave','$clave_del','$clave_uops','$conse_acts','$clave_act',$id_tipo_pago,$id_tipo_curso,'$inicio1','$termino1','$nuevafecha','$anio',$pob1,$dh1,$ndh1,$pob2,$dh2,$ndh2,$pob3,$dh3,$ndh3,$pob4,$dh4,$ndh4,$pob5,$dh5,$ndh5,$pob6,$dh6,$ndh6,$pob7,$dh7,$ndh7,$pob8,$dh8,$ndh8,$pob9,$dh9,$ndh9,$pob10,$dh10,$ndh10,$pob11,$dh11,$ndh11,$pob12,$dh12,$ndh12,$mensualidadesder,$mensualidadesnoder,$gtotal,'$feccaptura','$usu',0,0)", $connect);
/*termina inserta registro*/
						if($resultado){echo "<span class=\"spblue\">La actividad se ha registrado satisfactoriamente!!!</span>";}
						else{echo "<span class=\"spred\">Error en el registro de la actividad!!!</span>";}
					}
					else
					{
					$resultado = mysql_query("INSERT INTO ingresos (id_conse_ing,clave,clave_del,clave_uops,conse_act,clave_act,id_tipo_pago,id_tipo_curso,fecha_ini,fecha_fin,fecha_cal_sis,anio_fisi,enero,dh1,ndh1,febrero,dh2,ndh2,marzo,dh3,ndh3,abril,dh4,ndh4,mayo,dh5,ndh5,junio,dh6,ndh6,julio,dh7,ndh7,agosto,dh8,ndh8,septiembre,dh9,ndh9,octubre,dh10,ndh10,noviembre,dh11,ndh11,diciembre,dh12,ndh12,cta_der,cta_noder,ingreso_total,fecha_cap,id_usuario,vobo,status)
					VALUES ($consec,'$clave','$clave_del','$clave_uops','$conse_acts','$clave_act',$id_tipo_pago,$id_tipo_curso,'$inicio1','$termino1','$nuevafecha','$anio',$pob1,$dh1,$ndh1,$pob2,$dh2,$ndh2,$pob3,$dh3,$ndh3,$pob4,$dh4,$ndh4,$pob5,$dh5,$ndh5,$pob6,$dh6,$ndh6,$pob7,$dh7,$ndh7,$pob8,$dh8,$ndh8,$pob9,$dh9,$ndh9,$pob10,$dh10,$ndh10,$pob11,$dh11,$ndh11,$pob12,$dh12,$ndh12,$mensualidadesder,$mensualidadesnoder,$gtotal,'$feccaptura','$usu',0,0)", $connect);
						if($resultado){echo "<span class=\"spblue\">La actividad se ha registrado satisfactoriamente!!!</span>";}
						else{echo "<span class=\"spred\">Error en el registro de la actividad!!!</span>";}
					}
echo "<br \>";

echo "<input type=\"submit\" value=\"Capturar otra actividad\" />";

echo "</form>";

echo "   	</div>";//cajaareas
echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor



echo" </body>";
echo" </html>";

?>