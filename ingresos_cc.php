<?php
	session_start();
	//include "valida_seguridad.php";
	include "clases/variablesbd.php";

	include "datepickBasic.html";
	include "funcion_fecha.php";
	include "generameses.php";
	include "generahoras.php";

	echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\" >";

	//conexion a la base de datos
	$connect = mysql_connect("$host","$user","$passworks");
	//Seleccion de la base
	mysql_select_db("$dbname",$connect);

	echo" <body>";
	echo "<div id=\"contenedor\">";
	echo "	<div id=\"contenido_cont\">";

	if(isset($_SESSION['usuario_sistema'])){$usuario_sistema = $_SESSION["usuario_sistema"];}
	if(isset($_SESSION['clave'])){$clave = $_SESSION["clave"];}
	if(isset($_SESSION['conse_acts'])){$conse_acts = $_SESSION["conse_acts"];}
	if(isset($_SESSION['id_tipo_curso'])){$id_tipo_curso = $_SESSION["id_tipo_curso"];}
	if(isset($_SESSION['id_tipo_pago'])){$id_tipo_pago = $_SESSION["id_tipo_pago"];}
	if(isset($_SESSION['inicio'])){$inicio = $_SESSION["inicio"];}
	if(isset($_SESSION['termino'])){$termino = $_SESSION["termino"];}
	if(isset($_SESSION['dias'])){$dias = $_SESSION["dias"];}
	if(isset($_SESSION['horas'])){$horas = $_SESSION["horas"];}
	if(isset($_SESSION['dif_mes'])){$dif_mes = $_SESSION["dif_mes"];}

	if ($_POST["dh1"] || $_POST["ndh1"]){$_SESSION['dh1']=$_REQUEST['dh1']; $_SESSION['ndh1']=$_REQUEST['ndh1']; $_SESSION['mes1']=$_REQUEST['mes1']; $dh1=$_SESSION["dh1"]; $ndh1=$_SESSION["ndh1"]; $mes1=$_SESSION["mes1"];} else{$_SESSION['dh1']=0; $_SESSION['ndh1']=0; $mes1=0;}
	if ($_POST["dh2"] || $_POST["ndh2"]){$_SESSION['dh2']=$_REQUEST['dh2']; $_SESSION['ndh2']=$_REQUEST['ndh2']; $_SESSION['mes2']=$_REQUEST['mes2']; $dh2=$_SESSION["dh2"]; $ndh2=$_SESSION["ndh2"]; $mes2=$_SESSION["mes2"];} else{$_SESSION['dh2']=0; $_SESSION['ndh2']=0; $mes2=0;}
	if ($_POST["dh3"] || $_POST["ndh3"]){$_SESSION['dh3']=$_REQUEST['dh3']; $_SESSION['ndh3']=$_REQUEST['ndh3']; $_SESSION['mes3']=$_REQUEST['mes3']; $dh3=$_SESSION["dh3"]; $ndh3=$_SESSION["ndh3"]; $mes3=$_SESSION["mes3"];} else{$_SESSION['dh3']=0; $_SESSION['ndh3']=0; $mes3=0;}
	if ($_POST["dh4"] || $_POST["ndh4"]){$_SESSION['dh4']=$_REQUEST['dh4']; $_SESSION['ndh4']=$_REQUEST['ndh4']; $_SESSION['mes4']=$_REQUEST['mes4']; $dh4=$_SESSION["dh4"]; $ndh4=$_SESSION["ndh4"]; $mes4=$_SESSION["mes4"];} else{$_SESSION['dh4']=0; $_SESSION['ndh4']=0; $mes4=0;}
	if ($_POST["dh5"] || $_POST["ndh5"]){$_SESSION['dh5']=$_REQUEST['dh5']; $_SESSION['ndh5']=$_REQUEST['ndh5']; $_SESSION['mes5']=$_REQUEST['mes5']; $dh5=$_SESSION["dh5"]; $ndh5=$_SESSION["ndh5"]; $mes5=$_SESSION["mes5"];} else{$_SESSION['dh5']=0; $_SESSION['ndh5']=0; $mes5=0;}
	if ($_POST["dh6"] || $_POST["ndh6"]){$_SESSION['dh6']=$_REQUEST['dh6']; $_SESSION['ndh6']=$_REQUEST['ndh6']; $_SESSION['mes6']=$_REQUEST['mes6']; $dh6=$_SESSION["dh6"]; $ndh6=$_SESSION["ndh6"]; $mes6=$_SESSION["mes6"];} else{$_SESSION['dh6']=0; $_SESSION['ndh6']=0; $mes6=0;}
	if ($_POST["dh7"] || $_POST["ndh7"]){$_SESSION['dh7']=$_REQUEST['dh7']; $_SESSION['ndh7']=$_REQUEST['ndh7']; $_SESSION['mes7']=$_REQUEST['mes7']; $dh7=$_SESSION["dh7"]; $ndh7=$_SESSION["ndh7"]; $mes7=$_SESSION["mes7"];} else{$_SESSION['dh7']=0; $_SESSION['ndh7']=0; $mes7=0;}
	if ($_POST["dh8"] || $_POST["ndh8"]){$_SESSION['dh8']=$_REQUEST['dh8']; $_SESSION['ndh8']=$_REQUEST['ndh8']; $_SESSION['mes8']=$_REQUEST['mes8']; $dh8=$_SESSION["dh8"]; $ndh8=$_SESSION["ndh8"]; $mes8=$_SESSION["mes8"];} else{$_SESSION['dh8']=0; $_SESSION['ndh8']=0; $mes8=0;}
	if ($_POST["dh9"] || $_POST["ndh9"]){$_SESSION['dh9']=$_REQUEST['dh9']; $_SESSION['ndh9']=$_REQUEST['ndh9']; $_SESSION['mes9']=$_REQUEST['mes9']; $dh9=$_SESSION["dh9"]; $ndh9=$_SESSION["ndh9"]; $mes9=$_SESSION["mes9"];} else{$_SESSION['dh9']=0; $_SESSION['ndh9']=0; $mes9=0;}
	if ($_POST["dh10"] || $_POST["ndh10"]){$_SESSION['dh10']=$_REQUEST['dh10']; $_SESSION['ndh10']=$_REQUEST['ndh10']; $_SESSION['mes10']=$_REQUEST['mes10']; $dh10=$_SESSION["dh10"]; $ndh10=$_SESSION["ndh10"]; $mes10=$_SESSION["mes10"];} else{$_SESSION['dh10']=0; $_SESSION['ndh10']=0; $mes10=0;}
	if ($_POST["dh11"] || $_POST["ndh11"]){$_SESSION['dh11']=$_REQUEST['dh11']; $_SESSION['ndh11']=$_REQUEST['ndh11']; $_SESSION['mes11']=$_REQUEST['mes11']; $dh11=$_SESSION["dh11"]; $ndh11=$_SESSION["ndh11"]; $mes11=$_SESSION["mes11"];} else{$_SESSION['dh11']=0; $_SESSION['ndh11']=0; $mes11=0;}
	if ($_POST["dh12"] || $_POST["ndh12"]){$_SESSION['dh12']=$_REQUEST['dh12']; $_SESSION['ndh12']=$_REQUEST['ndh12']; $_SESSION['mes12']=$_REQUEST['mes12']; $dh12=$_SESSION["dh12"]; $ndh12=$_SESSION["ndh12"]; $mes12=$_SESSION["mes12"];} else{$_SESSION['dh12']=0; $_SESSION['ndh12']=0; $mes12=0;}

	$tabla = "#666";
	$celda = "#1a1a1a";
	$celda1 = "#666";

	echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
	//echo "    <div align=\"right\"><span class=\"blue\">1 = $dh1 $ndh1,2 = $dh2 $ndh2,3 = $dh3 $ndh3,4 = $dh4 $ndh4,5 = $dh5 $ndh5,6 = $dh6 $ndh6,7 = $dh7 $ndh7,8 = $dh8 $ndh8,9 = $dh9 $ndh9,10 = $dh10 $ndh10,11 = $dh11 $ndh11,12 = $dh12 $ndh12</span></div>";
	echo "    <h3>Captura de Ingresos del Presupuesto 2017</h3>";
	echo "    <h2>Registro de Actividades</h2>";

	echo "		<p class=\"spwhite\">";
	echo "		<b>Paso 4</b> Confirme datos";
	echo "		</p>";

	echo "		<div id=\"cajaareas\">";
	echo "		<form action=\"inserta_ingresos_cc.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";

	$result = mysql_query("select desc_uops, desc_del, id_cuota from cat_delegaciones where clave='$clave'", $connect);
	$totalregistros = mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran
	while($row = mysql_fetch_array($result))
	{
		$desc_uops = $row['desc_uops'];
		$desc_del = $row['desc_del'];
		$id_cuota = $row['id_cuota'];
	}

	$result = mysql_query("select zona, cuota_der, cuota_noder from cuotas_i where id_cuota=$id_cuota", $connect);
	$totalregistros = mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran
	while($row = mysql_fetch_array($result))
	{
		$zona = $row['zona'];
		$cuota_der = $row['cuota_der'];
		$cuota_noder = $row['cuota_noder'];
	}

	echo "		<label for=\"uopsi\">Unidad Operativa: <b>$desc_uops</b></label><br><br>";

	echo "		<table width=\"90%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
	echo "		<tr>";
	echo "		<td bgcolor=\"$celda\" align=\"right\">";
	echo "		<label for=\"actividades\" class=\"spgrey\">Actividad: </label>";
	echo "		</td>";
	echo "		<td bgcolor=\"$celda\">";
	$result = mysql_query("select clave_act, actividad from cat_actividades_i where conse_act=$conse_acts", $connect);
	$totalregistros = mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran
	while($row = mysql_fetch_array($result))
	{
		$clave_act = $row['clave_act'];
		$actividad = $row['actividad'];
	}

	echo "		<span class=\"spgreen\">&nbsp;$clave_act $actividad</span></td>";
	echo "		<td bgcolor=\"$celda\" align=\"right\">";
	echo "		<label for=\"tipo_curso\" class=\"spgrey\">Curso:</label>";
	echo "		</td>";
	echo "		<td bgcolor=\"$celda\">";

	$result = mysql_query("select id_tipo_curso, desc_tipo_curso,duracion from cat_tipo_curso_i where id_tipo_curso=$id_tipo_curso", $connect);
	$totalregistros = mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran
	while($row = mysql_fetch_array($result))
	{
		$id_tipo_curso = $row['id_tipo_curso'];
		$desc_tipo_curso = $row['desc_tipo_curso'];
		$duracion = $row['duracion'];
	}

	echo "		<span class=\"spgreen\">&nbsp;$desc_tipo_curso</span></td>";
	echo "		</tr>";

	echo "		<tr>";
	echo "		<td bgcolor=\"$celda\" align=\"right\">";
	echo "		<label for=\"tipo_curso\" class=\"spgrey\">Tipo de pago: </label>";
	echo "		</td>";
	echo "		<td bgcolor=\"$celda\" colspan=\"3\">";

	$result = mysql_query("select id_tipo_pago, desc_tipo_pago from cat_tipo_pago_i where id_tipo_pago=$id_tipo_pago", $connect);
	$totalregistros = mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran
	while($row = mysql_fetch_array($result))
	{
		$id_tipo_pago = $row['id_tipo_pago'];
		$desc_tipo_pago = $row['desc_tipo_pago'];
	}

	$costo = $duracion * $cuota_der;
	$costo_1 = $duracion * $cuota_noder;

	$_SESSION["costo"] = $costo;
	$_SESSION["costo1"] = $costo1;

	echo "		<span class=\"spgreen\">&nbsp;$desc_tipo_pago</span></td>";
	echo "		</tr>";

	echo "		<tr>";
	echo "		<td bgcolor=\"$celda\" align=\"right\">";
	echo "		<label for=\"actividades\" class=\"spgrey\">Duracion: </label>";
	echo "		</td>";
	echo "		<td bgcolor=\"$celda\">";
	echo "		<span class=\"spblue\">&nbsp;$duracion hrs.</span>";
	echo "		</td>";

	$mes = substr($inicio,3,2);
	$mes1 = substr($nuevafecha,3,2);

	$mensualidadesder = $costo / $dif_mes;
	$mensualidadesnoder = $costo_1 / $dif_mes;

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

	$dh1 = $_SESSION['dh1'];
	$dh2 = $_SESSION['dh2'];
	$dh3 = $_SESSION['dh3'];
	$dh4 = $_SESSION['dh4'];
	$dh5 = $_SESSION['dh5'];
	$dh6 = $_SESSION['dh6'];
	$dh7 = $_SESSION['dh7'];
	$dh8 = $_SESSION['dh8'];
	$dh9 = $_SESSION['dh9'];
	$dh10 = $_SESSION['dh10'];
	$dh11 = $_SESSION['dh11'];
	$dh12 = $_SESSION['dh12'];

	$ndh1 = $_SESSION['ndh1'];
	$ndh2 = $_SESSION['ndh2'];
	$ndh3 = $_SESSION['ndh3'];
	$ndh4 = $_SESSION['ndh4'];
	$ndh5 = $_SESSION['ndh5'];
	$ndh6 = $_SESSION['ndh6'];
	$ndh7 = $_SESSION['ndh7'];
	$ndh8 = $_SESSION['ndh8'];
	$ndh9 = $_SESSION['ndh9'];
	$ndh10 = $_SESSION['ndh10'];
	$ndh11 = $_SESSION['ndh11'];
	$ndh12 = $_SESSION['ndh12'];

	$mesemp = substr($inicio,3,2);
	$mesfin = substr($termino,3,2);
	$mesemp += $mesemp;
	$mesfin += $mesfin;
	$calc = $mesemp/2;
	$calc1 = $mesfin/2;

	//echo "mesxxx: " . $calc . "mes_1xxx: " . $calc1;
	$respas = $calc1 - $calc;
	$respas = $respas + 1;
	//echo "totals: " . $respas;
	for($e = $calc;$e <= $calc1;$e++)
	{	
		//echo "<br> webos" . $e . "<b>";
		$rese = $calc1 - $e;
		$reses = $rese + 1;
		//echo $reses  . " webs: " . $e . " </b><br>";
		$mult[$e] = $reses;
	}
	/*
	echo "Enero" . $mult[1] . "<br>";
	echo "febrero" . $mult[2] . "<br>";
	echo "marzo" . $mult[3] . "<br>";
	echo "abril" . $mult[4] . "<br>";				
	echo "mayo" . $mult[5] . "<br>";
	echo "junio" . $mult[6] . "<br>";
	echo "julio" . $mult[7] . "<br>";
	echo "agosto" . $mult[8] . "<br>";				
	echo "septiembre" . $mult[9] . "<br>";
	echo "octubre" . $mult[10] . "<br>";
	echo "noviembre" . $mult[11] . "<br>";
	echo "diciembre" . $mult[12] . "<br>";				
	*/

	$tot1 = $dh1 * $mensualidadesder;
	$ntot1 = $ndh1 * $mensualidadesnoder;
	$pob1 = ($tot1 + $ntot1) * $mult[1];
	$tot2 = $dh2 * $mensualidadesder;
	$ntot2 = $ndh2 * $mensualidadesnoder;
	$pob2 = ($tot2 + $ntot2) * $mult[2];
	$tot3 = $dh3 * $mensualidadesder;
	$ntot3 = $ndh3 * $mensualidadesnoder;
	$pob3 = ($tot3 + $ntot3) * $mult[3];
	$tot4 = $dh4 * $mensualidadesder;
	$ntot4 = $ndh4 * $mensualidadesnoder;
	$pob4 = ($tot4 + $ntot4) * $mult[4];
	$tot5 = $dh5 * $mensualidadesder;
	$ntot5 = $ndh5 * $mensualidadesnoder;
	$pob5 = ($tot5 + $ntot5) * $mult[5];
	$tot6 = $dh6 * $mensualidadesder;
	$ntot6 = $ndh6 * $mensualidadesnoder;
	$pob6 = ($tot6 + $ntot6) * $mult[6];
	$tot7 = $dh7 * $mensualidadesder;
	$ntot7 = $ndh7 * $mensualidadesnoder;
	$pob7 = ($tot7 + $ntot7) * $mult[7];
	$tot8 = $dh8 * $mensualidadesder;
	$ntot8 = $ndh8 * $mensualidadesnoder;
	$pob8 = ($tot8 + $ntot8) * $mult[8];
	$tot9 = $dh9 * $mensualidadesder;
	$ntot9 = $ndh9 * $mensualidadesnoder;
	$pob9 = ($tot9 + $ntot9) * $mult[9];
	$tot10 = $dh10 * $mensualidadesder;
	$ntot10 = $ndh10 * $mensualidadesnoder;
	$pob10 = ($tot10 + $ntot10) * $mult[10];
	$tot11 = $dh11 * $mensualidadesder;
	$ntot11 = $ndh11 * $mensualidadesnoder;
	$pob11 = ($tot11 + $ntot11) * $mult[11];
	$tot12 = $dh12 * $mensualidadesder;
	$ntot12 = $ndh12 * $mensualidadesnoder;
	$pob12 = ($tot12 + $ntot12) * $mult[12];

	/*PRIMER SEMESTRE*/
	echo " <table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
	echo "   <tr>";
	echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Enero $mes1</span></th>";
	echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Febrero $mes2</span></th>";
	echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Marzo $mes3</span></th>";
	echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Abril $mes4</span></th>";
	echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Mayo $mes5</span></th>";
	echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Junio $mes6</span></th>";
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
	echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Julio $mes7</span></th>";
	echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Agosto $mes8</span></th>";
	echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Septiembre $mes9</span></th>";
	echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Octubre $mes10</span></th>";
	echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Noviembre $mes11</span></th>";
	echo "     <th colspan=\"3\" bgcolor=\"$celda1\" scope=\"col\"><span class=\"spgreen\">Diciembre $mes12</span></th>";
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

	$gtotal = $pob1 + $pob2 + $pob3 + $pob4 + $pob5 + $pob6 + $pob7 + $pob8 + $pob9 + $pob10 + $pob11 + $pob12;
	$dhgtotal = $dh1 + $dh2 + $dh3 + $dh4 + $dh5 + $dh6 + $dh7 + $dh8 + $dh9 + $dh10 + $dh11 + $dh12;
	$ndhgtotal = $ndh1 + $ndh2 + $ndh3 + $ndh4 + $ndh5 + $ndh6 + $ndh7 + $ndh8 + $ndh9 + $ndh10 + $ndh11 + $ndh12;

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

	echo "		<p class=\"spwhite\">";
	echo "		Si la informacion es correcta proceda a guardar el registro!";
	echo "		</p>";

	 /*FIN RESUMEN*/

	echo "<br \>";

	//echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"history.go(-1)\" /> | <input type=\"submit\" value=\"Registrar actividad\" />";
	echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"document.location ='ingresos.php'\" /> | <input type=\"submit\" value=\"Continuar\" />";

	echo "</form>";

	echo "   	</div>";//cajaareas
	echo "  </div>";//div contenido_cont
	echo "</div>";//div contenedor

	echo" </body>";
	echo" </html>";
?>