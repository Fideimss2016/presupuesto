<?php
include "valida_seguridad.php";
include "clases/variablesbd.php";
echo" <link rel=\"stylesheet\" type=\"text/css\" href=\"contenido.css\" >";

echo" <body>";
echo "<div id=\"contenedor\">";
echo "	<div id=\"contenido_cont\">";

$usuario_sistema=$_SESSION["usuario_sistema"];
$clave=$_SESSION["clave"];
$tipo_usuario=$_SESSION["tipo_usuario"];

echo "    <div align=\"right\"><span class=\"blue\">Bienvenido $usuario_sistema $tipo_usuario</span></div>";
echo "    <h3>Captura Presupuesto 2017</h3>";

echo "		<p class=\"spwhite\">";
echo "		<b>Resumen de Capturas en el Sistema de Presupuesto 2017</b>";
echo "		</p>";

echo "		<div id=\"cajaareas\">";


	//conexion a la base de datos
	$connect=mysql_connect("$host","$user","$passworks");

	//Seleccion de la base
	mysql_select_db("$dbname",$connect);

echo" <body>";

$celda="#1a1a1a";
$tabla="#666666";
$celda1="#666666";
$c1="#222222";
$not="#00ff00";
$nonot="#ff0000";

/*INGRESOS*/

if (!empty($_POST['clavenot']))
{ 
$_SESSION['clavenot']=$_REQUEST['clavenot'];
$clavenot=$_SESSION['clavenot'];
//echo "definida: $clavenot";
		$sqlUpdate = mysql_query("UPDATE vobo SET notifica=1
							  	  WHERE clave='$clavenot'", $connect) or die(mysql_error());

									if($sqlUpdate)
									{							

									$hoy = date("Y-m-d H:i:s");
									
									$clacon=substr($clavenot,0,2);


									$result=mysql_query("select u.nombre, u.ape_pat, u.ape_mat, u.email, cd.desc_uops, cd.desc_del from usuarios u, cat_delegaciones cd where u.clave='$clavenot' and cd.clave=u.clave", $connect);

									$totalregistros=mysql_num_rows($result);
									//se recogen las consultas en un array y se muestran

										while($row=mysql_fetch_array($result))
										{
										$nombre=$row['nombre'];
										$ape_pat=$row['ape_pat'];
										$ape_mat=$row['ape_mat'];
										$email=$row['email'];
										$desc_uops=$row['desc_uops'];
										$desc_del=$row['desc_del'];
										}


											$clacon=substr($clave,0,2);

											$resultj=mysql_query("SELECT nombre_1,email_1,nombre_2,email_2,nombre_3,email_3 FROM jefes_mail WHERE clave like '$clacon%'", $connect);
											$totalregistros=mysql_num_rows($resultj);
											while($row=mysql_fetch_array($resultj))
											{
												$nombre_1=$row['nombre_1'];
												$email_1=$row['email_1'];
												$nombre_2=$row['nombre_2'];
												$email_2=$row['email_2'];
												$nombre_3=$row['nombre_3'];
												$email_3=$row['email_3'];
											}

								$jefe="$nombre $ape_pat $ape_mat";
								//$destinatario = "esanchez.parrazales@gmail.com";
								$destinatario = "$email";

								//$destinatario = "leticia.giles@fideimss.org.mx";
								$asunto = "Revision de Plan Rector 2017 - Egresos";

								$cuerpo = "
								<html>
								<head>
								   <title> .:Plan Rector 2017:. </title>
								</head>
								<body>
								<h1>.:Plan Rector 2017:.</h1>
								<p>
								<b>$jefe</b><br><br> Le informo que he dado vobo a su Plan Rector 2017 correspoendiente al &Aacute;rea de Egresos, Obra y Adquisiciones, y Personal de $desc_uops, ya pueden imprimir el programa, recolectar firmas y enviarlo a este fideicomiso, para analizar la viabilidad de su proyecto.<br><br><b>C.P. Martha Maria Benitez Arroyo</b>
								</p>
								</body>
								</html>
								";

								//para el envío en formato HTML
								$headers = "MIME-Version: 1.0\r\n";
								$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

								//dirección del remitente
								$headers .= "From: FIDEICOMISO PARA EL DESARROLLO DEL DEPORTE <fideimss@fideimss.org.mx>\r\n";

								//dirección de respuesta, si queremos que sea distinta que la del remitente
								$headers .= "Reply-To: fideimss@fideimss.org.mx\r\n";

								//ruta del mensaje desde origen a destino
								//$headers .= "Return-path: holahola@desarrolloweb.com\r\n";

								//direcciones que recibián copia
								$headers .= "Cc: leticia.giles@fideimss.org.mx, macrina.bravo@fideimss.org.mx, humberto.ayanegui@fideimss.org.mx, $email_1, $email_2, $email_3\r\n";
								//$headers .= "Cc: martha.benitez@fideimss.org.mx\r\n";

								//direcciones que recibirán copia oculta
								$headers .= "Bcc: maricela.jimenez@imss.gob.mx, martha.benitez@fideimss.org.mx, fideimss@fideimss.org.mx\r\n";
								//$headers .= "Bcc: martha.benitez@fideimss.org.mx\r\n";

								mail($destinatario,$asunto,$cuerpo,$headers);
																	
																	}
																	else
																	{
																	echo "<br>Error al enviar Presupuesto 2017!!!";
																	}

}/*end if clavenot*/
else
{
//echo "no definida: $clavenot";
}


if (!isset($_REQUEST['p']))
{
//echo "webs";
}
else
{

$p=$_REQUEST['p'];
$clapers=$_REQUEST['clave'];

	if ($p=='t') {
		//echo "si cambia $p $clapers";		
		$sqlUpdateps = mysql_query("UPDATE vobo SET jefe_p=1
							  	  WHERE clave='$clapers'", $connect) or die(mysql_error());
	

	}	
	else
	{

		//echo "no cambia";		
	}
}

if (!isset($_REQUEST['e']))
{
//echo "webs";
}
else
{

$e=$_REQUEST['e'];
$clapegs=$_REQUEST['clave'];

	if ($e=='t') {
		//echo "si cambia E $e $clapegs";		
		
		$sqlUpdateps = mysql_query("UPDATE vobo SET jefe_e=1
							  	  WHERE clave='$clapegs'", $connect) or die(mysql_error());
							  	  
	}	
	else
	{

		//echo "no cambia";		
	}
}


if (!isset($_REQUEST['in']))
{
//echo "webs";
}
else
{

$in=$_REQUEST['in'];
$clapin=$_REQUEST['clave'];

	if ($in=='t') {
		echo "si cambia IN $in $clapin";		
		
		$sqlUpdatein = mysql_query("UPDATE vobo SET jefe_i=1
							  	  WHERE clave='$clapin'", $connect) or die(mysql_error());
							  	  
	}	
	else
	{

		//echo "no cambia";		
	}
}


echo "    <h2>Resumen</h2>";

echo "<table width=\"100%\" border=\"0\" bgcolor=\"$tabla\" cellpadding=\"1\" cellspacing=\"1\">";


$result=mysql_query("select distinct(i.clave_del),cd.desc_del from ingresos i,cat_delegaciones cd where i.clave_del=cd.clave_del order by i.clave_del", $connect);
$totalregistros=mysql_num_rows($result);

while($row=mysql_fetch_array($result))
{
$clave_del=$row['clave_del'];
$desc_del=$row['desc_del'];

	      if( $tipo_usuario=='ADM' || $tipo_usuario=='SUP')
	      {
			echo "<tr><th scope=\"col\" bgcolor=\"$c1\" colspan=\"7\" align=\"left\"><span class=\"spgrey\">&nbsp;<b>$desc_del</b></th></tr>";
	      }
	      else
	      {
			echo "<tr><th scope=\"col\" bgcolor=\"$c1\" colspan=\"6\" align=\"left\"><span class=\"spgrey\">&nbsp;<b>$desc_del</b></th></tr>";
	      }
	//echo "select i.clave, sum(i.ingreso_total) as ingretot, i.status as statusi, cd.desc_uops, cd.pto2013 from ingresos i ,cat_delegaciones cd where i.clave_del=$clave_del and cd.clave=i.clave group by clave,status order by clave";
	$result1=mysql_query("select i.clave, sum(i.ingreso_total) as ingretot, i.status as statusi, cd.desc_uops, cd.pto2013 from ingresos i ,cat_delegaciones cd where i.clave_del=$clave_del and cd.clave=i.clave group by clave,status order by clave", $connect);
	$totalregistros=mysql_num_rows($result1);

	echo "<tr>
	      <td bgcolor=\"$celda\" align=\"left\"><span class=\"white\">Unidad Operativa</span></td>
	      <td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Presupuesto 2015 (ingresos)</span></td>
	      <td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Ingreso 2017</span></td>
	      <td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Egreso 2017</span></td>
	      <td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Obra 2017</span></td>
	      <td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Personal 2017</span></td>
	      ";
	      if( $tipo_usuario=='ADM' || $tipo_usuario=='SUP')
	      {
      	   echo "<td bgcolor=\"$celda\" align=\"center\"><span class=\"white\">Notificar Vobo</span></td>";
	      }
	      else
	      {

	      }

	echo "</tr>";

	while($row=mysql_fetch_array($result1))
	{
	$clave=$row['clave'];
	$ingretot=$row['ingretot'];
	$statusi=$row['statusi'];
	$desc_uops=$row['desc_uops'];
	$pto2013=$row['pto2013'];


	$ingretot=round($ingretot,2);

	if($valcolor==0)
	{$color="spgreen"; $valcolor=1; $c2="#444444";}
	else
	{$color="spblue"; $valcolor=0; $c2="#555555";}



	echo "
		  <tr>
	      <td bgcolor=\"$c2\" align=\"left\" rowspan=\"2\"><span class=\"$color\">$clave $desc_uops </span><a href=\"vcapturas.php?clave=$clave\" class=\"grey\" target=\"_blank\">ver detalle</a>
		   | <a href=\"ingresos_excel.php?clave=$clave\" class=\"grey\" target=\"_blank\">Ingresos a excel</a>
		   | <a href=\"egresos_excel.php?clave=$clave\" class=\"grey\" target=\"_blank\">Egresos a excel</a>
		   | <a href=\"obras_excel.php?clave=$clave\" class=\"grey\" target=\"_blank\">Obra a excel</a>
		   | <a href=\"personal_excel.php?clave=$clave\" class=\"grey\" target=\"_blank\">Personal a excel</a>
		   </td>
	      <td bgcolor=\"$c2\" align=\"center\" rowspan=\"2\"><span class=\"$color\"> " .number_format($pto2013,2) . "</span></td>
	      <td bgcolor=\"$c2\" align=\"center\"><span class=\"$color\"> " .number_format($ingretot,2) . "</span></td>";

	$result2=mysql_query("select sum(e.total_gasto) as total_gasto, e.status as statuse from egresos e where e.clave=$clave", $connect);
	$totalregistros=mysql_num_rows($result2);

	while($row=mysql_fetch_array($result2))
	{
	$total_gasto=$row['total_gasto'];
	$statuse=$row['statuse'];
	}

	$result3=mysql_query("select sum(o.monto) as monto, o.status as statuso from obras o where o.clave='$clave'", $connect);
	$totalregistros=mysql_num_rows($result3);

	while($row=mysql_fetch_array($result3))
	{
	$monto=$row['monto'];
	$statuso=$row['statuso'];
	//if(!$monto=''){$monto=0;}
	}

	$result4=mysql_query("select sum(p.gas_anual) as gas_anual, p.status as statusp from personal p where p.clave='$clave'", $connect);
	$totalregistros=mysql_num_rows($result4);

	while($row=mysql_fetch_array($result4))
	{
	$gas_anual=$row['gas_anual'];
	$statusp=$row['statusp'];
	}

	$resultnot=mysql_query("select notifica from vobo where clave='$clave'", $connect);
	$totalregistros=mysql_num_rows($resultnot);

	while($row=mysql_fetch_array($resultnot))
	{
	$notifica=$row['notifica'];
	}



		  echo"
	      <td bgcolor=\"$c2\" align=\"center\"><span class=\"$color\"> " .number_format($total_gasto,2) . "</span></td>
	      <td bgcolor=\"$c2\" align=\"center\"><span class=\"$color\"> " .number_format($monto,2) . "</span></td>
	      <td bgcolor=\"$c2\" align=\"center\"><span class=\"$color\"> " .number_format($gas_anual,2) . "</span></td>
	      ";	
	      if( $tipo_usuario=='ADM' || $tipo_usuario=='SUP')
	      {

	      	  if($statuse==3 && $statuso==3 && $statusp==3)
	      	  {
	      	   	
	      	  	if( $notifica==0)
	      	  	{
	      	   	echo "<td bgcolor=\"$c2\" align=\"center\" rowspan=\"2\">";
				echo "<form name='form1' action='detalle_adm_1.php' method='POST'>";
				echo "<input type=\"hidden\" name=\"clavenot\" value=\"$clave\">";
				echo "<input type=\"submit\" value=\"notificar\" />";
				echo "</form></td>";
	      	  	}
	      	  	else
	      	  	{
				echo "<td bgcolor=\"$c2\" align=\"center\" rowspan=\"2\"><font color=\"$not\">NOTIFICADO</font></td>";	      	  			
	      	  	}
	      	  }

	      	  else if(($statuse==3 || $statuse==0 && $total_gasto==0) && ($statuso==3 || $statuso==0 && $monto==0) && ($statusp==3 || $statusp==0 && $gas_anual==0))
	      	  {
	      	   	
	      	  	if( $notifica==0)
	      	  	{
	      	   	echo "<td bgcolor=\"$c2\" align=\"center\" rowspan=\"2\">";
				echo "<form name='form1' action='detalle_adm_1.php' method='POST'>";
				echo "<input type=\"hidden\" name=\"clavenot\" value=\"$clave\">";
				echo "<input type=\"submit\" value=\"notificar\" />";
				echo "</form></td>";
	      	  	}
	      	  	else
	      	  	{
				echo "<td bgcolor=\"$c2\" align=\"center\" rowspan=\"2\"><font color=\"$not\">NOTIFICADO</font></td>";	      	  			
	      	  	}
	      	  }


	      	  else
	      	  {
	      	   echo "<td bgcolor=\"$c2\" align=\"center\" rowspan=\"2\"><font color=\"$nonot\">SIN NOTIFICAR</font></td>";
	      	  }

	      }
	      else
	      {

	      }



	      echo "</tr>";

		  echo "<tr>";

	  		if($statusi==0)
			{


				$resultcomp=mysql_query("select jefe_i as jefe_i from vobo where clave='$clave'", $connect);
				$totalregistros=mysql_num_rows($resultcomp);

				while($row=mysql_fetch_array($resultcomp))
				{
				$jefe_i=$row['jefe_i'];
				}
				if($ingretot==0 && $jefe_i==1)
				{
					echo "    <td bgcolor=\"$c2\" align=\"center\"><span class=$color><a href=\"\" title=\"cerrado\"><img src=\"candado.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
				else
				{
					echo "    <td bgcolor=\"$c2\" align=\"center\"><span class=$color><a href=\"detalle_adm_1.php?in=t&&clave=$clave\" title=\"capturando registros\"><img src=\"capturando.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
			}
		else if($statusi==1)
			{
			echo "    <td bgcolor=\"$c2\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision por el jefe d oficina\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
			}
		else if($statusi==2)
			{
			echo "    <td bgcolor=\"$c2\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" /></a></span></td>";
			}
		else if($statusi==3)
			{
			echo "    <td bgcolor=\"$c2\" align=\"center\"><span class=$color><a href=\"\"  title=\"program aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
			}

	  		if($statuse==0)
			{

				$resultcomp=mysql_query("select jefe_e as jefe_e from vobo where clave='$clave'", $connect);
				$totalregistros=mysql_num_rows($resultcomp);

				while($row=mysql_fetch_array($resultcomp))
				{
				$jefe_e=$row['jefe_e'];
				}
				//echo "$clave total_gasto: $total_gasto jefe: $jefe_e <br>";	

				if($total_gasto==0 && $jefe_e==1)
				{
					echo "    <td bgcolor=\"$c2\" align=\"center\"><span class=$color><a href=\"\" title=\"cerrado\"><img src=\"candado.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
				else
				{
					echo "    <td bgcolor=\"$c2\" align=\"center\"><span class=$color><a href=\"detalle_adm_1.php?e=t&&clave=$clave\" title=\"capturando registros\"><img src=\"capturando.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
			}
		else if($statuse==1)
			{
			echo "    <td bgcolor=\"$c2\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision por el jefe d oficina\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
			}
		else if($statuse==2)
			{
			echo "    <td bgcolor=\"$c2\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" /></a></span></td>";
			}
		else if($statuse==3)
			{
			echo "    <td bgcolor=\"$c2\" align=\"center\"><span class=$color><a href=\"\"  title=\"program aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
			}

	  		if($statuso==0)
			{

				//echo "select jefe_o as jefe_o from vobo where clave='$clave'";	
				$resultcomp=mysql_query("select jefe_o as jefe_o from vobo where clave='$clave'", $connect);
				$totalregistros=mysql_num_rows($resultcomp);

				while($row=mysql_fetch_array($resultcomp))
				{
				$jefe_o=$row['jefe_o'];
				}

				//echo "$clave monto: $monto jefe: $jefe_o <br>";

				if($monto==0 && $jefe_o==1)
				{
					echo "    <td bgcolor=\"$c2\" align=\"center\"><span class=$color><a href=\"\" title=\"cerrado\"><img src=\"candado.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
				else
				{
					echo "    <td bgcolor=\"$c2\" align=\"center\"><span class=$color><a href=\"\" title=\"capturando registros\"><img src=\"capturando.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
			}
		else if($statuso==1)
			{
			echo "    <td bgcolor=\"$c2\" align=\"center\"><span class=$color><a href=\"\" title=\"programa en revision por el jefe d oficina\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
			}
		else if($statuso==2)
			{
			echo "    <td bgcolor=\"$c2\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" /></a></span></td>";
			}
		else if($statuso==3 || $statuso==5)
			{
			echo "    <td bgcolor=\"$c2\" align=\"center\"><span class=$color><a href=\"\"  title=\"program aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
			}

	  		if($statusp==0 || $statusp==10)
			{

				$resultcomp=mysql_query("select jefe_p as jefe_p from vobo where clave='$clave'", $connect);
				$totalregistros=mysql_num_rows($resultcomp);

				while($row=mysql_fetch_array($resultcomp))
				{
				$jefe_p=$row['jefe_p'];
				}


				if($gas_anual==0 && $jefe_p==1)
				{
					echo "    <td bgcolor=\"$c2\" align=\"center\"><span class=$color><a href=\"\" title=\"cerrado\"><img src=\"candado.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
				else
				{
					echo "    <td bgcolor=\"$c2\" align=\"center\"><span class=$color><a href=\"detalle_adm_1.php?p=t&&clave=$clave\" title=\"capturando registros\"><img src=\"capturando.png\" width=\"20\" height=\"20\" /></a></span></td>";
				}
			}
		else if($statusp==1)
			{
			echo "    <td bgcolor=\"$c2\" align=\"center\"><split(pattern, string)	an class=$color><a href=\"\" title=\"programa en revision por el jefe d oficina\"><img src=\"revision.png\" width=\"20\" height=\"20\" /></a></span></td>";
			}
		else if($statusp==2)
			{
			echo "    <td bgcolor=\"$c2\" align=\"center\"><span class=$color><a href=\"\"  title=\"en espera de autorizacion\" target=\"_blank\"><img src=\"fidecheck.png\" width=\"30\" height=\"30\" /></a></span></td>";
			}
		else if($statusp==3 || $statusp==5)
			{
			echo "    <td bgcolor=\"$c2\" align=\"center\"><span class=$color><a href=\"\"  title=\"program aprobado\" target=\"_blank\"><img src=\"aprobado.png\" width=\"20\" height=\"20\" /></a></span></td>";
			}


	      echo "</tr>";

	}
}

echo "</table>";
/*TERMINA INGRESOS*/

echo "<br>";
echo "   	</div>";//cajaareas

echo "<br>";

echo "  </div>";//div contenido_cont
echo "</div>";//div contenedor



echo" </body>";
echo" </html>";

?>