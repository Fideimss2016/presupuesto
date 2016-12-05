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
$montol=$_SESSION["montol"];


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

$ndh1=0;
$ndh2=0;
$ndh3=0;
$ndh4=0;
$ndh5=0;
$ndh6=0;
$ndh7=0;
$ndh8=0;
$ndh9=0;
$ndh10=0;
$ndh11=0;
$ndh12=0;

$conse=$_SESSION['conse'];



$tabla="#666";
$celda="#1a1a1a";
$celda1="#666";

echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
echo "    <h3>Captura de Ingresos del Presupuesto 2016</h3>";
echo "    <h2>Registro de Actividades</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b>Paso 5</b> Registro";
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
echo "		<td bgcolor=\"$celda\">";

			$result=mysql_query("select id_tipo_pago, desc_tipo_pago from cat_tipo_pago_i where id_tipo_pago=$id_tipo_pago", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$id_tipo_pago=$row['id_tipo_pago'];
								$desc_tipo_pago=$row['desc_tipo_pago'];
								}






echo "		<span class=\"spgreen\">&nbsp;$desc_tipo_pago</span></td>";
			echo "		<td bgcolor=\"$celda\" align=\"right\">";
			echo "		<label for=\"tipo_curso\" class=\"spgrey\">&nbsp;</label>";
			echo "		</td>";
			echo "		<td bgcolor=\"$celda\"><span class=\"spgreen\">&nbsp;</span></td>";
echo "		</tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"actividades\" class=\"spgrey\">Duracion: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"spblue\">No Aplica</span>";
echo "		</td>";



$mes= substr($inicio,3,2);
$mes1= substr($nuevafecha,3,2);
$mensualidadesder=$horas*$normal;
$mensualidadesnoder=$horas*$grupo;

echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"actividades\" class=\"spgrey\">Ingreso Anual: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"white\">&nbsp;</span><span class=\"spblue\"> $". number_format($montol,2) . " pesos</span>
	 ";
echo "		</td>";
echo "		</tr>";

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

echo "</table>";
echo "<br \>";

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

$tot1=0;
$tot2=0;
$tot3=0;
$tot4=0;
$tot5=0;
$tot6=0;
$tot7=0;
$tot8=0;
$tot9=0;
$tot10=0;
$tot11=0;
$tot12=0;

/*PRIMER SEMESTRE*/
echo " <table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "   <tr>";
echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Enero</span></th>";
echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Febrero</span></th>";
echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Marzo</span></th>";
echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Abril</span></th>";
echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Mayo</span></th>";
echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Junio</span></th>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh1,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh2,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh3,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh4,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh5,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh6,2) . "</span></td>";
echo "   </tr>";
echo " </table>";
 /*FIN PRIMER SEMESTRE*/
 echo "<br \>";
 /*SEGUNDO SEMESTRE*/
echo " <table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "   <tr>";
echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Julio</span></th>";
echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Agosto</span></th>";
echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Septiembre</span></th>";
echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Octubre</span></th>";
echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Noviembre</span></th>";
echo "     <th bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Diciembre</span></th>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh7,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh8,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh9,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh10,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh11,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dh12,2) . "</span></td>";
echo "   </tr>";
echo " </table>";

$dhgtotal=$dh1+$dh2+$dh3+$dh4+$dh5+$dh6+$dh7+$dh8+$dh9+$dh10+$dh11+$dh12;

 /*FIN SEGUNDO SEMESTRE*/

 echo "<br \>";
 /*RESUMEN*/
echo " <table width=\"30%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "   <tr>";
echo "     <th colspan=\"2\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Total de ingresos y poblacion beneficiada</span></th>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
//echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($dhgtotal,2) . "</span></td>";
//echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot7\" class=\"spblue\">" . number_format ($dhgtotal,2) . "</a></td>";
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
			$clave_del= substr($clave,0,2);
			$clave_uops= substr($clave,2,3);
			$nuevafecha= $_SESSION['nuevafecha'];
			$feccaptura= date("Y-m-d");
			$inicio1=date("Y-m-d",strtotime($inicio));
			$termino1=date("Y-m-d",strtotime($termino));
			$anio= substr($inicio1,0,4);

/*inserta registro*/

					$resultado = mysql_query("INSERT INTO ingresos (id_conse_ing,clave,clave_del,clave_uops,conse_act,clave_act,id_tipo_pago,id_tipo_curso,fecha_ini,fecha_fin,fecha_cal_sis,anio_fisi,enero,dh1,ndh1,febrero,dh2,ndh2,marzo,dh3,ndh3,abril,dh4,ndh4,mayo,dh5,ndh5,junio,dh6,ndh6,julio,dh7,ndh7,agosto,dh8,ndh8,septiembre,dh9,ndh9,octubre,dh10,ndh10,noviembre,dh11,ndh11,diciembre,dh12,ndh12,cta_der,cta_noder,ingreso_total,fecha_cap,id_usuario,vobo,status)
					VALUES ($consec,'$clave','$clave_del','$clave_uops','$conse_acts','$clave_act',$id_tipo_pago,$id_tipo_curso,'$inicio1','$termino1','$nuevafecha','$anio',$dh1,$tot1,$ndh1,$dh2,$tot2,$ndh2,$dh3,$tot3,$ndh3,$dh4,$tot4,$ndh4,$dh5,$tot5,$ndh5,$dh6,$tot6,$ndh6,$dh7,$tot7,$ndh7,$dh8,$tot8,$ndh8,$dh9,$tot9,$ndh9,$dh10,$tot10,$ndh10,$dh11,$tot11,$ndh11,$dh12,$tot12,$ndh12,0,0,$dhgtotal,'$feccaptura','$usu',0,0)", $connect);

/*termina inserta registro*/

						if($resultado){echo "<span class=\"spblue\">La actividad se ha registrado satisfactoriamente!!!</span>";}
						else{echo "<span class=\"spred\">Error en el registro de la actividad!!!</span>";}
echo "<br \>";

echo "<input type=\"submit\" value=\"Capturar otra actividad\" />";

echo "</form>";

echo "   	</div>";//cajaareas
echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor



echo" </body>";
echo" </html>";

?>