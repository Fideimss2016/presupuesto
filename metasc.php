<?php

session_start();
$clave=$_SESSION["clave"];
$tipo_usuario=$_SESSION["tipo_usuario"];

$_SESSION['id_emp']=$_REQUEST['id_emp'];
$id_emp=$_SESSION["id_emp"];

include "clases/variablesbd.php";

	//conexion a la base de datos
	$connect=mysql_connect("$host","$user","$passworks");

	//Seleccion de la base
	mysql_select_db("$dbname",$connect);

$celda="#1a1a1a";
$tabla="#666";


//$_SESSION['usuario_sistema']="$nombre $ape_pat $ape_mat";
$usuario_sistema=$_SESSION['usuario_sistema'];

echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\" >";

echo" <body>";
echo "<div id=\"contenedor\">";
echo "	<div id=\"contenido_cont\">";

			$result=mysql_query("select desc_uops, desc_del, id_cuota from cat_delegaciones where clave='$clave'", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$desc_uops=$row['desc_uops'];
								$desc_del=$row['desc_del'];
								$id_cuota=$row['id_cuota'];
								}


			$resulte=mysql_query("select nombre, ape_pat, ape_mat from personal where clave='$clave' and id_emp=$id_emp", $connect);

								$totalregistros=mysql_num_rows($resulte);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($resulte))
								{
								$nombre=$row['nombre'];
								$ape_pat=$row['ape_pat'];
								$ape_mat=$row['ape_mat'];
								}

$colorfila=0;


/*personal*/

			$result=mysql_query("SELECT id_conse_metas,id_emp,clave,clave_del,clave_uops,cta_der,cta_noder,
										 enero,dh1,ndh1,horas1,febrero,dh2,ndh2,horas2,marzo,dh3,ndh3,horas3,abril,dh4,ndh4,horas4,mayo,dh5,ndh5,horas5,
								         junio,dh6,ndh6,horas6,julio,dh7,ndh7,horas7,agosto,dh8,ndh8,horas8,septiembre,dh9,ndh9,horas9,octubre,dh10,ndh10,horas10,
								         noviembre,dh11,ndh11,horas11,diciembre,dh12,ndh12,horas12,total_gastop,fecha_cap,id_usuario,vobo,status,estrategia
								   FROM metas 
								   WHERE id_emp=$id_emp and clave='$clave'", $connect);

			$totalregistros=mysql_num_rows($result);
			$valcolor==0;
			while($row=mysql_fetch_array($result))
			{
				$id_conse_metas=$row['id_conse_metas'];
				$id_emp=$row['id_emp'];
				$clave=$row['clave'];
				$clave_del=$row['clave_del'];
				$clave_uops=$row['clave_uops'];
				$cuota_der=$row['cta_der'];
				$cuota_noder=$row['cta_noder'];
				$enero=$row['enero'];
				$dh1=$row['dh1'];
				$ndh1=$row['ndh1'];
				$horas1=$row['horas1'];
				$febrero=$row['febrero'];
				$dh2=$row['dh2'];
				$ndh2=$row['ndh2'];
				$horas2=$row['horas2'];
				$marzo=$row['marzo'];
				$dh3=$row['dh3'];
				$ndh3=$row['ndh3'];
				$horas3=$row['horas3'];
				$abril=$row['abril'];
				$dh4=$row['dh4'];
				$ndh4=$row['ndh4'];
				$horas4=$row['horas4'];
				$mayo=$row['mayo'];
				$dh5=$row['dh5'];
				$ndh5=$row['ndh5'];
				$horas5=$row['horas5'];
				$junio=$row['junio'];
				$dh6=$row['dh6'];
				$ndh6=$row['ndh6'];
				$horas6=$row['horas6'];
				$julio=$row['julio'];
				$dh7=$row['dh7'];
				$ndh7=$row['ndh7'];
				$horas7=$row['horas7'];
				$agosto=$row['agosto'];
				$dh8=$row['dh8'];
				$ndh8=$row['ndh8'];
				$horas8=$row['horas8'];
				$septiembre=$row['septiembre'];
				$dh9=$row['dh9'];
				$ndh9=$row['ndh9'];
				$horas9=$row['horas9'];
				$octubre=$row['octubre'];
				$dh10=$row['dh10'];
				$ndh10=$row['ndh10'];
				$horas10=$row['horas10'];
				$noviembre=$row['noviembre'];
				$dh11=$row['dh11'];
				$ndh11=$row['ndh11'];
				$horas11=$row['horas11'];
				$diciembre=$row['diciembre'];
				$dh12=$row['dh12'];
				$ndh12=$row['ndh12'];
				$horas12=$row['horas12'];
				$total_gastop=$row['total_gastop'];
				$fecha_cap=$row['fecha_cap'];
				$id_usuario=$row['id_usuario'];
				$vobo=$row['vobo'];
				$status=$row['status'];
				$estrategia=$row['estrategia'];


					if ($colorfila==0)
					{
						$color= "#efefef";
						$colorfila=1;
					}
					else
					{
						$color="#ffffff";
						$colorfila=0;
					}
			}
//$total_gastop=$enero+$febrero+$marzo+$abril+$mayo+$junio+$julio+$agosto+$septiembre+$octubre+$noviembre+$diciembre;
echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema</span></div>";
echo "    <h3>Captura de Personal del Presupuesto 2017</h3>";
echo "    <h2>Registro de Metas</h2>";

echo "		<p class=\"spwhite\">";
echo "		<b>Metas programadas</b>";
echo "		</p>";

echo "		<div id=\"cajaareas\">";
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



$tdh1=$cuota_der*$horas1*$dh1;$tndh1=$cuota_noder*$horas1*$ndh1;$usu1=$dh1+$ndh1;$ting1=$tdh1+$tndh1;
$tdh2=$cuota_der*$horas2*$dh2;$tndh2=$cuota_noder*$horas2*$ndh2;$usu2=$dh2+$ndh2;$ting2=$tdh2+$tndh2;
$tdh3=$cuota_der*$horas3*$dh3;$tndh3=$cuota_noder*$horas3*$ndh3;$usu3=$dh3+$ndh3;$ting3=$tdh3+$tndh3;
$tdh4=$cuota_der*$horas4*$dh4;$tndh4=$cuota_noder*$horas4*$ndh4;$usu4=$dh4+$ndh4;$ting4=$tdh4+$tndh4;
$tdh5=$cuota_der*$horas5*$dh5;$tndh5=$cuota_noder*$horas5*$ndh5;$usu5=$dh5+$ndh5;$ting5=$tdh5+$tndh5;
$tdh6=$cuota_der*$horas6*$dh6;$tndh6=$cuota_noder*$horas6*$ndh6;$usu6=$dh6+$ndh6;$ting6=$tdh6+$tndh6;
$tdh7=$cuota_der*$horas7*$dh7;$tndh7=$cuota_noder*$horas7*$ndh7;$usu7=$dh7+$ndh7;$ting7=$tdh7+$tndh7;
$tdh8=$cuota_der*$horas8*$dh8;$tndh8=$cuota_noder*$horas8*$ndh8;$usu8=$dh8+$ndh8;$ting8=$tdh8+$tndh8;
$tdh9=$cuota_der*$horas9*$dh9;$tndh9=$cuota_noder*$horas9*$ndh9;$usu9=$dh9+$ndh9;$ting9=$tdh9+$tndh9;
$tdh10=$cuota_der*$horas10*$dh10;$tndh10=$cuota_noder*$horas10*$ndh10;$usu10=$dh10+$ndh10;$ting10=$tdh10+$tndh10;
$tdh11=$cuota_der*$horas11*$dh11;$tndh11=$cuota_noder*$horas11*$ndh11;$usu11=$dh11+$ndh11;$ting11=$tdh11+$tndh11;
$tdh12=$cuota_der*$horas12*$dh12;$tndh12=$cuota_noder*$horas12*$ndh12;$usu12=$dh12+$ndh12;$ting12=$tdh12+$tndh12;

$par="spblue";
$par1="spgreen";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">Enero</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$horas1</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$dh1</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tdh1,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$ndh1</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tndh1,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$usu1</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($ting1,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">Febrero</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$horas2</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$dh2</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tdh2,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$ndh2</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tndh2,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$usu2</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($ting2,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">Marzo</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$horas3</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$dh3</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tdh3,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$ndh3</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tndh3,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$usu3</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($ting3,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">Abril</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$horas4</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$dh4</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tdh4,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$ndh4</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tndh4,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$usu4</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($ting4,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">Mayo</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$horas5</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$dh5</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tdh5,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$ndh5</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tndh5,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$usu5</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($ting5,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">Junio</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$horas6</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$dh6</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tdh6,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$ndh6</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tndh6,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$usu6</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($ting6,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">Julio</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$horas7</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$dh7</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tdh7,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$ndh7</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tndh7,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$usu7</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($ting7,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">Agosto</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$horas8</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$dh8</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tdh8,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$ndh8</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tndh8,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$usu8</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($ting8,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">Septiembre</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$horas9</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$dh9</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tdh9,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$ndh9</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tndh9,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$usu9</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($ting9,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">Octubre</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$horas10</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$dh10</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tdh10,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$ndh10</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($tndh10,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$usu10</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par1\"> " . number_format($ting10,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">Noviembre</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$horas11</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$dh11</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tdh11,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$ndh11</span></td>
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($tndh11,2) . "</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par\">$usu11</span></td>			
			<td bgcolor=\"$celda\" align=\"right\"><span class=\"$par\"> " . number_format($ting11,2) . "</span></td>
</tr>";

echo "		<tr>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">Diciembre</span></td>
			<td bgcolor=\"$celda\" align=\"center\"><span class=\"$par1\">$horas12</span></td>
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
			<td bgcolor=\"$celda\" align=\"left\" colspan=\"7\"><span class=\"$par\">$estrategia</span></td>
</tr>";

echo "		</table>";

echo "<br><br>";

/*
$_SESSION['elimina']=$_REQUEST['elimina'];
$elimina=$_SESSION['elimina'];

if (isset($elimina)) {
$_SESSION['id_empel']=$_REQUEST['id_empel'];
$_SESSION['claveel']=$_REQUEST['claveel'];
$id_empel=$_SESSION['id_empel'];
$claveel=$_SESSION['claveel'];

$sqlEliminar = mysql_query("DELETE FROM metas WHERE id_emp=$id_empel and clave='$claveel'", $connect) or die(mysql_error());
	if($sqlEliminar)
	{
	//echo "<span class=\"spred\">Registro eliminado</span><br>";
			header("Location: metas.php");
	}
	else
	{
	echo "<span class=\"spred\">Error al eliminar el registro!!!</span><br>";
	}	
}
*/
	if($status==4)
	{
	echo "<input type=\"button\" value=\"Atr&aacute;s\" onclick=\"history.go(-1)\" /> | <a href=\"edita_metas.php?id_emp=$id_emp&&clave=$clave\" class=\"spred\">Editar</a>";
	}
	else
	{
	echo "<input type=\"button\" value=\"atras\" onclick=\"history.go(-1)\" />";	
	}
echo "   	</div>";//cajaareas 
echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor

echo" </body>";
echo" </html>";

?>