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
echo "		</tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"actividades\" class=\"spgrey\">Duracion: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"spblue\">&nbsp;$horas hrs.</span>";
echo "		</td>";



$mes= substr($inicio,3,2);
$mes1= substr($nuevafecha,3,2);
$mensualidadesder=$horas*$normal;
$mensualidadesnoder=$horas*$grupo;

echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"actividades\" class=\"spgrey\">Costo por hora: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"white\">&nbsp;Derechohabiente: </span><span class=\"spblue\"> $". number_format($normal,2) . " pesos</span>
	 ";
echo "		</td>";
echo "		</tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\" colspan=\"3\">";
echo "		<label for=\"actividades\" class=\"spgrey\">Total del numero de horas: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"white\">&nbsp;Derechohabiente: </span><span class=\"spblue\"> $". number_format($mensualidadesder,2) . " pesos</span>
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

$tot1=$dh1*$normal;
$tot2=$dh2*$normal;
$tot3=$dh3*$normal;
$tot4=$dh4*$normal;
$tot5=$dh5*$normal;
$tot6=$dh6*$normal;
$tot7=$dh7*$normal;
$tot8=$dh8*$normal;
$tot9=$dh9*$normal;
$tot10=$dh10*$normal;
$tot11=$dh11*$normal;
$tot12=$dh12*$normal;

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
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot1,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot1\" class=\"spblue\">$dh1</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot2,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot2\" class=\"spblue\">$dh2</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot3,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot3\" class=\"spblue\">$dh3</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot4,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$ntot4\" class=\"spblue\">$dh4</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot5,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot5\" class=\"spblue\">$dh5</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot6,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot6\" class=\"spblue\">$dh6</a></td>";
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
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" rowspan=\"1\"><span class=\"spgrey\">Ingreso</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot7,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot7\" class=\"spblue\">$dh7</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot8,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot8\" class=\"spblue\">$dh8</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot9,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot9\" class=\"spblue\">$dh9</a></a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot10,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot10\" class=\"spblue\">$dh10</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot11,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot11\" class=\"spblue\">$dh11</a></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($tot12,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot12\" class=\"spblue\">$dh12</a></td>";
echo "   </tr>";
echo " </table>";
 
$gtotal=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12;
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
echo "     <td bgcolor=\"$celda\" align=\"center\" colspan=\"1\"><span class=\"spgrey\">Horas</span></td>";
echo "   </tr>";
echo "   <tr>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><span class=\"spblue\"> " . number_format ($gtotal,2) . "</span></td>";
echo "     <td bgcolor=\"$celda\" align=\"center\"><a title=\"$tot7\" class=\"spblue\">$dhgtotal</a></td>";
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
					VALUES ($consec,'$clave','$clave_del','$clave_uops','$conse_acts','$clave_act',$id_tipo_pago,$id_tipo_curso,'$inicio1','$termino1','$nuevafecha','$anio',$tot1,$dh1,$ndh1,$tot2,$dh2,$ndh2,$tot3,$dh3,$ndh3,$tot4,$dh4,$ndh4,$tot5,$dh5,$ndh5,$tot6,$dh6,$ndh6,$tot7,$dh7,$ndh7,$tot8,$dh8,$ndh8,$tot9,$dh9,$ndh9,$tot10,$dh10,$ndh10,$tot11,$dh11,$ndh11,$tot12,$dh12,$ndh12,$normal,$grupo,$gtotal,'$feccaptura','$usu',0,0)", $connect);
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