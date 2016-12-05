<?php

session_start();
$clave=$_SESSION["clave"];
$tipo_usuario=$_SESSION["tipo_usuario"];

include "clases/variablesbd.php";

	//conexion a la base de datos
	$connect=mysql_connect("$host","$user","$passworks");

	//Seleccion de la base
	mysql_select_db("$dbname",$connect);


$_SESSION['id_emp']=$_REQUEST['id_emp'];
$id_emp=$_SESSION['id_emp'];


echo "<!doctype html>";
echo "<html>";
echo "<head>";
echo "<meta charset=\"ISO-8859-1\">";
echo "<title>Plan Personal 2017</title>";
echo "<style type=\"text/css\">";
echo "</style>";
echo "</head>";

echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"personal.css\" >";

			$result=mysql_query("select desc_uops, desc_del, id_cuota from cat_delegaciones where clave='$clave'", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$desc_uops=$row['desc_uops'];
								$desc_del=$row['desc_del'];
								$id_cuota=$row['id_cuota'];
								}

echo "<body>";
echo "<center>";
echo "<table width=\"80%\" border=\"0\" bgcolor=\"#FFFFFF\">";
echo "  <tr><td>&nbsp;</td></tr>";
echo "  <tr>";
echo "    <td align=\"center\">";

echo "        <table width=\"90%\" border=\"0\" bgcolor=\"#000000\">";
echo "          <tr>";
echo "            <th scope=\"col\">Programa de Trabajo 2017</th>";
echo "          </tr>";
echo "        </table>";
echo "    </td>";
echo "  </tr>";

echo "  <tr><td>&nbsp;</td></tr>";
echo "  <tr><td>&nbsp;</td></tr>";

			$resultp=mysql_query("select nombre,ape_pat,ape_mat,clave_act,clave_par,conse_categoria,ene,feb,mar,abr,may,jun,jul,ago,sep,oct,nov,dic,presentacion,objetivo_gral,aplicacion
								  from personal 
								  where clave='$clave' and id_emp=$id_emp", $connect);

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
								$presentacion=$row['presentacion'];
								$objetivo_gral=$row['objetivo_gral'];
								$aplicacion=$row['aplicacion'];
								}


			$result=mysql_query("select clave_act, actividad from cat_actividades_i where clave_act=$clave_act", $connect);

								$totalregistros=mysql_num_rows($result);
								while($row=mysql_fetch_array($result))
								{
								$clave_act=$row['clave_act'];
								$actividad=$row['actividad'];
								}


			$result=mysql_query("select desc_categoria, subtotal from cat_categoria where conse_categoria=$conse_categoria", $connect);

								$totalregistros=mysql_num_rows($result);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($result))
								{
								$desc_categoria=$row['desc_categoria'];
								$subtotal=$row['subtotal'];
								}
								//$actividad=strtoupper($actividad);
echo "  <tr>";
echo "    <td align=\"center\">";
echo "        <table width=\"90%\" border=\"0\" bgcolor=\"#ffffff\">";
echo "          <tr><td align=\"center\"><span class=\"black\"><h1>$nombre $ape_pat $ape_mat</h1></span></td></tr>";
echo "          <tr><td align=\"center\"><span class=\"black\"><h1>$actividad - $desc_categoria</h1></span></span></td></tr>";
echo "          <tr><td align=\"center\"><span class=\"black\"><h1>$desc_del $desc_uops</h1></span></span></td></tr>";
echo "          <tr><td>&nbsp;</td></tr>";
echo "  		  <tr><td>&nbsp;</td></tr>";
echo "          <tr><td align=\"left\"><span class=\"black\">PRESENTACION</span></span></td></tr>";
echo "  		  <tr><td align=\"left\">$presentacion</td></tr>";
echo "  		  <tr><td>&nbsp;</td></tr>";
echo "          <tr><td align=\"left\"><span class=\"black\">OBJETIVO GENERAL</span></span></td></tr>    ";
echo "  		  <tr><td align=\"left\">$objetivo_gral</td></tr>          ";
echo "  		  <tr><td>&nbsp;</td></tr>          ";
echo "          <tr><td align=\"left\"><span class=\"black\">AMBITO DE APLICACI&Oacute;N</span></span></td></tr>";
echo "  		  <tr><td align=\"left\">$aplicacion</td></tr>          ";
echo "  		  <tr><td>&nbsp;</td></tr>          ";
echo "        </table>";
echo "    </td>";
echo "  </tr>";

echo "  <tr><td><hr></td></tr>	";

echo "  <tr>";
echo "    <td align=\"center\">";

echo "        <table width=\"90%\" border=\"0\" bgcolor=\"#000000\">";
echo "          <tr>";
echo "            <th scope=\"col\">Metas de Atenci&oacute;n a Usuarios 2017</th>";
echo "          </tr>";
echo "        </table>";
echo "    </td>";
echo "  </tr>";

echo "  <tr><td>&nbsp;</td></tr>	";

echo "  <tr>";
echo "    <td align=\"center\">";
echo "        <table width=\"90%\" border=\"0\" bgcolor=\"#000000\">";
echo "          <tr>";
echo "            <td align=\"center\"><span class=\"white\">Mes</span></td>";
echo "            <td align=\"center\"><span class=\"white\">Horas x mes</span></td>";
echo "            <td align=\"center\"><span class=\"white\">Derechohabientes</span></td>";
echo "            <td align=\"center\"><span class=\"white\">Importe DH</span></td>";
echo "            <td align=\"center\"><span class=\"white\">No Derechohabientes</span></td>";
echo "            <td align=\"center\"><span class=\"white\">Importe NDH</span></td>";
echo "            <td align=\"center\"><span class=\"white\">Total Usuarios</span></td>";
echo "            <td align=\"center\"><span class=\"white\">Total Ingresos</span></td>";
echo "          </tr>";

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




echo "          <tr>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">Enero</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$horas1</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$dh1</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tdh1,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$ndh1</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tndh1,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$usu1</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($ting1,2) . "</td>";
echo "          </tr>";

echo "          <tr>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">Febrero</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$horas2</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$dh2</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tdh2,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$ndh2</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tndh2,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$usu2</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($ting2,2) . "</td>";
echo "          </tr>";

echo "          <tr>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">Marzo</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$horas3</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$dh3</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tdh3,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$ndh3</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tndh3,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$usu3</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($ting3,2) . "</td>";
echo "          </tr>";

echo "          <tr>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">Abril</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$horas4</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$dh4</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tdh4,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$ndh4</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tndh4,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$usu4</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($ting4,2) . "</td>";
echo "          </tr>";

echo "          <tr>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">Mayo</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$horas5</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$dh5</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tdh5,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$ndh5</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tndh5,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$usu5</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($ting5,2) . "</td>";
echo "          </tr>";

echo "          <tr>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">Junio</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$horas6</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$dh6</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tdh6,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$ndh6</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tndh6,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$usu6</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($ting6,2) . "</td>";
echo "          </tr>";

echo "          <tr>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">Julio</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$horas7</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$dh7</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tdh7,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$ndh7</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tndh7,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$usu7</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($ting7,2) . "</td>";
echo "          </tr>";

echo "          <tr>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">Agosto</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$horas8</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$dh8</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tdh8,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$ndh8</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tndh8,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$usu8</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($ting8,2) . "</td>";
echo "          </tr>";

echo "          <tr>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">Septiembre</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$horas9</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$dh9</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tdh9,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$ndh9</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tndh9,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$usu9</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($ting9,2) . "</td>";
echo "          </tr>";

echo "          <tr>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">Octubre</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$horas10</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$dh10</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tdh10,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$ndh10</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tndh10,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$usu10</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($ting10,2) . "</td>";
echo "          </tr>";

echo "          <tr>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">Noviembre</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$horas11</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$dh11</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tdh11,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$ndh11</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tndh11,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$usu11</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($ting11,2) . "</td>";
echo "          </tr>";

echo "          <tr>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">Diciembre</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$horas12</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$dh12</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tdh12,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$ndh12</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($tndh12,2) . "</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$usu12</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"right\"> " . number_format($ting12,2) . "</td>";
echo "          </tr>";

$totdh=$tdh1+$tdh2+$tdh3+$tdh4+$tdh5+$tdh6+$tdh7+$tdh8+$tdh9+$tdh10+$tdh11+$tdh12;
$totndh=$tndh1+$tndh2+$tndh3+$tndh4+$tndh5+$tndh6+$tndh7+$tndh8+$tndh9+$tndh10+$tndh11+$tndh12;
$gtot=$totdh+$totndh;

echo "		<tr>
			<td align=\"right\" colspan=\"3\"><span class=\"white\"><b>Total: &nbsp;</b></span></td>
			<td align=\"right\"><span class=\"white\"><b> " . number_format($totdh,2) . "</b></span></td>
			<td align=\"right\"><span class=\"white\"><b>Total: &nbsp;</b></span></td>
			<td align=\"right\"><span class=\"white\"><b> " . number_format($totndh,2) . "</b></span></td>
			<td align=\"right\"><span class=\"white\"><b>Total: &nbsp;</b></span></td>			
			<td align=\"right\"><span class=\"white\"><b> " . number_format($gtot,2) . "</b></span></td>
</tr>";




echo "        </table>";
echo "    </td>";
echo "  </tr>";

echo "  <tr><td>&nbsp;</td></tr>          ";

echo "  <tr>";
echo "    <td align=\"center\">";
echo "        <table width=\"90%\" border=\"0\" bgcolor=\"#ffffff\">";
echo "          <tr><td align=\"left\"><span class=\"black\">ESTRATEGIAS:</span></span></td></tr>        ";
echo "  		  <tr><td align=\"left\">$estrategia</td></tr>          ";
echo "  		  <tr><td>&nbsp;</td></tr>          ";
echo "        </table>";
echo "	</td>";
echo "  </tr>";

echo "  <tr><td><hr></td></tr>	";

echo "  <tr>";
echo "    <td align=\"center\">";

echo "        <table width=\"90%\" border=\"0\" bgcolor=\"#000000\">";
echo "          <tr>";
echo "            <th scope=\"col\">Plan de Trabajo 2017</th>";
echo "          </tr>";
echo "        </table>";
echo "    </td>";
echo "  </tr>";

echo "  <tr><td>&nbsp;</td></tr>	";

echo "  <tr>";
echo "    <td align=\"center\">";
echo "        <table width=\"90%\" border=\"0\" bgcolor=\"#000000\">";
echo "          <tr>";
echo "            <td align=\"center\" rowspan=\"2\"><span class=\"white\">Tema</span></td>";
echo "            <td align=\"center\" rowspan=\"2\"><span class=\"white\">Objetivo Particular</span></td>";
echo "            <td align=\"center\" rowspan=\"2\"><span class=\"white\">T&eacute;cnica Did&aacute;</span></td>";
echo "            <td align=\"center\" rowspan=\"2\"><span class=\"white\">Instalaci&oacute;n/Material Did&aacute;ctico</span></td>";
echo "            <td align=\"center\" colspan=\"2\"><span class=\"white\">Actividades</span></td>";
echo "            <td align=\"center\" rowspan=\"2\"><span class=\"white\">No. de sesiones</span></td>";
echo "            <td align=\"center\" rowspan=\"2\"><span class=\"white\">Hrs. x sesion</span></td>";
echo "          </tr>";
echo "          <tr>";
echo "            <td bgcolor=\"#222222\" align=\"center\"><span class=\"white\">Docente</span></td>";
echo "            <td bgcolor=\"#222222\" align=\"center\"><span class=\"white\">Usuario</span></td>";
echo "          </tr>";

			$resultc=mysql_query("select conse_plan,tema,objpar,tecnica,material,docente,usuario,sesiones,horasxsesion from plan where clave='$clave' and id_emp=$id_emp order by conse_plan", $connect);
								$totalregistros=mysql_num_rows($resultc);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($resultc))
								{
								$conse_plan=$row['conse_plan'];	
								$tema=$row['tema'];
								$objpar=$row['objpar'];
								$tecnica=$row['tecnica'];
								$material=$row['material'];
								$docente=$row['docente'];
								$usuario=$row['usuario'];
								$sesiones=$row['sesiones'];
								$horasxsesion=$row['horasxsesion'];

echo "          <tr>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">$tema</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">$objpar</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">$tecnica</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">$material</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">$docente</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">$usuario</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$sesiones</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"center\">$horasxsesion</td>";
echo "          </tr>";


								}

echo "        </table>";
echo "    </td>";
echo "  </tr>";

echo "  <tr><td>&nbsp;</td></tr>          ";
echo "  <tr><td><hr></td></tr>	";

echo "  <tr>";
echo "    <td align=\"center\">";

echo "        <table width=\"90%\" border=\"0\" bgcolor=\"#000000\">";
echo "          <tr>";
echo "            <th scope=\"col\">Programa de Trabajo 2017</th>";
echo "          </tr>";
echo "        </table>";
echo "    </td>";
echo "  </tr>";

echo "  <tr><td>&nbsp;</td></tr>	";

echo "  <tr>";
echo "    <td align=\"center\">";
echo "        <table width=\"90%\" border=\"0\" bgcolor=\"#000000\">";
echo "          <tr>";
echo "            <td align=\"center\" rowspan=\"2\"><span class=\"white\">Mes</span></td>";
echo "            <td align=\"center\" rowspan=\"2\"><span class=\"white\">Semana</span></td>";
echo "            <td align=\"center\" colspan=\"3\"><span class=\"white\">Actividad por Nivel</span></td>            ";
echo "			  <td align=\"center\" rowspan=\"2\"><span class=\"white\">Observaciones</span></td>";
echo "          </tr>";
echo "          <tr>";
echo "            <td bgcolor=\"#222222\" align=\"center\"><span class=\"white\">Fase Cognitiva</span></td>";
echo "            <td bgcolor=\"#222222\" align=\"center\"><span class=\"white\">Fase Asociativa</span></td>";
echo "            <td bgcolor=\"#222222\" align=\"center\"><span class=\"white\">Fase Auton&oacute;mica</span></td>";
echo "          </tr>";

			$resultc=mysql_query("select id_conse_programa,mes,semanas,principiantes,intermedios,avanzados,observaciones from programa where clave='$clave' and id_emp=$id_emp order by id_conse_programa", $connect);
								$totalregistros=mysql_num_rows($resultc);
								//se recogen las consultas en un array y se muestran

								while($row=mysql_fetch_array($resultc))
								{
								$mes=$row['mes'];
								$semanas=$row['semanas'];
								$principiantes=$row['principiantes'];
								$intermedios=$row['intermedios'];
								$avanzados=$row['avanzados'];
								$observaciones=$row['observaciones'];
								$id_conse_programa=$row['id_conse_programa'];

								if($valcolor==0)
								{$color="spgreen"; $valcolor=1;}
								else
								{$color="spblue"; $valcolor=0;}

								if($mes==1){$desc_mes="Enero";}
								if($mes==2){$desc_mes="Febrero";}
								if($mes==3){$desc_mes="Marzo";}
								if($mes==4){$desc_mes="Abril";}
								if($mes==5){$desc_mes="Mayo";}
								if($mes==6){$desc_mes="Junio";}
								if($mes==7){$desc_mes="Julio";}
								if($mes==8){$desc_mes="Agosto";}
								if($mes==9){$desc_mes="Septiembre";}
								if($mes==10){$desc_mes="Octubre";}
								if($mes==11){$desc_mes="Noviembre";}
								if($mes==12){$desc_mes="Diciembre";}


echo "          <tr>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">$desc_mes</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">$semanas</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">$principiantes</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">$intermedios</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">$avanzados</td>";
echo "            <td bgcolor=\"#FFFFFF\" align=\"left\">$observaciones</td>";
echo "          </tr>";

								}
echo "        </table>";
echo "    </td>";
echo "  </tr>";

echo "  <tr><td>&nbsp;</td></tr>";
echo "  <tr><td>&nbsp;</td></tr>";

$_SESSION['vobo']=$_REQUEST['vobo'];
$vobo=$_SESSION['vobo'];

if (isset($vobo))
{
	//echo "DEFINIDA $clave $vobo";

/***FORMULARIO RESPUESTA***/

	$result=mysql_query("select desc_uops, desc_del from cat_delegaciones where clave=$clave", $connect);

	$totalregistros=mysql_num_rows($result);
	//se recogen las consultas en un array y se muestran

		while($row=mysql_fetch_array($result))
		{
		$desc_uops=$row['desc_uops'];
		$desc_del=$row['desc_del'];
		}




									$sqlUpdate = mysql_query("UPDATE personal SET status=5 where clave='$clave' and id_emp=$id_emp", $connect) or die(mysql_error());

									//echo "UPDATE datos_cvr SET id_status=2 where clave='$clave' and conse_cvr=$conse_cvr  $email";

									if($sqlUpdate)
									{
									echo "Este usuario ha obtenido su vobo!!!";
										$sqlUpdate1 = mysql_query("UPDATE metas SET status=5 where clave='$clave' and id_emp=$id_emp", $connect) or die(mysql_error());
										$sqlUpdate2 = mysql_query("UPDATE plan SET status=5 where clave='$clave' and id_emp=$id_emp", $connect) or die(mysql_error());
										$sqlUpdate3 = mysql_query("UPDATE programa SET status=5 where clave='$clave' and id_emp=$id_emp", $connect) or die(mysql_error());
									}


}
		if($status==5)
		{
		echo "<tr><td align=\"center\"><a href=\"imprime_programa_persona.php\">Imprimir</a></td></tr>";
		}
		else
		{
			if($tipo_usuario=='JD4')
			{
				echo "<form name='form1' action='".$_SERVER['PHP_SELF']."' method='POST'>";
				echo "<tr><td align=\"center\"><input name=\"vobo\" type=\"checkbox\" value=\"si\"> Visto bueno | <a href=\"imprime_programa_persona.php\">Imprimir</a></td></tr>";
				echo "<input type=\"hidden\" name=\"clave\" value=\"$clave\">";
				echo "<input type=\"hidden\" name=\"id_emp\" value=\"$id_emp\">";
				echo "<tr><td align=\"center\"><input type=\"submit\" value=\"continuar\" /></td></tr>";
				echo "</form>";
			}
			else
			{
				echo "<tr><td align=\"center\"><a href=\"imprime_programa_persona.php\">Imprimir</a></td></tr>";
			}
		}

echo "  <tr><td>&nbsp;</td></tr>";
echo "  <tr><td>&nbsp;</td></tr>";


echo "</table>";
echo "</center>";
echo "</body>";
echo "</html>";
?>