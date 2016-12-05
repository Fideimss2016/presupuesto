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

$_SESSION['conse_acts']=$_REQUEST['conse_acts'];
$_SESSION['id_tipo_curso']=$_REQUEST['id_tipo_curso'];
$_SESSION['id_tipo_pago']=$_REQUEST['id_tipo_pago'];


$conse_acts=$_SESSION["conse_acts"];
$id_tipo_curso=$_SESSION["id_tipo_curso"];
$id_tipo_pago=$_SESSION["id_tipo_pago"];
$vale= "onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\"";

$celda="#1a1a1a";
$tabla="#666";

echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
echo "    <h3>Captura de Ingresos del Presupuesto 2017</h3>";
echo "    <h2>Registro de Actividades</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b>Paso 2</b> Complete los campos que a continuaci&oacute;n se detallan";
echo "		</p>";

echo "		<div id=\"cajaareas\">";
echo "		<form action=\"ingresos_cvr_2.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";

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
								$_SESSION["clave_act"]=$clave_act;
								$_SESSION["actividad"]=$actividad;

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
			$_SESSION["costo_1"]=$costo_1;

echo "		<span class=\"spgreen\">&nbsp;$desc_tipo_pago</span></td>";

			echo "		<td colspan=\"2\" bgcolor=\"$celda\">&nbsp;</td>";
echo "		</tr>";

			echo "		<tr>";
			echo "		<td bgcolor=\"$celda\" align=\"right\">";
			echo "		<label for=\"actividades\" class=\"spgrey\">Duracion: </label>";
			echo "		</td>";
			echo "		<td bgcolor=\"$celda\">";
			echo "		<span class=\"spblue\">&nbsp;$duracion hrs.</span>";
			echo "		</td>";
			echo "		<td bgcolor=\"$celda\" align=\"right\">";
			echo "		<label for=\"actividades\" class=\"spgrey\">Costo del curso: </label>";
			echo "		</td>";
			echo "		<td bgcolor=\"$celda\">";
			echo "		<span class=\"white\">&nbsp;Derechohabiente: </span><span class=\"spblue\"> $". number_format($costo,2) . " pesos</span>
						<span class=\"white\">&nbsp;&nbsp;No Derechohabiente: </span><span class=\"spblue\"> $". number_format($costo_1,2) . " pesos</span>";
			echo "		</td>";
			echo "		</tr>";

				/*
				echo "		<tr>";
				echo "		<td bgcolor=\"$celda\" align=\"right\">";
				echo "		<label for=\"inicio\" class=\"spgrey\">Inicio de inscrpciones: </label>";
				echo "		</td>";
				echo "		<td bgcolor=\"$celda\">";
				echo "		<span class=\"spblue\"><input type=\"text\" id=\"popupDatepickers1\" name=\"iniins\" required></span>";
				echo "		</td>";
				
				echo "		<td bgcolor=\"$celda\" align=\"right\">";
				echo "		<label for=\"termino\" class=\"spgrey\">Termino de inscripciones: </label>";
				echo "		</td>";
				echo "		<td bgcolor=\"$celda\">";
				echo "		<span class=\"spblue\"><input type=\"text\" id=\"popupDatepickers2\" name=\"terins\" required></span>";
				echo "		</td>";
				echo "		</tr>";
				*/
				
				echo "		<input type=\"hidden\" name=\"iniins\" value=\"01-06-2017\">";
				echo "		<input type=\"hidden\" name=\"terins\" value=\"31-08-2017\">";
				
				echo "		<tr>";
				echo "		<td bgcolor=\"$celda\" align=\"right\">";
				echo "		<label for=\"inicio\" class=\"spgrey\">Inicio del curso: </label>";
				echo "		</td>";
				echo "		<td bgcolor=\"$celda\">";
				echo "		<span class=\"spblue\"><input type=\"text\" id=\"popupDatepicker\" name=\"inicio\" required></span>";
				echo "		</td>";
				
				echo "		<td bgcolor=\"$celda\" align=\"right\">";
				echo "		<label for=\"termino\" class=\"spgrey\">Termino del curso: </label>";
				echo "		</td>";
				echo "		<td bgcolor=\"$celda\">";
				echo "		<span class=\"spblue\"><input type=\"text\" id=\"popupDatepickers\" name=\"termino\" required></span>";
				echo "		</td>";
				echo "		</tr>";
	
echo "</table>";
echo "<br \>";

//echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"history.go(-1)\" /> | <input type=\"submit\" value=\"Continuar\" />";
echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"document.location ='ingresos.php'\" /> | <input type=\"submit\" value=\"Continuar\" />";

echo "</form>";

echo "   	</div>";//cajaareas
echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor



echo" </body>";
echo" </html>";

?>