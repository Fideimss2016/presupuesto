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
$id_emp=$_SESSION["id_emp"];


if ($_POST["h1"]){$_SESSION['h1']=$_REQUEST['h1']; $h1=$_SESSION["h1"];$_SESSION['dh1']=$_REQUEST['dh1']; $dh1=$_SESSION["dh1"];$_SESSION['ndh1']=$_REQUEST['ndh1']; $ndh1=$_SESSION["ndh1"];} else{$_SESSION['h1']=0;$_SESSION['dh1']=0;$_SESSION['ndh1']=0;}
if ($_POST["h2"]){$_SESSION['h2']=$_REQUEST['h2']; $h2=$_SESSION["h2"];$_SESSION['dh2']=$_REQUEST['dh2']; $dh2=$_SESSION["dh2"];$_SESSION['ndh2']=$_REQUEST['ndh2']; $ndh2=$_SESSION["ndh2"];} else{$_SESSION['h2']=0;$_SESSION['dh2']=0;$_SESSION['ndh2']=0;}
if ($_POST["h3"]){$_SESSION['h3']=$_REQUEST['h3']; $h3=$_SESSION["h3"];$_SESSION['dh3']=$_REQUEST['dh3']; $dh3=$_SESSION["dh3"];$_SESSION['ndh3']=$_REQUEST['ndh3']; $ndh3=$_SESSION["ndh3"];} else{$_SESSION['h3']=0;$_SESSION['dh3']=0;$_SESSION['ndh3']=0;}
if ($_POST["h4"]){$_SESSION['h4']=$_REQUEST['h4']; $h4=$_SESSION["h4"];$_SESSION['dh4']=$_REQUEST['dh4']; $dh4=$_SESSION["dh4"];$_SESSION['ndh4']=$_REQUEST['ndh4']; $ndh4=$_SESSION["ndh4"];} else{$_SESSION['h4']=0;$_SESSION['dh4']=0;$_SESSION['ndh4']=0;}
if ($_POST["h5"]){$_SESSION['h5']=$_REQUEST['h5']; $h5=$_SESSION["h5"];$_SESSION['dh5']=$_REQUEST['dh5']; $dh5=$_SESSION["dh5"];$_SESSION['ndh5']=$_REQUEST['ndh5']; $ndh5=$_SESSION["ndh5"];} else{$_SESSION['h5']=0;$_SESSION['dh5']=0;$_SESSION['ndh5']=0;}
if ($_POST["h6"]){$_SESSION['h6']=$_REQUEST['h6']; $h6=$_SESSION["h6"];$_SESSION['dh6']=$_REQUEST['dh6']; $dh6=$_SESSION["dh6"];$_SESSION['ndh6']=$_REQUEST['ndh6']; $ndh6=$_SESSION["ndh6"];} else{$_SESSION['h6']=0;$_SESSION['dh6']=0;$_SESSION['ndh6']=0;}
if ($_POST["h7"]){$_SESSION['h7']=$_REQUEST['h7']; $h7=$_SESSION["h7"];$_SESSION['dh7']=$_REQUEST['dh7']; $dh7=$_SESSION["dh7"];$_SESSION['ndh7']=$_REQUEST['ndh7']; $ndh7=$_SESSION["ndh7"];} else{$_SESSION['h7']=0;$_SESSION['dh7']=0;$_SESSION['ndh7']=0;}
if ($_POST["h8"]){$_SESSION['h8']=$_REQUEST['h8']; $h8=$_SESSION["h8"];$_SESSION['dh8']=$_REQUEST['dh8']; $dh8=$_SESSION["dh8"];$_SESSION['ndh8']=$_REQUEST['ndh8']; $ndh8=$_SESSION["ndh8"];} else{$_SESSION['h8']=0;$_SESSION['dh8']=0;$_SESSION['ndh8']=0;}
if ($_POST["h9"]){$_SESSION['h9']=$_REQUEST['h9']; $h9=$_SESSION["h9"];$_SESSION['dh9']=$_REQUEST['dh9']; $dh9=$_SESSION["dh9"];$_SESSION['ndh9']=$_REQUEST['ndh9']; $ndh9=$_SESSION["ndh9"];} else{$_SESSION['h9']=0;$_SESSION['dh9']=0;$_SESSION['ndh9']=0;}
if ($_POST["h10"]){$_SESSION['h10']=$_REQUEST['h10']; $h10=$_SESSION["h10"];$_SESSION['dh10']=$_REQUEST['dh10']; $dh10=$_SESSION["dh10"];$_SESSION['ndh10']=$_REQUEST['ndh10']; $ndh10=$_SESSION["ndh10"];} else{$_SESSION['h10']=0;$_SESSION['dh10']=0;$_SESSION['ndh10']=0;}
if ($_POST["h11"]){$_SESSION['h11']=$_REQUEST['h11']; $h11=$_SESSION["h11"];$_SESSION['dh11']=$_REQUEST['dh11']; $dh11=$_SESSION["dh11"];$_SESSION['ndh11']=$_REQUEST['ndh11']; $ndh11=$_SESSION["ndh11"];} else{$_SESSION['h11']=0;$_SESSION['dh11']=0;$_SESSION['ndh11']=0;}
if ($_POST["h12"]){$_SESSION['h12']=$_REQUEST['h12']; $h12=$_SESSION["h12"];$_SESSION['dh12']=$_REQUEST['dh12']; $dh12=$_SESSION["dh12"];$_SESSION['ndh12']=$_REQUEST['ndh12']; $ndh12=$_SESSION["ndh12"];} else{$_SESSION['h12']=0;$_SESSION['dh12']=0;$_SESSION['ndh12']=0;}

$_SESSION['estrategias']=$_REQUEST['estrategias']; $estrategias=$_SESSION["estrategias"];

$h1=$_SESSION["h1"];$dh1=$_SESSION["dh1"];$ndh1=$_SESSION["ndh1"];
$h2=$_SESSION["h2"];$dh2=$_SESSION["dh2"];$ndh2=$_SESSION["ndh2"];
$h3=$_SESSION["h3"];$dh3=$_SESSION["dh3"];$ndh3=$_SESSION["ndh3"];
$h4=$_SESSION["h4"];$dh4=$_SESSION["dh4"];$ndh4=$_SESSION["ndh4"];
$h5=$_SESSION["h5"];$dh5=$_SESSION["dh5"];$ndh5=$_SESSION["ndh5"];
$h6=$_SESSION["h6"];$dh6=$_SESSION["dh6"];$ndh6=$_SESSION["ndh6"];
$h7=$_SESSION["h7"];$dh7=$_SESSION["dh7"];$ndh7=$_SESSION["ndh7"];
$h8=$_SESSION["h8"];$dh8=$_SESSION["dh8"];$ndh8=$_SESSION["ndh8"];
$h9=$_SESSION["h9"];$dh9=$_SESSION["dh9"];$ndh9=$_SESSION["ndh9"];
$h10=$_SESSION["h10"];$dh10=$_SESSION["dh10"];$ndh10=$_SESSION["ndh10"];
$h11=$_SESSION["h11"];$dh11=$_SESSION["dh11"];$ndh11=$_SESSION["ndh11"];
$h12=$_SESSION["h12"];$dh12=$_SESSION["dh12"];$ndh12=$_SESSION["ndh12"];


$vale= "onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\"";

$celda="#1a1a1a";
$tabla="#666";

echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
echo "    <h3>Captura de Personal del Presupuesto 2017</h3>";
echo "    <h2>Registro de Metas</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b>Paso 2</b> Verifique que la proyecci&oacute;n de ingresos sea correcta";
echo "		</p>";

echo "		<div id=\"cajaareas\">";
echo "		<form action=\"inserta_metas.php\" method=\"post\" enctype=\"multipart/form-data\" target=\"_self\" name=\"a\">";
			
			$result=mysql_query("select cd.desc_uops, cd.desc_del, cd.id_cuota,c.cuota_der,c.cuota_noder from cat_delegaciones cd, cuotas_i c where cd.clave='$clave' and c.id_cuota=cd.id_cuota", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$desc_uops=$row['desc_uops'];
								$desc_del=$row['desc_del'];
								$cuota_der=$row['cuota_der'];
								$cuota_noder=$row['cuota_noder'];
								}

echo "		<label for=\"uopsi\">Unidad Operativa: <b>$desc_uops</b></label><br><br>";

			$resultp=mysql_query("select nombre,ape_pat,ape_mat,clave_act,clave_par,conse_categoria,ene,feb,mar,abr,may,jun,jul,ago,sep,oct,nov,dic from personal where clave='$clave' and id_emp=$id_emp", $connect);

								$totalregistros=mysql_num_rows($resultp);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($resultp))
								{
								$nombre=$row['nombre'];
								$ape_pat=$row['ape_pat'];
								$ape_mat=$row['ape_mat'];
								$clave_act=$row['clave_act'];
								$clave_par=$row['clave_par'];
								$conse_categoria=$row['conse_categoria'];
								$ene=$row['ene'];
								$feb=$row['feb'];
								$mar=$row['mar'];
								$abr=$row['abr'];
								$may=$row['may'];
								$jun=$row['jun'];
								$jul=$row['jul'];
								$ago=$row['ago'];
								$sep=$row['sep'];
								$oct=$row['oct'];
								$nov=$row['nov'];
								$dic=$row['dic'];
								}



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
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
	
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
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"tipo_curso\" class=\"spgrey\">Categor&iacute;a:</label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"1\">";
	
			$result=mysql_query("select desc_categoria, subtotal from cat_categoria where conse_categoria=$conse_categoria", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$desc_categoria=$row['desc_categoria'];
								$subtotal=$row['subtotal'];
								}
								$_SESSION["desc_categoria"]=$desc_categoria;
								$_SESSION["subtotal"]=$subtotal;

echo "		<span class=\"spgreen\">&nbsp;$desc_categoria</span></td>";

echo "		</tr>";

echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"inicio\" class=\"spgrey\">Instructor: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\">";
echo "		<span class=\"spblue\">$nombre $ape_pat $ape_mat</span>";
echo "		</td>";

echo "		<td bgcolor=\"$celda\" align=\"right\">";
echo "		<label for=\"termino\" class=\"spgrey\">Honorarios: </label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" colspan=\"3\">";
echo "		<span class=\"spblue\"> &nbsp;" . number_format($subtotal,2) . "</span>";
echo "		</td>";
echo "		</tr>";

echo "</table>";
echo "<br \>";
echo "		<table width=\"90%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";
echo "		<tr>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<label for=\"actividades\" class=\"spgrey\"><b>Mes</label></b>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<label for=\"actividades\" class=\"spgrey\"><b>Horas x mes</b></label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<label for=\"actividades\" class=\"spgrey\"><b>Derechohabientes</b></label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<label for=\"actividades\" class=\"spgrey\"><b>Importe DH</b></label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<label for=\"actividades\" class=\"spgrey\"><b>No Derechohabientes</b></label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<label for=\"actividades\" class=\"spgrey\"><b>Importe NDH</b></label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<label for=\"actividades\" class=\"spgrey\"><b>Total Usuarios</b></label>";
echo "		</td>";
echo "		<td bgcolor=\"$celda\" align=\"center\">";
echo "		<label for=\"actividades\" class=\"spgrey\"><b>Total Ingresos</b></label>";
echo "		</td>";
echo "		</tr>";

$tdh1=$cuota_der*$h1*$dh1;$tndh1=$cuota_noder*$h1*$ndh1;$usu1=$dh1+$ndh1;$ting1=$tdh1+$tndh1;
$tdh2=$cuota_der*$h2*$dh2;$tndh2=$cuota_noder*$h2*$ndh2;$usu2=$dh2+$ndh2;$ting2=$tdh2+$tndh2;
$tdh3=$cuota_der*$h3*$dh3;$tndh3=$cuota_noder*$h3*$ndh3;$usu3=$dh3+$ndh3;$ting3=$tdh3+$tndh3;
$tdh4=$cuota_der*$h4*$dh4;$tndh4=$cuota_noder*$h4*$ndh4;$usu4=$dh4+$ndh4;$ting4=$tdh4+$tndh4;
$tdh5=$cuota_der*$h5*$dh5;$tndh5=$cuota_noder*$h5*$ndh5;$usu5=$dh5+$ndh5;$ting5=$tdh5+$tndh5;
$tdh6=$cuota_der*$h6*$dh6;$tndh6=$cuota_noder*$h6*$ndh6;$usu6=$dh6+$ndh6;$ting6=$tdh6+$tndh6;
$tdh7=$cuota_der*$h7*$dh7;$tndh7=$cuota_noder*$h7*$ndh7;$usu7=$dh7+$ndh7;$ting7=$tdh7+$tndh7;
$tdh8=$cuota_der*$h8*$dh8;$tndh8=$cuota_noder*$h8*$ndh8;$usu8=$dh8+$ndh8;$ting8=$tdh8+$tndh8;
$tdh9=$cuota_der*$h9*$dh9;$tndh9=$cuota_noder*$h9*$ndh9;$usu9=$dh9+$ndh9;$ting9=$tdh9+$tndh9;
$tdh10=$cuota_der*$h10*$dh10;$tndh10=$cuota_noder*$h10*$ndh10;$usu10=$dh10+$ndh10;$ting10=$tdh10+$tndh10;
$tdh11=$cuota_der*$h11*$dh11;$tndh11=$cuota_noder*$h11*$ndh11;$usu11=$dh11+$ndh11;$ting11=$tdh11+$tndh11;
$tdh12=$cuota_der*$h12*$dh12;$tndh12=$cuota_noder*$h12*$ndh12;$usu12=$dh12+$ndh12;$ting12=$tdh12+$tndh12;

$par="spblue";
$par1="spgreen";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">Enero</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$h1</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$dh1</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tdh1,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$ndh1</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tndh1,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$usu1</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($ting1,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">Febrero</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$h2</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$dh2</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tdh2,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$ndh2</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tndh2,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$usu2</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($ting2,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">Marzo</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$h3</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$dh3</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tdh3,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$ndh3</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tndh3,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$usu3</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($ting3,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">Abril</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$h4</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$dh4</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tdh4,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$ndh4</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tndh4,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$usu4</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($ting4,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">Mayo</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$h5</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$dh5</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tdh5,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$ndh5</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tndh5,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$usu5</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($ting5,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">Junio</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$h6</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$dh6</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tdh6,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$ndh6</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tndh6,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$usu6</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($ting6,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">Julio</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$h7</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$dh7</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tdh7,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$ndh7</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tndh7,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$usu7</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($ting7,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">Agosto</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$h8</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$dh8</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tdh8,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$ndh8</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tndh8,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$usu8</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($ting8,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">Septiembre</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$h9</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$dh9</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tdh9,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$ndh9</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tndh9,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$usu9</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($ting9,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">Octubre</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$h10</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$dh10</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tdh10,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$ndh10</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tndh10,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$usu10</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($ting10,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">Noviembre</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$h11</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$dh11</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tdh11,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$ndh11</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tndh11,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$usu11</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($ting11,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">Diciembre</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$h12</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$dh12</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tdh12,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$ndh12</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tndh12,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$usu12</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($ting12,2) . "</span></td>
</tr>";


$totdh=$tdh1+$tdh2+$tdh3+$tdh4+$tdh5+$tdh6+$tdh7+$tdh8+$tdh9+$tdh10+$tdh11+$tdh12;
$totndh=$tndh1+$tndh2+$tndh3+$tndh4+$tndh5+$tndh6+$tndh7+$tndh8+$tndh9+$tndh10+$tndh11+$tndh12;
$gtot=$totdh+$totndh;

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"right\" colspan=\"3\"><span class=\"spgrey\"><b>Total: &nbsp;</b></span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"spgrey\"><b> " . number_format($totdh,2) . "</b></span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"spgrey\"><b>Total: &nbsp;</b></span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"spgrey\"><b> " . number_format($totndh,2) . "</b></span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"spgrey\"><b>Total: &nbsp;</b></span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"spgrey\"><b> " . number_format($gtot,2) . "</b></span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"right\" colspan=\"1\"><span class=\"spgrey\"><b>Estrategias: &nbsp;</b></span></td>
			<td bgcolor=\"$celda\" align=\"left\" colspan=\"7\"><span class=\"$par\">$estrategias</span></td>
</tr>";

echo "		</table>";

echo "<br>";

echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"history.go(-1)\" /> | <input type=\"submit\" value=\"Guardar registro\" />";

echo "</form>";

echo "   	</div>";//cajaareas 
echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor



echo" </body>";
echo" </html>";

?>